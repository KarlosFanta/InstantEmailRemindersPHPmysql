
<?php
$todays_date = date( "Ymd" );
$year = substr($todays_date, 0, 4);
$month = substr($todays_date, 4, 2);
$date = substr($todays_date, 6, 2);
//$trigger_date = date("Ymd", mktime (0,0,0,$month,$date-$number_of_days_before,$year));
$trigger_date = date("Ymd", mktime (0,0,0,$month,$date,$year));

 require_once("DBcode.php");
date_default_timezone_set('Africa/Harare');

include "dailyReminders.php";
include "weeklyReminders.php";


echo "<br><b>the following will be marked as Sent now:<br></b>";
echo "<br><b>the time is now:<br></b>";
echo  date('H:i');
$TimeNow =  date('H:i');
echo  "<br><br>";

$queryM = "SELECT * FROM eventsT WHERE RemDate <= '$trigger_date' AND Sent = '' AND Time1 = '$TimeNow' ORDER BY RemDate ASC";
echo $queryM;
$rowcount = 0;
if ($resultM = mysqli_query($DBConnect, $queryM)) {
echo "<table width='10' border='1'>\n";
echo "<tr><th>id</th>";
echo "<th>SRemSubj</th>";
echo "<th>SRemBody</th>";
echo "<th>SDate</th>";
echo "<th>Time1</th>";
echo "<th>Sent</th>";
echo "</tr>\n";

while ($row = mysqli_fetch_assoc($resultM)) {
$rowcount++;
echo "<tr>";
$id = $row["id"];
echo "<th>".$row["id"]."</th>";
echo "<th>".$row["RemSubj"]."</th>";
echo "<th>".$row["RemBody"]."</th>";
//echo "<th>".$row["reminder_year"]."</th>";
//echo "<th>".$row["reminder_month"]."</th>";
$RemDate = $row["RemDate"];
echo "<th>".$row["RemDate"]."</th>";
echo "<th>".$row["Time1"]."</th>";
echo "<th>".$row["Sent"]."</th>";
echo "</tr>\n";

$year = substr($row["RemDate"], 0, 4);
$month = substr($row["RemDate"], 4, 2);
$date = substr($row["RemDate"], 6, 2);
//$RemDate = date("M j, Y", mktime (0,0,0,$month,$date,$year));
$reminderDetails .= "Event: ".$row["RemSubj"]."\n";
$reminderDetails .= "Date: ".$RemDate."\n";
$reminderDetails .= $row["RemBody"]."\n\n";
}
mysqli_free_result($resultM);
}
echo"</table>";
echo "rc:".$rowcount."<br>";
if($rowcount > 0)
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
 	echo "<br><br>NO NEW REMINDERS";
}



//$queryM2 = "SELECT * FROM eventsT WHERE RemDate <= '$trigger_date' AND Sent = '' AND Time1 <= '$TimeNow' ";
$queryMUPD = "UPDATE eventsT SET Sent = 'Sent'  WHERE  RemDate <= '$trigger_date' AND Sent = '' AND Time1 <= '$TimeNow'";
echo "<br>".$queryMUPD;
if (mysqli_query($DBConnect, $queryMUPD) === TRUE) {   

	echo '<script //type="text/javascript">alert("updated $queryMUPD ")</script>';
}
else 
{
	echo '<script type="text/javascript">alert("Error NOT updated .$queryMUPD.")</script>';
}		



?>
