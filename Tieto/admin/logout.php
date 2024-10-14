<?php
session_start(); // alustame sessiooni
session_destroy(); // lõpetab sessiooni ja eemaldame kõik sessiooni andmed
header('Location: login.php'); // suunab tagasi sisselogimislehele
exit();
