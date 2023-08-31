<?php
ob_start();
require "../includes/header.php";
require "../config/config.php";

if (!isset($_SERVER['HTTP_REFERER'])) {
    // redirect them to your desired location
    header('location: http://localhost/coffee-blend');
    exit;
}

//  Redirect user to login page if not signed in
if (!isset($_SESSION['user_id'])) {
    header("location: " . APPURL . "");
}

// Deleting all product
$deleteAll = $conn->query("DELETE FROM cart WHERE user_id = '$_SESSION[user_id]'");
$deleteAll->execute();

header("location: cart.php");
ob_end_flush();
