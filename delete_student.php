<?php include 'connect.php';
$id = $_GET['id'];
$conn->query("DELETE FROM attendance WHERE student_id = $id");
$conn->query("DELETE FROM students WHERE id = $id");
header("Location: index.php");
?>


