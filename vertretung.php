<?php

vertretungen();

function vertretungen() {
    $h2_start = "<td class = \"Ueberschrift\" colspan=\"8\"><h2>";
    $h2_ende = "</h2></td>";
    $i = 0;
    $date = date("d.m.Y");

    //Einfügen nach Schlüsseln

    $pdate = timestamp(get_date("Mon")); //Datum als Datumsformat
    $pdate2 = getdate($pdate);
    $content[$pdate2['year']][$pdate2['mon']][$pdate2['mday']] = array($pdate, parse("Mon"), "Montag"); //Timestamp als int, HTML, Name des Wochentags

    $pdate = timestamp(get_date("Tue"));
    $pdate2 = getdate($pdate);
    $content[$pdate2['year']][$pdate2['mon']][$pdate2['mday']] = array($pdate, parse("Tue"), "Dienstag");

    $pdate = timestamp(get_date("Wed"));
    $pdate2 = getdate($pdate);
    $content[$pdate2['year']][$pdate2['mon']][$pdate2['mday']] = array($pdate, parse("Wed"), "Mittwoch");

    $pdate = timestamp(get_date("Thu"));
    $pdate2 = getdate($pdate);
    $content[$pdate2['year']][$pdate2['mon']][$pdate2['mday']] = array($pdate, parse("Thu"), "Donnerstag");

    $pdate = timestamp(get_date("Fri"));
    $pdate2 = getdate($pdate);
    $content[$pdate2['year']][$pdate2['mon']][$pdate2['mday']] = array($pdate, parse("Fri"), "Freitag");

    unset($pdate);
    unset($pdate2);

    //Nach Jahr sortieren, Keys auf 0,1,2,... setzen
    ksort($content);
    $years = array_values($content);

    for ($iy = 0; $iy < count($years); $iy++) {
        //Nach Monat sortieren, Keys auf 0,1,2,... setzen
        ksort($years[$iy]);
        $months = array_values($years[$iy]);

        for ($im = 0; $im < count($months); $im++) {
            //Nach Tag sortieren, Keys auf 0,1,2,... setzen
            ksort($months[$im]);
            $days = array_values($months[$im]);

            for ($id = 0; $id < count($days); $id++) {
                $cday = $days[$id];
                $diff = dateDiffInDays(time(), $cday[0]);
                if ($diff >= 0) {
                    //Tag ausgeben
                    print( $h2_start . $cday[2] . ", " . date("d.m.Y", $cday[0]) . " (" . getDayNumberString($diff) . ")" . $h2_ende);
                    display($cday[1]);
                    print( "<tr><td><br/><br/></tr></td>");
                }
            }
        }
    }
}

/**
 * @param integer $numberOfDays
 * @return string 
 */
function getDayNumberString($numberOfDays) {
    switch ($numberOfDays) {
        case 0:
            return "Heute";
            break;
        case 1:
            return "Morgen";
            break;
        case 2:
            return "&Uuml;bermorgen";
            break;
        default:
            return "In $numberOfDays Tagen";
            break;
    }
}

/**
 * Gibt den Unterschied zwischen 2 Datumsweren in angebrochenen Tagen zurück.
 * @param integer $a UNIX Timestamp
 * @param integer $b UNIX Timestamp
 * @return integer
 */
function dateDiffInDays($a, $b) {
    $_24hours = 24 * 60 * 60;
    return ceil(($b - $a) / $_24hours);
}

/**
 *
 * @param string $text Datum im deutschen Format: "24.12.2000"
 * @return integer UNIX Timestamp
 */
function timestamp($text) {
    //Quelle RegEx: http://www.php-resource.de/forum/showthread/t-13403.html
    //Erst dt. Datum in en. Datum wandeln
    return strtotime(preg_replace("#([0-9]{2})\.([0-9]{2})\.([0-9]{4})#", "\\3-\\2-\\1", $text));
}

function get_date($day) {
    $break = false;
    $url = generate_url($day);
    $file = @fopen($url, "r");
    if ((@fopen($url, "r") != false)) {
        while ((!feof($file)) && ($break == false)) {
            $str = fgets($file);
            if (strpos($str, "</h2>") != false) {
                $break = true;
                fclose($file);
                $pos = strripos($str, date("Y")) - 6;
                return substr($str, $pos, 10);
            }
        }
    } else {
        return false;
    }
    return false;
}

function parse($day) {
    $break = false;
    $i = 0;
    $ersetzen = array("<td>" => "<td class = \"TabelleMitteilung\" colspan=\"8\">");
    $url = generate_url($day);
    $file = @fopen($url, "r");
    if ((@fopen($url, "r") != false)) {
        while ((!feof($file)) && ($break == false)) {
            $str = fgets($file);
            // parsen der Mitteilungen
            if (stristr($str, "<center><table class=\"TabelleMitteilung\" caption=\"Mitteilung\">") != false) {
                $array[$i] = $str;
                $i++;
                $array[$i] = "<tr>";
                $i++;
                while (!feof($file) && (stristr($str, "</table>") == false)) {
                    $str = fgets($file);
                    $array[$i] = strtr($str, $ersetzen);
                    $i++;
                }
                $array[$i] = "</tr>";
                $i++;
            }
            // parsen der Vertretungsplantabelle
            if (stristr($str, "<table class=\"TabelleVertretungen\" cellpadding=\"2px\">") != false) {
                $array[$i] = $str;
                $i++;
                while (!feof($file) && (stristr($str, "</table>") == false)) {
                    $str = fgets($file);
                    $array[$i] = $str;
                    $i++;
                }
                $break = true;
            }
        }
        $array[$i] = "<tr><td class = \"TabelleMitteilung\" colspan=\"8\">Quelle: <a href=\"$url\" target=\"_blank\">$url</a></td></tr>";
        fclose($file);
        return $array;
    } else {
        return false;
    }
}

function display($array) {
    $array_length = count($array);
    $i = 0;
    while ($array_length > $i) {
        if (!stripos($array[$i], "table") && !stripos($array[$i], "caption")) {
            echo utf8_encode($array[$i]);
            $i++;
        } else {
            $i++;
        }
    }
}

/**
 * @param string $day Mon/Tue/Wed/Thu/Fri
 * @return string 
 */
function generate_url($day) {
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