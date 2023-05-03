<?php

$dbname = "xy_church";
$host = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username,$password, $dbname);
if (mysqli_connect_errno()) {
    echo "Error Connection";
    exit();
}

$caption = $_POST['caption'];

$namaFile = $_FILES['myfile']['name'];
$namaSementara = $_FILES['myfile']['tmp_name'];

$dirUpload = "../image/gallery/";

$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

if ($terupload) {
    $directory = "../image/gallery/$namaFile";
    $sql = "INSERT INTO galleryimage (image_add, image_caption) VALUES ('$directory', '$caption')";
    if ($conn->query($sql) === TRUE) {
        header("location: GalleryPage.php", true, 301);
    }
    else{
        echo "GAGAL";
    }
} else {
    echo "Upload Gagal!";
}

?>