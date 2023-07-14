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

// Ambil data dr tabel order
$result_order = mysqli_query($conn, "SELECT * FROM orders WHERE id_user = '$id_user'");
$order = mysqli_fetch_assoc($result_order);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Style -->
    <link rel="stylesheet" href="style/style-navbar.css">
    <link rel="stylesheet" href="style/style-transaction.css">

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
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>Name</th>
                <th>Title</th>
                <th>Time</th>
                <th>Seat</th>
            </tr>
            <?php while ($order = mysqli_fetch_assoc($result_order)) : ?>
            <tr>
                <td><?php echo $order["name"]; ?></td>
                <td><?php echo $order["title"]; ?></td>
                <td><?php echo $order["time"]; ?></td>
                <td><?php echo $order["seat"]; ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>

    <script src=""></script>
</body>
</html>