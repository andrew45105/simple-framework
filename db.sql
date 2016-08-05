CREATE DATABASE IF NOT EXISTS `sframe` CHARACTER SET utf8 COLLATE utf8_general_ci;
use `sframe`;

CREATE TABLE `article` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `created_at` INT(11) NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `text` TEXT NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
