USE netadmin;

INSERT INTO usuarios (username, password, rol)
VALUES
('admin', '$2y$10$W4i1ECxF6Ux3V0OcyFXZs.5p7eHIw5feSTdvYYD/5Rd6xnF0CZ1xW', 'admin'),
('tecnico1', '$2y$10$2MF7C91XAIj627BAFdvhSO/1HDCeRIipVC/gbw/5IZaZ3yJNz5.wm', 'tecnico');

INSERT INTO equipos (nombre, ip, tipo, sistema_operativo, ubicacion, estado) VALUES
('SRV-AD-01', '192.168.1.10', 'Servidor', 'Windows Server', 'CPD', 'Activo'),
('SRV-WEB-01', '192.168.1.20', 'Servidor', 'Windows 10 / Apache', 'Equipo local', 'Activo'),
('RTR-CORE-01', '192.168.1.1', 'Router', 'Cisco IOS', 'Rack principal', 'Activo'),
('SW-PLANTA-01', '192.168.1.2', 'Switch', 'Firmware gestionable', 'Rack principal', 'Activo'),
('PC-ADMIN-01', '192.168.1.50', 'PC', 'Windows 10', 'Oficina técnica', 'Activo');

INSERT INTO servicios (nombre, puerto, protocolo, equipo_id, estado) VALUES
('HTTP', 80, 'TCP', 2, 'Activo'),
('MySQL', 3306, 'TCP', 2, 'Activo'),
('DNS', 53, 'UDP', 1, 'Activo'),
('DHCP', 67, 'UDP', 1, 'Activo'),
('SSH', 22, 'TCP', 3, 'Activo');

INSERT INTO incidencias (titulo, descripcion, prioridad, estado, equipo_id) VALUES
('Revisión del servidor web', 'Comprobar funcionamiento de Apache y PHP.', 'Media', 'Abierta', 2),
('Actualización de switch', 'Pendiente revisar firmware del switch principal.', 'Baja', 'Abierta', 4),
('Prueba de recuperación', 'Incidencia de prueba para validar backups y restauración.', 'Alta', 'En proceso', 2);

INSERT INTO logs (usuario, accion) VALUES
('admin', 'Inicialización de la base de datos'),
('admin', 'Carga de datos iniciales'),
('admin', 'Creación de registros de prueba');