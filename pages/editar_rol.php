<?php
// Incluir el controlador
require_once '../controllers/rolController.php';

// Verificar si se pasó el ID del rol
if (isset($_GET['id'])) {
    $rolController = new rolController();
    $rol = $rolController->getrolById($_GET['id']);

    if ($rol) {
        $nombre = $rol['nombre'];
    } else {
        echo "rol no encontrada.";
        exit();
    }
} else {
    echo "ID de rol no proporcionado.";
    exit();
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];

    // Llamar al controlador para actualizar el rol
    $rolController->update($id, $nombre);

    // Redirigir a la página de ver roles después de la actualización
    header("Location: ../pages/ver_roles.php");
    exit();
}
?>

<!-- Formulario para editar el rol -->
<?php include '../layout/header.php'; ?>

<div class="container mt-4">
    <h1>Editar Rol</h1>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del rol</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Actualizar rol</button>
        <a href="../pages/ver_roles.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php include '../layout/footer.php'; ?>
