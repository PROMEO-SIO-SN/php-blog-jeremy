<?php
session_start();
if (isset($_SESSION['is_connected']) && !$_SESSION['is_connected']) {
    header('location: /pages/login.php');
} else if (isset($_SESSION['is_connected']) && $_SESSION['is_connected'] && $_SESSION['user']['role_id'] == 3) {
    header('location: /');
}