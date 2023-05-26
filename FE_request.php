<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    // Redirect the user to the login page
    header('Location: FE_login.php');
}
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
    echo '<button onclick=window.location.href="FE_Profile.php" class="btn">Profile</button>';}
	else {
		echo '<button onclick=window.location.href="FE_sdg.php" class="btn">SDG 12</button>';}?>

</header>	
<main>
	<div class="wrapper1"> 
	<div class="form-box register">
			<h2>Request Collection</h2>
			<form method="post" action="BE_request.php" method="POST">
					<div class="input-box">
					<input type="text" id="username" name="username"  required>
					<label>Username</label>
				  </div>
				  <div class="input-box">
					<input type="text" id="centerid" name="centerid" minlength="1" required>
					<label>Collection Center</label>
				  </div>
				  <div class="input-box">
					<input type="text" id="street" name="street" >
					<label>Street</label>
				  </div>
				  <div class="input-box">
					<input type="text" id="city" name="city" >
					<label>City</label>
				  </div>
				  <div class="input-box">
					<input type="date" id="doc" name="doc" min="<?php echo date('Y-m-d'); ?>" required>
					<label>Date of Collection</label>
				  </div>
				  <div class="input-box">
					<textarea id="notes" name="notes"></textarea>
					<label>Additional Notes</label>
				  </div>						
						<input type="submit" value="Submit" class="btn">
						<?php
if (isset($_GET['request']) && $_GET['request'] == 'failure') {
    echo '<div class="alert alert-failure">Centre ID does not Exist. Try again. </div>';
}
if (isset($_GET['request']) && $_GET['request'] == 'success') {
    echo '<div class="alert alert-failure">Request created Successfully!</div>';
}

?>
						<div class="login-register">
						
				</form>
			</div>
		</div>
	</div>
	</main>

    </html>