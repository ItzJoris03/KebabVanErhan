<?php

// This page includes the footer that exist on every single page
$TodaysDay = date('l');
$now = date('H:i:s');
$locations = $db->getLocations($TodaysDay);

if($locations) {
    $TimeStart = $locations[0]['TimeStart'];
    $TimeEnd = $locations[0]['TimeEnd'];
    $place = $locations[0]['Place'];
    $name = $locations[0]['Name'];

    $open = ($TimeStart < $now && $now < $TimeEnd) ? true : false;

    $TimeStart = substr($TimeStart, 0, 2) .'.'. substr($TimeStart, 3, 2);
    $TimeEnd = substr($TimeEnd, 0, 2) .'.'. substr($TimeEnd, 3, 2);
} else {
    $open = false;
    $tomorrow = date('l', strtotime('tomorrow'));
    $locations = $db->getLocations($tomorrow);

    $TimeStart = $locations[0]['TimeStart'];
    $TimeEnd = $locations[0]['TimeEnd'];
    $place = $locations[0]['Place'];
    $name = $locations[0]['Name'];

    $TimeStart = substr($TimeStart, 0, 2) .'.'. substr($TimeStart, 3, 2);
    $TimeEnd = substr($TimeEnd, 0, 2) .'.'. substr($TimeEnd, 3, 2);
}
?>


<link rel="stylesheet" href="<?=$dir?>/assets/styles/footer/style.css">
<footer>
    <div class="footer_container">
        <div class="information">
    	    <img src="<?=$dir?>/assets/img/logo.jpg" alt="Logo Kebab van Erhan">
            <div class="next_location">
                <?php
                if ($open) {
                    echo "<div class='top'>
                              <p class='open'>We staan momenteel hier:</p>
                            </div>
                            <div class='bottom'>
                                <p class='location'>$place, $name</p>
                                <p class='time'>$TodaysDay - $TimeStart - $TimeEnd uur</p>
                            </div>";
                } else {
                    echo "<div class='top'>
                            <p class='closed'>Momenteel zijn wij gesloten</p>
                        </div>
                        <div class='bottom'>
                            <p>Eerst volgende locatie:</p>
                            <p class='location'>$place, $name</p>
                            <p class='time'>$TodaysDay - $TimeStart - $TimeEnd uur</p>
                        </div>";
                }
                ?>
            </div>
            <?php include "$dir/views/navbar.php"; ?>
            <div class="contact">
                <a href="mailto:kocdonerkebab@gmail.com" class="mail">kocdonerkebab@gmail.com</a>
                <a href="tel:+31640818332" class="phone">06 40818332</p>
                <div class="social">
                    <a href="https://www.facebook.com/Kebab-van-Erhan-106600930827421/">
                        <img class="fb" src="<?=$dir?>/assets/img/facebook-icon.png" alt="Facebook">
                    </a>
                    <a href="https://www.instagram.com/kebab_van_erhan/">
                        <img class="insta" src="<?=$dir?>/assets/img/insta-icon.png" alt="Instagram">
                    </a>
                </div>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; 2022 &middot; Kebab van Erhan | Designed by <a href="https://www.joriswebdev.com/">Joris Hummel</a></p>
            <a href="<?=$dir?>/login" class="login">
                <img src="<?=$dir?>/assets/img/login.png" alt="Login">
            </a>
        </div>
    </div>
</footer>