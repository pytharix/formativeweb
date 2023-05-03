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

$query = "select * from current";
$result = $conn -> query($query);
$row = $result -> fetch_assoc();

$number = $row['nums'];
$newNum = $number - 1;

$truncatetable= mysqli_query($conn,'TRUNCATE TABLE current');
if($truncatetable !== FALSE)
{
    $sql = "INSERT INTO current (nums) VALUES ($newNum)";

    if ($conn->query($sql) === TRUE) {
        header("location: ArticlePage.php", true, 301);
    }
    else
    {
        echo("No rows have been gagal insert.");
    }
}
else
{
    echo("No rows have been deleted.");
}


