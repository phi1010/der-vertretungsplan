<?php
header('content-type: text/html; charset=utf-8');
include_once('code/replacementsParser.inc.php');
include_once('code/replacementsFilter.inc.php');
include_once('code/replacementsSorter.inc.php');
include_once('code/replacementsFormatter.inc.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Der Ver&shy;tre&shy;tungs&shy;plan</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="description" content="Der Vertretungsplan des Albert-Schweitzer-Gynmnasiums Erlangen" />
        <meta name="keywords" content="Vertretungsplan ASG Albert Schweitzer Gymnasium Erlangen Schule Ausfall Lehrer Schüler Information" />
        <meta name="robots" content="index, follow" />
        <link rel="shortcut icon" href="---" type="image/x-icon" />
        <link rel="stylesheet" type="text/css" href="style/fonts.css" />
        <link rel="stylesheet" type="text/css" href="style/layoutlite.css" />
        <link rel="stylesheet" type="text/css" href="style/menu.css" />
        <link rel="stylesheet" type="text/css" href="style/designlite.css" />
        <script type="text/javascript" src="targetblank.js"></script>
    </head>
    <body>
        <div id="header">
            <a href="http://der-vertretungsplan.de.vu"><h1>Der Vertretungsplan</h1></a>
        </div>
        <div class="content bgreplacements replacements">
            <?php
            echo replacementsFormatter_format(replacementsSorter_sort(replacementsFilter_filter(replacementsParser_parse())));
            ?>
        </div>

        <div id="footer">
            <p>Zuletzt aktualisiert: 
                <?php
                $wtage = array("Sonntag",
                    "Montag",
                    "Dienstag",
                    "Mittwoch",
                    "Donnerstag",
                    "Freitag",
                    "Samstag");
                echo $wtage[date("w", time())] . ", " . date('j.m.Y H:i', time());
                ?></p>
            <p>
                <script type="text/javascript" src="http://logging.ourstats.de/js.php?ID=719764&amp;style=blue">
                </script>
            </p>
            <noscript>
                <p>
                    <a href="http://stats.ourstats.de/?ID=719764">
                        <img alt="ourSTATS.de - kostenloser Statistik Counter" src="http://logging.ourstats.de/logging.php?ID=719764&amp;style=blue&amp;js=1&amp;cookie=y&amp;lang=de&amp;ref=http%253A%2F%2Fwww.yousa.de%2F14plus1%2Fasg%2F&amp;screen=1280x1024&amp;ac=1321136746736"/>
                    </a>
                </p>
            </noscript>
            <p>
                Bit&shy;te be&shy;ach&shy;ten sie die An&shy;ga&shy;ben zu Haf&shy;tung, Da&shy;ten&shy;schutz, Be&shy;trei&shy;ber und Gül&shy;tig&shy;keit auf <a href="http://der-vertretungsplan.de.vu">http://der-ver&shy;tre&shy;tungs&shy;plan.de.vu</a>.
            </p>
        </div>
    </body>
</html>
