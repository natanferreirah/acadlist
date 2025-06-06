SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS; 
SET UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS; 
SET FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE;
SET SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';


CREATE DATABASE IF NOT EXISTS `acadlist` 
DEFAULT CHARACTER SET utf8mb4 
COLLATE utf8mb4_general_ci;

USE `acadlist`;

CREATE TABLE IF NOT EXISTS `Alunos` (
  `id_aluno` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(60),
  `cpf` CHAR(14) UNIQUE,
  `data_nascimento` DATE,
  PRIMARY KEY (`id_aluno`)
) ENGINE=InnoDB 
DEFAULT CHARSET=utf8mb4 
COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `Materias` (
  `id_materia` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100),
  PRIMARY KEY (`id_materia`)
) ENGINE=InnoDB 
DEFAULT CHARSET=utf8mb4 
COLLATE=utf8mb4_general_ci;


CREATE TABLE IF NOT EXISTS `Usuarios` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255),
  `usuario` VARCHAR(50),
  `senha` VARCHAR(255), 
  `conta_nivel` ENUM('Admin', 'Escola'),
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB 
DEFAULT CHARSET=utf8mb4 
COLLATE=utf8mb4_general_ci;


CREATE TABLE IF NOT EXISTS `Professor` (
  `id_professor` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255),
  `usuarios_id_usuario` INT NOT NULL,
  PRIMARY KEY (`id_professor`, `usuarios_id_usuario`),
  CONSTRAINT `fk_professor_usuarios`
    FOREIGN KEY (`usuarios_id_usuario`)
    REFERENCES `Usuarios` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE=InnoDB 
DEFAULT CHARSET=utf8mb4 
COLLATE=utf8mb4_general_ci;


CREATE TABLE IF NOT EXISTS `Turmas` (
  `id_turma` INT NOT NULL AUTO_INCREMENT,
  `sala_atribuida` VARCHAR(30),
  `turno` ENUM('Manhã', 'Tarde', 'Noite', 'Integral'),
  `ano_letivo` SMALLINT,
  `serie` VARCHAR(8),
  PRIMARY KEY (`id_turma`)
) ENGINE=InnoDB 
DEFAULT CHARSET=utf8mb4 
COLLATE=utf8mb4_general_ci;


CREATE TABLE IF NOT EXISTS `Alunos_Turmas` (
  `turmas_id_turma` INT NOT NULL,
  `alunos_id_aluno` INT NOT NULL,
  PRIMARY KEY (`turmas_id_turma`, `alunos_id_aluno`),
  CONSTRAINT `fk_turmas_has_alunos_turmas1`
    FOREIGN KEY (`turmas_id_turma`)
    REFERENCES `Turmas` (`id_turma`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_turmas_has_alunos_alunos1`
    FOREIGN KEY (`alunos_id_aluno`)
    REFERENCES `Alunos` (`id_aluno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE=InnoDB 
DEFAULT CHARSET=utf8mb4 
COLLATE=utf8mb4_general_ci;


CREATE TABLE IF NOT EXISTS `Professores_Materias` (
  `professor_id_professor` INT NOT NULL,
  `materias_id_materia` INT NOT NULL,
  PRIMARY KEY (`professor_id_professor`, `materias_id_materia`),
  CONSTRAINT `fk_professor_has_materias_professor1`
    FOREIGN KEY (`professor_id_professor`)
    REFERENCES `Professor` (`id_professor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_professor_has_materias_materias1`
    FOREIGN KEY (`materias_id_materia`)
    REFERENCES `Materias` (`id_materia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE=InnoDB 
DEFAULT CHARSET=utf8mb4 
COLLATE=utf8mb4_general_ci;

