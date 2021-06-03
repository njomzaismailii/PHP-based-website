<?php
    include 'inc/sideNav.php';
    if ( empty( $_GET['menu_id'] ) ) {
        die('Zgjedhni nje menu per te edituar');
        return;
    }

    require './controllers/menuController.php';

    $menu = new menuController;

    $menuId = $_GET['menu_id'];

    $currentMenu = $menu->edit($menuId);

    if(isset($_POST['submitted'])) {
        $errors = [];
        $title = $menu->test_input($_POST['title']);
        $description = $menu->test_input($_POST['description']);
        $post_author =$menu->test_input($_POST['posted_by']);

        if ( empty( $title ) ) {
            $errors[] = 'Title should not be empty!';
        }

        if(empty($description)){
            $errors[] = 'Description should not be empty!';
        }
        
        if ( empty( $errors ) ) {
            $menu->update($menuId, $_POST);
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
    <h2>Update Menu</h2>
        <form class="edit-menuForm" action="" method="POST" enctype="multipart/form-data">
            
            <label >Add Title</label>
            <input type="text" value="<?php echo $currentMenu['title']; ?>" name="title"
            data-validation="length alphanumeric" data-validation-length="min4" required>

            <label>Image</label>
            <input type="file" name="image" id="image" class="form-control" accept=".jpg, .jpeg, .png" ><br>
            <input type="hidden" name="current_image" value="<?php echo $currentMenu['image'] ?>">
            
            <img src="uploads/<?php echo $currentMenu['image']; ?>" width="150" height="150">

            <label>Description</label>
            <textarea type="text" name="description" value="" rows="4" cols="50"
            data-validation="email" required><?php echo $currentMenu['description']; ?></textarea>

            <input type="hidden" name="posted_by" value="<?php echo $_SESSION['name']; ?>">
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