<html>

<head>
<title>PHP Example Today's Date</title>
</head>
<body>

<?php 
	//require_once('header.php');	
	echo "Today's date: ";
	echo date("l F d, Y"); 
	print "</br></br>PHP: echo date(\"l F d, Y\")</br></br>";
	
	echo "intval(4.8): ";
	echo intval(-4.8); 
	print "</br></br></br></br>";

	echo "round(4.8): ";
	echo -(round(-4.8)); 
	print "</br></br></br></br>";


	echo "round(4.8, 0, PHP_ROUND_HALF_UP): ";
	echo round(-4.8, 0, PHP_ROUND_HALF_UP);   
	print "</br></br></br></br>";

	
	phpinfo();
?>

</br>end.

</body>
</html>
