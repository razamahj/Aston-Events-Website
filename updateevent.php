
<?php

session_start();

try{
		//connect to lab4 database on local server 
		$db = new PDO("mysql:dbname=coursework;host=localhost", "root", "");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		// Use select to get all student records and output in a table 
		
	$rows=$db->query("
        SELECT id FROM event WHERE organiser_id = '".$_SESSION['id']."'
    ");
	$rows=$rows->fetchAll();
	
	} catch (PDOException $ex){
		//this catches the exception when it is thrown
		echo "Sorry, a database error occurred. Please try again.<br> ";
		echo "Error details:". $ex->getMessage();
	}
	

//if the form has been submitted
if (isset($_POST['submitted'])){
	//create a database connection
	$db = new PDO("mysql:dbname=coursework;host=localhost", "root", "");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	//get and sanitise the inputs, we don't need to do this with the password as we hash it anyway
	$safe_category = $db->quote($_POST['category']);
	$safe_name = $db->quote($_POST['name']);
    $safe_time = $db->quote($_POST['time']);
	$safe_date = $db->quote($_POST['date']);
	$safe_description = $db->quote($_POST['description']);
	$safe_place = $db->quote($_POST['place']);
	$safe_pic = $db->quote($_POST['pic']);
	$safe_ranking = $db->quote($_POST['ranking']);
	
	
	

 
	//insert the entry into the database
	//$query = "insert into event values (default, $safe_category, $safe_name, $safe_time, $safe_date, $safe_organiser, $safe_description, $safe_place, $safe_pic, $safe_ranking, '".$_SESSION['id']."')";
	$query = "update event
	set category=$safe_category, event_name = $safe_name, event_time = $safe_time, event_date = $safe_date,event_description = $safe_description, event_place = $safe_place, event_pic = $safe_pic, event_ranking = $safe_ranking
	where id =".$_POST['event_id'];
	
	$db->exec($query);	

	//$id = $db->lastInsertId();
	
	//Output success or the errors
	echo "Congratulations! You have now updated event:".$_POST['event_id'];
}

?>


<html>
<head>
<title>Update event</title>
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
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}
</style>
<body>
<ul>
  <li><a href="/CRW/yourevents.php">Your Events</a></li>
  <li><a href="/CRW/eventForm.php">Add New Event</a></li>
  <li><a class="active" href="/CRW/updateevent.php">Update Your Events</a></li>
  <li><a href="/CRW/logout.php">Logout</a></li>

</ul>

<body>
<form method="post">
  <div class="imgcontainer">
  <span style="width:350px;display:inline-block"></span>	
    <img src="/CRW/images/eventupdate.png" alt="Avatar" class="avatar" style="width:800px;height:250px;">
  </div>

  <div class="container">
  Event ID:
  <select name='event_id'>
  <?php
		foreach ($rows as $row) {
			echo "<option value=".$row['id'].">".$row['id']."</option>";
		}
  ?>
	</select>  </br>
	
   Event Category:
   <select name='category'>
	   <option value="sport">sport</option>
	   <option value="culture">culture</option>
	   <option value="other">other</option>
	</select>  </br>
   
   Event Name: <input type="text" placeholder="Enter Event Name" name="name" >
   
   Event Time: <input type="text" placeholder="Enter Event Time 'HH:MM:SS' " name="time" >
   
   Event_Date: <input type="text" placeholder="Enter Event Date 'YYYY-MM-DD' " name="date" >
   
   Event Description: <input type="text" placeholder="Enter Event Description" name="description" >
   
   Event Place: <input type="text" placeholder="Enter Event Place" name="place" >
	
   Event pic: <input type="file" placeholder="Insert Event Pic" name="pic" >
   
   </br>
   </br>
   
  Event Ranking: 
   <select name="ranking">
	   <option value="1">1</option>
	   <option value="2">2</option>
	   <option value="3">3</option>
	     <option value="4">4</option>
		   <option value="5">5</option>
	</select>  </br>
	 
	
   
   
<p><input type="submit" name="submit" value="Submit" /></p>
<input type="hidden" name="submitted" value="TRUE" />    

  </div>
</form>
</body>
</html>