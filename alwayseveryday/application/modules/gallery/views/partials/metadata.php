	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/slideshow.css">
	<style>
		.slideshow { float: left; margin: 15px; }
		.more_entries{ margin-top: 0px; padding: 10px 55px 50px 55px;}
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
			'4.jpg': { caption: '4' },
			'5.jpg': { caption: '5' },
			'6.jpg': { caption: '6' }
		};
		new Slideshow('overlap', data, { captions: { delay: 1000 }, delay: 3000, height: 300, hu: '<?php echo base_url() ?>assets/images/', width: 585 });

	  });
	//]]>
	</script>