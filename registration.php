<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration";

//table name: userr

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$query = "SELECT * from userr where email='" . $_POST['email'] . "';";
$resultA = $conn->query($query);

if (mysqli_num_rows($resultA) > 0) {
    //redirect to login/reg page with error since row already exists in database
    $_SESSION["duplicateRegErr"] = "Email already exists."; 
    header('Location: newHomePage.php');

    
} else {
    $rpasswordForEncrypt = $_POST["password"];
    $rencryptedPassword = md5($rpasswordForEncrypt);
    
    $sql = "INSERT INTO userr (name, email, password)
VALUES ('" . $_POST["name"] . "', '" . $_POST["email"] . "', '" . $rencryptedPassword . "')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION["regSuccessful"] = "Successful registration.";
        header('Location: newHomePage.php');
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
