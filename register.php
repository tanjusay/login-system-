<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// Handle registration form submission
if (isset($_POST['username']) && isset($_POST['password'])) {
	$username = $_POST['username'];
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

	$stmt = mysqli_prepare($conn, "INSERT INTO users (username, password) VALUES (?, ?)");
	mysqli_stmt_bind_param($stmt, "ss", $username, $password);

	if (mysqli_stmt_execute($stmt)) {
		echo "Registration successful";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
?>
