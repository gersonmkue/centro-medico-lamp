<?php

require_once "../app/config/database.php";
require_once "../app/models/User.php";

class AuthController {

    private $db;
    private $user;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
        $this->user = new User($this->db);
    }

    public function login($username, $password) {

        $this->user->username = $username;
        $userData = $this->user->findByUsername();

        if ($userData && password_verify($password, $userData['password'])) {

            $_SESSION['user_id'] = $userData['id'];
            $_SESSION['username'] = $userData['username'];
            $_SESSION['role'] = $userData['role'];

            return true;
        }

        return false;
    }
 
    public function register($username, $password, $role = 'user') {

         // Validaciones básicas
        if (empty($username) || empty($password)) {
            return ["success" => false, "message" => "Campos obligatorios"];
        }

        if (strlen($password) < 6) {
            return ["success" => false, "message" => "La contraseña debe tener al menos 6 caracteres"];
        }

        // Verificar si ya existe usuario
        $this->user->username = $username;
        $existingUser = $this->user->findByUsername();

        if ($existingUser) {
            return ["success" => false, "message" => "El usuario ya existe"];
        }

        // Crear usuario
        $this->user->password = $password;
        $this->user->role = $role;

        if ($this->user->createUser()) {
            return ["success" => true];
        }

        return ["success" => false, "message" => "Error al registrar"];
    }
 
   public function loginView() {

        $error = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->login($_POST['username'], $_POST['password'])) {
                header("Location: index.php?route=dashboard");
                exit;
            } else {
                $error = "Credenciales incorrectas";
            }
        }

        require "../app/views/auth/login.view.php";
    }

    public function registerView() {

        $error = "";
        $success = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $result = $this->register(
                $_POST['username'],
                $_POST['password']
            );

            if ($result['success']) {
                $success = "Usuario creado";
            } else {
                $error = $result['message'];
            }
        }

        require "../app/views/auth/register.view.php";
    }

    public function logout() {
        session_destroy();
        header("Location: index.php?route=login");
        exit;
    }
}
