<?php
function generate_pin() {
    $angka1 = (rand(1, 1000000) );
    $angka2 = (rand(1, 1000000));
    $length = 2;
    $randomBytes = openssl_random_pseudo_bytes($length);
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $result = '';
    for ($i = 0; $i < $length; $i++)
    $result .= ($characters[ord($randomBytes[$i]) % $charactersLength]);

    $h1= ( $angka1);
    $h2= ( $result);
    $h3= ( $angka2 );

    return $h1.$h2.$h3;
}


?>

