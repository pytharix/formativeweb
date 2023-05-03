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
    <title>Gereja XYZ</title>
    <link rel="stylesheet" type="text/css" href="css/home.css"/>
</head>
<body>

<script>
    function BranchListPopUp() {
        document.getElementById("PopUpListBranch").classList.toggle("show");
    }

    function PageListPopUp() {
        document.getElementById("PopUpListPage").classList.toggle("show");
    }

    function changeToSurabaya (){
        <?php
        $branchName = "XYZ Surabaya";
        $changes = "select * from branchlist where c_name = '$branchName' ";
        $result = $conn -> query($changes);
        $row = $result -> fetch_assoc();
        ?>
        changePage()
    }

    function initiateArticleCounter(){
        window.location.href = "otherPage/initiates.php";
    }

    function changePage(){
        <?php
        $Cname = $row['c_name'];
        $Cimage = $row['c_image'];
        $Isize = $row['image_size'];
        $Clocation = $row['c_location'];
        $Cphone = $row['c_phone'];
        $Csocial = $row['c_social'];
        $Coffice = $row['c_office'];
        ?>

        document.body.style.backgroundImage = "<?php echo $Cimage?>";
        document.body.style.backgroundPositionY = "<?php echo $Isize?>";
        const church_name = document.getElementById("church-names");
        const location_ = document.getElementById("location-ch");
        const phone_full = document.getElementById("phone-full");
        const media_social = document.getElementById("media-social");
        const office_hours = document.getElementById("office-hours");

        church_name.innerHTML = "<?php echo $Cname?>";
        location_.innerHTML = "<?php echo $Clocation?>";
        phone_full.innerHTML = "<?php echo $Cphone?>";
        media_social.innerHTML = "<?php echo $Csocial?>";
        office_hours.innerHTML = "<?php echo $Coffice?>";
    }
</script>

<!--Navbar-->
<nav class="navbar">
    <div class="dropdown" onclick="PageListPopUp()">
        <img src="image/burgerNavdef.png" alt="none">
        <img src="image/burgerNav.png" class="img-top" alt="none">
    </div>
    <div class="BranchLists">
        <button class="BranchList" onclick="BranchListPopUp()">Locations</button>
        <div class="gereja-cabang" id="PopUpListBranch">
            <a onclick="changeToSurabaya()">Surabaya</a>
            <a href="mainPage.php">Central</a>
        </div>
    </div>
</nav>

<div class="otherPage" id="PopUpListPage">
    <a href="otherPage/GalleryPage.php">Gallery</a>
    <a href="otherPage/DataPage.php">Data</a>
    <a onclick="initiateArticleCounter()">Article</a>
</div>

<div class="profile">
    <a href="mainPage.php">
        <div class="profile-pict">
            <img src="image/Logo.png">
        </div>
    </a>
    <div class="profile-name">
        <?php
        echo "$name_ssr";
        ?>
    </div>
    <div class="profile-login">
        <img src="image/loginDropDown.png">
        <div class="login-dropdown">
            <?php
            $the_name = $name_ssr;
            if ($the_name != "GUEST"){
            ?>
                <a href="otherPage/logouts.php">Log out</a>
            <?php
            }
            else{
                ?>
                <a href="otherPage/login.html">Log in</a>
                <a href="otherPage/signup.html">Sign up</a>
            <?php
            }
            ?>

        </div>
    </div>
</div>

<!--Navbar-->

<div class="container">
    <div class="welcome">
        <p class="church-name" id="church-names">XYZ Church</p>
        <p class="church-welcome">Welcome Homies</p>
    </div>
    <div class="information">
        <div class="info-body">
            <p class="header-info">
                XYZ is a church that believes in Jesus and Bible,
                <br>
                a Church that loves God and People
            </p>
            <p class="normies-info">
                Overwhelmed by the gift of salvation we have found in Jesus, we have a heart for
                <br> authentic worship, are passionate about the local church, and are on mission to see <br>
                God’s kingdom established across the earth.
            </p>
        </div>
        <div class="address">
            <br>
            <br>
            <br>
            <img src="image/map.png">
            <p id="location-ch">Calvin Tower RMCI Jl. Industri Blok B14, RW.10, East Pademangan, Kemayoran, Central Jakarta City, Jakarta 10610</p>
        </div>
    </div>
    <div class="schedule">
        <h1 style="text-align: center">Schedules</h1>
        <br>
        <br>
        <br>
        <table class="table-pos">
            <tr>
                <td><strong>Monday</strong></td>
                <td>< 06:00 WIB > Morning Devotion</td>
            </tr>
            <tr>
                <td>

                </td>
            </tr>
            <tr>
                <td>

                </td>
            </tr>
            <tr>
                <td>

                </td>
            </tr>
            <tr>
                <td>

                </td>
            </tr>
            <tr>
                <td><strong>Thursday</strong></td>
                <td>< 19:00 WIB > Night Devotion</td>
            </tr>
            <tr>
                <td>

                </td>
            </tr>
            <tr>
                <td>

                </td>
            </tr>
            <tr>
                <td>

                </td>
            </tr>
            <tr>
                <td>

                </td>
            </tr>
            <tr>
                <td><strong>Saturday</strong></td>
                <td>
                    < 10:00 WIB > Youth <br>
                    < 16:00 WIB > Teens
                </td>
            </tr>
            <tr>
                <td>

                </td>
            </tr>
            <tr>
                <td>

                </td>
            </tr>
            <tr>
                <td>

                </td>
            </tr>
            <tr>
                <td>

                </td>
            </tr>
            <tr>
                <td><strong>Sunday</strong></td>
                <td>
                    < 06:30 WIB > Main 1 <br>
                    < 09:30 WIB > Main 2
                </td>
            </tr>
        </table>
    </div>
    <div class="news">
        <h1>News</h1>
        <div class="news-content">
            <ul>
                <li>
                    Worship is still held offline with proper protocols.
                </li>
                <li>
                    offerings are only held virtually.
                </li>
                <li>
                    registration of catechism is still open
                    <br><a href="#">bit.ly/CatechismRegistration</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="about-us">
        <div class="fullDay">
            <p style="margin: 0" id="phone-full">
                 0 888 0088 (24 Hours) <br>
            </p>
                <a href="#"><p id="media-social">twitter/xyzChurch</p></a>

        </div>
        <div class="logo-contact">
            <img src="image/Logo_trans.png">
            XY Church
        </div>
        <div class="workHour">
            <p id="office-hours">
                Office Hours:<br>
                06:00 - 21:00 WIB <br>
                 0 111 1101<br>
            </p>
        </div>
    </div>
    <footer class="footer">© 2022 Jabez Joeniko & Jastin S | All rights reserved</footer>
</div>





</body>
</html>