<?php
// This page is the navbar at the top of almost every page.

require_once "$dir/utils/check/check_active.php";
require_once "$dir/utils/maintenance.php";

$state = $m->checkMaintenance($m->NAVBAR);
$disabled = ($state) ? "disabled" : "" ;

echo "  <link rel='stylesheet' href='$dir/assets/styles/nav/style.css'>
        <nav>
            <a href='$dir/' class='logo'>
                <img src='$dir/assets/img/logo.jpg' alt='Logo Kebab Van Erhan'>
            </a>
            <div class='hamburger'>
                <div class='line top'></div>
                <div class='line middle'></div>
                <div class='line bottom'></div>
            </div>
            <ul>
                <li>
                    <a href='$dir/' class='".checkActive()."$disabled'>Home</a>
                </li>
                <li>
                    <a href='$dir/informatie' class='".checkActive('information')."$disabled'>Informatie</a>
                </li>
                <li class='menu'>
                    <a href='$dir/menu' class='".checkActive('menu')."$disabled'>Menu</a>
                </li>
                <li class='logo'>
                    <a href='$dir/' class='logo'>
                        <img src='$dir/assets/img/logo.jpg' alt='Logo Kebab Van Erhan'>
                    </a>
                </li>
                <li>
                    <a href='$dir/fotos' class='".checkActive('photos')."$disabled'>Foto's</a>
                </li>
                <li>
                    <a href='$dir/contact' class='".checkActive('contact')."$disabled'>Contact</a>
                </li>";
                if(isset($_SESSION['admin']) && $_SESSION['admin'] === true) 
                    echo "<li class='admin'>
                            <a href='$dir/admin' class'".checkActive('admin')."$disabled'>Admin</a>
                        </li>";
echo         "</ul>
        </nav>";