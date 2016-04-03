DROP DATABASE IF EXISTS social_db1;

CREATE DATABASE social_db1;

USE social_db1;

CREATE TABLE social_user (
  user_id INT AUTO_INCREMENT,
  username VARCHAR(32),
  password VARCHAR(40),
  join_date DATETIME,
  first_name VARCHAR(32),
  last_name VARCHAR(32),
  gender VARCHAR(1),
  birthdate DATE,
  city VARCHAR(32),
  state VARCHAR(2),
  picture VARCHAR(32),
  PRIMARY KEY (user_id)
);


GRANT SELECT, INSERT, DELETE, UPDATE
ON social_db1.*
TO admin@localhost
IDENTIFIED BY 'pass@word';

INSERT INTO social_user VALUES (1, 'peter', 'a9993e364706816aba3e25717850c26c9cd0d89d', '2014-03-29 22:22:10', 'Peter', 'Paul', 'M', '1980-01-01', 'Fremont', 'CA', 'Peter-Paul.jpg');
INSERT INTO social_user VALUES (2, 'nancy', 'a9993e364706816aba3e25717850c26c9cd0d89d', '2014-03-29 22:24:56', 'Nancy', 'Clark', 'F', '1980-02-02', 'Fremont', 'CA', 'Nancy-Clark.jpg');
INSERT INTO social_user VALUES (3, 'jones', 'a9993e364706816aba3e25717850c26c9cd0d89d', '2014-03-29 22:26:16', 'Jones', 'Wang', 'M', '1980-03-03', 'Fremont', 'CA', 'Jones-Wang.jpg');
INSERT INTO social_user VALUES (4, 'jade', 'a9993e364706816aba3e25717850c26c9cd0d89d', '2014-03-29 22:27:21', 'Jade', 'Queen', 'F', '1980-04-04', 'Fremont', 'CA', 'Jade-Queen.jpg');
INSERT INTO social_user VALUES (5, 'see', 'a9993e364706816aba3e25717850c26c9cd0d89d', '2014-03-29 22:28:25', 'See', 'Summers', 'M', '1980-05-05', 'Fremont', 'CA', 'See-Summers.jpg');
INSERT INTO social_user VALUES (6, 'tom', 'a9993e364706816aba3e25717850c26c9cd0d89d', '2014-03-29 22:30:05', 'Tom', 'Lee', 'M', '1980-06-06', 'Fremont', 'CA', 'Tom-Lee.jpg');
