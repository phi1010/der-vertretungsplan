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

    foreach ($data as $key1 => &$day) {
        foreach ($day['Entries'] as $key2 => &$replacement) {
            $name = $replacement['NewTeacher'];
            if ((preg_match('#^_.*#', $name) == 0) && ($name != 'Praktikant') && ($name != 'Stillarbeit')) {
                $replacement['NewTeacher'] = substr($name, 0, 4);
            }
        }
    }

    return $data;
}

?>
