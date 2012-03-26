
    <div id="content" class="col-full">
		<div id="main" class="col-left">
            
		<?php foreach($query as $row) {;?>	                                                                                                
                <div class="post">
                    <h2 class="title"><a href="../statics/<?php echo str_replace(" ","-",$row->title); ?>.html"><?php echo $row->title; ?></a></h2>
                    
                    <p class="date">
                    	<span class="day"><?php echo date('d', $row->date); ?></span>
                    	<span class="month"><?php echo date('F', $row->date); ?></span>
                    </p>
                    
                                        
                    <div class="entry">
                		<p><?php echo word_limiter($row->posting , 50); echo anchor('news/'.$row->id,'detail'); ?></p>
		    </div>
		    
                </div><!-- /.post -->
                <?php } ?>                                 
			  
        
                <div class="more_entries">
                    <div class="fl"><?php echo $this->pagination->create_links(); ?></div>
		    <div class="fr"></div>
                    <br class="fix">
                     
                </div>		
                
		</div><!-- /#main -->
