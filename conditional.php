<?php 
#if, else, switch
#if (condition) {statement}
# &&=AND ||=OR 
# == equal 
# != not equal

$number = 1;
$number = 4;
$number2 = '2';
$number3 = 2;

// if ($number!=$number2) {
//     echo 'benar'; 
// } else {
//     echo 'salah';
// } 
if ($number==$number2) {
    echo 'true';
} else {
    echo 'false';
}

// if ($number!=$number2) {
//     echo 'true';
// } else {
//     echo 'false';
// }

if ($number2===$number3) {
    echo 'true';
} else {
    echo 'false';
}

if ($number2===$number3) :
    echo 'true';
else :
    echo 'false';
endif;

echo "<br>";
##case1
$a = '2';
if ($a == 1) {
    echo 'benar';
} else if ($a < 1) {
    echo 'benar 2';
} 


// // ##case2

// $a = '2';
// switch ($a) {
//     case '2':
//         echo 'benar 2';
//         break;
//     case '1':
//         echo 'salah';
//         break;
//     default:
//         echo 'salah';
//         break;
// }

// // if ($a === 1 || $a === 2 || $a === 3 || $a === 'ddd') {
// //     echo 'benar 2';
// // } else {
// //     echo 'salah';
// // }
 ?>