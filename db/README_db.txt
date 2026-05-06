BASE DE DATOS: netadmin 
Archivos: 
1. netadmin.sql 
 Crea la base de datos, tablas y relaciones. 
2. seed.sql 
 Inserta usuarios, equipos, servicios, incidencias y logs iniciales. 
Orden de importación: 
1. Importar netadmin.sql 
2. Importar seed.sql 
Tablas principales: 
usuarios: 
- Guarda los usuarios de acceso a la aplicación. 
equipos: 
- Guarda los equipos de red administrados desde la herramienta. 
servicios: 
- Guarda servicios asociados a equipos. 
incidencias:
- Guarda incidencias técnicas relacionadas con los equipos. 
logs: 
- Guarda acciones relevantes realizadas en el sistema. 
Usuario inicial: 
- admin 
- contraseña: admin123 
Nota: 
La contraseña debe guardarse cifrada mediante password_hash() en PHP. 
