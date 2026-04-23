<?php require_once "../app/views/partials/header.php"; ?>

<h2><a href="centro-medico-lamp/public/login">Login<a></h2>

<?php if (!empty($error)): ?>
<p style="color:red;"><?php echo $error; ?></p>
<?php endif; ?>

<form method="POST" action="/centro-medico-lamp/public/login">
    <input type="text" name="username" placeholder="Usuario" required>
    <input type="password" name="password" placeholder="Contraseña" required>
    <button type="submit">Ingresar</button>
</form>

<?php require_once "../app/views/partials/footer.php"; ?>
