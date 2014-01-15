DROP VIEW IF EXISTS qryAllMatches;
CREATE VIEW qryAllMatches AS
	SELECT fbm.fbm_id, ph.ph_id, ph.phaseName, thome.groupName, s.stadiumName, s.city,
		DATE_FORMAT(fbm.matchDay, '%d.%m.%Y') AS matchDay,
		DATE_FORMAT(fbm.matchTimeLocal, '%H:%i') AS matchTimeLocal,
		IF(thome.teamName = '--', fbmMeta.descTeamHome, thome.teamName) AS teamNameHome, thome.countryCode AS teamHomeCC,
		IF(tguest.teamName = '--', fbmMeta.descTeamGuest, tguest.teamName) AS teamNameGuest, tguest.countryCode AS teamGuestCC,
		fbm.scoreTeamHome, fbm.scoreTeamGuest, fbm.overtime, fbm.penaltyShootout, fbm.numberOfYellowCards,
		fbm.numberOfRedCards
	FROM (fbmatch AS fbm LEFT JOIN phase AS ph ON (fbm.phase_id = ph.ph_id)
						 LEFT JOIN stadium AS s ON (fbm.stadium_id = s.s_id)
						 LEFT JOIN team AS thome ON (fbm.teamHome_id = thome.t_id)
						 LEFT JOIN team AS tguest ON (fbm.teamGuest_id = tguest.t_id)
						 LEFT JOIN fbmatchMeta AS fbmMeta ON (fbm.fbm_id = fbmMeta.fbmatch_id));