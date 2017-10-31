<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    ob_start();

?>

    <div class="spokesman-tweet <?php echo esc_attr($tt_atts['el_class']); ?>" data-twitter-id="<?php echo esc_attr($tt_atts['twitter_id']); ?>" data-max-tweet="<?php echo esc_attr($tt_atts[ 'twitter_number' ]); ?>">
    	<div class="tt-tweets"></div>

    	<?php if ($tt_atts['twitter_user']): ?>
    		<div class="all-tweets-links">
				<a href="https://twitter.com/<?php echo esc_attr($tt_atts['twitter_user'])?>" target="_blank"><i class="fa fa-list"></i><?php esc_html_e('View All', 'nominee')?></a>
			</div>
    	<?php endif ?>
    </div>

<?php echo ob_get_clean();