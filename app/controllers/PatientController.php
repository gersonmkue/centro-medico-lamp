<?php

require_once "../app/config/database.php";
require_once "../app/models/Patient.php";

class PatientController {

    private $patient;

    public function __construct() {
        $database = new Database();
        $db = $database->connect();
        $this->patient = new Patient($db);
    }

    public function create($data) {

        if (empty($data['name'])) {
            return ["success" => false, "message" => "Nombre obligatorio"];
        }

        $this->patient->name = $data['name'];
        $this->patient->age = $data['age'];
        $this->patient->diagnosis = $data['diagnosis'];

        if ($this->patient->create()) {
            return ["success" => true];
        }

        return ["success" => false, "message" => "Error al crear paciente"];
    }

    public function getAll() {
        return $this->patient->getAll();
    }
    
    public function delete($id) {

        if (empty($id)) {
            return ["success" => false, "message" => "ID inválido"];
        }

        $this->patient->id = $id;

        if ($this->patient->delete()) {
            return ["success" => true];
        }

        return ["success" => false, "message" => "Error al eliminar"];
    }

    public function getById($id) {
        $this->patient->id = $id;
        return $this->patient->getById();
    }

    public function update($data) {

        if (empty($data['id']) || empty($data['name'])) {
            return ["success" => false, "message" => "Datos inválidos"];
        }

        $this->patient->id = $data['id'];
        $this->patient->name = $data['name'];
        $this->patient->age = $data['age'];
        $this->patient->diagnosis = $data['diagnosis'];

        if ($this->patient->update()) {
            return ["success" => true];
        }

        return ["success" => false, "message" => "Error al actualizar"];
    }

    public function search($keyword) {
        return $this->patient->search($keyword);
    }
    
    public function getStats() {
        return [
            "total" => $this->patient->countAll(),
            "avg_age" => $this->patient->averageAge(),
            "latest" => $this->patient->getLatest()
        ];
    }

    public function index() {

        require_once "../app/middleware/auth.php";

        $error = "";
        $success = "";

        // DELETE
        if (isset($_GET['delete'])) {
            $this->delete($_GET['delete']);
            header("Location: index.php?route=patients");
            exit;
        }

        // EDIT
        $editMode = false;
        $patientData = null;

        if (isset($_GET['edit'])) {
            $editMode = true;
            $patientData = $this->getById($_GET['edit']);
        }

        // UPDATE / CREATE
        if (isset($_POST['update'])) {

            $result = $this->update($_POST);

            if ($result['success']) {
                header("Location: index.php?route=patients");
                exit;
            } else {
                $error = $result['message'];
            }

        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
            $result = $this->create($_POST);

            if ($result['success']) {
                $success = "Paciente agregado";
            } else {
                $error = $result['message'];
            }
        }

        // SEARCH
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $patients = $this->search($_GET['search']);
        } else {
            $patients = $this->getAll();
        }

        require "../app/views/patients/index.view.php";
    }
    
    public function dashboard() {

        require_once "../app/middleware/auth.php";

        $stats = $this->getStats();

        require "../app/views/dashboard.view.php";
    }
}
