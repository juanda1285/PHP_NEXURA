<?php
class EmpleadoRol {
    private $conn;
    private $table_name = "empleado_rol";

    public $empleado_id;
    public $rol_id;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para asignar un rol a un empleado
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET empleado_id=:empleado_id, rol_id=:rol_id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":empleado_id", $this->empleado_id);
        $stmt->bindParam(":rol_id", $this->rol_id);

        return $stmt->execute();
    }

    // Método para actualizar la asignación de un rol a un empleado
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET rol_id = :rol_id WHERE empleado_id = :empleado_id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":empleado_id", $this->empleado_id);
        $stmt->bindParam(":rol_id", $this->rol_id);

        return $stmt->execute();
    }

    // Método para eliminar la asignación de un rol a un empleado
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE empleado_id = :empleado_id AND rol_id = :rol_id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":empleado_id", $this->empleado_id);
        $stmt->bindParam(":rol_id", $this->rol_id);

        return $stmt->execute();
    }
}
?>
