<?php
meldungen_termine();
function meldungen_termine()
{
	$switch = "termine";
	$meldungen = "";
	$termine = "";
	$array = fill_array();
	$i = 0;
	$array_length = count($array);
	while($array_length > $i)
	{
		$char = $array[$i];
		$i++;
		if(($char != "<") && ($array_length > $i))
		{
			switch($switch)
			{
				case "meldungen":
					$meldungen = $meldungen . $char;
					break;
				case "termine":
					$termine = $termine . $char;
					break;
			}
		}
		else
		{
			$char = $array[$i];
			$i++;
			switch ($char)
			{
				case "p":
					switch($switch)
					{
						case "meldungen":
							$meldungen = $meldungen . "<p>";
							$i = skip($array, $i, $array_length);
							break 2;
						case "termine":
							$termine = $termine . "<p>";
							$i = skip($array, $i, $array_length);
							break 2;
					}
					
				case "b":
					$char = $array[$i];
					$i++;
					switch($char)
					{
						case "r":
							switch($switch)
							{
								case "meldungen":
									$meldungen = $meldungen . "<br>";
									$i = skip($array, $i, $array_length);
									break 3;
								case "termine":
									$termine = $termine . "<br>";
									$i = skip($array, $i, $array_length);
									break 3;
							}
						case ">";
							switch($switch)
							{
								case "meldungen":
									$meldungen = $meldungen . "<b>";
									$i = skip($array, $i, $array_length);
									break 3;
								case "termine":
									$termine = $termine . "<b>";
									$i = skip($array, $i, $array_length);
									break 3;
							}
						default:
							$i = skip($array, $i, $array_length);
							break 2;
					}
				case "a":
					switch($switch)
					{
						case "meldungen":
							$meldungen = $meldungen . "<a target=\"_blank\" href=\"http://www.asg-er.de/";
							$i += 7;
							break 2;
						case "termine":
							$termine = $termine . "<a target=\"_blank\" href=\"http://www.asg-er.de/";
							$i += 7;
							break 2;
					}
				case "t":
					$char = $array[$i];
					$i++;
					switch($char)
					{
						case "d":
							switch($switch)
							{
								case "meldungen":
									$switch = "termine";
									$i = skip($array, $i, $array_length);
									break 3;
								case "termine":
									$switch = "meldungen";
									$i = skip($array, $i, $array_length);
									break 3;
							}
						default:
							$i = skip($array, $i, $array_length);
							break 2;				
					}
				case "/":
					$char = $array[$i];
					$i++;
					switch ($char)
					{
						case "p":
							switch($switch)
							{
								case "meldungen":
									$meldungen = $meldungen . "</p>";
									$i = skip($array, $i, $array_length);
									break 3;
								case "termine":
									$termine = $termine . "</p>";
									$i = skip($array, $i, $array_length);
									break 3;
							}
						case "b":
							switch($switch)
							{
								case "meldungen":
									$meldungen = $meldungen . "</b>";
									$i = skip($array, $i, $array_length);
									break 3;
								case "termine":
									$termine = $termine . "</b>";
									$i = skip($array, $i, $array_length);
									break 3;
							}
						case "a":
							switch($switch)
							{
								case "meldungen":
									$meldungen = $meldungen . "</a>";
									$i = skip($array, $i, $array_length);
									break 3;
								case "termine":
									$termine = $termine . "</a>";
									$i = skip($array, $i, $array_length);
									break 3;
							}
						default:
							$i = skip($array, $i, $array_length);
							break 2;
					}
				default:
					$i = skip($array, $i, $array_length);
					break;
			}
		}
	}
	echo ($meldungen) . "<br><br><br>";
	echo ($termine) . "<br><br><br>" . "Script Version: 0.1 BETA <br> Diese Seite befindet sich noch im Aufbau. Daher sind Darstellungsfehler und Fehlfunktionen nicht auszuschlie&szlig;en. Benutzer des Internet Explorers werden gebeten einen modernen Browser zu verwenden.";
}

function skip($array, $i, $array_length)
{	
	$char = $array[$i-1];
	
	while (($char != ">") && ($array_length > $i))
		{
			$char = $array[$i];
			$i++;
		}
		return $i;
}
function fill_array()
{
	$break = false;
	$i = 3;
	$file = fopen("http://www.asg-er.de/","r") or exit("Unable to open file!");
	while ((!feof($file) && ($break == false)))
	{
		$char = fgetc($file);
		if ($char == "<")
		{
			$char = fgetc($file);
			if ($char == "t")
			{
				$char = fgetc($file);
				if ($char == "a")
				{
					$array[0]="<";
					$array[1]="t";
					$array[2]="a";
					while ((!feof($file) && ($break == false)))
					{
						$char = fgetc($file);
						$array[$i]= $char;
						$i++;
						if ($char == "<")
						{
							$char = fgetc($file);
							$array[$i]= $char;
							$i++;
							if ($char == "/")
							{
								$char = fgetc($file);
								$array[$i]= $char;
								$i++;
								if ($char == "t")
								{
									$char = fgetc($file);
									$array[$i]= $char;
									$i++;
									if ($char == "a")
									{
										$array[$i]="b";
										$i++;
										$array[$i]="l";
										$i++;
										$array[$i]="e";
										$i++;
										$array[$i]=">";
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
	fclose($file);
	return $array;
}
?>