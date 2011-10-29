<?php

include('replacementsParser.inc.php');
include('replacementsSorter.inc.php');

test();

/**
 * Testfunktion. Mögliche Aufrufe:
 * ?replacementsParser[day=(Mon|Tue|Wed|Thu|Fri)]
 * ?replacementsSorter
 * @global type $urls 
 */
function test() {
    if (array_key_exists('replacementsParser', $_GET)) {
        global $urls;
        if (array_key_exists('day', $_GET))
            echo '<pre>' . print_r(replacementsParser_parseURL($urls[$_GET['day']]), true) . '</pre>';
        else
            echo '<pre>' . print_r(replacementsParser_parse(), true) . '</pre>';
    }

    if (array_key_exists('replacementsSorter', $_GET)) {
        echo '<pre>' . print_r(replacementsSorter_sort(replacementsParser_parse()), true) . '</pre>';
    }
}

?>
