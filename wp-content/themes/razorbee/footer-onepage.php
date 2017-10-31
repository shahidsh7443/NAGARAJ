<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif; ?>

<footer class="footer-section footer-onepage-wrapper text-center">
    <div class="container">
        <?php if (nominee_option('social-icon-visibility', false, true)) : ?>
            <div class="social-links-wrap">
                <h3><?php echo esc_html(nominee_option('social-intro-title')); ?></h3>
                <?php get_template_part('template-parts/social', 'icons');?>
            </div> <!-- /social-links-wrap -->
        <?php endif; ?>
        
        <?php if (nominee_option('footer-menu-visibility', false, false)): ?>
            <div class="footer-menu">
                <?php wp_nav_menu( apply_filters( 'nominee_footer_wp_nav_menu', array(
                                    'theme_location' => 'footer',
                                    'items_wrap'     => '<ul>%3$s</ul>',
                                 ) )
                    );
                ?>
            </div>
        <?php endif ?>
        
        <?php if (nominee_option('footer-text', false, false)) :
            echo wp_kses(nominee_option('footer-text'), array(
                'a'      => array(
                    'href'   => array(),
                    'title'  => array(),
                    'target' => array()
                ),
                'br'     => array(),
                'em'     => array(),
                'strong' => array(),
                'ul'     => array(),
                'li'     => array(),
                'p'      => array(),
                'span'   => array(
                    'class' => array()
                )
            ));
            else : ?>
            <span class="copyright">
                <?php printf(
                    esc_html__('Copyright &copy; %1$s %2$s. All Rights Reserved. Designed by %3$s.', 'nominee'),
                    date('Y'), esc_html__('Nominee', 'nominee'),
                    "<a href='http://www.trendytheme.net'>".esc_html__('Trendy Theme', 'nominee')."</a>"); ?>
            </span>
        <?php endif; ?>
    </div> <!-- .container -->
</footer> <!-- .footer-section -->