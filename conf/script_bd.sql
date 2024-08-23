-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema menu
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema menu
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `menu` DEFAULT CHARACTER SET utf8 ;
USE `menu` ;

-- -----------------------------------------------------
-- Table `menu`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `menu`.`cliente` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(200) NULL,
  `dataNasc` DATE NULL,
  `email` VARCHAR(200) NULL,
  `senha` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `menu`.`gerente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `menu`.`gerente` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(200) NULL,
  `dataNasc` DATE NULL,
  `cpf` VARCHAR(45) NULL,
  `email` VARCHAR(200) NULL,
  `senha` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `menu`.`categorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `menu`.`categorias` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `imagem` VARCHAR(200) NULL,
  `nome` VARCHAR(45) NULL,
  `gerente_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_categorias_gerente1_idx` (`gerente_id` ASC) VISIBLE,
  CONSTRAINT `fk_categorias_gerente1`
    FOREIGN KEY (`gerente_id`)
    REFERENCES `menu`.`gerente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `menu`.`pratos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `menu`.`pratos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `imagem` VARCHAR(200) NULL,
  `nome` VARCHAR(45) NULL,
  `ingredientes` VARCHAR(45) NULL,
  `descricao` VARCHAR(200) NULL,
  `preco` DECIMAL(16,2) NULL,
  `categorias_id` INT NOT NULL,
  `gerente_id` INT NOT NULL,
  PRIMARY KEY (`idPrat`),
  INDEX `fk_pratos_categorias1_idx` (`categorias_id` ASC) VISIBLE,
  INDEX `fk_pratos_gerente1_idx` (`gerente_id` ASC) VISIBLE,
  CONSTRAINT `fk_pratos_categorias1`
    FOREIGN KEY (`categorias_id`)
    REFERENCES `menu`.`categorias` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pratos_gerente1`
    FOREIGN KEY (`gerente_id`)
    REFERENCES `menu`.`gerente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `menu`.`cozinheiro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `menu`.`cozinheiro` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(200) NULL,
  `dataNasc` DATE NULL,
  `cpf` VARCHAR(45) NULL,
  `email` VARCHAR(200) NULL,
  `senha` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `menu`.`pedidos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `menu`.`pedidos` (
  `idPed` INT NOT NULL AUTO_INCREMENT,
  `nome_prat` VARCHAR(45) NULL,
  `descricao` VARCHAR(200) NULL,
  `preco` DECIMAL(16,2) NULL,
  `quant` INT NULL,
  `mesa_id` INT NOT NULL,
  PRIMARY KEY (`idPed`),
  INDEX `fk_pedidos_mesa1_idx` (`mesa_id` ASC),
  CONSTRAINT `fk_pedidos_mesa1`
    FOREIGN KEY (`mesa_id`)
    REFERENCES `menu`.`mesa` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB

-- -----------------------------------------------------
-- Table `menu`.`mesa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `menu`.`mesa` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB

-- -----------------------------------------------------
-- Table `menu`.`carrinho`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `menu`.`carrinho` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `personalizar` VARCHAR(200) NULL,
  `ingredientes` VARCHAR(200) NULL,
  `preco` DECIMAL(16,2) ZEROFILL NULL,
  `quant` INT NULL,
  `mesa_id` INT NOT NULL,
  `pratos_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_carrinho_mesa1_idx` (`mesa_id` ASC) VISIBLE,
  INDEX `fk_carrinho_pratos1_idx` (`pratos_id` ASC) VISIBLE,
  CONSTRAINT `fk_carrinho_mesa1`
    FOREIGN KEY (`mesa_id`)
    REFERENCES `menu`.`mesa` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_carrinho_pratos1`
    FOREIGN KEY (`pratos_id`)
    REFERENCES `menu`.`pratos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB


CREATE TABLE IF NOT EXISTS `menu`.`promocao` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `dia` VARCHAR(45) NULL,
  `imagem` VARCHAR(200) NULL,
  `descricao` VARCHAR(200) NULL,
  `gerente_id` INT NOT NULL,
  `pratos_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_promocao_gerente1_idx` (`gerente_id` ASC),
  INDEX `fk_promocao_pratos1_idx` (`pratos_id` ASC),
  CONSTRAINT `fk_promocao_gerente1`
    FOREIGN KEY (`gerente_id`)
    REFERENCES `menu`.`gerente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_promocao_pratos1`
    FOREIGN KEY (`pratos_id`)
    REFERENCES `menu`.`pratos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
