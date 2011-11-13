<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="de">
    <head>
        <meta charset="utf-8" />
        <title>Der-Vertretungsplan</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="description" content="Der Vertretungsplan des Albert-Schweitzer-Gynmnasiums Erlangen" />
        <meta name="keywords" content="Vertretungsplan ASG Albert Schweitzer Gymnasium Erlangen Schule Ausfall Lehrer Schüler Information" />
        <link rel="shortcut icon" href="---" type="../image/x-icon" />
        <link rel="stylesheet" type="text/css" href="../fonts.css" />
        <link rel="stylesheet" type="text/css" href="../design.css" />    
    </head>
    <body>
        <div class="colmask rightmenu content">
            <div class="colleft">
                <div class="col1 replacements">
                    <h1>Vertretungen:</h1>
                    <?php
                    include('../replacementsParser.inc.php');
                    include('../replacementsFilter.inc.php');
                    include('../replacementsSorter.inc.php');
                    include('../replacementsFormatter.inc.php');
                    echo replacementsFormatter_format(replacementsSorter_sort(replacementsFilter_filter(replacementsParser_parse())));
                    ?>
                </div>
            </div>
        </div>
        <div id="footer">
            <div id="footerbox">
                Alle Angaben ohne Gewähr.
                <br/>
                Beim Besuch dieser Website werden IP-Adresse, Bildschirmgröße, Browserversion und ähnliche Informationen erfasst, um eine öffentliche Statistik zu erstellen.
                <br/>
                <script type="text/javascript" src="http://logging.ourstats.de/js.php?ID=719764&amp;style=blue"></script><a target="_blank" href="http://stats.ourstats.de/?ID=719764"><img border="0" alt="ourSTATS.de - kostenloser Statistik Counter" src="http://logging.ourstats.de/logging.php?ID=719764&amp;style=blue&amp;js=1&amp;cookie=y&amp;lang=de&amp;ref=http%253A%2F%2Fwww.yousa.de%2F14plus1%2Fasg%2F&amp;screen=1280x1024&amp;ac=1321136746736"></a>
                <noscript>
                    &lt;a href="http://stats.ourstats.de/?ID=719764" target="_blank"&gt;
                    &lt;img src="http://logging.ourstats.de/logging.php?ID=719764&amp;js=0&amp;style=blue" border="0" /&gt;
                    &lt;/a&gt;
                </noscript>
            </div>
        </div>
    </body>
</html>