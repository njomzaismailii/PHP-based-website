<?php
    require './controllers/StaffController.php';

    $staff = new StaffController;

    if(isset($_GET['id'])) {
        $staffId = $_GET['id'];
    }

    $staff->destroy($staffId);
?>