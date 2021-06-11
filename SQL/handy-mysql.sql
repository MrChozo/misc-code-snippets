/* Handy MySQL statements */

# Get unique values from a column
# BINARY makes it case sensitive
SELECT DISTINCT(BINARY status)
FROM orders ORDER BY (BINARY status);

# MySQL uses backticks to denote table and column names
# instead of Postgres' double-quotes
SELECT `Album`.`Title`
FROM `Album` AS `Album`
GROUP BY `Album`.`Title`
ORDER BY `Title`
LIMIT 10;
