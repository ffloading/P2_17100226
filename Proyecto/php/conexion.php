<?php
$conn=mysql_connect("DESKTOP-9EFFBS7","DESKTOP-9EFFBS7/Usuario","") or die ("Error en conexión");
$BD=mysql_select_db("FGBDD")or die("Error al conectar la BD");
return($conn);
return($BD);
?>