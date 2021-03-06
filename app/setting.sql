DROP TABLE if EXISTS setting; 

CREATE TABLE `setting` (
	`api_key` CHAR(32) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`sender_ref` CHAR(36) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`contact_sender` VARCHAR(15) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`warehouse_ref` CHAR(36) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`city_ref` CHAR(36) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`area_ref` VARCHAR(250) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`sender_phone` VARCHAR(15) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci'
)
COLLATE='utf8mb4_unicode_ci'
ENGINE=InnoDB
;

INSERT INTO setting(api_key) VALUES('test');