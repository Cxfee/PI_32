-- banco.sql gerado para PI_32
CREATE DATABASE IF NOT EXISTS pi_32
CHARACTER SET utf8mb4
COLLATE utf8mb4_general_ci;

USE pi_32;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nomeusuario VARCHAR(100) NOT NULL UNIQUE,
    email VARCHAR(150) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS resenhas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nomeproduto VARCHAR(150) NOT NULL,
    tipoproduto VARCHAR(150) NOT NULL,
    precoproduto DECIMAL(10,2) DEFAULT 0.00,
    resenha TEXT NOT NULL,
    data_resenha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- Usuário admin atualizado com hash compatível PHP 8.2
INSERT INTO usuarios (nomeusuario, email, senha)
VALUES ('admin', 'admin@teste.com', '$2y$10$1LC4uvtZemIDELUlbmh6G.X0rPjV65aoE8EvX7zPnoxlB6U8d0Ht2');
