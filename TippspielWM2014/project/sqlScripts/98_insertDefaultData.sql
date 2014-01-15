# ********** Data for World Cup 2014, Brazil **********
# --- Teams ---
#DELETE FROM team;

INSERT INTO team (t_id, teamName, countryCode, groupName) VALUES ('A1', 'Brasilien', 'BRA', 'A'), ('A2', 'Kroatien', 'CRO', 'A'), ('A3', 'Mexiko', 'MEX', 'A'), ('A4', 'Kamerun', 'CMR', 'A');
INSERT INTO team (t_id, teamName, countryCode, groupName) VALUES ('B1', 'Spanien', 'ESP', 'B'), ('B2', 'Niederlande', 'NED', 'B'), ('B3', 'Chile', 'CHI', 'B'), ('B4', 'Australien', 'AUS', 'B');
INSERT INTO team (t_id, teamName, countryCode, groupName) VALUES ('C1', 'Kolumbien', 'COL', 'C'), ('C2', 'Griechenland', 'GRE', 'C'), ('C3', 'Elfenbeinküste', 'CIV', 'C'), ('C4', 'Japan', 'JAP', 'C');
INSERT INTO team (t_id, teamName, countryCode, groupName) VALUES ('D1', 'Uruguay', 'URU', 'D'), ('D2', 'Costa Rica', 'CRC', 'D'), ('D3', 'England', 'ENG', 'D'), ('D4', 'Italien', 'ITA', 'D');
INSERT INTO team (t_id, teamName, countryCode, groupName) VALUES ('E1', 'Schweiz', 'SUI', 'E'), ('E2', 'Ecuador', 'ECU', 'E'), ('E3', 'Frankreich', 'FRA', 'E'), ('E4', 'Honduras', 'HON', 'E');
INSERT INTO team (t_id, teamName, countryCode, groupName) VALUES ('F1', 'Argentinien', 'ARG', 'F'), ('F2', 'Bosnien-Herzegowina', 'BIH', 'F'), ('F3', 'Iran', 'IRN', 'F'), ('F4', 'Nigeria', 'NGA', 'F');
INSERT INTO team (t_id, teamName, countryCode, groupName) VALUES ('G1', 'Deutschland', 'GER', 'G'), ('G2', 'Portugal', 'POR', 'G'), ('G3', 'Ghana', 'GHA', 'G'), ('G4', 'USA', 'USA', 'G');
INSERT INTO team (t_id, teamName, countryCode, groupName) VALUES ('H1', 'Belgen', 'BEL', 'H'), ('H2', 'Algerien', 'ALG', 'H'), ('H3', 'Russland', 'RUS', 'H'), ('H4', 'Korea Republik', 'KOR', 'H');
INSERT INTO team (t_id, teamName, countryCode, groupName) VALUES ('ZZ', '--', '--', '--');


# --- Stadiums ---
#DELETE FROM stadium;

INSERT INTO stadium (s_id, stadiumName, city, capacity) VALUES
(1, 'Arena de São Paulo', 'São Paulo', 65807),
(2, 'Estádio das Dunas', 'Natal', 42086),
(3, 'Estádio Castelão', 'Fortaleza', 64846),
(4, 'Arena Amazônia', 'Manaus', 42377),
(5, 'Estádio Nacional', 'Brasília', 68009),
(6, 'Arena Pernambuco', 'Recife', 42849),
(7, 'Arena Fonte Nova', 'Salvador', 48747),
(8, 'Arena Pantanal', 'Cuiabá', 42968),
(9, 'Estádio do Maracanã', 'Rio de Janeiro', 73531),
(10, 'Estádio Beira-Rio', 'Porto Alegre', 48849),
(11, 'Arena da Baixada', 'Curitiba', 40000),
(12, 'Estádio Mineirão', 'Belo Horizonte', 62547);


# --- Phases ---
#DELETE FROM phase;

INSERT INTO phase (ph_id, phaseName) VALUES
(1, 'Gruppenphase'),
(2, 'Achtelfinale'), 
(3, 'Viertelfinale'), 
(4, 'Halbfinale'), 
(5, 'Spiel um Platz 3'), 
(6, 'Finale');


# --- User roles ---
#DELETE FROM role;

INSERT INTO role (r_id, roleName) VALUES
(1, 'default'),
(2, 'admin'),
(3, 'owner');


# --- Player groups ---
#DELETE FROM playerGroup;

INSERT INTO playerGroup (playergroupName) VALUES ('Default');


# --- Matches ----
#DELETE FROM fbmatch;

