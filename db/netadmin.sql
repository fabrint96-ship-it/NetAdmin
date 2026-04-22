CREATE DATABASE IF NOT EXISTS netadmin;
USE netadmin;

-- Tabla usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Tabla equipos
CREATE TABLE equipos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    ip VARCHAR(20),
    tipo VARCHAR(50),
    ubicacion VARCHAR(50)
);

INSERT INTO usuarios (username, password)
VALUES ('admin', 'AQUI_EL_HASH');

INSERT INTO equipos (nombre, ip, tipo, ubicacion) VALUES
('PC-01', '192.168.1.10', 'PC', 'Oficina'),
('SRV-01', '192.168.1.20', 'Servidor', 'CPD'),
('RTR-01', '192.168.1.1', 'Router', 'Rack');

CREATE TABLE logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    accion VARCHAR(100),
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
