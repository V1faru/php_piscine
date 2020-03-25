create table ft_table 
(
	id INT PRIMARY KEY AUTO_INCREMENT,
	`login` VARCHAR(8) DEFAULT 'toto' NOT NULL,
	`group` enum('staff', 'student', 'other'),
	`creation_date` DATE NOT NULL
);