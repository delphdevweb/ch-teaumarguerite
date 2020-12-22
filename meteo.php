<?php
/**
 * @package meteo
 * @version 1
 */
/*
Plugin Name: Meteo
Plugin URI: http://wordpress.localhost/plugins/meteo/
Description: Affiche la méteo de Prévenchères
Author: Delphine
Version: 1.7.2
Author URI: 
*/

add_action( 'wp_footer', 'meteo' );


function meteo() {
$url = 'http://api.openweathermap.org/data/2.5/weather?q=Ales&lang=fr&appid=0f4e2cdf7117715c0e34862e484fec91';
$raw = file_get_contents($url);
$json = json_decode($raw);
$ciel = $json->weather[0]->description;
$icone = $json->weather[0]->icon;
$temp = $json->main->temp - 273.15;

    echo "
    <div class='meteo'>
        <h2>Météo</h2>
        <img src='http://wordpress.localhost/wp-content/plugins/meteo/img/${icone}.png' alt='icone meteo'>
        <h3>$temp °c</h3>
        </div>
    ";
};


