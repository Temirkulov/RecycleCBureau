<?php
session_start();

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

// Check if the search form has been submitted
// Check if the search form has been submitted
if (isset($_GET['search'])) {
    // Sanitize the search query to prevent SQL injection
    $search = mysqli_real_escape_string($conn, $_GET['search']);

    // Build the search query
    $sql = "SELECT * FROM user_detail WHERE username LIKE '%$search%' OR street LIKE '%$search%' OR city LIKE '%$search%' OR dob LIKE '%$search%' OR notes LIKE '%$search%' OR user_type LIKE '%$search%';";
} else {
    // Build the default query
    $sql = "SELECT * FROM user_detail;";
}
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Record</title>
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
			    <form action="BE_adminusers.php" method="get">
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
            // Opens Profile page if user is logged in
        echo '<button class="btn">User Mode</button>';}
		else if(isset($_SESSION['logged_in']) || $_SESSION['logged_in']) {
			echo '<button class="btn">Log Out</button>';
		}
		?>
	</nav>
</header>
<main>
	<div class="wrapper1"> 
	<div class="form-box register">
			<h2>Add Recycling Centre</h2>
			<form method="post" action="BE_adminrecord.php" method="POST">
					<div class="input-box">
					<input type="text" id="street" name="street" required>
					<label>Street</label>
				  </div>
				  <div class="input-box">
					<input type="text" id="city" name="city" required>
					<label>City</label>
				  </div>
				  <div class="input-box">
					<input type="text" id="notes" name="notes" >
					<label>Notes</label>
				  </div>
                  <?php
if (isset($_GET['record']) && $_GET['record'] == 'created') {
    echo '<div class="alert alert-created">Registration Successful! Please Log in.</div>';
}
?>

						<input type="submit" value="Submit" class="btn">
						
						<div class="login-register">
						
				</form>
			</div>
		</div>
	</div>
	</main>
</body>
</html>

<?php
mysqli_close($conn);
?>