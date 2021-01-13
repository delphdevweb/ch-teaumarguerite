<?php
/**
 * @package meteo
 * @version 1
 */
/*
Plugin Name: Meteo
Plugin URI: https://dev5.hmz.tf/plugins/meteo/
Description: Affiche la méteo de Prévenchères
Author: Delphine
Version: 1.7.2
Author URI: 
*/

add_action( 'wp_footer', 'meteo' );

function meteo() {
    $curl = curl_init('http://api.openweathermap.org/data/2.5/weather?q=Prévenchères&lang=fr&appid=0f4e2cdf7117715c0e34862e484fec91');
    
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
    $data = curl_exec($curl);
    
    if ($data===false) {
    var_dump(curl_error($curl));
    
    } else {
    
    $data = json_decode($data,true);
    $weather = $data['weather'][0]['description'];
    $icone = $data['weather'][0]['icon'];
    $temps = $data['main']['temp']- 273.15;
    
    
        echo "
        <div class='meteo'>
            <h2>Météo</h2>
            <img src='https://dev5.hmz.tf/delphine/wordpress/wp-content/plugins/meteo/img/${icone}.png' alt='icone meteo'>
            <h3>$temps °c</h3>
            </div>
        ";
    }
    
    curl_close($curl);
    }


