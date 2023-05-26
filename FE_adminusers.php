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
    <title>Locations</title>
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
<section class="about">
	<div class="main">
		
    <p>
        <?php
        if (mysqli_num_rows($result) > 0) {
            echo '<table style="width: 100%; border-collapse: collapse; margin-top: 20px;">';
            echo '<thead><tr style="border-bottom: 1px solid white;color: white;"><th>ID</th><th>username</th><th>street</th><th>city</th><th>dob</th><th>notes</th><th>user_type</th></tr></thead>';
            echo '<tbody>';

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr style="border-bottom: 1px solid white; height: 50px;color: white;">';
                echo '<td style="border-right: 1px solid white; height: 50px;color: white;">' . $row["id"] . '</td>';
                echo '<td style="border-right: 1px solid white; height: 50px;color: white;">' . $row["username"] . '</td>';
                echo '<td style="border-right: 1px solid white; height: 50px;color: white;">' . $row["street"] . '</td>';
                echo '<td style="border-right: 1px solid white; height: 50px;color: white;">' . $row["city"] . '</td>';
                echo '<td style="border-right: 1px solid white; height: 50px;color: white;">' . $row["dob"] . '</td>';
                echo '<td style="border-right: 1px solid white; height: 50px;color: white;">' . $row["notes"] . '</td>';
                echo '<td style="border-right: 1px solid white; height: 50px;color: white;">' . $row["user_type"] . '</td>';
                echo '<td style="border-right: 1px solid white; height: 50px;color: white;">' . '<a href="BE_user.delete.php?id=' . $row["id"] . '">Delete</a>' . '</td>';
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