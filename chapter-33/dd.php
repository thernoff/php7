<?php
function dd($value)
{
    if (is_array($value) || is_object($value)){
        echo "<pre>";
        print_r($value);
        echo "</pre>";
    } else {
        echo "<pre>";
        echo $value;
        echo "</pre>";
    }
    die;
}