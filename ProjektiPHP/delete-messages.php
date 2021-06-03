<?php
    require './controllers/ContactController.php';

    $message = new ContactController;

    if(isset($_GET['id'])) {
        $messageId = $_GET['id'];
    }

    $message->destroy($messageId);
?>