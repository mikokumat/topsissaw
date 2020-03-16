<?php 

require 'function.php';


if (isset($_POST["register"])) {
	

	if (registrasi($_POST) > 0) {
		echo "<script>
				alert('user baru ditambahkan!');
				</script>";
	}else{
		echo mysqli_error($conn);
	}
}


 ?>


<!DOCTYPE html>
<html>
<head>
	<style>
		label {
			display: block;;
		}
	</style>
	<title>REGISTRASI</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

	
	<form action="" method="post">

			<ul class="list-group">
				<li class="list-group-item">
					<label for="username">username :</label>
					<input type="text" name="username" id="username">
				</li>
				<li class="list-group-item">
					<label for="password">password :</label>
					<input type="password" name="password" id="password">				
				</li>
				<li class="list-group-item">
					<label for="password2">konfirmasi password :</label>
					<input type="password" name="password2" id="password2">
				</li>
				<li class="list-group-item">
					<button type="submit" name="register">Register</button>
				</li>

			</ul>


	</form>

</body>
</html>