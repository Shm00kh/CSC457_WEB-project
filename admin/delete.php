<?php
session_start();
require_once '../database.php';

if (!isset($_SESSION["admin_id"])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET["id"])) {
    $id = intval($_GET["id"]);

    $stmt = $conn->prepare("DELETE FROM regions WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: dashboard.php?deleted=1");
        exit();
    } else {
        header("Location: dashboard.php?error=1");
        exit();
    }
} else {
    header("Location: dashboard.php");
    exit();
}
?>