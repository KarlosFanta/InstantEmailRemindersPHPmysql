
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
$WeekDay = date("N");
echo "WeekDay:", $WeekDay;
echo  "<br><br>";

$queryW = "SELECT * FROM weeklyevents WHERE WeekDay = '$WeekDay' AND Time1 = '$TimeNow' ORDER BY Time1 ASC";
echo $queryW;
$rowcountW = 0;
if ($resultW = mysqli_query($DBConnect, $queryW)) {
echo "<table width='10' border='1'>\n";
echo "<tr><th>id</th>";
echo "<th>SRemSubj</th>";
echo "<th>SRemBody</th>";
echo "<th>WeekDay</th>";
echo "<th>Time1</th>";
echo "</tr>\n";

while ($row = mysqli_fetch_assoc($resultW)) {
$rowcountW++;
echo "<tr>";
$id = $row["id"];
echo "<th>".$row["id"]."</th>";
echo "<th>".$row["RemSubj"]."</th>";
$RemSubj = $row["RemSubj"];
echo "<th>".$row["RemBody"]."</th>";
echo "<th>".$row["WeekDay"]."</th>";
echo "<th>".$row["Time1"]."</th>";
echo "</tr>\n";

$reminderDetails .= "Event: ".$row["RemSubj"]."\n";
$reminderDetails .= "WeekDay: ".$WeekDay."\n";
$reminderDetails .= $row["RemBody"]."\n\n";
}
mysqli_free_result($resultW);
}
echo"</table>";
echo "rc:".$rowcountW."<br>";
if($rowcountW > 0)
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
 	echo "<br><br>NO NEW WEEKLY REMINDERS";
}



/*//$queryM2 = "SELECT * FROM eventsT WHERE RemDate <= '$trigger_date' AND Sent = '' AND Time1 <= '$TimeNow' ";
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
