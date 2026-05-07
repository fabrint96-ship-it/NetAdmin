@echo off
set BACKUP_DIR=C:\backup
set BACKUP_FILE=%BACKUP_DIR%\netadmin_backup.sql

if not exist %BACKUP_DIR% (
    mkdir %BACKUP_DIR%
)

C:\xampp\mysql\bin\mysqldump -u root netadmin > %BACKUP_FILE%

if exist %BACKUP_FILE% (
    echo Backup realizado correctamente en %BACKUP_FILE%
) else (
    echo Error al realizar el backup.
)

pause