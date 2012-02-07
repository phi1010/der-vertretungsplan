<?php

include_once('code/logQuery.inc.php');
include_once('code/logParser.inc.php');
include_once('code/logSorter.inc.php');
include_once('code/logGrouper.inc.php');
include_once('code/logFormatter.inc.php');

function log_getHTML()
{
    $filenames = logQuery_getFilenames();
    $files = logParser_parseFilenames($filenames);
    logSorter_sort($files);
    $files = logGrouper_groupFiles($files);
    $output = logFormatter_format($files);
    return $output;
}
?>
