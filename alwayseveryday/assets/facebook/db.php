<?php
$mysql_hostname = "localhost";
$mysql_user = "alwaysev_eryroot";
$mysql_password = "j4zzpanta1";
$mysql_database = "alwaysev_eryday";
$prefix = "";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Opps some thing went wrong");
mysql_select_db($mysql_database, $bd) or die("Opps some thing went wrong");

?>