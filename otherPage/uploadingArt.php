<?php

session_start();

if (isset($_SESSION['name'])){
    $name_ssr = $_SESSION['name'];
}
else{
    $name_ssr = 'GUEST';
}

if (isset($_SESSION['classes'])){
    $classes = $_SESSION['classes'];
}
else{
    $classes = "member";
}

$dbname = "xy_church";
$host = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username,$password, $dbname);
if (mysqli_connect_errno()) {
    echo "Error Connection";
    exit();
}

$titleA = $_POST['title'];
$writerA = $_POST['writer'];

$namaFile = $_FILES['myfile']['name'];
$namaSementara = $_FILES['myfile']['tmp_name'];

$dirUpload = "../article/";

$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

if ($terupload) {
    $directory = "../article/$namaFile";
    $quer = "SELECT * FROM articlelist ORDER BY number DESC LIMIT 1;";
    $result = $conn -> query($quer);
    $num = mysqli_affected_rows($conn);
    if ($num > 0) {
        $row = $result->fetch_assoc();
        $numberArt = $row["number"];
        $number = $numberArt + 1;
        $imageA = "../image/Article/morn$number.jpg";
        $sql = "INSERT INTO articlelist (number, tile, body_add, writer, image) VALUES ('$number', '$titleA', '$directory', '$writerA', '$imageA')";

        if ($conn->query($sql) === TRUE) {
            header("location: ArticlePage.php", true, 301);
        }
        else{
            echo $number, $titleA, $directory, $writerA, $imageA;
        }
    }
} else {
    echo "Upload Gagal!";
}

?>