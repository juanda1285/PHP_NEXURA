<?php

require_once '../controllers/empleadoController.php';
require_once '../controllers/empleadoRolController.php';

// Verifica si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $sexo = $_POST['sexo'];
    $email = $_POST['email'];
    $area_id = $_POST['area_id'];
    $descripcion = $_POST['descripcion'];
    $boletin = isset($_POST['boletin']) ? 1 : 0;
    $rol_id = $_POST['rol_id'];

    // Crea una instancia del controlador de empleados
    $empleadoController = new EmpleadoController();
    $empleadoRolController = new EmpleadoRolController();

    // Llama al método create del controlador
    $empleado_id = $empleadoController->create($nombre,$email, $sexo,$area_id,$boletin, $descripcion);

    // Si el empleado fue creado correctamente, guarda la relación con el rol
    if ($empleado_id) {
        $empleadoRolController->create($empleado_id, $rol_id);
        header("Location: ../pages/ver_empleados.php");
        exit();
    }
} else {
    echo "Método de solicitud no permitido.";
}
?>
