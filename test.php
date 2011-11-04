<?php header('content-type: text/html; charset=utf-8'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="charset=utf-8" />
    </head>
    <body>
        <?php
        include('replacementsParser.inc.php');
        include('replacementsSorter.inc.php');

        test();

        /**
         * Testfunktion. Mögliche Aufrufe:
         * ?replacementsParser[day=(Mon|Tue|Wed|Thu|Fri)]
         * ?replacementsSorter
         * ?htmlentities
         * ?redirect=<URL>
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
            if (array_key_exists('htmlentities', $_GET)) {
                $text = 'AOU <b>ÄÖÜ</b> &lt;äöü&gt; aou S ß S';
                echo $text;
                echo "<br/>\n";
                echo htmlentities($text, ENT_COMPAT, 'UTF-8');
                echo "<br/>\n";
                echo htmlspecialchars_decode(htmlentities($text, ENT_COMPAT, 'UTF-8'));
            }
            if (array_key_exists('redirect', $_GET)) {
                echo file_get_contents($_GET['redirect']);
            }
        }
        ?>
    </body>
</html>
