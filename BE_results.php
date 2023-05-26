<?php
// Check if the user is logged in
// if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
//     // Redirect the user to the login page
//     header('Location: FE_login.php');}

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "WebsiteDB";
    // Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
 die("Connection failed: " . mysqli_connect_error());
}

$category = $_POST["category"];
$search = $_POST["search"];

$sql = "SELECT * FROM recycling_centre where '$category'='$search'";
$result = mysqli_query($conn, $sql);
?>