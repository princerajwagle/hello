<?php
	$a=rand(1,2);
	
	switch($a) {
			case 1:			
			if ( is_active_sidebar( 'sidebar1' ) ) :
			dynamic_sidebar( 'sidebar1' );
			endif;
			break;
			case 2:
			if ( is_active_sidebar( 'sidebar2' ) ) :
			dynamic_sidebar( 'sidebar2' );
			endif;
			break;
			}
			
	
	?>
	
	
	
	<a href="index.php?page_id=42">Page title</a>