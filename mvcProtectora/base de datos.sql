CREATE DATABASE IF NOT EXISTS protectora;
USE refugio_animales;

CREATE TABLE animales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    sexo ENUM('Macho', 'Hembra') NOT NULL,
    descripcion TEXT,
    img VARCHAR(255)
);

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE blog (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    comentario TEXT,
    img VARCHAR(255)
);

INSERT INTO animales (nombre, sexo, descripcion, img) VALUES
('Max', 'Macho', 'Un perro enérgico y amigable.', 'max.jpg'),
('Luna', 'Hembra', 'Una gata cariñosa y tranquila.', 'luna.jpg'),
('Rocky', 'Macho', 'Un conejo juguetón y curioso.', 'rocky.jpg');
