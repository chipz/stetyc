<h1>List post</h1>

<br/>
<table border="1">
<tr>
<tr>
<th>No</th>
<th>Author</th>
<th>Title</th>
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
echo    "<td>$row->title</td>";
echo    "<td>".anchor("post/edit/$row->id",'Edit')."</td>";
echo    "<td><a href=".base_url()."index.php/post/delete/$row->id>Delete</a></td>";
echo  "</tr>";
}
?> 
</table>
<br/>
<?php
echo "<b>".anchor("post/postinsert",'Add new post')."</b>";
?>
