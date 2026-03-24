<?php

class HomeController extends AbstractController {
    
    public function index() {
        // Pour l'instant, on envoie juste un message de test
        $message = "Bienvenue sur mon Portfolio !";
        
        // On demande au parent (AbstractController) d'afficher le fichier home.php
        // et de lui passer le message
        $this->render('home', [
            'welcomeMessage' => $message
        ]);
    }
}