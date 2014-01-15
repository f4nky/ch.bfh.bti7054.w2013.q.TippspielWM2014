DROP TABLE IF EXISTS fbmatch;
CREATE TABLE fbmatch (
	fbm_id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	stadium_id INTEGER UNSIGNED NOT NULL,
	phase_id INTEGER UNSIGNED NOT NULL,
	teamHome_id VARCHAR(2) NOT NULL,
	teamGuest_id VARCHAR(2) NOT NULL,	
	matchDay DATE,
	matchTimeLocal TIME,
	scoreTeamHome INTEGER UNSIGNED,
	scoreTeamGuest INTEGER UNSIGNED,
	overtime BOOLEAN,
	penaltyShootout BOOLEAN,
	numberOfYellowCards INTEGER UNSIGNED,
	numberOfRedCards INTEGER UNSIGNED,
	created TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
	updated TIMESTAMP NULL DEFAULT NULL,
	CONSTRAINT pk_fm_id PRIMARY KEY(fbm_id), 
	CONSTRAINT fk_fbmatch_stadium_id FOREIGN KEY(stadium_id)
		REFERENCES stadium(s_id)
			ON DELETE RESTRICT
			ON UPDATE CASCADE,
	CONSTRAINT fk_fbmatch_phase_id FOREIGN KEY(phase_id)
		REFERENCES phase(ph_id)
			ON DELETE RESTRICT
			ON UPDATE CASCADE,
	CONSTRAINT fk_fbmatch_teamHome_id FOREIGN KEY(teamHome_id)
		REFERENCES team(t_id)
			ON DELETE RESTRICT
			ON UPDATE CASCADE,
	CONSTRAINT fk_fbmatch_teamGuest_id FOREIGN KEY(teamGuest_id)
		REFERENCES team(t_id)
			ON DELETE RESTRICT
			ON UPDATE CASCADE
)
ENGINE=InnoDB DEFAULT CHARSET=utf8;