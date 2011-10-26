<?php

include("URLs.php");
parseReplacements(urlReplacements("Thu"));

function parseReplacements($url) {
    $filecontent = file_get_contents($url);
    $filecontent = preg_replace(array('#<meta(.*?)>#i', '#<br\s*>#i'), array('<meta$1/>', '<br/>'), $filecontent);
    $doc = new DOMDocument();
    $loadHTML = $doc->loadHTML($filecontent);
    echo var_dump($doc);
}
?>