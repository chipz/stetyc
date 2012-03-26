<?php /*

	foreach ($comments as $row)
	{
		//print $row->id."\t";
		echo $row->user.":";
		print $row->comment."\t";
		if ($row->inreply <> 0)
		{
			echo "----balasan untuk -->".$row->inreply;
		}
		echo "<a href=".base_url()."index.php/pojoked/diskusi/reply/".$row->id."> balas</a>";
		echo "<br />";
	}

echo form_open('pojoked/diskusi/proses');	
if(isset($idtoreply)) {
	echo "<input type=\"hidden\" name=\"inreply\" value=\"".$idtoreply."\" />";
	}
	
echo form_label('What is your Name', 'username');
$data = array(
              'name'        => 'username',
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:50%',
            );

echo form_input($data)."<br />";
echo form_label('Comment', 'username');
$data = array(
              'name'        => 'comment',
              'maxlength'   => '500',
              'size'        => '50',
              'style'       => 'width:50%',
            );
echo form_input($data)."<br />";


echo form_submit('mysubmit', 'Submit Post!');

echo form_close(); */
?>

<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><link rel="apple-touch-icon" href="http://m.tweete.net/static/_favicon.png?v=1cde5"><title>Pojok Everyday</title><link rel="stylesheet" href="<?php echo base_url(); ?>css/base.css" type="text/css"></head>
<body><br><h2><a href="./Tweete - Timeline_files/Tweete - Timeline.htm">Pojok Everyday</a></h2><div id="content"><p class="menu"><a href="./Tweete - Timeline_files/Tweete - Timeline.htm">home</a> <a href="http://m.tweete.net/replies">replies</a> <a href="http://m.tweete.net/direct_messages">directs</a> <a href="http://m.tweete.net/retweets">retweets</a> <a href="http://m.tweete.net/favorites">favs</a> <a href="http://m.tweete.net/account">settings</a> <a href="http://m.tweete.net/help/donate">donate</a> <a href="http://m.tweete.net/help">help</a> </p><form action="<?php echo base_url(); ?>index.php/pojoked/diskusi/proses" method="post">
<?php if(isset($idtoreply)) {
	echo "<input type=\"hidden\" name=\"inreply\" value=\"".$idtoreply."\" />";
	} ?><a name="#t_form"></a>Komentar<br>
	<input type="text" name="username" maxlength="100" size="50" value="">
<textarea id="s" name="comment" class="ta"></textarea><br><input type="text" id="rpy" name="rpy" value="" class="hide"><input type="submit" id="submit" name="submit" value="Tweet" class="tbtn"><div id="chars" class="tbtn">&nbsp;</div><div id="loc_cont" class="tbtn"><input type="checkbox" name="loc" id="loc"><span id="loc_msg"></span></div></form>
&nbsp;
<ul class="tl">
<?php 	$i = 0;
			while($i < $comments['totalquery'])
			{  ?>
	<li class="">
		<h3><?php echo $comments[$i]['id']; ?>
			<a href="#" class="b"><?php echo $comments[$i]['user']; ?></a>
		</h3>
		<span class="o">(url)<br><a class="j" href="<?php echo base_url(); ?>index.php/pojoked/diskusi/reply/<?php echo $comments[$i]['id']; ?>">reply</a>
		</span>
		<p><?php echo $comments[$i]['comment']; ?><small> <a href="http://m.tweete.net/mukiyo/status/47707210201042944"> 26 secs ago</a>  <?php if ($comments[$i]['inreply'] <> 0) {
			?> balasan untuk <?php 
			$replyto = $comments[$i]['inreply']-1;
			echo $comments[$replyto]['user'];
			echo $comments[$i]['inreply'];
		}?> </small></p>
	</li>
	<?php $i++; } ?>
</ul>
<div id="opts" class=""></div></div><img src="./Tweete - Timeline_files/c0" alt="" width="1" height="1"><p class="bt">  <a href="http://m.tweete.net/fajrhf">fajrhf</a>  0  <a accesskey="0" href="./Tweete - Timeline_files/Tweete - Timeline.htm">home</a>  1  <a accesskey="1" href="http://m.tweete.net/replies">replies</a>  2  <a accesskey="2" href="http://m.tweete.net/direct_messages">directs</a>   <a href="http://m.tweete.net/retweets">retweets</a>  3  <a accesskey="3" href="http://m.tweete.net/favorites">favs</a>   <a href="http://m.tweete.net/following">following</a>   <a href="http://m.tweete.net/followers">followers</a>   <a href="http://m.tweete.net/lists">lists</a>   <a href="http://m.tweete.net/account/upload">upload</a>   <a href="http://m.tweete.net/public">public</a>   <a href="http://m.tweete.net/trends">trends</a>   <a href="http://m.tweete.net/search">search</a>   <a href="http://m.tweete.net/account">settings</a>   <a href="http://m.tweete.net/help/donate">donate</a>  9  <a accesskey="9" href="http://m.tweete.net/help">help</a>   <a href="http://m.tweete.net/logout">logout</a> </p><table><tbody><tr><td></td><td><a accesskey="7" class="i" href="http://m.tweete.net/home?page=2">Page 2</a></td></tr></tbody></table><div class="l"><small><a href="http://m.tweete.net/logout">logout fajrhf</a></small></div><p></p></body></html>