<?php

function login($username, $password) {
    // Validate username and password
    if ($username === 'admin' && $password === 'password123') {
        // Start session and set user as logged in
        session_start();
        $_SESSION['user'] = $username;
        return true;
    } else {
        return false;
    }
}

function logout() {
    // End session and log user out
    session_start();
    session_destroy();
}

function isLoggedIn() {
    // Check if user is logged in
    session_start();
    return isset($_SESSION['user']);
}

?>