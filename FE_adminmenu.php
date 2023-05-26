<?php
session_start();
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    // Redirect the user to the login page
    header('Location: FE_login.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
<header>
<h2 class="logo">Logo</h2>
        <a href="FE_main.php;"></a>
		<nav class="navigation">
			<a href="FE_adminrequests.php">Requests</a>
			<a href="FE_adminusers.php">User Details</a>
			<a href="FE_adminlocations.php">Locations</a>
			<a href="FE_adminrecord.php">Add Record</a>
			<div class="search">
			    <form action="FE_locations.php" method="get">
				<input type="text" name="search" placeholder="Search...">
				<button type="submit">Search</button>
			    </form>
			</div>
<?php
			if (isset($_SESSION['logged_in']) || $_SESSION['logged_in']) {
				echo '<a href="FE_Profile.php">User mode</a>';
				echo '<a href="FE_adminmenu.php">Profile</a>';}?>
            <?php                
			// Check if the user is logged in
		if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
            // Unlocks Log Out button if user is logged in
        echo '<button class="btn">User Mode</button>';}
		else if(isset($_SESSION['logged_in']) || $_SESSION['logged_in']) {
			echo '<button class="btn">Log Out</button>';
		}?>
	</nav>
</header>
<main>
<section class="about">
	<div class="main">
   <div class="about-text">
			<h1>Admin Profile:</h1>
			<p>		
				<?php
					    $user_id = $_SESSION['id'];
						$conn = mysqli_connect('localhost', 'root', '', 'WebsiteDB');
						$sql = "SELECT * FROM user_detail WHERE id = '$user_id'";
						$result = mysqli_query($conn, $sql);
						$user = mysqli_fetch_assoc($result);
                    echo '<h2 style="color:azure"> Username: ' . $_SESSION['username'] . "</h2><br><br>";
                    echo '<h2 style="color:azure"> User ID: ' . $_SESSION['id'] . "</h2><br><br>";
                    echo '<h2 style="color:azure"> User Type: ' . $_SESSION['user_type'] . "</h2><br><br>";
                    echo '<h2 style="color:azure"> Address: ' . $_SESSION['street'] . ", ". $_SESSION['city'] . "</h2><br><br>";
                    echo '<h2 style="color:azure"> Date of Birth: ' . $_SESSION['dob'] . "</h2><br><br>";
                    echo '<h2 style="color:azure"> Additional Notes: ' . $_SESSION['notes'] . "</h2><br><br>";

                ?>
			</p>
			<button onclick='window.location.href="BE_logout.php"' class="btn">Log Out</button>';
		</div>
	</div>
   </section>
</main>
</body>

</html>