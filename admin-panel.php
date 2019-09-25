<?php
include('func.php');
if(!isset($_SESSION['username']))
{
	echo 'Session Expired';
}
else
	display_admin_panel();
	
?>