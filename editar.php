<?php
include 'includes/conexion.php';
$id = $_GET['id'];
$row = $conn->query("SELECT * FROM emociones WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $emoji = $_POST['emoji'];
  $descripcion = $_POST['descripcion'];
  $fecha = $_POST['fecha'];
  $conn->query("UPDATE emociones SET emoji='$emoji', descripcion='$descripcion', fecha='$fecha' WHERE id=$id");
  header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Emoción</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <main class="grid-layout">
    <section class="screen record-emotion">
      <h2>Editar emoción</h2>
      <form method="POST">
        <select name="emoji" required>
          <option value="😊" <?= $row['emoji']=='😊'?'selected':'' ?>>😊 Feliz</option>
          <option value="😢" <?= $row['emoji']=='😢'?'selected':'' ?>>😢 Triste</option>
          <option value="😠" <?= $row['emoji']=='😠'?'selected':'' ?>>😠 Enojado</option>
          <option value="😴" <?= $row['emoji']=='😴'?'selected':'' ?>>😴 Cansado</option>
        </select>
        <input type="text" name="descripcion" value="<?= $row['descripcion'] ?>" required />
        <input type="date" name="fecha" value="<?= $row['fecha'] ?>" required />
        <button type="submit" class="btn">Actualizar</button>
      </form>
      <a href="index.php" class="btn-secondary">Volver</a>
    </section>
  </main>
</body>
</html>