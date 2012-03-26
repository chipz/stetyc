<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Pojok AlwaysEveryday</title>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>assets/css/mystyle.css" />
<!--<link href="<?php //echo base_url(); ?>assets/css/mystyle.css" rel="stylesheet" type="text/css">
<link href="<?php //echo base_url(); ?>assets/css/pojoked.css" rel="stylesheet" type="text/css"> -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/screen.css" type="text/css" media="screen, projection">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/print.css" type="text/css" media="print">
<!--[if IE]><link rel="stylesheet" href="css/ie.css" type="text/css" media="screen, projection"><![endif]-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.oembed.js"></script>
 
 <script type="text/javascript">


$(function() {

$(".comment_button").click(function() {

var element = $(this);
   
    var boxval = $("#content").val();
	var userval = $("#username").val();
	
	
    var dataString = 'content='+ boxval+'&username='+ userval;
	
	if(boxval=='')
	{
	alert("Please Enter Some Text");
	
	}
	else
	{
	$("#flash").show();
	$("#flash").fadeIn(400).html('<img src="ajax.gif" align="absmiddle">&nbsp;<span class="loading">Loading Update...</span>');
$.ajax({
		type: "POST",
  url: "<?php echo base_url(); ?>assets/facebook/update_ajax.php",
   data: dataString,
  cache: false,
  success: function(html){
 
  $("ol#update").prepend(html);
  $("ol#update li:first").slideDown("slow");
  
   document.getElementById('content').value='';
   $('#content').value='';
   $('#content').focus();
  $("#flash").hide();
  
    
	$("#expand_url").oembed(boxval);
	
  }
 });
}
return false;
	});


// delete undate
$('.delete_update').live("click",function() 
{
var ID = $(this).attr("id");
var dataString = 'msg_id='+ ID;

if(confirm("Sure you want to delete this update? There is NO undo!"))
{
$.ajax({
		type: "POST",
  url: "<?php echo base_url(); ?>assets/facebook/delete_update.php",
   data: dataString,
  cache: false,
  success: function(html){
 
 $(".bar"+ID).slideUp();
	
  }
 });

}
return false;
});


//comment slide
$('.comment').live("click",function() 
{

var ID = $(this).attr("id");
$(".fullbox"+ID).show();
$("#c"+ID).slideToggle(300);

return false;
});


//commment Submint

$('.comment_submit').live("click",function() 
{

var ID = $(this).attr("id");
var usercomment = $("#usercommentinput"+ID).val();
var comment_content = $("#textarea"+ID).val();
	
    var dataString = 'comment_content='+ comment_content +'&usercomment='+ usercomment  + '&msg_id=' + ID;
	
	if(comment_content=='')
	{
	alert("Please Enter Comment Text");
	
	}
	else
	{
	
   
   	$.ajax({
		type: "POST",
  url: "<?php echo base_url(); ?>assets/facebook/comment_ajax.php",
   data: dataString,
  cache: false,
  success: function(html){
  
 
  $("#commentload"+ID).append(html);
    document.getElementById("textarea"+ID).value='';
   
   $("#textarea"+ID).focus();
  
  }
 });
	
	
	}

return false;
});

//comment delete
$('.cdelete_update').live("click",function() 
{
var ID = $(this).attr("id");

var dataString = 'com_id='+ ID;

if(confirm("Sure you want to delete this update? There is NO undo!"))
{
$.ajax({
		type: "POST",
  url: "<?php echo base_url(); ?>assets/facebook/delete_comment.php",
   data: dataString,
  cache: false,
  success: function(html){
 
 $("#comment"+ID).slideUp();
	
  }
 });
}
return false;
});




return false;

});


</script>

</head>

<body>
<div class="container">
		<div id="header" class="column span-24 transbox rounded last prepend-top">
			<div id="navigation">
				<a class="navlink" href="<?php echo base_url();?>">Home</a> | <a class="navlink" href="<?php echo base_url();?>index.php/profile">profile</a> | <a class="navlink" href="<?php echo base_url();?>index.php/news">news</a> | <a class="navlink" href="<?php echo base_url();?>index.php/page/pageindex/1">schedule</a> | <a class="navlink" href="<?php echo base_url();?>index.php/page/pageindex/2">contact</a> | <a class="navlink" href="#">pojok everyday</a>
			</div>
		</div>



<div align="left">
<form  method="post" name="form" action="">
<div align="left">
<h3>What are you wanna say?</h3></div>

username:<br /><input type="text" value="" id="username" name="username"><br />
comment:<br />
<textarea cols="30" rows="2" style="height:126px;width:530px;font-size:14px; font-weight:bold" name="content" id="content" maxlength="145" ></textarea><br />
<input type="submit"  value="Update"  id="v" name="submit" class="comment_button"/>



</form>

</div>
<div style="height:7px"></div>
<div id="flash" align="left"  ></div>


<ol class="timeline" id="update">
	<?php $i = 0;
		while($i < $messages['totalquery']) { ?>
	<li class="bar<?php echo $messages[$i]['msg_id']; ?>">
		<div align="left" class="post_box leaf">
			<span class="username"><?php echo $messages[$i]['username'];?></span><hr>
			<span class="message_content"><?php echo $messages[$i]['messages']; ?></span>
			<span class="delete_button"><a class="delete_update" id="<?php echo $messages[$i]['msg_id']; ?>" href="#">X</a></span>
			<span class="feed_link"><a id="<?php echo $messages[$i]['msg_id']; ?>" class="comment" href="#"><img src="<?php echo base_url();?>assets/img/comment.png" id="com" alt="comment" title="Comment!"></a></span>
		</div>
		<div id="expand_box">
			<div id="expand_url"></div>
		</div>
		<div class="fullbox<?php echo $messages[$i]['msg_id']; ?>" id="fullbox" style="display: block;">
			<div id="commentload<?php echo $messages[$i]['msg_id']; ?>">
					<?php $j = 0;
						while($j < $comments['totalquery']) {
						if($comments[$j]['msg_id_fk']==$messages[$i]['msg_id']){
							if($comments[$j]['user']==""){$comments[$j]['user']="Guest";}
						?>
					<div id="comment<?php echo $comments[$j]['com_id']; ?>" class="comment_load rounded" style="padding: 0.5em 3em 0.5em 3em">
					<?php echo $comments[$j]['user']."<hr>"; echo $comments[$j]['comment']?> <span class="cdelete_button"><a class="cdelete_update" id="<?php echo $comments[$j]['com_id'];?>" href="#">X</a></span>
				 </div>
				 <?php } 
				 $j++; } ?>
			</div>
		<div id="c<?php echo $messages[$i]['msg_id']; ?>" class="comment_box cowek" style="display: none; padding: 0.5em 2.5em">
			<form name="<?php echo $messages[$i]['msg_id']; ?>" action="" method="post">
				<img src="<?php echo base_url();?>assets/img/user.png" id="userlogo" alt="comment-username"><input type="text" value="" id="usercommentinput<?php echo $messages[$i]['msg_id']; ?>" name="usercommentinput"><br />
				<textarea style="width: 541px; height: 36px;" id="textarea<?php echo $messages[$i]['msg_id']; ?>" name="comment_value" class="text_area"></textarea><br>
				<input type="submit" id="<?php echo $messages[$i]['msg_id']; ?>" class="comment_submit" value=" Comment ">
			</form>
		</div>
		</div>
	</li>
	<?php
	$i++;
	} ?>



</ol>
</div>
</body>
</html>
