<?php
require_once "auth.php";

if ($_SESSION['role'] !== 'admin') {
    echo "Acceso denegado";
    exit;
}
