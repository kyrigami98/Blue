<?php
function connect()
{
$idc=mysqli_connect('localhost','root', '', 'chronos');
mysqli_select_db($idc, 'chronos');
return($idc) ;
}
?>