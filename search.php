<?php include 'header.php'; 

if(isset($_GET['search'])){

	$name = $db->escape_string($_GET['search']);

	$sql = "SELECT * from datab 
					where CONCAT(id, title, author, content) LIKE '%{$name}%'"; 
					/**USE CONCAT to shorten the code**
					**Instead 0f using :
										title like '%$name%' 
										OR author like '%$name%' 
										OR content like '%$name%'"; */
		
	$rows = $db->query($sql);

}

?>

<center><h1 style="font-size: 4em;"><a href="indexes.php">Todo list</a></h1></center>

<div class="row" style="margin-top: 40px;">
	<div class="col-md-12" >
		<div class="row">
			<div class="col-md-6">
				<button type="button" data-target="#myModal" data-toggle="modal" class="btn btn-success ">Add New ( <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> )</button>
			</div>
			<div class="col-md-4 col-md-offset-2">
				<form action="search.php" method="" class="text-right" autocomplete="off">
					<input class="form-control" type="text" name="search" placeholder="Search here...">
				</form>
			</div>
		</div>
		<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Add Blog</h4>
					</div>
					<div class="modal-body">
						<form method="post" action="add.php">
							<div class="form-group">
								<label>Title: </label>
								<input type="text" required name="title" class="form-control">
							</div>
							<div class="form-group">
								<label for="author">Author:</label>
								<input type="text" class="form-control" name="author" required>
							</div>
							<div class="form-group">
								<label>Content:</label>
								<textarea id="editor1"
								class="form-control"  name="content" placeholder="Write me some words..."></textarea>
							</div>
							<input type="submit" name="submit" value="Submit" class="btn btn-success">
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

		<?php if(mysqli_num_rows($rows) < 1 ): ?>

	    <br>
	    <h2 class="text-danger text-center">Oopss!! Nothing found.</h2><br>
	    <a href="indexes.php" class="btn btn-warning">Back</a>
	    <p></p>

	  	<?php else: ?>		
			<table class="table table-bordered table-hover" style="margin-top: 20px; background-color: #c2d6d6">
				<thead>
					<tr>
						<th class="text-center">ID</th>
						<th class="text-center">Title</th>
						<th class="text-center">Author</th>
						<th class="text-center">Content</th>
						<th class="text-center">Date Created</th>
						<th class="text-center">Date Modified</th>
						<th class="text-center" width="185">Action</th>
					</tr>
				</thead>
				<tbody style="background-color: white">
					<tr>
					<?php while($row = $rows->fetch_assoc()): ?>
                       
						<th><?php echo $row['id'] ?></th>
						<td class=""><?php echo $row['title'] ?> </td>
						<td><?php echo $row['author'] ?></td>
						<td><?php echo custom_content($row['content'], 120) ?><a href="contents.php"><h4>Read more...</h4></a></td>
						<td><?php echo $row['created'] ?></td>
						<td><?php echo $row['updated'] ?></td>
						<td>
							<a href="update.php?id=<?php echo $row['id'];?>" class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a>
							<a onclick="return confirm('Sure na ka ani nga imong e delete?')" href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</a> 
						</td>
					</tr>
					<?php endwhile; ?>
					
				</tbody>
          </table>
		<?php endif; ?>				
			
	
		<center>
		
	</div>
</div>

<?php  
include 'footer.php';
?>