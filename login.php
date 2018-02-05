
<?php
if(isset($_POST{'login'}))
{
if((!empty($_POST['user_mail'])) && (!empty($_POST['user_password'])))
{	
	//INSERT VALUEBLE
	$user_mail=$_POST['user_mail'];
	$user_password=$_POST['user_password'];
	$user_check = $db->prepare('SELECT * FROM users WHERE user_mail=:mail and user_password=:password');
	$user_login_mail = $user_mail;
	$user_login_password = md5($user_password);
	$user_check->bindValue(':mail', $user_login_mail, PDO::PARAM_STR);
	$user_check->bindValue(':password', $user_login_password, PDO::PARAM_STR);
	$user_check->execute();
	$row_user_check = $user_check->fetch();
  
	if($row_user_check['user_id']==true){
  
		//INSERT SESSION INFO
		$_SESSION['member_id']=$row_user_check['user_id'];
		$_SESSION['member_username']=$row_user_check['user_name'];
		$_SESSION['loggin_attempt']='0';
		$_SESSION['logged_in'] = true; //set you've logged in
		$_SESSION['last_activity'] = time(); //your last activity was now, having logged in.
		$_SESSION['expire_time'] = 3*60*60; //expire time in seconds: three hours (you must change this)
    
    
		//INSERT LOGIN DETAIL
		$USER_LOGIN_ID=$row_user_check['user_id'];
		$USER_LOGIN_IP=$_SERVER['REMOTE_ADDR'];
		$statement = $db->prepare("INSERT INTO user_logins(login_user,login_ip) VALUES (:user, :ip)");
		$statement->execute(array("user" => $USER_LOGIN_ID,"ip" => $USER_LOGIN_IP));
		//END INSERT LOGIN DETAIL
		
		header('location:index.php');
    
	}else{
  
		$_SESSION['loggin_attempt']='1';
    
    }	
}

} 
//END OF LOGIN FORM
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
