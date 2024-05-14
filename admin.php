<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "script/database.php";
$destinations = $db->getDestinationsAdmin();
$origins = $db->getOriginsAdmin();
$cabins = $db->getCabinTypes();
$cruises = $db->getAllShips();
$passengersPerPage = 10;
include "script/get-cruise.php";
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the offset
$offset = ($page - 1) * $passengersPerPage;
$offset2 = ($page - 1) * $passengersPerPage;
$passengers = $db->getPassengersPaginated($offset, $passengersPerPage);
$cruises = $db->getCruisesPaginated($offset2, $passengersPerPage);

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <link rel="icon" href="img/ferrylogo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <title>Admin | Binangkas</title>
</head>
<body>
    <?php include "script/header.php";?>
    <section class="main-body">
             <h2>Cruises</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Cruise Name</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cruises as $cruise): ?>
                    <tr>
                        <td><?php echo $cruise['CruiseName']; ?></td>
                        <td><?php echo $cruise['Price']; ?></td>
                        <td>    <button type="button" class="btn btn-danger" onclick="deleteCruise(<?php echo $cruise['cruiseID']; ?>)">Delete</button>
</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <?php
                $totalCruises = $db->getTotalCruises();

                $totalPages = ceil($totalCruises / $cruisesPerPage);

                for ($i = 1; $i <= $totalPages; $i++) {
                    echo "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";
                }
                ?>
            </ul>
        </nav>
        <h2>Add Cruise</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-group">
                <label for="cruise_name">Cruise Name</label>
                <input type="text" id="cruise_name" name="cruise_name" required>
            </div>
            <div class="form-group">
                <label for="cruise_price">Price</label>
                <input type="text" id="cruise_price" name="cruise_price" required>
            </div>
            <button type="submit" class="btn btn-primary" name="add-cruise">Add Cruise</button>
        </form>
        
        <h2>Passengers</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Passenger ID</th>
                    <th>Name</th>
                    <th>Date of Birth</th>
                    <th>Phone Number</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($passengers as $passenger): ?>
                    <tr>
                        <td><?php echo $passenger['passengerID']; ?></td>
                        <td><?php echo $passenger['name']; ?></td>
                        <td><?php echo $passenger['DOB']; ?></td>
                        <td><?php echo $passenger['Phone_number']; ?></td>
                        <td><?php echo $passenger['gender']; ?></td>
                        <td><?php echo $passenger['email']; ?></td>
                        <td>
                            <button type="button" class="btn btn-primary" onclick="openModal(<?php echo $passenger['passengerID']; ?>, '<?php echo $passenger['name']; ?>', '<?php echo $passenger['email']; ?>', '<?php echo $passenger['DOB']; ?>', '<?php echo $passenger['Phone_number']; ?>', '<?php echo $passenger['gender']; ?>')">Edit</button>
                            <button type="button" class="btn btn-danger" onclick="openDeleteModal(<?php echo $passenger['passengerID']; ?>)">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <h2>Destinations</h2>
<table class="table">
    <thead>
        <tr>
            <th>Location Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($destinations as $destination): ?>
            <tr>
                <td><?php echo $destination['locationName']; ?></td>
                <td>
                    <button type="button" class="btn btn-danger" onclick="deleteDestination(<?php echo $destination['destinationID']; ?>)">Delete</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<h2>Add Destination</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <div class="form-group">
        <label for="location_name">Location Name</label>
        <input type="text" id="location_name" name="location_name" required>
    </div>
    <button type="submit" class="btn btn-primary" name="add-destination">Add Destination</button>
</form>
<h2>Origins</h2>
<table class="table">
    <thead>
        <tr>
            <th>Origin Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($origins as $origin): ?>
            <tr>
                <td><?php echo $origin['originName']; ?></td>
                <td>
                    <button type="button" class="btn btn-danger" onclick="deleteOrigin(<?php echo $origin['originID']; ?>)">Delete</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<h2>Add Origin</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <div class="form-group">
        <label for="origin_name">Origin Name</label>
        <input type="text" id="origin_name" name="origin_name" required>
    </div>
    <button type="submit" class="btn btn-primary" name="add-origin">Add Origin</button>
