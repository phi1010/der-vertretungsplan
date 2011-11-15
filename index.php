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
        <link rel="stylesheet" type="text/css" href="layout.css" />
        <link rel="stylesheet" type="text/css" href="menu.css" />
        <link rel="stylesheet" type="text/css" href="design.css" />
    </head>
    <body>
        <div id="header">
            <img src="Calendar-256.png" id="logo" />
            <h1>
                Der Vertretungsplan</h1>
            <div class="menu">
                <ul>
                    <li><a href="#" onclick="window.location.reload();return false;">Aktualisieren</a></li>
                    <li class="seperator" />
                    <li><a href="#" id="current">Mitwirken</a>
                        <ul>
                            <li><a href="http://webchat.esper.net/?channels=#vertretungsplan" target="_blank">Webchat @ esper.net</a></li>
                            <li class="seperator" />
                            <!--<li><a href="#">IRC @esper.net</a></li>-->
                            <li><a href="https://github.com/phi1010/der-vertretungsplan" target="_blank">Quell&shy;code&shy;hosting
                                    @ Git&shy;Hub</a></li>
                            <li class="seperator" />
                            <li><a href="http://der-vertretungsplan.ietherpad.com/1" target="_blank">Etherpad @ iEtherpad</a></li>
                        </ul>
                    </li>
                    <li class="seperator" />
                    <li><a href="/faq.php">Links</a>
                        <ul>
                            <li><a href="http://asg-er.dyndns.org/vertretung/" target="_blank">ASG Vertretungs&shy;plan</a></li>
                            <li class="seperator" />
                            <li><a href="http://asg-er.de/" target="_blank">ASG Homepage</a></li>
                        </ul>
                    </li>
                    <li class="seperator" />
                    <li><a href="http://webchat.esper.net/?channels=#vertretungsplan" target="_blank">Kontakt</a></li>
                    <li class="seperator" />
                </ul>
            </div>
        </div>
        <div class="colmask rightmenu content">
            <div class="colleft">
                <div class="col1 replacements">
                    <h1>Vertretungen:</h1>
                    <?php
                    include('replacementsParser.inc.php');
                    include('replacementsFilter.inc.php');
                    include('replacementsSorter.inc.php');
                    include('replacementsFormatter.inc.php');

                    echo replacementsFormatter_format(replacementsSorter_sort(replacementsFilter_filter(replacementsParser_parse())));
                    ?>
                </div>
                <div class="col2 events">
                    <h1>
                        Termine:</h1>
                    <p>Bitte beachten sie, dass die Termine noch nicht automatisch aktualisiert werden.</p>
                    <ul>
                        <li><span style="font-weight: bold;">Mi 09. November, 14:00 Uhr: </span>Pädagogische
                            Klassenkonferenzen </li>
                        <li><span style="font-weight: bold;">Fr 11. November:</span> Schulmilchaktion in den
                            Klassen 5-10 </li>
                        <li><span style="font-weight: bold;">Sa 12. November, 09:00 - 13:30 Uhr:</span> EBIT
                            - <a href="fileadmin/uploads/homepagegruppe/Schulleitung/EBIT_2011_Flyer.pdf"><span
                                    style="font-weight: bold;">E</span>rlanger <span style="font-weight: bold;">B</span>erufs<span
                                    style="font-weight: bold;">I</span>nformations<span style="font-weight: bold;">T</span>ag
                            </a>am ASG - hochinteressant für Schülerinnen und Schüler ab der 10. Jgst.!
                        </li>
                        <li><span style="font-weight: bold;">Di, 15. November, 19:00 Uhr:</span> Sportelternabend</li>
                        <li><span style="font-weight: bold;">Mi, 16. November:</span> Buß- und Bettag: unterrichtsfrei</li>
                        <li><span style="font-weight: bold;">Mo, 21. November, 18:30 Uhr:</span> Klassenelternabende
                            der 7. Klassen</li>
                        <li><span style="font-weight: bold;">Mo, 21. November, 19:00 Uhr:</span> Skilager-Info
                            und Klassenelternabende der 8. Klassen</li>
                        <li><span style="font-weight: bold;">Do, 01. Dezember, 18:30 Uhr:</span> Information
                            zum Praktikum mit anschließenden Klassenelternabenden der 9. Klassen</li>
                        <li><span style="font-weight: bold;">Do, 01. Dezember, 18:30 Uhr:</span> Klassenelternabende
                            der 10. Klassen</li>
                        <li style="color: rgb(255, 0, 0); font-weight: bold;"><span style="font-weight: normal;">
                                <span style="font-weight: bold;">Mi, 07. Dezember, 17:30 - 20:30 Uhr:</span> Allgemeiner
                                Elternsprechabend</span> </li>
                        <li><span style="font-weight: bold;">Mi, 14. Dezember, 19:00 Uhr: </span>Weihnachtskonzert
                            in der Johanneskirche; <span style="color: rgb(204, 51, 0);">ab <span style="font-weight: bold;">
                                    18:00 Uhr</span> Weihnachtsmarkt vor der Kirche</span></li>
                        <li><span style="font-weight: bold;">Fr, 23. Dezember, 11:15 Uhr:</span> Unterrichtsschluss
                            vor den Weihnachtsferien</li>
                        <li style="color: rgb(0, 102, 255);"><span style="font-weight: bold;">Dienstag, 14.
                                Februar 2012, 19:00 Uhr:</span> Informationsabend für die zukünftige 5. Jahrgangsstufe</li></ul>
                </div>
            </div>
        </div>
        <div id="footer">
            <div id="footerbox">
                Alle Angaben ohne Gewähr.
                <br/>
                Beim Besuch dieser Website werden IP-Adresse, Bildschirmgröße, Browserversion und ähnliche Informationen erfasst, um eine öffentliche Statistik zu erstellen.
                <br/>
                <script type="text/javascript" src="http://logging.ourstats.de/js.php?ID=719764&amp;style=blue">
                </script>
                <noscript>
                    <a target="_blank" href="http://stats.ourstats.de/?ID=719764">
                        <img border="0" alt="ourSTATS.de - kostenloser Statistik Counter" src="http://logging.ourstats.de/logging.php?ID=719764&amp;style=blue&amp;js=1&amp;cookie=y&amp;lang=de&amp;ref=http%253A%2F%2Fwww.yousa.de%2F14plus1%2Fasg%2F&amp;screen=1280x1024&amp;ac=1321136746736"/>
                    </a>
                </noscript>
                <br/>
                Zuletzt aktualisiert: 
                <?php
                $wtage = array("Sonntag",
                    "Montag",
                    "Dienstag",
                    "Mittwoch",
                    "Donnerstag",
                    "Freitag",
                    "Samstag");
                echo $wtage[date("w", time())] . ", " . date('j.m.Y H:i', time())
                ?>
            </div>
        </div>
    </body>
</html>
