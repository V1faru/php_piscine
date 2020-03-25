UPDATE ft_table 
		SET `creation_date` = date_add(`creation_date`, interval 20 YEAR)
		WHERE id > 5;