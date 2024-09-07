<?php
require_once '../db/connection.php';
include '../classes/empleadoRol.php';

class EmpleadoRolController {
    private $db;
    private $empleadoRol;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->empleadoRol = new EmpleadoRol($this->db);
    }

    // Método para asignar un rol a un empleado
    public function create($empleado_id, $rol_id) {
        $this->empleadoRol->empleado_id = $empleado_id;
        $this->empleadoRol->rol_id = $rol_id;

        if ($this->empleadoRol->create()) {
            echo "Asignación de rol a empleado creada exitosamente.";
        } else {
            echo "Error al asignar el rol.";
        }
    }

    // Método para actualizar la asignación de un rol a un empleado
    public function update($empleado_id, $rol_id) {
        $this->empleadoRol->empleado_id = $empleado_id;
        $this->empleadoRol->rol_id = $rol_id;

        if ($this->empleadoRol->update()) {
            echo "Asignación de rol a empleado actualizada exitosamente.";
        } else {
            echo "Error al actualizar la asignación de rol.";
        }
    }

    // Método para eliminar la asignación de un rol a un empleado
    public function delete($empleado_id, $rol_id) {
        $this->empleadoRol->empleado_id = $empleado_id;
        $this->empleadoRol->rol_id = $rol_id;

        if ($this->empleadoRol->delete()) {
            echo "Asignación de rol a empleado eliminada exitosamente.";
        } else {
            echo "Error al eliminar la asignación.";
        }
    }
}
?>
