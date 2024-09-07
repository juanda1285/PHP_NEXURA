<?php include '../layout/header.php'; ?>

<div class="container mt-4">
    <h1 class="mb-4">Ver Roles</h1>

    <!-- Tabla de Roles -->
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
                $sql = "SELECT * FROM roles";
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (count($roles) > 0) {
                    foreach ($roles as $row) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['nombre']}</td>
                                <td>
                                    <a href='editar_rol.php?id={$row['id']}' class='btn btn-warning btn-sm'> <i class='fas fa-edit'></i></a>
                                    <a href='../functions/borrar_rol.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este rol?\");'><i class='fas fa-trash'></i></a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No hay roles disponibles.</td></tr>";
                }
            } else {
                echo "No se pudo conectar a la base de datos.";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include '../layout/footer.php'; ?>
