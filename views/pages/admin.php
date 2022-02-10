<?php

if(isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
    echo "<p>This is an admin page</p>";
    echo "<a href='$dir/?Logout'>Logout</a>";
} else {
    header("Location: $dir/");
}

?>