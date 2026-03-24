<?php

abstract class AbstractController {
    
    public function render(string $template, array $data = []) {
        // 1. On transforme les clés du tableau en variables
        extract($data);
        
        // 2. On définit le chemin vers le fichier de la page (vue)
        $filePath = __DIR__ . '/../templates/' . $template . '.phtml';

        if (file_exists($filePath)) {
            // --- DÉBUT DE LA MISE EN MÉMOIRE ---
            ob_start(); 
            
            // On charge le contenu de la page (ex: home.phtml)
            require $filePath; 
            
            // On récupère tout ce qui vient d'être chargé et on le met dans $content
            $content = ob_get_clean(); 
            // --- FIN DE LA MISE EN MÉMOIRE ---

            // 3. On appelle le layout global qui va afficher $content
            require __DIR__ . '/../templates/layout.phtml';
        } else {
            die("Erreur : Le fichier template est introuvable à l'adresse : " . $filePath);
        }
    }
}