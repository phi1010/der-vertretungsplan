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

            <?php
            include("code/log.inc.php");
            echo log_getHTML();
            ?>
        </div>
        <?php
        include("style/footer.inc.php");
        ?>
    </body>
</html>
