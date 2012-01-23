<?php
function replacementsPreprocessor_process($contents) {
    $res = array();
    foreach ($contents as $url => $text) {
        $res[$url] = preg_replace(array('#<meta([^>]*)>#i', '#<br\s*>#i'), array('', '<br/>'), $text);
    }
    return $res;
}
?>
