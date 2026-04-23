<nav style="background:#333; padding:10px;">

    <a href="/centro-medico-lamp/public/index.php?route=dashboard" style="color:white; margin-right:10px;">
        Dashboard
    </a>

    <a href="/centro-medico-lamp/public/index.php?route=patients" style="color:white; margin-right:10px;">
        Pacientes
    </a>

    <?php if (isset($_SESSION['user_id'])): ?>
        <a href="/centro-medico-lamp/public/index.php?route=logout" style="color:red;">
            Logout
        </a>
    <?php else: ?>
        <a href="/centro-medico-lamp/public/index.php?route=login" style="color:white;">
            Login
        </a>
    <?php endif; ?>
    <span style="color:white; margin-left:20px;">
        Usuario: <?php echo $_SESSION['username'] ?? 'Invitado'; ?>
    </span>

</nav>
