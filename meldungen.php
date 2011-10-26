<?php

termine();

function termine() {
    $termine = "<p><span style=\"FONT-WEIGHT: bold\">Termine:</span></p>";
    $break = false;
    $i = 3;
    $file = fopen("http://www.asg-er.de/", "r") or exit("Termine konnten nicht geladen werden.");
    while ((!feof($file) && ($break == false))) {
        $char = fgetc($file);
        if ($char == ">") {
            $char = fgetc($file);
            if ($char == "T") {
                $char = fgetc($file);
                if ($char == "e") {
                    $char = fgetc($file);
                    if ($char == "r") {
                        $char = fgetc($file);
                        if ($char == "m") {
                            $char = fgetc($file);
                            if ($char == "i") {
                                $char = fgetc($file);
                                if ($char == "n") {
                                    $char = fgetc($file);
                                    if ($char == "e") {
                                        $char = fgetc($file);
                                        if ($char == "<") {

                                            while (!feof($file) && ($break == false)) {
                                                $char = fgetc($file);
                                                if ($char == "<") {
                                                    $char = fgetc($file);
                                                    if ($char == "p") {
                                                        $char = fgetc($file);
                                                        if ($char == ">") {
                                                            $termine = $termine . "<p>";
                                                            while ((!feof($file) && ($break == false))) {
                                                                $char = fgetc($file);

                                                                if (($char != "<") && (!feof($file))) {
                                                                    $termine = $termine . $char;
                                                                } else {
                                                                    $char = fgetc($file);
                                                                    if (($char != "/") && (!feof($file))) {
                                                                        $termine = $termine . "<" . $char;
                                                                    } else {
                                                                        $char = fgetc($file);
                                                                        if (($char != "t") && (!feof($file))) {
                                                                            $termine = $termine . "</" . $char;
                                                                        } else {
                                                                            $char = fgetc($file);
                                                                            if (($char != "d") && (!feof($file))) {
                                                                                $termine = $termine . "</t" . $char;
                                                                            } else {
                                                                                $break = true;
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    fclose($file);
    echo ($termine) . "(Quelle: <a href=\"http://www.asg-er.de/\" target=\"_blank\">http://asg-er.de</a>)" . "</br></br>" . "<p>Script Version: 0.1 BETA <br> Diese Seite befindet sich noch im Aufbau. Daher sind Darstellungsfehler und Fehlfunktionen nicht auszuschlie&szlig;en. Benutzer des Internet Explorers werden gebeten einen modernen Browser zu verwenden.</p>";
}

?>