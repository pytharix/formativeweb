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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data XYZ Chruch</title>
    <link rel="stylesheet" type="text/css" href="../css/data.css"/>

</head>
<body>
<script>
    function CRUDdatas(){
        window.location.href = "dataPageAdmin.php";
    }

    function WeeksData(){
        window.location.href = "data_week.php";
    }

    function BranchListPopUp() {
        document.getElementById("PopUpListBranch").classList.toggle("show");
    }

    function PageListPopUp() {
        document.getElementById("PopUpListPage").classList.toggle("show");
    }

    function mainPage(){
        window.location.href = "../mainPage.php";
    }

</script>

<!--Navbar-->

<nav class="navbar">
    <div class="dropdown" onclick="PageListPopUp()">
        <img src="../image/burgerNavdef.png" alt="none">
        <img src="../image/burgerNav.png" class="img-top" alt="none">
    </div>
    <div class="BranchLists">
        <button class="BranchList" onclick="mainPage()">XYZ Church</button>
    </div>
</nav>

<div class="otherPage" id="PopUpListPage">
    <a href="GalleryPage.php">Gallery</a>
    <a href="DataPage.php">Data</a>
    <a href="ArticlePage.php">Article</a>
</div>

<div class="profile">
    <a href="../mainPage.php">
        <div class="profile-pict">
            <img src="../image/Logo.png">
        </div>
    </a>
    <div class="profile-name">
        <?php
        echo "$name_ssr";
        ?>
    </div>
    <div class="profile-login">
        <img src="../image/loginDropDown.png">
        <div class="login-dropdown">
            <?php
            $the_name = $name_ssr;
            if ($the_name != "GUEST"){
                ?>
                <a href="logouts.php">Log out</a>
                <?php
            }
            else{
                ?>
                <a href="login.html">Log in</a>
                <a href="signup.html">Sign up</a>
                <?php
            }
            ?>

        </div>
    </div>
</div>

<!--Navbar-->

<script src='https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js'>

</script>


<?php

$quers = "SELECT * FROM churchdatas WHERE branch='XYZ Church' ORDER BY year";
$result = mysqli_query($conn, $quers);
if($result){
    $year = [];
    $totals = [];
    while($row = mysqli_fetch_row($result)){
        $year[] = $row[2];
        $totals[] = $row[3];
    }

}

$quers = "SELECT * FROM churchdatas WHERE branch='XYZ Surabaya' ORDER BY year";
$result = mysqli_query($conn, $quers);
if($result){
    $year1 = [];
    $totals1 = [];
    while($row = mysqli_fetch_row($result)){
        $year1[] = $row[2];
        $totals1[] = $row[3];
    }

}

$quers = "SELECT * FROM churchdatas WHERE branch='XYZ Singapore' ORDER BY year";
$result = mysqli_query($conn, $quers);
if($result){
    $year2 = [];
    $totals2 = [];
    while($row = mysqli_fetch_row($result)){
        $year2[] = $row[2];
        $totals2[] = $row[3];
    }

}

?>


<div class="opening-image">
    <img src="../image/dataImage.jpg" alt="none">
</div>

<div class="separator"><p>XYZ Church</p></div>

<div class="container">
    <div class="pageTitle">Statistic</div>
    <div class="graphs">
        <script>
            var totalSS = [];
            var totalSS1 = [];
            var totalSS2 = [];
            var yearSS = [];
            <?php foreach($totals as $flower){
            ?>
            totalSS.push(<?php echo $flower;?>);
            <?php
            } ?>
            <?php foreach($totals1 as $flower){
            ?>
            totalSS1.push(<?php echo $flower;?>);
            <?php
            } ?>
            <?php foreach($totals2 as $flower){
            ?>
            totalSS2.push(<?php echo $flower;?>);
            <?php
            } ?>
            <?php foreach($year as $flower){
            ?>
            yearSS.push(<?php echo $flower;?>);
            <?php
            } ?>
        </script>


        <canvas id="myChart" class="myCharts"></canvas>
    </div>
    <?php

    if($classes == "admin"){
        ?>
        <div class="uploadBtn">
            <button onclick="CRUDdatas()" class="uploading">CRUD</button>
        </div>
        <div class="uploadBtn">
            <button onclick="WeeksData()" class="uploading">WEEK</button>
        </div>
        <?php
    }
    ?>
    <footer class="footer">© 2022 Jabez Joeniko & Jastin S | All rights reserved</footer>
</div>

<script>
    let myChart = document.getElementById('myChart').getContext('2d');
    let barChart = new Chart(myChart, {
        type: 'line',
        data : {
            labels: yearSS,
            datasets: [
                {
                    label: 'XYZ Church',
                    data: totalSS,
                    backgroundColor: 'White',
                    borderColor: 'Red'
                },
                {
                    label: 'XYZ Surabaya',
                    data: totalSS1,
                    backgroundColor: 'White',
                    borderColor: 'Green'
                },
                {
                    label: 'XYZ Singapore',
                    data: totalSS2,
                    backgroundColor: 'White',
                    borderColor: 'Blue'
                }
            ]


        },
        options: {}
    });
</script>

</body>
</html>