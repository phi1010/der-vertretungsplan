<?php

function logParser_parseFilenames($list) {
    return array_filter(array_map('logParser_parseFilename', $list));
}

function logParser_parseFilename($filename) {
    if (@preg_match('#((\d+)-(\d+)-(\d+)) ((\d+)-(\d+)-(\d+)-(\d+)-(\d+)) ([\d\w]+)\.html#i', $filename, &$matches))
        return array(
            'DateRaw' => $matches[1], // "YYYY-MM-DD"
            'Date' => $matches[4] . "." . $matches[3] . "." . $matches[2], // "DD.MM.YYYY"
            'ChangedRaw' => $matches[5], // "YYYY-MM-DD-hh-mm"
            'Changed' => $matches[8] . "." . $matches[7] . "." . $matches[6] . " " . $matches[9] . ":" . $matches[10], // "DD.MM.YYYY hh:mm"
            'Hash' => substr($matches[11], 0, 8), // "ffffffffffffffffffffffffffffffff"
            'Filename' => $filename // "YYYY-MM-DD YYYY-MM-DD-hh-mm ffffffffffffffffffffffffffffffff.html"
        );
    return false;
}

?>
