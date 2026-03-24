<?php

class Project {
    // On liste les propriétés (les mêmes que dans ta base de données)
    private $id;
    private $title;
    private $short_description;
    private $description;
    private $image;
    private $link_github;
    private $link_site;

    // Le constructeur permet de remplir l'objet quand on le crée
    public function __construct(array $data = []) {
        if (!empty($data)) {
            $this->id = $data['id'] ?? null;
            $this->title = $data['title'] ?? null;
            $this->short_description = $data['short_description'] ?? null;
            $this->description = $data['description'] ?? null;
            $this->image = $data['image'] ?? null;
            $this->link_github = $data['link_github'] ?? null;
            $this->link_site = $data['link_site'] ?? null;
        }
    }

    // On ajoute des "Getters" pour pouvoir lire les infos plus tard
    public function getId() { return $this->id; }
    public function getTitle() { return $this->title; }
    public function getShortDescription() { return $this->short_description; }
    public function getDescription() { return $this->description; }
    public function getImage() { return $this->image; }
    public function getLinkGithub() { return $this->link_github; }
    public function getLinkSite() { return $this->link_site; }
}