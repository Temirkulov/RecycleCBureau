<?php
session_start();
// Check if the user is logged in
// if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
//     // Redirect the user to the login page
//     header('Location: FE_login.php');
// }
?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="aboutus.css">
</head>
<body>
<header>
<h2 class="logo">Logo</h2>
        <a href="FE_main.php"></a>
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

			<a href="FE_login.php">Login</a>
			<a href="FE_register.php">Register</a>
                <?php
                // Check if the user is logged in

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    // Redirect the user to the login page
	echo '<button onclick=window.location.href="FE_sdg.php" class="btn">SDG 12</button>';}
	else {
		echo '<button onclick=window.location.href="FE_Profile.php" class="btn">Profile</button>';}?>
</nav>
</header>	
<section class="about">
	<div class="main">
		<div class="about-text">
			<h1>Recycling and Conservation Bureau</h1>
			<p>This is the main page body side of our website.
			Here we will use more designing features and implement some css functions to make the website more interactive.

			We plan to promote the SDG on this main page because we can create creative artwork and implement it here to add incentive for recycling purposes.

			We will add pictures to make it more interactive and nicer to look at.

			We will add more functionality when the core objectives will be achieved which is to allow members to view,request recycling centre collection and 
			admins to view, edit and delete records from users.

			moreover, we plan to achieve the encryption of data to ensure safety of private data in accordance with the Personal Data Protection Act of 2010 of Malaysia.</p>
			<button onclick='window.location.href="FE_Login.php"' type="button">Login</button>

		</div>
	</div>
</section>

</body>
</html>