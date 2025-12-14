CREATE DATABASE MovieDB;

USE MovieDB;

CREATE TABLE CINEMA (
    Name			VARCHAR(25)		NOT NULL,
    Street_Number   VARCHAR(45)		NOT NULL,
    City			VARCHAR(30)		NOT NULL,
    State			VARCHAR(20)		NOT NULL,
    Zip_Code		CHAR(5),
    Employees		INT,
    PRIMARY KEY(Name)
);
CREATE TABLE EMPLOYEE (
    Employee_ID	    INT AUTO_INCREMENT,
    Name			VARCHAR(30),
    Role			VARCHAR(20),
    Email			VARCHAR(25),
    Address		    VARCHAR(50),
    Phone_Number	VARCHAR(13),
    Password		VARCHAR(20),
    PRIMARY KEY(Employee_ID)
);
CREATE TABLE AUDITORIUM (
    Name			 VARCHAR(20),
    Capacity		 INT,
    Cinema_Name	     VARCHAR(25),
    Three_D_Support  BOOLEAN,
    IMAX_Support	 BOOLEAN,
    PRIMARY KEY(Name)
);
CREATE TABLE MOVIE (
    Title			VARCHAR(50),
    Year			CHAR(4),
    Duration		CHAR(5),
    Rating			VARCHAR(5),
    Release_Date	DATE,
    Genre			VARCHAR(15),
    Description	    VARCHAR(300),
    PRIMARY KEY(Title)
);
CREATE TABLE SHOWTIME (
    Showtime_ID	    INT AUTO_INCREMENT,
    Auditorium		VARCHAR(20),
    Cinema          VARCHAR(20),
    Movie			VARCHAR(50),
    Show_Date		DATE,
    Start_Time		TIME,
    End_Time		TIME,
    Format			VARCHAR(8),
    PRIMARY KEY(Showtime_ID)
);
DELETE FROM CINEMA;
DELETE FROM AUDITORIUM;
DELETE FROM MOVIE;
DELETE FROM SHOWTIME;
