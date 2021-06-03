<?php
include 'inc/sideNav.php';
require './controllers/UserController.php';

    $user = new UserController;
    $users = $user->all();
?>


<html>
    <head>
        <link href="css/dashboard.css">   
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <button class="menuButton"><a href="addUser.php">Add User</a></button>
            <hr>
            
            <div class="header">
                <table style="width:100%">
                    <thead>
                        <tr>
                            <th class="columnHeader">
                                <div>name</div>
                            </th>
                            <th class="columnHeader">
                                <div>email</div>
                            </th>
                            <th class="columnHeader">
                                <div>Role</div>
                            </th>
                        </tr>
                    </thead>
                </table>    
            </div>
            <div class="body">
                
                <tbody>
                    <table class="bodyClass">
                        <?php foreach($users as $user): ?>
                                <tr>
                                    <td><?php echo $user['name'];  ?></td>
                                    <td><?php echo $user['email'];  ?></td>
                                    <td><?php echo $user['is_admin']; ?></td>
                                    <td><a href="edit-user.php?id=<?php echo (int) $user['id'] ?>"><i class=" fa fa-pencil"></i></a>
                                        <a href="delete-user.php?id=<?php echo (int) $user['id'] ?>"><i class=" fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                        <?php endforeach; ?>
                    </table>
                        
                </tbody>
            </div>
        </div>
    </body>
</html>