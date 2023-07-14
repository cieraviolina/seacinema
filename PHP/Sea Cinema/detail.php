<?php
session_start();

$username = $_SESSION["username"];

if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'connection.php'; 

//Ambil data dari tabel movie
$id_movie = $_GET["idmovie"];
$result_movie = mysqli_query($conn, "SELECT * FROM movie WHERE id_movie='$id_movie'");
$movie = mysqli_fetch_assoc($result_movie);

//Ambil data dari session login
$username = $_SESSION["username"];
$result_user = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
$user = mysqli_fetch_assoc($result_user);
$name = $user["name"];

//Ambil data dari tabel balance
$id_user = $user["id_user"];
$result_balance = mysqli_query($conn, "SELECT * FROM balance WHERE id_user = '$id_user'");
$balance = mysqli_fetch_assoc($result_balance);
$amount = $balance["amount"];
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Style -->
    <link rel="stylesheet" href="style/style-navbar.css">
    <link rel="stylesheet" href="style/style-detail.css">

    <title>SEA Cinema</title>
</head>
<body>
    <!-- Navbar Start -->
    <nav class="navbar">
        <a href="index.php" class="navbar-logo">SEANEMA</a>

        <div class="navbar-nav">
            <a href="index.php">Home</a>
            <a href="transaction.php">Transaction</a>
            <a href="aboutus.php">About Us</a>
            <a href="logout.php">Log Out</a>
        </div>

        <div class="navbar-extra">
            <a href="balance.php" id="balance">Rp. <?php echo $amount; ?></a>
        </div>
    </nav>
    <!-- Navbar End -->

    <div class="container">
        <div class="wrapper">
            <div class="movie-img">
                <img src="img/<?php echo $movie["poster"]; ?>">
            </div>
            <div class="content">
                <h1 class="movie-title"><?php echo $movie["title"]; ?></h1>
                <div class="movie-info">
                    <p class="age"><?php echo $movie["age_rating"]; ?></p>
                    <p class="duration"></p>
                </div>
                <p class="movie-desc"><?php echo $movie["description"]; ?></p>
                <a href="book.php?idmovie=<?php echo $movie['id_movie']; ?>">Buy a Ticket</a>
            </div>
        </div>
    </div>


    <script> feather.replace() </script>
    <script src=""></script>
</body>
</html>