<?php
$id =$_GET["id"] - 1;

$dbname = "xy_church";
$host = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username,$password, $dbname);
if (mysqli_connect_errno()) {
   echo "Koneksi ke server gagal dilakukan.";
   exit();
}
	$query = "delete from churchdatas where id='$id'";
	mysqli_query($conn, $query);
	
$num = mysqli_affected_rows($conn);
if ($num > 0) {
   header("location: dataPageAdmin.php", true, 301);
   exit();
} else {
   echo "Penghapusan data gagal dilakukan.";
}

?>   
