<?php

class AdminController extends AbstractController {

    public function __construct() {
        if (!isset($_SESSION['admin'])) {
            header('Location: index.php?page=login');
            exit();
        }
    }

    public function index() {
        $pm = new ProjectManager();
        $projects = $pm->findAll();
        $this->render('admin/dashboard', ['projects' => $projects]);
    }

    // AJOUTER
    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pm = new ProjectManager();
            // On prépare les données exactement comme dans ton Manager
            $pm->create([
                'title'             => $_POST['title'],
                'description'       => $_POST['description'],
                'short_description' => $_POST['short_description'],
                'image'             => $_POST['image'],
                'link_github'       => $_POST['link_github'],
                'link_site'         => $_POST['link_site']
            ]);
            header('Location: index.php?page=admin');
            exit();
        }
        $this->render('admin/add');
    }

    // MODIFIER
    public function edit() {
        $id = $_GET['id'] ?? null;
        $pm = new ProjectManager();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pm->update([
                'id'                => (int)$_POST['id'],
                'title'             => $_POST['title'],
                'description'       => $_POST['description'],
                'short_description' => $_POST['short_description'],
                'image'             => $_POST['image'],
                'link_github'       => $_POST['link_github'],
                'link_site'         => $_POST['link_site']
            ]);
            header('Location: index.php?page=admin');
            exit();
        }

        $project = $pm->findOne((int)$id);
        $this->render('admin/edit', ['project' => $project]);
    }

    // SUPPRIMER
    public function delete() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $pm = new ProjectManager();
            $pm->delete((int)$id);
        }
        header('Location: index.php?page=admin');
        exit();
    }
}