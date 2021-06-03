<?php
$activePage = basename($_SERVER['PHP_SELF']);

?>

<html>
    <head>
        <link rel="stylesheet" href="css/homepage.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
    <body>
        <header class="topnav" id="myTopnav">
            <img class="logo" src="../../ProjektiPHP/images/logoja.png" width="135" alt="" height="100" style="padding-top:10px;">    
            <ul class="nav_links">
               
                <li class="<?= ($activePage == 'index.php') ? 'active' : ''; ?> menuLi"><a href="index.php">Home</a></li>
                <li class="<?= ($activePage == 'menu.php') ? 'active' : ''; ?> menuLi"><a href="menu.php">Menu</a></li>
                <li class="<?= ($activePage == 'aboutus.php') ? 'active' : ''; ?> menuLi"><a href="aboutus.php">About Us</a></li>
                <li class="<?= ($activePage == 'contact.php') ? 'active' : ''; ?> menuLi"><a href="contact.php">Contact</a></li>
                <ul class="lastLi" >
                    <?php if(isset($_SESSION['name'])): ?>
                        <li class="accountInfo">
                            <h3 style="color: #fff; display:inline-block;" >Hi <?php echo $_SESSION['name']; ?></h3>    
                            <i class="fa fa-user user" style="color: #fff; font-size:2em;"></i>
                            <ul>
                                <li><a class="logout" href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                        
                    <?php endif; ?>
                </ul>
            </ul> 
        </header>
    </body>
</html>