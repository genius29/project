<?php 
include 'db.php';

if(isset($_POST['submit'])){

$title = $db->escape_string($_POST['title']);
$author = $db->escape_string($_POST['author']);
$content = $db->escape_string($_POST['content']);

$sql = "INSERT into datab (title, author, content) values ('$title', '$author', '$content')";

$val = $db->query($sql);

if($val){

	header('location: indexes.php');
}else{

	echo "error";
}

}

?>