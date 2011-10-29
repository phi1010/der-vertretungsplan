<?php

$urls = array(
    'Mo' => "http://asg-er.dyndns.org/vertretung/students/schuelerplan_mo.htm",
    'Di' => "http://asg-er.dyndns.org/vertretung/students/schuelerplan_di.htm",
    'Mi' => "http://asg-er.dyndns.org/vertretung/students/schuelerplan_mi.htm",
    'Do' => "http://asg-er.dyndns.org/vertretung/students/schuelerplan_do.htm",
    'Fr' => "http://asg-er.dyndns.org/vertretung/students/schuelerplan_fr.htm"
);

main();

function main() {
    global $urls;

    if (array_key_exists('day', $_GET))
        echo '<pre>' . print_r(parseURL($urls[$_GET['day']]), true) . '</pre>';
    else if (array_key_exists('all', $_GET))
        echo '<pre>' . print_r(parse(), true) . '</pre>';
}

function parse() {
    global $urls;
    $res = array();
    foreach ($urls as $key => $value) {
        $res[$key] = parseURL($value);
    }
    return $res;
}

/**
 *
 * @param string $url
 * @return type 
 */
function parseURL($url) {
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
    return parseDocument($doc);
}

function parseDocument($doc) {
    $res = array();

    $html = $doc->documentElement;
    //echo tree($html);
    $body = $html->getElementsByTagName('body')->item(0);

    $header = $body->getElementsByTagName('center')->item(0)->getElementsByTagName('thead')->item(0);
    $dateChanged = $header->getElementsByTagName('th')->item(2);
    $res['DateChanged'] = parseDateTime($dateChanged->textContent);

    $title = $body->getElementsByTagName('h2')->item(0);
    $res['Date'] = parseDate($title->textContent);

    $notices = $body->getElementsByTagName('center')->item(1)->getElementsByTagName('table')->item(0)->getElementsByTagName('td')->item(0);
    $res['Notices'] = parseNotices($notices);

    $entries = $body->getElementsByTagName('center')->item(2)->getElementsByTagName('table')->item(0);
    $res['Entries'] = parseEntries($entries);

    return $res;
}

function parseEntries($element) {
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
 *
 * @param DOMElement $element
 * @return array(string*)
 */
function parseNotices($element) {
    $res = array();
    foreach ($element->childNodes as $notice) {
        if ($notice instanceof DOMText)
            if (!preg_match('/^[\s]*$/', $notice->wholeText))
                array_push($res, $notice->wholeText);
    }
    return $res;
}

/**
 * @param string $text Eine Zeitangabe in der Form "... 25.07.2011 10:23 ..."
 * @return DateTime 
 */
function parseDateTime($text) {
    $text = preg_replace('/[\D]*([\d]*)\.([\d]*)\.([\d]*)[\s]*([\d]*):([\d]*)[\D]*/', '$3-$2-$1 $4:$5', $text);
    return new DateTime($text, new DateTimeZone("Europe/Berlin"));
}

/**
 * @param string $text Eine Zeitangabe in der Form "... 25.07.2011 ..."
 * @return DateTime 
 */
function parseDate($text) {
    $text = preg_replace('/[\D]*([\d]*)\.([\d]*)\.([\d]*)[\D]*/', '$3-$2-$1', $text);
    return new DateTime($text, new DateTimeZone("Europe/Berlin"));
}

/**
 * Nur zum Testen.
 * Quelle: http://abeautifulsite.net/blog/2007/06/php-file-tree/
 * @param DOMElement $element
 * @return string 
 */
function tree($element) {
    $res = "";
    $nodeList = $element->childNodes;
    $attribList = $element->attributes;

    if (count($nodeList) + count($attribList) > 0) {
        $res .= "<ul>";
        foreach ($attribList as $attrib) {
            $res .= "<li> <div style=\"font-style: italic;\">" . htmlspecialchars($attrib->name . ': ' . $attrib->value) . "</div></li>";
        }
        foreach ($nodeList as $node) {
            if ($node instanceof DOMText) {
                if (!preg_match('/^[\s]*$/', $node->wholeText))
                    $res .= "<li> <div style=\"color: navy;\">" . htmlspecialchars($node->wholeText) . "</div>";
            } else {
                $res .= "<li> <div style=\"font-weight: bold;\">" . htmlspecialchars($node->nodeName) . "</div>";
                $res .= tree($node);
                $res .= "</li>";
            }
        }
        $res .= "</ul>";
    }
    return $res;
}

?>