SELECT DATEDIFF(DATE(MAX(date)), DATE(MIN(date))) AS 'uptime'
FROM `member_history`;