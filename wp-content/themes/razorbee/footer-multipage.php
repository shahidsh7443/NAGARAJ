<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif; ?>

<footer class="footer-section footer-multi-wrapper">
   
    <?php if (is_active_sidebar('nominee-footer-sidebar' )): ?>
        <div class="container">
            <div class="row">
                <div class="tt-sidebar-wrapper footer-sidebar clearfix text-left" role="complementary">
                    <?php dynamic_sidebar('nominee-footer-sidebar' );?>
                </div>
            </div>
        </div> <!-- .container -->
    <?php endif ?>
    
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="copyright">
                        <?php if (nominee_option('footer-text', false, false)) : ?>
                            <?php echo wp_kses(nominee_option('footer-text'), array(
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
                                <?php printf(
                                    esc_html__('Copyright &copy; %1$s %2$s. All Rights Reserved. Designed by %3$s.', 'nominee'),
                                    date('Y'), esc_html__('Nominee', 'nominee'),
                                    "<a href='http://www.trendytheme.net'>".esc_html__('Trendy Theme', 'nominee')."</a>"); ?>
                        <?php endif; ?>
                    </div> <!-- .copyright -->
                </div> <!-- .col-# -->

                <?php if (nominee_option('social-icon-visibility', false, true)) : ?>
                    <div class="col-sm-6">
                        <div class="social-links-wrap text-right">
                            <?php get_template_part('template-parts/social', 'icons');?>
                        </div> <!-- /social-links-wrap -->
                    </div>
                <?php endif; ?>
            </div> <!-- .row -->
        </div> <!-- .container -->
    </div> <!-- .footer-copyright -->
</footer> <!-- .footer-section -->