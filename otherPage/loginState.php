<?php

$user = $_POST['usrname'];
$pswd = $_POST['pswusr'];

$dbname = "xy_church";
$host = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username,$password, $dbname);

if (mysqli_connect_errno()) {
    echo "Koneksi ke server gagal dilakukan.";
    exit();
}

$query = "select * from users where usrname='$user' and usr_pass='$pswd'";
$result = $conn -> query($query);
$num = mysqli_affected_rows($conn);

if ($num > 0) {
    $row = $result->fetch_assoc();
    $name = $row["usrname"];
    $classes = $row["classes"];
    session_start();
    $_SESSION['classes'] = $classes;
    $_SESSION['name'] = $name;
    header("location: ../mainPage.php", true, 301);
}
exit();

?>