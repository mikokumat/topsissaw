<?php  
if (isset($_POST["tambah"])) {
	$conn = mysqli_connect("localhost","root","","romi");
	$idKriteria = $_GET['id_kriteria'];
for($i=0;$i<count($_POST['namasubKB']);$i++){
	$query = "INSERT INTO submanual_utama (namasub,bobotsub,atributsub,id_kriteria,type)
                  VALUES('".$_POST['namasubKB'][$i]."',".$_POST['bobotsubKB'][$i].",'".$_POST['atributsubKB'][$i]."',".$idKriteria.",'KB')";
    mysqli_query($conn, $query);

}
for($i=0;$i<count($_POST['namasubKPAM']);$i++){
	$query = "INSERT INTO submanual_utama (namasub,bobotsub,atributsub,id_kriteria,type)
                  VALUES('{$_POST['namasubKPAM'][$i]}',{$_POST['bobotsubKPAM'][$i]},'{$_POST['atributsubKPAM'][$i]}',$idKriteria,'KPAM')";
    mysqli_query($conn, $query);

}
for($i=0;$i<count($_POST['namasubKJL']);$i++){
	$query = "INSERT INTO submanual_utama (namasub,bobotsub,atributsub,id_kriteria,type)
                  VALUES('{$_POST['namasubKJL'][$i]}',{$_POST['bobotsubKJL'][$i]},'{$_POST['atributsubKJL'][$i]}',$idKriteria,'KJL')";
    mysqli_query($conn, $query);

}
for($i=0;$i<count($_POST['namasubKDL']);$i++){
	$query = "INSERT INTO submanual_utama (namasub,bobotsub,atributsub,id_kriteria,type)
                  VALUES('{$_POST['namasubKDL'][$i]}',{$_POST['bobotsubKDL'][$i]},'{$_POST['atributsubKDL'][$i]}',$idKriteria,'KDL')";
    mysqli_query($conn, $query);

}
for($i=0;$i<count($_POST['namasubKPL']);$i++){
	$query = "INSERT INTO submanual_utama (namasub,bobotsub,atributsub,id_kriteria,type)
                  VALUES('{$_POST['namasubKPL'][$i]}',{$_POST['bobotsubKPL'][$i]},'{$_POST['atributsubKPL'][$i]}',$idKriteria,'KPL')";
    mysqli_query($conn, $query);

}
for($i=0;$i<count($_POST['namasubKPS']);$i++){
	$query = "INSERT INTO submanual_utama (namasub,bobotsub,atributsub,id_kriteria,type)
                  VALUES('{$_POST['namasubKPS'][$i]}',{$_POST['bobotsubKPS'][$i]},'{$_POST['atributsubKPS'][$i]}',$idKriteria,'KPS')";
    mysqli_query($conn, $query);

}
for($i=0;$i<count($_POST['namasubKPK']);$i++){
	$query = "INSERT INTO submanual_utama (namasub,bobotsub,atributsub,id_kriteria,type)
                  VALUES('{$_POST['namasubKPK'][$i]}',{$_POST['bobotsubKPK'][$i]},'{$_POST['atributsubKPK'][$i]}',$idKriteria,'KPK')";
    mysqli_query($conn, $query);

}




}
?>



<!DOCTYPE html>
<html>
<head>
	<title>submanual</title>
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


<h5>Kondisi Bangunan</h5>

<form action="" method="post">
  

  

 <?php if(isset($_GET['jumlahKB'])):
 	for($i=0;$i<$_GET['jumlahKB'];$i++){
 ?>
  <div class="form-row" >      
    <div class ="col">      
      <input type="text" class="form-control" id="namasubKB" placeholder="Nama Sub Aspek" name="namasubKB[]">
    </div>
    <div class ="col">     
      <input type="text" class="form-control" id="bobotsubKB" placeholder="Bobot Sub Aspek" name="bobotsubKB[]">
    </div>
    <div class ="col">      
      <input type="text" class="form-control" id="atributsubKB" placeholder="Atribut Sub Aspek" name="atributsubKB[]">
    </div>     
  </div>
<?php } endif;?>

