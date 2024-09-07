<?php include '../layout/header.php'; ?>
<?php
// Conectar a la base de datos y obtener el ID del empleado
include '../db/connection.php';

$database = new Database();
$conn = $database->getConnection();

if (isset($_GET['id'])) {
    $empleado_id = $_GET['id'];

    // Obtener datos del empleado
    $query = "SELECT * FROM empleados WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $empleado_id);
    $stmt->execute();
    $empleado = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$empleado) {
        echo "Empleado no encontrado.";
        exit();
    }
} else {
    echo "ID de empleado no proporcionado.";
    exit();
}

// Obtener áreas y roles
$queryAreas = "SELECT * FROM areas";
$stmtAreas = $conn->prepare($queryAreas);
$stmtAreas->execute();
$areas = $stmtAreas->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="container mt-4">
    <h1 class="mb-4">Editar Empleado</h1>

    <form action="../functions/editar_empleado.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $empleado['id']; ?>">

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input pattern="[A-Za-z\s]+" type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $empleado['nombre']; ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $empleado['email']; ?>" required>
        </div>
        <div class="form-group">
            <label for="sexo">Sexo:</label>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="sexo_m" name="sexo" value="M" <?php echo ($empleado['sexo'] == 'M') ? 'checked' : ''; ?> required>
                <label class="form-check-label" for="sexo_m">Masculino</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="sexo_f" name="sexo" value="F" <?php echo ($empleado['sexo'] == 'F') ? 'checked' : ''; ?> required>
                <label class="form-check-label" for="sexo_f">Femenino</label>
            </div>
        </div>
        <div class="form-group">
            <label for="area_id">Área:</label>
            <select class="form-control" id="area_id" name="area_id" required>
                <?php foreach ($areas as $area) { ?>
                    <option value="<?php echo $area['id']; ?>" <?php echo ($empleado['area_id'] == $area['id']) ? 'selected' : ''; ?>>
                        <?php echo $area['nombre']; ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion"><?php echo $empleado['descripcion']; ?></textarea>
        </div>
        <div class="form-group form-check mt-3">
            <input type="checkbox" class="form-check-input" id="boletin" name="boletin" value="1" <?php echo ($empleado['boletin'] == 1) ? 'checked' : ''; ?>>
            <label class="form-check-label" for="boletin">Desea recibir el boletín informativo</label>
        </div>
       
        <button type="submit" class="btn btn-primary mt-3">Actualizar Empleado</button>
    </form>
</div>

<?php include '../layout/footer.php'; ?>
