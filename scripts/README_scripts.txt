SCRIPTS DE SEGURIDAD Y ALTA DISPONIBILIDAD

backup.bat
- Realiza una copia de seguridad de la base de datos netadmin.
- Guarda el archivo en C:\backup\netadmin_backup.sql.
- Utiliza mysqldump incluido en XAMPP.

restore.bat
- Restaura la base de datos netadmin desde C:\backup\netadmin_backup.sql.
- Utiliza mysql incluido en XAMPP.

Ruta de MySQL utilizada:
C:\xampp\mysql\bin\

Pruebas recomendadas:
1. Insertar datos en la aplicación.
2. Ejecutar backup.bat.
3. Borrar datos desde la aplicación o phpMyAdmin.
4. Ejecutar restore.bat.
5. Comprobar que los datos han sido recuperados.