<?php 

include './config/Database.php';

class UserController{
    protected $db;

    public function __construct(){
        $this->db = new Database;
    }

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;   
    }

    public function all(){
        $query = $this->db->pdo->query('SELECT * FROM users');

        return $query->fetchAll();
    }

    public function store($request)
    {
        isset($request['is_admin']) ? $isAdmin = 1 : $isAdmin = 0;
        $password = password_hash($request['password'], PASSWORD_DEFAULT);

        $query = $this->db->pdo->prepare('INSERT INTO users (name, email, password, is_admin) VALUES (:name, :email, :password, :is_admin)');
        $query->bindParam(':name', $request['name']);
        $query->bindParam(':email', $request['email']);
        $query->bindParam(':password', $password);
        $query->bindParam(':is_admin', $isAdmin);
        $query->execute();

        return header('Location: ./index.php');
    }

    public function edit($id){
        $query = $this->db->pdo->prepare('SELECT * FROM users WHERE id = :id');
        $query->execute(['id' => $id]);

        return $query->fetch();
    }

    public function update($id, $request)
    {
        isset($request['is_admin']) ? $isAdmin = 1 : $isAdmin = 0;

        $query = $this->db->pdo->prepare('UPDATE users SET name = :name, email = :email, is_admin = :is_admin WHERE id = :id');
        $query->execute([
            'name' => $request['name'],
            'email' => $request['email'],
            'is_admin' => $isAdmin,
            'id' => $id
        ]);

        return header('Location: ./users.php');
    }


    public function destroy($id){
        $query = $this->db->pdo->prepare('DELETE FROM users WHERE id = :id');
        $query->execute(['id' => $id]);

        return header('Location: ./users.php');
    }
   
}



?>