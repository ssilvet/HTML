<?php

// postituse laadmine
function loadPosts() {
    $filename = 'data.txt'; // teksti fail kus kohast postitused laetakse
    $posts = []; // tyhi massiiv postituste jaoks
    if (file_exists($filename)) { // kontrollime kas salvestus koht on olemas
        $lines = file($filename, FILE_IGNORE_NEW_LINES); // loeme failist kõik read eemaldame reavahetused
        foreach ($lines as $line) { // käib läbi kõik read failis
            $posts[] = explode(':', $line); // eraldab rea kooloniga ja lisab posts massiivi
        }
    }
    return $posts; 
}

// postituse salvestamine
function savePost($title, $text) {
    $filename = 'data.txt'; // fail kuhu postitus salvestub
    $line = $title . ':' . $text . "\n"; // kuidas salvestab- pealkirja ja tekstil on vahe ja uus rida
    file_put_contents($filename, $line, FILE_APPEND); // kuhu salvestab, mida salvestab ja jätab olemasoleva alles
}

// postituse kustutamine
function deletePost($index) {
    $filename = 'data.txt'; // kus kohast postitus kustutatakse
    $lines = file($filename, FILE_IGNORE_NEW_LINES); // loeme failist kõik read eemaldame reavahetused
    if (isset($lines[$index])) { // Kontrollib, kas indeksiga $index element eksisteerib massiivis $lines
        unset($lines[$index]); // Eemaldab vastava indeksi elemendi massiivist $lines
        file_put_contents($filename, implode("\n", $lines) . "\n"); // kirjutab uuendatud massiiv tagasi faili
    }
}
?>
