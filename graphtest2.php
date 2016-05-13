<html>
<head>
<script>

var temps =  [];
var times = [];

function refreshPage()
{
        location.reload();
}

function loadGraph()
{
	var canvas = document.getElementById("myCanvas");
	var ctx = canvas.getContext("2d");

	for (var i=0; i<temps.length; i++)
	{

		if (temps[i] > 70)
		{
		 ctx.fillStyle="#FF0000";
		}
		else if(temps[i] > 50)
		{
		 ctx.fillStyle="#0000FF";
		}
		else if (temps[i] < 50)
		{
		 ctx.fillStyle ="#000033";
		}
		else if (temps[i] < 30)
		{
		 ctx.fillStyle ="262626";
		}
		var left = i*40;
		var top = 250-temps[i]*2; 
	  	ctx.fillRect(left, top, 18, temps[i]*4);
		ctx.fillText(temps[i], left-2, top);
	}

}


function onLoad()
{
<?php
	$mysqli = new mysqli("127.0.0.1", "root","root","temp");
	if (mysqli_connect_errno())
	{
    		printf("connect failed!");
	}

	$q = "select temperature,time from temperature order by time desc limit 13";
	$result = $mysqli->query($q);

	if ($result!=null)
	{
		while ($row = $result->fetch_row())
		{
			printf("temps.push(\"$row[0]\");\n");
			printf("times.push(\"$row[1]\");\n");
		}


 		printf("loadGraph();\n");
	}
	else
	{
		printf("query failed.!");
	}
?>


}
</script>
</head>
<body onLoad = "onLoad()">
<h1>Temp Page</h1>
<canvas id="myCanvas" width="500" height="250" style="border:1px solid #000000;">
</canvas>



<button onclick="refreshPage()"> Update </button>

</body>
</html>