# // Gruppe A
INSERT INTO fbmatch (fbm_id, stadium_id, phase_id, teamHome_id, teamGuest_id, matchDay, matchTimeLocal) VALUES
(1, 1, 1, 'A1', 'A2', "2014-06-12", "17:00"),
(2, 2, 1, 'A3', 'A4', "2014-06-13", "13:00"),
(17, 3, 1, 'A1', 'A3', "2014-06-17", "16:00"),
(18, 4, 1, 'A4', 'A2', "2014-06-18", "18:00"),
(33, 5, 1, 'A4', 'A1', "2014-06-23", "17:00"),
(34, 6, 1, 'A2', 'A3', "2014-06-23", "17:00");

# // Gruppe B
INSERT INTO fbmatch (fbm_id, stadium_id, phase_id, teamHome_id, teamGuest_id, matchDay, matchTimeLocal) VALUES
(3, 7, 1, 'B1', 'B2', "2014-06-13", "16:00"),
(4, 8, 1, 'B3', 'B4', "2014-06-13", "18:00"),
(19, 9, 1, 'B1', 'B3', "2014-06-18", "16:00"),
(20, 10, 1, 'B4', 'B2', "2014-06-18", "13:00"),
(35, 11, 1, 'B4', 'B1', "2014-06-23", "13:00"),
(36, 1, 1, 'B2', 'B3', "2014-06-23", "13:00");

# // Gruppe C
INSERT INTO fbmatch (fbm_id, stadium_id, phase_id, teamHome_id, teamGuest_id, matchDay, matchTimeLocal) VALUES
(5, 12, 1, 'C1', 'C2', "2014-06-14", "13:00"),
(6, 6, 1, 'C3', 'C4', "2014-06-14", "22:00"),
(21, 5, 1, 'C1', 'C3', "2014-06-19", "13:00"),
(22, 2, 1, 'C4', 'C2', "2014-06-19", "19:00"),
(37, 8, 1, 'C4', 'C1', "2014-06-24", "16:00"),
(38, 3, 1, 'C2', 'C3', "2014-06-24", "17:00");

# // Gruppe D
INSERT INTO fbmatch (fbm_id, stadium_id, phase_id, teamHome_id, teamGuest_id, matchDay, matchTimeLocal) VALUES
(7, 3, 1, 'D1', 'D2', "2014-06-14", "16:00"),
(8, 4, 1, 'D3', 'D4', "2014-06-14", "18:00"),
(23, 1, 1, 'D1', 'D3', "2014-06-19", "16:00"),
(24, 6, 1, 'D4', 'D2', "2014-06-20", "13:00"),
(39, 2, 1, 'D4', 'D1', "2014-06-24", "13:00"),
(40, 12, 1, 'D2', 'D3', "2014-06-24", "13:00");

# // Gruppe E
INSERT INTO fbmatch (fbm_id, stadium_id, phase_id, teamHome_id, teamGuest_id, matchDay, matchTimeLocal) VALUES
(9, 5, 1, 'E1', 'E2', "2014-06-15", "13:00"),
(10, 10, 1, 'E3', 'E4', "2014-06-15", "16:00"),
(25, 7, 1, 'E1', 'E3', "2014-06-20", "16:00"),
(26, 11, 1, 'E4', 'E2', "2014-06-20", "19:00"),
(41, 4, 1, 'E4', 'E1', "2014-06-25", "16:00"),
(42, 9, 1, 'E2', 'E3', "2014-06-25", "17:00");

# // Gruppe F
INSERT INTO fbmatch (fbm_id, stadium_id, phase_id, teamHome_id, teamGuest_id, matchDay, matchTimeLocal) VALUES
(11, 9, 1, 'F1', 'F2', "2014-06-15", "19:00"),
(12, 11, 1, 'F3', 'F4', "2014-06-16", "16:00"),
(27, 12, 1, 'F1', 'F3', "2014-06-21", "13:00"),
(28, 8, 1, 'F4', 'F2', "2014-06-21", "18:00"),
(43, 10, 1, 'F4', 'F1', "2014-06-25", "13:00"),
(44, 7, 1, 'F2', 'F3', "2014-06-25", "13:00");

# // Gruppe G
INSERT INTO fbmatch (fbm_id, stadium_id, phase_id, teamHome_id, teamGuest_id, matchDay, matchTimeLocal) VALUES
(13, 7, 1, 'G1', 'G2', "2014-06-16", "13:00"),
(14, 2, 1, 'G3', 'G4', "2014-06-16", "19:00"),
(29, 3, 1, 'G1', 'G3', "2014-06-21", "16:00"),
(30, 4, 1, 'G4', 'G2', "2014-06-22", "18:00"),
(45, 6, 1, 'G4', 'G1', "2014-06-26", "13:00"),
(46, 5, 1, 'G2', 'G3', "2014-06-26", "13:00");

