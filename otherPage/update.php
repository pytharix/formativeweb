<?php
if (isset($_POST["btnSubmit"])) {
	$id = $_POST["id"];
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

$query = "update churchdatas set branch='$branch', year='$year', total='$total', male='$male', female='$female' where id ='$id'";

mysqli_query($conn, $query);
$num = mysqli_affected_rows($conn);

if ($num > 0) {
   echo "Data yang kamu simpan sudah disimpan."; 
?>
   <meta content="0; url=dataPageAdmin.php" http-equiv="refresh">
<?php
} else {
   echo "Data gagal disimpan ke dalam database.";
}
}
?>   
