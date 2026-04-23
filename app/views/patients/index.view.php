<?php require_once __DIR__ . "/../partials/header.php";?>

<h2>Pacientes</h2>

<?php if ($error): ?>
<p style="color:red;"><?php echo $error; ?></p>
<?php endif; ?>

<?php if ($success): ?>
<p style="color:green;"><?php echo $success; ?></p>
<?php endif; ?>

<form method="POST">

    <input type="hidden" name="id"
        value="<?php echo $editMode ? $patientData['id'] : ''; ?>">

    <input type="text" name="name" placeholder="Nombre"
        value="<?php echo $editMode ? $patientData['name'] : ''; ?>" required>

    <br>

    <input type="number" name="age" placeholder="Edad"
        value="<?php echo $editMode ? $patientData['age'] : ''; ?>">

    <br>

    <textarea name="diagnosis" placeholder="Diagnóstico"><?php
        echo $editMode ? $patientData['diagnosis'] : '';
    ?></textarea>

    <br>

    <?php if ($editMode): ?>
        <button type="submit" name="update">Actualizar</button>
    <?php else: ?>
        <button type="submit">Agregar</button>
    <?php endif; ?>

</form>

<hr>

<h3>Lista de pacientes</h3>

<form method="GET" action="/centro-medico-lamp/public/patients">
    <input type="hidden" name="route" value="patients">
    <input type="text" name="search" placeholder="Buscar paciente">
    <button type="submit">Buscar</button>
</form>

<table border="1">
<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Edad</th>
    <th>Diagnóstico</th>
    <th>Acciones</th>
</tr>

<?php while ($row = $patients->fetch(PDO::FETCH_ASSOC)): ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['age']; ?></td>
    <td><?php echo $row['diagnosis']; ?></td>
    <td><a href="/centro-medico-lamp/public/patients?delete=<?php echo $row['id']; ?>"
       onclick="return confirm('¿Eliminar paciente?')">
       Eliminar
    </a>
    <a href="/centro-medico-lamp/public/patients?edit=<?php echo $row['id']; ?>">
    Editar
    </a></td>
</tr>
<?php endwhile; ?>

</table>

<?php require_once __DIR__ . "/../partials/footer.php";?>
