create database if not exists crud;

use crud;

CREATE TABLE IF NOT EXISTS `articles`
(
    `id`           int(11) NOT NULL AUTO_INCREMENT,
    `author_name`  varchar(30) NOT NULL,
    `article_text` longtext NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = MyISAM
  DEFAULT CHARSET = latin1
  AUTO_INCREMENT = 74;
