<?php
	function display_arrors($errors) {
		$display = '<ul class "bg-danger">';
		foreach ($errors as $error) {
			$display.='<li class="text-danger">'.$error.'</li>';
		}
		$dislplay = '</ul>';
		return $display;
	}

	function sanitize($dirty) {
		return htmlentities($dirty, ENT_QUOTES, 'UTF-8');
	}	
 ?>