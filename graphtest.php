<html>
<head>
<script>

function refreshPage()
{
        location.reload();
}


</script>
</head>
<body>
<h1>Temp Page</h1>
<canvas id="myCanvas" width="200" height="100" style="border:1px solid #000000;">
</canvas>


<table>
<?php 

$mysqli = new mysqli("127.0.0.1", "root","root","temp");
if (mysqli_connect_errno())
{
    printf("connect failed!");
}
$q = "select temperature,time from temperature order by time desc limit 10";
$result = $mysqli->query($q);

if ($result!=null)
{
	while ($row = $result->fetch_row())
	{
		printf("<tr><td>".$row[1] . "</td><td><img src=\"red-dot.png\" height=\"10\" width=\"" . $row[0]*3 . "\">$row[0]</td></tr>" );
	}
}
else
{
printf("query failed.!");
}
?>
<button onclick="refreshPage()"> Update </button>

</body>
</html>
