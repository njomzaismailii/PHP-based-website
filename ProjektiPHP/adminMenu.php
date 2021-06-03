<?php
include 'inc/sideNav.php';
require  './controllers/menuController.php';

$menu = new menuController;
$menus = $menu->all();
?>


<html>
    <head>
        <link href="css/dashboard.css">   
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <button class="menuButton"><a href="addMenu.php">Add Menu</a></button>
            <hr>
            
            <div class="header">
                <table style="width:100%">
                    <thead>
                        <tr>
                            <th class="columnHeader">
                                <div>Title</div>
                            </th>
                            <th class="columnHeader">
                                <div>Image</div>
                            </th>
                            <th class="columnHeader">
                                <div>Description</div>
                            </th>
                        </tr>
                    </thead>
                </table>    
            </div>
            <div class="body">
                
                <tbody>
                    <table class="bodyClass">

                        
                        <?php foreach($menus as $menu): ?>
                                <tr>
                                    <td><?php echo $menu['title'];  ?></td>
                                    <td><img src="uploads/<?php echo $menu['image']; ?>" width="150" height="150"></td>
                                    <td><?php echo $menu['description']; ?></td>
                                    <td><a href="edit-menu.php?menu_id=<?php echo (int) $menu['menu_id'] ?>"><i class=" fa fa-pencil"></i></a>
                                        <a href="delete-menu.php?menu_id=<?php echo (int) $menu['menu_id'] ?>"><i class=" fa fa-trash-o"></i></a></td>
                                </tr>
                        <?php endforeach; ?>

                    </table>
                        
                </tbody>
            </div>
        </div>
    </body>
</html>