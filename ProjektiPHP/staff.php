<?php
    include 'inc/sideNav.php';
    require './controllers/StaffController.php';

    $staff = new StaffController;

    if(isset($_POST['submit'])) {
        $errors = [];
        $title = $staff->test_input($_POST['title']);
        $description = $staff->test_input($_POST['description']);
       

        if ( empty( $title ) ) {
            $errors[] = 'Title should not be empty!';
        }

        if(empty($description)){
            $errors[] = 'Description should not be empty!';
        }
        
        if ( empty( $errors ) ) {
            $staff->store($_POST);
        }
    }
?>

<html>
    <head>
        <link href="css/dashboard.css"/>
    </head>
    <body>
        <div class="addMenu">
            <form action="" method="POST" enctype="multipart/form-data" class="menuForm">
                <h2>Add Staf</h2>
                <label >Add Title</label>
                <input type="text" name="title">

                <label>Image</label>
                <input type="file" name="image" id="image" class="form-control" accept=".jpg, .jpeg, .png" ><br>

                <label>Description</label>
                <textarea name="description" rows="4" cols="50"></textarea>

                <input type="hidden" name="posted_by" value="<?php echo $_SESSION['name']; ?>">
                <input type="submit" class="addMenuButton" name="submit" value="Add Menu">
                <?php if ( !empty( $errors ) ): ?>
                <div class="errors">
                    <?php echo join( '<br>', $errors ) ?>
                </div>
                <?php endif ?>
            </form>
        </div>
    </body>
</html>