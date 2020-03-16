<?php

$conn = mysqli_connect("localhost","root","","romi");
$result = mysqli_query($conn, "SELECT * FROM kriteria WHERE parent_id IS NULL");
$results = mysqli_query($conn, "SELECT * FROM kriteria WHERE parent_id IS NOT NULL");
 ?>

<head>    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>




<h3 style="text-align: center;">kelola atribut dan bobot</h3>
<!-- 
<button type="button" class="btn btn-info btn btn-primary active" data-toggle="modal" data-target="#myModal">Import Data</button>
 --> 
  <table class="table table-striped table-hover">
    <thead class="thead">
      <tr>        
        <th scope="col">Nama Kriteria</th>
        <th scope="col">Sifat Atribut</th>
        <th scope="col">Bobot</th>
        <th scope="col">Edit</th>                
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_assoc($result)) :  ?>
      <tr>        
        <td><?= $row["nama"]; ?></td>
        <td><?= $row["atribut"]; ?></td>
        <td><?= $row["bobot"]; ?></td>
        <td>
          <a href="halaman/ubah.php?id=<?=$row["id"]?>" class="btn btn-primary btn-sm ">Ubah</a>         
        </td>              
      </tr>
    <?php endwhile; ?>
    </tbody>
  </table>
  <hr>
  <table class="table table-striped table-hover">
    <thead class="thead">
      <tr>        
        <th scope="col">Nama SubKriteria</th>
        <th scope="col">Sifat Atribut</th>
        <th scope="col">Bobot</th>
        <th scope="col">Edit</th>            
      </tr>
    </thead>
    <tbody>
      <?php while ($rows = mysqli_fetch_assoc($results)) :  ?>
      <tr>
        
        <td><?= $rows["nama"]; ?></td>
        <td><?= $rows["atribut"]; ?></td>
        <td><?= $rows["bobot"]; ?></td>
        <td>
          <a href="halaman/ubah.php?id=<?=$rows["id"]?>" class="btn btn-primary btn-sm " id="ubah">Ubah</a>           
        </td>
      </tr>
    <?php endwhile; ?>
    </tbody>
  </table>






</div>

</body>