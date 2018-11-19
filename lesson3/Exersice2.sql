CREATE SCHEMA `world` ;

CREATE TABLE `world`.`country` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Code` VARCHAR(45) NULL,
  `Name` VARCHAR(45) NULL,
  `Region` VARCHAR(45) NULL,
  `Population` VARCHAR(45) NULL,
  `Capital` VARCHAR(45) NULL,
  PRIMARY KEY (`id`));

CREATE TABLE `world`.`city` (
  `id` INT NOT NULL,
  `Name` VARCHAR(45) NULL,
  `CountryCode` VARCHAR(45) NULL,
  PRIMARY KEY (`id`));

CREATE TABLE `world`.`countrylanguage` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Language` VARCHAR(45) NULL,
  `CountryCode` VARCHAR(45) NULL,
  `IsOfficial` VARCHAR(45) NULL,
  PRIMARY KEY (`id`));
