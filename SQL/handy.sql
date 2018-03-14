/* Handy SQL statements */

-- Add a column
ALTER TABLE forms ADD COLUMN is_deleted boolean;

-- Remove a column
ALTER TABLE forms DROP COLUMN fileobject_id;

-- Set data in a column
UPDATE forms SET is_deleted = FALSE;

-- Set data in a column by a range of rows
UPDATE formsubmissions
SET is_deleted = FALSE
WHERE id BETWEEN 70 AND 74;

-- Add/edit a column's constraint(s)
ALTER TABLE forms ALTER COLUMN is_deleted SET DEFAULT FALSE;
ALTER TABLE forms ALTER COLUMN is_deleted SET NOT NULL;

-- Add a row of specified data
INSERT INTO parameters (id, key, value, type, active, "group")
VALUES (43, 'Blogs - Show Post Author', '1', 'text', TRUE, 'Look and Feel');

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