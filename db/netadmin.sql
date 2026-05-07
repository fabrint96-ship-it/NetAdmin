CREATE DATABASE IF NOT EXISTS netadmin
CHARACTER SET utf8mb4
COLLATE utf8mb4_spanish_ci;

USE netadmin;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    rol VARCHAR(30) NOT NULL DEFAULT 'tecnico',
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE equipos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    ip VARCHAR(20) NOT NULL UNIQUE,
    tipo VARCHAR(50) NOT NULL,
    sistema_operativo VARCHAR(50),
    ubicacion VARCHAR(80),
    estado VARCHAR(20) DEFAULT 'Activo',
    fecha_alta TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE servicios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    puerto INT NOT NULL,
    protocolo VARCHAR(10) NOT NULL,
    equipo_id INT,
    estado VARCHAR(20) DEFAULT 'Activo',
    FOREIGN KEY (equipo_id) REFERENCES equipos(id)
        ON DELETE SET NULL
        ON UPDATE CASCADE
);

CREATE TABLE incidencias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    descripcion TEXT,
    prioridad VARCHAR(20) DEFAULT 'Media',
    estado VARCHAR(20) DEFAULT 'Abierta',
    equipo_id INT,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (equipo_id) REFERENCES equipos(id)
        ON DELETE SET NULL
        ON UPDATE CASCADE
);

CREATE TABLE logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50),
    accion VARCHAR(150) NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);