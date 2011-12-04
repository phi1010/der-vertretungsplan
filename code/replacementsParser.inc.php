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

/**
 * Parst alle Vertretungspläne.
 * @global array $urls
 * @return array 
 */
function replacementsParser_parse() {
    global $urls;
    $res = array();
    foreach ($urls as $key => $value) {
        $day = replacementsParser_parseURL($value);
        if ($day != null)
            $res[$key] = $day;
    }
    return $res;
}

/**
 * Parst das Dokument mit der angegeben URL.
 * @param string $url
 * @return array ('URL' => string, 'DateChanged' => int, 'Date' => int, 'Notices' => array(string), 'Entries' => array(array('Course' => string, 'Lesson' => string, 'OldSubject' => string, 'NewTeacher' => string, 'NewSubject' => string, 'Room' => string, 'Instead' => string, 'Description' => string))) 
 */
function replacementsParser_parseURL($url) {
    if ($url == null || $url == '')
        return null;
    $header = array();
    $filecontent = @file_get_contents($url);
    if ($filecontent == false || $filecontent == null || $filecontent == '')
        return null;
    $filecontent = preg_replace(array('#<meta([^>]*)>#i', '#<br\s*>#i'), array('', '<br/>'), $filecontent);
    $doc = new DOMDocument();
    $doc->loadHTML($filecontent);
    if ($doc == false)
        return null;

    $res['URL'] = $url;

    $html = $doc->documentElement;
    //include 'tree.inc.php';
    //echo tree($html);
    $body = $html->getElementsByTagName('body')->item(0);
    $tables = $body->getElementsByTagName('table');

    $title = $body->getElementsByTagName('h2')->item(0);
    $res['Date'] = replacementsParser_parseDate($title->textContent);

    if ($tables->length >= 1) {
        $header = $tables->item(0)->getElementsByTagName('thead')->item(0);
        $dateChanged = $header->getElementsByTagName('th')->item(2);
        $res['DateChanged'] = replacementsParser_parseDateTime($dateChanged->textContent);

        if ($tables->length >= 2) {
            if ($tables->length >= 3) {
                $notices = $tables->item(1)->getElementsByTagName('td')->item(0);
                $res['Notices'] = replacementsParser_parseNotices($notices, $url);

                $entries = $tables->item(2);
                $res['Entries'] = replacementsParser_parseEntries($entries, $url);
            } else {
                $res['Notices'] = array();
                
                $entries = $tables->item(1);
                $res['Entries'] = replacementsParser_parseEntries($entries, $url);
            }
        }
    }
    return $res;
}

/**
 * Parst die Tabelle mit den Vertretungen.
 * @param DOMElement $element
 * @return array
 */
function replacementsParser_parseEntries($element, $url) {
    $res = array();
    $first = true;
    if ($element == null || $element == false) {
        echo "<p>Fehler beim Parsen der Vertretungen. Bitte informieren sie sich unter auf der <a href=\"$url\">ASG - Website</a></p>\n";
        return $res;
    }
    foreach ($element->getElementsByTagName('tr') as $tr) {
        if ($first) {
            $first = false;
            continue;
        }
        $tds = $tr->getElementsByTagName('td');
        $entry = array('Course' => replacementsParser_prepareString($tds->item(0)->textContent), 'Lesson' => replacementsParser_prepareString($tds->item(1)->textContent), 'OldSubject' => replacementsParser_prepareString($tds->item(2)->textContent), 'NewTeacher' => replacementsParser_prepareString($tds->item(3)->textContent), 'NewSubject' => replacementsParser_prepareString($tds->item(4)->textContent), 'Room' => replacementsParser_prepareString($tds->item(5)->textContent), 'Instead' => replacementsParser_prepareString($tds->item(6)->textContent), 'Description' => replacementsParser_prepareString($tds->item(7)->textContent));
        array_push($res, $entry);
    }
    return $res;
}

/**
 * Parst die Tabelle mit den Mitteilungen.
 * @param DOMElement $element
 * @return array 
 */
function replacementsParser_parseNotices($element, $url) {
    $res = array();
    if ($element == null || $element == false) {
        echo "<p>Fehler beim Parsen der Meldungen. Bitte informieren sie sich unter auf der <a href=\"$url\">ASG - Website</a></p>\n";
        return $res;
    }
    foreach ($element->childNodes as $notice) {
        if ($notice instanceof DOMText)
            if (!preg_match('/^[\s]*$/', $notice->wholeText))
                array_push($res, replacementsParser_prepareString($notice->wholeText));
    }
    return $res;
}

/**
 * Parst eine Datums-/Zeitangabe aus einem ziffernfreien Text.
 * @param string $text Eine Datums-/Zeitangabe in der Form "... 25.07.2011 10:23 ..."
 * @return DateTime 
 */
function replacementsParser_parseDateTime($text) {
    $text = preg_replace('/[\D]*([\d]*)\.([\d]*)\.([\d]*)[\s]*([\d]*):([\d]*)[\D]*/', '$3-$2-$1 $4:$5', $text);
    return strtotime($text);
}

/**
 * Parst eine Datumsangabe aus einem ziffernfreien Text.
 * @param string $text Eine Zeitangabe in der Form "... 25.07.2011 ..."
 * @return DateTime 
 */
function replacementsParser_parseDate($text) {
    $text = preg_replace('/[\D]*([\d]*)\.([\d]*)\.([\d]*)[\D]*/', '$3-$2-$1', $text);
    return strtotime($text);
}

/**
 * Wandelt einen string in das Ausgabeformat um.
 * @param string $text
 * @return string 
 */
function replacementsParser_prepareString($text) {
    return /* utf8_encode */($text);
    //return htmlspecialchars_decode(htmlentities($text, ENT_COMPAT, 'UTF-8'));
}

?>