<?php
$noob1 = (rand(1, 1000000)  );
$noob2 = (rand(1, 1000000) . "<br>");

?>

<?php
    $length = 2;
    $randomBytes = openssl_random_pseudo_bytes($length);
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $result = '';
    for ($i = 0; $i < $length; $i++)
    $result .= ($characters[ord($randomBytes[$i]) % $charactersLength]);

 $h1= ( $noob1);
 $h2= ( $result);
 $h3= ( $noob2 );

$h4=$h1.$h2.$h3;
echo $h4;

?>

