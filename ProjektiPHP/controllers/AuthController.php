<?php

include './config/Database.php';

class AuthController
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;   
    }

    public function login($request)
    {
        $query = $this->db->pdo->prepare('SELECT id,name,email,password,is_admin, created_at FROM users WHERE email = :email');
        $query->bindParam(':email', $request['email']);
        $query->execute();

        $user = $query->fetch();
        $message = '';
        
        if(count($user) > 0 && password_verify($request['password'], $user['password']) && $user['is_admin'] == 0){
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['is_admin'] = $user['is_admin'];

            return header("Location: ./index.php");

        } else if(count($user) > 0 && password_verify($request['password'], $user['password']) && $user['is_admin'] == 1){
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['is_admin'] = $user['is_admin'];

            return header("Location: ./dashboard.php");
        } else {
            $message = 'Sorry, those credentials do not match';
        }
    }
}