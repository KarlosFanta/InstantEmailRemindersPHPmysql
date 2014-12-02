<meta charset="UTF-8">
<?php
require_once('header.php');
include('DBcode.php'); // Our database connectivity file
include "viewRemall.php";

?>
<html>
<body>
<table width="90%" border="0" align="center">
<?php
$query = "select * from eventsT";
//echo $query;
if ($result = mysqli_query($DBConnect, $query)) {
echo "<table width='10' border='1'>\n";
echo "<tr><th>id</th>";
echo "<th>Subj</th>";
echo "<th>desc</th>";
echo "<th>date</th>";
echo "</tr>\n";

while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
echo "<th>".$row["id"]."</th>";//CustNo is case senSitiVe
echo "<th>".$row["RemSubj"]."</th>";//CustNo is case senSitiVe
echo "<th>".$row["RemBody"]."</th>";//CustFN is case senSitiVe
echo "<th>".$row["RemDate"]."</th>";//CustLN is case senSitiVe
echo "<th>".$row["Time1"]."</th>";//CustLN is case senSitiVe
echo "<th>".$row["Sent"]."</th>";//CustLN is case senSitiVe
//echo "<th>".$row["id"]."</th>";//CustLN is case senSitiVe
echo "</tr>\n";

}
mysqli_free_result($result);
}


?>
</table>
</body>
</html>
