<?php 
include 'db.php';

$id = (int)$_GET['id'];

$sql = "DELETE from datab where id = '$id'";

$val = $db->query($sql);

if($val){

header('location: indexes.php');

};

?>