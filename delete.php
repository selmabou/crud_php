<?php
require_once "connection.php";

try {
    $stmt = $conn->prepare("DELETE FROM students WHERE id=:id");
    $stmt->bindParam("id", $_GET['id']);
    $stmt->execute();
  
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header("location:crud.php");

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
