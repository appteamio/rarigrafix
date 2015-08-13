<?php
require_once("../includesmain/functions.php");
require_once("../includesmain/session.php");
require_once("../includesmain/database.php");
require_once("../includesmain/class_session.php");

if(isset($_GET['lgt'])){ $session->logout(); }
if(!$session->is_logged_in()){redirect_to("login.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<h2>Add a New Session</h2>
</body>
</html>