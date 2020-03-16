<?php
include '../formula.php';
if (isset($_FILES["file"])) {
    $result = [];
    $fileName = $_FILES["file"]["tmp_name"];
    if ($_FILES["file"]["size"] > 0) {
        $row = 1;
        $file = fopen($fileName, "r");
        $j = 0;
        $x = 0;
        while (($column = fgetcsv($file, 10000, ";")) !== FALSE) {
            $i = 0;
            $j = 0;
            foreach ($column as $cell) {
                $manual[$j++][$x] = $cell;
            }
            $x++;
        }
    }


    if (isset($manual)) {
        $alternatif_manual = array_shift($manual);
        foreach ($manual as $k => $v) {
            foreach ($v as $key => $value){
                $result[$alternatif_manual[$key]][] = $value;
            }
        }
    }
    $result = json_encode($result);
//    $topsis_pembagi = topsis_pembagi($manual, $kriteria);
//    $topsis_nomalisasi = topsis_nomalisasi($manual, $topsis_pembagi);
//    $topsis_terbobot = topsis_terbobot($topsis_nomalisasi);
//    $topsis_a = topsis_a($topsis_terbobot, $kriteria);
//    $topsis_d = topsis_d($topsis_a);
//    $topsis_v = topsis_v($topsis_d);
//    $saw_normalisasi = saw_normalisasi($topsis_v);
//    $saw_preferensi = saw_preferensi($saw_normalisasi, $kriteria);
} else {
    $result = json_encode($_POST);
}

print_r($result);
