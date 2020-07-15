
<html >
<head>
<title>Task 7&8: Add a new student record and list all records</title>
</head>
<body>
<a href="studentform.html">Please click here to go back to the add student page </a>
<br>
<?php
	//get the form data and do some basic validation  
	if (!empty ($_POST['firstname']))
		$firstname = $_POST['firstname'];
	else{
		echo "You must input a valid first name! <br>";
		exit;
	}
	
	if (!empty ($_POST['surname']))
		$surname = $_POST['surname'];
	else{
		echo "You must input a valid surname! <br>";
		exit;
	}
	
	$year = intval($_POST['year']);
	if (!$year){
		echo "You must input a valid year! <br>";
		exit;
	}

	$gender = $_POST['gender'];
	$course = $_POST['course'];
	
	try{
		//connect to lab4 database on local server 
		$db = new PDO("mysql:dbname=lab4;host=localhost", "root", "");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		// use the form data to create a insert SQL and  add a student record  
		$exec = "INSERT INTO student(course_id, first_name, last_name, gender, year_enroll) VALUES ($course,'".$firstname. "','". $surname."','".$gender."',". $year.")";
		$db->exec($exec);
		echo " Well Done, you just add one student record! <br><br>"; 
?>
	<!-- HTML table to  display  all the student records -->
	<table cellspacing="0"  cellpadding="5">
	<tr><th>Student_id</th> <th >Course_id</th> <th >First_Name></th> <th >Surname</th><th >Gender</th><th >Year</th><th ></tr>
<?php
		// Use select to get all student records and output in a table 
		$rows=$db->query("select * from student");
		foreach ($rows as $row) { 
			echo  "<tr><td >" . $row['student_id'] . "</td><td >" . $row['course_id'] . "</td><td >" . $row['first_name'];
			echo "</td><td >" . $row['last_name'] . "</td><td >" . $row['gender']. "</td><td >" . $row['year_enroll']."</td></tr>\n";
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
