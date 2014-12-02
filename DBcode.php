<meta charset="UTF-8">
<?php

//I think all we need here is the database connection. That's all.

//$ErrorMsgs = array();
//echo "Change database root password in DBcode.php";
//You pass to the mysqli class host, user, password and DB arguments.
//instantiating a mysqli class object named $DBConnect using the mysqli() function:
//$DBConnect = @new mysqli("localhost", "root","1234566", "online_stores");//error control operator @ suppresses the error messages TEST Q

//OBJECT ORIENTED:
// $DBConnect = new mysqli("localhost", "root","Itsmeagain007#", "kc");

//PROCEDURAL 
 $DBConnect = mysqli_connect("localhost", "root", "Itsmeagain007#", "remsdb");

 // SEE BELOW ERROR CHECKING FOR URF8
 
 //error control operator @ suppresses the error messages TEST Q
//$DBConnect = new mysqli("localhost", "progress_root","Itsmeagain007#", "progress_kc");//error control operator @ suppresses the error messages TEST Q
//Username: 	progress_root

/*

NOTICE
NB
NB
When you have put it online and it shows Database connection up and running Default database is progress_kc
but you sitll get blanks
then you must open the PHPAdmin from within ther Cpanel
then run the SQl code!!!

*/


//$DBConnect = new mysqli("localhost", "premier_premier","777777a", "premier_online_stores");//error control operator @ suppresses the error messages TEST Q
//if($DBConnect->connect_errno) //object oreinted
//$ErrorMsgs[] = "Unable to connect to the database server"." Error code " . $DBConnect->connect_errno . ": " . $DBConnect->connect_error;
//else
//{
	//echo "<p>Database connection up and running ";
//	echo"";
//}
	
	
	
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
//else echo " connected!";
	if (mysqli_connect_errno())
  die(sprintf("[%d] %s\n", mysqli_connect_errno(), mysqli_connect_error()));
//else echo " connected!";
/* change character set to utf8 */
if (!mysqli_set_charset($DBConnect, "utf8")) {
    printf("Error loading character set utf8: %s\n", mysqli_error($DBConnect));
} else {
echo "";
    //printf("Current character set: %s\n", mysqli_character_set_name($DBConnect));
}
	
/*
/* Connection 1, connection bound SQL user variable, no SELECT thus run on master 
if (!$DBConnect->query("SET @myrole='master'")) {
 printf("[%d] %s\n", $DBConnect->errno, $DBConnect->error);
}

/* //Connection 2, run on slave because SELECT, provoke connection error 
if (!($res = $DBConnect->query("SELECT @myrole AS _role"))) {
 printf("[%d] %s\n", $DBConnect->errno, $DBConnect->error);
} else {
 $row = $res->fetch_assoc();
 $res->close();
printf("@myrole = '%s'\n", $row['_role']);
}
	
	*/
	
/*	if ($DBConnect->connect_error) {
    die('Connect Error (' . $DBConnect->connect_errno . ') '
            . $DBConnect->connect_error);
}

	
	// return name of current default database 
	//object oriented:
if ($result = $DBConnect->query("SELECT DATABASE()")) {
    $row = $result->fetch_row();
   // printf("Default database is %s.\n", $row[0]);
    $result->close();
}
*/




//Define BD charset ut8 and table charset utf8, charset file html utf8.
//Use mysql_query('set names utf8'); before your main query




















/* change db to another db 
$DBConnect->select_db("kc");

//return name of current default database 
if ($result = $DBConnect->query("SELECT DATABASE()")) {
    $row = $result->fetch_row();
    printf("Default database is %s.\n", $row[0]);
    $result->close();
}
*/
	
	
	
	
	
//mysqli class members connect_errno, connect_error, errno, and error 
//are data members, or variables, of the DB connection object. p569
	
	//Lecture5 he said i must put this into the 'inc' file, maybe i'm wrong:
/*	public function setStoreID($storeID)
{
if($this->storeID != $storeID)
{
$this->storeID = $storeID;
$SQLString = "SELECT * FROM inventory " .
" WHERE storeID = '" .$this->storeID ."'";
$QueryResult = @$this->DBConnect->query($SQLString);
if($QueryResult === FALSE)
{
$this->storeID = "";
}
else
{
$this->inventory = array();
while(($Row = $QueryResult->fetch_assoc()) !== NULL)
{
$this->inventory[$Row['productID']] = array();
$this->inventory[$Row['productID']]['name'] = $Row['name'];
$this->inventory[$Row['productID']]['description'] = $Row['description'];
$this->inventory[$Row['productID']]['price'] = $Row['price'];
$this->shoppingCart[$Row['productID']] = 0;
}
}//ELSE
} //IF
}
	
	*/
	
?>
