<?php
include 'includes/conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $emoji = $_POST['emoji'];
  $descripcion = $_POST['descripcion'];
  $fecha = $_POST['fecha'];
  $conn->query("INSERT INTO emociones (emoji, descripcion, fecha) VALUES ('$emoji', '$descripcion', '$fecha')");
  header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registrar Emoción</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <main class="grid-layout">
    <section class="screen record-emotion">
      <h2>Registrar emoción</h2>
      <form method="POST">
        <select name="emoji" required>
          <option value="😊">😊 Feliz</option>
          <option value="😢">😢 Triste</option>
          <option value="😠">😠 Enojado</option>
          <option value="😴">😴 Cansado</option>
        </select>
        <input type="text" name="descripcion" placeholder="¿Por qué te sientes así?" required />
        <input type="date" name="fecha" required />
        <button type="submit" class="btn">Guardar</button>
      </form>
      <a href="index.php" class="btn-secondary">Volver</a>
    </section>
  </main>
</body>
</html>