<?php
ob_start();
require "../includes/header.php";
require "../config/config.php";


//  Redirect user to login page if not signed in
if (!isset($_SESSION['user_id'])) {
    header("location: " . APPURL . "");
}

// Check if the 'id' parameter is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Deleting whole product
    $delete = $conn->query("DELETE FROM cart WHERE id = '$id'");
    $delete->execute();

    header("location: cart.php");
}
ob_end_flush();
