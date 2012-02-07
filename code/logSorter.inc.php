<?php

function logSorter_cmpFiles($a, $b) {
    if ($a['DateRaw'] == $b['DateRaw']) {
        if ($a['ChangedRaw'] == $b['ChangedRaw'])
            return 0;
        return ($a['ChangedRaw'] < $b['ChangedRaw']) ? -1 : 1;
    }
    return ($a['DateRaw'] < $b['DateRaw']) ? -1 : 1;
}

/**
 * Sortiert die Tage nach Datum und die Vertretungen nach Klasse, Stunde und Fach.
 * @param array $data
 * @return array 
 */
function logSorter_sort($list) {
    uasort($list, 'logSorter_cmpFiles');
    return $list;
}

?>
