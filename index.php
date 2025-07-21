<?php
include 'includes/conexion.php';
$result = $conn->query("SELECT * FROM emociones ORDER BY fecha DESC");
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>MoodMate</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <main class="grid-layout">
    <section class="screen welcome">
      <div class="logo-circle">😊</div>
      <h1 class="app-name">MoodMate</h1>
      <a href="agregar.php" class="btn">Registrar emoción</a>
    </section>
    <section class="screen registros">
      <h2>Historial emocional</h2>
      <div class="registro-lista">
        <?php while($row = $result->fetch_assoc()): ?>
          <div class="registro">
            <div class="emoji"><?php echo $row['emoji']; ?></div>
            <div class="descripcion"><?php echo $row['descripcion']; ?></div>
            <div class="fecha"><?php echo $row['fecha']; ?></div>
            <div class="acciones">
              <a href="editar.php?id=<?php echo $row['id']; ?>" class="btn small editar">Editar</a>
              <a href="eliminar.php?id=<?php echo $row['id']; ?>" class="btn small eliminar" onclick="return confirm('¿Estás seguro de eliminar esta emoción?')">Eliminar</a>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </section>
  </main>
</body>
</html>