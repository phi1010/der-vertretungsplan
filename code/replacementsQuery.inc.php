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

function replacementsQuery_getContents() {
    global $urls;
    $res = array();
    foreach ($urls as $key => $value) {
        $day = replacementsQuery_getURL($value);
        if ($day != null)
            $res[$value] = $day;
    }
    return $res;
}

function replacementsQuery_getURL($url) {
    if ($url == null || $url == '')
        return null;
    
    if (extension_loaded('apc')) {
        $headernow = get_headers($url, 1);
        $etagnow = $headernow['ETag'];
        
        $urldata = apc_fetch('replacementsQuery_'.$url);
        if ($urldata != false) {
            $etagold = $urldata['ETag'];
            if ($etagnow == $etagold)
                return $urldata['Text'];
        }
    }
    
    $filecontent = @file_get_contents($url);
    if ($filecontent == false || $filecontent == null || $filecontent == '')
        return null;
    
    if (extension_loaded('apc')) {
        echo "UPDATED replacementsQuery_$url";
        apc_store('replacementsQuery_'.$url, array('ETag'=>$etagnow, 'Text'=>$filecontent),1*60*60);
    }
    
    return $filecontent;
}



?>
