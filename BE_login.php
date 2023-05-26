<?php
session_start();

//Database variables
$servername = "localhost";
$user_name = "root";
$pass_word = "";
$dbname = "WebsiteDB";

//Create Connection
$conn = mysqli_connect($servername, $user_name, $pass_word, $dbname);

//Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
   }

   
//sanitized input to avoid illegal characters
$username =  mysqli_real_escape_string($conn, $_POST["username"]);
$password =  mysqli_real_escape_string($conn, $_POST["password"]);

$password = md5($password);

   // Match Database

$sql_user = "SELECT * FROM user_detail WHERE username = '$username'";
$result_user = mysqli_query($conn, $sql_user);

$sql_pass =  "SELECT * FROM user_detail WHERE username = '$username' AND password = '$password'";
$result_pass = mysqli_query($conn, $sql_pass);

$row = mysqli_fetch_assoc($result_user);


//Close connection
mysqli_close($conn);
//Processing and Validation
if(mysqli_num_rows($result_user)== 1) {
    //correct username
    if (mysqli_num_rows($result_pass)== 1) {
        // correct password
        //echo "correct pass";
        
        // Set the session credentials and flag to indicate that the user is logged in
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['username']; 
        $_SESSION['user_type'] = $row['user_type'];  
        $_SESSION['street']= $row['street'];
        $_SESSION['city']= $row['city'];
        $_SESSION['dob']= $row['dob'];
        $_SESSION['notes']= $row['notes'];
        $_SESSION['logged_in'] = true;
        if ($row['user_type'] == 'Admin') {
            // user is an admin
            header('Location: FE_adminmenu.php');
            exit();
        } else {
            header('Location: FE_profile.php');
        exit();
        }
    } else {
        //incorrect password
        //echo "incorrect pass";
        header('Location: FE_login.php?login=wrongpassword');
        exit();
    }

} else {
    //incorrect username
    //echo "incorrect user";

    header('Location: FE_login.php?login=wrongusername');
    exit();
}
?>