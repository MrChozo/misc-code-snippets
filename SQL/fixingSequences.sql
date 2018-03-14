/* ********* Fixing Sequences ********* */
/**
 * ### Fixing sequence ownership
 * 
 * This script changes sequences with OWNED BY to the table and column they're referenced from.
 * NB! Sequences that are referenced by multiple tables or columns are ignored.
 * (Parts of query shamelessly stolen from OmniTI's Tasty Treats repository by Robert Treat)
 * 
 * BRIAN NOTE: 
 * BRIAN NOTE: !!!!!!!!!!!!!!!!!!!!!!!!!! STEP TWO !!!!!!!!!!!!!!!!!!!!!!!!!!
 * BRIAN NOTE: RUN THIS ONE, THEN COPY ITS RESULTS, REMOVE THE DOUBLE QUOTES PG_ADMIN ADDS TO
 * BRIAN NOTE: THEM, AND RUN THOSE TO FIX OUT OF WHACK OWNERS. THEN, RUN THE BELOW ONE AGAIN
 * BRIAN NOTE: TO DOUBLE-CHECK
 * BRIAN NOTE: 
 */
SELECT 'ALTER SEQUENCE '|| quote_ident(MIN(schema_name)) ||'.'|| quote_ident(MIN(seq_name))
       ||' OWNED BY '|| quote_ident(MIN(TABLE_NAME)) ||'.'|| quote_ident(MIN(column_name)) ||';'
FROM (
    SELECT 
        n.nspname AS schema_name,
        c.relname AS TABLE_NAME,
        a.attname AS column_name,
        SUBSTRING(d.adsrc FROM E'^nextval\\(''([^'']*)''(?:::text|::regclass)?\\)') AS seq_name 
    FROM pg_class c 
    JOIN pg_attribute a ON (c.oid=a.attrelid) 
    JOIN pg_attrdef d ON (a.attrelid=d.adrelid AND a.attnum=d.adnum) 
    JOIN pg_namespace n ON (c.relnamespace=n.oid)
    WHERE has_schema_privilege(n.oid,'USAGE')
      AND n.nspname NOT LIKE 'pg!_%' escape '!'
      AND has_table_privilege(c.oid,'SELECT')
      AND (NOT a.attisdropped)
      AND d.adsrc ~ '^nextval'
) seq
GROUP BY seq_name HAVING COUNT(*)=1;

/**
 * This snippet finds orphaned sequences that aren't owned by any column. It can be helpful to run
 * this, to double-check that the above query did its job right.
 *
 * BRIAN NOTE: 
 * BRIAN NOTE: !!!!!!!!!!!!!!!!!!!!!!!!!! STEP ONE !!!!!!!!!!!!!!!!!!!!!!!!!!
 * BRIAN NOTE: RUN THIS ONE FIRST TO CHECK ON HOW MANY OWNERS ARE OUT OF WHACK
 * BRIAN NOTE: 
 */
SELECT ns.nspname AS schema_name, seq.relname AS seq_name
FROM pg_class AS seq
JOIN pg_namespace AS ns ON (seq.relnamespace=ns.oid)
WHERE seq.relkind = 'S'
  AND NOT EXISTS (SELECT * FROM pg_depend WHERE objid=seq.oid AND deptype='a')
ORDER BY seq.relname;


/**
 * ### Updating sequence values from table
 * 
 * A common problem when copying or recreating a database is that database sequences are not updated
 * just by inserting records in the table that sequence is used in. If you want to make your sequences
 * all start just after whatever values are already there, it's possible to do that for most common
 * configurations like this:
 * 
 * BRIAN NOTE: 
 * BRIAN NOTE: !!!!!!!!!!!!!!!!!!!!!!!!!! STEP THREE !!!!!!!!!!!!!!!!!!!!!!!!!!
 * BRIAN NOTE: AFTER RUNNING THE ABOVE ONES, RUN THIS ONE, COPY ITS RESULTS OUT, AND RUN THOSE
 * BRIAN NOTE: 
 */
SELECT 'SELECT SETVAL(' ||
       quote_literal(quote_ident(PGT.schemaname) || '.' || quote_ident(S.relname)) ||
       ', COALESCE(MAX(' ||quote_ident(C.attname)|| '), 1) ) FROM ' ||
       quote_ident(PGT.schemaname)|| '.'||quote_ident(T.relname)|| ';'
FROM pg_class AS S,
     pg_depend AS D,
     pg_class AS T,
     pg_attribute AS C,
     pg_tables AS PGT
WHERE S.relkind = 'S'
    AND S.oid = D.objid
    AND D.refobjid = T.oid
    AND D.refobjid = C.attrelid
    AND D.refobjsubid = C.attnum
    AND T.relname = PGT.tablename
ORDER BY S.relname;

/**
 * Usage would typically work like this:
 * 
 * Save this to a file, say 'reset.sql'
 * Run the file and save its output in a way that doesn't include the usual headers, then run that output.
 * Example:
 * 
 *   psql -Atq -f reset.sql -o temp
 *   psql -f temp
 *   rm temp
 * 
 * There are a few limitations to this snippet of code you need to be aware of:
 * 
 * It only works on sequences that are owned by a table. If your sequences are not owned, run the
 * above "Fixing sequence ownership" first
 *  
 * 
 * Source: https://wiki.postgresql.org/wiki/Fixing_Sequences
 */