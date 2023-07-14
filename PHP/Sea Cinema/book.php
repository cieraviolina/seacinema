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

//Ambil data dari id movie
$id_movie = $_GET['idmovie'];
$result_movie = mysqli_query($conn, "SELECT * FROM movie WHERE id_movie='$id_movie'");
$movie = mysqli_fetch_assoc($result_movie);
$title = $movie["title"];



// Book
if (isset ($_POST["book"])) {
    $name = $_POST["name"];
    $time = $_POST["time"];
    $seat = $_POST["seat"];

    $result = mysqli_query($conn, "SELECT seat FROM orders WHERE seat = '$seat'");
    if(mysqli_fetch_assoc($result)) {
        $warning = true;
    } else {
        $query = "INSERT INTO orders VALUES ('', '$id_user', '$name', '$title', '$time', '$seat')";
        mysqli_query($conn, $query);

    $success = true;
    }

}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Style -->
    <link rel="stylesheet" href="style/style-navbar.css">
    <link rel="stylesheet" href="style/style-book.css">

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
        <h1>Save Your Seat!</h1>
        <?php if (isset($warning)) : ?>
            <p style="color: red;">seat already taken!</p>
        <?php endif; ?>
        <?php if (isset($success)) : ?>
            <p style="color: rgb(26, 115, 232);">booking successed!</p>
        <?php endif; ?>
        <form action="" method="post" onsubmit="return validateForm()">
            <div class="content">
                <ul>
                    <li>
                        <label for="name">Name :</label>
                        <input type="text" name="name" id="name">
                    </li>
                    <li>
                        <label for="movie">Movie :</label>
                        <span class="movie-title" name="title"><?php echo $title; ?></span>
                    </li>
                    <li>
                        <label for="time">Time :</label>
                        <select name="time" id="time">
                            <option value="10:00">10:00</option>
                            <option value="12:30">12:30</option>
                            <option value="15:00">15:00</option>
                            <option value="17:30">17:30</option>
                        </select>
                    </li>
                    <li>
                        <label for="seat">Seat :</label>
                        <input type="text" name="seat" id="seat">
                    </li>
                    <li>
                        <button type="submit" name="book" id="btn">Book</button>
                    </li>
                </ul>

                <div class="prev-seat">
                    <table id="seat-table">
                        <tr>
                            <td id="seat-1A" data-name="1A">1A</td>
                            <td id="seat-2A" data-name="2A">2A</td>
                            <td id="seat-3A" data-name="3A">3A</td>
                            <td id="seat-4A" data-name="4A">4A</td>
                            <td id="seat-5A" data-name="5A">5A</td>
                            <td id="seat-6A" data-name="6A">6A</td>
                            <td id="seat-7A" data-name="7A">7A</td>
                            <td id="seat-8A" data-name="8A">8A</td>
                        </tr>
                        <tr>
                            <td id="seat-1B" data-name="1B">1B</td>
                            <td id="seat-2B" data-name="2B">2B</td>
                            <td id="seat-3B" data-name="3B">3B</td>
                            <td id="seat-4B" data-name="4B">4B</td>
                            <td id="seat-5B" data-name="5B">5B</td>
                            <td id="seat-6B" data-name="6B">6B</td>
                            <td id="seat-7B" data-name="7B">7B</td>
                            <td id="seat-8B" data-name="8B">8B</td>
                        </tr>
                        <tr>
                            <td id="seat-1C" data-name="1C">1C</td>
                            <td id="seat-2C" data-name="2C">2C</td>
                            <td id="seat-3C" data-name="3C">3C</td>
                            <td id="seat-4C" data-name="4C">4C</td>
                            <td id="seat-5C" data-name="5C">5C</td>
                            <td id="seat-6C" data-name="6C">6C</td>
                            <td id="seat-7C" data-name="7C">7C</td>
                            <td id="seat-8C" data-name="8C">8C</td>
                        </tr>
                        <tr>
                            <td id="seat-1D" data-name="1D">1D</td>
                            <td id="seat-2D" data-name="2D">2D</td>
                            <td id="seat-3D" data-name="3D">3D</td>
                            <td id="seat-4D" data-name="4D">4D</td>
                            <td id="seat-5D" data-name="5D">5D</td>
                            <td id="seat-6D" data-name="6D">6D</td>
                            <td id="seat-7D" data-name="7D">7D</td>
                            <td id="seat-8D" data-name="8D">8D</td>
                        </tr>
                        <tr>
                            <td class="space">&nbsp;</td>
                            <td class="space">&nbsp;</td>
                            <td class="space">&nbsp;</td>
                            <td class="space">&nbsp;</td>
                            <td class="space">&nbsp;</td>
                            <td class="space">&nbsp;</td>
                            <td class="space">&nbsp;</td>
                            <td class="space">&nbsp;</td>
                        </tr>
                        <tr>
                            <td id="seat-1E" data-name="1E">1E</td>
                            <td id="seat-2E" data-name="2E">2E</td>
                            <td id="seat-3E" data-name="3E">3E</td>
                            <td id="seat-4E" data-name="4E">4E</td>
                            <td id="seat-5E" data-name="5E">5E</td>
                            <td id="seat-6E" data-name="6E">6E</td>
                            <td id="seat-7E" data-name="7E">7E</td>
                            <td id="seat-8E" data-name="8E">8E</td>
                        </tr>
                        <tr>
                            <td id="seat-1F" data-name="1F">1F</td>
                            <td id="seat-2F" data-name="2F">2F</td>
                            <td id="seat-3F" data-name="3F">3F</td>
                            <td id="seat-4F" data-name="4F">4F</td>
                            <td id="seat-5F" data-name="5F">5F</td>
                            <td id="seat-6F" data-name="6F">6F</td>
                            <td id="seat-7F" data-name="7F">7F</td>
                            <td id="seat-8F" data-name="8F">8F</td>
                        </tr>
                        <tr>
                            <td id="seat-1G" data-name="1G">1G</td>
                            <td id="seat-2G" data-name="2G">2G</td>
                            <td id="seat-3G" data-name="3G">3G</td>
                            <td id="seat-4G" data-name="4G">4G</td>
                            <td id="seat-5G" data-name="5G">5G</td>
                            <td id="seat-6G" data-name="6G">6G</td>
                            <td id="seat-7G" data-name="7G">7G</td>
                            <td id="seat-8G" data-name="8G">8G</td>
                        </tr>
                        <tr>
                            <td id="seat-1H" data-name="1H">1H</td>
                            <td id="seat-2H" data-name="2H">2H</td>
                            <td id="seat-3H" data-name="3H">3H</td>
                            <td id="seat-4H" data-name="4H">4H</td>
                            <td id="seat-5H" data-name="5H">5H</td>
                            <td id="seat-6H" data-name="6H">6H</td>
                            <td id="seat-7H" data-name="7H">7H</td>
                            <td id="seat-8H" data-name="8H">8H</td>
                        </tr>
                        <tr>
                            <td class="space">&nbsp;</td>
                            <td class="space">&nbsp;</td>
                            <td class="space">&nbsp;</td>
                            <td class="space">&nbsp;</td>
                            <td class="space">&nbsp;</td>
                            <td class="space">&nbsp;</td>
                            <td class="space">&nbsp;</td>
                            <td class="space">&nbsp;</td>
                        </tr>
                    </table>
                    <div class="screen">
                        <p>Screen</p>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src=""></script>
</body>
</html>