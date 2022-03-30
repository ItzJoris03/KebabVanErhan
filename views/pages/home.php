<link rel="stylesheet" href="<?=$dir?>/assets/styles/home/style.css">

<?php
echo "<div class='header'>
        <img src='$dir/assets/img/banner.png' alt='Kraam Kebab van Erhan'>
        <div class='img__overlay'>
            <h1>Welkom bij Kebab van Erhan</h1>
            <h2>De lekkerste foodtruck van Twente</h2>
            <h3>Da's pas lekker man!</h3>
        </div>
    </div>";


echo "<div class='home'>
        <img src='$dir/assets/img/erhan.jpg' alt='Erhan'>
        <div class='content'>
            <h2>Welkom</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec aliquam elit vitae mauris vestibulum, sed ornare nunc finibus. Nulla facilisi. Proin tincidunt porttitor nisi at varius. </p><p>Curabitur vel odio eu nulla dictum commodo. Maecenas venenatis metus diam, vel rhoncus lacus consequat ultricies. Nulla elementum auctor orci quis vestibulum. Suspendisse tempor vehicula vulputate.</p>
        </div>
    </div>";

$locations = $db->getLocations();

echo "<div class='locations'>
        <div class='content'>";
foreach($locations as $i => $type) {
    $TimeStart = $locations[$i]['TimeStart'];
    $TimeEnd = $locations[$i]['TimeEnd'];
    $place = $locations[$i]['Place'];
    $name = $locations[$i]['Name'];
    $day = $locations[$i]['Day'];

    $TimeStart = substr($TimeStart, 0, 2) .'.'. substr($TimeStart, 3, 2);
    $TimeEnd = substr($TimeEnd, 0, 2) .'.'. substr($TimeEnd, 3, 2);

    echo "<p class='location'>$place, $name</p>
        <p class='time'>$day - $TimeStart - $TimeEnd uur</p>";
}
echo "</div>
    <img src='$dir/assets/img/location-img.jpg' alt='Locatie Vroomshoop'>
    <span class='bg-text'>Standplaatsen</span>
    </div>";

include_once "$dir/views/pages/contact.php";
?>