<?php

meldungen_termine();

function meldungen_termine() {
    $termine = "<p><span style=\"FONT-WEIGHT: bold\">Termine:</span></p>";
    $array = fill_array();
    $i = 0;
    $array_length = count($array)-4;

    while ($array_length > $i) {
        $char = $array[$i];
        $i++;
        $termine = $termine . $char;
    }
    echo ($termine) . "(Quelle: <a href=\"http://www.asg-er.de/\" target=\"_blank\">http://asg-er.de</a>)" . "</br></br>" . "<p>Script Version: 0.1 BETA <br> Diese Seite befindet sich noch im Aufbau. Daher sind Darstellungsfehler und Fehlfunktionen nicht auszuschlie&szlig;en. Benutzer des Internet Explorers werden gebeten einen modernen Browser zu verwenden.</p>";
}

function skip($array, $i, $array_length) {
    $char = $array[$i - 1];

    while (($char != ">") && ($array_length > $i)) {
        $char = $array[$i];
        $i++;
    }
    return $i;
}

function fill_array() {
    $break = false;
    $start = false;
    $i = 3;
    $file = fopen("http://www.asg-er.de/", "r") or exit("Unable to open file!");
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

                                            while ((!feof($file) && ($start == false))) {
                                                $char = fgetc($file);
                                                if ($char == "<") {
                                                    $char = fgetc($file);
                                                    if ($char == "p") {
                                                        $char = fgetc($file);
                                                        if ($char == ">") {
                                                            $array[0] = "<";
                                                            $array[1] = "p";
                                                            $array[2] = ">";
                                                            $start = true;
                                                            break;
                                                        }
                                                    }
                                                }
                                            }
                                            while ((!feof($file) && ($break == false) && ($start == true))) {
                                                $char = fgetc($file);
                                                $array[$i] = $char;
                                                $i++;
                                                if ($char == "<") {
                                                    $char = fgetc($file);
                                                    $array[$i] = $char;
                                                    $i++;
                                                    if ($char == "/") {
                                                        $char = fgetc($file);
                                                        $array[$i] = $char;
                                                        $i++;
                                                        if ($char == "t") {
                                                            $char = fgetc($file);
                                                            $array[$i] = $char;
                                                            $i++;
                                                            if ($char == "d") {
                                                                $break = true;
                                                                break;
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
    return $array;
}

?>