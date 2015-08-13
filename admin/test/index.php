<?php

session_start();
if($_SESSION['user_id'])
{
	echo $_SESSION['user_id'].'asd';
}
$_SESSION['user_id'] = hello;

?>