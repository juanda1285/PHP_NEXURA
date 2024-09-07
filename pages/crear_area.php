<?php include '../layout/header.php'; ?>

<div class="container mt-4">
    <h1 class="mb-4">Crear Área</h1>

    <form action="../functions/crear_areaF.php" method="POST">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Crear Área</button>
    </form>
</div>

<?php include '../layout/footer.php'; ?>
