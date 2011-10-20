<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="de">
    <head>
        <meta charset="utf-8" />
        <title>Der-Vertretungsplan</title>
        <link href="standard.css" rel="stylesheet" type="text/css" />
        <link href="style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <?php
        include("URLs.php");
        echo parseReplacements(urlReplacements("Thu"));

        function parseReplacements($url) {
            $filecontent = file_get_contents($url);
            $doc = new DOMDocument();
            $loadHTML = $doc->loadHTML($filecontent);
            return var_dump($doc);
        }
        ?>
    </body>
</html>
