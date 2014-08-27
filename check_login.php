<?php
include_once './functions.php';
$username = $_POST['username'];
$password = $_POST['password'];

if (login($username, $password) == true) {
    redirect_to('home.php');
} else {
    redirect_to('index.php');
}
?>