<?php

require  './controllers/menuController.php';

$menu = new menuController;
$menus = $menu->all();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <title>Document</title>
    <link rel="stylesheet" href="css/homepage.css">
    <link rel="stylesheet" href="css/menu.css">
    <script src="script.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&family=Andika+New+Basic&family=Dancing+Script:wght@700&family=Indie+Flower&display=swap" rel="stylesheet">
</head>



<body>
    <?php include 'inc/navbar.php'; ?>
        <div class="text-1">
            <h2>~ Our Menu ~</h2>
        </div>

        <div class="responsive">
            <?php foreach($menus as $index => $menu): ?>

                <?php if ( $index % 3 === 0 ): ?>
                    </div>
                    <div class="responsive">
                <?php endif ?>

                    <div class="gallery">
                        <img src="uploads/<?php echo $menu['image']; ?>" width="250" height="250">
                        <h4><?php echo $menu['title']; ?></b></h4>
                        <p><?php echo $menu['description'];?><p>
                    </div>

            <?php endforeach; ?>
        </div>
</body>