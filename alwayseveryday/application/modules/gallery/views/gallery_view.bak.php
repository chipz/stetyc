<html>
	<head>
		<title>AlwaysEveryday</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/mystyle.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/screen.css" type="text/css" media="screen, projection">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/print.css" type="text/css" media="print">
		<!--[if IE]><link rel="stylesheet" href="css/ie.css" type="text/css" media="screen, projection"><![endif]-->
<!-- slide shoe -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/slideshow.css">
	<style>
		.slideshow { float: left; margin: 50px; }
	</style>
	<script src="<?php echo base_url(); ?>assets/js/mootools-1.3.2-core.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/mootools-1.3.2.1-more.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/slideshow.js"></script>
	<script type="text/javascript">		
	//<![CDATA[
	  window.addEvent('domready', function(){
	    var data = { 
			'1.jpg': { caption: '1' }, 
			'2.jpg': { caption: '2' }, 
			'3.jpg': { caption: '3' }, 
			'4.jpg': { caption: '4' }
		};
		new Slideshow('overlap', data, { captions: { delay: 1000 }, delay: 3000, height: 300, hu: '<?php echo base_url() ?>assets/images/', width: 400 });

	  });
	//]]>
	</script>
	
	</head>
	<body>
	<div class="container">
		<div id="page-background"><img src="<?php echo base_url(); ?>assets/img/bg2.jpg" id="bg" alt="Wayang Bocor" ></div>
		<div id="header" class="column span-24 transbox rounded last prepend-top">
			<div id="navigation">
				<a class="navlink" href="<?php echo base_url();?>">Home</a> | <a class="navlink" href="<?php echo base_url();?>index.php/profile">profile</a> | <a class="navlink" href="<?php echo base_url();?>index.php/news">news</a> | <a class="navlink" href="<?php echo base_url();?>index.php/page/pageindex/1">schedule</a> | <a class="navlink" href="<?php echo base_url();?>index.php/page/pageindex/2">contact</a> | <a class="navlink" href="#">pojok everyday</a>
			</div>
		</div>
		<hr>
	<div id="overlap" class="slideshow">
		<img src="<?php echo base_url() ?>assets/images/1.jpg" alt="1">
	</div>
	</div>
	</body>
</html>