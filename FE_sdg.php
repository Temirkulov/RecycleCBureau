<?php
session_start();
// Check if the user is logged in
//if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) 
    // Redirect the user to the login page
  //  header('Location: FE_login.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>About Us</title>
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

			<a href="FE_login.php">Login</a>
			<a href="FE_register.php">Register</a>

            <?php                
			// Check if the user is logged in

if (isset($_SESSION['logged_in']) || $_SESSION['logged_in']) {
    // Redirect the user to the login page
    echo '<button onclick=window.location.href="FE_Profile.php" class="btn">Profile</button>';}?>
	</nav>
</header>
<section class="about">
	<div class="main">
		<div class="about-text">
			<h1>Ensure sustainable consumption and production patterns</h1>
			<p>Which is key to sustain the livelihoods of current and future generations. Unsustainable patterns of consumption and production are root causes of the triple planetary crises of climate change, biodiversity loss and pollution.</p>
			<button onclick='window.location.href="FE_login.php"'type="button">Login</button>
			<button onclick='window.location.href="FE_register.php"' type="button">Register</button>

		</div>
	</div>
</section>


</body>
</html>