<?php 
include "script/database.php";

?>

<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/contact-us.css">

    <link rel="icon" href="img/ferrylogo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
<link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.7.1.min.js"></script>
    <title>Contact Us | Binangkas</title>
</head>
<body>
<?php include "script/header.php";?>
    <section class="contact-us">
        <h1>Contact Us</h1>
        <div class="contact-us-container">
                <input type="text" name="name" placeholder="Name" >
                <br><input type="text" name="address" placeholder="Address">
                <input type="text" name="email" placeholder="Email" >
                <textarea name="query" id="" cols="60" rows="10" placeholder="Enter your Message Here."></textarea>
            </div>
               
                <div class="submit-container">
                    <input type="submit">
                </div>
                <div class="goals">
                <h3>We Care About your Input</h3>
                <h4>We at Binangkas, care deeply about our customers woes and feedback, please do contact us!</h4>
             </div>
    </section>
   <?php include "script/footer.php";?>
    <script src="js/header.js"></script>
</body>
</html>