SELECT UPPER(last_name) as NAME, first_name, subscription.price FROM user_card 
INNER JOIN db_amurtone.member
ON user_card.id_user = member.id_user_card
INNER JOIN db_amurtone.subscription
ON subscription.id_sub = member.id_sub 
WHERE subscription.price > 42 
ORDER BY last_name ASC, first_name ASC;