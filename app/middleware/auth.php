<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Si NO hay sesión
if (!isset($_SESSION['user_id'])) {

    header("Location: /centro-medico-lamp/public/index.php?route=login");
    exit;
}
