<?php
if (isset($_POST["import"])) {

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

        $data[$j++][$x] = $cell;

        }
        $x++;


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



if (isset($data)){
include '../formula.php';
    $topsis_pembagi = topsis_pembagi($data,$parent);
    $topsis_nomalisasi = topsis_nomalisasi($data, $topsis_pembagi);
    $topsis_terbobot = topsis_terbobot($topsis_nomalisasi);
    $topsis_a = topsis_a($topsis_terbobot, $parent);
    $topsis_d = topsis_d($topsis_a);
    $topsis_v = topsis_v($topsis_d);
    $saw_normalisasi = saw_normalisasi($topsis_v);
    $saw_preferensi = saw_preferensi($saw_normalisasi,$parent);

//$result=[
//    'topsis_pembagi' =>    $topsis_pembagi,
//    'topsis_normalisasi' => topsis_nomalisasi($data, $topsis_pembagi),
//    'topsis_terbobot'=> topsis_terbobot($topsis_nomalisasi, $parent),
//    'topsis_a' => topsis_a($topsis_terbobot, $parent),
//    'topsis_d' => topsis_d($topsis_a, $topsis_terbobot)
//];
echo json_encode($saw_preferensi);
}



// query($sql, $conn);
// topsis_pembagi($data);

// var_dump($topsis_pembagi);


?>