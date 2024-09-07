<?php include '../layout/header.php'; ?>

<div class="container mt-4">
    <h1 class="mb-4">Ver Áreas</h1>

    <!-- Tabla de Áreas -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
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
                $sql = "SELECT * FROM areas";
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                $areas = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (count($areas) > 0) {
                    foreach ($areas as $row) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['nombre']}</td>
                                <td>
                                    <a href='editar_area.php?id={$row['id']}' class='btn btn-warning btn-sm'> <i class='fas fa-edit'></i></a>
                                    <a href='../functions/borrar_area.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"¿Estás seguro de que deseas eliminar esta área?\");'><i class='fas fa-trash'></i></a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No hay áreas disponibles.</td></tr>";
                }
            } else {
                echo "No se pudo conectar a la base de datos.";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include '../layout/footer.php'; ?>
