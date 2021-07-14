<?php
function sanitizeString($var)
{
    $var = trim($var);  //me
    if (get_magic_quotes_gpc())
        $var = stripslashes($var);
    $var = strip_tags($var);
    $var = htmlentities($var);
    return $var;
}