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

// Ambil data dr tabel movie
$result_movie = mysqli_query($conn, "SELECT * FROM movie");

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Style -->
    <link rel="stylesheet" href="style/style-navbar.css">
    <link rel="stylesheet" href="style/style-index.css">


    <title>SEA Cinema</title>
</head>
<body>
    <!-- Navbar Start -->
    <nav class="navbar">
        <a href="#" class="navbar-logo">SEANEMA</a>

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
        <p><?php echo $name; ?> mau<span>nonton</span> apa hari ini?</p>
        <div class="content">

            <?php while($row = mysqli_fetch_assoc($result_movie)) : ?>

            <div class="card">
                <div class="card-img"><img src="img/<?php echo $row["poster"]; ?>"></div>
                <div class="card-info">
                    <a href="detail.php?idmovie=<?php echo $row['id_movie']; ?>" class="text-title"><?php echo $row["title"]; ?></a>
                    <p class="text-body"><?php echo $row["age_rating"]; ?>+<br>
                    <?php echo $row["description"]; ?></p>
                </div>
                <div class="card-footer">
                    <span class="text-title"><?php echo $row["price"]; ?></span>
                    <div class="card-button">
                        <a href="book.php?idmovie=<?php echo $row['id_movie']; ?>" id="shopping-cart"><i data-feather="shopping-cart"></i></a>
                    </div>
                </div>
            </div>

            <?php endwhile; ?>

        </div>
    </div>


    <script>
        feather.replace()
    </script>
    <script src="script/script-index.js"></script>
</body>
</html>