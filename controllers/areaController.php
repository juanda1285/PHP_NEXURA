<?php

include '../db/connection.php';
include '../classes/area.php';

class AreaController {
    private $db;
    private $area;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->area = new Area($this->db);
    }

    // Método para obtener el área por ID
    public function getAreaById($id) {
        $this->area->id = $id;
        return $this->area->readOne();  // Retorna los datos de un área
    }

    // Método para crear un área
    public function create($nombre) {
        $this->area->nombre = $nombre;
        if ($this->area->create()) {
            echo "Área creada exitosamente.";
        } else {
            echo "Error al crear el área.";
        }
    }

    // Método para obtener todas las áreas
    public function readAll() {
        $result = $this->area->readAll();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para actualizar un área
    public function update($id, $nombre) {
        $this->area->id = $id;
        $this->area->nombre = $nombre;
        if ($this->area->update()) {
            echo "Área actualizada exitosamente.";
        } else {
            echo "Error al actualizar el área.";
        }
    }

    // Método para eliminar un área
    public function delete($id) {
        $this->area->id = $id;
        if ($this->area->delete()) {
            echo "Área eliminada exitosamente.";
        } else {
            echo "Error al eliminar el área.";
        }
    }
}
?>
