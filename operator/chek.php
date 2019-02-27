<?php
$noob1 = (rand(1, 10000) );
$noob2 = (rand(1, 10000) );


    $length = 3;
    $randomBytes = openssl_random_pseudo_bytes($length);
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $result = '';
    for ($i = 0; $i < $length; $i++)
    $result .= ($characters[ord($randomBytes[$i]) % $charactersLength]);
	

    $length2 = 5;
    $randomBytes2 = openssl_random_pseudo_bytes($length2);
    $characters2 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $charactersLength2 = strlen($characters2);
    $result2 = '';
    for ($t = 0; $t < $length; $t++)
    $result2 .= ($characters2[ord($randomBytes2[$t]) % $charactersLength2]);



 $h1= ( $noob1);
 $h2= ( $result);
 $h5= ( $result2);
 $h3= ( $noob2 );

$h4=$h1.$h2.$h3.$h5;

// hasil
echo $h4;

?>

