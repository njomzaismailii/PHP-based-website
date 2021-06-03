<?php
include 'inc/sideNav.php'; 
require 'controllers/DashboardController.php';

$dash = new DashboardController;
$menus = $dash->allMenus();

$users = $dash->allUsers();

$messages = $dash->allMessages();
?>  

<html>
    <head></head>
    <body>
        <div class="dashboard-container">
            <h2>TOTAL SUMMARY</h2>
            <div class="card-main">
                <div class="card_one">
                    <p>Total Active Customers</p>
                    <p><?php echo count($users); ?> </p>
                </div>
                <div class="card_two">
                    <p>Total Menus</p>
                    
                    <p><?php echo count($menus); ?></p>
                </div>
                <div class="card_three">
                    <p>Total Messages</p>
                    <p><?php echo count($messages); ?></p>
                </div>
            </div>
        </div>
    </body>
</html>

