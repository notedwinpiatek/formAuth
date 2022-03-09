<?php 

$email = $_REQUEST['email'];
$password = $_REQUEST['password'];

$ email = filter_var($email, FILTER_SANITIZE_EMAIL);

$db = new mysqli("localhost", "root", "", "auth");
//ręcznie
//$q = "SELECT * FROM user WHERE email = '$email";
//echo $q;
//$db->query($q)

//prepared statements
$q = $db->prepare("SELECT * FROM user WHERE email = ? LIMIT 1");
//podstaw wartości
$q->bind_param("s", $email);
//wykonaj
$q->execute();
$result = $q->get_result();

$userRow = $result->fetch_assoc();
if($userRow == null)
var_dump($userRow)

?>
<form action="index.php" method="get">
    <label for="emailInput">Email:</label>
    <input type="email" name="email" id="emailInput">
    <label for="passwordInput">Hasło:</label>
    <input type="password" name="password" id="passwordInput">
    <input type="submit" value="Zaloguj"> 
</form>