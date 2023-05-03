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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/fileUpload.css">
    <title>Artikel</title>
</head>
<body>
    <main id="container">
        <form action="uploadingArt.php" method="post" enctype="multipart/form-data">

            <div class="title">
                <h2>Article</h2>
                <div class="text">
                    <label for="title"><h3>Title</h3></label>
                </div>
                <div class="input">
                    <input type="text" id="title" name="title">
                </div>
            </div>
            <div class="write">
                <div class="text">
                    <label for="write"><h3>Writer</h3></label>
                </div>
                <div class="input">
                    <input type="text" id="write" name="writer">
                </div>
            </div>
            <div class="file">
                <div class="text"></div>
                <div class="input_file">
                    <h3>Upload File</h3>
                    <input type="file" name="myfile">
                </div>
            </div>
            <div class="submit">
                <label for="submit"></label>
                <input type="submit" name="upload" value="Submit">
            </div>
            <div class="cancel">
                <label for="cancel"></label>
                <input type="button" value="Cancel" onclick="back()">
            </div>
        </form>
    </main>
<script>
    function back(){
        window.location.href="ArticlePage.php"
    }
</script>
</body>
</html>