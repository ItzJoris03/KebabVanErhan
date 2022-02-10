<?php 

// Debug function
// Uses var_dump when $code is different than 1
// Uses print_r when $code is 1

function debug(mixed $variable ,int $code = 0) : void {
    echo "<pre>";
    ($code === 1) ? print_r($variable) : var_dump($variable);
    echo "</pre>";
}

?>