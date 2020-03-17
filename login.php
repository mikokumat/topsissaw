<?php 
session_start();
require 'halaman/function.php';
if (isset($_POST['login'])) {
	$username = $_POST["username"];
	$password = $_POST["password"];

	mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
	if (mysqli_num_rows($result) === 1) {
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password"])) {
			$_SESSION["login"] = true;
		 	header("Location: index.php");
		 	exit;
		 } 
	}

	$error = true;
}



?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>
<?php if (isset($error)) :?>
	<p>username/password salah</p>
<?php endif; ?>



	<form>
		<ul>
			<li>
				<label for="username">Username :</label>
				<input type="text" name="username" id="username">
			</li>
			<li>
				<label for="password">Password :</label>
				<input type="password" name="password" id="password">
			</li>
			<li>
				<button type="submit" name="login">Login</button>
			</li>
		</ul>

	</form>

</body>
</html>