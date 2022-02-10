<?php

function checkdir() : void {
    $dir = ($_POST['page'] === 'home') ? '.' : '..';
}

?>