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
    <link rel="stylesheet" type="text/css" href="../css/article.css"/>
</head>
<body>
<?php
$query = "select * from current";
$result = $conn -> query($query);
$row = $result -> fetch_assoc();

$number = $row['nums'];

?>

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
        window.location.href = "fileUploadArticle.php";
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

    function check(){
        <?php

        $sql = "SELECT * from articlelist";

        if ($result = mysqli_query($conn, $sql)) {
            $rowcount = mysqli_num_rows($result);
        }
        ?>
        return "<?php echo $rowcount?>"
    }

    function getAllDataArticle(){
        <?php
        $query = "select * from articlelist where number = '$number' ";
        $result = $conn -> query($query);
        $row = $result -> fetch_assoc();
        ?>
    }

    function prevBtn(){
        window.location.href = "prevBtn.php";
    }

    function nextBtn(){
        window.location.href = "nextBtn.php";
    }

    function checkButton(){
        a = <?php echo $number ?>;
        console.log(a)
        document.getElementById("prev_btn").disabled = a <= 1;
        document.getElementById("next_btn").disabled = a >= check();
    }

    function init(){

        checkButton()
        getAllDataArticle()
    }

    window.onload = init;

</script>

<div class="opening-image">
    <img src="<?php echo $row['image'] ?>" alt="none">
</div>

<div class="separator"><p>XYZ Church</p></div>

<div class="container">
    <div class="article-title"><?php echo $row['tile'] ?></div>
    <div class="article-body">
        <embed src="<?php echo $row['body_add'] ?>"/>
        <p>
            By:  <?php echo $row['writer'] ?>
        </p>
    </div>
    <?php

    if($classes == "admin"){
        ?>
        <div class="uploadBtn">
            <button onclick="uploadBTN()" class="uploading">Upload</button>
        </div>
        <?php
    }
    ?>
    <div class="article-end">
        <button class="prev-btn" id="prev_btn" onclick="prevBtn()"><img src="../image/prev_btn.png" alt="none"></button>
        <?php echo $row['tile'] ?>
        <button class="next-btn" id="next_btn" onclick="nextBtn()"><img src="../image/next_btn.png" alt="none"></button>
    </div>

    <footer class="footer">© 2022 Jabez Joeniko & Jastin S | All rights reserved</footer>
</div>
</body>
</html>