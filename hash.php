<?php
echo "GENERADOR DE CONTRASENAS CON HASH";
echo "admin123:";
echo password_hash("admin123", PASSWORD_DEFAULT);

echo "tecnico1123:";
echo password_hash("admin123", PASSWORD_DEFAULT);
?>