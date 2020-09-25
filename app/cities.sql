CREATE TABLE `cities` (
	`city_id` INT(11) NULL DEFAULT NULL,
	`description` VARCHAR(250) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`ref` CHAR(36) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`city_area` CHAR(36) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`area_description` VARCHAR(250) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`json_description` MEDIUMTEXT NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci'
)
COLLATE='utf8mb4_unicode_ci'
ENGINE=InnoDB
;
