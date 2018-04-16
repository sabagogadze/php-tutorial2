<?php 
	require_once $_SERVER['DOCUMENT_ROOT'].'/ecomerce/core/init.php'; 
	include "includes/head.php";
	include 'includes/navigation.php';
	 require_once '../helpers/helpers.php';


 ?>
 <h2 class="text-center">Categories</h2> <hr>
 	<div class="row">
	 	<div class="col-md-6 col-xs-6 col-sm-6">
	 		
	 	</div>
	 	<div class="col-md-6 col-xs-6 col-sm-6">
	 		<table class=" table table-bordered">
	 			<thead>
	 				<th>Category</th>
	 				<th>Perent</th>
	 				<th></th>
	 			</thead>
	 			<tbody>
	 				<tr>
	 					<td></td>
	 					<td></td>
	 					<td></td>
	 				</tr>
	 			</tbody>
	 		</table>
	 	</div>
	 </div>

 <?php 
    include 'includes/footer.php';
?>