<?php

class ProjectController extends AbstractController {

   // Dans controllers/ProjectController.php

public function index() {
    $projectManager = new ProjectManager();
    $projects = $projectManager->findAll();

    // On ajoute 'projects/' devant le nom du template
    $this->render('projects/list', [
        'projects' => $projects,
        'title' => 'Mes Réalisations'
    ]);
}

    // 2. Afficher un seul projet (Page de détail)
    public function show($id) {
        // Si on n'a pas d'ID, on redirige vers la liste
        if (!$id) {
            header('Location: index.php?page=projects');
            exit();
        }

        $projectManager = new ProjectManager();
        $project = $projectManager->findOne($id);

        // Si le projet n'existe pas dans la base
        if (!$project) {
            echo "Projet introuvable !";
            return;
        }

      // Dans ProjectController.php, ligne 37 (environ)
$this->render('projects/details', [
    'project' => $project
]);
    }
}