<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    die("Access Denied");
}

include '../db.php';

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM employees WHERE id=$id");

header("Location: view.php");
exit();
?>