<?php

class ProjectManager extends AbstractManager {

    // Récupérer tous les projets
    public function findAll() {
        $query = $this->db->query("SELECT * FROM projects ORDER BY created_at DESC");
        // On récupère les résultats sous forme de tableau
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer un projet spécifique par son ID
    public function findOne(int $id) {
        $query = $this->db->prepare("SELECT * FROM projects WHERE id = :id");
        $query->execute(['id' => $id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    
    // Ajouter un projet
    public function create(array $data) {
        $query = $this->db->prepare('INSERT INTO projects (title, description, short_description, image, link_github, link_site) VALUES (:title, :description, :short_description, :image, :link_github, :link_site)');
        return $query->execute($data);
    }
    
    // Modifier un projet
    public function update(array $data) {
        $query = $this->db->prepare('UPDATE projects SET title = :title, description = :description, short_description = :short_description, image = :image, link_github = :link_github, link_site = :link_site WHERE id = :id');
        return $query->execute($data);
    }
    
    // Supprimer un projet
    public function delete(int $id) {
        $query = $this->db->prepare('DELETE FROM projects WHERE id = :id');
        return $query->execute(['id' => $id]);
    }
    }