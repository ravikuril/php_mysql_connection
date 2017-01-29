<html>
<body>
<form method="post">
<marquee> INTERFACE FOR DATA INSERTION AND RETRIVAL</marquee>
<table>
	<tr>
		<td>	EmployeeID:</td> 
		<td>	<input type="integer" name="eid"></td><br>
	</tr>
	<tr>
		<td>Employee_name:</td> 
		<td><input type="text" name="ename"><br></td>
	</tr>
	<tr>
		<td>sex:</td>
	   	<td><input type="text" name="sex"><br></td>
	</tr>
	<tr>
		<td>DepartmentNO:</td>
		<td><input type="integer" name="dno"><br></td>
	</tr>
	<tr>
		<td>
			<input type="submit">
		</td>
	</tr>
</table>
</form>

<form method="get">
<table>
	<tr>
		<td>	WANT TO SEE ALL DATA ENTER YES</td> 
		<td>	<input type="" name="DATA_SHOW"></td><br>
	</tr>
	<tr>
		<td>
			<input type="submit">
		</td>
	</tr>

</table>
</form>

</body>

</html>
<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'ravi2015';
$conn = mysql_connect($dbhost, $dbuser, $dbpass); // databse connectivity 
if(! $conn )
{
  die('Could not connect: '. mysql_error());// shows error when notconnected
}
echo 'DATABASE Connected successfully<br />';

 if ($_SERVER["REQUEST_METHOD"] == "POST") {       //code block for making 							   //varibales picked from
            $eid1 = $_POST["eid"];		   // form
            $ename1 = $_POST["ename"];
            $sex1 = $_POST["sex"];
            $dno1 = $_POST["dno"];
            //$gender = $_POST["gender"] ;	
	}

mysql_select_db( 'employ' );       // selecting database which is present in 						//mysql
	$sql = "INSERT INTO employee (eid,ename,sex,dno) VALUES 		('$eid1','$ename1','$sex1','$dno1')";    //inserting values 
	echo "<br>**SUBMIT ABOVE QUERY FOR DATA INSERTION***<br>";
	if(mysql_query($sql,$conn))
	{		
		echo "<br>STATUS: inserted data successfully<br>"; 
	}
	else {
		echo "<br>STATUS: data is not inseted in database by query1<br>";
		}	
//----------------------------------------PICKING DATA
mysql_select_db( 'employ' );
if($_SERVER["REQUEST_METHOD"] == "GET")
{ $DATA = $_GET["DATA_SHOW"];        // creating variable
	if($DATA=="YES")
		{
			$sql1 = "SELECT eid, ename, sex,dno FROM employee"; 
			$result = mysql_query($sql1,$conn);    //querying 

if (mysql_num_rows($result) > 0)
 	{
    
	echo"<br>_________________________";
	echo "<br>eno    ename   sex    dno<br>";
	echo"_________________________<br>";

    while($row = mysql_fetch_assoc($result))
		 {
		//output of the data
      		  echo " " . $row["eid"]. " " . $row["ename"]. " " . $row["sex"]. " ". $row["dno"]. "<br>";
		    }

		}
	 else {
		    echo "0 results";
		}
	}
	else{echo"CHOOSE SECOND QUERY TO SEE DATA";}
}

mysql_close($conn); 			// closing connection
?>
<!-- HTML code for the form input -->



