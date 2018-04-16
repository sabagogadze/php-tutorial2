<?php 
  require_once "../core/init.php";
  include "includes/head.php";
  include 'includes/navigation.php';
  require_once '../helpers/helpers.php';
  $sqlBrand = "SELECT * FROM brand ORDER BY brand";
  $resultBrand = $db -> query($sqlBrand);
  $errors = array();

  //delete brands
  if (isset($_GET['delete'])&& !empty($_GET['delete'])) {
  		$delete_id = (int)$_GET['delete'];
  		$delete_id = sanitize($delete_id);
  		$sql_delte = "DELETE FROM brand WHERE id = '$delete_id'";
  		$db ->query($sql_delte);
  		header('Location: brands.php');

  }


  //edit brand
  if (isset($_GET['edit'])&& !empty($_GET['edit'])) {
  	$edit_id = (int)$_GET['edit'];
  	$edit_id = sanitize($edit_id);
  	$sql_edit = "SELECT * FROM brand WHERE id = '$edit_id'";
  	$edit_result = $db -> query($sql_edit);
  	$eBrand = mysqli_fetch_assoc($edit_result);
  	
  	
  }
 

  if (isset($_POST['add_submit'])) {
  		$brand = sanitize($_POST['brand']);
	  	if ($_POST['brand'] == '') {
	  		$errors[] .='You must enter brand!';
	  	}
	  	$sql = "SELECT * FROM brand WHERE brand = '$brand'";
	  	if (isset($_GET['edit'])) {
	  		$sql = "SELECT * FROM brand WHERE brand = '$brand' AND id != '$edit_id'";
	  	}
	  	$result = $db -> query($sql);
	  	$count = mysqli_num_rows($result);
	  	if ($count > 0) {
	  		$errors[].= $brand.'  already exists!';



	  	}


	  	if (!empty($errors)) {
	  		echo display_arrors($errors);
	  	}
	  	else {
	  		$sql_insert = "INSERT INTO brand (brand) VALUES ('$brand')";
	  		$sql_update = "UPDATE brand SET brand = '$brand' WHERE id = '$edit_id'";
	  		if (isset($_GET['edit'])) {
	  			{$db -> query($sql_update);}
	  		} else {$db -> query($sql_insert);}
	  		
	  		header('Location: brands.php');


	  	}
  		
  }
?>

<h2 class="text-center">Brands</h2><hr>
	<div class="text-center col-12">
		<form class="form-inline " action="brands.php<?=((isset($_GET['edit']))?'?edit='.$edit_id:''); ?>" method="post">
			<div class="form-group">
				<?php 
					$brand_value = '';
					if (isset($_GET['edit'])) {
						$brand_value = $eBrand['brand'];
						
					} else {
						if(isset($_POST['brand'])){
							$brand_value = sanitize($_POST['brand']);
						}
					}
				 ?>
				<label for="brand"><?php if(isset($_GET['edit'])) {echo "Edit a";} else {echo "Add a";} ?> Brand:</label>
					<input type="text" name="brand" id="brand" class="form-control" value="<?php echo $brand_value; ?>">
					<?php if (isset($_GET['edit'])): ?>
						<a href="brands.php" class="btn btn-primary">Cancel</a>
					<?php endif; ?>
					<input type="submit" name="add_submit" value="<?php if(isset($_GET['edit'])) {echo "Edit ";} else {echo "Add ";} ?> Brand" class="btn btn-success">

			</div>
			
		</form>
	</div> <hr>
<table class="table table-bordered table-striped table-auto">
	<thead>
		<th></th>
		<th>Brand</th>
		<th></th>
	</thead>
	<tbody>
		<?php while ($brand = mysqli_fetch_assoc($resultBrand)) : ?>
		<tr>
			<td><a href="brands.php?edit=<?php echo $brand['id']; ?> "  class="btn btn-primary btn-sm"><span>Edit</span></a></td>
			<td><?php echo $brand['brand']; ?></td>
			<td><a  href="brands.php?delete=<?php echo $brand['id']; ?>" onclick="return confirm('Are you sure you wish to delete this item?');" class="btn btn-primary btn-sm delteBrand"><span>Delete</span></a></td>
		</tr>
		<?php endwhile; ?>
	</tbody>
</table>
<?php 
    include 'includes/footer.php';
?>




