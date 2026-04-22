@echo off
set BACKUP_FILE=C:\backup\netadmin_backup.sql

if not exist %BACKUP_FILE% (
    echo No existe el archivo de backup.
    pause
    exit /b
)

mysql -u root netadmin < %BACKUP_FILE%

echo Restauracion completada correctamente.
pause
