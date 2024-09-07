<?php
require_once '../controllers/empleadoController.php';

// Verifica si se ha pasado un ID por GET para eliminar
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Crea una instancia del controlador de Empleados
    $EmpleadoController = new EmpleadoController();

    // Llama al método delete del controlador
    $EmpleadoController->delete($id);
    // Redirige a la página de visualización de empleados
    header("Location: ../pages/ver_empleados.php");
    exit();

} else {
    echo "ID no proporcionado.";
}
?>
