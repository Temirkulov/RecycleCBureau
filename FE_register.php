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
			<button onclick='window.location.href="FE_sdg.php"' class="btn">SDG 12</button>
	</nav>
</header>	
    <main>
	<div class="wrapper1"> 
	<div class="form-box register">
			<h2>Registration</h2>
			<form method="post" action="BE_register.php" method="POST">
					<div class="input-box">
					<input type="text" id="username" name="username" minlength="4" maxlength="20"  required>
					<label>Username</label>
				  </div>
				  <div class="input-box">
					<input type="password" id="password" name="password" minlength="6" required>
					<label>Password</label>
				  </div>
				  <div class="input-box">
					<input type="text" id="street" name="street" required>
					<label>Street</label>
				  </div>
				  <div class="input-box">
					<input type="text" id="city" name="city" required>
					<label>City</label>
				  </div>
				  <div class="input-box">
					<input type="date" id="dob" name="dob" max="<?php echo date('Y-m-d'); ?>" required>
					<label>Date of Birth</label>
				  </div>
				  <div class="input-box">
					<textarea id="notes" name="notes"></textarea>
					<label>Additional Notes</label>
				  </div>
				  <div class="remember-forgot">
						<label><input type="checkbox">
						agree to the terms & conditions</label>
						
						</div>
						
						<input type="submit" value="Submit" class="btn">
						<?php
if (isset($_GET['registration']) && $_GET['registration'] == 'failure') {
    echo '<div class="alert alert-failure">Registration Failed! Username Taken.</div>';
}
?>
						<div class="login-register">
						
							<p>Already have an account? 
							<a href ="FE_login.php" class="register-link">Login</a></p> 
				</form>
			</div>
		</div>
	</div>
	</main>
    </html>
