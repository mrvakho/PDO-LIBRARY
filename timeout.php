<?php
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/* LOGGED USER PROFILE */

$_SESSION['last_activity'] = time(); //your last activity was now, having logged in.
$_SESSION['expire_time'] = 3*60*60;

if(!empty($_SESSION['member_id'])){
try{
		$uid=$_SESSION['member_id'];
		$stmt = $db->prepare("SELECT * FROM users WHERE user_id=:uid"); 
		$stmt->bindParam("uid", $uid,PDO::PARAM_INT);
		$stmt->execute();
		$user_info = $stmt->fetch();
    
    $memberid=$_SESSION['member_id'];


//SESSION TIMEOUT FUNCtION START
if($_SESSION['last_activity'] < time()-$_SESSION['expire_time']){ 
    session_destroy();
//	echo "SESSION TIME OUT";
}else{ 
    $_SESSION['last_activity'] = time(); 
}
//SESSION TIMEOUT FUNCtION END
}
catch(PDOException $e) {
echo '{"error":{"text":'. $e->getMessage() .'}}';
}
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
