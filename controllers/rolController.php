<?php
include '../db/connection.php';
include '../classes/rol.php';

class RolController {
    private $db;
    private $rol;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->rol = new Rol($this->db);
    }

    // Método para crear un rol
    public function create($nombre) {
        $this->rol->nombre = $nombre;
        if ($this->rol->create()) {
            echo "Rol creado exitosamente.";
        } else {
            echo "Error al crear el rol.";
        }
    }

      // Método para obtener el rol por ID
      public function getRolById($id) {
        $this->rol->id = $id;
        return $this->rol->readOne();  // Retorna los datos de un Rol
    }

    // Método para obtener todos los roles
    public function readAll() {
        $result = $this->rol->readAll();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para actualizar un rol
    public function update($id, $nombre) {
        $this->rol->id = $id;
        $this->rol->nombre = $nombre;

        if ($this->rol->update()) {
            echo "Rol actualizado exitosamente.";
        } else {
            echo "Error al actualizar el rol.";
        }
    }

    // Método para eliminar un rol
    public function delete($id) {
        $this->rol->id = $id;
        if ($this->rol->delete()) {
            echo "Rol eliminado exitosamente.";
        } else {
            echo "Error al eliminar el rol.";
        }
    }
}
?>
