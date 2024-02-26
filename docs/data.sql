-- Données pour la table COMMENT
INSERT INTO COMMENT (id, comment, id_2, id_3) VALUES 
('1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '1', '1'),
('2', 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2', '2'),
('3', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '3', '3'),
('4', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '4', '4');

-- Données pour la table ORIGAMI
INSERT INTO ORIGAMI (id, name, description, created_at, updated_at, id_2) VALUES 
('1', 'Grenouille', 'Description de l\'origami Grenouille', '2024-02-27', NULL, '1'),
('2', 'Dragon', 'Description de l\'origami Dragon', '2024-02-27', NULL, '2'),
('3', 'Cheval', 'Description de l\'origami Cheval', '2024-02-27', NULL, '3'),
('4', 'Hérisson', 'Description de l\'origami Hérisson', '2024-02-27', NULL, '4');

-- Données pour la table USER
INSERT INTO USER (id, name, email, password) VALUES 
('1', 'John Doe', 'john@example.com', 'password1'),
('2', 'Jane Smith', 'jane@example.com', 'password2'),
('3', 'Alice Johnson', 'alice@example.com', 'password3'),
('4', 'Bob Brown', 'bob@example.com', 'password4');
