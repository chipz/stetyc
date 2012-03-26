<h1>Contoh Posting</h1>
 
<?php
$i=0;
foreach ($query as $row){
$i++;
echo    "<h2>$row->title</h2>";
echo    "<b>author: $row->author</b><br/>";
echo    "$row->posting";
}
?>
