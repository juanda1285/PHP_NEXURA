<?php
// Incluir el controlador
require_once '../controllers/areaController.php';

// Verificar si se pasó el ID del área
if (isset($_GET['id'])) {
    $areaController = new AreaController();
    $area = $areaController->getAreaById($_GET['id']);

    if ($area) {
        $nombre = $area['nombre'];
    } else {
        echo "Área no encontrada.";
        exit();
    }
} else {
    echo "ID de área no proporcionado.";
    exit();
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];

    // Llamar al controlador para actualizar el área
    $areaController->update($id, $nombre);

    // Redirigir a la página de ver áreas después de la actualización
    header("Location: ../pages/ver_areas.php");
    exit();
}
?>

<!-- Formulario para editar el área -->
<?php include '../layout/header.php'; ?>

<div class="container mt-4">
    <h1>Editar Área</h1>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Área</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Actualizar Área</button>
        <a href="../pages/ver_areas.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php include '../layout/footer.php'; ?>
