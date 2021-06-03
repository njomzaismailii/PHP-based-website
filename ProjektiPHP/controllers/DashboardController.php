<?php 

include './config/Database.php';

class DashboardController{
    public $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function allMenus(){
        $query = $this->db->pdo->query('SELECT * FROM menu');
        
        return $query->fetchAll();
    }

    public function allMessages(){
        $query = $this->db->pdo->query('SELECT * FROM messages');
        
        return $query->fetchAll();
    }

    public function allUsers(){
        $query = $this->db->pdo->query('SELECT * FROM users');

        return $query->fetchAll();
    }
}