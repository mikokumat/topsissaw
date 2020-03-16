<?php

$conn = mysqli_connect("localhost","root","","romi");
$result = mysqli_query($conn, "SELECT * FROM baseline");

// while ($base = mysqli_fetch_assoc($result)) {
  
// }


 ?>

<head>    
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

<!-- <div class="halaman"> -->
	
	
</div>

<h2>Data Table Kawasan kumuh</h2>


<table class="table table-striped table-hover">
  <thead class="thead">
    <tr>
      <th scope="col">RT/RW</th>
      <th scope="col">Kecamatan</th>
      <th scope="col">Kelurahan</th>       
      <th scope="col">Tingkat Kepadatan Bangunan %</th>
      <th scope="col">Tingkat Kualitas Jalan Lingkungan %</th>
      <th scope="col">Tingkat Penyediaan Air Minum %</th>
      <th scope="col">Luas Permukiman Tidak Terjadi Genangan Air</th>
      <th scope="col">Panjang Kondisi Drainase</th>
      <th scope="col">Masyarakat memiliki Akses Jamban Bersama %</th>
      <th scope="col">Sampah Domestik rumah tangga terangkut ke TPS/TPA minimal seminggu 2 kali %</th>
      <th scope="col">Tidak Tersedianya Sarana dan Prasarana proteksi kebakaran %</th>
    
      
    </tr>
  </thead>
  <tbody>
    <?php while ($row = mysqli_fetch_assoc($result)) :  ?>
    <tr>
      <td><?= $row["rtrw"]; ?></th>
      <td><?= $row["kecamatan"]; ?></th>
      <td><?= $row["kelurahan"]; ?></td>
      <td><?= $row["persentase_keteraturan_bangunan"]; ?></td>
      <td><?= $row["kualitas_jalan"]; ?></td>
      <td><?= $row["persentase_masyarakat_airminum"]; ?></td>
      <td><?= $row["kws_tidak_banjir"]; ?></td>
      <td><?= $row["panjang_drainase"]; ?></td>
      <td><?= $row["akses_jamban"]; ?></td>
      <td><?= $row["sampah_domestik"]; ?></td>
      <td><?= $row["tidak_proteksi_kebakaran"]; ?></td>      
    </tr>
  <?php endwhile; ?>
  </tbody>
</table>

</body>