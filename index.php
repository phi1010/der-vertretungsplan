<?php
header('content-type: text/html; charset=utf-8');
include_once('code/replacements.inc.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Der Vertretungsplan</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="description" content="Der Vertretungsplan des Albert-Schweitzer-Gynmnasiums Erlangen" />
        <meta name="keywords" content="Vertretungsplan ASG Albert Schweitzer Gymnasium Erlangen Schule Ausfall Lehrer Schüler Information" />
        <meta name="robots" content="index, follow" />
        <link rel="shortcut icon" href="---" type="image/x-icon" />
        <link rel="stylesheet" type="text/css" href="style/fonts.css" />
        <link rel="stylesheet" type="text/css" href="style/layout.css" />
        <link rel="stylesheet" type="text/css" href="style/menu.css" />
        <link rel="stylesheet" type="text/css" href="style/design.css" />
        <script type="text/javascript" src="script/targetblank.js"></script>
    </head>
    <body>
        <div id="header">
            <img src="images/Calendar-256.png" id="logo" alt="Der-Vertretungsplan-Logo" />
            <h1><a href="http://der-vertretungsplan.de.vu">Der Vertretungsplan</a></h1>
            <div class="menu">
                <ul>
                    <li><a href="#" onclick="window.location.reload();return false;">Aktualisieren</a></li>
                    <li class="seperator" />
                    <li><a href="#" id="current">Mitwirken</a>
                        <ul>
                            <li><a href="http://webchat.esper.net/?channels=#vertretungsplan">Webchat @ esper.net</a></li>
                            <li class="seperator" />
                            <!--<li><a href="#">IRC @esper.net</a></li>-->
                            <li><a href="https://github.com/phi1010/der-vertretungsplan">Quell&shy;code&shy;hosting
                                    @ Git&shy;Hub</a></li>

                        </ul>
                    </li>
                    <li class="seperator" />
                    <li><a href="#">Links</a>
                        <ul>
                            <li><a href="http://asg-er.dyndns.org/vertretung/">ASG Vertretungs&shy;plan</a></li>
                            <li class="seperator" />
                            <li><a href="http://asg-er.de/">ASG Homepage</a></li>
                            <li class="seperator"/>
                            <li>
                                <script type="text/javascript" src="http://logging.ourstats.de/js.php?ID=719764&amp;style=blue">
                                </script>
                                <noscript>
                                    <div>
                                        <a href="http://stats.ourstats.de/?ID=719764">
                                            <img alt="ourSTATS.de - kostenloser Statistik Counter" src="http://logging.ourstats.de/logging.php?ID=719764&amp;style=blue&amp;js=1&amp;cookie=y&amp;lang=de&amp;ref=http%253A%2F%2Fwww.yousa.de%2F14plus1%2Fasg%2F&amp;screen=1280x1024&amp;ac=1321136746736"/>
                                        </a>
                                    </div>
                                </noscript>
                            </li>
                            <li class="seperator" />
                            <li>
                                <a href="http://validator.w3.org/check?uri=referer"><img
                                        src="images/valid_xhtml10_blue.png" alt="Valid XHTML 1.0 Strict"/>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="seperator" />
                    <li><a href="http://webchat.esper.net/?channels=#vertretungsplan">Kontakt</a></li>
                    <li class="seperator" />
                </ul>
            </div>
        </div>
        <div class="colmask rightmenu bgevents">
            <div class="colleft bgreplacements">
                <div class="col1 replacements">
                    <h1>Vertretungen:</h1>
                    <?php
                    echo replacements_getHTML();
                    ?>
                </div>
                <div class="col2 events">
                    <h1>
                        Termine:</h1>
                    <p>Bitte beachten sie, dass die Termine noch nicht automatisch aktualisiert werden.</p>
                    <ul>
                        <li><span style="font-weight: bold;">Mi 18. Januar, 19:30 Uhr:</span> Informationsabend der Schulberatung für Eltern und Schüler der 9./10. Klassen</li>
                        <li><span style="font-weight: bold;">Do 26. Januar 2012, 18:00 - 20:00 Uhr:</span> Großer Präsentationsabend: Die P-Seminare der Q12 stellen ihre Ergebnisse vor</li>
                        <li><span style="font-weight: bold;">Sa 21. - Fr 27. Januar:</span> Skilager der Klassen 8AC</li>
                        <li><span style="font-weight: bold;">Sa 04. - Fr 10. Februar:</span> Skilager der Klassen 8EF</li>
                        <li><span style="font-weight: bold;">Mo 06. - Do 09. Februar: </span>Betriebspraktikum der Klassen 9AB</li>
                        <li><span style="font-weight: bold;">Mi 08. und Do 09. Februar:</span> Unterrichtsschluss 12:20 Uhr (Klassenkonferenzen)</li>
                        <li><span style="font-weight: bold;">Mo 13. - Do 16. Februar:</span> Betriebspraktikum der Klassen 9CD</li>
                        <li><span style="font-weight: bold;">Dienstag, 14. Februar 2012, 19:00 Uhr:</span> Informationsabend für die zukünftige 5. Jahrgangsstufe</li>
                        <li><span style="font-weight: bold;">Fr 17. Februar, 12:20 Uhr:</span> Ausgabe der Zwischenzeugnisse</li>
                        <li><span style="font-weight: bold;">Sa 18. - So 26. Februar:</span> Faschingsferien</li>
                        <li><span style="font-weight: bold;">Sa 03. - Fr 09. März:</span> Skilager der Klassen 8BD</li>
                        
                    </ul>
                    <cite>Quelle: <a href="http://asg-er.de/index.htm">http://asg-er.de/index.htm</a></cite>
                </div>
            </div>
        </div>
        <div id="footer">
            <div class="padding">
                <p>
                    Zuletzt aktualisiert: 
                    <?php
                    $wtage = array("Sonntag",
                        "Montag",
                        "Dienstag",
                        "Mittwoch",
                        "Donnerstag",
                        "Freitag",
                        "Samstag");
                    echo $wtage[date("w", time())] . ", " . date('j.m.Y H:i', time());
                    ?>
                </p>
                <br/>
                <p>Dies ist eine inoffizielle Seite, die Inhalte automatisch von der <a href="http://asg-er.de">Homepage des Albert-Schweitzer-Gymnasiums Erlangen</a> abruft. Diese Seite wird nicht von der Schule betrieben. Alle Informationen werden ohne Gewähr zur Verfügung gestellt, für Fehler dieses Skripts kann keine Haftung übernommen werden. Aus Datenschutzgründen wurden die Namen der Lehrkräfte auf 4 Buchstaben gekürzt.</p>
                <p>Hinweis der Schule: Gültig ist der aktuelle Aushang in der Schule. Der Onlineplan kann unter Umständen den Stand vom Vortag darstellen.</p>
                <p></p>
                <p>Haftungshinweis: Für den Inhalt extern verlinkter Seiten kann keine Haftung übernommen werden, es sind ausschließlich deren jeweilige Betreiber verantwortlich. Dies gilt insbesondere für Links, die automatisch von der Homepage der Schule übernommen würden.</p>
                <p>Beim Besuch dieser Website werden IP-Adresse, Bildschirmgröße, Browserversion und ähnliche Informationen erfasst, um eine öffentliche Statistik zu erstellen.</p>

            </div>
        </div>
    </body>
</html>
