<html>
<head>
<title>Input Post</title>
</head>
<body>
<h2>Input Post</h2>
<div id="form_input">
<table>
<?php echo form_open('post/submit'); ?>
<tr>
<td> <?php echo form_label('Author : '); ?></td>
<td> <?php echo form_input('author','','id="author"'); ?></td>
</tr>
<tr>
<td> <?php echo form_label('Title : ');?> </td>
<td> <?php echo form_input('title','','id="title"'); ?></td>
</tr>
<tr>
<td> <?php echo form_label('Posting : ');?> </td>
<td> <?php echo form_textarea('posting','','id="posting"'); ?></td>
</tr>
<tr>
<td> <?php echo form_submit('submit','Submit','id="submit"'); echo form_close(); ?> </td>
</tr>
</table>
</div>

</body>
</html> 
