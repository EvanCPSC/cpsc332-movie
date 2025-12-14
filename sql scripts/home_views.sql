CREATE VIEW vw_longmoviesbygenre AS
SELECT
    c.Name AS Cinema_Name,
    a.Name AS Auditorium_Name,
    m.Title AS Movie_Title,
    m.Genre,
    m.Duration
FROM MOVIE m
JOIN SHOWTIME s ON m.Title = s.Movie
JOIN AUDITORIUM a ON s.Auditorium = a.Name
JOIN CINEMA c ON a.Cinema_Name = c.Name
WHERE CAST(m.Duration AS UNSIGNED) > 120
GROUP BY m.Genre, c.Name, a.Name, m.Title;

CREATE VIEW vw_cinemaauditorium3d AS
SELECT
    c.Name AS cinema_name,
    CONCAT(c.Street_Number, ', ', c.City, ', ', c.State, ' ', c.Zip_Code) AS cinema_address,
    a.Name AS auditorium_name,
    a.Capacity AS capacity,
    a.Three_D_Support AS three_d_support
FROM CINEMA c
JOIN AUDITORIUM a
    ON a.Cinema_Name = c.Name;

CREATE VIEW vw_moviesmorethan3perday AS
SELECT
    m.Title AS movie_title,
    s.Show_Date AS show_date,
    COUNT(*) AS show_count
FROM SHOWTIME s
JOIN MOVIE m
    ON s.Movie = m.Title
GROUP BY
    m.Title,
    s.Show_Date
HAVING
    COUNT(*) > 3;
