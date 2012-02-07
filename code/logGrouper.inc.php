<?php

function logGrouper_groupFiles($list) {
    $return = array();
    foreach ($list as $file) 
    {
        $return[$file['Date']][] = $file;
    }
    return $return;
}
?>