<h5>Kondisi Penyediaan Air Minum</h5>

 <?php if(isset($_GET['jumlahKPAM'])):
 	for($i=0;$i<$_GET['jumlahKPAM'];$i++){
 ?>
  <div class="form-row" >      
    <div class ="col">      
      <input type="text" class="form-control" id="namasubKPAM" placeholder="Nama Sub Aspek" name="namasubKPAM[]">
    </div>
    <div class ="col">     
      <input type="text" class="form-control" id="bobotsubKPAM" placeholder="Bobot Sub Aspek" name="bobotsubKPAM[]">
    </div>
    <div class ="col">      
      <input type="text" class="form-control" id="atributsubKPAM" placeholder="Atribut Sub Aspek" name="atributsubKPAM[]">
    </div>     
  </div>
<?php } endif;?>

<h5>Kondisi jlan lingkungan</h5>

 <?php if(isset($_GET['jumlahKJL'])):
 	for($i=0;$i<$_GET['jumlahKJL'];$i++){
 ?>
  <div class="form-row" >      
    <div class ="col">      
      <input type="text" class="form-control" id="namasubKJL" placeholder="Nama Sub Aspek" name="namasubKJL[]">
    </div>
    <div class ="col">     
      <input type="text" class="form-control" id="bobotsubKJL" placeholder="Bobot Sub Aspek" name="bobotsubKJL[]">
    </div>
    <div class ="col">      
      <input type="text" class="form-control" id="atributsubKJL" placeholder="Atribut Sub Aspek" name="atributsubKJL[]">
    </div>     
  </div>
<?php } endif;?>

<h5>Kondisi Drainase</h5>

 <?php if(isset($_GET['jumlahKDL'])):
 	for($i=0;$i<$_GET['jumlahKDL'];$i++){
 ?>
  <div class="form-row" >      
    <div class ="col">      
      <input type="text" class="form-control" id="namasubKDL" placeholder="Nama Sub Aspek" name="namasubKDL[]">
    </div>
    <div class ="col">     
      <input type="text" class="form-control" id="bobotsubKDL" placeholder="Bobot Sub Aspek" name="bobotsubKDL[]">
    </div>
    <div class ="col">      
      <input type="text" class="form-control" id="atributsubKDL" placeholder="Atribut Sub Aspek" name="atributsubKDL[]">
    </div>     
  </div>
<?php } endif;?>

<h5>Kondisi Pengelolaan Limbah</h5>

 <?php if(isset($_GET['jumlahKPL'])):
 	for($i=0;$i<$_GET['jumlahKPL'];$i++){
 ?>
  <div class="form-row" >      
    <div class ="col">      
      <input type="text" class="form-control" id="namasubKPL" placeholder="Nama Sub Aspek" name="namasubKPL[]">
    </div>
    <div class ="col">     
      <input type="text" class="form-control" id="bobotsubKPL" placeholder="Bobot Sub Aspek" name="bobotsubKPL[]">
    </div>
    <div class ="col">      
      <input type="text" class="form-control" id="atributsubKPL" placeholder="Atribut Sub Aspek" name="atributsubKPL[]">
    </div>     
  </div>
<?php } endif;?>

<h5>Kondisi Pengelolaan Sampah</h5>

 <?php if(isset($_GET['jumlahKPS'])):
 	for($i=0;$i<$_GET['jumlahKPS'];$i++){
 ?>
  <div class="form-row" >      
    <div class ="col">      
      <input type="text" class="form-control" id="namasubKPS" placeholder="Nama Sub Aspek" name="namasubKPS[]">
    </div>
    <div class ="col">     
      <input type="text" class="form-control" id="bobotsubKPS" placeholder="Bobot Sub Aspek" name="bobotsubKPS[]">
    </div>
    <div class ="col">      
      <input type="text" class="form-control" id="atributsubKPS" placeholder="Atribut Sub Aspek" name="atributsubKPS[]">
    </div>     
  </div>
<?php } endif;?>

