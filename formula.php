<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "romi";
$conn = new mysqli($servername, $username, $password, $dbname);


function query($sql, $conn)
{
    $myArray = [];
    $result = $conn->query($sql);
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $myArray[] = $row;
    }
    return $myArray;
}

function topsis_pembagi($data,$parent)
{
    $child = [];
    foreach ($parent as $key => $value){
        foreach ($value['child'] as $k => $v){
            $child[] = [
                'id'=>$v['id'],
                'parent_id'=>$v['parent_id'],
                'bobot'=>$v['bobot'],
                'atribut' => $v['atribut']
                ];
        }
    }

    foreach ($data as $key => $value) {
        $sum = 0;
        foreach ($value as $v) {
            $sum += $v * $v;
        }
        $child[$key]['pembagi'] = sqrt($sum);
    }
    return $child;
}

function topsis_nomalisasi($data, $topsis_pembagi)
{
    $result = [];
    foreach ($data as $key => $value) {
        $result[$topsis_pembagi[$key]['parent_id']][$topsis_pembagi[$key]['id']]['bobot'] = $topsis_pembagi[$key]['bobot'];
        $result[$topsis_pembagi[$key]['parent_id']][$topsis_pembagi[$key]['id']]['atribut'] = $topsis_pembagi[$key]['atribut'];
        foreach ($value as $k => $v) {
            $result[$topsis_pembagi[$key]['parent_id']][$topsis_pembagi[$key]['id']]['normalisasi'][] = $v / $topsis_pembagi[$key]['pembagi'];
        }
    }
    return $result;
}

function topsis_terbobot($topsis_nomalisasi)
{
    foreach ($topsis_nomalisasi as $key => $value) {
        foreach ($value as $k => $v){
            foreach ($v['normalisasi'] as $kk => $vv){
                $topsis_nomalisasi[$key][$k]['terbobot'][] = $v['bobot'] * $vv;
            }
        }
    }
    return $topsis_nomalisasi;
}

function topsis_a($topsis_terbobot, $parent)
{
    foreach ($topsis_terbobot as $key => $value) {
        foreach ($value as $k => $v){
            $value = $topsis_terbobot[$key][$k]['terbobot'];
            $topsis_terbobot[$key][$k]['topsis_a']['A+'] = $topsis_terbobot[$key][$k]['atribut'] === 'cost' ? min($value) : max($value);
            $topsis_terbobot[$key][$k]['topsis_a']['A-'] = $topsis_terbobot[$key][$k]['atribut'] === 'cost' ? max($value) : min($value);
        }
    }
    return $topsis_terbobot;
}

function topsis_d($topsis_a)
{
    foreach ($topsis_a as $key => $val){
        foreach ($val as $k => $v){
            foreach ($v['terbobot'] as $kk => $vv) {
                $topsis_a[$key][$k]['D+'][] =  pow($v['topsis_a']['A+']-$topsis_a[$key][$k]['terbobot'][$kk],2);
                $topsis_a[$key][$k]['D-'][]  =  pow($topsis_a[$key][$k]['terbobot'][$kk]-$v['topsis_a']['A-'],2);
            }
        }
    }
    foreach ($topsis_a as $key => $val){
        $temp=[];
        foreach ($val as $k => $v){
            $temp['A+'][] = $v['topsis_a']['A+'];
            $temp['A-'][] = $v['topsis_a']['A-'];
            foreach ($v['terbobot'] as $kk => $vv){
                $temp['terbobot'][$kk][] = $vv;
            }
        }
        $topsis_a[$key]['temp'][] = $temp;
    }
    foreach ($topsis_a as $key => $val){
        foreach ($topsis_a[$key]['temp'][0]['terbobot'] as $k => $v){
            $sum = 0;
            $sum2 = 0;
            foreach ($v as $kk => $vv){
                $sum = $sum + (pow($topsis_a[$key]['temp'][0]['A+'][$kk]-$vv,2));
                $sum2 = $sum2 + (pow($vv-$topsis_a[$key]['temp'][0]['A-'][$kk],2));
            }
            $topsis_a[$key]['sum']['D+'][]=sqrt($sum);
            $topsis_a[$key]['sum']['D-'][]=sqrt($sum2);
        }

    }
return $topsis_a;
}


function topsis_v($topsis_d)
{
    foreach ($topsis_d as $key => $value){
        foreach ($topsis_d[$key]['sum']['D+'] as $k => $v){
            $topsis_d[$key]['V'.$key][] = $topsis_d[$key]['sum']['D-'][$k] / ($topsis_d[$key]['sum']['D-'][$k] + $topsis_d[$key]['sum']['D+'][$k]);
        }
    }
    foreach ($topsis_d   as $key => $value) {
        foreach ($topsis_d[$key]['V'.$key] as $k => $v) {               
            if ($v == 0) {
                $topsis_d = cleaning($topsis_d,$k);
            }
        }
    }
    return $topsis_d;
}

function cleaning($arr,$k){
    foreach ($arr as $key => $value){
        foreach ($arr[$key]['V'.$key] as $kk => $v) {     
            if ($kk == $k) {
                unset($arr[$key]['V'.$key][$kk]);
            }
        }

    }
    return $arr;
}

function saw_normalisasi($topsis_v)
{
    foreach ($topsis_v as $key => $value) {
        foreach ($topsis_v[$key]['V'.$key] as $k => $v) {               
            $topsis_v[$key]['normalisasi_saw'][$k] = min($topsis_v[$key]['V'.$key])/$v;
        }        

    }
    return $topsis_v;
}

function saw_preferensi($saw_normalisasi,$parent)
{
    foreach ($saw_normalisasi as $key => $value) {
        foreach ($saw_normalisasi[$key]['normalisasi_saw'] as $k => $v) {               
            $saw_normalisasi['referensi'][$k][]=$v;
        }        
    }
    foreach ($saw_normalisasi['referensi'] as $key => $value) {
        $result = 0;
        foreach ($value as $k => $v) {
            $result = $result + $parent[$k]['bobot']*$v;
        }
        $saw_normalisasi['saw_preferensi'][$key] = $result;



    }
    $s = max($saw_normalisasi['saw_preferensi']);
    $key = array_search($s , $saw_normalisasi['saw_preferensi']);
    $saw_normalisasi['max'] = $key;
    $saw_normalisasi['max_v'] = $s;
    return $saw_normalisasi;
}


$parent = query('SELECT * FROM kriteria WHERE parent_id IS NULL ', $conn);
foreach ($parent as $key => $value) {
    $parent[$key]['child'] = query('SELECT * FROM kriteria WHERE parent_id =' . $value['id'], $conn);
}



// $data = [
//     [
//         74.07, 68.57, 86.96, 45.83,
//     ],
//     [
//         0.644, 0.7065, 0.4352, 0.4199,
//     ],
//     [
//         41.92547, 49.53999, 52.84926, 57.15647,
//     ],
//     [
//         96.3, 85.71, 69.57, 41.67,
//     ],
//     [
//         92.59, 94.29, 95.65, 70.83,
//     ]
// ];

//$topsis_pembagi = topsis_pembagi($data);
//$topsis_nomalisasi = topsis_nomalisasi($data, $topsis_pembagi);
//$topsis_terbobot = topsis_terbobot($topsis_nomalisasi, $parent);
//$topsis_a = topsis_a($topsis_terbobot, $parent);
//$topsis_d = topsis_d($topsis_a, $topsis_terbobot);
// print_r($topsis_d);
// print_r($topsis_pembagi);
// print_r($topsis_nomalisasi);
// print_r($topsis_terbobot);
