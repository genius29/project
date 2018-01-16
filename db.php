<?php 

$db = new Mysqli;

$db->connect('localhost','root','','myblog');

if(!$db){

	echo "code not successful";
}



 ?>