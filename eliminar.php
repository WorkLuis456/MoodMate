<?php
include 'includes/conexion.php';
$id = $_GET['id'];
$conn->query("DELETE FROM emociones WHERE id=$id");
header('Location: index.php');
?>