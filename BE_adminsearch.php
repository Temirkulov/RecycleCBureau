<?php
//define variables from register.php
$username= (!empty($_POST["username"]))?$_POST["username"]:"";
$password= (!empty($_POST["password"]))?$_POST["password"]:"";
$street= (!empty($_POST["street"]))?$_POST["street"]:"";
$city= (!empty($_POST["city"]))?$_POST["city"]:"";
$dob =  (!empty($_POST["dob"]))?$_POST["dob"]:"";
$notes = (!empty($_POST["notes"]))?$_POST["notes"]:"";

$password=md5($password);


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

//check if query returned any rows
if (mysqli_num_rows($result) > 0) {
    //username is taken, show error message
    echo "Username is already taken.";
    header('Location: FE_register.php?registration=failure');
    exit();

} else {
    $sql = "INSERT INTO user_detail (username, password, street, city, dob, 
    notes) VALUES
    ('$username','$password','$street','$city','$dob',
    '$notes');";
    echo $sql;

    if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
   } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }
   
}



// Close connection
mysqli_close($conn);

header('Location: FE_login.php?registration=success');
exit();
?>
