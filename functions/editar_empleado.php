<?php
require_once '../controllers/EmpleadoController.php';
require_once '../controllers/EmpleadoRolController.php';

// Verifica si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $sexo = $_POST['sexo'];
    $email = $_POST['email'];
    $area_id = $_POST['area_id'];
    $descripcion = $_POST['descripcion'];
    $boletin = isset($_POST['boletin']) ? 1 : 0;

    // Crea una instancia del controlador de empleados
    $empleadoController = new EmpleadoController();
    $empleadoRolController = new EmpleadoRolController();

    // Llama al método update del controlador
    $empleadoController->update($id, $nombre, $email, $sexo, $area_id, $boletin, $descripcion);

    // Actualiza la relación con el rol
    // No se puede hacer asi ya que no existe foranea de rol dentro de empleados , toca hacer otro proceso 
    // $empleadoRolController->update($id, $rol_id);

    header("Location: ../pages/ver_empleados.php");
    exit();
} else {
    echo "Método de solicitud no permitido.";
}
?>
