<?php
    include 'inc/sideNav.php';
    if ( empty( $_GET['id'] ) ) {
        die('Zgjedhni nje profil per te edituar');
        return;
    }

    require './controllers/StaffController.php';

    $staff = new StaffController;

    $staffId = $_GET['id'];

    $currentProfile = $staff->edit($staffId);

    if(isset($_POST['submitted'])) {
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
            $staff->update($staffId, $_POST);
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Menu</title>
    <link rel="stylesheet" href="">
</head>
<body>
    <div class="addMenu">
    <h2>Update Staff Profile</h2>
        <form class="edit-menuForm" action="" method="POST" enctype="multipart/form-data">
            
            <label >Add Title</label>
            <input type="text" value="<?php echo $currentProfile['title']; ?>" name="title"
            data-validation="length alphanumeric" data-validation-length="min4" required>

            <label>Description</label>
            <textarea type="text" name="description" value="" rows="4" cols="50"
            data-validation="email" required><?php echo $currentProfile['description']; ?></textarea>

            <label>Image</label>
            <input type="file" name="image" id="image" class="form-control" accept=".jpg, .jpeg, .png" ><br>
            <input type="hidden" name="current_image" value="<?php echo $currentProfile['image'] ?>">
            
            <img src="uploads/<?php echo $currentProfile['image']; ?>" width="150" height="150">

            <button type="submit"   class="addMenuButton" name="submitted">UPDATE</button>
            <?php if ( !empty( $errors ) ): ?>
                <div class="errors">
                    <p><?php echo join( '<br>', $errors ) ?></p>
                </div>
            <?php endif ?>
        </form>
    </div>
    
</body>
</html>