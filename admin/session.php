<?php
include('connect.php');
session_start();

$user_check = $_SESSION['login_user'];

$ses_sql = mysqli_query($dbc, "select user_name from login where user_name = '$user_check' ");

$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

$login_session = $row['user_name'];

if (!isset($_SESSION['login_user'])) {
    header("location:../login.php");
    die();
}
?>
