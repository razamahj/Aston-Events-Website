<?php
	session_start();
	
	//check if the person is logged in, otherwise redirect to start
	if (! isset($_SESSION['name'])){
		header("Location: Login.php");
	}
	
?>


<html>
<head>
<title>Logged in</title>
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
</style>
</head>
<body background = "/CRW/images/WB.gif">
<ul>
  <li><a class="active" href="/CRW/Home.html">Home</a></li>
  <li><a href="/CRW/yourevents.php">Your Events</a></li>
  <li><a href="/CRW/eventForm.php">Add New Event</a></li>
  <li><a href="/CRW/updateevent.php">Update Your Events</a></li>
  <li><a href="/CRW/logout.php">Logout</a></li>

</ul>
       

<h1>Hello <?php echo $_SESSION['name']; ?> you are now logged in </h1>

</body>
</html>