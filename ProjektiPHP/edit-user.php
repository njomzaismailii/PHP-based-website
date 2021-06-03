<?php
    include 'inc/sideNav.php';
    require './controllers/UserController.php';

    $user = new UserController;
    
    if(isset($_GET['id'])) {
        $userId = $_GET['id'];
    }

    $currentUser = $user->edit($userId);

    if(isset($_POST['submitted'])) {
        $errors = [];
        $name = $user->test_input($_POST['name']);
        $email = $user->test_input($_POST['email']);

        if ( empty( $name ) ) {
            $errors[] = 'Title should not be empty!';
        } else {
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                $errors[] = "Only alphabets and white space are allowed";
            }
        }

        if(empty($email)){
            $errors[] = 'Email should not be empty!';
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid email format";
            }
        }
        
        if ( empty( $errors) ) {
            $user->update($userId, $_POST);
        }
        
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit User</title>
    <link rel="stylesheet" href="">
</head>
<body>
    <div class="addMenu">
    <h2>Update User</h2>
        <form class="edit-menuForm" action="" method="POST" enctype="multipart/form-data">

            <label >Full Name</label>
            <input type="text" value="<?php echo $currentUser['name']; ?>" name="name"
                data-validation="length alphanumeric" data-validation-length="min4" required>

            <label>Email</label>            
            <input type="text" value="<?php echo $currentUser['email']; ?>" name="email" data-validation="email" required>
            
            <label>Role</label>
            <input type="checkbox" <?php echo $currentUser['is_admin'] === '1'  ? 'checked' : '';  ?> name="is_admin">Is Admin?
            
            <button type="submit"   class="addMenuButton" name="submitted">UPDATE</button>
            <?php if ( !empty( $errors ) ): ?>
                <div class="errors">
                    <?php echo join( '<br>', $errors ) ?>
                </div>
            <?php endif ?>
        </form>
    </div>
    
</body>
</html>