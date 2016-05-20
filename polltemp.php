<?php


while (true)
{
	
	$temp =	ReadTemp();
	InsertTemp($temp);
	sleep(60); //15 minutes
}

function ReadTemp()
{
	System("readtemp");	
	$file = fopen("/tmp/temp.txt", "r") or die ("unable to open file");

	$temp = fgets($file);
	$temp /= 1000;

	//convert to deg F
	$temp = 1.8 * $temp + 32;

	printf("Temp=" . $temp . "F\r\n"); 

	fclose($file);
	return $temp;
}

function InsertTemp($temp)
{
	$mysqli = new mysqli("127.0.0.1", "root", "root", "temp");

	if ($mysqli->connect_errno)
	{
		printf("connection failed!");
	}
	else
	{
		$q = "insert into temperature(temperature) values (\"$temp\")";
		
		$result = $mysqli->query($q);
   		if (!$result)
		{	
			printf("query failed!");
		}
	}

	$mysqli->close();
}

?>
