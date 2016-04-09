
DROP DATABASE IF EXISTS food_db2;

CREATE DATABASE food_db2;

USE food_db2;
 

CREATE TABLE categories (
  categorieID       INT(11)        NOT NULL   AUTO_INCREMENT,
  categorieName     VARCHAR(255)   NOT NULL,
  PRIMARY KEY (categorieID)
);


CREATE TABLE foods (
  foodID           INT(11)        NOT NULL   AUTO_INCREMENT,
  categorieID      INT(11)        NOT NULL,
  isbn             VARCHAR(20)    NOT NULL   UNIQUE,
  foodTitle         VARCHAR(255)   NOT NULL,
  foodPrice        DECIMAL(10,2)  NOT NULL,
  PRIMARY KEY (foodID)
);


INSERT INTO categories VALUES
(1, 'Breakfast'),
(2, 'Lunch'),
(3, 'Dinner'),
(4, 'Drinks');



INSERT INTO foods VALUES
(1, 1, '1010101010', 'Old Timer Breakfast', '6.99'),
(2, 2, '1010101011', 'Shrimp Salad', '9.99'),
(3, 3, '1010101102', 'New York Steak', '25.17'),
(5, 1, '1010101103', 'Egg-And-Avocado', '5.99'),
(6, 2, '1010101104', 'Chao Mian', '8.99'),
(7, 3, '1010101105', 'Turkey-Dinner', '12.99'),
(8, 1, '1010101106', 'French Breakfast', '4.99'),
(9, 4, '1010101107', 'SODA', '4.99'),
(10, 4, '1010101108', 'Water', '0.99');

CREATE TABLE users (
  userID            INT            NOT NULL   AUTO_INCREMENT,
  username          VARCHAR(255)   NOT NULL,
  password          VARCHAR(255)   NOT NULL,
  PRIMARY KEY (userID),
  UNIQUE (username)
);





GRANT SELECT, INSERT, DELETE, UPDATE
ON food_db2.*
TO admin@localhost
IDENTIFIED BY 'pass@word';


GRANT SELECT
ON foods
TO peter@localhost
IDENTIFIED BY 'pass@word';
