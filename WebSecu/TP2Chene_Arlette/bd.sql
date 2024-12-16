-- Base de données
CREATE DATABASE td_php;

-- Table user_table
CREATE TABLE `user_table` (
    `id_user` INT NOT NULL AUTO_INCREMENT,
    `login_user` VARCHAR(30) NOT NULL,
    `date_crea` DATE NOT NULL,
    `date_con` DATE NOT NULL,
    PRIMARY KEY (`id_user`)
) ENGINE = InnoDB;

-- Exemple de données
INSERT INTO `user_table` (`id_user`, `login_user`, `date_crea`, `date_con`) 
VALUES (NULL, 'paul', '2018-11-27', '2018-11-27');

-- Table msg_table
CREATE TABLE `msg_table` (
    `id_msg` INT NOT NULL AUTO_INCREMENT,
    `user_msg` INT NOT NULL,
    `txt_msg` TEXT CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
    `date_msg` DATE NOT NULL,
    PRIMARY KEY (`id_msg`)
) ENGINE = InnoDB;

-- Exemple de données
INSERT INTO `msg_table` (`id_msg`, `user_msg`, `txt_msg`, `date_msg`) 
VALUES (NULL, 1, 'bonjour, message de test de la table', '2018-11-27');

-- Jointure
SELECT * 
FROM msg_table 
LEFT JOIN user_table 
ON msg_table.user_msg = user_table.id_user;
