<?php include '../layout/header.php'; ?>

<div class="container mt-4">
    <h1 class="mb-4">Crear Empleado</h1>

    <form action="../functions/crear_empleado.php" method="POST" id="formulario">
        <div class="form-group">
            <label for="nombre">Nombre*:</label>
            <input  type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="email">Email*:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="sexo">Sexo*:</label>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="sexo_m" name="sexo" value="M" required>
                <label class="form-check-label" for="sexo_m">Masculino</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="sexo_f" name="sexo" value="F" required>
                <label class="form-check-label" for="sexo_f">Femenino</label>
            </div>
        </div>
        <div class="form-group">
            <label for="area_id">Área*:</label>
            <select class="form-control" id="area_id" name="area_id" required>
                <?php
                // Conectar a la base de datos y obtener áreas
                include '../db/connection.php';
                $database = new Database();
                $conn = $database->getConnection();

                $query = "SELECT * FROM areas";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $areas = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (count($areas) > 0) {
                foreach ($areas as $area) {
                    echo "<option value='{$area['id']}'>{$area['nombre']}</option>";
                }
            }else {
                echo "<option disabled selected>No hay áreas disponibles.</option>";
            }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
        </div>
        <div class="form-group form-check mt-3">
            <input type="checkbox" class="form-check-input" id="boletin" name="boletin" value="1">
            <label class="form-check-label" for="boletin">Desea recibir el boletín informativo</label>
        </div>
        <div class="form-group mt-3">
            <label for="roles">Rol*:</label>
            <?php
            // Conectar a la base de datos y obtener roles
            $query = "SELECT * FROM roles";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($roles) > 0) {
            foreach ($roles as $role) {
                echo "<div class='form-check'>
                        <input type='radio' class='form-check-input' id='role_{$role['id']}' name='rol_id' value='{$role['id']}' required>
                        <label class='form-check-label' for='role_{$role['id']}'>{$role['nombre']}</label>
                      </div>";
            }
        }else {
            echo "<label class='label' >No hay Roles disponibles.</label>";
        }
            ?>
        </div>
        <?php
          if (count($roles) > 0  and count($areas)> 0 ) {
       echo " <button type='submit' class='btn btn-primary mt-3'>Crear Empleado</button>";
          } else {
            echo " <button type='submit' class='btn btn-primary mt-3'>Crear Empleado</button>";
          }
          ?>
    </form>

</div>


<?php include '../layout/footer.php'; ?>
