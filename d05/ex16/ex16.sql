SELECT COUNT(*) as 'movies'
FROM member_history
WHERE (DATE BETWEEN '2006/10/30' AND '2007/07/27')
OR (DATE_FORMAT(DATE, '%m%d') = '1224');