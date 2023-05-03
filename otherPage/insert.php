<?php
if (isset($_POST["btnSubmit"])) {
 	$branch = $_POST["branch"];
	$year = $_POST["year"];
   $total = $_POST["total"];
	$male = $_POST["male"];
   $female = $_POST["female"];

$dbname = "xy_church";
$host = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username,$password, $dbname);
if (mysqli_connect_errno()) {
   echo "Koneksi ke server gagal dilakukan.";
   exit();
}

$query = "insert into churchdatas values (NULL, '$branch', $year, $total, '$male', '$female')";

mysqli_query($conn, $query);
$num = mysqli_affected_rows($conn);

if ($num > 0) {
   header("location: dataPageAdmin.php", true, 301);
   exit();
} else {
   
   echo "Data gagal disimpan ke dalam database.";
   echo "('$branch', '$year', '$total', '$male', '$female')";
}
}
?>   
