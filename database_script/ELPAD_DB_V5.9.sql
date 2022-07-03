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
-- Table `elpad_db`.`access`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`access` (
  `accessId` TINYINT(4) NOT NULL AUTO_INCREMENT,
  `accessName` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`accessId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`product_category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`product_category` (
  `productCategoryId` INT(11) NOT NULL AUTO_INCREMENT,
  `categoryName` VARCHAR(35) NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`productCategoryId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`product` (
  `productId` INT(11) NOT NULL AUTO_INCREMENT,
  `productName` VARCHAR(60) NOT NULL,
  `productCategoryId` INT(11) NOT NULL,
  `productPrice` DECIMAL(6,2) NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`productId`),
  INDEX `fk_product_product_category1_idx` (`productCategoryId` ASC),
  CONSTRAINT `fk_product_product_category1`
    FOREIGN KEY (`productCategoryId`)
    REFERENCES `elpad_db`.`product_category` (`productCategoryId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`batch`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`batch` (
  `batchId` INT(11) NOT NULL AUTO_INCREMENT,
  `productId` INT(11) NOT NULL,
  `productQuantity` VARCHAR(45) NOT NULL,
  `productUnitPrice` DECIMAL(5,2) NOT NULL,
  `totalPaid` DECIMAL(8,2) NOT NULL,
  `stock` INT(11) NOT NULL,
  PRIMARY KEY (`batchId`),
  INDEX `fk_batch_product1_idx` (`productId` ASC),
  CONSTRAINT `fk_batch_product1`
    FOREIGN KEY (`productId`)
    REFERENCES `elpad_db`.`product` (`productId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
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
-- Table `elpad_db`.`dining_area`
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
    REFERENCES `elpad_db`.`company` (`companyId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`client`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`client` (
  `clientId` INT(11) NOT NULL AUTO_INCREMENT,
  `diningAreaId` INT(11) NOT NULL,
  `clientCode` VARCHAR(60) NULL DEFAULT NULL,
  `clientName` VARCHAR(60) NOT NULL,
  `clientLastName1` VARCHAR(60) NOT NULL,
  `clientLastName2` VARCHAR(60) NULL DEFAULT NULL,
  `dateOfBirth` DATE NOT NULL,
  `clientCI` VARCHAR(20) NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`clientId`),
  INDEX `fk_client_dining_area1_idx` (`diningAreaId` ASC),
  CONSTRAINT `fk_client_dining_area1`
    FOREIGN KEY (`diningAreaId`)
    REFERENCES `elpad_db`.`dining_area` (`diningAreaId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`employee`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`employee` (
  `employeeId` INT(11) NOT NULL AUTO_INCREMENT,
  `encryptedEmployeeId` VARCHAR(13) NOT NULL,
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
  `employeProfileCompleted` TINYINT NOT NULL DEFAULT 0,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`employeeId`))
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
  PRIMARY KEY (`userId`),
  INDEX `fk_user_employee1_idx` (`userId` ASC),
  CONSTRAINT `fk_user_employee1`
    FOREIGN KEY (`userId`)
    REFERENCES `elpad_db`.`employee` (`employeeId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`sale_type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`sale_type` (
  `saleTypeId` INT NOT NULL AUTO_INCREMENT,
  `saleTypeName` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`saleTypeId`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `elpad_db`.`dosage`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`dosage` (
  `dosageId` SMALLINT NOT NULL AUTO_INCREMENT,
  `authorizationNumber` VARCHAR(50) NOT NULL,
  `limitDate` DATE NOT NULL,
  `dosageKey` VARCHAR(100) NOT NULL,
  `initialNumber` SMALLINT NOT NULL DEFAULT 1,
  `finalNumber` SMALLINT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`dosageId`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `elpad_db`.`invoice`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`invoice` (
  `invoiceId` MEDIUMINT NOT NULL AUTO_INCREMENT,
  `dosageId` SMALLINT NOT NULL,
  `userId` INT(11) NOT NULL,
  `clientId` INT(11) NOT NULL,
  `nit` VARCHAR(15) NOT NULL,
  `businessName` VARCHAR(100) NOT NULL,
  `total` DECIMAL(8,2) NOT NULL,
  `invoiceNumber` SMALLINT NOT NULL,
  `controlCode` VARCHAR(50) NOT NULL,
  `branchOffice` VARCHAR(69) NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`invoiceId`),
  INDEX `fk_invoice_dosage1_idx` (`dosageId` ASC),
  INDEX `fk_invoice_user1_idx` (`userId` ASC),
  INDEX `fk_invoice_client1_idx` (`clientId` ASC),
  CONSTRAINT `fk_invoice_dosage1`
    FOREIGN KEY (`dosageId`)
    REFERENCES `elpad_db`.`dosage` (`dosageId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_invoice_user1`
    FOREIGN KEY (`userId`)
    REFERENCES `elpad_db`.`user` (`userId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_invoice_client1`
    FOREIGN KEY (`clientId`)
    REFERENCES `elpad_db`.`client` (`clientId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `elpad_db`.`sale`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`sale` (
  `saleId` INT(11) NOT NULL AUTO_INCREMENT,
  `saleTypeId` INT NOT NULL,
  `userId` INT(11) NOT NULL,
  `clientId` INT(11) NOT NULL,
  `iinvoiceId` MEDIUMINT NOT NULL,
  `totalOwed` DECIMAL(8,2) NULL,
  `totalPaid` DECIMAL(8,2) NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`saleId`),
  INDEX `fk_sale_user1_idx` (`userId` ASC),
  INDEX `fk_sale_client1_idx` (`clientId` ASC),
  INDEX `fk_sale_sale_type1_idx` (`saleTypeId` ASC),
  INDEX `fk_sale_invoice1_idx` (`iinvoiceId` ASC),
  CONSTRAINT `fk_sale_client1`
    FOREIGN KEY (`clientId`)
    REFERENCES `elpad_db`.`client` (`clientId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_sale_user1`
    FOREIGN KEY (`userId`)
    REFERENCES `elpad_db`.`user` (`userId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_sale_sale_type1`
    FOREIGN KEY (`saleTypeId`)
    REFERENCES `elpad_db`.`sale_type` (`saleTypeId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_sale_invoice1`
    FOREIGN KEY (`iinvoiceId`)
    REFERENCES `elpad_db`.`invoice` (`invoiceId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`sale_detail_product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`sale_detail_product` (
  `saleId` INT(11) NOT NULL,
  `productId` INT(11) NOT NULL,
  `quantity` VARCHAR(45) NOT NULL,
  `unitPrice` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`saleId`, `productId`),
  INDEX `fk_sale_has_product_product1_idx` (`productId` ASC),
  INDEX `fk_sale_has_product_sale1_idx` (`saleId` ASC),
  CONSTRAINT `fk_sale_has_product_product1`
    FOREIGN KEY (`productId`)
    REFERENCES `elpad_db`.`product` (`productId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_sale_has_product_sale1`
    FOREIGN KEY (`saleId`)
    REFERENCES `elpad_db`.`sale` (`saleId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`batch_has_sale_detail`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`batch_has_sale_detail` (
  `batchId` INT(11) NOT NULL,
  `saleId` INT(11) NOT NULL,
  `stockObtained` INT(11) NOT NULL,
  PRIMARY KEY (`batchId`, `saleId`),
  INDEX `fk_batch_has_sale_detail_sale_detail1_idx` (`saleId` ASC),
  INDEX `fk_batch_has_sale_detail_batch1_idx` (`batchId` ASC),
  CONSTRAINT `fk_batch_has_sale_detail_batch1`
    FOREIGN KEY (`batchId`)
    REFERENCES `elpad_db`.`batch` (`batchId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_batch_has_sale_detail_sale_detail1`
    FOREIGN KEY (`saleId`)
    REFERENCES `elpad_db`.`sale_detail_product` (`saleId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


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
-- Table `elpad_db`.`food_times`
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
-- Table `elpad_db`.`dining_area_food_times`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`dining_area_food_times` (
  `diningAreaFoodTimesId` INT(11) NOT NULL AUTO_INCREMENT,
  `diningAreaId` INT(11) NOT NULL,
  `foodTimesId` INT(11) NOT NULL,
  `startTime` TIME NOT NULL,
  `endTime` TIME NOT NULL,
  `nutritionalPercentage` TINYINT(4) NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`diningAreaFoodTimesId`),
  INDEX `fk_dining_area_food_times_dining_area1_idx` (`diningAreaId` ASC),
  INDEX `fk_dining_area_food_times_food_times1_idx` (`foodTimesId` ASC),
  CONSTRAINT `fk_dining_area_food_times_dining_area1`
    FOREIGN KEY (`diningAreaId`)
    REFERENCES `elpad_db`.`dining_area` (`diningAreaId`),
  CONSTRAINT `fk_dining_area_food_times_food_times1`
    FOREIGN KEY (`foodTimesId`)
    REFERENCES `elpad_db`.`food_times` (`foodTimesId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`warehouse`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`warehouse` (
  `warehouseId` INT(11) NOT NULL AUTO_INCREMENT,
  `warehouseName` VARCHAR(45) NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`warehouseId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`dining_area_has_warehouse`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`dining_area_has_warehouse` (
  `diningAreaId` INT(11) NOT NULL,
  `warehouseId` INT(11) NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`diningAreaId`, `warehouseId`),
  INDEX `fk_dining_area_has_warehouse_warehouse1_idx` (`warehouseId` ASC),
  INDEX `fk_dining_area_has_warehouse_dining_area1_idx` (`diningAreaId` ASC),
  CONSTRAINT `fk_dining_area_has_warehouse_dining_area1`
    FOREIGN KEY (`diningAreaId`)
    REFERENCES `elpad_db`.`dining_area` (`diningAreaId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_dining_area_has_warehouse_warehouse1`
    FOREIGN KEY (`warehouseId`)
    REFERENCES `elpad_db`.`warehouse` (`warehouseId`)
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
  `caloricValue` FLOAT NOT NULL,
  `proteinValue` FLOAT NOT NULL,
  `fatValue` FLOAT NOT NULL,
  `carbohydratesValue` FLOAT NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`menuId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`dining_area_menu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`dining_area_menu` (
  `diningAreaMenuId` INT(11) NOT NULL AUTO_INCREMENT,
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
  CONSTRAINT `fk_dining_area_menu_dining_area1`
    FOREIGN KEY (`diningAreaId`)
    REFERENCES `elpad_db`.`dining_area` (`diningAreaId`),
  CONSTRAINT `fk_dining_area_menu_menu1`
    FOREIGN KEY (`menuId`)
    REFERENCES `elpad_db`.`menu` (`menuId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`dish_category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`dish_category` (
  `dishCategoryId` INT NOT NULL,
  `dishCategoryName` VARCHAR(60) NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`dishCategoryId`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `elpad_db`.`dish`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`dish` (
  `dishId` INT(11) NOT NULL AUTO_INCREMENT,
  `diningAreaId` INT(11) NOT NULL,
  `dishCategoryId` INT NOT NULL,
  `dishName` VARCHAR(60) NOT NULL,
  `price` DECIMAL(5,2) NOT NULL,
  `caloricValue` FLOAT NOT NULL,
  `proteinValue` FLOAT NOT NULL,
  `fatValue` FLOAT NOT NULL,
  `carbohydratesValue` FLOAT NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`dishId`),
  INDEX `fk_dish_dining_area1_idx` (`diningAreaId` ASC),
  INDEX `fk_dish_dish_category1_idx` (`dishCategoryId` ASC),
  CONSTRAINT `fk_dish_dining_area1`
    FOREIGN KEY (`diningAreaId`)
    REFERENCES `elpad_db`.`dining_area` (`diningAreaId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_dish_dish_category1`
    FOREIGN KEY (`dishCategoryId`)
    REFERENCES `elpad_db`.`dish_category` (`dishCategoryId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`dish_in_menu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`dish_in_menu` (
  `dishInMenuId` INT(11) NOT NULL,
  `dishId` INT(11) NOT NULL,
  `menuId` INT(11) NOT NULL,
  `diningAreaFoodTimesId` INT(11) NOT NULL,
  `numberOfDay` TINYINT(4) NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`dishInMenuId`),
  INDEX `fk_dish_in_menu_dining_area_food_times1_idx` (`diningAreaFoodTimesId` ASC),
  INDEX `fk_dish_in_menu_dish1_idx` (`dishId` ASC),
  INDEX `fk_dish_in_menu_menu1_idx` (`menuId` ASC),
  CONSTRAINT `fk_dish_in_menu_dining_area_food_times1`
    FOREIGN KEY (`diningAreaFoodTimesId`)
    REFERENCES `elpad_db`.`dining_area_food_times` (`diningAreaFoodTimesId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_dish_in_menu_dish1`
    FOREIGN KEY (`dishId`)
    REFERENCES `elpad_db`.`dish` (`dishId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_dish_in_menu_menu1`
    FOREIGN KEY (`menuId`)
    REFERENCES `elpad_db`.`menu` (`menuId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`employee_attendance`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`employee_attendance` (
  `employeeAttendanceId` INT(11) NOT NULL AUTO_INCREMENT,
  `employeeId` INT(11) NOT NULL,
  `arrival` DATETIME NOT NULL,
  `departure` DATETIME NULL DEFAULT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`employeeAttendanceId`),
  INDEX `fk_employee_attendance_employee1_idx` (`employeeId` ASC),
  CONSTRAINT `fk_employee_attendance_employee1`
    FOREIGN KEY (`employeeId`)
    REFERENCES `elpad_db`.`employee` (`employeeId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`employee_document_type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`employee_document_type` (
  `employeeDocumentTypeId` INT(11) NOT NULL,
  `employeeDocumentType` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`employeeDocumentTypeId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`employee_document`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`employee_document` (
  `employeeDocumentId` INT(11) NOT NULL AUTO_INCREMENT,
  `employeeId` INT(11) NOT NULL,
  `employeeDocumentTypeId` INT(11) NOT NULL,
  `employeeDocumentName` VARCHAR(45) NULL DEFAULT NULL,
  `document_extension` VARCHAR(10) NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`employeeDocumentId`),
  INDEX `fk_employee_documents_employee1_idx` (`employeeId` ASC),
  INDEX `fk_employee_documents_employee_document_type1_idx` (`employeeDocumentTypeId` ASC),
  CONSTRAINT `fk_employee_documents_employee1`
    FOREIGN KEY (`employeeId`)
    REFERENCES `elpad_db`.`employee` (`employeeId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_employee_documents_employee_document_type1`
    FOREIGN KEY (`employeeDocumentTypeId`)
    REFERENCES `elpad_db`.`employee_document_type` (`employeeDocumentTypeId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`employee_type`
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
-- Table `elpad_db`.`employee_has_employee_type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`employee_has_employee_type` (
  `employeeId` INT(11) NOT NULL,
  `employeeTypeId` INT(11) NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`employeeId`, `employeeTypeId`),
  INDEX `fk_employee_has_employee_type_employee_type1_idx` (`employeeTypeId` ASC),
  INDEX `fk_employee_has_employee_type_employee1_idx` (`employeeId` ASC),
  CONSTRAINT `fk_employee_has_employee_type_employee1`
    FOREIGN KEY (`employeeId`)
    REFERENCES `elpad_db`.`employee` (`employeeId`),
  CONSTRAINT `fk_employee_has_employee_type_employee_type1`
    FOREIGN KEY (`employeeTypeId`)
    REFERENCES `elpad_db`.`employee_type` (`employeeTypeId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`fixed_asset`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`fixed_asset` (
  `fixedAssetId` INT(11) NOT NULL AUTO_INCREMENT,
  `categoryId` INT(11) NOT NULL,
  `fixedAssetName` VARCHAR(45) NOT NULL,
  `quantity` SMALLINT NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`fixedAssetId`),
  INDEX `fk_job_material_category1_idx` (`categoryId` ASC),
  CONSTRAINT `fk_job_material_category1`
    FOREIGN KEY (`categoryId`)
    REFERENCES `elpad_db`.`category` (`categoryId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`employee_has_fixed_asset`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`employee_has_fixed_asset` (
  `employeeHasFixedAssetId` INT(11) NOT NULL AUTO_INCREMENT,
  `employeeId` INT(11) NOT NULL,
  `fixedAssetId` INT(11) NOT NULL,
  `quantity` SMALLINT NOT NULL,
  `deliveryDate` DATETIME NOT NULL,
  `renewalDate` DATETIME NULL DEFAULT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`employeeHasFixedAssetId`),
  INDEX `fk_employee_has_fixed_asset_employee1_idx` (`employeeId` ASC),
  INDEX `fk_employee_has_fixed_asset_fixed_asset1_idx` (`fixedAssetId` ASC),
  CONSTRAINT `fk_employee_has_fixed_asset_employee1`
    FOREIGN KEY (`employeeId`)
    REFERENCES `elpad_db`.`employee` (`employeeId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_employee_has_fixed_asset_fixed_asset1`
    FOREIGN KEY (`fixedAssetId`)
    REFERENCES `elpad_db`.`fixed_asset` (`fixedAssetId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`employee_in_dining_area`
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
  CONSTRAINT `fk_employee_in_dining_area_dining_area1`
    FOREIGN KEY (`diningAreaId`)
    REFERENCES `elpad_db`.`dining_area` (`diningAreaId`),
  CONSTRAINT `fk_employee_in_dining_area_employee1`
    FOREIGN KEY (`employeeId`)
    REFERENCES `elpad_db`.`employee` (`employeeId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`work_schedule`
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
-- Table `elpad_db`.`employee_work_schedule`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`employee_work_schedule` (
  `employeeWorkScheduleId` INT(11) NOT NULL AUTO_INCREMENT,
  `employeeId` INT(11) NOT NULL,
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
  INDEX `fk_employee_work_schedule_employee1_idx` (`employeeId` ASC),
  CONSTRAINT `fk_employee_work_schedule_dining_area1`
    FOREIGN KEY (`diningAreaId`)
    REFERENCES `elpad_db`.`dining_area` (`diningAreaId`),
  CONSTRAINT `fk_employee_work_schedule_employee1`
    FOREIGN KEY (`employeeId`)
    REFERENCES `elpad_db`.`employee` (`employeeId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_employee_work_schedule_work_schedule1`
    FOREIGN KEY (`workScheduleId`)
    REFERENCES `elpad_db`.`work_schedule` (`workScheduleId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`supplier`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`supplier` (
  `supplierId` INT(11) NOT NULL AUTO_INCREMENT,
  `address` VARCHAR(60) NOT NULL,
  `phone1` VARCHAR(60) NOT NULL,
  `phone2` VARCHAR(60) NOT NULL,
  `phone3` VARCHAR(60) NULL DEFAULT NULL,
  `gmail` VARCHAR(145) NULL DEFAULT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  `treatment` TINYINT(4) NOT NULL,
  PRIMARY KEY (`supplierId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`legal_entity`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`legal_entity` (
  `legalEntityId` INT(11) NOT NULL,
  `legalEntityName` VARCHAR(60) NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  INDEX `fk_table1_supplier1_idx` (`legalEntityId` ASC),
  CONSTRAINT `fk_table1_supplier1`
    FOREIGN KEY (`legalEntityId`)
    REFERENCES `elpad_db`.`supplier` (`supplierId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`log`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`log` (
  `logId` INT(11) NOT NULL AUTO_INCREMENT,
  `userId` INT(11) NOT NULL,
  `tableName` VARCHAR(45) NOT NULL,
  `crud` VARCHAR(1) NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`logId`),
  INDEX `fk_log_user1_idx` (`userId` ASC),
  CONSTRAINT `fk_log_user1`
    FOREIGN KEY (`userId`)
    REFERENCES `elpad_db`.`user` (`userId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`natural_person`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`natural_person` (
  `naturalPersonId` INT(11) NOT NULL,
  `name` VARCHAR(120) NOT NULL,
  `lastName1` VARCHAR(45) NOT NULL,
  `lastName2` VARCHAR(45) NULL DEFAULT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  INDEX `fk_table2_supplier1_idx` (`naturalPersonId` ASC),
  CONSTRAINT `fk_table2_supplier1`
    FOREIGN KEY (`naturalPersonId`)
    REFERENCES `elpad_db`.`supplier` (`supplierId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`order_status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`order_status` (
  `orderStatusId` TINYINT NOT NULL,
  `orderStatusName` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`orderStatusId`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `elpad_db`.`order_product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`order_product` (
  `orderProductId` INT(11) NOT NULL,
  `total` MEDIUMINT NOT NULL,
  `orderDate` DATETIME NOT NULL,
  `orderStatusId` TINYINT NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`orderProductId`),
  INDEX `fk_order_product_order_status1_idx` (`orderStatusId` ASC),
  CONSTRAINT `fk_order_product_order_status1`
    FOREIGN KEY (`orderStatusId`)
    REFERENCES `elpad_db`.`order_status` (`orderStatusId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`order_product_detail`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`order_product_detail` (
  `orderId` INT(11) NOT NULL,
  `productId` INT(11) NOT NULL,
  `supplierId` INT(11) NOT NULL,
  `quantity` SMALLINT(6) NOT NULL,
  `unitMeasurement` TINYINT(4) NOT NULL,
  `unitProductPrice` DECIMAL(6,2) NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`orderId`, `productId`, `supplierId`),
  INDEX `fk_order_detail_product1_idx` (`productId` ASC),
  INDEX `fk_order_product_detail_order_product1_idx` (`orderId` ASC),
  INDEX `fk_order_product_detail_supplier1_idx` (`supplierId` ASC),
  CONSTRAINT `fk_order_detail_product1`
    FOREIGN KEY (`productId`)
    REFERENCES `elpad_db`.`product` (`productId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_order_product_detail_order_product1`
    FOREIGN KEY (`orderId`)
    REFERENCES `elpad_db`.`order_product` (`orderProductId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_order_product_detail_supplier1`
    FOREIGN KEY (`supplierId`)
    REFERENCES `elpad_db`.`supplier` (`supplierId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`order_supply`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`order_supply` (
  `orderSupplyId` INT(11) NOT NULL,
  `total` MEDIUMINT NOT NULL,
  `orderDate` DATETIME NOT NULL,
  `orderStatusId` TINYINT NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`orderSupplyId`),
  INDEX `fk_order_supply_order_status1_idx` (`orderStatusId` ASC),
  CONSTRAINT `fk_order_supply_order_status1`
    FOREIGN KEY (`orderStatusId`)
    REFERENCES `elpad_db`.`order_status` (`orderStatusId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`supply_type`
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
  `supplyName` VARCHAR(60) NOT NULL,
  `supplyTypeId` TINYINT(4) NOT NULL,
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
    REFERENCES `elpad_db`.`supply_type` (`supplyTypeId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`order_supply_detail`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`order_supply_detail` (
  `orderId` INT(11) NOT NULL,
  `supplierId` INT(11) NOT NULL,
  `supplyId` INT(11) NOT NULL,
  `quantity` SMALLINT(6) NOT NULL,
  `unitMeasurement` TINYINT(4) NOT NULL,
  `unitSupplyPrice` DECIMAL(6,2) NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`orderId`, `supplierId`, `supplyId`),
  INDEX `fk_order_supply_detail_supply1_idx` (`supplyId` ASC),
  INDEX `fk_order_supply_detail_order2_idx` (`orderId` ASC),
  INDEX `fk_order_supply_detail_supplier1_idx` (`supplierId` ASC),
  CONSTRAINT `fk_order_supply_detail_order2`
    FOREIGN KEY (`orderId`)
    REFERENCES `elpad_db`.`order_supply` (`orderSupplyId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_order_supply_detail_supplier1`
    FOREIGN KEY (`supplierId`)
    REFERENCES `elpad_db`.`supplier` (`supplierId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_order_supply_detail_supply1`
    FOREIGN KEY (`supplyId`)
    REFERENCES `elpad_db`.`supply` (`supplyId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`petty_cash`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`petty_cash` (
  `pettyCashId` INT(11) NOT NULL AUTO_INCREMENT,
  `diningAreaId` INT(11) NOT NULL,
  `fund` DECIMAL(6,2) NOT NULL DEFAULT '0.00',
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`pettyCashId`),
  INDEX `fk_petty_cash_dining_area1_idx` (`diningAreaId` ASC),
  CONSTRAINT `fk_petty_cash_dining_area1`
    FOREIGN KEY (`diningAreaId`)
    REFERENCES `elpad_db`.`dining_area` (`diningAreaId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`petty_cash_record`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`petty_cash_record` (
  `pettyCashRecordId` INT(11) NOT NULL AUTO_INCREMENT,
  `pettyCashId` INT(11) NOT NULL,
  `userId` INT(11) NOT NULL,
  `amount` DECIMAL(6,2) NOT NULL,
  `motive` VARCHAR(255) NOT NULL,
  `type` TINYINT(4) NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`pettyCashRecordId`, `userId`, `pettyCashId`),
  INDEX `fk_user_has_petty_cash_petty_cash1_idx` (`pettyCashId` ASC),
  INDEX `fk_user_has_petty_cash_user1_idx` (`userId` ASC),
  CONSTRAINT `fk_user_has_petty_cash_petty_cash1`
    FOREIGN KEY (`pettyCashId`)
    REFERENCES `elpad_db`.`petty_cash` (`pettyCashId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_petty_cash_user1`
    FOREIGN KEY (`userId`)
    REFERENCES `elpad_db`.`user` (`userId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`product_warehouse`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`product_warehouse` (
  `productId` INT(11) NOT NULL,
  `warehouseId` INT(11) NOT NULL,
  `stock` INT(11) NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` VARCHAR(45) NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL,
  PRIMARY KEY (`productId`, `warehouseId`),
  INDEX `fk_product_has_warehouse_warehouse1_idx` (`warehouseId` ASC),
  INDEX `fk_product_has_warehouse_product1_idx` (`productId` ASC),
  CONSTRAINT `fk_product_has_warehouse_product1`
    FOREIGN KEY (`productId`)
    REFERENCES `elpad_db`.`product` (`productId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_product_has_warehouse_warehouse1`
    FOREIGN KEY (`warehouseId`)
    REFERENCES `elpad_db`.`warehouse` (`warehouseId`)
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
-- Table `elpad_db`.`role_has_access`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`role_has_access` (
  `roleId` TINYINT(4) NOT NULL,
  `accessId` TINYINT(4) NOT NULL,
  PRIMARY KEY (`roleId`, `accessId`),
  INDEX `fk_role_has_access_access1_idx` (`accessId` ASC),
  INDEX `fk_role_has_access_role1_idx` (`roleId` ASC),
  CONSTRAINT `fk_role_has_access_access1`
    FOREIGN KEY (`accessId`)
    REFERENCES `elpad_db`.`access` (`accessId`),
  CONSTRAINT `fk_role_has_access_role1`
    FOREIGN KEY (`roleId`)
    REFERENCES `elpad_db`.`role` (`roleId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`supply_in_dish`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`supply_in_dish` (
  `supplyInDishId` INT(11) NOT NULL AUTO_INCREMENT,
  `dishId` INT(11) NOT NULL,
  `supplyId` INT(11) NOT NULL,
  `quantity` DECIMAL(10,2) NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`supplyInDishId`),
  INDEX `fk_supply_in_dish_dish1_idx` (`dishId` ASC),
  INDEX `fk_supply_in_dish_supply1_idx` (`supplyId` ASC),
  CONSTRAINT `fk_supply_in_dish_dish1`
    FOREIGN KEY (`dishId`)
    REFERENCES `elpad_db`.`dish` (`dishId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_supply_in_dish_supply1`
    FOREIGN KEY (`supplyId`)
    REFERENCES `elpad_db`.`supply` (`supplyId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`supply_warehouse`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`supply_warehouse` (
  `supplyId` INT(11) NOT NULL,
  `warehouseId` INT(11) NOT NULL,
  `stock` INT(11) NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` VARCHAR(45) NULL DEFAULT NULL,
  `status` TINYINT(4) NOT NULL,
  PRIMARY KEY (`supplyId`, `warehouseId`),
  INDEX `fk_supply_warehouse_supply1_idx` (`supplyId` ASC),
  INDEX `fk_supply_warehouse_warehouse1_idx` (`warehouseId` ASC),
  CONSTRAINT `fk_supply_warehouse_supply1`
    FOREIGN KEY (`supplyId`)
    REFERENCES `elpad_db`.`supply` (`supplyId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_supply_warehouse_warehouse1`
    FOREIGN KEY (`warehouseId`)
    REFERENCES `elpad_db`.`warehouse` (`warehouseId`)
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
    REFERENCES `elpad_db`.`user` (`userId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`user_role`
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
  CONSTRAINT `fk_user_has_role_role1`
    FOREIGN KEY (`roleId`)
    REFERENCES `elpad_db`.`role` (`roleId`),
  CONSTRAINT `fk_user_has_role_user1`
    FOREIGN KEY (`userId`)
    REFERENCES `elpad_db`.`user` (`userId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`work_memorandum`
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
    REFERENCES `elpad_db`.`employee` (`employeeId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`work_permit`
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
    REFERENCES `elpad_db`.`employee` (`employeeId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`sale_detail_dish`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`sale_detail_dish` (
  `saleId` INT(11) NOT NULL,
  `dishInMenuId` INT(11) NOT NULL,
  `quantity` VARCHAR(45) NOT NULL,
  `unitPrice` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`saleId`, `dishInMenuId`),
  INDEX `fk_sale_has_dish_in_menu_dish_in_menu1_idx` (`dishInMenuId` ASC),
  INDEX `fk_sale_has_dish_in_menu_sale1_idx` (`saleId` ASC),
  CONSTRAINT `fk_sale_has_dish_in_menu_sale1`
    FOREIGN KEY (`saleId`)
    REFERENCES `elpad_db`.`sale` (`saleId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_sale_has_dish_in_menu_dish_in_menu1`
    FOREIGN KEY (`dishInMenuId`)
    REFERENCES `elpad_db`.`dish_in_menu` (`dishInMenuId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`skill`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`skill` (
  `skillId` INT NOT NULL AUTO_INCREMENT,
  `skillName` VARCHAR(60) NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL,
  `status` TINYINT NOT NULL DEFAULT 1,
  PRIMARY KEY (`skillId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `elpad_db`.`employee_skills`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `elpad_db`.`employee_skills` (
  `employeeId` INT NOT NULL,
  `skillId` INT NOT NULL,
  `value` INT NOT NULL,
  `createDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdate` DATETIME NULL,
  `status` TINYINT NOT NULL DEFAULT 1,
  INDEX `fk_employee_skills_employee1_idx` (`employeeId` ASC),
  INDEX `fk_employee_skills_skill1_idx` (`skillId` ASC),
  CONSTRAINT `fk_employee_skills_employee1`
    FOREIGN KEY (`employeeId`)
    REFERENCES `elpad_db`.`employee` (`employeeId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_employee_skills_skill1`
    FOREIGN KEY (`skillId`)
    REFERENCES `elpad_db`.`skill` (`skillId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;




-- QUERIES
INSERT INTO employee_type (employeeTypeName) VALUES ('Administrador');

INSERT INTO employee (encryptedEmployeeId, `name`, lastName1, lastName2, employeePhoneNumber, employeeLatitude, employeeLongitude, employeeCI, employeeGender, employeeDateOfBirth, employeeCode)
VALUES ('st5dXs2w76pZE', 'Rodrigo', 'Iriarte', 'Zamorano', '68464817', -17.3742284, -66.1622121, '13419279', 'M', '2000-09-24', '6969');

INSERT INTO employee_has_employee_type (employeeId, employeeTypeId)
VALUES (1, 1);

INSERT INTO role (roleName)
VALUES ('Administrador'), ('Contabilidad'), ('Finanzas'), ('Cadena de Suministro'), ('Aprovisionamiento'), ('Recursos Humanos'), ('Gestión de Proyectos');

INSERT INTO access (accessName)
VALUES ('Contabilidad'), ('Finanzas'), ('Cadena de Suministro'), ('Aprovisionamiento'), ('Recursos Humanos'), ('Gestión de Proyectos');

INSERT INTO role_has_access (roleId, accessId)
VALUES (1, 1), (1, 2), (1, 3), (1, 4), (1, 5), (1, 6), (2, 1), (3, 2), (4, 3), (5, 4), (6, 5), (7, 6);

INSERT INTO `user` (userId, email, password)
VALUES (1, 'rodrigo.iriarte14@gmail.com', MD5('12345'));

INSERT INTO user_role (userId, roleId)
VALUES (1, 1);

INSERT INTO skill (skillName)
VALUES ('Cocinar');

INSERT INTO employee_skills (employeeId, skillId, `value`)
VALUES (1, 1, 10);

INSERT INTO food_times (foodTimesName)
VALUES ('Desayuno'), ('Almuerzo'), ('Cena');

INSERT INTO company (companyName, companyDirection)
VALUES ('COBOCE', 'Calle Coboce');

INSERT INTO supply_type (supplyTypeName)
VALUES ('Carne');

INSERT INTO dining_area (companyId, diningAreaName, latitude, longitude, averageCalorie) VALUES(1, 'Comedor Coboce', -17.391426, -66.213131, 100);

INSERT INTO petty_cash (diningAreaId, fund) VALUES (1, 69);

INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0001','Pablo','Rodriguez','Solis','1998-07-05','13623834');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0002','Pedro','Candia','Rodriguez','2009-06-10','1458263');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0003','Juan','Felipez','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0004','Ana','Lopez','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0005','Adrian','Mamani','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0006','Juana','Condori','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0007','Dilan','Perez','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0008','Nicolas','Salomon','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0009','Nuria','Mamani','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0010','Daniel','Solis','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0011','Marite','Perez','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0012','Jorge','Condori','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0013','Lina','Chambi','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0014','David','Escobar','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0015','Linda','Caceres','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0016','Judith','Mamani','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0017','Lady','Salazar','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0018','Americo','Condori','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0019','Luis','Coca','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0020','Guillermo','Jimenez','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0021','Miguel','Condori','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0022','Alex','Rodriguez','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0023','Axel','Mamani','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0024','Ariel','Sanga','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0025','Pepe','Soria','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0026','Alexander','Paz','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0027','Amy','Condori','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0028','Andrea','Romero','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0029','Jimena','Santos','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0030','Marite','Salvatierra','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0031','Maria','Perez','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0032','Mariela','Mamani','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0033','Marcela','Lima','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0034','Aldo','Condori','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0035','Jhonatan','Cruz','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0036','Jesus','Andrade','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0037','Alberto','Segobia','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0038','Carlos','Almanza','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0039','Pancho','Terrazas','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0040','Tomas','Condori','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0041','Cesar','Perez','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0042','Cristian','Perez','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0043','Crisopher','Perez','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0044','Wanda','Perez','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0045','Tony','Mamani','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0046','Esteven','Perez','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0047','Paolo','Condori','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0048','Gaston','Perez','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0049','Gustavo','Perez','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0050','Leoncio','Mamani','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0051','Juan','Perez','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0052','Juan','Perez','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0053','Juan','Perez','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0054','Juan','Perez','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0055','Juan','Perez','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0056','Juan','Perez','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0057','Juan','Perez','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0058','Juan','Perez','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0059','Juan','Perez','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0060','Juan','Perez','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0061','Juan','Perez','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0062','Juan','Perez','Perez','2001-05-01','3141516');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0063','Leonel','Messi','Coca','2022-06-15','15696375');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0064','Pedrito','Infante','Mamani','2022-06-18','1569123');
INSERT INTO client (diningAreaId,clientCode,clientName,clientLastName1,clientLastName2,dateOfBirth,clientCI) VALUES (1,'0065','asdas','asda','asd','2022-06-04','1569134');

INSERT INTO product_category (`categoryName`) VALUES ('Helados');
INSERT INTO product_category (`categoryName`) VALUES ('Refrescos');
INSERT INTO product_category (`categoryName`) VALUES ('Jugos');
INSERT INTO product_category (`categoryName`) VALUES ('Extras');
INSERT INTO product_category (`categoryName`) VALUES ('Varios');

INSERT INTO product (`productName`,`productCategoryId`,`productPrice`) VALUES ('Coca Cola',2,10.0000);
INSERT INTO product (`productName`,`productCategoryId`,`productPrice`) VALUES ('Simba',2,9.00);
INSERT INTO product (`productName`,`productCategoryId`,`productPrice`) VALUES ('Sprite',2,10.00);
INSERT INTO product (`productName`,`productCategoryId`,`productPrice`) VALUES ('Fanta',2,10.00);
INSERT INTO product (`productName`,`productCategoryId`,`productPrice`) VALUES ('Pepsi',2,11.00);
INSERT INTO product (`productName`,`productCategoryId`,`productPrice`) VALUES ('Seven Up',2,10.00);
INSERT INTO product (`productName`,`productCategoryId`,`productPrice`) VALUES ('Coca Cola 3lts',2,12.00);
INSERT INTO product (`productName`,`productCategoryId`,`productPrice`) VALUES ('Negrito',1,2.50);
INSERT INTO product (`productName`,`productCategoryId`,`productPrice`) VALUES ('Rocky',1,3.00);
INSERT INTO product (`productName`,`productCategoryId`,`productPrice`) VALUES ('Tentacion',1,5.00);
INSERT INTO product (`productName`,`productCategoryId`,`productPrice`) VALUES ('Ricoco',1,1.50);
INSERT INTO product (`productName`,`productCategoryId`,`productPrice`) VALUES ('Mega Cono',1,3.50);
INSERT INTO product (`productName`,`productCategoryId`,`productPrice`) VALUES ('Salsero',1,1.00);
INSERT INTO product (`productName`,`productCategoryId`,`productPrice`) VALUES ('Del Valle',3,10.00);
INSERT INTO product (`productName`,`productCategoryId`,`productPrice`) VALUES ('Tampico',3,12.00);
INSERT INTO product (`productName`,`productCategoryId`,`productPrice`) VALUES ('Ades',3,6.00);