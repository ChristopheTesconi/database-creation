-- -----------------------------------------------------
-- Data for table `origami`.`user`
-- -----------------------------------------------------
START TRANSACTION;
USE `origami`;
INSERT INTO `origami`.`users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES (1, 'John', 'john@example.com', 'password1', '2024-02-27', NULL);
INSERT INTO `origami`.`users` (`id`, `name`, `email`, `password`,  `created_at`, `updated_at`) VALUES (2, 'Jane', 'jane@example.com', 'password2', '2024-02-27', NULL);
INSERT INTO `origami`.`users` (`id`, `name`, `email`, `password`,  `created_at`, `updated_at`) VALUES (3, 'Alice', 'alice@example.com', 'password3', '2024-02-27', NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `origami`.`origamis`
-- -----------------------------------------------------
START TRANSACTION;
USE `origami`;
INSERT INTO `origami`.`origamis` (`id`, `name`, `description`,`created_at`, `updated_at`) VALUES (1, 'Dragon', 'origami Dragon', '2024-02-27', NULL);
INSERT INTO `origami`.`origamis` (`id`, `name`, `description`,`created_at`, `updated_at`) VALUES (2, 'Grenouille', 'origami Grenouille', '2024-02-27', NULL);
INSERT INTO `origami`.`origamis` (`id`, `name`, `description`,`created_at`, `updated_at`) VALUES (3, 'Cheval', 'origami Cheval', '2024-02-27', NULL);
INSERT INTO `origami`.`origamis` (`id`, `name`, `description`,`created_at`, `updated_at`) VALUES (4, 'Tortue', 'origami Tortue', '2024-02-27', NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `origami`.`app_user`
-- -----------------------------------------------------
START TRANSACTION;
USE `origami`;
INSERT INTO `origami`.`app_user` (`id`, `email`, `name`, `password`, `role`, `status`, `created_at`, `updated_at`) VALUES (1, 'lucie@origami.fr', 'Lucie Copin', '$2y$10$EePMx53146HlfIrHN7Ooree78V5nlLrhNCM.dZ9wL8NbQXRJbWp1O', 'admin', 1, DEFAULT, NULL);
INSERT INTO `origami`.`app_user` (`id`, `email`, `name`, `password`, `role`, `status`, `created_at`, `updated_at`) VALUES (2, 'helper@origami.fr', 'Alphonse Danlmur', '$2y$10$CbxKjJ7khu/xmSlRCtDgSeChpi.2R83IjEvpFHTA1FhQ1ATY.4way', 'user', 1, DEFAULT, NULL);

COMMIT;

-- Données pour la table COMMENT
INSERT INTO comment (id, comment, id_3, id_2) VALUES 
('1', 'Lorem ipsum dolor sit amet', '1', '1'),
('2', 'Sed do eiusmod tempor incididunt', '2', '2'),
('3', 'Ut enim ad minim veniam', '3', '3'),
('4', 'Duis aute irure dolor in reprehenderit', '4', '4');