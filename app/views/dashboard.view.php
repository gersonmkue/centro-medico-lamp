<?php require_once "../app/views/partials/header.php";?>

<h2>Dashboard</h2>

<h3>Total de pacientes: <?php echo $stats['total']['total']; ?></h3>

<h3>Edad promedio: <?php echo round($stats['avg_age']['avg_age'], 1); ?></h3>

<hr>

<h3>Últimos pacientes</h3>

<table border="1">
<tr>
    <th>Nombre</th>
    <th>Edad</th>
</tr>

<?php while ($row = $stats['latest']->fetch(PDO::FETCH_ASSOC)): ?>
<tr>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['age']; ?></td>
</tr>
<?php endwhile; ?>

</table>
<?php require_once "../app/views/partials/footer.php";?>
