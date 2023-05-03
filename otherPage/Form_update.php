<html>
<head>
	<title> Update Data </title>
    <link rel="stylesheet" type="text/css" href="../css/datasCRUD.css"/>
</head>
<body>
    <?php
    $id =$_GET["id"] - 1;

    $dbname = "xy_church";
    $host = "localhost";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($host, $username,$password, $dbname);
    if (mysqli_connect_errno()) {
        echo "Koneksi ke server gagal dilakukan.";
        exit();
    }


    $query = "select branch, year, total, male, female from churchdatas where id ='$id'";
    $result = mysqli_query($conn, $query);
    if ($result){
        $row = mysqli_fetch_row($result);
    }
    ?>

    <main id="container">
        <form action="update.php" method ="post">
            <strong> id: </strong><br/>
            <input name="id" type="text" value="<?php echo $id;?>" readonly> <br/><br/>
            <strong> branch: </strong><br/>
            <input name="branch" type="text" size="50" maxlenght="25" value="<?php echo $row[0];?>"> <br/><br/>
            <strong> year: </strong><br/>
            <input name="year" type="text" size="50" maxlenght="25" value="<?php echo $row[1];?>"> <br/><br/>
            <strong> total: </strong><br/>
            <input name="total" type="text" size="50" maxlenght="25" value="<?php echo $row[2];?>"> <br/><br/>
            <strong> male: </strong><br/>
            <input name="male" type="text" size="50" maxlenght="25" value="<?php echo $row[3];?>"> <br/><br/>
            <strong> female: </strong><br/>
            <input name="female" type="text" size="50" maxlenght="25" value="<?php echo $row[4];?>"> <br/><br/>
            <input type="submit" name="btnSubmit" value ="Save">
        </form>
        <button onclick="back(); function back(){window.location.href='DataPageAdmin.php'}">Cancel</button>
    </main>
</body>
</html>   