<html>
<head>
	<title> Form Entry Data </title>
    <link rel="stylesheet" type="text/css" href="../css/datasCRUD.css"/>

</head>
<body>
<main id="container">
    <form action="insert.php" method = "post">
        <strong> Branch: </strong>
            <input name="branch" type="text" size="20" maxlenght="8"> <br/><br/>
        <strong> Year: </strong>
            <input name="year" type="text" size="30" maxlenght="25"> <br/><br/>
        <strong> Total: </strong>
            <input name="total" type="text" size="30" maxlenght="25"> <br/><br/>
        <strong> Male: </strong>
            <input name="male" type="text" size="30" maxlenght="25"> <br/><br/>
        <strong> Female: </strong>
            <input name="female" type="text" size="30" maxlenght="25"> <br/><br/>

        <input type="submit" name="btnSubmit" value ="Save">
    </form>
    <button onclick="back(); function back(){window.location.href='DataPageAdmin.php'}">Cancel</button>
</main>
</body>
</html>   