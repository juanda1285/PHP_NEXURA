<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="verport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        .content {
            flex: 1;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Gestión de Empleados</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="crear_area.php">Crear Área</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="crear_rol.php">Crear Rol</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="crear_empleado.php">Crear Empleado</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ver_areas.php">Ver Áreas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ver_roles.php">Ver roles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ver_empleados.php">Ver Empleados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ver_empleadosRoles.php"> Empleados/Roles</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-4">