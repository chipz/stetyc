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
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Pojok Everyday</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/mystyle.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/screen.css" type="text/css" media="screen, projection">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/print.css" type="text/css" media="print">
	<!--[if IE]><link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ie.css" type="text/css" media="screen, projection"><![endif]-->
</head>
<body><br><h2><a href="#">Pojok Everyday</a></h2><div id="content"><p class="menu"><a href="<?php echo base_url(); ?>">home</a> <a href="http://m.tweete.net/replies">profile</a> <a href="http://m.tweete.net/direct_messages">news</a> <a href="http://m.tweete.net/retweets">songs</a> <a href="http://m.tweete.net/favorites">download</a> <a href="http://m.tweete.net/account">about</a> </p><form action="<?php echo base_url(); ?>index.php/pojoked/diskusi/proses" method="post">
<?php if(isset($idtoreply)) {
	echo "<input type=\"hidden\" name=\"inreply\" value=\"".$idtoreply."\" />";
	} ?><a name="#t_form"></a>Komentar<br>
	Username:<input type="text" name="username" maxlength="100" size="50" value="">
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
<div id="opts" class=""></div></div><img src="./Tweete - Timeline_files/c0" alt="" width="1" height="1"><table><tbody><tr><td></td><td><a accesskey="7" class="i" href="http://m.tweete.net/home?page=2">Page 2</a></td></tr></tbody></table><div class="l"><small><a href="http://m.tweete.net/logout">logout fajrhf</a></small></div><p></p></body></html>