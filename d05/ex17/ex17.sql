SELECT COUNT(*) as nb_sc,
	FLOOR(AVG(price)) as av_susc,
	(SUM(duration_sub) % 42) as ft 
FROM subscription;