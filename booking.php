    <?php
    include "script/database.php";
    ?>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" type="text/css" href="css/booking.css">

        <link rel="icon" href="img/ferrylogo.png" type="image/x-icon">
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery-3.7.1.min.js"></script>
        <title>Booking | Binangkas</title>
    </head>
    <style>
        #departure-date,
        #return-date,
        #departing-ship,
        #returning-ship {
            display: none;
        }
    </style>
    <body>
        <?php include "script/header.php";?>
        <section class="main-body">
        
            <div class="input-body" id="input-body">
                <div class="booking-form" id="booking-form">
                <form action="script/insert-data.php" id="booking-form" method="post">
                        <div class="trip-title">
                            <label for="roundtrip">Trip Type</label>
                        </div>
                        <div class="trip">
                            <label for="roundtrip">Roundtrip</label>
                            <input type="checkbox" id="roundtrip" name="trip-type[]" value="roundtrip">
                            <label for="oneway">One Way</label>
                            <input type="checkbox" id="oneway" name="trip-type[]" value="oneway">
                        </div>
                        <label for="origin">Origin:</label>
                        <select id="origin" name="origin"> 
                            <?php foreach ($origins as $origin): ?>
                                <option value="<?php echo $origin['originID']; ?>"><?php echo $origin['originName']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label for="destination">Destination:</label>
                        <select id="destination" name="destination"> 
                            <?php foreach ($destinations as $destination): ?>
                                <option value="<?php echo $destination['destinationID']; ?>"><?php echo $destination['locationName']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label for="departure-date">Departure Date</label>
                        <input type="date" id="departure-date" name="departure-date"> 
                        <label for="return-date">Return Date</label>
                        <input type="date" id="return-date" name="return-date"> 
                        <label for="passenger-count">Number of Passengers:</label>
                        <input type="number" id="passenger-count" name="passenger-count" min="1" required> 
                        <label for="cabin">Cabin Type:</label>
                         <select name="cabinType" id="cabin">
                    <?php foreach ($cabins as $cabin): ?>
                        <option value="<?php echo $cabin['CabinNumber']; ?>">
                            <?php echo $cabin['CabinType']; ?> - $<?php echo $cabin['Price']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                        <label for="departing-ship">Select Departing Ship:</label>
                        <select id="departing-ship" name="cruiseID">
                            <?php foreach ($db->getAllShips() as $ship): ?>
                                <option value="<?php echo $ship['cruiseID']; ?>"><?php echo $ship['CruiseName']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label for="returning-ship">Select Returning Ship:</label>
                        <select id="returning-ship" name="returnCruise" style="display: none;">
                            <?php foreach ($returningShips as $ship): ?>
                                <option value="<?php echo $ship['cruiseID']; ?>"><?php echo $ship['cruiseName']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button type="submit" id="submit-btn">Book Now</button>
                    </form>
                </div>
            </div>
        </section>
        <?php include "script/footer.php";?>
        <script src="js/header.js"></script>
        <script src="js/booking.js"></script>
        <script src="js/checkbox.js"></script>
        <!-- Inside the <head> tag -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('origin').addEventListener('input', function() {
                    console.log('Origin:', this.value);
                });
                
                document.getElementById('destination').addEventListener('input', function() {
                    console.log('Destination:', this.value);
                });
                
                document.getElementById('departure-date').addEventListener('input', function() {
                    console.log('Departure Date:', this.value);
                });
                
                document.getElementById('return-date').addEventListener('input', function() {
                    console.log('Return Date:', this.value);
                });
                
                document.getElementById('passenger-count').addEventListener('input', function() {
                    console.log('Passenger Count:', this.value);
                });
                
                document.getElementById('cabin').addEventListener('input', function() {
                    console.log('Cabin:', this.value);
                });
            });
        </script>
    </body>
    </html>
