<div id="content" class="col-full">
		<div id="main" class="col-left">
                <?php foreach ($query as $row) { ?>                                                                                       
                <div class="post">
                    <h2 class="title"><?php echo "$row->name"; ?></h2>                  
                    <div class="entry">
                		<p><?php echo "$row->content"; ?></p>
		    </div>
		    
                </div><!-- /.post -->                              
		<?php } ?>	  
        
                <div class="more_entries" style="margin-bottom: 30px;">
                    <div class="fl"></div>
		    <p><table border="0" cellpadding="10">
			<tbody>
			<tr>
			<td><a href="<?php echo base_url();?>index.php/profile/profindex/21"><img src="<?php echo base_url();?>/assets/img/jay-tumb.png" width="105px" height="100px"></img></a></td><td>&nbsp;</td>
			<td><a href="<?php echo base_url();?>index.php/profile/profindex/20"><img src="<?php echo base_url();?>/assets/img/gilang-tumb.png" width="105px" height="100px"></img></a></td><td>&nbsp;</td>
			<td><a href="<?php echo base_url();?>index.php/profile/profindex/18"><img src="<?php echo base_url();?>/assets/img/hyp-tumb.png" width="105px" height="100px"></img></a></td><td>&nbsp;</td>
			<td><a href="<?php echo base_url();?>index.php/profile/profindex/17"><img src="<?php echo base_url();?>/assets/img/maria-tumb.png" width="105px" height="100px"></img></a></td><td>&nbsp;</td>
			<td><a href="<?php echo base_url();?>index.php/profile/profindex/19"><img src="<?php echo base_url();?>/assets/img/simbah-tumb.png" width="105px" height="100px"></img></a></td><td>&nbsp;</td>
			</tbody>
			</table></p>
		    <div class="fr"></div>
                    <br class="fix">
                     
                </div>		
                
		</div><!-- /#main -->