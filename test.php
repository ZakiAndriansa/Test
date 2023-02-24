<?php 

#variable
$number = 30;
$number = $number * 2;
echo $number;
echo '<br>';

$nama_depan = "Muhammad, Zifa, Hannaya";
$nama_belakang = "Zidan";
$nama_lengkap = $nama_depan . " " . $nama_belakang;
echo $nama_lengkap;
echo '<br>';
echo '<br>';

#array
$array = array('nama','alamat','email', 33);
var_dump($array);
echo '<br>';

$array2['nama'] = "Doni";
$array2['alamat'] = "Depok";
$array2['email'] = "doni@email.com";
$array2['no_hp'] = 82310101010;
print_r($array2);
echo '<br>';

$array3 = array (
    'nama' => 'Doni',
    'alamat' => 'Depok',
    'email' => 'doni@email.com',
    'no_hp' => 82310101010,
);
print_r($array3);

echo $array3['nama'];
echo $array3['alamat'];





?>
