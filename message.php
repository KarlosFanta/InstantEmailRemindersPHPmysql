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

echo "<br>Happening right now: ";

$query = "SELECT * FROM eventsOnceOff WHERE RemDate = '$trigger_date' AND Time1 = '$timenow' ORDER BY RemDate ASC";
echo "<textarea style='width: 300px; height: 20px;' >".$query."</textarea>";

if ($result = mysqli_query($DBConnect, $query)) {
$row_cnt = mysqli_num_rows($result);
if ( $row_cnt > 0)
{
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
}
echo "<BR>";

echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
$query = "SELECT * FROM dailyevents WHERE Time1 = '$timenow' ORDER BY RemSubj ASC";
echo "<textarea style='width: 300px; height: 20px;' >".$query."</textarea>";

if ($result = mysqli_query($DBConnect, $query)) {
$row_cnt = mysqli_num_rows($result);
if ( $row_cnt > 0)
{
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
}





$WeekDay = date("N");
echo "<br>WeekDay:", $WeekDay;
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
$query = "SELECT * FROM weeklyevents WHERE WeekDay = '$WeekDay' AND Time1 = '$timenow'";

echo "<textarea style='width: 300px; height: 20px;' >".$query."</textarea>";

if ($result = mysqli_query($DBConnect, $query)) {
$row_cnt = mysqli_num_rows($result);
if ( $row_cnt > 0)
{
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
}



$MonthDay = date("j");
echo "<br>MonthDay:", $MonthDay;
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
$query = "SELECT * FROM monthlyevents WHERE MonthDay = '$MonthDay' AND Time1 = '$timenow'";

echo "<textarea style='width: 300px; height: 20px;' >".$query."</textarea>";

if ($result = mysqli_query($DBConnect, $query)) {
$row_cnt = mysqli_num_rows($result);
if ( $row_cnt > 0)
{
echo "<table width='10' border='1'>\n";
echo "<TR><th>id</TH>";
echo "<th>Event</th>";
echo "<th>Details</th>";
echo "<th>Time1</th>";
echo "<th>MonthDay</th>";
///echo "<th>Sent</th>";
echo "</tr>\n";

while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
$id = $row["id"];
echo "<th>".$row["id"]."</th>";
echo "<th>".$row["RemSubj"]."</th>";
echo "<th><font size = 5>".$row["RemBody"]."</font></th>";
echo "<th>".$row["Time1"]."</th>";
echo "<th>".$row["MonthDay"]."</th>";
echo "</tr>\n";
}
mysqli_free_result($result);
echo "</table>";
}
}


//yearlyevents:
$MonthDay = date("n"); //same as today or dayNumeric representation of a month, without leading zeros 	1 through 12
echo "<br>MonthDay:", $MonthDay;
$day = date("j");

echo "<br>Day:", $day;//day of the month
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
$query = "SELECT * FROM yearlyevents WHERE Month = '$MonthDay' AND Day = '$day'";

echo "<textarea style='width: 300px; height: 20px;' >".$query."</textarea>";

if ($result = mysqli_query($DBConnect, $query)) {
$row_cnt = mysqli_num_rows($result);
if ( $row_cnt > 0)
{
echo "<table width='10' border='1'>\n";
echo "<TR><th>id</TH>";
echo "<th>Event</th>";
echo "<th>Yearly Event</th>";
echo "<th></th>";
echo "<th></th>";
///echo "<th>Sent</th>";
echo "</tr>\n";

while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
$id = $row["id"];
echo "<th>".$row["id"]."</th>";
echo "<th>".$row["RemSubj"]."</th>";
echo "<th><font size = 5>".$row["RemBody"]."</font></th>";
echo "<th>".$row["Time1"]."</th>";
echo "<th>".$row["Day"].".".$row["Month"].".$year</th>";
echo "</tr>\n";
}
mysqli_free_result($result);
echo "</table>";
}
}



echo "<br>More once off events coming up: ";

$query = "SELECT * FROM eventsOnceOff where Sent != 'Sent'";
echo "<textarea style='width: 300px; height: 20px;' >".$query."</textarea>";

if ($result = mysqli_query($DBConnect, $query)) {
$row_cnt = mysqli_num_rows($result);
if ( $row_cnt > 0)
{

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
}



echo "<br>Events you missed out on: ";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";


$query = "SELECT * FROM eventsOnceOff WHERE RemDate <= '$trigger_date' AND Sent = '' ORDER BY RemDate ASC";
echo "<textarea style='width: 300px; height: 20px;' >".$query."</textarea>";

if ($result = mysqli_query($DBConnect, $query)) {
$row_cnt = mysqli_num_rows($result);
if ( $row_cnt > 0)
{
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
}


echo "<br>Upcoming weekly events for today: ";
$query = "SELECT * FROM weeklyevents WHERE WeekDay = '$WeekDay' AND Time1 > '$timenow'";
echo "<textarea style='width: 300px; height: 20px;' >".$query."</textarea>";

if ($result = mysqli_query($DBConnect, $query)) {
$row_cnt = mysqli_num_rows($result);
if ( $row_cnt > 0)
{
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
}

echo "<br>Upcoming monthly events for today: ";
$query = "SELECT * FROM monthlyevents WHERE MonthDay = '$MonthDay' AND Time1 > '$timenow'";
echo "<textarea style='width: 300px; height: 20px;' >".$query."</textarea>";

if ($result = mysqli_query($DBConnect, $query)) {
$row_cnt = mysqli_num_rows($result);
if ( $row_cnt > 0)
{
echo "<table width='10' border='1'>\n";
echo "<TR><th>id</TH>";
echo "<th>Event</th>";
echo "<th>Details</th>";
echo "<th>MonthDay</th>";
echo "<th>Time1</th>";
//echo "<th>Sent</th>";
echo "</tr>\n";

while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
$id = $row["id"];
echo "<th>".$row["id"]."</th>";
echo "<th>".$row["RemSubj"]."</th>";
echo "<th><font size = 5>".$row["RemBody"]."</font></th>";
echo "<th>".$row["MonthDay"]."</th>";
echo "<th>".$row["Time1"]."</th>";
//echo "<th>".$row["Sent"]."</th>";
echo "</tr>\n";
}
mysqli_free_result($result);
echo "</table>";
}
}


?>
<table width="90%" border="0" align="center">

<?php
$query = "select * from dailyevents order by Time1";
//echo $query;
if ($result = mysqli_query($DBConnect, $query)) {
echo "<table width='10' border='1'>\n";
echo "<tr><th>id</th>";
echo "<th>Subj</th>";
echo "<th>Email</th>";
echo "<th>desc</th>";
echo "<th>date</th>";
echo "</tr>\n";

while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
echo "<th>".$row["id"]."</th>";//CustNo is case senSitiVe
echo "<th>".$row["RemSubj"]."</th>";//CustNo is case senSitiVe
echo "<th>".$row["RemBody"]."</th>";//CustFN is case senSitiVe
echo "<th>".$row["Email"]."</th>";//CustLN is case senSitiVe
echo "<th>".$row["Time1"]."</th>";//CustLN is case senSitiVe
//echo "<th>".$row["Sent"]."</th>";//CustLN is case senSitiVe
//echo "<th>".$row["id"]."</th>";//CustLN is case senSitiVe
echo "</tr>\n";

}
mysqli_free_result($result);
}
?>
