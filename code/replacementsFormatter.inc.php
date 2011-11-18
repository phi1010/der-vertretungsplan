<?php

/**
 * Formatiert die Daten für die Ausgabe
 * @param array $data 
 * @return string HTML-Code
 */
function replacementsFormatter_format($data) {

    $wtage = array("Sonntag",
        "Montag",
        "Dienstag",
        "Mittwoch",
        "Donnerstag",
        "Freitag",
        "Samstag");

    $res = '';
    foreach ($data as $day) {
        $date = $day['Date'];
        $date = $wtage[date("w", $date)] . ", " . date('j.m.Y', $date)
                . " ("
                . replacementsFormatter_getDayCountText(ceil(($date - time()) / (60 * 60 * 24)))
                . ")";
        $changed = $day['DateChanged'];
        $changed = $wtage[date("w", $changed)] . ", " . date('j.m.Y G:i', $changed)
                . " ("
                . replacementsFormatter_getDayCountText(ceil(($changed - time()) / (60 * 60 * 24)))
                . ")";

        //DATUM
        $res .= "<h2>$date</h2>\n";

        // ANMERKUNGEN
        if (count($day['Notices']) > 0) {
            $res .= "<ul>\n";
            foreach ($day['Notices'] as $notice) {
                $res .= "<li>$notice</li>\n";
            }
            $res .= "</ul>\n";
        }

        // VERTRETUNGEN
        if (count($day['Entries']) > 0) {
            $res .= "<table>\n";
            $res .= "<tr class=\"title\">\n";
            $res .= "<th class=\"course\">Klasse</th>\n";
            $res .= "<th class=\"lesson\">Std.</th>\n";
            $res .= "<th class=\"oldsubject\">urspr. Fach</th>\n";
            $res .= "<th class=\"newteacher\">Vertretung</th>\n";
            $res .= "<th class=\"room\">Raum</th>\n";
            $res .= "<th class=\"newsubject\">Fach</th>\n";
            $res .= "<th class=\"description\">Bemerkung</th>\n";
            $res .= "</tr>\n";
            $even = false;
            foreach ($day['Entries'] as $entry) {
                $eventext = $even ? "even" : "odd";
                $even = !$even;

                $course = $entry['Course'];
                $lesson = $entry['Lesson'];
                $oldsubject = $entry['OldSubject'];
                $newteacher = $entry['NewTeacher'];
                $newsubject = $entry['NewSubject'];
                $room = $entry['Room'];
                $description = $entry['Instead'] . (($entry['Instead'] != "" && $entry['Description'] != "") ? "; " : "") . $entry['Description'];

                $res .= "<tr class=\"$eventext\">\n";
                $res .= "<td class=\"course\">$course</td>\n";
                $res .= "<td class=\"lesson\">$lesson</td>\n";
                $res .= "<td class=\"oldsubject\">$oldsubject</td>\n";
                $res .= "<td class=\"newteacher\">$newteacher</td>\n";
                $res .= "<td class=\"newsubject\">$newsubject</td>\n";
                $res .= "<td class=\"room\">$room</td>\n";
                $res .= "<td class=\"description\">$description</td>\n";
                $res .= "</tr>\n";
            }
            $res .= "</table>\n";
        }
        // ÄNDERUNG
        $url = $day['URL'];
        $res .= "<cite>Quelle: <a href=\"$url\">$url</a><br/>Letzte Änderung: $changed</cite>\n";
    }
    return $res;
}

/**
 * Gibt einen Text zurück, der die Anzahl der Tage beschreibt (Heute, Morgen, Übermorgen, In ... Tagen).
 * @param integer $numberOfDays Anzahl der *angebrochenen* Tage = Anzahl der vollen Tage + 1
 * @return string 
 */
function replacementsFormatter_getDayCountText($numberOfDays) {
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
            if (abs($numberOfDays) >= 7)
                return ($numberOfDays < 0) ? ("Vor " . (floor(-$numberOfDays / 7)) . " Wochen") : ("In " . (floor($numberOfDays / 7)) . " Wochen");
            else
                return ($numberOfDays < 0) ? ("Vor " . (-$numberOfDays) . " Tagen") : ("In " . $numberOfDays . " Tagen");
    }
}

?> 