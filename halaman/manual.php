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
  padding: 2px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}    

</style>
<head>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  
</head>
<div id="content-manual">
    <label>
        Kriteria Utama
    </label>
    <div id="parent-input">
        <form id="parent-content">
            <div class="form-group">
                <input type="text" name="parent[0][nama]" placeholder="Nama Kriteria">
                <input type="number" name="parent[0][bobot]" placeholder="bobot">
                <select name="parent[0][sifat]">
                    <option value="">Pilih Sifat</option>
                    <option value="cost">Cost</option>
                    <option value="benefit">Benefit</option>
                </select>
                <div class="form-group">
                    <div class="form-group">
                        <button onclick="tambahSubKriteria(this,0)" type="button">Tambah Sub Kriteria</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <button onclick="tambahKriteria()">Tambah Kriteria</button>
    <button onclick="inputSubmit()">Submit</button>


    <div class="input-row">
      <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
        <input class="col-sm-4" type="file" name="file" id="file" accept=".csv">
        <input type="submit" value="Upload" class="submit" />
      </form>
        
        <br />  
    </div> 
    <br />

<div>
    Hasil Kriteria
    <table >
        <thead><tr id="t-kriteria">
            <td rowspan="2">No</td>
            <td>Kriteria</td>
        </tr>
        <tr id="t-sub-kriteria">
            <td>Sub Kriteria</td>
        </tr>
    </thead>
        <tbody id="hasil"></tbody>
    </table>
</div>
</div>


<script
        src="//code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
<script>

    let index = 0;
    
    function inputSubmit() {
        let res = $('#parent-content').serialize();
        $.ajax({
            type: "POST",
            url: "halaman/kriteria.php",
            data: res
        })
        .done((data)=>{
            data = JSON.parse(data);
            console.log(data);
            let no =1;
            $.each(data.parent,(k,v)=>{
                let subno = 1;
                let el = v.child ? `colspan="${(v.child).length}"` : `rowspan="2"` ;
                $('#t-kriteria').append(`<td ${el}>${v.nama} - (${v.sifat}) - (${v.bobot})</td>`);  
                if (v.child) {
                    console.log('length', (v.child).length);
                    $.each(v.child,(key,val)=>{
                    $('#t-sub-kriteria').append(`<td>${val.nama} - (${val.sifat}) - (${val.bobot})</td>`);  
                    subno++;
                    });
                }
                no++;    
            })
            
      
        })
    }
    function tambahKriteria() {
        index = index + 1;
        $('#parent-content').append(` <div class="form-group">
               <input type="text" name="parent[${index}][nama]" placeholder="Nama Kriteria">
                <input type="number" name="parent[${index}][bobot]" placeholder="bobot">
                <select name="parent[${index}][sifat]">
                    <option value="">Pilih Sifat</option>
                    <option value="cost">Cost</option>
                    <option value="benefit">Benefit</option>
                </select>
                <div class="form-group">
                    <button onclick="tambahSubKriteria(this,index)" type="button">Tambah Sub Kriteria</button>
                </div>
        </div>`);

    }
    function tambahSubKriteria(elem,index) {
        elem = $(elem).parent().parent();
        let sub = elem.children('.ml-4').length;
        elem.append(` <div class="form-group ml-4">
                <input type="text" name="parent[${index}][child][${sub}][nama]" placeholder="Nama Sub Kriteria">
                <input type="number" name="parent[${index}][child][${sub}][bobot]" placeholder="bobot">
                <select name="parent[${index}][child][${sub}][sifat]">
                    <option value="">Pilih Sifat</option>
                    <option value="cost">Cost</option>
                    <option value="benefit">Benefit</option>
                </select>
    </div>`);
    }
    $("#uploadimage").on('submit',(function(e) {
        e.preventDefault();
        $.ajax({
            url: "halaman/kriteria.php", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false,        // To send DOMDocument or non processed data file it is set to false
            success: function(data)   // A function to be called if request succeeds
        {
        console.log(data);
        }
    });
}));
    $(() => {


    })
</script>


<?php  
$kriteria = json_encode($_POST) ;
$result = [];
print_r($kriteria);



if (isset($_POST["import"])) {
  echo "<div style='overflow-x:auto;'>";  
  echo "<table>\n\n";    
  $fileName = $_FILES["file"]["tmp_name"];
      
if ($_FILES["file"]["size"] > 0) {
  $row = 1;
  $file = fopen($fileName, "r");      
  $j=0;
  $x=0;
while (($column = fgetcsv($file, 10000, ";")) !== FALSE) {
  $i=0;
  $j=0;
  echo "<tr>";                                   
    foreach ($column as $cell) {
      
        $manual[$j++][$x] = $cell;
      // $angka[$i] = (isset($angka[$i]) ? $angka[$i]+($cell*$cell) : ($cell*$cell));                           
      echo "<td>" . htmlspecialchars($cell) . "</td>";
      // $i++;                 
    }
$x++;                     
echo "</tr>";                                          
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

if (isset($manual)) {
    $alternatif_manual = array_shift($manual); 
    print_r($alternatif_manual);
    }

if (isset($_POST['kriteria'])){
include 'formula.php';
    $topsis_pembagi = topsis_pembagi($manual,$kriteria);
    $topsis_nomalisasi = topsis_nomalisasi($manual, $topsis_pembagi);
    $topsis_terbobot = topsis_terbobot($topsis_nomalisasi);
    $topsis_a = topsis_a($topsis_terbobot, $kriteria);
    $topsis_d = topsis_d($topsis_a);
    $topsis_v = topsis_v($topsis_d);
    $saw_normalisasi = saw_normalisasi($topsis_v);
    $saw_preferensi = saw_preferensi($saw_normalisasi,$kriteria);

    
}

?>


    

    
