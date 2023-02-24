<?php 
echo 'Hello World';

$variable = 'Hello World';

#single & double quote
$variable = "Hello, I'm a variable";
$variable = 'Hello, I\'m a variable'; 
$variable = 'Hello, I"m a variable';
$variable = 'a href=""';
$variable = 'I am' . 'variable';
echo $variable; 

$number = 22;
$number = $number*2;
echo $number;

#single quote print it literlaly, double quote render it
echo "My age is $number";
echo 'My age is $number'; 

#use concenate to use single qoute
echo 'My age is '. $number;

#you can't do
// $number = 22nd;
// $23number = 22;

echo "<br>";
echo "<br>";
#variable variable
$number = 40;
$a = "number";
echo 'My age is ' . $$a;
echo "<br>";
echo "<br>";
echo "<br>";
$nama = "siska";


#array'
$array = array('name', 'email', 'address');
print_r($array);
echo "<br>";
echo $array[0];
echo "<br>";
echo "<br>";

// #output:
// #Array ( [0] => name [1] => email [2] => address ) 
// # [0], [1], [2] ===> key
// # name, email, address ===> value or name
// echo $array[0]; #key [0] value = name
// echo $array[1]; #key [1] value = email
// echo $array[2]; #key [2] value = address

#useful for looping
$array2['nama'] = "Siska";
$array2['alamat'] = "Depok";
$array2['email'] = "siska@email.com";
print_r($array2);
echo "<br>";
echo $array2['nama'];
echo "<br>";
echo "<br>";


$array3 = array( 
    #'key' ==> 'name/value',
    'name' => 'John',
    'age' => '35',
    'email' => 'John@email.com',
);
print_r($array3);
echo $array3['name'];

?>