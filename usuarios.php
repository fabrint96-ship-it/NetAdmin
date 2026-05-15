<?php
require_once 'includes/auth.php';
require_once __DIR__ . '/config/db.php';
require_once 'includes/functions.php';

bloquearSiNoEsAdmin();

$usuarios = $pdo->query("SELECT id, username, rol, fecha_creacion FROM usuarios ORDER BY id DESC")->fetchAll();
?>

<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="main">
    <h1>Gestión de usuarios</h1>

    <?php if (isset($_GET['error']) && $_GET['error'] === 'usuario_duplicado'): ?>
        <p class="error">Ese nombre de usuario ya existe.</p>
    <?php endif; ?>

    <?php if (isset($_GET['error']) && $_GET['error'] === 'ultimo_admin'): ?>
        <p class="error">No se puede eliminar el último usuario administrador.</p>
    <?php endif; ?>

    <?php if (isset($_GET['error']) && $_GET['error'] === 'no_autoeliminar'): ?>
        <p class="error">No puedes eliminar tu propio usuario mientras estás conectado.</p>
    <?php endif; ?>

    <form action="add_usuario.php" method="POST" class="form-grid">
        <input type="text" name="username" placeholder="Nombre de usuario" required>
        <input type="password" name="password" placeholder="Contraseña" required>

        <select name="rol" required>
            <option value="admin">Admin</option>
            <option value="tecnico">Técnico</option>
            <option value="auditor">Auditor</option>
        </select>

        <button type="submit">Crear usuario</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Rol</th>
                <th>Fecha creación</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($usuarios as $user): ?>
                <tr>
                    <td><?php echo limpiar($user['id']); ?></td>
                    <td><?php echo limpiar($user['username']); ?></td>
                    <td><?php echo limpiar($user['rol']); ?></td>
                    <td><?php echo limpiar($user['fecha_creacion'] ?? ''); ?></td>
                    <td>
                        <a href="edit_usuario.php?id=<?php echo $user['id']; ?>">Editar</a> |
                        <a href="delete_usuario.php?id=<?php echo $user['id']; ?>" onclick="return confirm('¿Eliminar este usuario?');">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'includes/footer.php'; ?>