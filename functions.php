<?php
ini_set("display_errors", 1);
//ühendus andmebaasiga
function connect_database(){
  global $connection;
  $host="localhost";
  $user="test";
  $pass="t3st3r123";
  $db="test";
  $connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa mootoriga ühendust");
  mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));    
}

//alusta sessioon
function start_session(){
	session_set_cookie_params(30*60);
	session_start();
}
//lõpeta sessioon
function end_session(){
	$_SESSION = array();
	if (isset($_COOKIE[session_name()])) {
 	 setcookie(session_name(), '', time()-42000, '/');
	}
	session_destroy();
}
//loe klikke, salvesta andmebaasi
function incrementClickCount(){
	global $connection;
    $count = getClickCount() + 1;
	$sql = "INSERT INTO 0KM_clicks (likedeArv) VALUES ($count)";
    file_put_contents("count.txt", $count);
}

	if( isset($_POST['clicks']) ) { 
    incrementClickCount();
}
// salvesta tekstifaili
	function getClickCount(){
    return (int)file_get_contents("count.txt");
}
?>