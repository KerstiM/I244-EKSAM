<?php

ini_set("display_errors", 1);
require_once('functions.php');
start_session();
connect_database();

$page="main";

if (isset($_GET['page']) && $_GET['page']!=""){
	$page=htmlspecialchars($_GET['page']);
}

include_once('likeCounter.html');

switch($page){
	default:
		include_once("likeCounter.html");
	break;
}


?>


