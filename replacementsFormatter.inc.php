<?php
/**
 * Formatiert die Daten für die Ausgabe
 * @param array $data 
 * @return string HTML-Code
 */
function replacementsFormatter_format($data)
{
}

/**
 * Gibt einen Text zurück, der die Anzahl der Tage beschreibt (Heute, Morgen, Übermorgen, In ... Tagen).
 * @param integer $numberOfDays Anzahl der *angebrochenen* Tage = Anzahl der vollen Tage + 1
 * @return string 
 */
function replacementsFormatter_format_getDayCountText($numberOfDays) {
    switch ($numberOfDays) {
        case -2:
            return "Vorgestern";
        case -1:
            return "Gestern";
        case 0:
            return "Heute";
        case 1:
            return "Morgen";
        case 2:
            return "&Uuml;bermorgen";
        default:
            return ($numberOfDays < 0) ? ("Vor " . (-$numberOfDays) . " Tagen") : ("In " . $numberOfDays . " Tagen");
    }
}



?> 