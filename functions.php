<?php

session_start();

$host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "zametki_db";

$conn = mysqli_connect($host, $db_user, $db_password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


function validateUsername($username) {
    return preg_match('/^[a-zA-Z0-9_]{3,20}$/', $username);
}

function validatePassword($password) {
    return preg_match('/^(?=.*[a-z])(?=.*[A-Z]).{8,}$/', $password);
}

function escape($data) {
    global $conn;
    return mysqli_real_escape_string($conn, trim($data));
}

function redirect($url) {
  header("Location: " . $url);
  exit;
}

function isLoggedIn() {
  return isset($_SESSION['user_id']);
}

?>
