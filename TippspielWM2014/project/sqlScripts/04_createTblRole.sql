DROP TABLE IF EXISTS role;
CREATE TABLE role (
	r_id INTEGER UNSIGNED NOT NULL,
	roleName VARCHAR(50),
	CONSTRAINT pk_r_id PRIMARY KEY(r_id),
	created TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
	updated TIMESTAMP NULL DEFAULT NULL
)
ENGINE=InnoDB DEFAULT CHARSET=utf8;