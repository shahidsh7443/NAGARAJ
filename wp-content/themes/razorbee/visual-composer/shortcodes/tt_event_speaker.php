<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    ob_start();
?>

    <div class="member-wrapper speaker-wrapper <?php echo esc_attr($tt_atts['el_class']); ?>">
        <div class="row">
            <?php 
            $args = array(
                'p'              => $tt_atts['speaker_list'],
                'post_type'      => 'tt-member',
                'post_status'    => 'publish'
            );

            $query = new WP_Query($args);

            if ( $query->have_posts() ) : ?>
                <!-- the loop -->
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    
                    <figure class="thumbnail">
                        <div class="thumb-wrapper">
                            <?php the_post_thumbnail('nominee-member', array('alt'=> get_the_title(), 'class' => 'img-responsive' ));?>
                            
                            <?php if (function_exists('rwmb_meta')) : ?>
                                
                                <div class="team-social">
                                    <ul class="list-inline">
                                        <?php
                                        
                                        $facebook_link = rwmb_meta('nominee_facebook_link');
                                        if ($facebook_link) : ?>
                                            <li>
                                                <a href="<?php echo esc_url($facebook_link); ?>"><i class="fa fa-facebook"></i></a>
                                            </li>
                                        <?php endif; 

                                        $twitter_link = rwmb_meta('nominee_twitter_link');
                                        if ($twitter_link) : ?>
                                            <li>
                                                <a href="<?php echo esc_url($twitter_link); ?>"><i class="fa fa-twitter"></i></a>
                                            </li>
                                        <?php endif; 

                                        $google_plus_link = rwmb_meta('nominee_google_plus_link');
                                        if ($google_plus_link) : ?>
                                            <li>
                                                <a href="<?php echo esc_url($google_plus_link); ?>"><i class="fa fa-google-plus"></i></a>
                                            </li>
                                        <?php endif; 

                                        $linkedin_link = rwmb_meta('nominee_linkedin_link');
                                        if ($linkedin_link) : ?>
                                            <li>
                                                <a href="<?php echo esc_url($linkedin_link); ?>"><i class="fa fa-linkedin"></i></a>
                                            </li>
                                        <?php endif;

                                        $flickr_link = rwmb_meta('nominee_flickr_link');
                                        if ($flickr_link) : ?>
                                            <li>
                                                <a href="<?php echo esc_url($flickr_link); ?>"><i class="fa fa-flickr"></i></a>
                                            </li>
                                        <?php endif;

                                        $youtube_link = rwmb_meta('nominee_youtube_link');
                                        if ($youtube_link) : ?>
                                            <li>
                                                <a href="<?php echo esc_url($youtube_link); ?>"><i class="fa fa-youtube"></i></a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </div> <!-- .team-social -->

                            <?php endif; ?>

                        </div> <!-- .thumb-wrapper -->
                      
                        <figcaption class="caption text-center">
                            
                            <h3><?php the_title(); ?></h3>

                            <?php if (function_exists('rwmb_meta')) :
                                $member_designation = rwmb_meta('nominee_member_designaion');
                                if ($member_designation and $tt_atts['designation_visibility'] == 'visible-designation') : ?>
                                    <span><?php echo esc_html($member_designation); ?></span>
                                <?php endif; 
                            endif; ?>
                            <?php if ($tt_atts['bio_visibility'] == 'visible-bio'): ?>
                                <div class="member-biography">
                                    <a href="<?php the_permalink();?>"><?php esc_html_e('Biography', 'nominee');?><i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            <?php endif ?>
                        </figcaption>
                    </figure>

                <?php endwhile; ?>
                <!-- end of the loop -->

            <?php wp_reset_postdata(); ?>

            <?php else : ?>
                <p><?php esc_html_e( 'Speaker not found !', 'nominee' ); ?></p>
            <?php endif; ?>
        </div><!-- .row -->
    </div><!-- .member-wrapper -->
<?php echo ob_get_clean();