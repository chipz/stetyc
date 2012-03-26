
 <?php
 include("db.php");
if(isSet($_POST['comment_content']))

{
$id=time();// Demo Use
$comment=$_POST['comment_content'];
$msg_id=$_POST['msg_id'];
$user=$_POST['usercomment'];

$sql=mysql_query("insert into comments(comment,msg_id_fk,user)values('$comment','$msg_id','$user')");
$result=mysql_query("select * from comments order by com_id desc");
$row=mysql_fetch_array($result);
$id=$row['com_id'];
$comment=$row['comment'];
$user=$row['user'];

}


?>

 <div class="comment_load rounded" id="comment<?php echo $id; ?>" style="padding: 0.5em 3em 0.5em 3em">
 <?php echo $user."<hr>"; ?>
 <?php echo $comment;  ?>
 <span class="cdelete_button"><a href="#" id="<?php echo $id; ?>" class="cdelete_update">X</a></span>
 </div>
