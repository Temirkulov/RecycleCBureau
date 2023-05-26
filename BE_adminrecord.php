<?php
//set-up
$servername = "localhost";
$user_name = "root";
$pass_word = "";
$dbname = "WebsiteDB";
// Create connection
$conn = mysqli_connect($servername, $user_name, $pass_word, $dbname);
// Check connection
if (!$conn) {
 die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM user_detail WHERE username = '$username'";
$result = mysqli_query($conn, $query);

$street =  (!empty($_POST["street"]))?$_POST["street"]:"";
$city =  (!empty($_POST["city"]))?$_POST["city"]:"";
$notes =  (!empty($_POST["notes"]))?$_POST["notes"]:"";

$sql = "INSERT INTO recycling_centre (street, city, notes) VALUES
('$street','$city','$notes');";
echo $sql;

if (mysqli_query($conn, $sql)) {
echo "New Recycling Centre created successfully";
header('Location:FE_adminrecord.php?record=created');
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}




// Close the connection

?>