<?php 

include './config/Database.php';

class MenuController{
    public $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function all(){
        $query = $this->db->pdo->query('SELECT * FROM menu');
        
        return $query->fetchAll();
    }
    
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;   
    }

    

    public function store($request){
        $image_file = time() . $_FILES['image']['name'];
        $temp = $_FILES['image']['tmp_name'];
        move_uploaded_file($temp, "uploads/".$image_file);

        $query = $this->db->pdo->prepare('INSERT INTO menu (title, image, description, posted_by) VALUES (:title, :image, :description, :posted_by)');
        $query->bindParam(':title', $request['title']);
        $query->bindParam(':image', $image_file);
        $query->bindParam(':description', $request['description']);
        $query->bindParam(':posted_by', $request['posted_by']);

        $query->execute();
        return header('Location: ./adminMenu.php');
    }

    public function edit($id)
    {
        $query = $this->db->pdo->prepare('SELECT * FROM menu WHERE menu_id = :menu_id');
        $query->execute(['menu_id' => $id]);

        return $query->fetch();
    }

    public function update($id, $request){
        $query = $this->db->pdo->prepare('UPDATE menu SET title = :title, image = :image, description = :description, posted_by = :posted_by WHERE menu_id = :menu_id');
        $update_params = [
            'title' => $request['title'],
            'description' => $request['description'],
            'posted_by' => $request['posted_by'],
            'image' => $request['current_image'],
            'menu_id' => $id,
        ];

        if ( ! empty( $_FILES['image']['name'] ) ) {
            $image_file = time() . $_FILES['image']['name'];
            $temp = $_FILES['image']['tmp_name'];
            move_uploaded_file($temp, "uploads/".$image_file);
            $update_params['image'] = $image_file;
        }

        // var_dump($update_params); die;
        $query->execute( $update_params );

        return header('Location: ./adminMenu.php');
    }
    
    public function destroy($id)
    {
        $query = $this->db->pdo->prepare('DELETE FROM menu WHERE menu_id = :menu_id');
        $query->execute(['menu_id' => $id]);

        return header('Location: ./adminMenu.php');
    }



}