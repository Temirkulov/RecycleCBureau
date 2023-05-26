<!DOCTYPE html>
<html>
<head> 
	<title>About Us</title>
	<link rel="stylesheet" type="text/css" href="new.css">
</head>
<body>
<header>
    <h2 class="logo">Logo</h2>
	<nav class="navigation">
				<a href="main.php">Home</a>
				<a href="aboutus.php">About Us</a>
				<a href="locations.php">Locations</a>
				<a href="request.php">Request</a>
				<a <form id="search" action="#" method="get">
				<input type="text" name="search" placeholder="Search..."></a>
				<button type="submit" class="btn" >Search</button>
				</form>
				<a href="login.php">Login</a>
				<a href="register.php">Register</a>
				<button class="btn">Menu</button>
	</nav>
</header>	
    <main>
	<div class="wrapper1"> 
	<div class="form-box register">
			<h2>Registration</h2>
			<form method="post" action="registration.php" method="POST">
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
					<input type="date" id="dob" name="dob" min="<?php echo date('Y-m-d'); ?>" required>
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
						<div class="login-register">
							<p>Already have an account? 
							<a href ="login.php" class="register-link">Login</a></p> 
				</form>
			</div>
		</div>
	</div>
	</main>
    </html>