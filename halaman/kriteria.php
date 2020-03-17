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
    $data = [];
    if (isset($manual)) {
        $alternatif_manual = array_shift($manual);
        foreach ($manual as $k => $v) {
            foreach ($v as $key => $value){
                $data[$alternatif_manual[$key]][] = $value;
            }
        }
    }
    $result['data'] = json_encode($data);
    $id = 1;
    $parent = [];
    foreach ($_POST['parent'] as $k => $v) {
        $parent_id = $id;
        $parent[$k]['parent_id'][] = null;
        $parent[$k]['id'][] = $id;
        $parent[$k]["nama"][] = $v['nama'];
        $parent[$k]["atribut"][] = $v['sifat'];
        $parent[$k]["bobot"][] = $v['bobot'];
        if (isset($v['child']) ){
            foreach ($v['child'] as $key => $val){
                $id++;
                $parent[$k]['child']['parent_id'][] = $parent_id;
                $parent[$k]['child']['id'][] = $id;
                $parent[$k]['child']["nama"][] = $val['nama'];
                $parent[$k]['child']["atribut"][] = $val['sifat'];
                $parent[$k]['child']["bobot"][] = $val['bobot'];
            }
        }
        $id++;
    }
    $result['parent'] = $parent;
    $topsis_pembagi = topsis_pembagi($manual, $parent);
    $topsis_nomalisasi = topsis_nomalisasi($manual, $topsis_pembagi);
    $topsis_terbobot = topsis_terbobot($topsis_nomalisasi);
    $topsis_a = topsis_a($topsis_terbobot, $parent);
    $topsis_d = topsis_d($topsis_a);
    $topsis_v = topsis_v($topsis_d);
    $saw_normalisasi = saw_normalisasi($topsis_v);
    $saw_preferensi = saw_preferensi($saw_normalisasi, $parent);
    $result = json_encode($result);
} else {
    $result = json_encode($_POST);
}

print_r($result);
