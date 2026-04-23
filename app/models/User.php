<?php

class User {
    private $conn;
    private $table = "users";

    public $id;
    public $username;
    public $password;
    public $role;

    public function __construct($db) {
        $this->conn = $db;
    }

    // ✅ MÉTODO 1: crear usuario
    public function createUser() {
        $query = "INSERT INTO " . $this->table . " 
                  (username, password, role) 
                  VALUES (:username, :password, :role)";

        $stmt = $this->conn->prepare($query);

        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);

        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":role", $this->role);

        return $stmt->execute();
    }

    // ✅ MÉTODO 2: buscar usuario
    public function findByUsername() {
        $query = "SELECT * FROM " . $this->table . " 
                  WHERE username = :username 
                  LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":username", $this->username);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
