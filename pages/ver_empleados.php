<?php include '../layout/header.php'; ?>

<div class="container mt-4">
    <h1 class="mb-4">Ver Empleados</h1>

    <!-- Tabla de Empleados -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Sexo</th>
                <th>Área</th>
                <th>Boletín</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Conectar a la base de datos
            include '../db/connection.php';

            $database = new Database();
            $conn = $database->getConnection();

            if ($conn) {
                $sql = "SELECT empleados.*, areas.nombre AS area_nombre FROM empleados JOIN areas ON empleados.area_id = areas.id";
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                $empleados = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (count($empleados) > 0) {
                    foreach ($empleados as $row) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['nombre']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['sexo']}</td>
                                <td>{$row['area_nombre']}</td>
                                <td>" . ($row['boletin'] ? 'Sí' : 'No') . "</td>
                                <td>{$row['descripcion']}</td>
                                <td>
                                    <a href='editar_empleado.php?id={$row['id']}' class='btn btn-warning btn-sm'> <i class='fas fa-edit'></i></a>
                                    <a href='../functions/borrar_empleado.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este empleado?\");'><i class='fas fa-trash'></i></a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No hay empleados disponibles.</td></tr>";
                }
            } else {
                echo "No se pudo conectar a la base de datos.";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include '../layout/footer.php'; ?>
