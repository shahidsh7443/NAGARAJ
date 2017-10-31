<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

	ob_start();

?>

    <div class="social-counter">

        <?php 
	        if (class_exists('Social_Count_Plus')) :
	        	echo get_scp_widget();
	        endif; 
        ?>

    </div> <!-- .social-counter -->

<?php echo ob_get_clean();