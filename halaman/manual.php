<head>
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



<script>

    let index = 0;
    let parent;
    function inputSubmit() {
        let res = $('#parent-content').serialize();
        parent = $('#parent-content').serializeArray();
        $.ajax({
            type: "POST",
            url: "halaman/kriteria.php",
            data: res
        })
        .done((data)=>{
            data = JSON.parse(data);

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
        let form = new FormData(this);
        $.each(parent,(k,v)=>{
            form.append(v.name,v.value);
        })
        $.ajax({
            url: "halaman/kriteria.php",
            type: "POST",
            data: form,
            processData: false,
            contentType: false,
            dataType: "json",
        })
        .done((data)=>{
            data = JSON.parse(data.data);
            let no = 1;
            $.each(data,(k,v)=>{
                let objhtml = `<tr><td>${no}</td><td>${k}</td>`;
                $.each(v,(key,val) => {
                    objhtml = objhtml + `<td>${val}</td>`;
                });
                objhtml = objhtml + `</tr>`;
                $('#hasil').append(objhtml);
                no++;
            });
        });
    }));

    $(() => {});
</script>
