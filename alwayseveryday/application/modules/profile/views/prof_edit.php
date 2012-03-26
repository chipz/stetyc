<h1>List Profile</h1>

<br/>
<a href="<?php echo base_url(); ?>index.php/language/select/en">english</a> | <a href="<?php echo base_url(); ?>index.php/language/select/id" >indonesia</a>
<br/>
<table border="1">
<tr>
<tr>
<th>No</th>
<th>Author</th>
<th>Name</th>
<th>Edit</th>
<th>Delete</th>
</tr>
</tr>
<?php
$i=0;
foreach ($query as $row){
$i++;
echo "<tr>";
echo    "<td>$i</td>";
echo    "<td>$row->author</td>";
echo    "<td>$row->name</td>";
echo    "<td>".anchor("profile/edit/$row->id",'Edit')."</td>";
echo    "<td><a href=".base_url()."index.php/profile/delete/$row->id>Delete</a></td>";
echo  "</tr>";
}
?> 
</table>
<br/>
<?php
echo "<b>".anchor("profile/profinsert",'Add new profile')."</b>";
?>
