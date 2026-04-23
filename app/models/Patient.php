<?php

class Patient {
    private $conn;
    private $table = "patients";

    public $id;
    public $name;
    public $age;
    public $diagnosis;

    public function __construct($db) {
        $this->conn = $db;
    }

    // CREATE
    public function create() {
        $query = "INSERT INTO $this->table (name, age, diagnosis)
                  VALUES (:name, :age, :diagnosis)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":age", $this->age);
        $stmt->bindParam(":diagnosis", $this->diagnosis);

        return $stmt->execute();
    }

    // READ (todos)
    public function getAll() {
        $query = "SELECT * FROM $this->table ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    //DELETE PATIENT
    public function delete() {
        $query = "DELETE FROM $this->table WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }

    //UPDATE
    public function getById() {
        $query = "SELECT * FROM $this->table WHERE id = :id LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update() {
        $query = "UPDATE $this->table 
                  SET name = :name, age = :age, diagnosis = :diagnosis
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":age", $this->age);
        $stmt->bindParam(":diagnosis", $this->diagnosis);
        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }
    
    //SEARCH
    public function search($keyword) {
        $query = "SELECT * FROM $this->table 
                  WHERE name LIKE :keyword 
                  ORDER BY id DESC";

        $stmt = $this->conn->prepare($query);

        $keyword = "%$keyword%";
        $stmt->bindParam(":keyword", $keyword);

        $stmt->execute();
        return $stmt;
    }

    public function countAll() {
        $query = "SELECT COUNT(*) as total FROM $this->table";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function averageAge() {
        $query = "SELECT AVG(age) as avg_age FROM $this->table";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getLatest($limit = 5) {
        $query = "SELECT * FROM $this->table ORDER BY created_at DESC LIMIT :limit";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":limit", $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }
}
