


-- Schema featstar

-- Table `product`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `product` ;

CREATE TABLE IF NOT EXISTS `product` (
 `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL COMMENT 'Le nom du produit',
  `description` TEXT NULL COMMENT  'La description du produit',
  `picture` VARCHAR(128) NULL COMMENT 'L\'URL de l\'image du produit',
  `price` DECIMAL(10,2) NOT NULL DEFAULT 0 COMMENT 'Le prix du produit',
  `status` TINYINT(1) NOT NULL DEFAULT 0 COMMENT 'Le statut du produit (1=dispo, 2=pas dispo)',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'La date de création du produit',
  `updated_at` TIMESTAMP NULL COMMENT 'La date de la dernière mise à jour du produit',
  `category_id` INT UNSIGNED NOT NULL,
  `type_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_product_category1_idx` (`category_id` ASC),
  INDEX `fk_product_type1_idx` (`type_id` ASC))
  ENGINE = InnoDB;



  -- -----------------------------------------------------
-- Table `category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `category` ;

CREATE TABLE IF NOT EXISTS `category` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(64) NOT NULL COMMENT 'Le nom de la catégorie',
  `picture` VARCHAR(128) NULL COMMENT 'L\'URL de l\'image de la catégorie (utilisée en home, par exemple)',
  `home_order` TINYINT(1) NOT NULL DEFAULT 0 COMMENT 'L\'ordre d\'affichage de la catégorie sur la home (0=pas affichée en home)',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'La date de création de la catégorie',
  `updated_at` TIMESTAMP NULL COMMENT 'La date de la dernière mise à jour de la catégorie',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;




-- -----------------------------------------------------
-- Table `type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `type` ;

CREATE TABLE IF NOT EXISTS `type` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(64) NOT NULL COMMENT 'Le nom du type',
  `footer_order` TINYINT(1) NOT NULL DEFAULT 0 COMMENT 'L\'ordre d\'affichage du type dans le footer (0=pas affichée dans le footer)',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'La date de création de la catégorie',
  `updated_at` TIMESTAMP NULL COMMENT 'La date de la dernière mise à jour de la catégorie',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;