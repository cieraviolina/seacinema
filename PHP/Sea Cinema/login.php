<?php
session_start();

if(isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

include 'connection.php';

// Register
if (isset($_POST["register"])) {
    $name = $_POST["name"];
    $age = $_POST["age"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $result = mysqli_query($conn, "SELECT username from users WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)) {
        echo "<script> alert('Username invalid') </script>";
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $query_user = "INSERT INTO users VALUES ('', '$username', '$password', '$name', '$age')";
        mysqli_query($conn, $query_user);

        $query_balance = "INSERT INTO balance VALUES ('', LAST_INSERT_ID(), 0)";
        mysqli_query($conn, $query_balance);

        echo "<script> alert('Registration Successed! Please Log In to Continue') </script>";
    }
    
}

// Login

if(isset ($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    if(mysqli_num_rows($result) === 1 ) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            $_SESSION["login"] = true;
            $_SESSION["username"] = $username;

            header("Location: index.php");
            exit;
        }
    }

    $error = true;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>SEA Cinema</title>
    <link rel="stylesheet" href="style/style-login.css">
</head>
<body>
    <canvas></canvas>
    <div class="wrapper">
        <div id="banner"></div>
        <div id="registration-form">
            <h2>Register</h2>
            <!-- Tambahkan elemen form pendaftaran di sini -->
            <form action="" method="post">
            <!-- Isi form pendaftaran -->
                <div class="input-group">
                    <input type="text" name="name" class="input" required>
                    <label class="user-label">Full Name</label>
                </div>
                <div class="input-group">
                    <input type="text" name="age" class="input" required>
                    <label class="user-label">Age</label>
                </div>
                <div class="input-group">
                    <input type="text" name="username" class="input" required>
                    <label class="user-label">Username</label>
                </div>
                <div class="input-group">
                    <input type="password" name="password" class="input" required>
                    <label class="user-label">Password</label>
                </div>
                <button type="submit" name="register" class="btn">Submit</button>
            </form>
            <p>Already have an account? <a href="#" id="login-link">Log In</a></p>
            
        </div>

        <div id="login-form" style="display: none;">
            <h2>Login</h2>
            <?php if (isset($error)) : ?>
                <p>wrong username or password</p>
            <?php endif; ?>
            <!-- Tambahkan elemen form login di sini -->
            <form action="" method="post">
            <!-- Isi form login -->
                <div class="input-group">
                    <input type="text" name="username" class="input" required>
                    <label class="user-label">Username</label>
                </div>
                <div class="input-group">
                    <input type="password" name="password" class="input" required>
                    <label class="user-label">Password</label>
                </div>
                <button type="submit" name="login" class="btn">Login</button>
            </form>
            <p>Didn't have an account? <a href="#" id="register-link">Register</a></p>
        </div>
    </div>
    <script src="script/script-login.js"></script>
    <script src="script/star.js"></script>
</body>
</html>