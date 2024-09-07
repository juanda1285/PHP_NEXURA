<?php include '../layout/header.php'; ?>
        <h1 class="mb-4 ml-3">Gestión de Empleados</h1>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Áreas
                    </div>
                    <div class="card-body">
                        <a href="crear_area.php" class="btn btn-primary">Crear Área</a>
                        <a href="ver_areas.php" class="btn btn-secondary">Ver Áreas</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Roles
                    </div>
                    <div class="card-body">
                        <a href="crear_rol.php" class="btn btn-primary">Crear Rol</a>
                        <a href="ver_roles.php" class="btn btn-secondary">Ver roles</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Empleados
                    </div>
                    <div class="card-body">
                        <a href="crear_empleado.php" class="btn btn-primary">Crear Empleado</a>
                        <a href="ver_empleados.php" class="btn btn-secondary">Ver Empleados</a>
                    </div>
                </div>
            </div>
        </div>

<?php include '../layout/footer.php'; ?>