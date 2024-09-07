/<?php

require_once '../controllers/areaController.php';

// Verifica si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén el nombre del área desde el formulario
    $nombre = $_POST['nombre'];

    // Crea una instancia del controlador de áreas
    $areaController = new AreaController();

    // Llama al método create del controlador
    $areaController->create($nombre);

    // Redirige o muestra un mensaje de éxito
    header("Location: ../pages/ver_areas.php");
    exit();
} else {
    echo "Método de solicitud no permitido.";
}
?>
