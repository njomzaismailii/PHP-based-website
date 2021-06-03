<?php
include 'inc/sideNav.php';
require  './controllers/StaffController.php';

    $staff = new StaffController;
    $stafInfo = $staff->all();
?>


<html>
    <head>
        <link href="css/dashboard.css">   
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <button class="menuButton"><a href="addStaff.php">Add Staff</a></button>
            <hr>
            
            <div class="header">
                <table style="width:100%">
                    <thead>
                        <tr>
                            <th class="columnHeader">
                                <div>Title</div>
                            </th>
                            <th class="columnHeader">
                                <div>Description</div>
                            </th>
                            <th class="columnHeader">
                                <div>image</div>
                            </th>
                        </tr>
                    </thead>
                </table>    
            </div>
            <div class="body">
                
                <tbody>
                    <table class="bodyClass">

                        
                        <?php foreach($stafInfo as $staf): ?>
                                <tr>
                                    <td><?php echo $staf['title'];  ?></td>
                                    <td><?php echo $staf['description']; ?></td>
                                    <td><img src="uploads/<?php echo $staf['image']; ?>" width="150" height="150"></td>
                                    <td><a href="edit-staff.php?id=<?php echo (int) $staf['id'] ?>"><i class=" fa fa-pencil"></i></a>
                                        <a href="delete-staff.php?id=<?php echo (int) $staf['id'] ?>"><i class=" fa fa-trash-o"></i></a></td>
                                </tr>
                        <?php endforeach; ?>

                    </table>
                        
                </tbody>
            </div>
        </div>
    </body>
</html>