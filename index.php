<?php 
//include './utils/secure_conn.php';
session_start();

if(!isset($_POST['page'])) {
    $_POST['page'] = 'home';
}
if($_POST['page'] === 'home') {
    $dir = '.';
}
if(isset($_GET['Logout'])) {
    session_unset();
}

require_once "$dir/utils/maintenance.php";
include "$dir/utils/debug/debug.php";
include "$dir/utils/db_management.php";
include "$dir/utils/errorhandling.php";

$db = new db;

$m = new Maintenance;
$m->setState(true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kebab van Erhan | Da's lekker man!</title>
    <link rel="apple-touch-icon" sizes="57x57" href="<?=$dir?>/assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?=$dir?>/assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?=$dir?>/assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?=$dir?>/assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?=$dir?>/assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?=$dir?>/assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?=$dir?>/assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?=$dir?>/assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?=$dir?>/assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?=$dir?>/assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=$dir?>/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?=$dir?>/assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=$dir?>/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?=$dir?>/assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?=$dir?>/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&family=Shadows+Into+Light&display=swap" rel="stylesheet"> 

    <link rel="stylesheet" href="<?=$dir?>/assets/styles/main.css">
</head>
<body>

    <?php
        // if($_POST['page'] != 'login')
            include "$dir/views/components/navbar.php";
    ?>
    <main>
        <div class="side_pattern rotated"></div>
        <div class="container">
            <?php
            if(!$m->getState()) {
                switch ($_POST['page']) {
                    case 'information':
                        include "$dir/views/pages/information.php";
                        break;
                    case 'admin':
                        include "$dir/views/pages/admin.php";
                        break;
                    case 'login':
                        include "$dir/views/pages/login.php";
                        break;
                    case 'photos':
                        include "$dir/views/pages/photos.php";
                        break;
                    case 'menu':
                        include "$dir/views/pages/menu.php";
                        break;
                    case 'contact':
                        include "$dir/views/pages/contact.php";
                        break;
                    case 'home':
                    default:
                        include "$dir/views/pages/home.php";
                        break;
                }
            } else {
                switch ($_POST['page']) {
                    case 'home':
                        include "$dir/views/pages/home.php";
                        break;
                    case 'menu':
                        include "$dir/views/pages/menu.php";
                        break;
                    case 'login':
                        include "$dir/views/pages/login.php";
                        break;
                    case 'contact':
                        include "$dir/views/pages/contact.php";
                        break;
                    case 'information':
                        include "$dir/views/pages/information.php";
                        break;
                    case 'admin':
                    case 'photos':
                    default:
                    include "$dir/views/pages/maintenance.php";
                        break;
                }
            }
            ?>
        </div>
        <div class="side_pattern"></div>
    </main>
    <?php
        if($_POST['page'] != 'login')
            include "$dir/views/components/footer.php";
    ?>
    <script src="<?=$dir?>/assets/js/extra.js"></script>
</body>
</html>