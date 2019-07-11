/* Handy SQL statements */

-- Add a column
ALTER TABLE forms ADD COLUMN is_deleted boolean;

-- Remove a column
ALTER TABLE forms DROP COLUMN fileobject_id;

-- Set data in a column
UPDATE forms SET is_deleted = FALSE;

UPDATE users
SET is_admin = TRUE
   ,status = 10
WHERE id = 1;

-- Set data in a column by a range of rows
UPDATE formsubmissions
SET is_deleted = FALSE
WHERE id BETWEEN 70 AND 74;

-- Add/edit a column's constraint(s)
ALTER TABLE forms ALTER COLUMN is_deleted SET DEFAULT FALSE;
ALTER TABLE forms ALTER COLUMN is_deleted SET NOT NULL;

-- Insert a row of specified data
INSERT INTO parameters (id, key, value, type, active, "group")
VALUES (43, 'Blogs - Show Post Author', '1', 'text', TRUE, 'Look and Feel');

-- Insert multiple rows of specified data
INSERT INTO parameters (id, key, value, type, active, "group")
VALUES (43, 'Blogs - Show Post Author', '1', 'text', TRUE, 'Look and Feel'),
	   (44, 'Blogs - Something Else A', '1', 'text', TRUE, 'Look and Feel'),
	   (45, 'Blogs - Something Else B', '1', 'text', TRUE, 'Look and Feel');

-- Remove row(s) of data from table
DELETE FROM events
WHERE id != 683;

-- Display default value
SELECT column_name, column_default
FROM information_schema.columns
WHERE (table_schema, table_name) = ('public', 'forms')
ORDER BY ordinal_position;

-- Add a new table
CREATE TABLE fileobjects_forms (
	id				SERIAL,
	fileobject_id	INTEGER NOT NULL,
	form_id			INTEGER NOT NULL,
	"order"			INTEGER
);

-- Change table owner
ALTER TABLE fileobjects_forms OWNER TO [[[[[[new_owner]]]]]];

-- Get column names, displayed alphabetically
SELECT column_name FROM information_schema.columns
WHERE table_schema = 'public'
AND table_name = 'courses'
ORDER BY column_name ASC;

-- Get all table names from a DB/schema
-- Helpful for copying as plain text or potentially using as a sub-query
SELECT DISTINCT table_name FROM information_schema.columns
WHERE table_schema = 'public' 
ORDER BY table_name ASC;

-- Find duplicate values in a single field in a single table
SELECT * FROM table t1
WHERE (
	SELECT count(*) FROM table t2
	WHERE t1.field = t2.field
) > 1
ORDER BY field;

-- Get all of a timestamp field from a single day (cast the timestamp into a date)
SELECT *
FROM itemversionrequests
WHERE created::date = '2018-11-30';

-- Get all of a timestamp field from a year (can use this to get other parts of a datetime too)
SELECT *
FROM itemversionrequests
WHERE date_part('year', created) = '2018';

-- Getting all of the tables that have columns similar to "order_id"
-- There were extras that I pruned out manually in sjOrderColumns.csv
SELECT table_name, column_name FROM information_schema.columns
WHERE table_schema = 'public'
  AND column_name ILIKE '%order%'
ORDER BY table_name ASC, column_name ASC;

-- Boot active users out of a database
SELECT pg_terminate_backend(pg_stat_activity.pid)
FROM pg_stat_activity
WHERE pg_stat_activity.datname = 'TARGET_DB' -- ← change this to your DB
  AND pid <> pg_backend_pid();

-- Many-to-Many join using an intermediary join table
SELECT *
FROM orderitems
  JOIN orders
    ON orderitems.order_id = orders.id
  JOIN items
    ON orderitems.item_id = items.id
WHERE orders.id = 36951;