</form>
        <div id="editModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <h5>Edit Passenger</h5>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <input type="hidden" id="passenger_id" name="passenger_id">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="dob">Date of Birth</label>
                        <input type="date" id="dob" name="dob" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select id="gender" name="gender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
        <div id="deleteModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeDeleteModal()">&times;</span>
                <h5>Delete Passenger</h5>
                <p>Are you sure you want to delete this passenger?</p>
                <form id="deleteForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <input type="hidden" id="delete_passenger_id" name="delete_passenger_id">
                    <button type="submit" name="delete-passenger" class="btn btn-danger">Delete</button>
                    <button type="button" class="btn btn-secondary" onclick="closeDeleteModal()">Cancel</button>
                </form>
            </div>
        </div>
        <div id="modalOverlay"></div>
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <?php
                $totalPages = ceil($db->getTotalPassengers() / $passengersPerPage);
                for ($i = 1; $i <= $totalPages; $i++) {
                    echo "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";
                }
                ?>
            </ul>
        </nav>
    </section>
    <?php include "script/footer.php";?>
    <script src="js/header.js"></script>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script>
        var modal = document.getElementById("editModal");
        var modalOverlay = document.getElementById("modalOverlay");

        function openModal(passengerID, name, email, dob, phone, gender) {
            document.getElementById("passenger_id").value = passengerID;
            document.getElementById("name").value = name;
            document.getElementById("email").value = email;
            document.getElementById("dob").value = dob;
            document.getElementById("phone").value = phone;
            document.getElementById("gender").value = gender;
            modal.style.display = "block";
            modalOverlay.style.display = "block";
        }

        function closeModal() {
            modal.style.display = "none";
            modalOverlay.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modalOverlay) {
                closeModal();
            }
        };

        // JavaScript functions for delete modal
        var deleteModal = document.getElementById("deleteModal");
        var deleteModalOverlay = document.getElementById("modalOverlay");

        function openDeleteModal(passengerID) {
            document.getElementById("delete_passenger_id").value = passengerID;
            deleteModal.style.display = "block";
            deleteModalOverlay.style.display = "block";
        }

        function closeDeleteModal() {
            deleteModal.style.display = "none";
            deleteModalOverlay.style.display = "none";
        }
        function deleteCruise(cruiseID) {
        if (confirm("Are you sure you want to delete this cruise?")) {
            // Form a FormData object to send the cruiseID to the server
            var formData = new FormData();
            formData.append('delete-cruise', true); // This indicates a cruise deletion request
            formData.append('cruiseID', cruiseID); // Append the cruiseID to the form data

            // Send a POST request to the same PHP file
            fetch(window.location.href, {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (response.ok) {
                    // If the response is successful, reload the page
                    location.reload();
                } else {
                    // If there's an error, alert the user
                    throw new Error('Failed to delete cruise');
                }
            })
            .catch(error => {
                // Alert the user about the error
                alert(error.message);
            });
        }
    }
    

    </script>
</body>
</html>

<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $passengerID = $_POST['passenger_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];

    $affectedRows = $db->updatePassenger($passengerID, $name, $email, $dob, $phone, $gender);
    
    if ($affectedRows > 0) {
        header("Refresh:0");
        exit();
    } else {
        echo "No rows were updated."; 
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete-passenger'])) {
    $passengerID = $_POST['delete_passenger_id'];
    $deletedRows = $db->deletePassenger($passengerID);
    
    if ($deletedRows > 0) {
        header("Refresh:0");
        exit();
    } else {
        echo "No rows were deleted."; 
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add-cruise'])) {
        $cruiseName = $_POST['cruise_name'];
        $cruisePrice = $_POST['cruise_price'];
        $added = $db->addCruise($cruiseName, $cruisePrice);
        if ($added) {
            header("Refresh:0");
            exit();
        } else {
            echo "Failed to add cruise."; 
        }
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete-cruise'])) {
    $cruiseID = $_POST['cruiseID'];
    
    $deletedRows = $db->deleteCruise($cruiseID);

    if ($deletedRows > 0) {
        echo "Cruise deleted successfully!";
    } else {
        echo "Failed to delete cruise.";
    }

    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add-origin'])) {
    $originName = $_POST['origin_name'];
    $added = $db->addOrigin($originName);
    if ($added) {
        header("Refresh:0");
        exit();
    } else {
        echo "Failed to add origin."; 
    }
}

// PHP Handling for Adding Destinations
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add-destination'])) {
    $locationName = $_POST['location_name'];
    $added = $db->addDestination($locationName);
    if ($added) {
        header("Refresh:0");
        exit();
    } else {
        echo "Failed to add destination."; 
    }
}

// PHP Handling for Deleting Origins
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete-origin'])) {
    $originID = $_POST['origin_id'];
    $deletedRows = $db->deleteOrigin($originID);
    if ($deletedRows > 0) {
        header("Refresh:0");
        exit();
    } else {
        echo "Failed to delete origin."; 
    }
}

// PHP Handling for Deleting Destinations
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete-destination'])) {
    $destinationID = $_POST['destination_id'];
    $deletedRows = $db->deleteDestination($destinationID);
    if ($deletedRows > 0) {
        header("Refresh:0");
        exit();
    } else {
        echo "Failed to delete destination."; 
    }
}
?>

