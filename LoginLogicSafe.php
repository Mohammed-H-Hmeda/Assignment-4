<?php
session_start();
$host = "localhost";
$user = "root";
$pass = "";
$db = "websec";
$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_GET['username'])) {
    $username = $_GET['username'];
    $password = $_GET['password'];
    $sql = "SELECT * FROM users WHERE username=? AND password=?";
    $prep = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($prep, "ss", $username, $password);
    mysqli_stmt_execute($prep);
    $result = mysqli_stmt_get_result($prep);
    if ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['username'] = $row['username'];
        $_SESSION['type'] = $row['type'];
        header("Location: report.php?");
        exit();
    }
} else {
    echo "Invalid username or password.";
}
