<html>
<head>
<title>Contoh Edit</title>
</head>

<body>
<h2 >Contoh edit</h2>
<div id="form_input">
<table>
<?php echo form_open('post/submit'); ?>
<?php echo form_hidden('id',$fid); ?>
<tr>
<td> <?php echo form_label('Author : '); ?></td>
<td> <?php echo form_input('author',$fauthor,'id="author"'); ?></td>
</tr>
<tr>
<td> <?php echo form_label('Title : ');?> </td>
<td> <?php echo form_input('title',$ftitle,'id="title"'); ?></td>
</tr>
<tr>
<td> <?php echo form_label('Posting : ');?> </td>
<td> <?php echo form_textarea('posting',$fposting,'id="posting"'); ?></td>
</tr>
<tr>
<td> <?php echo form_submit('submit','Submit','id="submit"'); echo form_close(); ?> </td>
</tr>
</table>
</div>

</body>
</html>