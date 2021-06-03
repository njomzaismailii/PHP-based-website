<?php
    require './controllers/menuController.php';

    $menu = new MenuController;

    if(isset($_GET['menu_id'])) {
        $menuId = $_GET['menu_id'];
    }

    $menu->destroy($menuId);
?>