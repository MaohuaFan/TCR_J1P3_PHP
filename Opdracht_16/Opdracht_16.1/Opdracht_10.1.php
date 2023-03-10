<?php

function rand_string( $length ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    return substr(str_shuffle($chars),0,$length);

}

echo "willekeurig wachtwoord van 10 teken: " . rand_string(10);

?>