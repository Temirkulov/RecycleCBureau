<?php
session_start();

?>

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
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="new.css">
</head>
<body>
<header>
    <h2 class="logo">Logo</h2>
	<a href="FE_main.php;"></a>
	<nav class="navigation">
				<a href="FE_main.php">Home</a>
				<a href="FE_aboutus.php">About Us</a>
				<a href="FE_locations.php">Locations</a>
				<a href="FE_request.php">Request</a>
				<a <form id="search" action="#" method="get">
				<input type="text" name="search" placeholder="Search..."></a>
				<button type="submit" class="btn" >Search</button>
				</form>
				<a href="FE_login.php">Login</a>
				<a href="FE_register.php">Register</a>
                <?php
        if (isset($_SESSION['logged_in']) || $_SESSION['logged_in']) {
            // Opens Profile page is user is logged in
        echo '<button class="btn">Profile</button>';}?>
	</nav>
</header>	
<section class="about">
	<div class="main">
   <div class="about-text">
    <p>
        
    </p>
   </div>
    </div>
</section>
</body>
    </html>