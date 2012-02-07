<?php

function logFormatter_format($list) {

    $fileext = ".html";
    echo "<ul class=\"list\">\n";
    foreach ($list as $date => $day) {
        echo "<li>$date<ul>\n";
        foreach ($day as $num => $file) {
            echo "<li><a href=\"http://der-vertretungsplan.de.vu/COPYS/{$file['Filename']}\">{$file['Changed']} ({$file['Hash']})</a></li>\n";
        }
        echo "</ul></li>\n";
    }
    echo "</ul>\n";
}

?>
