CREATE DATABASE `armoire_intelligente`;

CREATE USER 'webAdmin'@localhost IDENTIFIED BY 'password';

GRANT ALL PRIVILEGES ON *.* TO 'webAdmin'@localhost IDENTIFIED BY 'password';

USE `armoire_intelligente`;

CREATE TABLE `armoire_info` (
  `stock_id` varchar(255) PRIMARY KEY NOT NULL,
  `armoire` int unsigned NOT NULL,
  `floor` int unsigned NOT NULL,
  `area` int unsigned NOT NULL,
  `sensorType` varchar(255) NOT NULL,
  `component` varchar(255) NOT NULL,
  `threshold` int unsigned NOT NULL
);

CREATE TABLE `armoire` (
  `id` int unsigned PRIMARY KEY NOT NULL
);

CREATE TABLE `etat_armoire` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `armoire_id` int NOT NULL,
  `temperature` float NOT NULL,
  `humidity` float NOT NULL,
  `updatedAt` datetime NOT NULL
);

CREATE TABLE `armoire_stock` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `stock_id` varchar(255) NOT NULL,
  `quantity` int NOT NULL,
  `updatedAt` datetime NOT NULL
);

CREATE TABLE `users` (
  `username` varchar(255) PRIMARY KEY NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `isAdmin` tinyint NOT NULL,
  `rfid_pass` varchar(255) NOT NULL
);

CREATE TABLE `logs` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `armoire_id` int NOT NULL,
  `user` varchar(255) NOT NULL,
  `door_state` tinyint NOT NULL,
  `updatedAt` datetime NOT NULL
);

ALTER TABLE `etat_armoire` ADD FOREIGN KEY (`armoire_id`) REFERENCES `armoire` (`id`);
ALTER TABLE `logs` ADD FOREIGN KEY (`armoire_id`) REFERENCES `armoire` (`id`);
ALTER TABLE `armoire_info` ADD FOREIGN KEY (`armoire_id`) REFERENCES `armoire` (`id`);
ALTER TABLE `logs` ADD FOREIGN KEY (`user`) REFERENCES `users` (`username`);
ALTER TABLE `armoire_stock` ADD FOREIGN KEY (`stock_id`) REFERENCES `armoire_info` (`stock_id`);
