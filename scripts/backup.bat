@echo off
set BACKUP_DIR=C:\backup

if not exist %BACKUP_DIR% (
    mkdir %BACKUP_DIR%
)

mysqldump -u root netadmin > %BACKUP_DIR%\netadmin_backup.sql

echo Backup realizado correctamente en %BACKUP_DIR%
pause
