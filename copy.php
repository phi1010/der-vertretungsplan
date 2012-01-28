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
        <script type="text/javascript" src="script/targetblank.js.php"></script>
    </head>
    <body>
        <?php
        include("style/header.inc.php");
        ?>
        <div class="copy colmask">
        <h1>Ältere Vertretungspläne:</h1>
        <p>Bitte beachten Sie, dass nur Vertretungspläne angezeigt werden, die über diese Seite bereits abgerufen wurden.</p>
        <p>Die Vertretungspläne sind sortiert nach Datum und letzter Änderung:</p>
        <p class="list">
            YYYY-MM-DD YYYY-MM-DD-hh-mm ----------- MD5 HASH -----------<br/>
            ==========|================|================================<br/>
            <?php
            $files = array();

            /* open the current directory by opendir */
            if ($handle = opendir('./COPYS')) {

                /* as long as there is another file, read its path and store to $file */
                while (false !== ($file = readdir($handle))) {

                    /* do not list '.', '..', or 'index.php' */
                    if ($file != "." && $file != ".." && $file != "index.php") {

                        $files[] = $file;
                    }
                }

                closedir($handle);
            }

            asort($files);
            $fileext = ".html";
            foreach ($files as $name)
                if (substr($name, -strlen($fileext)) == $fileext) {
                    $text = substr($name,0, -strlen($fileext));
                    echo "<a href=\"http://der-vertretungsplan.de.vu/COPYS/$name\">$text</a><br/>\n";
                }
            ?>
        </p>
        </div>
        <?php
        include("style/footer.inc.php");
        ?>
    </body>
</html>
