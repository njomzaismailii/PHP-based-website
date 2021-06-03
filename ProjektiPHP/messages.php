<?php
include 'inc/sideNav.php';
require 'controllers/ContactController.php';

    $message = new ContactController;
    $messages = $message->all();

    

?>

<html>
    <head>
        <link href="css/dashboard.php">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
    <body>
    <body>
        <div class="container">
           <h2>Messages</h2>
            <hr> 
            
            <div class="header">
                <table style="width:100%">
                    <thead>
                        <tr>
                            <th class="columnHeader">
                                <div>Name</div>
                            </th>
                            <th class="columnHeader">
                                <div>Email</div>
                            </th>
                            <th class="columnHeader">
                                <div>Message</div>
                            </th>
                        </tr>
                    </thead>
                </table>    
            </div>
            <div class="body">
                
                <tbody>
                    <table class="bodyClass">

                        
                        <?php foreach($messages as $message): ?>
                                <tr>
                                    <td><?php echo $message['name'];  ?></td>
                                    <td><?php echo $message['email']; ?></td>
                                    <td><?php echo $message['message']; ?></td>
                                    <td>
                                        <a href="delete-messages.php?id=<?php echo (int) $message['id'] ?>"><i class=" fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                        <?php endforeach; ?>

                    </table>
                        
                </tbody>
            </div>
        </div>
    </body>
    </body>
    
</html>