<?php header('content-type: text/html; charset=utf-8'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Der Vertretungsplan</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="description" content="Der Vertretungsplan des Albert-Schweitzer-Gynmnasiums Erlangen" />
        <meta name="keywords" content="Vertretungsplan ASG Albert Schweitzer Gymnasium Erlangen Schule Ausfall Lehrer Schüler Information" />
        <meta name="robots" content="index, follow" />
        <link rel="shortcut icon" href="---" type="image/x-icon" />
        <link rel="stylesheet" type="text/css" href="fonts.css" />
        <link rel="stylesheet" type="text/css" href="layoutlite.css" />
        <link rel="stylesheet" type="text/css" href="menu.css" />
        <link rel="stylesheet" type="text/css" href="designlite.css" />
        <script type="text/javascript" src="targetblank.js"></script>
    </head>
    <body>
        <div id="header">
            <a href="http://der-vertretungsplan.de.vu"><h1>Der Vertretungsplan</h1></a>
        </div>
        <div class="content bgreplacements replacements">
            <?php
            include('replacementsParser.inc.php');
            include('replacementsFilter.inc.php');
            include('replacementsSorter.inc.php');
            include('replacementsFormatter.inc.php');

            echo replacementsFormatter_format(replacementsSorter_sort(replacementsFilter_filter(replacementsParser_parse())));
            ?>
        </div>

        <div id="footer">
            <p>Alle Angaben ohne Gewähr.</p>
            <p>Beim Besuch dieser Website werden IP-Adresse, Bildschirmgröße, Browserversion und ähnliche Informationen erfasst, um eine öffentliche Statistik zu erstellen.</p>
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
        </div>
    </body>
</html>
