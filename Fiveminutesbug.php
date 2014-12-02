
<?php
 require_once("DBcode.php");
 require_once("header.php");
date_default_timezone_set('Africa/Harare');
echo "<br><b>5min bug<br>CHange last digit of Time1 to a 7 </b>";
echo  "<br><br>";

//$queryUU = "SELECT Time1 FROM eventsT";
//SUBSTRING(that_column, 1, CHAR_LENGTH(that_column) - 2) AS that_column_trimmed
//$queryUU = "UPDATE eventsT SET Time1 =concat(left(Time1,length(field) -5),'7') ";

/*
$queryUU = "UPDATE eventsT IF (LEFT(Time1,4) = '0') THEN
 SET Time1 = CONCAT( LEFT(Time1,4), '2')
ELSEIF (LEFT(Time1,4) = '1') THEN
UPDATE eventsT SET Time1 = 
CONCAT( LEFT(Time1,4), '2')
ELSEIF (LEFT(Time1,4) = '8') THEN
UPDATE eventsT SET Time1 = 
CONCAT( LEFT(Time1,4), '7')
ELSE UPDATE eventsT SET Time1 = 
CONCAT( LEFT(Time1,4), '7')";

$queryUU = "UPDATE eventsT 
SET Time1 = CONCAT( LEFT(Time1,4), '2') IF (RIGHT(Time1,1) = '0') 
SET Time1 = CONCAT( LEFT(Time1,4), '2') IF (RIGHT(Time1,1) = '1') 
SET Time1 = CONCAT( LEFT(Time1,4), '7') IF (RIGHT(Time1,1) = '3') 
SET Time1 = CONCAT( LEFT(Time1,4), '7') IF (RIGHT(Time1,1) = '4') 
SET Time1 = CONCAT( LEFT(Time1,4), '7') IF (RIGHT(Time1,1) = '5') 
SET Time1 = CONCAT( LEFT(Time1,4), '7') IF (RIGHT(Time1,1) = '6') 
SET Time1 = CONCAT( LEFT(Time1,4), '7') IF (RIGHT(Time1,1) = '8') 
SET Time1 = CONCAT( LEFT(Time1,4), '7') IF (RIGHT(Time1,1) = '9') 
";

$queryUU = "UPDATE eventsT SET Time1 =CONCAT(
                   REPLACE(
                      RIGHT(products_id,1), 'U', 'S'),      
                      SUBSTRING(products_id, 2, CHAR_LENGTH(products_id)
))";
*/

$queryUU = "UPDATE eventsT SET Time1 = 
(CONCAT( LEFT(Time1,4), '2')) where (RIGHT(Time1,1) = '0' )";

if (mysqli_query($DBConnect, $queryUU) === TRUE)    
echo 'updated $queryUU '.$queryUU."<br>";
else 
	echo 'Error NOT updated '.$queryUU;
	
	
$queryUU = "UPDATE eventsT SET Time1 = 
(CONCAT( LEFT(Time1,4), '2')) where (RIGHT(Time1,1) = '1' )";

if (mysqli_query($DBConnect, $queryUU) === TRUE)    
echo 'updated $queryUU '.$queryUU."<br>";
else 
	echo 'Error NOT updated '.$queryUU;
		

$queryUU = "UPDATE eventsT SET Time1 = 
(CONCAT( LEFT(Time1,4), '7')) where (RIGHT(Time1,1) = '3' )";

if (mysqli_query($DBConnect, $queryUU) === TRUE)    
echo 'updated $queryUU '.$queryUU."<br>";
else 
	echo 'Error NOT updated '.$queryUU;
		
$queryUU = "UPDATE eventsT SET Time1 = 
(CONCAT( LEFT(Time1,4), '7')) where (RIGHT(Time1,1) = '4' )";

if (mysqli_query($DBConnect, $queryUU) === TRUE)    
echo 'updated $queryUU '.$queryUU."<br>";
else 
	echo 'Error NOT updated '.$queryUU;
		
$queryUU = "UPDATE eventsT SET Time1 = 
(CONCAT( LEFT(Time1,4), '7')) where (RIGHT(Time1,1) = '5' )";

if (mysqli_query($DBConnect, $queryUU) === TRUE)    
echo 'updated $queryUU '.$queryUU."<br>";
else 
	echo 'Error NOT updated '.$queryUU;
		
$queryUU = "UPDATE eventsT SET Time1 = 
(CONCAT( LEFT(Time1,4), '7')) where (RIGHT(Time1,1) = '6' )";

if (mysqli_query($DBConnect, $queryUU) === TRUE)    
echo 'updated $queryUU '.$queryUU."<br>";
else 
	echo 'Error NOT updated '.$queryUU;
		
$queryUU = "UPDATE eventsT SET Time1 = 
(CONCAT( LEFT(Time1,4), '7')) where (RIGHT(Time1,1) = '8' )";

if (mysqli_query($DBConnect, $queryUU) === TRUE)    
echo 'updated $queryUU '.$queryUU."<br>";
else 
	echo 'Error NOT updated '.$queryUU;
		
$queryUU = "UPDATE eventsT SET Time1 = 
(CONCAT( LEFT(Time1,4), '7')) where (RIGHT(Time1,1) = '9' )";

if (mysqli_query($DBConnect, $queryUU) === TRUE)    
echo 'updated $queryUU '.$queryUU."<br>";
else 
	echo 'Error NOT updated '.$queryUU;
		

	






$queryUU = "UPDATE weeklyevents SET Time1 = 
(CONCAT( LEFT(Time1,4), '2')) where (RIGHT(Time1,1) = '0' )";

