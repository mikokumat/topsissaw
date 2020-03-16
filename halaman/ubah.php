<?php 
require 'function.php';

$id = $_GET["id"];
$kriteria = query("SELECT * FROM kriteria WHERE id = $id")[0];

if (isset($_POST["submit"])) {
	$nama = htmlspecialchars($_POST["nama"]);
    $bobot = htmlspecialchars($_POST["bobot"]);
    $atribut = htmlspecialchars($_POST["atribut"]);
    

    $query = "UPDATE kriteria SET
                  nama = '$nama',
                  atribut = '$atribut',
                  bobot = '$bobot'
               	WHERE id = $id
              ";
    mysqli_query($conn, $query);

    if(mysqli_affected_rows($conn) > 0 ){
      echo "<script>
              alert('data berhasil di tambahkan');
              </script>";
    }
    else {
      echo "<script>
              alert('data gagal ditambah');
              </script>";
    }
    echo "<script>
            document.location.href = '../index.php?page=admin';
            </script>";
}?>

<head>    
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<script type="text/javascript" src="jquery.js"></script>
  
</head>
<body>
<div class="content">
	<header>
		<h1 class="judul">SLUM AREA RANKING</h1>		
	</header>
	 

<form action="" method="post">
  <div class="form-row">
  	
<div class ="col">
      <label for="nama">Nama</label>
      <input class="form-control" type="text" name="nama" id="nama" required value="<?=$kriteria['nama']?>">
</div>
	<div class ="col">
      <label for="bobot">Bobot</label>
      <input class="form-control" type="text" name="bobot" id="bobot" required value="<?=$kriteria["bobot"]?>">
	</div>
    <div class ="col">
      <label for="atribut">Atribut</label>
      <input class="form-control" type="text" name="atribut" id="atribut" required value="<?=$kriteria["atribut"]?>">
    </div>
    <div class ="col">
      <br>
      <button type="submit" name="submit" class="btn btn-success">ubah</button>
    </div>              
 </div>            
</form>
     
<div>
</body>