# // Gruppe H
INSERT INTO fbmatch (fbm_id, stadium_id, phase_id, teamHome_id, teamGuest_id, matchDay, matchTimeLocal) VALUES
(15, 12, 1, 'H1', 'H2', "2014-06-17", "13:00"),
(16, 8, 1, 'H3', 'H4', "2014-06-17", "18:00"),
(31, 9, 1, 'H1', 'H3', "2014-06-22", "13:00"),
(32, 10, 1, 'H4', 'H2', "2014-06-22", "16:00"),
(47, 1, 1, 'H4', 'H1', "2014-06-26", "17:00"),
(48, 11, 1, 'H2', 'H3', "2014-06-26", "17:00");

# // Achtelfinale
INSERT INTO fbmatch (fbm_id, stadium_id, phase_id, teamHome_id, teamGuest_id, matchDay, matchTimeLocal) VALUES
(49, 12, 2, 'ZZ', 'ZZ', "2014-06-28", "13:00"),
(50, 9, 2, 'ZZ', 'ZZ', "2014-06-28", "17:00"),
(51, 3, 2, 'ZZ', 'ZZ', "2014-06-29", "13:00"),
(52, 6, 2, 'ZZ', 'ZZ', "2014-06-29", "17:00"),
(53, 5, 2, 'ZZ', 'ZZ', "2014-06-30", "13:00"),
(54, 10, 2, 'ZZ', 'ZZ', "2014-06-30", "17:00"),
(55, 1, 2, 'ZZ', 'ZZ', "2014-07-01", "13:00"),
(56, 7, 2, 'ZZ', 'ZZ', "2014-07-01", "17:00");

# // Viertelfinale
INSERT INTO fbmatch (fbm_id, stadium_id, phase_id, teamHome_id, teamGuest_id, matchDay, matchTimeLocal) VALUES
(57, 3, 3, 'ZZ', 'ZZ', "2014-07-04", "17:00"),
(58, 9, 3, 'ZZ', 'ZZ', "2014-07-04", "13:00"),
(59, 7, 3, 'ZZ', 'ZZ', "2014-07-05", "17:00"),
(60, 5, 3, 'ZZ', 'ZZ', "2014-07-05", "13:00");

# // Halbfinale
INSERT INTO fbmatch (fbm_id, stadium_id, phase_id, teamHome_id, teamGuest_id, matchDay, matchTimeLocal) VALUES
(61, 12, 4, 'ZZ', 'ZZ', "2014-07-08", "17:00"),
(62, 1, 4, 'ZZ', 'ZZ', "2014-07-08", "17:00");

# // Spiel um Platz 3
INSERT INTO fbmatch (fbm_id, stadium_id, phase_id, teamHome_id, teamGuest_id, matchDay, matchTimeLocal) VALUES
(63, 5, 5, 'ZZ', 'ZZ', "2014-07-12", "17:00");

# // Finale
INSERT INTO fbmatch (fbm_id, stadium_id, phase_id, teamHome_id, teamGuest_id, matchDay, matchTimeLocal) VALUES
(64, 9, 6, 'ZZ', 'ZZ', "2014-07-13", "16:00");


# --- Matches meta data ---
#DELETE FROM fbmatchMeta;

INSERT INTO fbmatchMeta(fbmM_id, fbmatch_id, descTeamHome, descTeamGuest) VALUES
(1, 49, '1. Gruppe A', '2. Gruppe B'),
(2, 50, '1. Gruppe C', '2. Gruppe D'),
(3, 51, '1. Gruppe B', '2. Gruppe A'),
(4, 52, '1. Gruppe D', '2. Gruppe C'),
(5, 53, '1. Gruppe E', '2. Gruppe F'),
(6, 54, '1. Gruppe G', '2. Gruppe H'),
(7, 55, '1. Gruppe F', '2. Gruppe E'),
(8, 56, '1. Gruppe H', '2. Gruppe G'),
(9, 57, 'Sieger AF1', 'Sieger AF2'),
(10, 58, 'Sieger AF5', 'Sieger AF6'),
(11, 59, 'Sieger AF3', 'Sieger AF4'),
(12, 60, 'Sieger AF7', 'Sieger AF8'),
(13, 61, 'Sieger VF1', 'Sieger VF2'),
(14, 62, 'Sieger VF3', 'Sieger VF4'),
(15, 63, 'Verlierer HF1', 'Verlierer HF2'),
(16, 64, 'Sieger HF1', 'Sieger HF2');
