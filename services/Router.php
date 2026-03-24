<?php

class Router {
    
    public function handleRequest() {
        $page = $_GET['page'] ?? 'home';

        switch ($page) {
            case 'home':
                $controller = new HomeController();
                $controller->index();
                break;

            case 'projects':
                $controller = new ProjectController();
                $controller->index();
                break;

            case 'details':
                $controller = new ProjectController();
                $id = $_GET['id'] ?? null;
                $controller->show($id);
                break;

            // --- AJOUT DES ROUTES DE CONNEXION ---
            case 'login':
                $controller = new AuthController();
                $controller->login();
                break;

            case 'logout':
                $controller = new AuthController();
                $controller->logout();
                break;

            // --- ROUTES ADMIN ---
            case 'admin':
                $controller = new AdminController();
                $controller->index();
                break;
            
            case 'admin-delete':
                $controller = new AdminController();
                $controller->delete($_GET['id'] ?? null);
                break;
                
            case 'admin-edit':
                $controller = new AdminController();
                $controller->edit();
                break;
                
            case 'admin-add':
                $controller = new AdminController();
                $controller->add();
                break;

            // --- LE DEFAULT TOUJOURS À LA FIN ---
            default:
                echo "Erreur 404 : Cette page n'existe pas !";
                break;
        }
    }
}