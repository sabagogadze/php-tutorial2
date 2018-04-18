<?php 
	require_once $_SERVER['DOCUMENT_ROOT'].'/ecomerce/core/init.php'; 
	include "includes/head.php";
	include 'includes/navigation.php';
	 require_once '../helpers/helpers.php';
	 $sql = "SELECT * FROM categories WHERE parent = 0";
	 $result = $db -> query($sql);
	 $errors = array();

	 //delete categories

	 if (isset($_GET['delete']) && !empty($_GET['delete'])) {

	 	
	 	$delete_id = (int)$_GET['delete'];
	 	
		$delete_id = sanitize($delete_id);
		var_dump($delete_id);

	 	$sql_delete = "DELETE FROM categories WHERE id = '$delete_id'";
	 	$db -> query($sql_delete);
	 	header('Location: categories.php');
	 }

	 //process forms
	 if (isset($_POST) && !empty($_POST)) {
	 	$parent = sanitize($_POST['parent']);
	 	$category = sanitize($_POST['category']);
	 	$sqlForm = "SELECT * FROM categories WHERE category = '$category' AND parent = '$parent'";
	 	$fresult =  $db ->query($sqlForm);
	 	$count = mysqli_num_rows($fresult);
	 	if ($category =="") {
	 		$errors[].= 'The Category can not be empty';

	 	} 
	 	if ($count >0) {
	 		$errors[].= $category. ' Already exists in database';
	 	}

	 	if (!empty($errors)) {
	 		$display = display_arrors($errors); ?>
	 		<script>
	 			jQuery(document).ready(function() {
	 			jQuery('#errors').html('<?php echo $display ?>')	
	 			});
	 		</script>
	 		<?php 
	 	} else {
	 		$insertsql = "INSERT INTO categories (category, parent) VALUES ('$category', '$parent')";
	 		$db -> query($insertsql);
	 		header('Location: categories.php');
	 	}
	 }


 ?>
 	<h2 class="text-center">Categories</h2> <hr>
 	<div class="row">
	 	<div class="col-md-6 col-xs-6 col-sm-6">
	 		<legend class="col-md-6 col-xs-6 col-sm-6">Add Category</legend>
	 		<div id="errors" ></div>
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
	 			<div class="form-group">
	 				<label for="category">Category</label>
	 				<input type="text" class="form-control" name="category" id="category">
	 			</div>
	 			<div class="form-group">
	 				<input type="submit" value="Add Category" class="btn btn-success">
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
		 						<a href="categories.php?delete=<?php echo $categories['id'] ?>"  class="btn btn-success btn-sm"><span>delete</span></a>
		 					</td>
		 					
		 				</tr>
		 				<?php while ($child = mysqli_fetch_assoc($cresult)):  ?>
		 					<tr class="bg-info">
		 					<td><?php echo $child['category'] ?></td>
		 					<td><?php echo $categories['category'] ?></td>
		 					<td>
		 						<a href="categories.php?edit=<?php echo $child['id'] ?>"  class="btn btn-success btn-sm"><span>Edit</span></a>
		 						<a href="categories.php?delete=<?php echo $child['id'] ?>"  class="btn btn-success btn-sm"><span>delete</span></a>
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