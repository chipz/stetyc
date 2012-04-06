<?=form_open_multipart('admin/item/'.$table.'/'.$parent_id)?>
<div class='contact_info'>
	<h4>Upload File</h4>
	<div style='padding:0 0 5px 0;'>
		<?=form_upload('userfile')?>
	</div>
	<div>
	<span>
		<input type='text' name="name"	size='20' value=""  />
		<label for="name">file name (optional)</label>
	</span>
		<input type='submit' name='new_upload' value='upload' />
		<span onclick='portal.upload_status()'>upload</span>
	 	<p>	  
			<img id="upload_thinking" src="<?=base_url()?>/public/images/loader.gif" style='display:none;'/>
			<span class="progressBar percentImage1" id="progress" style='display:none'>0%</span>
		</p>
	</div>
</div>
<?=form_close()?>