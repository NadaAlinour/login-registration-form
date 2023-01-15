<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



?>

<html>

<head>
    <title>
        Welcome Page
    </title>

    <script src="validator.js"></script>
    <link rel="stylesheet" href="stylesheet1.css">


</head>

<body>

    <?php    
    echo "<span id='username' style='color:#225250; font-size:3em;' >Welcome " . $_SESSION["username"] . "</span>";
    ?>

</body>

</html>

