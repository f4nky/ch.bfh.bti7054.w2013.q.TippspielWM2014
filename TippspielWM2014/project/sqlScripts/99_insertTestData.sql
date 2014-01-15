# ********** Test data for Tippspiel WM 2014 **********
# --- Players ---
DELETE FROM player; 

INSERT INTO player (p_id, playerGroup_id, role_id, lastName, firstName, nickname, email, pword) VALUES
(1, 1, 3, 'Admin', 'Admin', 'Admin', 'admin@admin.ch', '$2a$12$47iWvc8TCpGuScTQW0Sfd.1hdupxVLduPq9kMvsp/pUp.z6NcX8x.'),
(2, 1, 2, 'Muster', 'Max', '', 'max@muster.ch', '$2a$12$47iWvc8TCpGuScTQW0Sfd.1hdupxVLduPq9kMvsp/pUp.z6NcX8x.'),
(3, 1, 1, 'Doe', 'John', '', 'john@doe.com', '$2a$12$47iWvc8TCpGuScTQW0Sfd.1hdupxVLduPq9kMvsp/pUp.z6NcX8x.'),
(4, 1, 1, 'Doe', 'Jane', '', 'jane@doe.com', '$2a$12$47iWvc8TCpGuScTQW0Sfd.1hdupxVLduPq9kMvsp/pUp.z6NcX8x.'),
(5, 1, 1, 'Mustermann', 'Erika', '', 'erika@mustermann.ch', '$2a$12$47iWvc8TCpGuScTQW0Sfd.1hdupxVLduPq9kMvsp/pUp.z6NcX8x.'),
(6, 1, 1, 'Mustermann', 'Max', '', 'max@mustermann.ch', '$2a$12$47iWvc8TCpGuScTQW0Sfd.1hdupxVLduPq9kMvsp/pUp.z6NcX8x.');

# --- Bets ---
DELETE FROM fbmatchBet;

INSERT INTO fbmatchBet (player_id, fbmatch_id, betTeamHome, betTeamGuest) VALUES
(1, 1, 1, 0),
(1, 2, 2, 0),
(1, 3, 0, 0),
(1, 4, 1, 2),
(1, 5, 1, 1),
(1, 6, 0, 3),
(1, 7, 1, 0),

(2, 1, 2, 0),
(2, 2, 0, 2),
(2, 3, 3, 0),
(2, 4, 1, 1),
(2, 5, 1, 1),
(2, 6, 2, 3),
(2, 7, 0, 0),

(3, 1, 0, 0),
(3, 2, 3, 3),
(3, 3, 0, 2),
(3, 4, 0, 1),
(3, 5, 1, 3),
(3, 6, 1, 0),
(3, 7, 0, 2),

(4, 1, 1, 0),
(4, 2, 2, 0),
(4, 3, 0, 0),
(4, 4, 1, 2),
(4, 5, 1, 1),
(4, 6, 0, 3),
(4, 7, 1, 0),

(5, 1, 1, 3),
(5, 2, 2, 2),
(5, 3, 1, 1),
(5, 4, 1, 2),
(5, 5, 3, 2),
(5, 6, 4, 1),
(5, 7, 1, 2);


# --- Match results ---
UPDATE fbmatch SET scoreTeamHome=null, scoreTeamGuest=null;

UPDATE fbmatch SET scoreTeamHome=2, scoreTeamGuest=0 WHERE fbm_id=1;
UPDATE fbmatch SET scoreTeamHome=1, scoreTeamGuest=1 WHERE fbm_id=2;
UPDATE fbmatch SET scoreTeamHome=0, scoreTeamGuest=2 WHERE fbm_id=3;
UPDATE fbmatch SET scoreTeamHome=0, scoreTeamGuest=0 WHERE fbm_id=4;
UPDATE fbmatch SET scoreTeamHome=1, scoreTeamGuest=3 WHERE fbm_id=5;
UPDATE fbmatch SET scoreTeamHome=1, scoreTeamGuest=0 WHERE fbm_id=6;
UPDATE fbmatch SET scoreTeamHome=1, scoreTeamGuest=2 WHERE fbm_id=7;