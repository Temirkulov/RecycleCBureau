<?php
session_start();
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    // Redirect the user to the login page
    header('Location: FE_login.php');
}

?>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="aboutus.css">
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
			<div class="search">
			    <form action="FE_locations.php" method="get">
				<input type="text" name="search" placeholder="Search...">
				<button type="submit">Search</button>
			    </form>
			</div>
            <?php
            if(isset($_SESSION['user_type'])=='Admin') {
                echo '<a href="FE_adminmenu.php">Admin Menu</a>';
                echo '<a href="FE_sdg.php">SDG 12</a>';
            } else {
			echo '<a href="FE_login.php">Login</a>';
			echo '<a href="FE_register.php">Register</a>'; }?>
                <?php
                // Check if the user is logged in
                if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
                    // Redirect the user to the login page
                    echo '<button onclick=window.location.href="FE_Profile.php" class="btn">Profile</button>';}
                    else {
                        echo '<button onclick=window.location.href="BE_logout.php" class="btn">Log Out</button>';}?>
                
	</nav>
</header>	
   <section class="about">
	<div class="main">
   <div class="about-text">
   <h1><?php echo $_SESSION['username'];?>'s Profile</h1>
    <?php 		// Check if user is logged in

    $user_id = $_SESSION['id'];
    $conn = mysqli_connect('localhost', 'root', '', 'WebsiteDB');
    $sql = "SELECT * FROM user_detail WHERE id = '$user_id'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    ?>

			<p>
                <?php

                    echo '<h2 style="color:azure"> Username: ' . $_SESSION['username'] . "</h2><br><br>";
                    echo '<h2 style="color:azure"> User ID: ' . $_SESSION['id'] . "</h2><br><br>";
                    echo '<h2 style="color:azure"> User Type: ' . $_SESSION['user_type'] . "</h2><br><br>";
                    echo '<h2 style="color:azure"> Address: ' . $_SESSION['street'] . ", ". $_SESSION['city'] . "</h2><br><br>";
                    echo '<h2 style="color:azure"> Date of Birth: ' . $_SESSION['dob'] . "</h2><br><br>";
                    echo '<h2 style="color:azure"> Additional Notes: ' . $_SESSION['notes'] . "</h2><br><br>";

                ?>
            </p>
			<button onclick='window.location.href="BE_logout.php"' class="btn">Log Out</button>
		</div>
	</div>
   <h2 style="color:azure"></h2>
</body>
</html>