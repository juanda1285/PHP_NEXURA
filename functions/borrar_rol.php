<?php
require_once '../controllers/rolController.php';

// Verifica si se ha pasado un ID por GET para eliminar
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Crea una instancia del controlador de roles
    $areaController = new RolController();

    // Llama al método delete del controlador
    $areaController->delete($id);
    // Redirige a la página de visualización de roles
    header("Location: ../pages/ver_roles.php");
    exit();

} else {
    echo "ID no proporcionado.";
}
?>
