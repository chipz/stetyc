<div id="content" class="col-full">
		<div id="main" class="col-left">
                                                                                                       
                <div class="post">
		                 
                    <div class="entry">
        <?php if ( ! is_null($query)): ?>
	<?php if (count($query)): ?>
	    <ul>
	    <?php foreach ($query as $item): ?>
		    <li><a href="<?php echo base_url()."index.php/news/newsindex/".$item->id ?>"><?php echo $item->title?></a><br/><?php echo word_limiter($item->posting, 35); ?></a></li>
		    <?php endforeach ?>
		    </ul>
		    <?php else: ?>
		    <p>Kata yang Anda cari tidak ada. :)</p>
		    <?php endif ?>
		    <?php endif ?> 
		    </div>
		    
                </div><!-- /.post -->                              
			  
        
                <div class="more_entries">
                    <div class="fl"></div>
		    <div class="fr"></div>
                    <br class="fix">
                     
                </div>		
                
		</div><!-- /#main -->