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

test();

/**
 * Zeigt bei Aufruf mit den URL-Parametern 'all' oder 'day=(Mon|Tue|Wed|Thu|Fri)' das Ergebnis der Parsers an.
 * @global array $urls 
 */
function replacements_test() {
    global $urls;

    if (array_key_exists('day', $_GET))
        echo '<pre>' . print_r(replacements_parseURL($urls[$_GET['day']]), true) . '</pre>';
    else if (array_key_exists('all', $_GET))
        echo '<pre>' . print_r(replacements_parse(), true) . '</pre>';
}

/**
 * Parst alle Vertretungspläne.
 * @global array $urls
 * @return array (array('DateChanged' => DateTime, 'Date' => DateTime, 'Notices' => array(string), 'Entries' => array(array('Course' => string, 'Lesson' => string, 'OldSubject' => string, 'NewTeacher' => string, 'NewSubject' => string, 'Room' => string, 'Instead' => string, 'Comment' => string))))
 */
function replacements_parse() {
    global $urls;
    $res = array();
    foreach ($urls as $key => $value) {
        $day = replacements_parseURL($value);
        if ($day != null)
            $res[$key] = $day;
    }
    return $res;
}

/**
 * Parst das Dokument mit der angegeben URL.
 * @param string $url
 * @return array ('DateChanged' => DateTime, 'Date' => DateTime, 'Notices' => array(string), 'Entries' => array(array('Course' => string, 'Lesson' => string, 'OldSubject' => string, 'NewTeacher' => string, 'NewSubject' => string, 'Room' => string, 'Instead' => string, 'Comment' => string))) 
 */
function replacements_parseURL($url) {
    if ($url == null || $url == '')
        return null;
    $header = array();
    $filecontent = file_get_contents($url);
    if ($filecontent == null || $filecontent == '')
        return null;
    $filecontent = preg_replace(array('#<meta([^>]*)>#i', '#<br\s*>#i'), array('', '<br/>'), $filecontent);
    $doc = new DOMDocument();
    $doc->loadHTML($filecontent);
    if ($doc == false)
        return null;
    return replacements_parseDocument($doc);
}

/**
 * Parst das ganze Dokument.
 * @param DOMDocument $doc
 * @return array ('DateChanged' => DateTime, 'Date' => DateTime, 'Notices' => array(string), 'Entries' => array(array('Course' => string, 'Lesson' => string, 'OldSubject' => string, 'NewTeacher' => string, 'NewSubject' => string, 'Room' => string, 'Instead' => string, 'Comment' => string)))
 */
function replacements_parseDocument($doc) {
    $res = array();

    $html = $doc->documentElement;
    //include 'tree.php';
    //echo tree($html);
    $body = $html->getElementsByTagName('body')->item(0);

    $header = $body->getElementsByTagName('center')->item(0)->getElementsByTagName('thead')->item(0);
    $dateChanged = $header->getElementsByTagName('th')->item(2);
    $res['DateChanged'] = replacements_parseDateTime($dateChanged->textContent);

    $title = $body->getElementsByTagName('h2')->item(0);
    $res['Date'] = replacements_parseDate($title->textContent);

    $notices = $body->getElementsByTagName('center')->item(1)->getElementsByTagName('table')->item(0)->getElementsByTagName('td')->item(0);
    $res['Notices'] = replacements_parseNotices($notices);

    $entries = $body->getElementsByTagName('center')->item(2)->getElementsByTagName('table')->item(0);
    $res['Entries'] = replacements_parseEntries($entries);

    return $res;
}

/**
 * Parst die Tabelle mit den Vertretungen.
 * @param DOMElement $element
 * @return array (array('Course' => string, 'Lesson' => string, 'OldSubject' => string, 'NewTeacher' => string, 'NewSubject' => string, 'Room' => string, 'Instead' => string, 'Comment' => string)) 
 */
function replacements_parseEntries($element) {
    $res = array();
    $first = true;
    foreach ($element->getElementsByTagName('tr') as $tr) {
        if ($first) {
            $first = false;
            continue;
        }
        $tds = $tr->getElementsByTagName('td');
        $entry = array('Course' => $tds->item(0)->textContent, 'Lesson' => $tds->item(1)->textContent, 'OldSubject' => $tds->item(2)->textContent, 'NewTeacher' => $tds->item(3)->textContent, 'NewSubject' => $tds->item(4)->textContent, 'Room' => $tds->item(5)->textContent, 'Instead' => $tds->item(6)->textContent, 'Comment' => $tds->item(7)->textContent);
        array_push($res, $entry);
    }
    return $res;
}

/**
 * Parst die Tabelle mit den Mitteilungen.
 * @param DOMElement $element
 * @return array (string)
 */
function replacements_parseNotices($element) {
    $res = array();
    foreach ($element->childNodes as $notice) {
        if ($notice instanceof DOMText)
            if (!preg_match('/^[\s]*$/', $notice->wholeText))
                array_push($res, $notice->wholeText);
    }
    return $res;
}

/**
 * Parst eine Datums-/Zeitangabe aus einem ziffernfreien Text.
 * @param string $text Eine Datums-/Zeitangabe in der Form "... 25.07.2011 10:23 ..."
 * @return DateTime 
 */
function replacements_parseDateTime($text) {
    $text = preg_replace('/[\D]*([\d]*)\.([\d]*)\.([\d]*)[\s]*([\d]*):([\d]*)[\D]*/', '$3-$2-$1 $4:$5', $text);
    return new DateTime($text, new DateTimeZone("Europe/Berlin"));
}

/**
 * Parst eine Datumsangabe aus einem ziffernfreien Text.
 * @param string $text Eine Zeitangabe in der Form "... 25.07.2011 ..."
 * @return DateTime 
 */
function replacements_parseDate($text) {
    $text = preg_replace('/[\D]*([\d]*)\.([\d]*)\.([\d]*)[\D]*/', '$3-$2-$1', $text);
    return new DateTime($text, new DateTimeZone("Europe/Berlin"));
}

?>