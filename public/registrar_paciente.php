<?php
require_once "../app/config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$nombre = $_POST["nombre"];
	$edad = $_POST["edad"];
	$telefono = $_POST["telefono"];

	$sql = "INSERT INTO pacientes (nombre, edad, telefono) VALUES ('$nombre', '$edad', '$telefono')";
	
	if ($conn->query($sql) === TRUE) {
		echo "Paciente registrado correctamente";
	} else {
		echo "Error: " . $conn->error;
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Registrar Paciente</title>
</head>

<body>

<h2>Registro de Pacientes</h2>

<form method="POST">

Nombre:
<input type="text" name="nombre" required><br><br>

Edad:
<input type="number" name="edad" required><br><br>

Telefono:
<input type="text" name="telefono"><br><br>

<button type="submit">Registrar</button>

</form>

</body>
</html>
