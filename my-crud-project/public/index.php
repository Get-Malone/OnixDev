<?php
require_once '../vendor/autoload.php';
require_once '../config/app.php';
require_once '../config/database.php';

use App\Controllers\AuthController;

// Check if user is logged in
if (!AuthController::isLoggedIn()) {
    header('Location: /views/auth/login.php');
    exit();
}

// Render home page
include_once '../views/home.php';