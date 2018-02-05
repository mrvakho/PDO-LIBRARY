if(isset($_POST['update_blog'])){
	
	$blog_title=$_POST['blog_title'];
	$blog_short=$_POST['blog_short'];
	$blog_full=$_POST['blog_full'];
	$blog_id=$_POST['blog_id'];
	$blog_user=$_SESSION['member_id'];
	$blog_date=date('Y-m-d H:i:s');
  
      $statement = $db->prepare('UPDATE `blog` SET 
      `blog_title`=:blog_title,
      `blog_short`=:blog_short,
      `blog_full`=:blog_full,
      `blog_date`=:blog_date
      where `blog_user`=:blog_user 
      and 
      `blog_id`=:blog_id');

          $statement->execute(array(
          "blog_title" => $blog_title,
          "blog_short" => $blog_short,
          "blog_full" => $blog_full,
          "blog_date" => $blog_date,
          "blog_user" => $blog_user,
          "blog_id" => $blog_id
           ));
	
          	header('location:profile');
	
}
