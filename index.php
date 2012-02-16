<?php
header('content-type: text/html; charset=utf-8');
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
        <script type="text/javascript" src="script/targetblank.js.php"></script>
        <script type="text/javascript" src="jquery-1.7.1.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#js_content").hide();
                $("#js_content").load('replacements.ajax.php',"",function()
                {
                    $("#js_status").fadeOut("slow",function()
                    {
                        $("#js_content").fadeIn("slow");
                    });
                });
            });
        </script>
    </head>
    <body>
        <?php
        include("style/header.inc.php");
        ?>
        <div class="colmask rightmenu bgevents">
            <div class="colleft bgreplacements">
                <div class="col1 replacements">
                    <h1>Vertretungen:</h1>
                    <div id="js_status">
                        <img src="images/ajax-loader.gif" alt="Loading..."/>
                        <p>Die Vertretungspläne werden geladen...</p>
                    </div>
                    <noscript>
                        <p>Bitte aktivieren sie JavaScript, um die Vertretungspläne zu laden.<br/>Alternativ können sie auch unsere <a href="http://der-vertretungsplan.de.vu/lite.php">Lite-Version</a> verwenden.</p>
                    </noscript>
                    <div id="js_content"></div>
                </div>
                <div class="col2 events">
                    <h1>
                        Termine:</h1>
                    <p>Bitte beachten Sie, dass die Termine noch nicht automatisch aktualisiert werden.</p>
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
        <?php
        include("style/footer.inc.php");
        ?>
    </body>
</html>
