<!DOCTYPE html>
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
    <title>Login | Binangkas</title>
</head>
<body>
    <?php include "script/header.php";?>
    <section class="main-body">
        <div class="container">
            <h2>Login</h2>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_POST["adminLogin"] === "admin" && $_POST["password"] === "admin123") {
                    header("Location: admin.php");
                    exit();
                } else {
                    echo "<div class='alert alert-danger'>Invalid username or password.</div>";
                }
            }
            ?>
            <form method="post">
                <div class="form-group">
                    <label for="adminLogin">Username</label>
                    <input type="text" class="form-control" id="adminLogin" name="adminLogin" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </section>
    <?php include "script/footer.php";?>
</body>
</html>
