<?php

  // echo "<div style='overflow-x:auto;'>";  
  // echo "<table>\n\n";    
  // $fileName = $_FILES["file"]["tmp_name"];
      print_r($_FILES["file"]);
// if ($_FILES["file"]["size"] > 0) {
//   $row = 1;
//   $file = fopen($fileName, "r");      
//   $j=0;
//   $x=0;
// while (($column = fgetcsv($file, 10000, ";")) !== FALSE) {
//   $i=0;
//   $j=0;
//   echo "<tr>";                                   
//     foreach ($column as $cell) {
      
//         $manual[$j++][$x] = $cell;
//       // $angka[$i] = (isset($angka[$i]) ? $angka[$i]+($cell*$cell) : ($cell*$cell));                           
//       echo "<td>" . htmlspecialchars($cell) . "</td>";
//       // $i++;                 
//     }
// $x++;                     
// echo "</tr>";                                          
//             if (! empty($result)) {
//               $type = "success";
//               $message = "CSV Data Imported into the Database";
//                 } else {
//                   $type = "error";
//                     $message = "Problem in Importing CSV Data";
//                   }                                
//           }  
                                          
//         }   
    
//     echo "\n</table></div>";

$result = json_encode($_POST);	



print_r($result);
