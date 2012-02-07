<?php

function logQuery_getFilenames() {
    $files = array();
    if ($handle = opendir('./COPYS')) {
        while (false !== ($file = readdir($handle))) {
            if ($file != "." && $file != ".." && $file != "index.php") {
                $files[] = $file;
            }
        }
        closedir($handle);
    }
    return $files;
}

?>
