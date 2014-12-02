<meta charset="UTF-8">
<?php
date_default_timezone_set('Africa/Harare'); //change this to your location to get the correct time.
$TimeNow =  date('H:i');

include "Fiveminutesbug.php"; //Well, Windows Task Scheduler only fires every 5 minutes so I used this code to adjust.
//Well guess what you will have to figure it out and yes you will have to adjust it according to how you schedule it.
//Set up the task scheduler to fire every 5 minutes. Good luck


require_once('header.php');
include('database.inc.php'); // Our database connectivity file
// Values you need set
$to = "myEmAIL@whatever.com";  ///Put in your own personal email here for example gmail or yahoo
$reminderDetails = "";
$todays_date = date( "Ymd" );
$year = substr($todays_date, 0, 4);
$month = substr($todays_date, 4, 2);
$date = substr($todays_date, 6, 2);
$TrigDate = date("Ymd", mktime (0,0,0,$month,$date,$year));
echo "<br>TrigDate: ".$TrigDate."<br>";
$timenow = date('H:i');
echo "<br>timenow : ".$timenow."<br>";

$id = '';


$query = "SELECT * FROM eventsT WHERE RemDate <= $TrigDate AND Sent = '' ORDER BY RemDate ASC";
//this shows today's stuff and all previous stuff that has not been marked as Sent.
//$query = "SELECT * FROM eventsT WHERE  Sent = '' ORDER BY RemDate ASC";
echo $query;
if ($result = mysqli_query($DBConnect, $query)) {
echo "<table width='10' border='1'>\n";
echo "<tr><th>id</th>";
echo "<th>RemSubj</th>";
echo "<th>RemBody</th>";
echo "<th>Date</th>";
echo "<th>Time1</th>";
echo "<th>Sent</th>";
echo "</tr>\n";

while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
$id = $row["id"];
echo "<th>".$row["id"]."</th>";
echo "<th>".$row["RemSubj"]."</th>";
echo "<th>".$row["RemBody"]."</th>";
$RemSubj = $row["RemSubj"];
$RemDate = $row["RemDate"];
echo "<th>".$row["RemDate"]."</th>";
echo "<th>".$row["Time1"]."</th>";
echo "<th>".$row["Sent"]."</th>";

$year = substr($row["RemDate"], 0, 4);
$month = substr($row["RemDate"], 4, 2);
$date = substr($row["RemDate"], 6, 2);
//$RemDate = date("M j, Y", mktime (0,0,0,$month,$date,$year));

if ($row["Time1"] == $TimeNow)
$reminderDetails .= "Right now ";

$reminderDetails .= "Event: ".$row["RemSubj"]."\n";
$reminderDetails .= "Date: ".$RemDate." ".$row["Time1"]."\n";
$reminderDetails .= $row["RemBody"]."\n\n";

echo "</tr>\n";
}
mysqli_free_result($result);
}
echo "</table>";

echo "<br><br>reminderDetails: $reminderDetails";
//if( !empty( $nr ) )
//{
// Send out Reminder mail
$mailheader = "From: Reminder System <$to>\nX-Mailer: Reminder\nContent-Type: text/plain";
echo "<br>mailheader $mailheader<br>";
// mail($to, $subject, $message, $headers);  //headers is optional.
ini_set("SMTP","mail.whatevercom" ); // change your SMPT settings here: eg smtp.mydomain.com
ini_set('sendmail_from', 'mySecondEmail@mydomain.com'); //smtp authentication not available yet.
              // Try adding Swiftmailer or PHPmailer for SMTP authentication


include "mark.php"; //this updates reminders as sent

// mark.php marks the sent reminders as sent 
?>
