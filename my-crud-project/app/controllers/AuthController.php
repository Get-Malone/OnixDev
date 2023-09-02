<?php

namespace App\Controllers;

use App\Models\User;

class AuthController
{
    public function login()
    {
        // Check if user is already logged in
        if (isset($_SESSION['user_id'])) {
            header('Location: /');
            exit;
        }

        // Check if form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sanitize input data
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

            // Find user by email
            $user = User::where('email', $email)->first();

            // Check if user exists and password is correct
            if ($user && password_verify($password, $user->password)) {
                // Set session variables
                $_SESSION['user_id'] = $user->id;
                $_SESSION['user_name'] = $user->name;

                // Redirect to home page
                header('Location: /');
                exit;
            } else {
                // Display error message
                $error = 'Invalid email or password';
            }
        }

        // Load login view
        require_once '../views/auth/login.php';
    }

    public function register()
    {
        // Check if user is already logged in
        if (isset($_SESSION['user_id'])) {
            header('Location: /');
            exit;
        }

        // Check if form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sanitize input data
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

            // Create new user
            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->password = password_hash($password, PASSWORD_DEFAULT);
            $user->save();

            // Set session variables
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_name'] = $user->name;

            // Redirect to home page
            header('Location: /');
            exit;
        }

        // Load register view
        require_once '../views/auth/register.php';
    }

    public function logout()
    {
        // Unset session variables
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);

        // Redirect to home page
        header('Location: /');
        exit;
    }
}