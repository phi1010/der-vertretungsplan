<?php

/**
 * Sortiert die Tage nach Datum und die Vertretungen nach Klasse, Stunde und Fach.
 * @param array $data
 * @return array 
 */
function replacementsFilter_filter($data) {

    function replacementsFilter_cmpDays($a) {
        return $a['Date'] >= (time() - floor(time() % (60 * 60 * 24)));
    }

    $data = array_filter($data, 'replacementsFilter_cmpDays');

    return $data; //Der Rückgabewert kann ignoriert werden, ermöglicht aber eine kompaktere Schreibweise.
}

?>
