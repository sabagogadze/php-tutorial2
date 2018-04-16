<!-- Header -->
<?php
	$sqlcarousel =  "SELECT * FROM `carusel image` WHERE 1";
	$carouselresult = $db -> query($sqlcarousel);
	$count = 0;
	
  ?>

<div class="row">
	<div id="demo" class="carousel slide" data-ride="carousel">
	  <ul class="carousel-indicators">
	  	<?php while (mysqli_fetch_assoc($carouselresult)): ?>
	    <li data-target="#demo" data-slide-to="<?php echo $count++; ?>" class="active"></li>
	     <?php endwhile; ?>
	  </ul>
	  <div class="carousel-inner">
	  	<!-- <div class="carousel-item active">
	      <img class="car_img" src="images/headerlogo/slider1.jpeg">
	      <div class="carousel-caption">
	        <h3>Los Angeles</h3>
	        <p>We had such a great time in LA!</p>
	      </div>   
	    </div> -->
	  	<?php 
	  	$sqlcarouselimg =  "SELECT * FROM `carusel image` WHERE 1";
	  	$carouselresultimg = $db -> query($sqlcarouselimg);
	  	$x=0;


	  	while ($car_img = mysqli_fetch_assoc($carouselresultimg)): ?>
	    <div class="carousel-item <?php  if ($x++ == 0) {echo " active";
	    	
	    } ?>">
	      <img class="car_img" src="<?php echo $car_img['car_img'] ?>">
	      <div class="carousel-caption">
	        <h3>Los Angeles</h3>
	        <p>We had such a great time in LA!</p>
	      </div>   
	    </div>
	    <?php endwhile; ?>
	      
	    </div> 
	    	 <a class="carousel-control-prev" href="#demo" data-slide="prev">
	    		<span class="carousel-control-prev-icon"></span>
	  		</a>
	  		<a class="carousel-control-next" href="#demo" data-slide="next">
	    		<span class="carousel-control-next-icon"></span>
	  		</a>

	    </div>
	   
	  </div>
	  
	</div>
</div>
	<div class="container-fluid">