SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema origami
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `origami` ;

-- -----------------------------------------------------
-- Schema origami
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `origami` DEFAULT CHARACTER SET utf8 ;
USE `origami` ;

-- -----------------------------------------------------
-- Table `origami`.`COMMENTS`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `origami`.`comments` ;

CREATE TABLE IF NOT EXISTS `origami`.`comments` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `comment` TEXT(255) NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL,
  `origamis_id` INT UNSIGNED NULL,
  `users_id` INT UNSIGNED NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_COMMENT_USERS_idx` (`users_id` ASC),
  INDEX `fk_COMMENT_ORIGAMIS_idx` (`origamis_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `origami`.`ORIGAMIS`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `origami`.`origamis` ;

CREATE TABLE IF NOT EXISTS `origami`.`origamis` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(42) NULL,
  `description` VARCHAR(255) NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL,
  `users_id` INT UNSIGNED NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_ORIGAMI_USERS_idx` (`users_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `origami`.`USERS`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `origami`.`users` ;

CREATE TABLE IF NOT EXISTS `origami`.`users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(42) NULL,
  `email` VARCHAR(42) NOT NULL,
  `password` VARCHAR(64) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
