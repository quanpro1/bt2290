<?php
$servername = "localhost";
$username = "root";
$password = "quanpro123";
$dbname = "bt2290";
$conn = new mysqli($servername, $username, null, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];


$sql = "SELECT * FROM users WHERE tendangnhap='$username' AND matkhau='$password'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Đăng nhập thành công
    session_start();
    $_SESSION['username'] = $username;
    header("Location: products.php");
} else {
    // Đăng nhập không thành công
    echo "Invalid username or password.";
}

$conn->close();
?>