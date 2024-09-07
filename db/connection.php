<?php
class Database {
    private $host = "localhost";
    private $port = "3307"; // Añade el puerto aquí
    private $db_name = "gestion_empleados";
    private $username = "root";
    private $password = ""; // Cambia si tienes una contraseña
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            // Crear una nueva instancia de PDO con el puerto
            $this->conn = new PDO("mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name, $this->username, $this->password);
            // Configurar el manejo de errores para lanzar excepciones
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            // Mostrar el error de conexión
            echo "Error de conexión: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>
