<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="de">
    <head>
        <meta charset="utf-8" />
        <title>Der-Vertretungsplan</title>
        <link href="standard.css" rel="stylesheet" type="text/css" />
        <link href="style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <header>
            <hgroup>
                <h1><a href="">Der-Vertretungsplan.de</a></h1>
                <h2>Die bessere Alternative</h2>
            </hgroup>
        </header>
        <nav class="border-radius nav">
            <ul>
                <li><a href="">Aktualisieren</a></li>
                <li><a href="http://der-vertretungsplan.ietherpad.com/1" target="_blank">an der Entwicklung des Vertretungsplanes mitwirken!</a></li>
                <li><a href="https://github.com/phi1010/der-vertretungsplan" target="_blank">GITHUB</a></li>
            </ul>
        </nav>
        <section>
            <table class="border-radius nav">
                <?php include("vertretung.php"); ?>
            </table>
        </section>
        <aside>
            <?php include("meldungen.php"); ?>
        </aside>

        <footer>
            <p>Alle Angaben ohne Gew&auml;hr.</p>
            <script src="http://logging.ourstats.de/js.php?ID=719764&amp;style=blue" type="text/javascript"/>
            <noscript>
                <a href="http://stats.ourstats.de/?ID=719764" target="_blank">
                    <img src="http://logging.ourstats.de/logging.php?ID=719764&amp;js=0&amp;style=blue" border="0" />
                </a>
            </noscript>
        </footer>
    </body>
</html>