<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Login & Sign Up</title>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="index.php" method="POST">
                <h1>Create Account</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registration</span>
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="signup">Sign Up</button>
            </form>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
                $name = $_POST["name"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $sql = "INSERT INTO credentials (name, email, password) VALUES ('$name', '$email', '$password')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo "Data Inserted Successfully.";
                } 
            }
            ?>
        </div>
        <div class="form-container sign-in">
            <form action="index.php" method="POST">
                <h1>Sign In</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for login</span>
                <input type="email" name="email1" placeholder="Email" required>
                <input type="password" name="password1" placeholder="Password" required>
                <a href="#">Forget Your Password?</a>
                <button type="submit" name="signin">Sign In</button>
            </form>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signin'])) {
                $email1 = $_POST["email1"];
                $password1 = $_POST["password1"];
                $sql1 = "SELECT * FROM credentials WHERE email = '$email1' AND password = '$password1'";
                $result1 = mysqli_query($conn, $sql1);
                if ($result1 && mysqli_num_rows($result1) > 0) {
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['email'] = $email1;
                    header("Location: welcome.php");
                    exit();
                } 
            }
            ?>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Log In with your Credentials</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Sign Up with your Credentials to access the Website.</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
