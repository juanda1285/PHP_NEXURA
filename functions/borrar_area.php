<?php
require_once '../controllers/areaController.php';

// Verifica si se ha pasado un ID por GET para eliminar
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Crea una instancia del controlador de áreas
    $areaController = new AreaController();

    // Llama al método delete del controlador
    $areaController->delete($id);
    // Redirige a la página de visualización de áreas
    header("Location: ../pages/ver_areas.php");
    exit();

} else {
    echo "ID no proporcionado.";
}
?>
