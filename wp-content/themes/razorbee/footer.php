<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif; ?>

    <?php
    $tt_footer_style = nominee_option('footer-style', false, 'footer-multipage');

    if ($tt_footer_style == 'footer-onepage') :
        get_footer('onepage');
    else :
        get_footer('multipage');
    endif; ?>

    <!-- newsletter subscription popup -->
    <?php if ( nominee_option( 'newsletter-popup', false, true ) ) :
		get_template_part( 'template-parts/newsletter', 'popup' );
	endif; ?>

<?php wp_footer(); ?>
</body>
</html>