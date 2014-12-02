<script type='text/javascript'>//alert('Here is your reminder!');</script>
<meta charset="UTF-8">
<font size = '5'><b>This is your reminder</b></font><br>
<?php
date_default_timezone_set('Africa/Harare');
$TimeNow =  date('H:i');
require_once('header.php');
include('DBcode.php'); 
$reminderDetails = "";
$todays_date = date( "Ymd" );
$year = substr($todays_date, 0, 4);
$month = substr($todays_date, 4, 2);
$date = substr($todays_date, 6, 2);
$trigger_date = date("Ymd", mktime (0,0,0,$month,$date,$year));
//echo "<br>trigger_date: ".$trigger_date."<br>";
$timenow = date('H:i');
echo "Today is " . date("Y/m/d") . "<br>";
echo "<br>The Time now : ".$timenow."<br>";

$id = '';

echo "<br>Happening right now:";

$query = "SELECT * FROM eventsT WHERE RemDate = '$trigger_date' AND Time1 = '$timenow' ORDER BY RemDate ASC";
echo $query;
if ($result = mysqli_query($DBConnect, $query)) {
echo "<table width='10' border='1'>\n";
echo "<tr><th>id</th>";
echo "<th>Event</th>";
echo "<th>Details</th>";
echo "<th>Date</th>";
echo "<th>Time1</th>";
echo "<th>Sent</th>";
echo "</tr>\n";

while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
$id = $row["id"];
echo "<th>".$row["id"]."</th>";
echo "<th>".$row["RemSubj"]."</th>";
echo "<th><font size = 5>".$row["RemBody"]."</font></th>";
$year = substr($row["RemDate"], 0, 4);
$month = substr($row["RemDate"], 5, 2);
$day = substr($row["RemDate"], 8, 2);
$RemDate = $day. ".". $month.".".$year;
echo "<th>".$day;
echo ".";
echo $month;
echo ".";
echo $year."</th>";
echo "<th>".$row["Time1"]."</th>";
echo "<th>".$row["Sent"]."</th>";
echo "</tr>\n";
}
mysqli_free_result($result);
echo "</table>";
}
else
echo "<BR><BR><BR>nothing now<BR>";



$query = "SELECT * FROM dailyevents WHERE Time1 = '$timenow' ORDER BY RemSubj ASC";
echo $query;
if ($result = mysqli_query($DBConnect, $query)) {
echo "<table width='10' border='1'>\n";
echo "<tr><th>id</th>";
echo "<th>Event</th>";
echo "<th>Details</th>";
echo "<th>Time1</th>";
echo "<th>Email</th>";
echo "</tr>\n";

while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
$id = $row["id"];
echo "<th>".$row["id"]."</th>";
echo "<th>".$row["RemSubj"]."</th>";
echo "<th><font size = 5>".$row["RemBody"]."</font></th>";
echo "<th>".$row["Time1"]."</th>";
echo "<th>".$row["Email"]."</th>";
echo "</tr>\n";
}
mysqli_free_result($result);
echo "</table>";
}
else
echo "<BR><BR><BR>nothing now<BR>";





$WeekDay = date("N");
echo "WeekDay:", $WeekDay;

$query = "SELECT * FROM weeklyevents WHERE WeekDay = '$WeekDay' AND Time1 = '$timenow'";
echo $query;
if ($result = mysqli_query($DBConnect, $query)) {
echo "<table width='10' border='1'>\n";
echo "<TR><th>id</TH>";
echo "<th>Event</th>";
echo "<th>Details</th>";
echo "<th>Time1</th>";
echo "<th>WeekDay</th>";
///echo "<th>Sent</th>";
echo "</tr>\n";

while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
$id = $row["id"];
echo "<th>".$row["id"]."</th>";
echo "<th>".$row["RemSubj"]."</th>";
echo "<th><font size = 5>".$row["RemBody"]."</font></th>";
echo "<th>".$row["Time1"]."</th>";
echo "<th>".$row["WeekDay"]."</th>";
echo "</tr>\n";
}
mysqli_free_result($result);
echo "</table>";
}


echo "<br>More events coming up today:";


$query = "SELECT * FROM eventsT WHERE RemDate = '$trigger_date' AND Sent = '' ORDER BY Time1 ASC";
echo $query;
if ($result = mysqli_query($DBConnect, $query)) {
echo "<table width='10' border='1'>\n";
echo "<tr><th>id</th>";
echo "<th>Event</th>";
echo "<th>Details</th>";
echo "<th>Date</th>";
echo "<th>Time1</th>";
echo "<th>Sent</th>";
echo "</tr>\n";

while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
$id = $row["id"];
echo "<th>".$row["id"]."</th>";
echo "<th>".$row["RemSubj"]."</th>";
echo "<th><font size = 5>".$row["RemBody"]."</font></th>";
$year = substr($row["RemDate"], 0, 4);
$month = substr($row["RemDate"], 5, 2);
$day = substr($row["RemDate"], 8, 2);
$RemDate = $day. ".". $month.".".$year;
echo "<th>".$day;
echo ".";
echo $month;
echo ".";
echo $year."</th>";
echo "<th>".$row["Time1"]."</th>";
echo "<th>".$row["Sent"]."</th>";
echo "</tr>\n";
}
mysqli_free_result($result);
echo "</table>";
}
else
echo "no more events today";



echo "<br>Events you missed out on:";


$query = "SELECT * FROM eventsT WHERE RemDate <= '$trigger_date' AND Sent = '' ORDER BY RemDate ASC";
echo $query;
if ($result = mysqli_query($DBConnect, $query)) {
echo "<table width='10' border='1'>\n";
echo "<tr><th>id</th>";
echo "<th>Event</th>";
echo "<th>Details</th>";
echo "<th>Date</th>";
echo "<th>Time1</th>";
echo "<th>Sent</th>";
echo "</tr>\n";

while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
$id = $row["id"];
echo "<th>".$row["id"]."</th>";
echo "<th>".$row["RemSubj"]."</th>";
echo "<th><font size = 5>".$row["RemBody"]."</font></th>";
$year = substr($row["RemDate"], 0, 4);
$month = substr($row["RemDate"], 5, 2);
$day = substr($row["RemDate"], 8, 2);
$RemDate = $day. ".". $month.".".$year;
echo "<th>".$day;
echo ".";
echo $month;
echo ".";
echo $year."</th>";
echo "<th>".$row["Time1"]."</th>";
echo "<th>".$row["Sent"]."</th>";
echo "</tr>\n";
}
mysqli_free_result($result);
echo "</table>";
}
else
echo "nothing missed out on";


echo "upcoming weekly events for today:";
$query = "SELECT * FROM weeklyevents WHERE WeekDay = '$WeekDay' AND Time1 > '$timenow'";
echo $query;
if ($result = mysqli_query($DBConnect, $query)) {
echo "<table width='10' border='1'>\n";
echo "<TR><th>id</TH>";
echo "<th>Event</th>";
echo "<th>Details</th>";
echo "<th>WeekDay</th>";
echo "<th>Time1</th>";
//echo "<th>Sent</th>";
echo "</tr>\n";

while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
$id = $row["id"];
echo "<th>".$row["id"]."</th>";
echo "<th>".$row["RemSubj"]."</th>";
echo "<th><font size = 5>".$row["RemBody"]."</font></th>";
echo "<th>".$row["WeekDay"]."</th>";
echo "<th>".$row["Time1"]."</th>";
//echo "<th>".$row["Sent"]."</th>";
echo "</tr>\n";
}
mysqli_free_result($result);
echo "</table>";
}





?>
