<?php
session_start();
//define variables from register.php
$username= (!empty($_POST["username"]))?$_POST["username"]:"";
$centerid= (!empty($_POST["centerid"]))?$_POST["centerid"]:"";
$street= (!empty($_POST["street"]))?$_POST["street"]:"";
$city= (!empty($_POST["city"]))?$_POST["city"]:"";
$doc =  (!empty($_POST["doc"]))?$_POST["doc"]:"";
$notes = (!empty($_POST["notes"]))?$_POST["notes"]:"";
$user_id = $_SESSION['id'];

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

$query = "SELECT * FROM recycling_centre WHERE id = '$centerid'";
$result = mysqli_query($conn, $query);

//check if query returned any rows
if (mysqli_num_rows($result) == 0) {
    //username is taken, show error message
    echo "Centre Does not exist.";
    header('Location: FE_request.php?request=failure');
    exit();

} else {
    $sql = "INSERT INTO request (user_id, username, centre_id, street, city, doc, 
    notes) VALUES
    ('$user_id','$username','$centerid','$street','$city','$doc',
    '$notes');";
    echo $sql;

    if (mysqli_query($conn, $sql)) {
    echo "New Request created successfully";
   } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }
   
}



// Close connection
mysqli_close($conn);

header('Location: FE_request.php?request=success');
exit();
?>