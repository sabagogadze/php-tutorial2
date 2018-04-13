	</div>
	<footer id="footers" class="text-center">&copy;All right received</footer>

	<script>
		function detailsmodal(id) {
			var data = {"id" : id};
			$.ajax({
			  url: <?php echo BASEURL;?>+'includes/detailsmodal.php',
			  type: 'POST',
			  data: data,
			  success: function(data) {
			  	jQuery('#details-modal').remove();
			  	jQuery('body').append(data);
			  	jQuery('#details-modal').modal('toggle');
			   
			  },
			  error: function() {
			  	alert('something wehnt wrong!');
			  
			  }
			});
			
			}
	</script>
	

</body>
</html>