<!DOCTYPE html>
<html>
<head>
	<title>DSS SYSTEM KABUPATEN LANDAK</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">	
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="jquery.js"></script>
</head>
<body>
<div class="content">
	<header>
		<h1 class="judul">SLUM AREA RANKING</h1>
		
	</header>

	<nav class="navbar navbar-expand-sm bg-dark navbar-dark"> 	
		    
		      <a class="navbar-brand" href="index.php?page=tutorial">DSS SLUM</a>
		    	
		    <ul class="navbar-nav">
		      				
				<li class="nav-item"><a class="nav-link" href="index.php?page=manual">DSS SYSTEM MANUAL</a></li>
				
				<li class="nav-item"><a class="nav-link" href="index.php?page=admin">ADMIN</a></li>	
		    </ul>

		    	
	</nav>

 	<div class="badan"> 
	<?php 
	if(isset($_GET['page'])){
		$page = $_GET['page'];
 
		switch ($page) {
			
			case 'tutorial':
				include "halaman/tutorial.php";
				break;
			case 'manual':
				include "halaman/manual.php";
				break;
			case 'registrasi':
				include "halaman/registrasi.php";
				break;
			case 'admin':
				include "halaman/admin.php";
				break;						
			default:
				echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
				break;
		}
	}else{
		include "halaman/tutorial.php";
	}
 
	 ?>
 
	</div>

</div>
</body>
</html>