<?php 
  require_once "../core/init.php";
  include "includes/head.php";
  include 'includes/navigation.php';
  $sqlBrand = "SELECT * FROM brand ORDER BY brand";
  $resultBrand = $db -> query($sqlBrand);
?>

<h2 class="text-center">Brands</h2><hr>
	<div class="text-center col-12">
		<form class="form-inline" action="brand.php" method="post">
			<div class="form-group">
				<label for="brand">Add A Brand</label>
					<input type="text" name="brand" id="brand" class="form-control" value="<?php if(isset($_POST['brand'])){echo $_POST['brand'];}else echo "";  ?>">
					<input type="submit" name="add_submit" value="Add Brand" class="btn btn-success">
			</div>
			
		</form>
	</div>
<table class="table table-bordered table-striped table-auto">
	<thead>
		<th></th>
		<th>Brand</th>
		<th></th>
	</thead>
	<tbody>
		<?php while ($brand = mysqli_fetch_assoc($resultBrand)) : ?>
		<tr>
			<td><a href="brands.php?edit=<?php echo $brand['id'];  ?>" class="btn btn-primary btn-sm"><span>Edit</span></a></td>
			<td><?php echo $brand['brand']; ?></td>
			<td><a href="brands.php?delete=<?php echo $brand['id']; ?>" class="btn btn-primary btn-sm"><span>Delete</span></a></td>
		</tr>
		<?php endwhile; ?>
	</tbody>
</table>
<?php 
    include 'includes/footer.php';
?>