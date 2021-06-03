<?php 

include './config/Database.php';

class StaffController{
    public $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function all(){
        $query = $this->db->pdo->query('SELECT * FROM staff_info');
        
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

        $query = $this->db->pdo->prepare('INSERT INTO staff_info (title, description, image) VALUES (:title, :description, :image)');
        $query->bindParam(':title', $request['title']);
        $query->bindParam(':description', $request['description']);
        $query->bindParam(':image', $image_file);

        $query->execute();
        return header('Location: ./adminStaff.php');
    }

    public function edit($id)
    {
        $query = $this->db->pdo->prepare('SELECT * FROM staff_info WHERE id = :id');
        $query->execute(['id' => $id]);

        return $query->fetch();
    }

    public function update($id, $request){
        $query = $this->db->pdo->prepare('UPDATE staff_info SET title = :title, description = :description, image = :image WHERE id = :id');
        $update_params = [
            'title' => $request['title'],
            'description' => $request['description'],
            'image' => $request['current_image'],
            'id' => $id,
        ];

        if ( ! empty( $_FILES['image']['name'] ) ) {
            $image_file = time() . $_FILES['image']['name'];
            $temp = $_FILES['image']['tmp_name'];
            move_uploaded_file($temp, "uploads/".$image_file);
            $update_params['image'] = $image_file;
        }

        // var_dump($update_params); die;
        $query->execute( $update_params );

        return header('Location: ./adminStaff.php');
    }
    
    public function destroy($id)
    {
        $query = $this->db->pdo->prepare('DELETE FROM staff_info WHERE id = :id');
        $query->execute(['id' => $id]);

        return header('Location: ./adminStaff.php');
    }




}

?>