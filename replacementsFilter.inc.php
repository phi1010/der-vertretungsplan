<?php

/**
 * Sortiert die Tage nach Datum und die Vertretungen nach Klasse, Stunde und Fach.
 * @param array $data
 * @return array 
 */
function replacementsFilter_filter($data) {

    function replacementsFilter_cmpDays($a) {
        return ceil(($a['Date'] - time()) / (60 * 60 * 24)) >= 0;
    }

    $data = array_filter($data, 'replacementsFilter_cmpDays');

    return $data; //Der Rückgabewert kann ignoriert werden, ermöglicht aber eine kompaktere Schreibweise.
}

?>
