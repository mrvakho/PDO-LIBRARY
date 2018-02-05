<?php

$statement = $db->prepare("INSERT INTO users(user_name,
user_surname,
user_mail,
user_password) 

VALUES 

(:user_name,
:user_surname,
:user_mail,
:user_password)");
$statement->execute(array("user_name" => $user_name, 
"user_surname" => $user_surname, 
"user_mail" => $user_mail, 
"user_password" => $user_password));

?>
