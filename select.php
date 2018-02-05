<?php

if(!empty($_SESSION['member_id'])){
try{
//PARAM INT
		$uid2=$_SESSION['member_id'];
		$baby_info = $db->prepare("SELECT * FROM baby WHERE user=:id"); 
	 //INT->    	$baby_info->bindParam("id", $id, PDO::PARAM_INT);
   //STRING -> 	$user_check->bindValue(':mail', $user_check_mail, PDO::PARAM_STR);
		$baby_info->execute();
		$user_baby_info = $baby_info->fetch();

    }
catch(PDOException $e) {
echo '{"error":{"text":'. $e->getMessage() .'}}';
}
}

?>
