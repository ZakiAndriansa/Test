<?php 

#for loops
// for($i=1;$i<=10;$i=$i+2) {
//     echo "$i</br>";
// }

#foreach Loops
$array = array("name","email","address");
print_r($array);

echo "<br>";

foreach ($array as $data) {
    echo $data;
}

// foreach ($array as $key=>$value) {
//     echo "Key $key: $value</br>";
// }

// #while loops
// ###case1
// $i = 0;

// while ($i<20) {
//     echo "$i<br>";
//     $i++;
// }

// ###case2
// $i = 0;
// $array = array('name','email','address');
// print_r($array);
// while (isset($array[$i])) {
//     echo "$array[$i]<br>";
//     $i++;
// }

?>