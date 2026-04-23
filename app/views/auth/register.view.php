<?php require_once "../app/views/partials/header.php";?>

<h2><a href="/centro-medico-lamp/public/register">Register<a></h2>

<?php if (!empty($error)): ?>
<p style="color:red;"><?php echo $error; ?></p>
<?php endif; ?>

<?php if (!empty($success)): ?>
<p style="color:green;"><?php echo $success; ?></p>
<?php endif; ?>

<form method="POST" action="/centro-medico-lamp/public/login">
    <input type="text" name="username" placeholder="Usuario" required><br><br>
    <input type="password" name="password" placeholder="Contraseña" required><br><br>
    <button type="submit">Registrarse</button>
</form>

<?php require_once "../app/views/partials/footer.php"; ?>
