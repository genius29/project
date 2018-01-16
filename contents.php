<?php  
include 'header.php';

$id = (int)$_GET['id'];

$sql = "SELECT * from datab where id='$id'";

$rows = $db->query($sql);

$row = $rows->fetch_assoc();

?>

<center><h1 style="font-size: 4em;">Blog Contents</h1></center>
<div class="row" style="margin-top: 40px">
	<div class="col-md-8 col-md-offset-2" >
		<table class="table">

	     	<hr><br>
	     	<p><a href="indexes.php" class="btn btn-primary"><span class="glyphicon glyphicon-triangle-left"></span> Back to List</a></p>
	     	<br>
			<div>
				<p class="text-center" style="font-size: 30px;"><?php echo $row['title']; ?>
				</p>
				<p class="text-center">By: <?php echo $row['author']; ?></p><br>
				<p class="text-justify"  name="content"><?php echo $row['content']; ?></p>
			</div>
			<br>
	</div>
</div>

<?php  
include 'footer.php';
?>