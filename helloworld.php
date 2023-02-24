<?php
echo 'Helo World';
$variable = "I'm Siska";
$variable = 'I\'m Siska';
echo $variable;

$number = 35;
echo 'My age is ' . $number;

$a = "number";
echo $$a;

//array
$array = array('name','email','address');
print_r($array);
echo $array[1];
  
$array2[] = "salad";
$array2[] = "bowl";
print_r($array2);
echo $array2[1];

$array3 = array (
    'name' => 'John',
    'age' => 35, 
    'email' => 'email@email.com',
);
print_r($array3);
echo $array3['age'];
?>