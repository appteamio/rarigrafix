<?php
require_once("includesmain/session.php");
require_once("includesmain/functions.php");
require_once("includesmain/database.php");
require_once("includesmain/class.php");
require_once("includesmain/client.php");

$pdclt = Client::find_temp_by_id($_GET['pdclt']);
Client::addclienttodatabase( $pdclt->class_id,$pdclt->p_firstname,$pdclt->p_lastname,$pdclt->k_firstname,$pdclt->k_lastname,$pdclt->email,$pdclt->phone);

?>
saved