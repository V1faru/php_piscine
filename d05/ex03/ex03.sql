INSERT INTO ft_table(`login`, `group`, `creation_date`)
		SELECT last_name, 3, birthdate FROM user_card
		WHERE length(last_name) < 9 AND last_name like('%a%')
		ORDER BY last_name ASC limit 10;