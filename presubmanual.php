<?php 
$conn = mysqli_connect("localhost","root","","romi");
$result = mysqli_query($conn, "SELECT namasub FROM submanual_utama WHERE type = 'KB'");

	$query = "SELECT type FROM submanual_utama WHERE type = 'KB';";
	    $typeKB = mysqli_query($conn, $query);
	    $typecountKB = mysqli_num_rows($typeKB);
	$query = "SELECT type FROM submanual_utama WHERE type = 'KPAM';";
	    $typeKPAM = mysqli_query($conn, $query);
	    $typecountKPAM = mysqli_num_rows($typeKPAM);
	$query = "SELECT type FROM submanual_utama WHERE type = 'KJL';";
	    $typeKJL = mysqli_query($conn, $query);
	    $typecountKJL= mysqli_num_rows($typeKJL);
	$query = "SELECT type FROM submanual_utama WHERE type = 'KDL';";
	    $typeKDL = mysqli_query($conn, $query);
	    $typecountKDL = mysqli_num_rows($typeKDL);
	$query = "SELECT type FROM submanual_utama WHERE type = 'KPL';";
	    $typeKPL = mysqli_query($conn, $query);
	    $typecountKPL = mysqli_num_rows($typeKPL);
	$query = "SELECT type FROM submanual_utama WHERE type = 'KPS';";
	    $typeKPS = mysqli_query($conn, $query);
	    $typecountKPS = mysqli_num_rows($typeKPS);
	$query = "SELECT type FROM submanual_utama WHERE type = 'KPK';";
	    $typeKPK = mysqli_query($conn, $query);
	    $typecountKPK = mysqli_num_rows($typeKPK);                        
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>presubmanual input</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/4.4.1/jquery.min.js"></script>  
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>

<body>

<div class="content">
<header>
	<h1 class="judul">SLUM AREA RANKING</h1>
	<h3 class="deskripsi">WILAYAH KABUPATEN LANDAK</h3>
</header>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark"> 			    
  	<a class="navbar-brand" href="index.php?page=home">DSS SLUM</a>
	    	
    <ul class="navbar-nav">
      	<li class="nav-item"><a class="nav-link" href="index.php?page=tentang">INFO</a></li>
		<li class="nav-item"><a class="nav-link" href="index.php?page=tutorial">DSS SYSTEM</a></li>
		<li class="nav-item"><a class="nav-link" href="index.php?page=manual">DSS SYSTEM MANUAL</a></li>
		<li class="nav-item"><a class="nav-link" href="index.php?page=registrasi">REGIS</a></li>
    </ul>
    <ul class="nav navbar-right">
			<li><a class="nav-link" href ="#"><i class="fas fa-sign-in-alt"></i> Login</a></li>
	</ul>	  	
</nav>



<form>
<h5>Kondisi Bangunan</h5>

<?php 
	if(isset($_GET['jumlahdata'])):
 	for($j=0;$j<$_GET['jumlahdata'];$j++){
 ?>
<div class="form-row" >
	<?php for($i=0;$i<($typecountKB);$i++){
 	?>      
    <div class ="">
          
      <input type="text" class="form-control" id="" placeholder="" name="">
    </div>
	<?php } ?>
</div>
<?php } endif; ?>



<h5>Kondisi Penyediaan Air Minum</h5>
<?php 
	if(isset($_GET['jumlahdata'])):
 	for($j=0;$j<$_GET['jumlahdata'];$j++){
 ?>
<div class="form-row" >
	<?php for($i=0;$i<($typecountKPAM);$i++){
 	?>      
    <div class ="">      
      <input type="text" class="form-control" id="" placeholder="" name="">
    </div>
	<?php } ?>
</div>
<?php } endif; ?>




<h5>Kondisi jlan lingkungan</h5>
<?php 
	if(isset($_GET['jumlahdata'])):
 	for($j=0;$j<$_GET['jumlahdata'];$j++){
 ?>
<div class="form-row" >
	<?php for($i=0;$i<($typecountKJL);$i++){
 	?>      
    <div class ="">      
      <input type="text" class="form-control" id="" placeholder="" name="">
    </div>
	<?php } ?>
</div>
<?php } endif; ?>




<h5>Kondisi Drainase</h5>
<?php 
	if(isset($_GET['jumlahdata'])):
 	for($j=0;$j<$_GET['jumlahdata'];$j++){
 ?>
<div class="form-row" >
	<?php for($i=0;$i<($typecountKDL);$i++){
 	?>      
    <div class ="">      
      <input type="text" class="form-control" id="" placeholder="" name="">
    </div>
	<?php } ?>
</div>
<?php } endif; ?>




<h5>Kondisi Pengelolaan Limbah</h5>
<?php 
	if(isset($_GET['jumlahdata'])):
 	for($j=0;$j<$_GET['jumlahdata'];$j++){
 ?>
<div class="form-row" >
	<?php for($i=0;$i<($typecountKPL);$i++){
 	?>      
    <div class ="">      
      <input type="text" class="form-control" id="" placeholder="" name="">
    </div>
	<?php } ?>
</div>
<?php } endif; ?>



<h5>Kondisi Pengelolaan Sampah</h5>
<?php 
	if(isset($_GET['jumlahdata'])):
 	for($j=0;$j<$_GET['jumlahdata'];$j++){
 ?>
<div class="form-row" >
	<?php for($i=0;$i<($typecountKPS);$i++){
 	?>      
    <div class ="">      
      <input type="text" class="form-control" id="" placeholder="" name="">
    </div>
	<?php } ?>
</div>
<?php } endif; ?>



<h5>Kondisi Proteksi Kebakaran</h5>
<?php 
	if(isset($_GET['jumlahdata'])):
 	for($j=0;$j<$_GET['jumlahdata'];$j++){
 ?>
<div class="form-row" >
	<?php for($i=0;$i<($typecountKPK);$i++){
 	?>      
    <div class ="">      
      <input type="text" class="form-control" id="" placeholder="" name="">
    </div>
	<?php } ?>
</div>
<?php } endif; ?>


<div class="form-row" >
	   
    <div class ="">      
      <button>tambah</button>
    </div>
	
</div>
</form>


</div>

</body>
</html>