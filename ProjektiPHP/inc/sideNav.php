<?php 
@ob_start();
session_start();
$activePage = basename($_SERVER['PHP_SELF']);
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <title>Document</title>
    <link rel="stylesheet" href="css/dashboard.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&family=Andika+New+Basic&family=Dancing+Script:wght@700&family=Indie+Flower&display=swap" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
       body{
         margin: 0;
            background-color: #E8E9ED;
        }
    </style>
</head>

  <body>
      <div class="account_info">
         <ul class="lastLi" >
            <?php if(isset($_SESSION['name'])): ?>
              <li class="accountInfo">
                <h3 style="color: #2B2D37; display:inline-block;" >Hi <?php echo $_SESSION['name']; ?></h3>    
                <i class="fa fa-user user" style="color: #2B2D37; font-size:2em; display: inline-block !important; padding-left: 6px;"></i>
                <ul>
                  <li><a class="logout" href="logout.php">Logout</a></li>
                </ul>
              </li>        
            <?php endif; ?>
        </ul>
      </div>
      <div class="sideNav">
        <ul>
          <li><a class="<?= ($activePage == 'dashboard.php') ? 'active' : ''; ?>" href="dashboard.php" >Dashboard <i class=" fa fa-dashboard"></i></a></li>
          <li><a class="<?= ($activePage == 'adminMenu.php') ? 'active' : ''; ?>" href="adminMenu.php">Menu <i class=" fa fa-apple"></i></a></li>
          <li><a class="<?= ($activePage == 'messages.php') ? 'active' : ''; ?>" href="messages.php">Messages <i class=" fa fa-wechat"></i></a></li>
          <li><a class="<?= ($activePage == 'users.php') ? 'active' : ''; ?>" href="users.php">Users <i class=" fa fa-users" style="margin-left: 48px;"></i></a></li>
    
          <li><a class="<?= ($activePage == 'adminStaff.php') ? 'active' : ''; ?>" href="adminStaff.php">Staff Info <i class=" fa fa-steam"></i></a></li>
        </ul>
      </div>
  </body>
</html>