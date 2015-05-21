
<?php
$todays_date = date( "Ymd" );
$year = substr($todays_date, 0, 4);
$month = substr($todays_date, 4, 2);
$date = substr($todays_date, 6, 2);
$trigger_date = date("Ymd", mktime (0,0,0,$month,$date,$year));

 require_once("DBcode.php");
date_default_timezone_set('Africa/Harare');


echo "<br><b>the time is now:<br></b>";
echo  date('H:i');
$TimeNow = '';
$TimeNow =  date('H:i');

$MonthDay = date("n"); //same as today or dayNumeric representation of a month, without leading zeros 	1 through 12
echo "<br>MonthDay:", $MonthDay;
$day = date("j");
echo  "<br><br>";

$queryY = "SELECT * FROM yearlyevents WHERE Day = '$Day' AND Month = '$MonthDay' AND Time1 = '$TimeNow' ORDER BY Time1 ASC";
echo $queryY;
$rowcountY = 0;
if ($resultY = mysqli_query($DBConnect, $queryY)) {
echo "<table width='10' border='1'>\n";
echo "<tr><th>id</th>";
echo "<th>SRemSubj</th>";
echo "<th>SRemBody</th>";
echo "<th>WeekDay</th>";
echo "<th>Email</th>";
echo "<th>Time1</th>";
echo "</tr>\n";

while ($row = mysqli_fetch_assoc($resultY)) {
$rowcountY++;
echo "<tr>";
$id = $row["id"];
echo "<th>".$row["id"]."</th>";
echo "<th>".$row["RemSubj"]."</th>";
$RemSubj = $row["RemSubj"];
echo "<th>".$row["RemBody"]."</th>";
echo "<th>".$row["WeekDay"]."</th>";
echo "<th>".$row["Email"]."</th>";
echo "<th>".$row["Time1"]."</th>";
echo "</tr>\n";

$reminderDetails .= "Event: ".$row["RemSubj"]."\n";
$reminderDetails .= "WeekDay: ".$WeekDay."\n";
$reminderDetails .= $row["RemBody"]."\n\n";
}
mysqli_free_result($resultY);
}
echo"</table>";
echo "rc:".$rowcountY."<br>";
if($rowcountY > 0)
 {
 echo "Reminder executed now!";
//mail has been TEMPORARILY DISABLED:
////////not needed///system('cmd.exe /c C:\wamp\www\ACSevents\Message.bat');
system('cmd /c C:\wamp\www\ACSevents\Message.bat'); //THIS BABY WORKS!!!
//exec("mybatch.bat");
mail("$to","Reminder $RemSubj","$reminderDetails","$mailheader");
}
else
{
 	echo "<br><br>NO NEW YEARLY REMINDERS";
}



/*//$queryM2 = "SELECT * FROM eventsOnceOff WHERE RemDate <= '$trigger_date' AND Sent = '' AND Time1 <= '$TimeNow' ";
$queryWUPD = "UPDATE weeklyevents SET Sent = 'Sent'  WHERE  RemDate <= '$trigger_date' AND Sent = '' AND Time1 <= '$TimeNow'";
echo "<br>".$queryWUPD;
if (mysqli_query($DBConnect, $queryWUPD) === TRUE) {   

	echo '<script //type="text/javascript">alert("updated $queryWUPD ")</script>';
}
else 
{
	echo '<script type="text/javascript">alert("Error NOT updated .$queryWUPD.")</script>';
}		


*/
?>
