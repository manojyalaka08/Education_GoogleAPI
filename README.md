# Education_GoogleAPI
Project for college websites
PROJECT SCHEMA: 
create database project;
use project;

CREATE TABLE `studentdetails` (
 `UserName` varchar(50) DEFAULT NULL,
 `CourseName` varchar(50) DEFAULT NULL,
 `InstructorName` varchar(50) DEFAULT NULL,
 `Grade` varchar(50) DEFAULT NULL,
 `Semester` varchar(50) DEFAULT NULL,
 `Year` varchar(50) DEFAULT NULL,
 `InstructorRating` varchar(50) DEFAULT NULL,
 `comments` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8




CREATE TABLE `users` (
 `UserType` varchar(50) DEFAULT NULL,
 `UserName` varchar(50) DEFAULT NULL,
 `Password` varchar(50) DEFAULT NULL,
 `UserFirstName` varchar(50) DEFAULT NULL,
 `UserLastName` varchar(50) DEFAULT NULL,
 `Gender` varchar(50) DEFAULT NULL,
 `CountryCitizenship` varchar(50) DEFAULT NULL,
 `Department` varchar(50) DEFAULT NULL,
 `EmailID` varchar(50) DEFAULT NULL,
 `Year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8
