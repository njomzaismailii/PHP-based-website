<?php
    require './controllers/AuthController.php';

    $user = new AuthController;

    if(isset($_POST['submitted'])) {
        $errors = [];
        $email = $user->test_input($_POST['email']);

        if(empty($email)){
            $errors[] = 'Email should not be empty!';
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid email format";
            }
        }
        if(empty($errors)){
            $user->login($_POST);
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

        .warning {
            color: white;
        }
    </style>
    </head>
    <body>
        <div class="mainPage">
        <form action="" name="myForm" method="post" onsubmit="return(validate())">
            <p class="login">Login</p>
            <input type="text" name="email" placeholder="username" data-validation="email" required>
            <input type="password" name="password" placeholder="password" required>
            <a href="register.php">No account? Create one</a>
            <input type="submit" class="buttonLogin" name="submitted" value="Dergo">
            <?php if ( !empty( $errors ) ): ?>
                <div class="errors">
                    <?php echo join( '<br>', $errors ) ?>
                </div>
            <?php endif ?>
        </form> 
        </div>
    </body>
</html>