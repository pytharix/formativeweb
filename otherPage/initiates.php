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

$truncatetable= mysqli_query($conn,'TRUNCATE TABLE current');
if($truncatetable !== FALSE)
{
    $sql = "INSERT INTO current (nums) VALUES (1)";

    if ($conn->query($sql) === TRUE) {
        header("location: ArticlePage.php", true, 301);
    }
}
else
{
    echo("No rows have been deleted.");
}

?>
