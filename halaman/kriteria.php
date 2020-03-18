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
        $parent[$k] =[
            'id'=>$id,
            'parent_id'=>null,
            'nama'=>$v['nama'],
            'atribut' => $v['sifat'],
            'bobot'=>$v['bobot']
        ];
        if (isset($v['child']) ){
            foreach ($v['child'] as $key => $val){
                $id++;
                $parent[$k]['child'][$key] = [
                    'id'=>$id,
                    'parent_id'=>$parent_id,
                    'nama'=>$v['nama'],
                    'bobot'=>$val['bobot'],
                    'atribut' => $val['sifat']
                ];
            }
        }
        $id++;
    }
    $result['parent'] = $parent;
    $result['topsis_pembagi']=$topsis_pembagi = topsis_pembagi($manual, $parent);
    $result['topsis_nomalisasi']=$topsis_nomalisasi = topsis_nomalisasi($manual, $topsis_pembagi);
    $result['topsis_terbobot']=$topsis_terbobot = topsis_terbobot($topsis_nomalisasi);
    $result['topsis_a']=$topsis_a = topsis_a($topsis_terbobot, $parent);
    $result['topsis_d']=$topsis_d = topsis_d($topsis_a);
    $result['topsis_v']=$topsis_v = topsis_v($topsis_d);
    $result['saw_normalisasi']=$saw_normalisasi = saw_normalisasi($topsis_v);
    $result['saw_preferensi']=$saw_preferensi = saw_preferensi($saw_normalisasi, $parent);
    $result = json_encode($result);
} else {
    $result = json_encode($_POST);
}

print_r($result);
