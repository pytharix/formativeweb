<?php

session_start();

if (isset($_SESSION['name'])) {
    $name_ssr = $_SESSION['name'];
} else {
    $name_ssr = 'GUEST';
}

if (isset($_SESSION['classes'])) {
    $classes = $_SESSION['classes'];
} else {
    $classes = "member";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Article</title>
    <link rel="stylesheet" type="text/css" href="../css/dataPageAdmin.css"/>
</head>
<body>
<script>
    function CRUDdatas() {
        window.location.href = "dataPageAdmin.php";
    }

    function WeeksData() {
        window.location.href = "data_week.php";
    }

    function BranchListPopUp() {
        document.getElementById("PopUpListBranch").classList.toggle("show");
    }

    function PageListPopUp() {
        document.getElementById("PopUpListPage").classList.toggle("show");
    }

    function mainPage() {
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

<div class="opening-image">
    <img src="../image/dataImage.jpg" alt="none">
</div>

<div class="separator"><p>XYZ Church</p></div>


<div class="container">

    <div class="pageTitle">Congregation Data</div>
    <div class="tableContainer">
        <?php
        $dbname = "xy_church";
        $host = "localhost";
        $username = "root";
        $password = "";

        $conn = mysqli_connect($host, $username, $password, $dbname);
        if (mysqli_connect_errno()) {
            echo "Koneksi ke server gagal dilakukan.";
            exit();
        }

        $query = "select * from data_week where branch='XYZ Singapore' order by week";
        $result = mysqli_query($conn, $query);

        if ($result) {
        ?>
        <table border="1" class="tableDatas">
            <tr>

                <th width="100">Branch</th>
                <th width="100">Week</th>
                <th width="100">Total Coming</th>


            </tr>
            <?php
            $no = 1;
            while ($row = mysqli_fetch_row($result)) {
            ?>
            <tr><?php

                $branch = $row[0];
                $week = $row[1];
                $total_coming = $row[2];
                ?>

                <td><?php echo $branch; ?></td>
                <td><?php echo $week; ?></td>
                <td><?php echo $total_coming; ?></td>


                <?php

                }
                ?>
        </table>
    </div>
    <?php
    mysqli_free_result($result);
    }
    mysqli_close($conn);
    ?>

    <div class="buttonContainer">
        <button class="button1" onclick="goSurabaya(); function goSurabaya(){window.location.href='data_week_sur.php'}">XYZ Surabaya</button>
        <button class="button2" onclick="goSurabaya(); function goSurabaya(){window.location.href='data_week_sin.php'}">XYZ Singapore</button>
    </div>


    <div class="uploadBtn">
        <button onclick="goChurch(); function goChurch(){window.location.href='data_week.php'}" class="uploading">XYZ Church</button>
    </div>

    <footer class="footer">© 2022 Jabez Joeniko & Jastin S | All rights reserved</footer>
</div>

</body>
</html>