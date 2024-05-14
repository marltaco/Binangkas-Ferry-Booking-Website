<?php include "script/database.php";?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="icon" href="img/ferrylogo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
<link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.7.1.min.js"></script>
    <title>Home | Binangkas</title>
</head>
<body>
   <?php include "script/header.php";?>
    <section class="main-home">
        <div class="main-text">
            <h5>Binangkas</h5>
            <h4>Experience the Beauty of the Philippines</h4>
            <p>Enjoy the Luxury of our Ships</p>
        </div>
        <div class="down-arrow">
            <a href="#destinations" class="down"><i class='bx bx-down-arrow-alt' ></i></a>
        </div>
    </section>
    <section class="destinations" id="destinations">
        <div class="center-text">
            <img src="img/Ship-Wheel.png" alt="" class="logo">
            <h1>Destinations</h1>
            <h3>Explore with us</h3>
        </div>
        <div class="locations">
            <div class="row">
                <img src="img/Dumaguete.jpg" alt="">
                <div class="location-texts">
                    <h5>Hot!</h5>
                </div>
                <div class="destination-description">
                    <h4>Dumaguete</h4>
                </div>
                
            </div>
            <div class="row">
                <img src="img/Surigao.jpg" alt="" style="height:100%;">
                <div class="location-texts">
                    <h5>Trending!</h5>
                </div>
                <div class="destination-description">
                    <h4>Surigao</h4>
                </div>
                
            </div>
            <div class="row">
                <img src="img/Leyte.jpeg" alt="" style="height:100%;">
                <div class="location-texts">
                    <h5>HOT!</h5>
                </div>
                <div class="destination-description">
                    <h4>Leyte</h4>
                </div>
                
            </div>
            <div class="row">
                <img src="img/chocolate-hills.jpg" alt="" style="height:100%;">
                <div class="location-texts">
                    <h5>CONTROVERSIAL!</h5>
                </div>
                <div class="destination-description">
                    <h4>chocolate Hills</h4>
                </div>
                
            </div>
            <div class="row">
                <img src="img/boracay.jpg" alt="" style="height:100%;">
                <div class="location-texts">
                    <h5>HOT!</h5>
                </div>
                <div class="destination-description">
                    <h4>Boracay</h4>
                </div>
                
            </div>
          
        </div>
        <div class="discover">
            <a href="booking.php"><button class="discover-btn">DISCOVER <i class='bx bx-right-arrow-alt' ></i></button></a>
        </div>
    </section>
    <section class="reviews">
        <div class="news">
            <div class="up-center-text">
                <h2>Articles</h2>
            </div>
            <div class="news-content">
                <div class="content">
                <img src="img/bl-1.png" alt="">
                <h3>Summer Sale Returns!</h3>
                <p>The Prices of Boat Ferrying goes down in anticipation of...</p>
               <a href=""> <h6>Continue...</h6></a>
                </div>
                <div class="content">
                <img src="img/bl-2.png" alt="">
                <h3>Foreigners Commend Services!</h3>
                <p>Visitors from other countries commend Binangkas...</p>
               <a href=""> <h6>Continue...</h6></a>
                </div>
                <div class="content">
                <img src="img/chocolate-hills.jpg" alt="">
                <h3>Chocolate Hills.jpeg</h3>
                <p>Ba't ba kasi nagtayo ng resort sa Chocolate Hills? Madami na ngang resort sa Pinas eh.</p>
                <a href=""><h6>Continue...</h6></a>
                </div>
                
            </div>
        </div>
    </section>
   <?php include "script/footer.php";?>
    <script src="js/header.js"></script>
</body>
</html>