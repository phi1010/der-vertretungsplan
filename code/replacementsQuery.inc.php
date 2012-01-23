<?php

/**
 * Die Liste mit den URLs der Vertretungspläne.
 */
$urls = array(
    'Mon' => "http://asg-er.dyndns.org/vertretung/students/schuelerplan_mo.htm",
    'Tue' => "http://asg-er.dyndns.org/vertretung/students/schuelerplan_di.htm",
    'Wed' => "http://asg-er.dyndns.org/vertretung/students/schuelerplan_mi.htm",
    'Thu' => "http://asg-er.dyndns.org/vertretung/students/schuelerplan_do.htm",
    'Fri' => "http://asg-er.dyndns.org/vertretung/students/schuelerplan_fr.htm"
);
function replacementsQuery_getContents()
{
    global $urls;
    $res = array();
    foreach ($urls as $key => $value) {
        $day = replacementsQuery_getURL($value);
        if ($day != null)
            $res[$value] = $day;
    }
    return $res;
}
function replacementsQuery_getURL($url)
{
    if ($url == null || $url == '')
        return null;
    $header = array();
    $filecontent = @file_get_contents($url);
    if ($filecontent == false || $filecontent == null || $filecontent == '')
        return null;
    return $filecontent;
}
?>
