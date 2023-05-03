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
    <title>Article</title>
    <link rel="stylesheet" type="text/css" href="../css/dataPageAdmin.css"/>
</head>
<body>
<script>
    function CRUDdatas(){
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

<div class="opening-image">
    <img src="../image/dataImage.jpg" alt="none">
</div>

<div class="separator"><p>XYZ Church</p></div>

<div class="container">

    <div class="pageTitle">Congregation Data</div>
    <?php
    $dbname = "xy_church";
    $host = "localhost";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($host, $username,$password, $dbname);
    if (mysqli_connect_errno()) {
        echo "Koneksi ke server gagal dilakukan.";
        exit();
    }

    $query = "select * from churchdatas order by id";
    $result = mysqli_query($conn, $query);

    if ($result){
        ?>
        <div class="tableContainer">
            <form action="delete.php" method="post">

                <table class="tableDatas">
                    <tr>
                        <th >Id</th>
                        <th >Branch</th>
                        <th>Year</th>
                        <th >Total</th>
                        <th >Male</th>
                        <th >Female</th>
                        <th colspan="2" class="center" width="100">Action</th>
                    </tr>
                    <?php
                    $no=1;
                    while ($row = mysqli_fetch_row($result)) {
                        ?>
                        <tr><?php

                            $id = $row[0];
                            $branch = $row[1];
                            $year = $row[2];
                            $total = $row[3];
                            $male = $row[4];
                            $female = $row[5];
                            ?>
                            <td><?php echo $id++;?></td>
                            <td><?php echo $branch;?></td>
                            <td><?php echo $year;?></td>
                            <td><?php echo $total;?></td>
                            <td><?php echo $male;?></td>
                            <td><?php echo $female;?></td>
                            <td>
                                <a href ="Form_update.php?id=<?php echo $id;?>">Edit</a> |
                                <a href ="delete.php?id=<?php echo $id;?>">Delete</a>
                            </td>
                        </tr>
                        <?php

                    }
                    ?>
                </table>

            </form>
        </div>
        <?php
        mysqli_free_result($result);
    }
    mysqli_close($conn);
    ?>
    <div class="addDatas">
        <a href ="Form_insert.php" class="newData">Add New Data</a>
    </div>
    <footer class="footer">© 2022 Jabez Joeniko & Jastin S | All rights reserved</footer>
</div>

</body>
</html>