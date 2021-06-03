<?php
    require './controllers/UserController.php';

    $user = new UserController;

    

    if(isset($_POST['submitted'])) {
        $errors = [];
        $name = $user->test_input($_POST['name']);
        $email = $user->test_input($_POST['email']);

        if ( empty( $name ) ) {
            $errors[] = 'Name should not be empty!';
        } else {
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                $errors[] = "Only alphabets and white space are allowed!";
            }
        }

        if(empty($email)){
            $errors[] = 'Email should not be empty!';
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid email format!";
            }
        }
        
        if ( empty( $errors ) ) {
            $user->store($_POST);
        }
    }
?>
<html>
    <head>
    <link rel="stylesheet" href="css/login&Register.css">
    <style>
        body{
            background-image: url(images/foter.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
    </head>
    <body>
        <div class="mainPage">
        
        <form id="registerForm" action="" method="post">
        <p class="login">Register</p>
            <input type="text" name="name" placeholder="full name"
                    data-validation="length alphanumeric" data-validation-length="min4" required>
            

            <input type="email" name="email" placeholder="email" data-validation="email" required>

            <input type="password" name="password" placeholder="password" data-validation="confirmation" required>

            <input type="submit" class="buttonLogin" name="submitted" value="Register">
            <?php if ( !empty( $errors ) ): ?>
                <div class="errors">
                    <p ><?php echo join( '<br>', $errors ) ?></p>
                </div>
            <?php endif ?>
        </form>
        </div>
    </body>
</html>