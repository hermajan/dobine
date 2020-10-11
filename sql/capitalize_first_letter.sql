# see https://stackoverflow.com/questions/4263272/capitalize-first-letter-mysql
UPDATE `table` SET `column` = CONCAT(UCASE(LEFT(`column`, 1)), SUBSTRING(`column`, 2));
