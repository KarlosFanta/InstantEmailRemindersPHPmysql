<a href= 'http://localhost/ACSevents/viewRemallM.php'>viewRemallM.php</a>

<?php
$todays_date = date( "Ymd" );
$year = substr($todays_date, 0, 4);
$month = substr($todays_date, 4, 2);
$date = substr($todays_date, 6, 2);
$trigger_date = date("Ymd", mktime (0,0,0,$month,$date,$year));

 require_once("DBcode.php");
date_default_timezone_set('Africa/Harare');
$year = substr($todays_date, 0, 4);
$month = substr($todays_date, 4, 2);
$date = substr($todays_date, 6, 2);
$trigger_date = date("Ymd", mktime (0,0,0,$month,$date,$year));


echo "<br><b>the time is now:<br></b>";
echo  date('H:i');
$TimeNow = '';
$TimeNow =  date('H:i');
$MonthDay = date("j"); //j 	Day of the month without leading zeros 	1 to 31
echo "MonthDay:", $MonthDay;
echo  "<br><br>";

$queryM = "SELECT * FROM monthlyevents WHERE MonthDay = '$MonthDay' AND Time1 = '$TimeNow' ORDER BY Time1 ASC";
//$queryM = "SELECT * FROM monthlyevents WHERE MonthDay = '$MonthDay'  ORDER BY Time1 ASC";
echo $queryM;
$rowcountM = 0;
if ($resultM = mysqli_query($DBConnect, $queryM)) {
echo "<table width='10' border='1'>\n";
echo "<tr><th>id</th>";
echo "<th>SRemSubj</th>";
echo "<th>SRemBody</th>";
echo "<th>MonthDay</th>";
echo "<th>Email</th>";
echo "<th>Time1</th>";
echo "</tr>\n";

while ($row = mysqli_fetch_assoc($resultM)) {
$rowcountM++;
echo "<tr>";
$id = $row["id"];
echo "<th>".$row["id"]."</th>";
echo "<th>".$row["RemSubj"]."</th>";
$RemSubj = $row["RemSubj"];
echo "<th>".$row["RemBody"]."</th>";
echo "<th>".$row["MonthDay"]."</th>";
echo "<th>".$row["Email"]."</th>";
echo "<th>".$row["Time1"]."</th>";
echo "</tr>\n";

$reminderDetails .= "Event: ".$row["RemSubj"]."\n";
$reminderDetails .= "MonthDay: ".$MonthDay."\n";
$reminderDetails .= $row["RemBody"]."\n\n";
}
mysqli_free_result($resultM);
}
echo"</table>";
echo "rc:".$rowcountM."<br>";
if($rowcountM > 0)
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
 	echo "<br><br>NO NEW MONTHLY REMINDERS";
}



/*//$queryM2 = "SELECT * FROM eventsOnceOff WHERE RemDate <= '$trigger_date' AND Sent = '' AND Time1 <= '$TimeNow' ";
$queryWUPD = "UPDATE Monthlyevents SET Sent = 'Sent'  WHERE  RemDate <= '$trigger_date' AND Sent = '' AND Time1 <= '$TimeNow'";
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