<h5>Kondisi Proteksi Kebakaran</h5>

 <?php if(isset($_GET['jumlahKPK'])):
 	for($i=0;$i<$_GET['jumlahKPK'];$i++){
 ?>
  <div class="form-row" >      
    <div class ="col">      
      <input type="text" class="form-control" id="namasubKPK" placeholder="Nama Sub Aspek" name="namasubKPK[]">
    </div>
    <div class ="col">     
      <input type="text" class="form-control" id="bobotsubKPK" placeholder="Bobot Sub Aspek" name="bobotsubKPK[]">
    </div>
    <div class ="col">      
      <input type="text" class="form-control" id="atributsubKPK" placeholder="Atribut Sub Aspek" name="atributsubKPK[]">
    </div>     
  </div>
<?php } endif;?>
        <button type="submit" name ="tambah" class="btn btn-primary">tambah</button><br>
</form>

<!-- <h5>Kondisi Bangunan</h5>
<form action="" method="post">
  <div class="form-row" >      
    <div class ="col">
      
      <input type="text" class="form-control" id="" placeholder="Nama Sub Aspek" name="">
    </div>
    <div class ="col">
     
      <input type="text" class="form-control" id="" placeholder="Bobot Sub Aspek" name="">
    </div>
    <div class ="col">
      
      <input type="text" class="form-control" id="" placeholder="Atribut Sub Aspek" name="">
    </div>     
  </div>
</form>
<h5>Kondisi Bangunan</h5>
<form action="" method="post">
  <div class="form-row" >      
    <div class ="col">
      
      <input type="text" class="form-control" id="" placeholder="Nama Sub Aspek" name="">
    </div>
    <div class ="col">
     
      <input type="text" class="form-control" id="" placeholder="Bobot Sub Aspek" name="">
    </div>
    <div class ="col">
      
      <input type="text" class="form-control" id="" placeholder="Atribut Sub Aspek" name="">
    </div>     
  </div>
</form>
<h5>Kondisi Bangunan</h5>
<form action="" method="post">
  <div class="form-row" >      
    <div class ="col">
      
      <input type="text" class="form-control" id="" placeholder="Nama Sub Aspek" name="">
    </div>
    <div class ="col">
     
      <input type="text" class="form-control" id="" placeholder="Bobot Sub Aspek" name="">
    </div>
    <div class ="col">
      
      <input type="text" class="form-control" id="" placeholder="Atribut Sub Aspek" name="">
    </div>     
  </div>
</form>
<h5>Kondisi Bangunan</h5>
<form action="" method="post">
  <div class="form-row" >      
    <div class ="col">
      
      <input type="text" class="form-control" id="" placeholder="Nama Sub Aspek" name="">
    </div>
    <div class ="col">
     
      <input type="text" class="form-control" id="" placeholder="Bobot Sub Aspek" name="">
    </div>
    <div class ="col">
      
      <input type="text" class="form-control" id="" placeholder="Atribut Sub Aspek" name="">
    </div>     
  </div>
</form>
<h5>Kondisi Bangunan</h5>
<form action="" method="post">
  <div class="form-row" >      
    <div class ="col">
      
      <input type="text" class="form-control" id="" placeholder="Nama Sub Aspek" name="">
    </div>
    <div class ="col">
     
      <input type="text" class="form-control" id="" placeholder="Bobot Sub Aspek" name="">
    </div>
    <div class ="col">
      
      <input type="text" class="form-control" id="" placeholder="Atribut Sub Aspek" name="">
    </div>     
  </div>
</form>
<h5>Kondisi Bangunan</h5>
<form action="" method="post">
  <div class="form-row" >      
    <div class ="col">
      
      <input type="text" class="form-control" id="" placeholder="Nama Sub Aspek" name="">
    </div>
    <div class ="col">
     
      <input type="text" class="form-control" id="" placeholder="Bobot Sub Aspek" name="">
    </div>
    <div class ="col">
      
      <input type="text" class="form-control" id="" placeholder="Atribut Sub Aspek" name="">
    </div>     
  </div>
</form> -->


</div>
</body>
</html>