<?php
session_start();

if(isset($_POST['login'])){
if(!empty($_POST['username']) && !empty($_POST['password'])){
$USERNAME=strip_tags(trim($_POST['username']));
$PASSWORD=strip_tags(trim($_POST['password']));
$options = ['cost' => 12,];
$CRYPTED_PASSWORD=password_hash($_POST['password'], PASSWORD_BCRYPT, $options);

try{
    include('inc/config.php');
    $db=getDB();
    $LOGIN_QUERY = $db->prepare("SELECT * FROM users WHERE user_name=:username"); 
    $LOGIN_QUERY->bindValue(':username', $USERNAME, PDO::PARAM_STR);
    //$LOGIN_QUERY->bindValue(':pass', $CRYPTED_PASSWORD, PDO::PARAM_STR);
    $LOGIN_QUERY->execute();
    $LOGIN_QUERY_RESULT = $LOGIN_QUERY->fetch();
}
catch(PDOException $e){
    echo '{"error":{"text":'. $e->getMessage() .'}}';
}

if($LOGIN_QUERY_RESULT['user_pass']==true){
    $hash = $LOGIN_QUERY_RESULT['user_pass'];
if (password_verify($_POST['password'], $hash)) {
    $msgtxt= 'LOGIN SUCCESS!';
    $_SESSION['logged_in']=true;
    header('location:index.php');
} else {
    $msgtxt= 'Invalid password.';
}
}else{
    $msgtxt= 'USER NOT FOUND.';
}
}
}
?>
