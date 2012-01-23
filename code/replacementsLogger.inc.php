<?php

function replacementsLogger_log($sources,$infos) {
    foreach ($sources as $url => $text) {
        $data = $infos[$url];
        $date = $data['Date'];
        $date = date('Y-m-d', $date);
        $changed = $data['DateChanged'];
        $changed = date('Y-m-d-h-i', $changed);
        $hash = md5($text);
        $filename = "COPYS/$date $changed $hash.html";
        if(!@is_dir("COPYS"))
            @mkdir("COPYS");
        if(!@file_exists($filename))
        {
            //file_put_contents($filename, $text);
            $handle = @fopen($filename,'wb');
            @fwrite($handle,$text);
            @fclose($handle);
        }
    }
}


?>