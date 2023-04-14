<?php
// Start session
session_start();

// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// Handle login form submission
if (isset($_POST['username']) && isset($_POST['password'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM users WHERE username='$username'";

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

	if (password_verify($password, $row['password'])) {
		// Authentication successful, set session variables and redirect to welcome page
		$_SESSION['username'] = $username;
		header("Location: welcome.php");
		exit;
	} else {
		// Authentication failed, display error message
		echo "Incorrect username or password";
	}
}

mysqli_close($conn);
?>
