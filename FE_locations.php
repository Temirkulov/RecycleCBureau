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
if (isset($_GET['search'])) {
    // Sanitize the search query to prevent SQL injection
    $search = mysqli_real_escape_string($conn, $_GET['search']);

    // Build the search query
    $sql = "SELECT * FROM recycling_centre WHERE street LIKE '%$search%' OR city LIKE '%$search%' OR notes LIKE '%$search%';";
} else {
    // Build the default query
    $sql = "SELECT * FROM recycling_centre;";
}

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Locations</title>
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
			if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
				// Redirect the user to the login page
				echo '<button onclick=window.location.href="FE_sdg.php" class="btn">SDG 12</button>';}
				else {
					echo '<button onclick=window.location.href="FE_Profile.php" class="btn">Profile</button>';}?>
					</nav>
    </header>
<section class="about">
	<div class="main">
		
    <p>
        <?php
        if (mysqli_num_rows($result) > 0) {
            echo '<table style="width: 100%; border-collapse: collapse; margin-top: 20px;">';
            echo '<thead><tr style="border-bottom: 1px solid white;color: white;"><th>ID</th><th>Street</th><th>City</th><th>Notes</th></tr></thead>';
            echo '<tbody>';

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr style="border-bottom: 1px solid white; height: 50px;color: white;">';
                echo '<td style="border-right: 1px solid white; height: 50px;color: white;">' . $row["id"] . '</td>';
                echo '<td style="border-right: 1px solid white; height: 50px;color: white;">' . $row["street"] . '</td>';
                echo '<td style="border-right: 1px solid white; height: 50px;color: white;">' . $row["city"] . '</td>';
                echo '<td>' . $row["notes"] . '</td>';
                echo '</tr>';
            }

            echo '</tbody></table>';

        } else {
            echo '<p style="color:white;">0 Results.<p>';
        }
        ?>
    </p>
	</div>
</section>
</body>
</html>

<?php
// Close the connection
mysqli_close($conn);
?>