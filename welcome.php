<?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
	header("Location: login.php");
	exit;
}

// Retrieve username from session variable
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<!-- Include your CSS and JavaScript files here -->
</head>
<body>
	<h1>Welcome, <?php echo $username; ?>!</h1>
	<!-- Display other content here -->
</body>
</html>
