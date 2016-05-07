-- MySQL Script generated by MySQL Workbench
-- 05/07/16 16:17:06
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema canchaya
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema canchaya
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `canchaya` DEFAULT CHARACTER SET utf8 ;
USE `canchaya` ;

-- -----------------------------------------------------
-- Table `canchaya`.`provincia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `canchaya`.`provincia` (
  `id` INT NOT NULL,
  `provincia_nombre` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `canchaya`.`ciudad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `canchaya`.`ciudad` (
  `id` INT NOT NULL,
  `ciudad_nombre` VARCHAR(40) NOT NULL,
  `cp` SMALLINT NOT NULL,
  `id_provincia` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `cp` (`cp` ASC),
  INDEX `id_provincia` (`id_provincia` ASC),
  CONSTRAINT `fk_ciudad_provincia1`
    FOREIGN KEY (`id_provincia`)
    REFERENCES `canchaya`.`provincia` (`id`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `canchaya`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `canchaya`.`usuario` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(40) CHARACTER SET 'utf8' NOT NULL,
  `email` VARCHAR(40) CHARACTER SET 'utf8' NOT NULL,
  `password` VARCHAR(40) CHARACTER SET 'utf8' NOT NULL,
  `fecha_creacion` DATETIME NOT NULL,
  `password_resets` VARCHAR(40) CHARACTER SET 'utf8' NOT NULL,
  UNIQUE INDEX `id` (`id` ASC),
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `canchaya`.`establecimiento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `canchaya`.`establecimiento` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(40) CHARACTER SET 'utf8' NOT NULL,
  `direccion` VARCHAR(80) CHARACTER SET 'utf8' NOT NULL,
  `tienevestuario` TINYINT(1) NOT NULL,
  `id_ciudad` INT NOT NULL,
  `id_usuario` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_establecimiento_ciudad1_idx` (`id_ciudad` ASC),
  INDEX `id_usuario` (`id_usuario` ASC),
  CONSTRAINT `fk_establecimiento_ciudad1`
    FOREIGN KEY (`id_ciudad`)
    REFERENCES `canchaya`.`ciudad` (`id`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_establecimiento_usuario`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `canchaya`.`usuario` (`id`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `canchaya`.`cancha`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `canchaya`.`cancha` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_establecimiento` INT NOT NULL,
  `nombre_cancha` VARCHAR(40) CHARACTER SET 'utf8' NOT NULL,
  `cant_jugadores` TINYINT NOT NULL,
  `tiene_luz` TINYINT(1) NOT NULL,
  `techada` TINYINT(1) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `INDEX` (`id_establecimiento` ASC),
  CONSTRAINT `fk_cancha`
    FOREIGN KEY (`id_establecimiento`)
    REFERENCES `canchaya`.`establecimiento` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `canchaya`.`migrations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `canchaya`.`migrations` (
  `migration` VARCHAR(255) CHARACTER SET 'utf8' NOT NULL,
  `batch` INT(11) NOT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `canchaya`.`deporte`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `canchaya`.`deporte` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `deporte` VARCHAR(40) CHARACTER SET 'utf8' NOT NULL,
  `id_cancha` INT NOT NULL,
  PRIMARY KEY (`id`, `id_cancha`),
  INDEX `fk_deporte_cancha_cancha1_idx` (`id_cancha` ASC),
  CONSTRAINT `fk_deporte_cancha_cancha1`
    FOREIGN KEY (`id_cancha`)
    REFERENCES `canchaya`.`cancha` (`id`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `canchaya`.`turno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `canchaya`.`turno` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_cancha` INT NOT NULL,
  `fecha_inicio` DATETIME NOT NULL,
  `fecha_fin` DATETIME NOT NULL,
  `precio_cancha` DOUBLE NOT NULL,
  `adic_luz` TINYINT(1) NOT NULL,
  `precio_adicional` DOUBLE NOT NULL,
  `confirmado` TINYINT(1) NOT NULL,
  `pagado` TINYINT(1) NULL,
  `id_usuario` INT UNSIGNED NOT NULL,
  `estado` TINYINT NULL COMMENT 'estado para decir si un turno esta aprobado, rechazado,cancelado, finalizado',
  PRIMARY KEY (`id`, `id_usuario`),
  INDEX `INDEX` (`id_cancha` ASC),
  INDEX `fk_turno_usuario1_idx` (`id_usuario` ASC),
  CONSTRAINT `fk_turno`
    FOREIGN KEY (`id_cancha`)
    REFERENCES `canchaya`.`cancha` (`id`),
  CONSTRAINT `fk_turno_usuario1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `canchaya`.`usuario` (`id`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `canchaya`.`Superficie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `canchaya`.`Superficie` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `superficie` VARCHAR(45) NOT NULL,
  `id_cancha` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_cancha` (`id_cancha` ASC),
  CONSTRAINT `fk_superficie_cancha`
    FOREIGN KEY (`id_cancha`)
    REFERENCES `canchaya`.`cancha` (`id`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
