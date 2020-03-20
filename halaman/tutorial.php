
<div class="halaman">
	<h2>CSV BASED</h2>
	
</div>
<style> 

table {
font-family: helvetica, sans-serif;
border-collapse: collapse;
width: 100%;
border-spacing: 0;
border: 1px solid #ddd;
}

td {
  border: 1px solid #255;
  text-align: center;
  padding: 2px;
}

 th {
  font-size: 10px;
  border: 1px solid #255;
  text-align: center;
  padding: 5px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>


<head>    
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  
</head>



<body>

<div class="container">
  
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn btn-primary" data-toggle="modal" data-target="#myModal">Import Data</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Import Data</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
            <div class="row">
                <br />
                <form class="form-horizontal" action="" method="post" name="uploadCSV" enctype="multipart/form-data">

                    <div class="input-row">

                        <input class="col-sm-9" type="file" name="file" id="file" accept=".csv">
                        <button  type="submit" id="submit" name="import" class="btn btn-primary col-sm-3 ">Import</button>                                 
                        <br />  
                    </div> 
                    <br />
                </form>               
            </div>         
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
      
    </div>
  </div>
</div>
<hr>



<?php

if (isset($_POST["import"])) {
  echo "<div style='overflow-x:auto;'>";
  echo "<table>\n\n";      
  $fileName = $_FILES["file"]["tmp_name"];
      
if ($_FILES["file"]["size"] > 0) {
  $row = 1;
  $file = fopen($fileName, "r");      
  $j=0;
  $x=0;
  echo "<th>RT/RW</th>";
  echo "<th>PERSENTASE KETERATURAN BANGUNAN</th>";
  echo "<th>LUAS PERMUKIMAN</th>";
  echo "<th>TINGKAT KEPADATAN BANGUNAN</th>";
  echo "<th>PERSENTASE BANGUNAN LUAS > 7,2 M2</th>";
  echo "<th>PERSENTASE KONDISI BANGUNAN SESUAI PERSYARATAN</th>";
  echo "<th>JANGKAUAN JALAN LINGKUNGAN YANG LAYAK</th>";
  echo "<th>JALAN SESUAI PERSYARATAN TEKNIS</th>";
  echo "<th>PERSENTASE MASYARAKAT TERLAYANI SARANA AIR MINUM</th>";
  echo "<th>PERSENTASE MASYARAKAT TERPENUHI KEBUTUHAN AIR MINUM 60LITER/ORANG/HARI</th>"; 
  echo "<th>LUAS KAWASAN TIDAK TERJADI GENANGAN AIR/BANJIR</th>";
  echo "<th>PANJANG KONDISI DRAINASE</th>";
  echo "<th>PERSENTASE MASYARAKAT MEMILIKI AKSES JAMBAN</th>";
  echo "<th>PERSENTASE JAMBAN KELUARGA SESUAI PERSYARATAN TEKNIS</th>";
  echo "<th>PERSENTASE KONDISI SALURAN PEMBUANGAN AIR LIMBAH RUMAH TERPISAH DARI DRAINASE</th>";
  echo "<th>PERSENTASE SAMPAH DOMESTIK TERANGKUT KE TPS/TPS 2 MINGGU SEKLAI</th>";
  echo "<th>PERSENTASE TIDAK TERSEDIA SARANA DAN PRASARANA PROTEKSI KEBAKARAN</th>";
while (($column = fgetcsv($file, 10000, ";")) !== FALSE) {
  $i=0;
  $j=0;
  echo "<tr>";

    foreach ($column as $cell) {
      
        $data[$j++][$x] = $cell;
      // $angka[$i] = (isset($angka[$i]) ? $angka[$i]+($cell*$cell) : ($cell*$cell)); 

      echo "<td>" . htmlspecialchars($cell) . "</td>";
      // $i++;
      
      
      

    }
$x++;                     
echo "</tr>\n";                                          
            if (! empty($result)) {
              $type = "success";
              $message = "CSV Data Imported into the Database";
                } else {
                  $type = "error";
                    $message = "Problem in Importing CSV Data";
                  }                                
          }  
                                          
        }   
    }
    echo "\n</table></div>";
    // $dataalternatif = $data[0];
    if (isset($data)) {
    $dataalternatif = array_shift($data); 
    }
       



  // $data = array_shift($data_awal[][]);



if (isset($data)){
include 'formula.php';
    $topsis_pembagi = topsis_pembagi($data,$parent);
    $topsis_nomalisasi = topsis_nomalisasi($data, $topsis_pembagi);
    $topsis_terbobot = topsis_terbobot($topsis_nomalisasi);
    $topsis_a = topsis_a($topsis_terbobot, $parent);
    $topsis_d = topsis_d($topsis_a);
    $topsis_v = topsis_v($topsis_d);
    $saw_normalisasi = saw_normalisasi($topsis_v);
    $saw_preferensi = saw_preferensi($saw_normalisasi,$parent);
  }
?>


    <?php if (isset($saw_preferensi)) {
      include 'hasil_auto.php';
    } 
    
     ?>



    
     <canvas id="myChart" width="600" height="200"></canvas>
 

     <div id="topsis_v">
        
    </div>

   

  <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
  <script>
    
 function random_rgba() {
    var o = Math.round, r = Math.random, s = 255;
    return 'rgba(' + o(r()*s) + ',' + o(r()*s) + ',' + o(r()*s) + ',' + r().toFixed(1) + ')';
}

    let parentTitle = <?= json_encode($parent)?>;  
    let labelname = <?= json_encode($dataalternatif)?>;  
    let topsis_v =   <?= json_encode($topsis_v)?>;  

  
function  renderChart(id,data,title){
    let color = [];
    let label=[];
    let dataSet = [];
    $.each(data, (k, v) => {
        // label.push(labelname[k]);
        dataSet.push(v);
        color.push(random_rgba());
    });
    dataSet = dataSet.sort((a, b) => b - a).map((value, index) => {
        label[index] = labelname[Object.keys(data).find(key => data[key] === value)];
        return value
    });
    var ctx = document.getElementById(id).getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: label ,
        datasets: [{    
            data: dataSet,
            backgroundColor: color,
            borderWidth: 1
        }]
    },
    options: {
        legend: {
            display: false
        },
        title: {
            display: true,
            text: title ,
            position: 'top',
            fontSize: 16,
            padding: 20
        },
    }
});
}
  
$(()=>{
  renderChart('myChart',<?=
json_encode($saw_preferensi['saw_preferensi'])
    ?>,'TOTAL PREFERENSI TINGKAT KEKUMUHAN KAWASAN');
    let i =0;
      $.each(topsis_v,(k,v)=>{
        $('#topsis_v').append(`
        <canvas id="myChart${k}" width="600" height="200"></canvas>
        `);
        renderChart(`myChart${k}`,v['V'+k],parentTitle[i]['nama']);
        i++;
    })
  });
  </script>
</body>



          


          
