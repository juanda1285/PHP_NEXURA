<?php
class Empleado {
    private $conn;
    private $table_name = "empleados";

    public $id;
    public $nombre;
    public $email;
    public $sexo;
    public $area_id;
    public $boletin;
    public $descripcion;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para crear un empleado
    public function create() {
        try {
        $query = "INSERT INTO " . $this->table_name . " SET nombre=:nombre, email=:email, sexo=:sexo, area_id=:area_id, boletin=:boletin, descripcion=:descripcion";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":sexo", $this->sexo);
        $stmt->bindParam(":area_id", $this->area_id);
        $stmt->bindParam(":boletin", $this->boletin);
        $stmt->bindParam(":descripcion", $this->descripcion);
        if ($stmt->execute()) {
            return true;
        } else {
            throw new Exception("Error al crear el Empleado.");
        }
    } catch (PDOException $e) {
        echo "Error de PDO: " . $e->getMessage();
        return false;
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }


    }

    // Método para obtener todos los empleados
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

      // Método para obtener un empleado por ID
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


    // Método para actualizar un empleado
    public function update() {
        try {
        $query = "UPDATE " . $this->table_name . " SET nombre=:nombre, email=:email, sexo=:sexo, area_id=:area_id, boletin=:boletin, descripcion=:descripcion WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":sexo", $this->sexo);
        $stmt->bindParam(":area_id", $this->area_id);
        $stmt->bindParam(":boletin", $this->boletin);
        $stmt->bindParam(":descripcion", $this->descripcion);
        $stmt->bindParam(":id", $this->id);
        if ($stmt->execute()) {
            return true;
        } else {
            throw new Exception("Error al actualizar el Empleado.");
        }
    } catch (PDOException $e) {
        echo "Error de PDO: " . $e->getMessage();
        return false;
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
    }

    // Método para eliminar un empleado
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
                    throw new Exception("No se encontró el Empleado con el ID proporcionado.");
                }
            } else {
                throw new Exception("Error al eliminar el Empleado.");
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
