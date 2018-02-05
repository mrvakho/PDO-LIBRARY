
	if($_GET['do']=='deleteblog'){
  
	  $blog_id=$_GET['id'];
      
		$user_id=$_SESSION['member_id'];
    
		$dalate_blog_query=$db->prepare("DELETE FROM blog where blog_id =:blog_id and blog_user=:blog_user");
    
		$dalate_blog_query->bindParam("blog_id", $blog_id, PDO::PARAM_INT);
    
		$dalate_blog_query->bindParam("blog_user", $user_id, PDO::PARAM_INT);
    
		$dalate_blog_query->execute();
    
		header('location:profile');
	}
	
