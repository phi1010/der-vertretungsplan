<?php
/**
 * @param string $day Mon/Tue/Wed/Thu/Fri
 * @return string 
 */
function urlReplacements($day) {
    $url = "http://asg-er.dyndns.org/vertretung/students/schuelerplan_";
    switch ($day) {
        case "Mon":
            return $url . "mo" . ".htm";
        case "Tue":
            return $url . "di" . ".htm";
        case "Wed":
            return $url . "mi" . ".htm";
        case "Thu":
            return $url . "do" . ".htm";
        case "Fri":
            return $url . "fr" . ".htm";
    }
}
?>
