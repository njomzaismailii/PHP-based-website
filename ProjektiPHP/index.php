<?php

require  './controllers/StaffController.php';

$staf = new StaffController;
$stafInfo = $staf->all();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <title>Restaurant Page</title>
    <link rel="stylesheet" href="css/homepage.css">
    <link rel="stylesheet" href="css/demo.css">
    <link rel="stylesheet" href="css/responsiveslides.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&family=Andika+New+Basic&family=Dancing+Script:wght@700&family=Indie+Flower&display=swap" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="responsiveslides.min.js"></script>
    <script>
        $(function () {

            // Slideshow 1
            $("#slider1").responsiveSlides({
            maxwidth: 800,
            speed: 800,
            
            });
        });
    </script>
</head>

<body>
   <?php include 'inc/navbar.php'; ?>
   <container class="banner" style="background-image:url('../ProjektiPHP/images/homeCoverPhoto.jpg')!important">
       <div class="textB">
           <h2><b> R E S T A U R A N T</b> </h2>
           <h3>"Good Food, Good People, Good Times."</h3>
           <?php if(!isset($_SESSION['name'])): ?>
                <ul class=" btn">
                    <li ><a id="buttonLogin" href="login.php"> Login</a></li>
                    <li><a  id="buttonRegister" href="register.php"> Register</a></li>
                </ul>
            
            <?php endif; ?>
        </div>  
   </container>

   
    <section>
        <div class="textC">
            <p>~ Our Speciality ~</p>
        </div>
        <div class="three">
            <div class="container">
                <input type="radio" name="images" id="i1" checked>
                <input type="radio" name="images" id="i2">
                <input type="radio" name="images" id="i3">

                <div class="slide_img" id="one">
                    <img src="images/beef.jpg" width="200" height="200">

                    <label for="i3" class="pre"></label>
                    <label for="i2" class="nxt"></label>
                </div>

                <div class="slide_img" id="two">
                    <img src="images/pizza2.jpg"  width="200" height="200">

                    <label for="i1" class="pre"></label>
                    <label for="i3" class="nxt"></label>
                </div>

                <div class="slide_img" id="thre">
                    <img src="images/pasta.jpg"  width="200" height="200">

                    <label for="i2" class="pre"></label>
                    <label for="i1" class="nxt"></label>
                </div>


                <div class="navv">
                    <label class="dots" id="dot1"  for="i1"></label>
                    <label class="dots" id="dot2"  for="i2"></label>
                    <label class="dots" id="dot3"  for="i3"></label>
                </div>
                
            </div>

        </div>
    </section>
    <section>
       
        <div class="second">
            <p class="ourStaf">~ Our staf ~</p>
            <div class="testimonials">
                 <div id="wrapper">
                    <ul class="rslides" id="slider1">
                        <?php foreach($stafInfo as $staf): ?>
                            <li style="display: flex; justify-content: center; align-items: center; height: 60%;">
                                <div>
                                    <h2><?php echo $staf['title']; ?></h2>
                                    <p><?php echo $staf['description']; ?></p>
                                </div>
                                <img src="uploads/<?php echo $staf['image']; ?>" width="200px" height="200px" alt="">
                            </li>
                         <?php endforeach; ?>   
                    </ul>

                  </div>      

            </div>
        </div>
    </section>

  <footer>
      <div class=" title">
          <h1>CONTACT US</h1>
          
      </div>
      <div class="box">
          <form class="contact-form" action="index.html" method="post">
              <input type="text" name="name" class="form-control" placeholder="Enter your name." required data-validation="length alphanumeric" data-validation-length="min4"><br>
              <input type="email" name="email" class="form-control" placeholder="Enter your email." required><br>
              <textarea name="message" class="form-control" placeholder="Message" rows="4" data-validation="length" data-validation-length="min20" required></textarea><br>
              <input type="submit" name="" class="form-control submit"  value="SEND MESSAGE">

          </form>
      </div>
   
  </footer>

</body>
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.79/jquery.form-validator.min.js"></script>

  <script src="script.js" type="text/javascript"></script>
</html>