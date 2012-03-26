<div id="content" class="col-full">
		<div id="main" class="col-left">
<div align="left">
<form  method="post" name="form" action="">
<div align="left">
<h3>Wanna say something?</h3></div>

username:<br /><input type="text" value="" id="username" name="username"><br />
comment:<br />
<textarea cols="30" rows="2" style="height:66px; width:613px; font-size:14px; font-weight:bold; min-height:66px;" name="contentcomment" id="contentcomment" maxlength="145" ></textarea><br />
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
			<?php if ($this->ion_auth->is_admin()) { ?> <span class="delete_button"><a class="delete_update" id="<?php echo $messages[$i]['msg_id']; ?>" href="#">X</a></span> <?php } ?>
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
					<?php echo $comments[$j]['user']."<hr>"; echo $comments[$j]['comment']?><?php if ($this->ion_auth->is_admin()) { ?> <span class="cdelete_button"><a class="cdelete_update" id="<?php echo $comments[$j]['com_id'];?>" href="#">X</a></span><?php } ?>
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
</div><!-- /#main -->