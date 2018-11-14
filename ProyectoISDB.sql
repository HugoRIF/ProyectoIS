-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema ReproductorDB
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema ReproductorDB
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ReproductorDB` DEFAULT CHARACTER SET utf8 ;
USE `ReproductorDB` ;

-- -----------------------------------------------------
-- Table `ReproductorDB`.`ARTISTA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ReproductorDB`.`ARTISTA` (
  `idArtista` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Artista` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idArtista`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ReproductorDB`.`ALBUM`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ReproductorDB`.`ALBUM` (
  `idAlbum` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre_album` VARCHAR(45) NOT NULL,
  `Fecha` VARCHAR(45) NOT NULL,
  `Num-Canciones` INT(11) NOT NULL,
  `dArtista` INT(11) NOT NULL,
  PRIMARY KEY (`idAlbum`),
  INDEX `fk_Album_Artista1_idx` (`dArtista` ASC) VISIBLE,
  CONSTRAINT `fk_Album_Artista1`
    FOREIGN KEY (`dArtista`)
    REFERENCES `ReproductorDB`.`ARTISTA` (`idArtista`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ReproductorDB`.`GENERO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ReproductorDB`.`GENERO` (
  `idGenero` INT NOT NULL AUTO_INCREMENT,
  `Genero` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`idGenero`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ReproductorDB`.`CANCION`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ReproductorDB`.`CANCION` (
  `idCancion` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Cancion` VARCHAR(45) NOT NULL,
  `Duracion_Cancion` VARCHAR(45) NOT NULL,
  `Direccion_SRC` VARCHAR(200) NOT NULL,
  `Artista_idArtista` INT(11) NOT NULL,
  `Album_idAlbum` INT(11) NOT NULL,
  `GENERO_idGenero` INT NOT NULL,
  PRIMARY KEY (`idCancion`),
  INDEX `fk_Cancion_Artista1_idx` (`Artista_idArtista` ASC) VISIBLE,
  INDEX `fk_Cancion_Album1_idx` (`Album_idAlbum` ASC) VISIBLE,
  INDEX `fk_CANCION_GENERO1_idx` (`GENERO_idGenero` ASC) VISIBLE,
  CONSTRAINT `fk_Cancion_Album1`
    FOREIGN KEY (`Album_idAlbum`)
    REFERENCES `ReproductorDB`.`ALBUM` (`idAlbum`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Cancion_Artista1`
    FOREIGN KEY (`Artista_idArtista`)
    REFERENCES `ReproductorDB`.`ARTISTA` (`idArtista`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_CANCION_GENERO1`
    FOREIGN KEY (`GENERO_idGenero`)
    REFERENCES `ReproductorDB`.`GENERO` (`idGenero`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ReproductorDB`.`TIPO_USUARIO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ReproductorDB`.`TIPO_USUARIO` (
  `idTipoU` INT NOT NULL AUTO_INCREMENT,
  `Tipo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTipoU`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ReproductorDB`.`USUARIO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ReproductorDB`.`USUARIO` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NOT NULL,
  `Contraseña` VARCHAR(45) NOT NULL,
  `Correo` VARCHAR(45) NOT NULL,
  `idTipo` INT NOT NULL,
  PRIMARY KEY (`idUsuario`),
  INDEX `fk_USUARIO_TIPO_USUARIO1_idx` (`idTipo` ASC) VISIBLE,
  CONSTRAINT `fk_USUARIO_TIPO_USUARIO1`
    FOREIGN KEY (`idTipo`)
    REFERENCES `ReproductorDB`.`TIPO_USUARIO` (`idTipoU`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ReproductorDB`.`PLAYLIST`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ReproductorDB`.`PLAYLIST` (
  `idPlayList` INT(11) NOT NULL,
  `Nombre_PlayList` VARCHAR(45) NOT NULL,
  `Cantidad_Canciones` INT(11) NOT NULL,
  `Usuario_idUsuario` INT(11) NOT NULL,
  PRIMARY KEY (`idPlayList`),
  INDEX `fk_PlayList_Usuario1_idx` (`Usuario_idUsuario` ASC) VISIBLE,
  CONSTRAINT `fk_PlayList_Usuario1`
    FOREIGN KEY (`Usuario_idUsuario`)
    REFERENCES `ReproductorDB`.`USUARIO` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ReproductorDB`.`PLAYLIST_CON_CANCIONES`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ReproductorDB`.`PLAYLIST_CON_CANCIONES` (
  `idPl_c_C` VARCHAR(45) NOT NULL,
  `PlayList_idPlayList` INT(11) NOT NULL,
  `Cancion_idCancion` INT(11) NOT NULL,
  PRIMARY KEY (`idPl_c_C`, `PlayList_idPlayList`, `Cancion_idCancion`),
  INDEX `fk_PlayList_has_Cancion_Cancion1_idx` (`Cancion_idCancion` ASC) VISIBLE,
  INDEX `fk_PlayList_has_Cancion_PlayList1_idx` (`PlayList_idPlayList` ASC) VISIBLE,
  CONSTRAINT `fk_PlayList_has_Cancion_Cancion1`
    FOREIGN KEY (`Cancion_idCancion`)
    REFERENCES `ReproductorDB`.`CANCION` (`idCancion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PlayList_has_Cancion_PlayList1`
    FOREIGN KEY (`PlayList_idPlayList`)
    REFERENCES `ReproductorDB`.`PLAYLIST` (`idPlayList`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ReproductorDB`.`GENERO_DE_ARTISTA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ReproductorDB`.`GENERO_DE_ARTISTA` (
  `idG_d_A` INT NOT NULL AUTO_INCREMENT,
  `GENERO_idGenero` INT NOT NULL,
  `ARTISTA_idArtista` INT(11) NOT NULL,
  PRIMARY KEY (`idG_d_A`, `GENERO_idGenero`, `ARTISTA_idArtista`),
  INDEX `fk_GENERO_has_ARTISTA_ARTISTA1_idx` (`ARTISTA_idArtista` ASC) VISIBLE,
  INDEX `fk_GENERO_has_ARTISTA_GENERO1_idx` (`GENERO_idGenero` ASC) VISIBLE,
  CONSTRAINT `fk_GENERO_has_ARTISTA_GENERO1`
    FOREIGN KEY (`GENERO_idGenero`)
    REFERENCES `ReproductorDB`.`GENERO` (`idGenero`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_GENERO_has_ARTISTA_ARTISTA1`
    FOREIGN KEY (`ARTISTA_idArtista`)
    REFERENCES `ReproductorDB`.`ARTISTA` (`idArtista`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ReproductorDB`.`TIPO_USUARIO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ReproductorDB`.`TIPO_USUARIO` (
  `idTipoU` INT NOT NULL AUTO_INCREMENT,
  `Tipo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTipoU`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ReproductorDB`.`USUARIO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ReproductorDB`.`USUARIO` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NOT NULL,
  `Contraseña` VARCHAR(45) NOT NULL,
  `Correo` VARCHAR(45) NOT NULL,
  `idTipo` INT NOT NULL,
  PRIMARY KEY (`idUsuario`),
  INDEX `fk_USUARIO_TIPO_USUARIO1_idx` (`idTipo` ASC) VISIBLE,
  CONSTRAINT `fk_USUARIO_TIPO_USUARIO1`
    FOREIGN KEY (`idTipo`)
    REFERENCES `ReproductorDB`.`TIPO_USUARIO` (`idTipoU`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ReproductorDB`.`ESTUDIO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ReproductorDB`.`ESTUDIO` (
  `idEstudio` INT NOT NULL AUTO_INCREMENT,
  `Nombre_Estudio` VARCHAR(45) NOT NULL,
  `Descripcion` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`idEstudio`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ReproductorDB`.`TIPO_PREGUNTA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ReproductorDB`.`TIPO_PREGUNTA` (
  `idTipoP` INT NOT NULL AUTO_INCREMENT,
  `Tipo_Pregunta` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTipoP`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ReproductorDB`.`PREGUNTA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ReproductorDB`.`PREGUNTA` (
  `idPREGUNTA` INT NOT NULL AUTO_INCREMENT,
  `PREGUNTA` VARCHAR(45) NOT NULL,
  `ESTUDIO_idEstudio` INT NOT NULL,
  `TIPO_PREGUNTA_idTipoP` INT NOT NULL,
  PRIMARY KEY (`idPREGUNTA`),
  INDEX `fk_PREGUNTA_ESTUDIO1_idx` (`ESTUDIO_idEstudio` ASC) VISIBLE,
  INDEX `fk_PREGUNTA_TIPO_PREGUNTA1_idx` (`TIPO_PREGUNTA_idTipoP` ASC) VISIBLE,
  CONSTRAINT `fk_PREGUNTA_ESTUDIO1`
    FOREIGN KEY (`ESTUDIO_idEstudio`)
    REFERENCES `ReproductorDB`.`ESTUDIO` (`idEstudio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PREGUNTA_TIPO_PREGUNTA1`
    FOREIGN KEY (`TIPO_PREGUNTA_idTipoP`)
    REFERENCES `ReproductorDB`.`TIPO_PREGUNTA` (`idTipoP`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ReproductorDB`.`RESP_PREESTAB`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ReproductorDB`.`RESP_PREESTAB` (
  `idRespuestaP` INT NOT NULL AUTO_INCREMENT,
  `Respuesta` VARCHAR(45) NOT NULL,
  `PREGUNTA_idPREGUNTA` INT NOT NULL,
  PRIMARY KEY (`idRespuestaP`),
  INDEX `fk_RESP_PREESTAB_PREGUNTA1_idx` (`PREGUNTA_idPREGUNTA` ASC) VISIBLE,
  CONSTRAINT `fk_RESP_PREESTAB_PREGUNTA1`
    FOREIGN KEY (`PREGUNTA_idPREGUNTA`)
    REFERENCES `ReproductorDB`.`PREGUNTA` (`idPREGUNTA`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ReproductorDB`.`CUESTIONARIO_CONTESTADO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ReproductorDB`.`CUESTIONARIO_CONTESTADO` (
  `idCuest_Cotes` INT NOT NULL AUTO_INCREMENT,
  `Cuestionario` VARCHAR(45) NULL,
  `ESTUDIO_idEstudio` INT NOT NULL,
  PRIMARY KEY (`idCuest_Cotes`),
  INDEX `fk_CUESTIONARIO_CONTESTADO_ESTUDIO1_idx` (`ESTUDIO_idEstudio` ASC) VISIBLE,
  CONSTRAINT `fk_CUESTIONARIO_CONTESTADO_ESTUDIO1`
    FOREIGN KEY (`ESTUDIO_idEstudio`)
    REFERENCES `ReproductorDB`.`ESTUDIO` (`idEstudio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ReproductorDB`.`RESP_CAMPO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ReproductorDB`.`RESP_CAMPO` (
  `idResp_Camp` INT NOT NULL AUTO_INCREMENT,
  `RespuestaC` VARCHAR(45) NULL,
  `RESP_PREESTAB_idRespuestaP` INT NOT NULL,
  PRIMARY KEY (`idResp_Camp`),
  INDEX `fk_RESP_CAMPO_RESP_PREESTAB1_idx` (`RESP_PREESTAB_idRespuestaP` ASC) VISIBLE,
  CONSTRAINT `fk_RESP_CAMPO_RESP_PREESTAB1`
    FOREIGN KEY (`RESP_PREESTAB_idRespuestaP`)
    REFERENCES `ReproductorDB`.`RESP_PREESTAB` (`idRespuestaP`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ReproductorDB`.`ESTUDIOS_DE_USUARIOS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ReproductorDB`.`ESTUDIOS_DE_USUARIOS` (
  `idEstudio_de_Usuario` VARCHAR(45) NOT NULL,
  `USUARIO_idUsuario` INT NOT NULL,
  `ESTUDIO_idEstudio` INT NOT NULL,
  PRIMARY KEY (`USUARIO_idUsuario`, `ESTUDIO_idEstudio`),
  INDEX `fk_USUARIO_has_ESTUDIO_ESTUDIO1_idx` (`ESTUDIO_idEstudio` ASC) VISIBLE,
  INDEX `fk_USUARIO_has_ESTUDIO_USUARIO1_idx` (`USUARIO_idUsuario` ASC) VISIBLE,
  CONSTRAINT `fk_USUARIO_has_ESTUDIO_USUARIO1`
    FOREIGN KEY (`USUARIO_idUsuario`)
    REFERENCES `ReproductorDB`.`USUARIO` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_USUARIO_has_ESTUDIO_ESTUDIO1`
    FOREIGN KEY (`ESTUDIO_idEstudio`)
    REFERENCES `ReproductorDB`.`ESTUDIO` (`idEstudio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
