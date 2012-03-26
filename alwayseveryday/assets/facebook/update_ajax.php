
 <?php
include("db.php");
include("tolink.php");


if(isSet($_POST['content']))

{
	$id=time();//Demo Use
	$msg=$_POST['content'];
	$username= $_POST['username'];
	$sql=mysql_query("insert into messages(message, username)values('$msg','$username')");
	$result=mysql_query("select * from messages order by msg_id desc");
	$row=mysql_fetch_array($result);
	$id=$row['msg_id'];
	$msg=$row['message'];
	$username=$row['username'];
	$msg=toLink($msg);
}


?>

 


<li class="bar<?php echo $id; ?>">
<div align="left" class="post_box leaf">
	<span class="username"><?php echo $username; ?></span><hr>
	<span class="message_content"><?php echo $msg; ?> </span>
	<span class="delete_button"><a class="delete_update" id="<?php echo $id; ?>"  href="#">X</a></span>
	<span class='feed_link'><a id="<?php echo $id; ?>" class="comment" href="#"><img src="../../assets/img/comment.png" id="com" alt="comment" title="Comment!"></a></span>
</div>

<div id='expand_box'>
<div id='expand_url'></div>
</div>
<div id="fullbox" class="fullbox<?php echo $id; ?>">
<div id="commentload<?php echo $id; ?>" >

</div>
<div class="comment_box cowek" id="c<?php echo $id; ?>" style="display: none; padding: 0.5em 2.5em">
<form method="post" action="" name="<?php echo $id; ?>">
<img src="assets/img/user.png" id="userlogo" alt="username"><input type="text" value="" id="usercommentinput<?php echo $id; ?>" name="usercommentinput"><br />
<textarea class="text_area" style="width: 541px; height: 36px;" name="comment_value" id="textarea<?php echo $id; ?>">
</textarea><br />
<input type="submit" value=" Comment " class="comment_submit" id="<?php echo $id; ?>"/>
</form>
</div>
</div>

</li>