if (mysqli_query($DBConnect, $queryUU) === TRUE)    
echo 'updated $queryUU '.$queryUU."<br>";
else 
	echo 'Error NOT updated '.$queryUU;
	
	
$queryUU = "UPDATE weeklyevents SET Time1 = 
(CONCAT( LEFT(Time1,4), '2')) where (RIGHT(Time1,1) = '1' )";

if (mysqli_query($DBConnect, $queryUU) === TRUE)    
echo 'updated $queryUU '.$queryUU."<br>";
else 
	echo 'Error NOT updated '.$queryUU;
		

$queryUU = "UPDATE weeklyevents SET Time1 = 
(CONCAT( LEFT(Time1,4), '7')) where (RIGHT(Time1,1) = '3' )";

if (mysqli_query($DBConnect, $queryUU) === TRUE)    
echo 'updated $queryUU '.$queryUU."<br>";
else 
	echo 'Error NOT updated '.$queryUU;
		
$queryUU = "UPDATE weeklyevents SET Time1 = 
(CONCAT( LEFT(Time1,4), '7')) where (RIGHT(Time1,1) = '4' )";

if (mysqli_query($DBConnect, $queryUU) === TRUE)    
echo 'updated $queryUU '.$queryUU."<br>";
else 
	echo 'Error NOT updated '.$queryUU;
		
$queryUU = "UPDATE weeklyevents SET Time1 = 
(CONCAT( LEFT(Time1,4), '7')) where (RIGHT(Time1,1) = '5' )";

if (mysqli_query($DBConnect, $queryUU) === TRUE)    
echo 'updated $queryUU '.$queryUU."<br>";
else 
	echo 'Error NOT updated '.$queryUU;
		
$queryUU = "UPDATE weeklyevents SET Time1 = 
(CONCAT( LEFT(Time1,4), '7')) where (RIGHT(Time1,1) = '6' )";

if (mysqli_query($DBConnect, $queryUU) === TRUE)    
echo 'updated $queryUU '.$queryUU."<br>";
else 
	echo 'Error NOT updated '.$queryUU;
		
$queryUU = "UPDATE weeklyevents SET Time1 = 
(CONCAT( LEFT(Time1,4), '7')) where (RIGHT(Time1,1) = '8' )";

if (mysqli_query($DBConnect, $queryUU) === TRUE)    
echo 'updated $queryUU '.$queryUU."<br>";
else 
	echo 'Error NOT updated '.$queryUU;
		
$queryUU = "UPDATE weeklyevents SET Time1 = 
(CONCAT( LEFT(Time1,4), '7')) where (RIGHT(Time1,1) = '9' )";

if (mysqli_query($DBConnect, $queryUU) === TRUE)    
echo 'updated $queryUU '.$queryUU."<br>";
else 
	echo 'Error NOT updated '.$queryUU;
		
	



$queryUU = "UPDATE dailyevents SET Time1 = 
(CONCAT( LEFT(Time1,4), '2')) where (RIGHT(Time1,1) = '0' )";

if (mysqli_query($DBConnect, $queryUU) === TRUE)    
echo 'updated $queryUU '.$queryUU."<br>";
else 
	echo 'Error NOT updated '.$queryUU;
	
	
$queryUU = "UPDATE dailyevents SET Time1 = 
(CONCAT( LEFT(Time1,4), '2')) where (RIGHT(Time1,1) = '1' )";

if (mysqli_query($DBConnect, $queryUU) === TRUE)    
echo 'updated $queryUU '.$queryUU."<br>";
else 
	echo 'Error NOT updated '.$queryUU;
		

$queryUU = "UPDATE dailyevents SET Time1 = 
(CONCAT( LEFT(Time1,4), '7')) where (RIGHT(Time1,1) = '3' )";

if (mysqli_query($DBConnect, $queryUU) === TRUE)    
echo 'updated $queryUU '.$queryUU."<br>";
else 
	echo 'Error NOT updated '.$queryUU;
		
$queryUU = "UPDATE dailyevents SET Time1 = 
(CONCAT( LEFT(Time1,4), '7')) where (RIGHT(Time1,1) = '4' )";

if (mysqli_query($DBConnect, $queryUU) === TRUE)    
echo 'updated $queryUU '.$queryUU."<br>";
else 
	echo 'Error NOT updated '.$queryUU;
		
$queryUU = "UPDATE dailyevents SET Time1 = 
(CONCAT( LEFT(Time1,4), '7')) where (RIGHT(Time1,1) = '5' )";

if (mysqli_query($DBConnect, $queryUU) === TRUE)    
echo 'updated $queryUU '.$queryUU."<br>";
else 
	echo 'Error NOT updated '.$queryUU;
		
$queryUU = "UPDATE dailyevents SET Time1 = 
(CONCAT( LEFT(Time1,4), '7')) where (RIGHT(Time1,1) = '6' )";

if (mysqli_query($DBConnect, $queryUU) === TRUE)    
echo 'updated $queryUU '.$queryUU."<br>";
else 
	echo 'Error NOT updated '.$queryUU;
		
$queryUU = "UPDATE dailyevents SET Time1 = 
(CONCAT( LEFT(Time1,4), '7')) where (RIGHT(Time1,1) = '8' )";

if (mysqli_query($DBConnect, $queryUU) === TRUE)    
echo 'updated $queryUU '.$queryUU."<br>";
else 
	echo 'Error NOT updated '.$queryUU;
		
$queryUU = "UPDATE dailyevents SET Time1 = 
(CONCAT( LEFT(Time1,4), '7')) where (RIGHT(Time1,1) = '9' )";

if (mysqli_query($DBConnect, $queryUU) === TRUE)    
echo 'updated $queryUU '.$queryUU."<br>";
else 
	echo 'Error NOT updated '.$queryUU;
		
			
?>
