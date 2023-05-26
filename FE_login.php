<?php
session_start();
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
			<button onclick='window.location.href="FE_sdg.php"' class="btn">SDG 12</button>

		</nav>
</header>	
   <main>
	<div class="wrapper"> 
		<div class="form-box login">
			<h2>Login</h2>
			<?php
if (isset($_GET['login']) && $_GET['login'] == 'logout') {
    echo '<div class="alert alert-logout"><b>Successfully logged off!</b></div>';
}?>
			<form method="post" action="BE_login.php">
				  <div class="input-box">
					<input type="text" id="username" name="username" required>
					<label>username</label>
				  </div>
				  <div class="input-box">
					<input type="password" id="password" name="password" required>
					<label>Password</label>
				  </div>
				  <div class="remember-forgot">
						<label><input type="checkbox">
						Remember me</label>
						<a href="#">Forgot Password?</a>
						</div>
						<button type="submit" class="btn">Login</button>
						<?php
if (isset($_GET['login']) && $_GET['login'] == 'wrongusername') {
    echo '<div class="alert alert-wrongusername">User does not Exist.</div>';
}
if (isset($_GET['login']) && $_GET['login'] == 'wrongpassword') {
    echo '<div class="alert alert-wrongpassword">Wrong Password.</div>';
}
?>
<?php
if (isset($_GET['registration']) && $_GET['registration'] == 'success') {
    echo '<div class="alert alert-success">Registration Successful! Please Log in.</div>';
}
?>
						<div class="login-register">
							<p>Dont' have an account? 
							<a href ="FE_register.php" class="register-link">Register</a></p> 
				</form>
				
			</div>
		</div>
    </main>
</html>
	