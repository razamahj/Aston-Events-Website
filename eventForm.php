<?php

session_start();

//if the form has been submitted
	
	$errors = array();
	
//if the name isn't empty (so there is a value for it)
if (isset($_POST['category']) ){
	$category = $_POST['category'];
} else {
	$errors[] = "Category was not set.";
}

//if the gender is set
if (!empty($_POST['name']) and (preg_match("/^[a-zA-Z ]*$/",$name))){
	$name = $_POST['name'];
} else {
	$errors[] = "Name not set and must contain only letters no digits";
}

if (!empty($_POST['time']) and (preg_match("/([1-12]):([0-5])([0-9])( )(am|pm|AM|PM)/",$time))){
	$time = $_POST['time'];
} else {
	$errors[] = "Time not set or in the wrong format 'like 10:30 am, 02:30 pm'";

}
if (!empty($_POST['date']) and (preg_match("/^[0-9]{4}-[0-1][0-9]-[0-3][0-9]$/",$date))){
	$date = $_POST['date'];
} else {
	$errors[] = "Date not set or format not correct";
}
if (!empty($_POST['description'])){
	$description = $_POST['description'];
} else {
	$errors[] = "Description not set";
}
if (!empty($_POST['place'])){
	$place = $_POST['place'];
} else {
	$errors[] = "Place not set";
}
if (isset($_POST['ranking'])){
	$ranking = $_POST['ranking'];
} else {
	$errors[] = "ranking not set";
}
if (isset($_POST['submitted'])){
	if (empty($errors)){
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
	$query = "insert into event values (default, $safe_category, $safe_name, $safe_time, $safe_date, $safe_description, $safe_place, $safe_pic, $safe_ranking, '".$_SESSION['id']."')";

	$db->exec($query);	

	$id = $db->lastInsertId();
	
	//Output success or the errors
	echo "Congratulations! You have now registered a new event with an id : $id";
} else { //errors is not empty, so we print out the error messages
		
		echo "<h1> Errors with form submission: </h1> \n";
		foreach ($errors as $e){
			echo "<ol> $e </ol>";
		}
	  }

}


?>


<html>
<head>
<title>Register event</title>
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
  <li><a class="active" href="/CRW/eventForm.php">Add New Event</a></li>
    <li><a href="/CRW/updateevent.php">Update Your Events</a></li>
  <li><a href="/CRW/logout.php">Logout</a></li>

</ul>

<body>
<form method="post" action="eventForm.php">
  <div class="imgcontainer">
  <span style="width:350px;display:inline-block"></span>	
    <img src="/CRW/images/event.jpg" alt="Avatar" class="avatar" style="width:800px;height:250px;">
  </div>

  <div class="container">

   Event Category:
   <select name="category">
	   <option value="sport">sport</option>
	   <option value="culture">culture</option>
	   <option value="other">other</option>
	</select>  </br>
   
   Event Name: <input type="text" placeholder="Enter Event Name" name="name" >
   
   Event Time: <input type="text" placeholder="Enter Event Time 'like 10:30 am, 02:30 pm' " name="time" >
   
   Event Date: <input type="text" placeholder="Enter Event Date 'YYYY-MM-DD' " name="date" >
   
   Event Description: <input type="text" placeholder="Enter Event Description" name="description" >
   
   Event Place: <input type="text" placeholder="Enter Event Place" name="place" >
	
   Event pic: <input type="file"  placeholder=" Insert an image" name="pic" accept="image/x-png,image/gif,image/jpeg" />
   
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