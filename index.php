<!DOCTYPE html>
<html>
<head>
	<title>DSS SYSTEM KABUPATEN LANDAK</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
    <script
            src="//code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
				
				
		    </ul>
		    <ul class="nav navbar-right">
       			<li><a class="nav-link" href="index.php?page=login"><span class="glyphicon glyphicon-log-in"></span> ADMIN</a></li>
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
			case 'login':
				include "login.php";
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