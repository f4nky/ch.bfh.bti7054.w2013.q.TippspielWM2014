DROP VIEW IF EXISTS qryRanking;
CREATE VIEW qryRanking AS
	SELECT p_id, IF(p.nickname!='', p.nickname, CONCAT(p.lastName, ' ', p.firstName)) AS pName,
		IFNULL(SUM(scores.score), 0) AS points, IFNULL(SUM(scores.corBet), 0) AS correctBets FROM player p
	LEFT JOIN qryMatchBetsPerUser AS scores ON (p.p_id = scores.player_id)
	GROUP BY p.p_id
	ORDER BY score DESC;