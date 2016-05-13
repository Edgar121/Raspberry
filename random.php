
<html>
<head>
<title>Generate Random Number</title>
</head>

<body>
<p>From the range <?php
  echo $_POST["begin"];
  
?> to <?php
 echo $_POST["end"];
  
?>  I have selected the random number <?php
    echo rand($_POST["begin"],$_POST["end"]);
?>.</p>



</body>
</html>
