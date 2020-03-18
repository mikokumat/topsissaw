<?php 
session_start();
require 'halaman/function.php';
if (isset($_POST['login'])) {
	$username = $_POST["username"];
	$password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
	if (mysqli_num_rows($result) === 1) {
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password"])) {
			$_SESSION["login"] = true;
		 	header("Location: admin.php");
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
	<form method="POST" action="">
		<ul>

			<div class="form-group">
		      <label class="col-sm-1 control-label">Username</label>
		      <div class="col-sm-2">
		        <input class="form-control" id="focusedInput" type="text" value="Click to focus...">
		      </div>
		    </div>


			<li>
				<label for="username">Username :</label>
				<input type="text" name="username" id="username">
			</li>
			<li>
				<label for="password">Password :</label>
				<input type="password" name="password" id="password">
			</li>
			<li>
				<button type="submit" name="login" value="login">Login</button>
			</li>
		</ul>

	</form>

</body>
</html>