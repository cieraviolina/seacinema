<?php
session_start();

$username = $_SESSION["username"];

if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'connection.php';

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
    <link rel="stylesheet" href="style/style-aboutus.css">

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

    <div class="container">
        <h2>About Us</h2>
        <p>Introducing SEA Cinema, a rising star in the movie theater industry known for
            its affordable ticket prices and wide range of movie genres. Because of its
            popularity, SEA Cinema has gained a lot of customers. However, in order to buy
            tickets, they have to wait in a really long queue! To improve the moviegoing
            experience, the management of SEA Cinema has decided to develop a brand-new
            movie ticket booking app.</p>
    </div>

<script src=""></script>
</body>
</html>