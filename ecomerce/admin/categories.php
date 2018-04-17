<?php 
	require_once $_SERVER['DOCUMENT_ROOT'].'/ecomerce/core/init.php'; 
	include "includes/head.php";
	include 'includes/navigation.php';
	 require_once '../helpers/helpers.php';
	 $sql = "SELECT * FROM categories WHERE parent = 0";
	 $result = $db -> query($sql);


 ?>
 	<h2 class="text-center">Categories</h2> <hr>
 	<div class="row">
	 	<div class="col-md-6 col-xs-6 col-sm-6">
	 		<form class="col-md-6" action="categories.php" method="post">
	 			<div class="form-group">
	 				<label for="parent">Parent</label>
	 				<select class="form-control" name="parent" >
	 					<option value="0">Parent</option>
	 					<?php while ($categories = mysqli_fetch_assoc($result)): ?>
	 						<option value="<?php echo $categories ['id']; ?>"><?php echo $categories['category'];?></option>

	 					<?php endwhile;  ?>
	 				</select>
	 				
	 			</div>
	 			
	 		</form>
	 	</div>
	 	<div class="col-md-6 col-xs-6 col-sm-6">
	 		<table class=" table table-bordered">
	 			<thead>
	 				<th>Category</th>
	 				<th>parent</th>
	 				<th></th>
	 			</thead>
	 			<tbody>
	 			<?php 
		 				$sql = "SELECT * FROM categories WHERE parent = 0";
		 				$result = $db -> query($sql);
		 				while ($categories = mysqli_fetch_assoc($result)): 
		 					$parent_id = (int)$categories['id'];
		 					$sql2 = "SELECT * FROM categories WHERE parent = $parent_id";
		 					$cresult =  $db -> query($sql2);
		 				?>
		 				 
		 				<tr class="bg-primary">
		 					<td><?php echo $categories['category'] ?></td>
		 					<td>parent</td>
		 					<td>
		 						<a href="categories.php?edit=<?php echo $categories['id'] ?>"  class="btn btn-success btn-sm"><span>Edit</span></a>
		 						<a href="categories.php?delte=<?php echo $categories['id'] ?>"  class="btn btn-success btn-sm"><span>Edit</span></a>
		 					</td>
		 					
		 				</tr>
		 				<?php while ($child = mysqli_fetch_assoc($cresult)):  ?>
		 					<tr class="bg-info">
		 					<td><?php echo $child['category'] ?></td>
		 					<td><?php echo $categories['category'] ?></td>
		 					<td>
		 						<a href="categories.php?edit=<?php echo $categories['id'] ?>"  class="btn btn-success btn-sm"><span>Edit</span></a>
		 						<a href="categories.php?delte=<?php echo $categories['id'] ?>"  class="btn btn-success btn-sm"><span>Edit</span></a>
		 					</td>
		 				</tr>
		 				<?php endwhile;  ?>	
	 			<?php endwhile;  ?>
	 			</tbody>
	 		</table>
	 	</div>
	 </div>

 <?php 
    include 'includes/footer.php';
?>