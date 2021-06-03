<?php
    include './inc/sideNav.php';
    require './controllers/UserController.php';

    $user = new UserController;

    if(isset($_POST['submit'])) {
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
            $user->store($_POST);
        }
    }
?>
<html>
    <head>
    <link rel="stylesheet" hreg="css/dashboard.css">
    </head>
    <body>
        <div class="addMenu">
            <form action="" method="POST" enctype="multipart/form-data" class="menuForm">
                <h2>Add User</h2>
                <label >Full Name</label>
                <input type="text" name="name" data-validation="length alphanumeric" data-validation-length="min4" required>

                <label>Email</label>
                <input type="email" name="email" data-validation="email" required>

                <label>Password</label>
                <input type="password" name="password" data-validation="confirmation" required>

                <label>Role</label>
                <input type="checkbox" name="is_admin">Is Admin?
                <input type="submit" class="addMenuButton" name="submit" value="Add User">
                <?php if ( !empty( $errors ) ): ?>
                <div class="errors">
                    <?php echo join( '<br>', $errors ) ?>
                </div>
            <?php endif ?>
            </form>
        </div>
    </body>
</html>