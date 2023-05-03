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

$query = "select * from users where usrname='$user'";
$result = $conn -> query($query);
$num = mysqli_affected_rows($conn);

if ($num > 0) {
    echo "Failed To Create Account, This User is Used, Please go Back";
}
else{
    $sql = "INSERT INTO users (usrname, usr_pass, classes) VALUES ('$user', '$pswd', 'member')";
    if ($conn->query($sql) === TRUE) {
        header("location: ../mainPage.php", true, 301);
    }
}

exit();

?>