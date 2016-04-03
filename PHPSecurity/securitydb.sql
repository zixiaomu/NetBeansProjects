DROP DATABASE IF EXISTS securitydb;
CREATE DATABASE securitydb;
USE securitydb;
 
CREATE TABLE users (
  userID            INT            NOT NULL   AUTO_INCREMENT,
  username          VARCHAR(255)   NOT NULL,
  password          VARCHAR(255)   NOT NULL,
  PRIMARY KEY (userID),
  UNIQUE (username)
);

GRANT SELECT, INSERT, DELETE, UPDATE
ON securitydb.*
TO admin@localhost
IDENTIFIED BY 'pass@word';
