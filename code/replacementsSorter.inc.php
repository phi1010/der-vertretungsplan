<?php

function replacementsSorter_cmpDays($a, $b) {
    if ($a['Date'] == $b['Date']) {
        return 0;
    }
    return ($a['Date'] < $b['Date']) ? -1 : 1;
}

function replacementsSorter_cmpEntries($a, $b) {
    $res = strnatcmp($a['Course'], $b['Course']);
    if ($res == 0) {
        $res = strnatcmp($a['Lesson'], $b['Lesson']);
        if ($res == 0) {
            $res = strnatcmp($a['OldSubject'], $b['OldSubject']);
        }
    }
    return $res;
}

/**
 * Sortiert die Tage nach Datum und die Vertretungen nach Klasse, Stunde und Fach.
 * @param array $data
 * @return array 
 */
function replacementsSorter_sort($data) {


    uasort($data, 'replacementsSorter_cmpDays');
    foreach ($data as $day) {
        usort($day['Entries'], 'replacementsSorter_cmpEntries');
    }
    return $data; //Der Rückgabewert kann ignoriert werden, ermöglicht aber eine kompaktere Schreibweise.
}

?>
