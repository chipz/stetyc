<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head profile="http://gmpg.org/xfn/11">

<title><?php echo $template['title']; ?></title>
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo base_url(); ?>assets/img/favicon.ico" type="image/x-icon">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="robots" content="index, nofollow">

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/baru/style.css" media="screen">
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://192.168.0.238/jazz/?feed=rss2">
<link rel="pingback" href="http://192.168.0.238/jazz/xmlrpc.php">
   
	<!--[if IE 6]>
		<script type="text/javascript" src="http://192.168.0.238/jazz/wp-content/themes/bueno/includes/js/pngfix.js"></script>
		<script type="text/javascript" src="http://192.168.0.238/jazz/wp-content/themes/bueno/includes/js/menu.js"></script>
		<link rel="stylesheet" type="text/css" media="all" href="http://192.168.0.238/jazz/wp-content/themes/bueno/css/ie6.css" />
    <![endif]-->	
	
	<!--[if IE 7]>
		<link rel="stylesheet" type="text/css" media="all" href="http://192.168.0.238/jazz/wp-content/themes/bueno/css/ie7.css" />
	<![endif]-->

<link rel="index" title="Jazz MusiC" href="http://192.168.0.238/jazz">
<meta name="generator" content="Codeigniter">

<!-- Alt Stylesheet -->
<link href="<?php echo base_url(); ?>assets/css/baru/default.css" rel="stylesheet" type="text/css">

<!-- Woo Shortcodes CSS -->
<link href="<?php echo base_url(); ?>assets/css/baru/shortcodes.css" rel="stylesheet" type="text/css">

<!-- Custom Stylesheet -->
<link href="<?php echo base_url(); ?>assets/css/baru/custom.css" rel="stylesheet" type="text/css">

<link href="<?php echo base_url(); ?>assets/css/baru/css.css" rel="stylesheet" type="text/css">
<?php if(isset($template['partials']['metadata'])) { echo $template['partials']['metadata']; } ?>
</head>

<body class="home blog logged-in gecko">
<div id="container">

	<div id="navigation">
	
		<div class="col-full">
		<ul id="catnav" class="nav fl">
	        <li class="cat-item cat-item-1"><a href="" title="View all posts filed under Uncategorized">&nbsp;</a>
		</li>
	        </ul><!-- /#nav -->
	        	        <div id="topsearch" class="fr">
	   			<form method="post" id="searchform_top" action="<?php echo base_url();?>search/find"
        			<input class="field" name="search" value=""  type="text">
       				<input class="submit" name="submit" value="Search" type="submit">
 		  		</form>

 		  	</div><!-- /#topsearch -->
        
        </div><!-- /.col-full -->
        
	</div><!-- /#navigation -->
        
	<div id="header" class="col-full">
   
		<div id="logo" class="fl">
	       
	       	<a href="<?php echo base_url() ;?>" title="Everyday band official site"><img class="title" src="<?php echo base_url(); ?>assets/img/baru/logo.png" alt="AlwaysEveryday"></a>
	      	
	      		      		<h1 class="site-title"><a href="<?php echo base_url() ;?>statics/alwayseveryday.html">AlwaysEveryday</a></h1>
	      		      	
	      		<span class="site-description">Everyday band official site</span>
	      	
		</div><!-- /#logo -->
	       
	   	<div id="pagenav" class="nav fr">
		<ul>
			<li class="b page_item"><a href="<?php echo base_url() ;?>statics/alwayseveryday.html">Home</a></li>
		    <li class="page_item page-item-2"><a href="<?php echo base_url() ;?>statics/profile.html" title="Profile">Profile</a></li>
			<li class="page_item page-item-4"><a href="<?php echo base_url() ;?>statics/news.html" title="News">News</a></li>
			<li class="page_item page-item-16"><a href="<?php echo base_url() ;?>statics/gallery.html" title="Gallery">Gallery</a></li>
			<li class="page_item page-item-19"><a href="<?php echo base_url() ;?>statics/kontak.html" title="Schedule">Schedule</a></li>
			<li class="page_item page-item-19"><a href="<?php echo base_url() ;?>statics/jadwal.html" title="Contact">Contact</a></li>
			<li class="page_item page-item-19"><a href="<?php echo base_url() ;?>everydaycorner" title="Corner">Corner</a></li>
	    </ul>
		</div><!-- /#pagenav -->
       
	</div><!-- /#header -->
<?php echo $template['body'];?>
    </div><!-- /#content -->
	<div id="footer">
	
		<div class="col-full">
	
			<div id="copyright" class="col-left">
				<p>&copy;2011 Alwayseveryday. All Rights Reserved.</p>
			</div>
			
			<div id="credit" class="col-right">
				<p>&nbsp;</p>
			</div>
			
		</div><!-- /.col-full -->
		
	</div><!-- /#footer -->
	
</div><!-- /#container -->


</body></html>
