<?php

require './controllers/ContactController.php';

$message = new ContactController;

if(isset($_POST['submit'])){
    $message->store($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <title>Document</title>
    <link rel="stylesheet" href="css/homepage.css">
    <link rel="stylesheet" href="css/contact.css">  
    <script src="script.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&family=Andika+New+Basic&family=Dancing+Script:wght@700&family=Indie+Flower&display=swap" rel="stylesheet">
</head>

<body>
    <?php include 'inc/navbar.php'; ?>
    <footer>
        <?php 
            if(!empty($userMessage)) {
                echo "<p>$userMessage</p>";
            } 
        ?>
        <div class=" title">
            <h1>CONTACT US</h1>
            
        </div>
        <div class="box">
            <form action="contact.php" method="post">
                <input type="text" name="name" class="form-control" placeholder="Enter your name." required><br>
                <input type="email" name="email" class="form-control" placeholder="Enter your email." required><br>
                <textarea name="message" class="form-control" placeholder="Message" rows="4" required></textarea><br>
                <input type="submit" name="submit" class="form-control submit"  value="SEND MESSAGE">
  
            </form>
        </div>
     
    </footer>
   </body>