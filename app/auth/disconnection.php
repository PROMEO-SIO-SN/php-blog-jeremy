<?php
session_start();
unset($_SESSION['user']);
$_SESSION['is_connected'] = false;

header('location: /pages/login.php');