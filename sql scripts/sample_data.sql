INSERT INTO CINEMA 
VALUES 
('Galaxy Theatres', '123 Main St', 'Anaheim', 'CA', '92801', 30),
('AMC Theatres', '1001 Lemon St', 'Fullerton', 'CA', '92832', 40),
('Regal Cinemas', '400 Lime St', 'Placentia', 'CA', '92801', 20),
('Starplex Cinemas', '456 Center Rd', 'Fullerton', 'CA', '92832', 25);

INSERT INTO AUDITORIUM 
VALUES
('Auditorium 1', 150, 'Galaxy Theatres', TRUE, FALSE),
('Auditorium 2', 80, 'Galaxy Theatres', FALSE, FALSE),
('Auditorium 3', 120, 'Galaxy Theatres', FALSE, TRUE),
('Auditorium 4', 150, 'Galaxy Theatres', TRUE, TRUE),
('Auditorium 5', 100, 'Galaxy Theatres', FALSE, FALSE),
('Auditorium 6', 120, 'Galaxy Theatres', TRUE, FALSE),
('Auditorium A1', 120, 'AMC Theatres', TRUE, FALSE),
('Auditorium A2', 100, 'AMC Theatres', TRUE, FALSE),
('Auditorium B1', 150, 'AMC Theatres', FALSE, TRUE),
('Auditorium B2', 120, 'AMC Theatres', FALSE, TRUE),
('Auditorium C1', 80, 'AMC Theatres', FALSE, FALSE),
('Auditorium C2', 100, 'AMC Theatres', TRUE, FALSE),
('Auditorium A-1', 100, 'Regal Cinemas', TRUE, FALSE),
('Auditorium A-2', 100, 'Regal Cinemas', TRUE, FALSE),
('Auditorium A-3', 100, 'Regal Cinemas', TRUE, TRUE),
('Auditorium B-1', 120, 'Regal Cinemas', TRUE, TRUE),
('Auditorium B-2', 120, 'Regal Cinemas', FALSE, TRUE),
('Auditorium B-3', 120, 'Regal Cinemas', TRUE, TRUE),
('Auditorium A', 120, 'Starplex Cinemas', TRUE, TRUE),
('Auditorium B', 120, 'Starplex Cinemas', TRUE, FALSE),
('Auditorium C', 100, 'Starplex Cinemas', FALSE, TRUE),
('Auditorium D', 100, 'Starplex Cinemas', FALSE, TRUE),
('Auditorium E', 80, 'Starplex Cinemas', FALSE, TRUE),
('Auditorium F', 80, 'Starplex Cinemas', FALSE, FALSE);

INSERT INTO MOVIE 
VALUES
('Inception', '2010', '148', 'PG-13', '2010-07-16', 'Sci-Fi', 'A mind-bending thriller.'),
('Toy Story', '1995', '81', 'G', '1995-11-22', 'Animation', 'Life of a toy.'),
('The Emoji Movie', '2017', '86', 'PG', '2017-07-28', 'Animation', 'World of Emojis.'),
('Pixels', '2015', '106', 'PG-13', '2015-07-24', 'Comedy', 'Video games come to life.'),
('KPop Demon Hunters', '2025', '99', 'PG', '2025-06-20', 'Action', 'Popstars protect fans from demons.'),
('Polar Express', '2004', '99', 'G', '2004-10-21', 'Animation', 'Boy learns the spirit of Christmas.'),
('John Wick', '2014', '101', 'R', '2014-10-24', 'Action', 'Legendary retired assassin.'),
('Billy Madison', '1995', '89', 'PG-13', '1995-02-10', 'Comedy', 'Man-child retakes school.'),
('Alien', '1979', '117', 'R', '1979-06-22', 'Sci-Fi', 'Unknown horrors of space.'),
('Avengers: Endgame', '2019', '181', 'PG-13', '2019-04-26', 'Action', 'Heroes unite.'),
('Interstellar', '2014', '169', 'PG-13', '2014-11-07', 'Sci-Fi', 'Space exploration drama.');

INSERT INTO SHOWTIME 
VALUES
(1, 'Auditorium 1', 'Galaxy Theatres', 'Inception', '2025-11-21', '14:00:00', '16:30:00', '3D'),
(2, 'Auditorium 1', 'Galaxy Theatres', 'Inception', '2025-11-21', '17:00:00', '19:30:00', '3D'),
(3, 'Auditorium 1', 'Galaxy Theatres', 'Inception', '2025-11-21', '20:00:00', '22:30:00', '3D'),
(4, 'Auditorium 2', 'Galaxy Theatres', 'Toy Story', '2025-11-21', '12:00:00', '13:21:00', '2D'),
(5, 'Auditorium A', 'Starplex Cinemas', 'Interstellar', '2025-11-21', '15:00:00', '18:49:00', 'IMAX');

