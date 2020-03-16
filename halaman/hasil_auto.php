<div class="container-fluid">
  <h1>Preference Value</h1>
  <p>hasil tingkat kekumuhan kawasan</p>
  
  <button type="button" class="btn btn-info btn btn-primary" data-toggle="modal" data-target="#myModal2">Show More</button>

  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title">Data Lainnya</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button>          
        </div>
      <!-- Modal content-->
        <div class="modal-body">
            <div class="container">                 
                   <div class="row">
                        <div class="col-sm-4" style="background-color:cornsilk;">
                        <?php  foreach ($topsis_nomalisasi as $key => $value) {
                        
                        foreach ($value as $k => $val) {
                        echo "<table class='table table-hover'>";
                        echo "<thead><tr><th>No</th><th>Normalisasi TOPSIS</th>";
                            foreach ($val['normalisasi'] as $kk => $vv) {
                                        echo "<tr>";
                                        echo "<td>".$kk."</td><td>".$vv."</td>";        
                                        echo "</tr>";
                                      }          
                                     
                        echo "</table><br>";     
                        } 
                        }

                        foreach ($topsis_v as $key => $value) {
                        echo "<table class='table table-hover'>";
                        echo "<thead><tr><th>Kriteria</th><th>Nila Akhir TOPSIS</th>";
                        foreach ($topsis_v[$key]['V'.$key] as $k => $val) {          
                          echo "<tr>";
                          echo "<td>".$key."</td><td>".$val."</td>";        
                          echo "</tr>";           
                        } 
                        echo "</table><br>";     
                    }


                        ?> 
                      </div>

                      <div class="col-sm-4" style="background-color:cornsilk;">
                        <?php  foreach ($topsis_terbobot as $key => $value) {
                        foreach ($value as $k => $val) {
                        echo "<table class='table table-hover'>";
                        echo "<thead><tr><th>No</th><th>Terbobot</th>";
                            foreach ($val['terbobot'] as $kk => $vv) {
                                        echo "<tr>";
                                        echo "<td>".$kk."</td><td>".$vv."</td>";        
                                        echo "</tr>";
                                      }          
                                     
                        echo "</table><br>";     
                        } 
                        }
                        ?> 
                      </div>

                     
                    </div>
                    <div class="row">
                       <div class="col-sm-4" style="background-color:cornsilk;">
                        <?php  foreach ($topsis_a as $key => $val) {
                        foreach ($val as $k => $v) {
                              echo "<table class='table table-hover'>";
                              echo "<thead><tr><th>Solusi Ideal</th><th>Nilai</th>";
                            foreach ($v['topsis_a'] as $kk => $vv) { 
                                echo "<tr>";
                                echo "<td>".$kk."</td><td>".$vv."</td>";        
                                echo "</tr>";                                    
                            }                             
                              echo "</table><br>";     
                          } 
                        }

                        foreach ($topsis_d as $key => $value) {
                        echo "<table class='table table-hover'>";
                        echo "<thead><tr><th>Jarak Solusi Ideal Positif</th><th>Nilai</th>";
                        foreach ($topsis_d[$key]['sum']['D+'] as $k => $val) {          
                          echo "<tr>";
                          echo "<td>".$key."</td><td>".$val."</td>";        
                          echo "</tr>";           
                        } 
                          echo "</table><br>";
                        }

                        foreach ($topsis_d as $key => $value) {
                        echo "<table class='table table-hover'>";
                        echo "<thead><tr><th>Jarak Solusi Ideal Negatif</th><th>Nilai</th>";
                        foreach ($topsis_d[$key]['sum']['D-'] as $k => $val) {          
                          echo "<tr>";
                          echo "<td>".$key."</td><td>".$val."</td>";        
                          echo "</tr>";           
                        } 
                        echo "</table><br>";
                        }

                        ?>

                      </div>
                      <div class="col-sm-4" style="background-color:coral;">
                        <?php 
                        foreach ($saw_normalisasi as $key => $value) {
                          echo "<table class='table table-hover'>";
                          echo "<thead><tr><th>Kriteria</th><th>Normalisasi SAW</th>";
                          foreach ($value['normalisasi_saw'] as $k => $val) {          
                            echo "<tr>";
                            echo "<td>".$key."</td><td>".$val."</td>";        
                            echo "</tr>";           
                          } 
                          echo "</table><br>";     
                        }
                        ?>

                      </div>
                    </div>
              </div>         
          </div>
          <div class="modal-footer">
            
          </div>
        </div>
        
      </div>
    </div>
  <div class="row"> 
    <div class="col-sm-4" style="background-color:coral;">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>RT/RW</th>
          <th>PREFERENSI SAW</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        arsort($saw_preferensi['saw_preferensi']);
        foreach ($saw_preferensi['saw_preferensi'] as $key => $value) {

          echo "<tr>";
            echo "<td>".$dataalternatif[$key]."</td><td>".$value."</td>";              
          echo "</tr>";
        } ?>    
      </tbody>
    </table>
    </div>

    <div class="col-sm-4" style="background-color:coral;">
      <table class="table table-hover">
      <thead>
        <tr>
          <th>MAX SAW</th>
          <th>Value</th>
        </tr>
      </thead>
        <tbody>
          <?php 
            echo "<tr>";
              echo "<td>".$dataalternatif[$saw_preferensi['max']]."</td>";  
              echo "<td>".$saw_preferensi['max_v']."</td>";           
            echo "</tr>";
           ?>    
        </tbody>
      </table>
    </div>

    
  </div>
</div>