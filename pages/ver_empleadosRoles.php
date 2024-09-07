<?php include '../layout/header.php'; ?>

<div class="container mt-4">
    <h1 class="mb-4">Ver relación Empleados/Roles</h1>

    <!-- Tabla de Empleados con Rol  -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Empleado ID </th>
                <th>Role ID</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Conectar a la base de datos
            include '../db/connection.php';

            $database = new Database();
            $conn = $database->getConnection();

            if ($conn) {
                $sql = "SELECT * FROM empleado_rol";
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (count($data) > 0) {
                    foreach ($data as $row) {
                        echo "<tr>
                                <td>{$row['empleado_id']}</td>
                                <td>{$row['rol_id']}</td>                               
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No hay Data disponible.</td></tr>";
                }
            } else {
                echo "No se pudo conectar a la base de datos.";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include '../layout/footer.php'; ?>
