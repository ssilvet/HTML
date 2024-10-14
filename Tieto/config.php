<?php

$kasutaja = "ssilvet"; // andmebaasi kasutajanimi
$dbserver = "localhost"; // andmebaasi server 
$andmebaas = "kohvikud"; // andmebaasi nimi
$pw = "uus_parool"; // andmebaasi parool

// Loome ühenduse MySQL andmebaasiga, kasutades mysqli_connect funktsiooni
$yhendus = mysqli_connect($dbserver, $kasutaja, $pw, $andmebaas);

// kontrollime kas ühendus õnnestus
if (!$yhendus) {
    // Kui ühendust ei õnnestunud luua näitame veateadet 
    die("EI saa ühendust! Viga: " . mysqli_connect_error());
}
