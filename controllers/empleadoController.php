<?php
include '../db/connection.php';
include '../classes/empleado.php';

class EmpleadoController {
    private $db;
    private $empleado;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->empleado = new Empleado($this->db);
    }

    // Método para crear un empleado
    public function create($nombre, $email, $sexo, $area_id, $boletin, $descripcion) {
        $this->empleado->nombre = $nombre;
        $this->empleado->email = $email;
        $this->empleado->sexo = $sexo;
        $this->empleado->area_id = $area_id;
        $this->empleado->boletin = $boletin;
        $this->empleado->descripcion = $descripcion;
        
        if ($this->empleado->create()) {
             // Obtener el ID del último empleado insertado
            echo "Empleado creado exitosamente.";
            return $this->db->lastInsertId();
        } else {
            echo "Error al crear el empleado.";
        }
    }

    // Método para obtener todos los empleados
    public function readAll() {
        $result = $this->empleado->readAll();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para actualizar un empleado
    public function update($id, $nombre, $email, $sexo, $area_id, $boletin, $descripcion) {
        $this->empleado->id = $id;
        $this->empleado->nombre = $nombre;
        $this->empleado->email = $email;
        $this->empleado->sexo = $sexo;
        $this->empleado->area_id = $area_id;
        $this->empleado->boletin = $boletin;
        $this->empleado->descripcion = $descripcion;

        if ($this->empleado->update()) {
            echo "Empleado actualizado exitosamente.";
        } else {
            echo "Error al actualizar el empleado.";
        }
    }

    // Método para eliminar un empleado
    public function delete($id) {
        $this->empleado->id = $id;
        if ($this->empleado->delete()) {
            echo "Empleado eliminado exitosamente.";
        } else {
            echo "Error al eliminar el empleado.";
        }
    }
}
?>
