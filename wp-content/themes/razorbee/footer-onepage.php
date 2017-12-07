<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif; ?>
<?php

$rurl=is_home()?"":site_url();
?>
<footer class="footer-section footer-onepage-wrapper text-center" >
    <div class="container-fluid">
        <?php if (nominee_option('social-icon-visibility', false, true)) : ?>
            <div class="social-links-wrap">
                <h3><?php echo esc_html(nominee_option('social-intro-title')); ?></h3>
                <?php get_template_part('template-parts/social', 'icons');?>
            </div> <!-- /social-links-wrap -->
        <?php endif; ?>

        
    </div> <!-- .container -->
</footer> <!-- .footer-section -->
<footer style="background-color:#222222;">
<div class="container-fluid">
	<div class="row">
    	<div class="col-lg-4 col-sm-4 col-xs-3">
        	<p style="font-size:20px;color:#ecde35;padding-top:10px;padding-bottom:5px;"><u><a href="<?php echo $rurl?>/index.php/disclaimer/ " style="color:#fcde35;">Disclaimer.</a></u> </p>
        </div>
    	<div class="col-lg-4 col-sm-4 col-xs-1">
        </div>
    	<div class="col-lg-4 col-sm-4 col-xs-8">
        	<p class="text-right" style="font-size:20px;color:#ecde35;padding-top:10px;padding-bottom:5px;"><u><a href="<?php echo $rurl?>/index.php/test/" style="color:#fcde35;">Privacy Policy.</a></u></p>
        </div>
    </div>
</div>
</footer>
