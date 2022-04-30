CREATE TABLE `armoire` (
  `ifa_id` varchar(255) PRIMARY KEY NOT NULL,
  `id` int NOT NULL,
  `floor_id` int NOT NULL,
  `area_id` int NOT NULL,
  `sensorType` varchar(255) NOT NULL,
  `component` varchar(255) NOT NULL,
  `restock_quantity` int NOT NULL
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

ALTER TABLE `logs` ADD FOREIGN KEY (`user`) REFERENCES `users` (`username`);

ALTER TABLE `armoire_stock` ADD FOREIGN KEY (`stock_id`) REFERENCES `armoire` (`ifa_id`);
