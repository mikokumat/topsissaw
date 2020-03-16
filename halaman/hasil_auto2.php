<div class="container-fluid">
  <h1>Preference Value</h1>
  <p>hasil akhir preferensi akhir dengan metode TOPSIS & SAW</p>

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
  </div>


  

    
  </div>
</div>