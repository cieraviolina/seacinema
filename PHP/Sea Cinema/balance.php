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

//Top up
if(isset($_POST["topup"])) {
    global $amount;
    $amount = $amount + $_POST["newamnt"];

    $result_topup = mysqli_query($conn, "UPDATE orders SET amount = '$amount' WHERE id_user = '$id_user'");

    $success = true;
}

//Withdraw
if(isset($_POST["withdraw"])) {
    global $amount;
    $amount = $amount - $_POST["newamnt"];

    $result_withdraw = mysqli_query($conn, "UPDATE orders SET amount = '$amount' WHERE id_user = '$id_user'");

    $success = true;
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Style -->
    <link rel="stylesheet" href="style/style-navbar.css">
    <link rel="stylesheet" href="style/style-balance.css">

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
        <h1>My Balance:</h1>
        <h2>Rp. <?php echo $amount; ?></h2>
        <form action="" method="post"></form>
        <div class="content">
            <ul>
                <li>
                    <label for="newamnt">Amount:</label>
                    <input type="text" name="newamnt" id="newamnt">
                </li>
                <li>
                    <button type="submit" name="topup" id="btn">Top Up</button>
                    <button type="submit" name="withdraw" id="btn">Withdraw</button>
                </li>
            </ul>
            <?php if (isset($success)) : ?>
            <p style="color: rgb(26, 115, 232);">booking successed!</p>
            <?php endif; ?>
        </div>
    </div>


    <script>
        feather.replace()
    </script>
    <script src=""></script>
</body>
</html>