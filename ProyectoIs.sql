
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema ProyectoIs
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema ProyectoIs
-- -----------------------------------------------------
CREATE DATABASE IF NOT EXISTS `ProyectoIs` DEFAULT CHARACTER SET utf8 ;
USE `ProyectoIs` ;

-- -----------------------------------------------------
-- Table `ProyectoIs`.`TIPO_USUARIO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ProyectoIs`.`TIPO_USUARIO` (
  `idTipoU` INT NOT NULL AUTO_INCREMENT,
  `TipoU` VARCHAR(45) NULL,
  PRIMARY KEY (`idTipoU`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ProyectoIs`.`USUARIO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ProyectoIs`.`USUARIO` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `NombreU` VARCHAR(45) NOT NULL,
  `Contraseña` VARCHAR(45) NOT NULL,
  `Correo` VARCHAR(45) NOT NULL,
  `Tipo` INT NOT NULL,
  PRIMARY KEY (`idUsuario`),
  INDEX `fk_USUARIO_TIPO_USUARIO_idx` (`Tipo` ASC) ,
  CONSTRAINT `fk_USUARIO_TIPO_USUARIO`
    FOREIGN KEY (`Tipo`)
    REFERENCES `ProyectoIs`.`TIPO_USUARIO` (`idTipoU`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ProyectoIs`.`ESTUDIO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ProyectoIs`.`ESTUDIO` (
  `idEstudio` INT NOT NULL AUTO_INCREMENT,
  `NombreEs` VARCHAR(45) NOT NULL,
  `DescripcionEs` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`idEstudio`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ProyectoIs`.`TIPO_PREGUNTA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ProyectoIs`.`TIPO_PREGUNTA` (
  `idTipoP` INT NOT NULL AUTO_INCREMENT,
  `TipoP` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTipoP`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ProyectoIs`.`PREGUNTA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ProyectoIs`.`PREGUNTA` (
  `idPregunta` INT NOT NULL AUTO_INCREMENT,
  `Pregunta` VARCHAR(100) NOT NULL,
  `idTipoP` INT NOT NULL,
  `idEstudio` INT NOT NULL,
  PRIMARY KEY (`idPregunta`),
  INDEX `fk_PREGUNTA_TIPO_PREGUNTA1_idx` (`idTipoP` ASC) ,
  INDEX `fk_PREGUNTA_ESTUDIO1_idx` (`idEstudio` ASC) ,
  CONSTRAINT `fk_PREGUNTA_TIPO_PREGUNTA1`
    FOREIGN KEY (`idTipoP`)
    REFERENCES `ProyectoIs`.`TIPO_PREGUNTA` (`idTipoP`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PREGUNTA_ESTUDIO1`
    FOREIGN KEY (`idEstudio`)
    REFERENCES `ProyectoIs`.`ESTUDIO` (`idEstudio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ProyectoIs`.`RESPUESTA_PREE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ProyectoIs`.`RESPUESTA_PREE` (
  `idRespuestaPre` INT NOT NULL AUTO_INCREMENT,
  `RespuestaPree` VARCHAR(100) NOT NULL,
  `idPregunta` INT NOT NULL,
  PRIMARY KEY (`idRespuestaPre`),
  INDEX `fk_RESPUESTA_PREE_PREGUNTA1_idx` (`idPregunta` ASC) ,
  CONSTRAINT `fk_RESPUESTA_PREE_PREGUNTA1`
    FOREIGN KEY (`idPregunta`)
    REFERENCES `ProyectoIs`.`PREGUNTA` (`idPregunta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ProyectoIs`.`CUESTIONARIO_CONTEST`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ProyectoIs`.`CUESTIONARIO_CONTEST` (
  `idCuestionarioC` INT NOT NULL,
  `CuestionarioC` VARCHAR(200) NULL,
  `idEstudio` INT NOT NULL,
  PRIMARY KEY (`idCuestionarioC`),
  INDEX `fk_CUESTIONARIO_CONTEST_ESTUDIO1_idx` (`idEstudio` ASC) ,
  CONSTRAINT `fk_CUESTIONARIO_CONTEST_ESTUDIO1`
    FOREIGN KEY (`idEstudio`)
    REFERENCES `ProyectoIs`.`ESTUDIO` (`idEstudio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ProyectoIs`.`RESPUESTA_CAMPO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ProyectoIs`.`RESPUESTA_CAMPO` (
  `idRespuestaC` INT NOT NULL AUTO_INCREMENT,
  `RespuestaC` VARCHAR(45) NOT NULL,
  `idRespuestaPre` INT NOT NULL,
  `idCuestionarioC` INT NOT NULL,
  PRIMARY KEY (`idRespuestaC`),
  INDEX `fk_RESPUESTA_CAMPO_RESPUESTA_PREE1_idx` (`idRespuestaPre` ASC) ,
  INDEX `fk_RESPUESTA_CAMPO_CUESTIONARIO_CONTEST1_idx` (`idCuestionarioC` ASC) ,
  CONSTRAINT `fk_RESPUESTA_CAMPO_RESPUESTA_PREE1`
    FOREIGN KEY (`idRespuestaPre`)
    REFERENCES `ProyectoIs`.`RESPUESTA_PREE` (`idRespuestaPre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_RESPUESTA_CAMPO_CUESTIONARIO_CONTEST1`
    FOREIGN KEY (`idCuestionarioC`)
    REFERENCES `ProyectoIs`.`CUESTIONARIO_CONTEST` (`idCuestionarioC`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ProyectoIs`.`ESTUDIOS_DE USUARIO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ProyectoIs`.`ESTUDIOS_DE USUARIO` (
  `idEdU` INT NOT NULL AUTO_INCREMENT,
  `USUARIO_idUsuario` INT NOT NULL,
  `ESTUDIO_idEstudio` INT NOT NULL,
  PRIMARY KEY (`idEdU`, `USUARIO_idUsuario`, `ESTUDIO_idEstudio`),
  INDEX `fk_USUARIO_has_ESTUDIO_ESTUDIO1_idx` (`ESTUDIO_idEstudio` ASC) ,
  INDEX `fk_USUARIO_has_ESTUDIO_USUARIO1_idx` (`USUARIO_idUsuario` ASC) ,
  CONSTRAINT `fk_USUARIO_has_ESTUDIO_USUARIO1`
    FOREIGN KEY (`USUARIO_idUsuario`)
    REFERENCES `ProyectoIs`.`USUARIO` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_USUARIO_has_ESTUDIO_ESTUDIO1`
    FOREIGN KEY (`ESTUDIO_idEstudio`)
    REFERENCES `ProyectoIs`.`ESTUDIO` (`idEstudio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
