
<?php
	session_start();

	//if the form has been submitted
	if (isset($_POST['submitted'])){
	//get the information out of get or post depending on your form
		$username = $_POST['uname'];
		$password = $_POST['psw'];

	//connect to the database
	$db = new PDO("mysql:dbname=coursework;host=localhost", "root", "");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
	//sanitise the inputs!
	$safe_username = $db->quote($username);
	
	//run a query to get the user associated with that username
	$query = "select * from organiser where username = $safe_username";
	
	$result = $db->query($query);
	
	$firstrow = $result->fetch(); //get the first row
	
		if (!empty($firstrow)) {
			//check the passwords, if correct add the session info and redirect
			$hashed_password = md5($password);
			
			if ($firstrow['password'] == $hashed_password){
				$_SESSION['id'] = $firstrow['id'];
				$_SESSION['name'] = $firstrow['username'];
				
				//echo "Success!";
				header("Location: loggedin.php");
				exit();
			} else {
				echo "<h1>Error logging in, password does not match</h1>";
			}
		} else {
			//else display an  error
			echo "<h1>Error logging in, Username not found </h1>";
		}
	}
?>

<html>
<head>
<title>Login</title>
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
  <li><a href="/CRW/Home.html">Home</a></li>
  <li><a class="active" href="/CRW/Login.php">Login</a></li>
  <li><a href="/CRW/RegForm.php">Register</a></li>
  <li><a href="/CRW/events.php">All Events</a></li>
  <li><a href="/CRW/sports.php">Sport</a></li>
  <li><a href="/CRW/culture.php">Culture</a></li>
  <li><a href="/CRW/other.php">Other</a></li>
  <li><a href="/CRW/EBD.php">Events By Date</a></li>
  <li><a href="/CRW/EBR.php">Events By Ranking</a></li>
</ul>
<form method="post" action="Login.php">
  <div class="imgcontainer">
  <span style="width:350px;display:inline-block"></span>	
    <img src="/Coursework/images/Login.gif" alt="Avatar" class="avatar" style="width:800px;height:250px;">
  </div>

  <div class="container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" >

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" >
	
	<p><input type="submit" name="login" value="Login" /></p>
    <input type="hidden" name="submitted" value="TRUE" />
        
		 <span><a href="/CRW/RegForm.php">NO account, click here to REGISTER NOW!</a></span>
  
    
  </div>
  
  <input type="hidden" name=“submitted” value=“true”/>
</form>
</body>
</html>
