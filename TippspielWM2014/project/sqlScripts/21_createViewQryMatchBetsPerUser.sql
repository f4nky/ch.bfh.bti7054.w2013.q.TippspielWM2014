DROP VIEW IF EXISTS qryMatchBetsPerUser;
CREATE VIEW qryMatchBetsPerUser AS
	SELECT player_id, fbmatch_id, scoreTeamHome, scoreTeamGuest, betTeamHome, betTeamGuest,
			(CASE
				#richtiges Resultat
				WHEN ((scoreTeamHome=betTeamHome) AND (scoreTeamGuest=betTeamGuest)) THEN 5
				#richtiger Sieger
				WHEN (((scoreTeamHome>scoreTeamGuest) AND (betTeamHome>betTeamGuest)) OR ((scoreTeamHome<scoreTeamGuest) AND (betTeamHome<betTeamGuest))) THEN
					(CASE
						#mit richtiger Differenz
						WHEN ((CAST(scoreTeamHome AS SIGNED)-CAST(scoreTeamGuest AS SIGNED))=(CAST(betTeamHome AS SIGNED)-(CAST(betTeamGuest AS SIGNED)))) THEN 2
						#mit falscher Differenz
						ELSE 1
					END)
				#richtige Differenz
				WHEN ((CAST(scoreTeamHome AS SIGNED)-CAST(scoreTeamGuest AS SIGNED))=(CAST(betTeamHome AS SIGNED)-(CAST(betTeamGuest AS SIGNED)))) THEN 3
				#Unentschieden
				WHEN ((scoreTeamHome=scoreTeamGuest) AND (betTeamHome=betTeamGuest)) THEN 1
				#kein Treffer
				ELSE 0
			END) AS 'score',
			(CASE
				#richtiges Resultat
				WHEN((scoreTeamHome=betTeamHome) AND (scoreTeamGuest=betTeamGuest)) THEN 1 ELSE 0
			END) AS 'corBet'
		FROM qryAllMatches
		INNER JOIN fbMatchBet AS fbmBet
		ON (qryAllMatches.fbm_id = fbmBet.fbmatch_id)