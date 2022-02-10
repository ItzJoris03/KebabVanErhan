<?php

function checkActive(string $page = 'home') : string {
    return ($_POST['page'] === $page) ? 'active ' : '';
}

?>