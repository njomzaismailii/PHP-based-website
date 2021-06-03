<?php 

include './config/Database.php';

class ContactController{
    public $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function all(){
        $query = $this->db->pdo->query('SELECT * FROM messages');
        
        return $query->fetchAll();
    }

    public function store($request){
        
        $password = password_hash($request['password'], PASSWORD_DEFAULT);

        $query = $this->db->pdo->prepare('INSERT INTO messages (name, email, message) VALUES (:name, :email, :message)' );
        $query->bindParam(':name', $request['name']);
        $query->bindParam(':email', $request['email']);
        $query->bindParam(':message', $request['message']);
        $query->execute();

        if($query->execute()) {
            $userMessage = "Your message has been sent!";
            return header('Location: ./index.php');
        } else {
            $userMessage = "A problem occurred creating your account";
        }
    
        header("Location: contact.php");
    }

    public function destroy($id)
    {
        $query = $this->db->pdo->prepare('DELETE FROM messages WHERE id = :id');
        $query->execute(['id' => $id]);

        return header('Location: ./messages.php');
    }

}