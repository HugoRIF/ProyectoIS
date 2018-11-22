-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
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
  `idTipoU` INT(11) NOT NULL AUTO_INCREMENT,
  `TipoU` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idTipoU`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ProyectoIs`.`USUARIO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ProyectoIs`.`USUARIO` (
  `idUsuario` INT(11) NOT NULL AUTO_INCREMENT,
  `NombreU` VARCHAR(45) NOT NULL,
  `Contraseña` VARCHAR(45) NOT NULL,
  `Correo` VARCHAR(45) NOT NULL,
  `Tipo` INT(11) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  INDEX `fk_USUARIO_TIPO_USUARIO_idx` (`Tipo` ASC) ,
  CONSTRAINT `fk_USUARIO_TIPO_USUARIO`
    FOREIGN KEY (`Tipo`)
    REFERENCES `ProyectoIs`.`TIPO_USUARIO` (`idTipoU`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 12
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ProyectoIs`.`ESTUDIO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ProyectoIs`.`ESTUDIO` (
  `idEstudio` INT(11) NOT NULL AUTO_INCREMENT,
  `NombreEs` VARCHAR(45) NOT NULL,
  `DescripcionEs` VARCHAR(200) NOT NULL,
  `idAdminEstudio` INT(11) NOT NULL,
  PRIMARY KEY (`idEstudio`),
  INDEX `fk_ESTUDIO_USUARIO1_idx` (`idAdminEstudio` ASC) ,
  CONSTRAINT `fk_ESTUDIO_USUARIO1`
    FOREIGN KEY (`idAdminEstudio`)
    REFERENCES `ProyectoIs`.`USUARIO` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 13
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ProyectoIs`.`CUESTIONARIO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ProyectoIs`.`CUESTIONARIO` (
  `idCuestionario` INT(11) NOT NULL AUTO_INCREMENT,
  `Cuestionario` VARCHAR(200) NOT NULL,
  `idEstudio` INT(11) NOT NULL,
  PRIMARY KEY (`idCuestionario`),
  INDEX `fk_CUESTIONARIO_ESTUDIO1_idx` (`idEstudio` ASC) ,
  CONSTRAINT `fk_CUESTIONARIO_ESTUDIO1`
    FOREIGN KEY (`idEstudio`)
    REFERENCES `ProyectoIs`.`ESTUDIO` (`idEstudio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ProyectoIs`.`ESTUDIOS_DE_ENCUESTADOR`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ProyectoIs`.`ESTUDIOS_DE_ENCUESTADOR` (
  `idE_ENcuest` INT NOT NULL AUTO_INCREMENT,
  `idEncuestador` INT(11) NOT NULL,
  `idEstudio` INT(11) NOT NULL,
  PRIMARY KEY (`idE_ENcuest`, `idEncuestador`, `idEstudio`),
  INDEX `fk_USUARIO_has_ESTUDIO_ESTUDIO1_idx` (`idEstudio` ASC) ,
  INDEX `fk_USUARIO_has_ESTUDIO_USUARIO1_idx` (`idEncuestador` ASC) ,
  CONSTRAINT `fk_USUARIO_has_ESTUDIO_USUARIO1`
    FOREIGN KEY (`idEncuestador`)
    REFERENCES `ProyectoIs`.`USUARIO` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_USUARIO_has_ESTUDIO_ESTUDIO1`
    FOREIGN KEY (`idEstudio`)
    REFERENCES `ProyectoIs`.`ESTUDIO` (`idEstudio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ProyectoIs`.`CUESTIONARIO_CONTEST`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ProyectoIs`.`CUESTIONARIO_CONTEST` (
  `idCuestionarioC` INT(11) NOT NULL,
  `CuestionarioC` VARCHAR(200) NULL DEFAULT NULL,
  `idCuestionario` INT(11) NOT NULL,
  `idE_ENcuest` INT NOT NULL,
  PRIMARY KEY (`idCuestionarioC`),
  INDEX `fk_CUESTIONARIO_CONTEST_CUESTIONARIO1_idx` (`idCuestionario` ASC) ,
  INDEX `fk_CUESTIONARIO_CONTEST_ESTUDIOS_DE_ENCUESTADOR1_idx` (`idE_ENcuest` ASC) ,
  CONSTRAINT `fk_CUESTIONARIO_CONTEST_CUESTIONARIO1`
    FOREIGN KEY (`idCuestionario`)
    REFERENCES `ProyectoIs`.`CUESTIONARIO` (`idCuestionario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_CUESTIONARIO_CONTEST_ESTUDIOS_DE_ENCUESTADOR1`
    FOREIGN KEY (`idE_ENcuest`)
    REFERENCES `ProyectoIs`.`ESTUDIOS_DE_ENCUESTADOR` (`idE_ENcuest`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ProyectoIs`.`TIPO_PREGUNTA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ProyectoIs`.`TIPO_PREGUNTA` (
  `idTipoP` INT(11) NOT NULL AUTO_INCREMENT,
  `TipoP` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTipoP`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ProyectoIs`.`PREGUNTA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ProyectoIs`.`PREGUNTA` (
  `idPregunta` INT(11) NOT NULL AUTO_INCREMENT,
  `Pregunta` VARCHAR(100) NOT NULL,
  `idTipoP` INT(11) NOT NULL,
  `idEstudio` INT(11) NOT NULL,
  PRIMARY KEY (`idPregunta`),
  INDEX `fk_PREGUNTA_TIPO_PREGUNTA1_idx` (`idTipoP` ASC) ,
  INDEX `fk_PREGUNTA_ESTUDIO1_idx` (`idEstudio` ASC) ,
  CONSTRAINT `fk_PREGUNTA_ESTUDIO1`
    FOREIGN KEY (`idEstudio`)
    REFERENCES `ProyectoIs`.`ESTUDIO` (`idEstudio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PREGUNTA_TIPO_PREGUNTA1`
    FOREIGN KEY (`idTipoP`)
    REFERENCES `ProyectoIs`.`TIPO_PREGUNTA` (`idTipoP`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ProyectoIs`.`RESPUESTA_PREE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ProyectoIs`.`RESPUESTA_PREE` (
  `idRespuestaPre` INT(11) NOT NULL AUTO_INCREMENT,
  `RespuestaPree` VARCHAR(100) NOT NULL,
  `idPregunta` INT(11) NOT NULL,
  PRIMARY KEY (`idRespuestaPre`),
  INDEX `fk_RESPUESTA_PREE_PREGUNTA1_idx` (`idPregunta` ASC) ,
  CONSTRAINT `fk_RESPUESTA_PREE_PREGUNTA1`
    FOREIGN KEY (`idPregunta`)
    REFERENCES `ProyectoIs`.`PREGUNTA` (`idPregunta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ProyectoIs`.`RESPUESTA_CAMPO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ProyectoIs`.`RESPUESTA_CAMPO` (
  `idRespuestaC` INT(11) NOT NULL AUTO_INCREMENT,
  `RespuestaC` VARCHAR(45) NOT NULL,
  `idRespuestaPre` INT(11) NOT NULL,
  `idCuestionarioC` INT(11) NOT NULL,
  PRIMARY KEY (`idRespuestaC`),
  INDEX `fk_RESPUESTA_CAMPO_RESPUESTA_PREE1_idx` (`idRespuestaPre` ASC) ,
  INDEX `fk_RESPUESTA_CAMPO_CUESTIONARIO_CONTEST1_idx` (`idCuestionarioC` ASC) ,
  CONSTRAINT `fk_RESPUESTA_CAMPO_CUESTIONARIO_CONTEST1`
    FOREIGN KEY (`idCuestionarioC`)
    REFERENCES `ProyectoIs`.`CUESTIONARIO_CONTEST` (`idCuestionarioC`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_RESPUESTA_CAMPO_RESPUESTA_PREE1`
    FOREIGN KEY (`idRespuestaPre`)
    REFERENCES `ProyectoIs`.`RESPUESTA_PREE` (`idRespuestaPre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
