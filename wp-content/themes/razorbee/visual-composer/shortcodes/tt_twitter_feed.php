<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    ob_start();

?>

    <div class="twitterfeed text-center <?php echo esc_attr($tt_atts['el_class']); ?>" data-twitter-id="<?php echo esc_attr($tt_atts['twitter_id']); ?>" data-max-tweet="<?php echo esc_attr($tt_atts[ 'twitter_number' ]); ?>">
    	<i class="fa fa-twitter"></i>
        <div class="twitter-carousel"></div>
    </div>

<?php echo ob_get_clean();