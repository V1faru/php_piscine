-- count * counts all the records
SELECT COUNT(*) AS 'nb_short-films' 
FROM film 
WHERE duration <= 42;