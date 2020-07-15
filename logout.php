
<?php
session_start(); //get the previous session info
session_destroy(); //destroy it

header("Location: Login.php"); //redirect back to the start

?>