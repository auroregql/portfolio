<?php

class AuthController extends AbstractController {
    
    public function login() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // On compare directement avec '==' au lieu de password_verify
        if ($email === ADMIN_EMAIL && $password === ADMIN_PASSWORD) {
            $_SESSION['admin'] = true; 
            header('Location: index.php?page=admin');
            exit();
        } else {
            $error = "Identifiants incorrects";
        }
    }
    $this->render('auth/login', ['error' => $error ?? null]);
}

    public function logout() {
        session_destroy();
        header('Location: index.php');
        exit();
    }
}