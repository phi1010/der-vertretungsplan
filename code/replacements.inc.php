<?php

include_once('code/replacementsParser.inc.php');
include_once('code/replacementsFilter.inc.php');
include_once('code/replacementsSorter.inc.php');
include_once('code/replacementsFormatter.inc.php');
include_once('code/replacementsQuery.inc.php');
include_once('code/replacementsLogger.inc.php');
include_once('code/replacementsPreprocessor.inc.php');

function replacements_getHTML() {
    $contents = replacementsQuery_getContents();
    $contents2 = replacementsPreprocessor_process($contents);
    $data = replacementsParser_parseContents($contents2);
    replacementsLogger_log($contents, $data);
    $data = replacementsFilter_filter($data);
    $data = replacementsSorter_sort($data);
    $output = replacementsFormatter_format($data);
    return $output;
}
?>
