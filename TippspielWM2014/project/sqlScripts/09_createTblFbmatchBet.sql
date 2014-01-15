DROP TABLE IF EXISTS fbmatchBet;
CREATE TABLE fbmatchBet (
	fbmB_id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	player_id INTEGER UNSIGNED NOT NULL,
	fbmatch_id INTEGER UNSIGNED NOT NULL,
	betTeamHome INTEGER UNSIGNED,
	betTeamGuest INTEGER UNSIGNED,
	created TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
	updated TIMESTAMP NULL DEFAULT NULL,
	CONSTRAINT pk_fbmB_id PRIMARY KEY(fbmB_id),
	CONSTRAINT fk_fbmatchBet_player_id FOREIGN KEY(player_id)
		REFERENCES player(p_id)
			ON DELETE RESTRICT
			ON UPDATE CASCADE,
	CONSTRAINT fk_fbmatchBet_match_id FOREIGN KEY(fbmatch_id)
		REFERENCES fbmatch(fbm_id)
			ON DELETE RESTRICT
			ON UPDATE CASCADE
)
ENGINE=InnoDB DEFAULT CHARSET=utf8;