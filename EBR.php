<html >
<head>
<title>Events By Likeness Ranking</title>
</head>
<style>
ul {
    list-style-type: none;
	text-align: center;
    margin-bottom: 10px;
	width: 100%;
	height:40px;
    padding: 0;
    overflow: hidden;
    background-color: #111;
}

li {
    float: none;
	display: inline-block;
}

li a {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #111;
}

.active {
    background-color: #4CAF50;
}


form {
    border: 3px solid #f1f1f1;
}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 100%;
    border-radius: 50%;
}

.container {
    padding: 30px;
}

span.psw {
    float: right;
    padding-top: 16px;
}
</style>
<body background = "/Coursework/images/WB.gif">
<ul>
  <li><a href="/CRW/Home.html">Home</a></li>
  <li><a href="/CRW/Login.php">Login</a></li>
  <li><a href="/CRW/RegForm.php">Register</a></li>
  <li><a href="/CRW/events.php">All Events</a></li>
  <li><a href="/CRW/sports.php">Sport</a></li>
  <li><a href="/CRW/culture.php">Culture</a></li>
  <li><a href="/CRW/other.php">Other</a></li>
   <li><a href="/CRW/EBD.php">Events By Date</a></li>
      <li><a class="active" href="/CRW/EBR.php">Events By Ranking</a></li>
</ul>
        
<br>
<?php

	
	try{
		//connect to lab4 database on local server 
		$db = new PDO("mysql:dbname=coursework;host=localhost", "root", "");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		

?>
		<!-- HTML table to  display  all the student records -->
	<table cellspacing="0"  cellpadding="5">
	<tr><th>Event Name</th> <th >EventDescription</th> <th >Event Time</th> <th >Likeness Ranking</th> <th > </th><th ></tr>
<?php
		// Use select to get all student records and output in a table 
		$rows=$db->query("SELECT event_name, event_description, event_time, event_ranking FROM event WHERE event_ranking='1' or '2' or '3' or '4' or '5' order by event_ranking desc ");
		foreach ($rows as $row) { 
			echo "</td><td >" . $row['event_name']. "</td><td >" .$row['event_description']. "</td><td >" . $row['event_time']. "</td><td >" . $row['event_ranking']. "</td></tr>\n";
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