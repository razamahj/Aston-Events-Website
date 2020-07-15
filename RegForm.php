









<!DOCTYPE html>
<html>
<head>
<title>Registration</title>
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
  <li><a href="/CRW/Login.php">Login</a></li>
  <li><a class="active" href="/CRW/RegForm.php">Register</a></li>
  <li><a href="/CRW/events.php">All Events</a></li>
  <li><a href="/CRW/sports.phph">Sport</a></li>
  <li><a href="/CRW/culture.php">Culture</a></li>
  <li><a href="/CRW/other.php">Other</a></li>
  <li><a href="/CRW/EBD.php">Events By Date</a></li>
  <li><a href="/CRW/EBR.php">Events By Ranking</a></li>
</ul>

<form method="post" action="RegForm.php">
  <div class="imgcontainer">
  <span style="width:350px;display:inline-block"></span>	
    <img src="/CRW/images/Register.gif" alt="Avatar" class="avatar" style="width:800px;height:250px;">
  </div>

  <div class="container">

   First Name: <input type="text" placeholder="Enter First Name" name="firstname" >
   
   Last Name: <input type="text" placeholder="Enter Last Name" name="lastname" >
   
   Email Address: <input type="text" placeholder="Enter Email Address" name="email" >
   
   Phone Number: <input type="text" placeholder="Enter Phone Number" name="number" >
   
   Username: <input type="text" placeholder="Enter Username" name="username" >
   
   Password: <input type="password" placeholder="Enter Password" name="password" >
   
<p><input type="submit" name="submit" value="Submit" /></p>
<input type="hidden" name="submitted" value="TRUE" />    

  </div>
</form>

<?php



	
	$errors = array();

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$number = $_POST['number'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	
//if the first name isn't empty (so there is a value for it)
if (!empty($_POST['firstname']) and (preg_match("/^[a-zA-Z ]*$/",$firstname))){
	$firstname = $_POST['firstname'];
} else {
	$errors[] = "FirstName was not set and must not contain digits.";
}

if (!empty($_POST['lastname']) and (preg_match("/^[a-zA-Z ]*$/",$lastname))){
	$lastname = $_POST['lastname'];
} else {
	$errors[] = "Lastname was not set and must not contain digits.";
}

//if the Username is set
if (!empty($_POST['email']) and (preg_match('/^([a-z0-9]+([_\.\-]{1}[a-z0-9]+)*){1}([@]){1}([a-z0-9]+([_\-]{1}[a-z0-9]+)*)+(([\.]{1}[a-z]{2,6}){0,3}){1}$/i', $email))){
	$email = $_POST['email'];
} else {
	$errors[] = "Email not set or wrong format 'example@somename-somewhere.com' would pass fine.";
}




if (!empty($_POST['number']) and  (preg_match ('/^(\+44\s?7\d{3}|\(?07\d{3}\)?)\s?\d{3}\s?\d{3}$/',$number))){
	$number = $_POST['number'];
} else {
	$errors[] = "Number not set or wrong format e.g  all these will match:
07222 555555

(07222) 555555

+44 7222 555 555
";

}

if (!empty($_POST['username']) and(preg_match("([a-z 0-9](?=.{3})(?!.{10}))", $username))){
	$username = $_POST['username'];
} else {
	$errors[] = "Username not set and not in valid format, 
•Numbers from 0 - 9
•No capital letters
•no special symbols at all
•min of 6 characters 
•max of 10 characters 
";
}

if (!empty($_POST['password']) and (preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/',$password))){
	$password = $_POST['password'];
} else {
	$errors[] = "Password not set or does not match format 
	•at least one lowercase char
•at least one uppercase char
•at least one digit
•at least one special sign of @#-_$%^&+=§!?
";
}
if (isset($_POST["submitted"])) { 
	if (empty($errors)){
		$db = new PDO("mysql:dbname=coursework;host=localhost", "root", "");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		//get and sanitise the inputs, we don't need to do this with the password as we hash it anyway
		$safe_firstname = $db->quote($_POST['firstname']);
		$safe_lastname = $db->quote($_POST['lastname']);
		$safe_email = $db->quote($_POST['email']);
		$safe_number = $db->quote($_POST['number']);
		$safe_username = $db->quote($_POST['username']);
		$hashed_password = md5($_POST['password']);
			
		//insert the entry into the database
		$query = "insert into organiser values (default, $safe_username, '$hashed_password',$safe_firstname, $safe_lastname, $safe_email,  $safe_number)";

		$db->exec($query);	

		//get the ID
		$id = $db->lastInsertId();
		
		//Output success or the errors
		echo "Congratulations! You are now registered. Your ID is: $id";	
	} else { //errors is not empty, so we print out the error messages
		
		echo "<h1> Errors with form submission: </h1> \n";
		foreach ($errors as $e){
			echo "<ol> $e </ol>";
		}
	  }

}





?>
</body>
</html>