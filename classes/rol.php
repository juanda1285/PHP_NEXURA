<?php
class Rol {
    private $conn;
    private $table_name = "roles";

    public $id;
    public $nombre;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para crear un rol
    public function create() {
        try {
            $query = "INSERT INTO " . $this->table_name . " SET nombre=:nombre";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":nombre", $this->nombre);
            if ($stmt->execute()) {
                return true;
            } else {
                throw new Exception("Error al crear el área.");
            }
        } catch (PDOException $e) {
            echo "Error de PDO: " . $e->getMessage();
            return false;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

     // Método para obtener un rol por ID
    public function readOne() {
        try {
            $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id", $this->id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC); // Devolver datos en formato asociativo
        } catch (PDOException $e) {
            echo "Error de PDO: " . $e->getMessage();
            return null;
        }
    }

    // Método para obtener todos los roles
    public function readAll() {
        try {
            $query = "SELECT * FROM " . $this->table_name;
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Devolver datos en formato asociativo
        } catch (PDOException $e) {
            echo "Error de PDO: " . $e->getMessage();
            return [];
        }
    }

    // Método para actualizar un rol
    public function update() {
        try {
            $query = "UPDATE " . $this->table_name . " SET nombre = :nombre WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":nombre", $this->nombre);
            $stmt->bindParam(":id", $this->id);
            if ($stmt->execute()) {
                return true;
            } else {
                throw new Exception("Error al actualizar el Rol.");
            }
        } catch (PDOException $e) {
            echo "Error de PDO: " . $e->getMessage();
            return false;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    // Método para eliminar un rol
    public function delete() {
        try {
            $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
    
            if ($stmt->execute()) {
                // Verificar si realmente se eliminó algún registro
                if ($stmt->rowCount() > 0) {
                    return true;
                } else {
                    throw new Exception("No se encontró el Rol con el ID proporcionado.");
                }
            } else {
                throw new Exception("Error al eliminar el Rol.");
            }
        } catch (PDOException $e) {
            echo "Error de PDO: " . $e->getMessage();
            return false;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
?>
