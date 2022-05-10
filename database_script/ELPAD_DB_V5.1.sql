-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema elpad_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `elpad_db` DEFAULT CHARACTER SET utf8 ;
USE `elpad_db` ;

-- -----------------------------------------------------
-- Table `elpad_db`.`category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`category` (
  `categoryId` INT(11) NOT NULL AUTO_INCREMENT,
  `categoryName` VARCHAR(60) NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`categoryId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`company`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`company` (
  `companyId` INT(11) NOT NULL AUTO_INCREMENT,
  `companyName` VARCHAR(60) NOT NULL,
  `companyDirection` VARCHAR(100) NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`companyId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`diningArea`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`dining_area` (
  `diningAreaId` INT(11) NOT NULL AUTO_INCREMENT,
  `companyId` INT(11) NOT NULL,
  `diningAreaName` VARCHAR(100) NOT NULL,
  `latitude` FLOAT NOT NULL,
  `longitude` FLOAT NOT NULL,
  `averageCalorie` FLOAT NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`diningAreaId`),
  INDEX `fk_dining_area_company1_idx` (`companyId` ASC),
  CONSTRAINT `fk_dining_area_company1`
    FOREIGN KEY (`companyId`)
    REFERENCES `elpad_db`.`company` (`companyId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`client`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`client` (
  `clientId` INT(11) NOT NULL AUTO_INCREMENT,
  `diningAreaId` INT(11) NOT NULL,
  `clientName` VARCHAR(60) NOT NULL,
  `clientLastName1` VARCHAR(60) NOT NULL,
  `clientLastName2` VARCHAR(60) NULL DEFAULT NULL,
  `clientCode` VARCHAR(60) NULL DEFAULT NULL,
  `clientCI` VARCHAR(20) NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`clientId`),
  INDEX `fk_client_dining_area1_idx` (`diningAreaId` ASC),
  CONSTRAINT `fk_client_dining_area1`
    FOREIGN KEY (`diningAreaId`)
    REFERENCES `elpad_db`.`dining_area` (`diningAreaId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`workSchedule`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`work_schedule` (
  `workScheduleId` INT(11) NOT NULL AUTO_INCREMENT,
  `workScheduleName` VARCHAR(60) NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`workScheduleId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`employeeWorkSchedule`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`employee_work_schedule` (
  `employeeWorkScheduleId` INT(11) NOT NULL AUTO_INCREMENT,
  `diningAreaId` INT(11) NOT NULL,
  `workScheduleId` INT(11) NOT NULL,
  `startTime` TIME NOT NULL,
  `endTime` TIME NOT NULL,
  `numberOfDay` TINYINT(4) NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`employeeWorkScheduleId`),
  INDEX `fk_employee_work_schedule_diningArea1_idx` (`diningAreaId` ASC),
  INDEX `fk_employee_work_schedule_workSchedule1_idx` (`workScheduleId` ASC),
  CONSTRAINT `fk_employee_work_schedule_dining_area1`
    FOREIGN KEY (`diningAreaId`)
    REFERENCES `elpad_db`.`dining_area` (`diningAreaId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_employee_work_schedule_work_schedule1`
    FOREIGN KEY (`workScheduleId`)
    REFERENCES `elpad_db`.`work_schedule` (`workScheduleId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`foodTimes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`food_times` (
  `foodTimesId` INT(11) NOT NULL AUTO_INCREMENT,
  `foodTimesName` VARCHAR(60) NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`foodTimesId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`diningAreaFoodTimes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`dining_area_food_times` (
  `diningAreaFoodTimesId` INT(11) NOT NULL AUTO_INCREMENT,
  `foodTimesId` INT(11) NOT NULL,
  `diningAreaId` INT(11) NOT NULL,
  `startTime` TIME NOT NULL,
  `endTime` TIME NOT NULL,
  `nutritionalPercentage` TINYINT(4) NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`diningAreaFoodTimesId`),
  INDEX `fk_dining_area_food_times_food_times1_idx` (`foodTimesId` ASC),
  INDEX `fk_dining_area_food_times_dining_area1_idx` (`diningAreaId` ASC),
  CONSTRAINT `fk_dining_area_food_times_food_times1`
    FOREIGN KEY (`foodTimesId`)
    REFERENCES `elpad_db`.`food_times` (`foodTimesId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_dining_area_food_times_dining_area1`
    FOREIGN KEY (`diningAreaId`)
    REFERENCES `elpad_db`.`dining_area` (`diningAreaId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`employeeType`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`employee_type` (
  `employeeTypeId` INT(11) NOT NULL AUTO_INCREMENT,
  `employeeTypeName` VARCHAR(45) NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`employeeTypeId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`employee`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`employee` (
  `employeeId` INT(11) NOT NULL AUTO_INCREMENT,
  `employeeTypeId` INT(11) NOT NULL,
  `name` VARCHAR(60) NOT NULL,
  `lastName1` VARCHAR(60) NOT NULL,
  `lastName2` VARCHAR(60) NULL DEFAULT NULL,
  `employeePhoneNumber` VARCHAR(20) NOT NULL,
  `employeeLatitude` FLOAT NOT NULL,
  `employeeLongitude` FLOAT NOT NULL,
  `employeeCI` VARCHAR(20) NOT NULL,
  `employeeGender` CHAR(1) NOT NULL,
  `employeeDateOfBirth` DATETIME NOT NULL,
  `employeeCode` VARCHAR(45) NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`employeeId`),
  INDEX `fk_employee_employee_type1_idx` (`employeeTypeId` ASC),
  CONSTRAINT `fk_employee_employee_type1`
    FOREIGN KEY (`employeeTypeId`)
    REFERENCES `elpad_db`.`employee_type` (`employeeTypeId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`employeeInDiningArea`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`employee_in_dining_area` (
  `employeeInDiningAreaId` INT(11) NOT NULL AUTO_INCREMENT,
  `diningAreaId` INT(11) NOT NULL,
  `employeeId` INT(11) NOT NULL,
  `startDate` DATETIME NOT NULL,
  `endDate` DATETIME NULL DEFAULT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`employeeInDiningAreaId`),
  INDEX `fk_employee_in_dining_area_employee1_idx` (`employeeId` ASC),
  INDEX `fk_employee_in_dining_area_dining_area1_idx` (`diningAreaId` ASC),
  CONSTRAINT `fk_employee_in_dining_area_employee1`
    FOREIGN KEY (`employeeId`)
    REFERENCES `elpad_db`.`employee` (`employeeId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_employee_in_dining_area_dining_area1`
    FOREIGN KEY (`diningAreaId`)
    REFERENCES `elpad_db`.`dining_area` (`diningAreaId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`supplyType`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`supply_type` (
  `supplyTypeId` TINYINT(4) NOT NULL AUTO_INCREMENT,
  `supplyTypeName` VARCHAR(60) NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`supplyTypeId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`supply`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`supply` (
  `supplyId` INT(11) NOT NULL AUTO_INCREMENT,
  `supplyTypeId` TINYINT(4) NOT NULL,
  `supplyName` VARCHAR(60) NOT NULL,
  `caloricValue` FLOAT NOT NULL,
  `proteinValue` FLOAT NOT NULL,
  `fatValue` FLOAT NOT NULL,
  `carbohydratesValue` FLOAT NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`supplyId`),
  INDEX `fk_supply_supply_type1_idx` (`supplyTypeId` ASC),
  CONSTRAINT `fk_supply_supply_type1`
    FOREIGN KEY (`supplyTypeId`)
    REFERENCES `elpad_db`.`supply_type` (`supplyTypeId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`plate`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`plate` (
  `plateId` INT(11) NOT NULL AUTO_INCREMENT,
  `diningAreaId` INT(11) NOT NULL,
  `plateName` VARCHAR(60) NOT NULL,
  `price` DECIMAL(5,2) NOT NULL,
  `caloricValue` FLOAT NOT NULL,
  `proteinValue` FLOAT NOT NULL,
  `fatValue` FLOAT NOT NULL,
  `carbohydratesValue` FLOAT NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`plateId`),
  INDEX `fk_plate_dining_area1_idx` (`diningAreaId` ASC),
  CONSTRAINT `fk_plate_dining_area1`
    FOREIGN KEY (`diningAreaId`)
    REFERENCES `elpad_db`.`dining_area` (`diningAreaId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`supplyInPlate`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`supply_in_plate` (
  `supplyInPlateId` INT(11) NOT NULL AUTO_INCREMENT,
  `plateId` INT(11) NOT NULL,
  `supplyId` INT(11) NOT NULL,
  `quantity` DECIMAL(10,2) NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`supplyInPlateId`),
  INDEX `fk_supply_in_plate_plate1_idx` (`plateId` ASC),
  INDEX `fk_supply_in_plate_supply1_idx` (`supplyId` ASC),
  CONSTRAINT `fk_supply_in_plate_plate1`
    FOREIGN KEY (`plateId`)
    REFERENCES `elpad_db`.`plate` (`plateId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_supply_in_plate_supply1`
    FOREIGN KEY (`supplyId`)
    REFERENCES `elpad_db`.`supply` (`supplyId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`jobMaterial`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`job_material` (
  `jobMaterialId` INT(11) NOT NULL AUTO_INCREMENT,
  `categoryId` INT(11) NOT NULL,
  `jobMaterialName` VARCHAR(45) NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`jobMaterialId`),
  INDEX `fk_job_material_category1_idx` (`categoryId` ASC),
  CONSTRAINT `fk_job_material_category1`
    FOREIGN KEY (`categoryId`)
    REFERENCES `elpad_db`.`category` (`categoryId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`employeeHasJobMaterial`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`employee_has_job_material` (
  `employeeHasJobMaterialId` INT(11) NOT NULL AUTO_INCREMENT,
  `jobMaterialId` INT(11) NOT NULL,
  `employeeId` INT(11) NOT NULL,
  `deliveryDate` DATETIME NOT NULL,
  `renewalDate` DATETIME NULL DEFAULT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`employeeHasJobMaterialId`),
  INDEX `fk_employee_has_job_material_job_material1_idx` (`jobMaterialId` ASC),
  INDEX `fk_employee_has_job_material_employee1_idx` (`employeeId` ASC),
  CONSTRAINT `fk_employee_has_job_material_job_material1`
    FOREIGN KEY (`jobMaterialId`)
    REFERENCES `elpad_db`.`job_material` (`jobMaterialId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_employee_has_job_material_employee1`
    FOREIGN KEY (`employeeId`)
    REFERENCES `elpad_db`.`employee` (`employeeId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`workMemorandum`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`work_memorandum` (
  `workMemorandumId` INT(11) NOT NULL AUTO_INCREMENT,
  `employeeId` INT(11) NOT NULL,
  `workMemorandumDescription` VARCHAR(145) NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`workMemorandumId`),
  INDEX `fk_work_memorandum_employee1_idx` (`employeeId` ASC),
  CONSTRAINT `fk_work_memorandum_employee1`
    FOREIGN KEY (`employeeId`)
    REFERENCES `elpad_db`.`employee` (`employeeId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`menu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`menu` (
  `menuId` INT(11) NOT NULL AUTO_INCREMENT,
  `menuName` VARCHAR(60) NOT NULL,
  `startDate` DATE NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`menuId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`workPermit`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`work_permit` (
  `workPermitId` INT(11) NOT NULL AUTO_INCREMENT,
  `employeeId` INT(11) NOT NULL,
  `startDate` DATETIME NOT NULL,
  `endDate` DATETIME NOT NULL,
  `workPermitDescription` VARCHAR(145) NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`workPermitId`),
  INDEX `fk_work_permit_employee1_idx` (`employeeId` ASC),
  CONSTRAINT `fk_work_permit_employee1`
    FOREIGN KEY (`employeeId`)
    REFERENCES `elpad_db`.`employee` (`employeeId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`role`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`role` (
  `roleId` TINYINT(4) NOT NULL AUTO_INCREMENT,
  `roleName` VARCHAR(60) NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`roleId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`user` (
  `userId` INT(11) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(60) NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  INDEX `fk_user_employee1_idx` (`userId` ASC),
  PRIMARY KEY (`userId`),
  CONSTRAINT `fk_user_employee1`
    FOREIGN KEY (`userId`)
    REFERENCES `elpad_db`.`employee` (`employeeId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`token`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`token` (
  `userId` INT(11) NOT NULL,
  `tokenString` VARCHAR(55) NOT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  INDEX `fk_token_user1_idx` (`userId` ASC),
  CONSTRAINT `fk_token_user1`
    FOREIGN KEY (`userId`)
    REFERENCES `elpad_db`.`user` (`userId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `elpad_db`.`diningAreaMenu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`dining_area_menu` (
  `diningAreaMenuId` INT NOT NULL AUTO_INCREMENT,
  `diningAreaId` INT(11) NOT NULL,
  `menuId` INT(11) NOT NULL,
  `active` TINYINT(4) NOT NULL,
  `startDate` DATE NOT NULL,
  `endDate` DATE NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`diningAreaMenuId`),
  INDEX `fk_dining_area_menu_menu1_idx` (`menuId` ASC),
  INDEX `fk_dining_area_menu_dining_area1_idx` (`diningAreaId` ASC),
  CONSTRAINT `fk_dining_area_menu_menu1`
    FOREIGN KEY (`menuId`)
    REFERENCES `elpad_db`.`menu` (`menuId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_dining_area_menu_dining_area1`
    FOREIGN KEY (`diningAreaId`)
    REFERENCES `elpad_db`.`dining_area` (`diningAreaId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`plateInMenu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`plate_in_menu` (
  `plateInMenuId` INT NOT NULL,
  `plateId` INT(11) NOT NULL,
  `menuId` INT(11) NOT NULL,
  `diningAreaFoodTimesId` INT(11) NOT NULL,
  `numberOfDay` TINYINT NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`plateInMenuId`),
  INDEX `fk_plate_in_menu_dining_area_food_times1_idx` (`diningAreaFoodTimesId` ASC),
  INDEX `fk_plate_in_menu_plate1_idx` (`plateId` ASC),
  INDEX `fk_plate_in_menu_menu1_idx` (`menuId` ASC),
  CONSTRAINT `fk_plate_in_menu_dining_area_food_times1`
    FOREIGN KEY (`diningAreaFoodTimesId`)
    REFERENCES `elpad_db`.`dining_area_food_times` (`diningAreaFoodTimesId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_plate_in_menu_plate1`
    FOREIGN KEY (`plateId`)
    REFERENCES `elpad_db`.`plate` (`plateId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_plate_in_menu_menu1`
    FOREIGN KEY (`menuId`)
    REFERENCES `elpad_db`.`menu` (`menuId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `elpad_db`.`userRole`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`user_role` (
  `userId` INT(11) NOT NULL,
  `roleId` TINYINT(4) NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`userId`, `roleId`),
  INDEX `fk_user_has_role_role1_idx` (`roleId` ASC),
  INDEX `fk_user_has_role_user1_idx` (`userId` ASC),
  CONSTRAINT `fk_user_has_role_user1`
    FOREIGN KEY (`userId`)
    REFERENCES `elpad_db`.`user` (`userId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_role_role1`
    FOREIGN KEY (`roleId`)
    REFERENCES `elpad_db`.`role` (`roleId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;



-- QUERIES
INSERT INTO employee_type (employeeTypeName) VALUES ('Administrador');

INSERT INTO employee (employeeTypeId, `name`, lastName1, lastName2, employeePhoneNumber, employeeLatitude, employeeLongitude, employeeCI, employeeGender, employeeDateOfBirth, employeeCode)
VALUES (1, 'Rodrigo', 'Iriarte', 'Zamorano', '68464817', -17.3742284, -66.1622121, '13419279', 'M', '2000-09-24', '6969');

INSERT INTO `user` (userId, email, password)
VALUES (1, 'rodrigo.iriarte14@gmail.com', MD5('12345'));

INSERT INTO food_times (foodTimesName)
VALUES ('Desayuno');
INSERT INTO food_times (foodTimesName)
VALUES ('Almuerzo');
INSERT INTO food_times (foodTimesName)
VALUES ('Cena');

INSERT INTO company (companyName, companyDirection)
VALUES ('COBOCE', 'Calle Coboce');

INSERT INTO supply_type (supplyTypeName)
VALUES ('Carne');