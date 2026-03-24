<?php

abstract class AbstractManager {
    protected $db;

    public function __construct() {
        $config = require __DIR__ . '/../config/database.php';

        try {
            $this->db = new PDO(
                "mysql:host=" . $config['host'] . ";dbname=" . $config['dbname'] . ";charset=utf8",
                $config['user'],
                $config['password']
            );
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die("Erreur : " . $e->getMessage());
        }
    }
}