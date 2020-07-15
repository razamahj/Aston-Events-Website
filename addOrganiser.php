<html >
<head>
<title>Task 7&8: Add a new student record and list all records</title>
</head>
<body>
<a href="RegForm.htm">Please click here to go back to the register page </a>
<br>
<?php
	//get the form data and do some basic validation  
	if (!empty ($_POST['fnm']))
		$fnm = $_POST['fnm'];
	else{
		echo "You must input a valid full name! <br>";
		exit;
	}
	
	if (!empty ($_POST['enm']))
		$enm = $_POST['enm'];
	else{
		echo "You must input a valid email! <br>";
		exit;
	}
		if (!empty ($_POST['pnm']))
		$pnm = $_POST['pnm'];
	else{
		echo "You must input a phone number <br>";
		exit;
	}
		if (!empty ($_POST['usm']))
		$usm = $_POST['usm'];
	else{
		echo "You must input a valid username! <br>";
		exit;
	}
		if (!empty ($_POST['psw']))
		$psw = $_POST['psw'];
	else{
		echo "You must input a valid password! <br>";
		exit;
	}
	
	
	
	try{
		//connect to lab4 database on local server 
		$db = new PDO("mysql:dbname=coursework;host=localhost", "root", "");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		// use the form data to create a insert SQL and  add a student record  
		$exec = "INSERT INTO organiser(organiser_name, organiser_email, organiser_phone, organiser_username, organiser_pass) VALUES ('".$fnm. "','". $enm."','".$pnm."','". $usm."', '". $psw."')";
		$db->exec($exec);
		echo " Congratulations you have now registered to become an event organsier! <br><br>"; 
?>
	<!-- HTML table to  display  all the student records -->
	<table cellspacing="0"  cellpadding="5">
	<tr><th>Organiser_id</th> <th >Organiser_name</th> <th >Organiser_email></th> <th >Organiser_phone</th><th >Organiser_username</th><th ></tr>
<?php
		// Use select to get all student records and output in a table 
		$rows=$db->query("select * from organiser");
		foreach ($rows as $row) { 
			echo  "<tr><td >" . $row['organiser_id'] . "</td><td >" . $row['organiser_name'] . "</td><td >" . $row['organiser_email'];
			echo "</td><td >" . $row['organiser_phone'] . "</td><td >" . $row['organiser_username']. "</td><td >" ."</td></tr>\n";
		}
		echo "</table> <br>";
		
	} catch (PDOException $ex){
		//this catches the exception when it is thrown
		echo "Sorry, a database error occurred. Please try again.<br> ";
		echo "Error details:". $ex->getMessage();
	}
	
?>
</body>
</html>
