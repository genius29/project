<?php include 'header.php'; 

$id = (int)$_GET['id'];

$sql = "SELECT * from datab where id='$id'";

$rows = $db->query($sql);

$row = $rows->fetch_assoc();
if(isset($_POST['submit'])){

$title = $db->escape_string($_POST['title']);
$author = $db->escape_string($_POST['author']);
$content = $db->escape_string($_POST['content']);

$sql2 ="UPDATE datab set title='$title', author='$author', content='$content' 
					 where id ='$id'";

$db->query($sql2);

header('location: indexes.php');

}

?>

<center><h1>Update Todo list</h1></center>
<div class="row" style="margin-top: 70px;">
	<div class="col-md-10 col-md-offset-1" >
    	<table class="table">

	     	<hr><br>
			<form method="post" >
				<div class="form-group">
					<label>Title:</label>
					<input type="text" required name="title" value="<?php echo $row['title'];?>" class="form-control">
			    </div>
			    <div class="form-group">
					<label for="title">Author:</label>
					<input type="text" class="form-control" name="author" value="<?php echo $row['author']; ?>" required>
				</div>
				<div class="form-group">
					<label>Content:</label>
					<textarea id="editor1" class="form-control"  name="content"><?php echo $row['content']; ?></textarea>
				</div>
			 	<input type="submit" name="submit" value="Update" class="btn btn-success">&nbsp;
			 	<a href="indexes.php" class="btn btn-warning">Cancel</a>
			</form>
		</table>
	</div>
</div>

<?php  
include 'footer.php';
?>