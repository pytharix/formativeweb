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
    <title>Gallery</title>
    <link rel="stylesheet" type="text/css" href="../css/gallery.css"/>

</head>
<body>

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

<script>
    function uploadBTN(){
        window.location.href = "fileUploadGallery.html"
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

<div class="opening-image">
    <img src="../image/gallery_back.jpg" alt="none">
</div>

<div class="separator"><p>XYZ Church</p></div>

<div class="container">

    <div class="pageTitle">Gallery</div>

    <?php
    $query = "select * from galleryimage";
    $result = mysqli_query($conn, $query);

    if ($result){
    ?>
    <table class="imageContainer">
        <?php
        $no=1;
        while ($row = mysqli_fetch_row($result)) {
        ?>
        <tr>
            <?php
            $imageAdd = $row[0];
            $caption = $row[1];
            ?>
            <td><div class="images"> <img src="<?php echo $imageAdd;?>" alt="None"> </div> </td>
            <td><p><?php echo $caption;?></p></td>
        </tr>
        <?php
        }
        ?>
    </table>
        <?php
        mysqli_free_result($result);
    }
    mysqli_close($conn);
    ?>
    <?php

    if($classes == "admin"){
        ?>
        <div class="uploadBtn">
            <button onclick="uploadBTN()" class="uploading">Upload</button>
        </div>
        <?php
    }
    ?>
    <footer class="footer">© 2022 Jabez Joeniko & Jastin S | All rights reserved</footer>
</div>

</body>
</html>