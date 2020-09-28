DROP TABLE if EXISTS waybills; 

CREATE table waybills (

	`ref` CHAR(36),
	cost_on_site DECIMAL(10, 2),
	estimated_deliveryDate DATE,
	int_doc_number varChar(36),
	type_document VARCHAR(36),
	entered_date DateTime
)