<div class="footer-social-links social-links">
    <ul class="list-inline">
        <?php
            $facebook_url = nominee_option('facebook-link');
            if ($facebook_url) { ?>
                <li><a href="<?php echo esc_url($facebook_url);?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
            <?php }

            $twitter_url = nominee_option('twitter-link');
            if ($twitter_url) { ?>
                <li><a href="<?php echo esc_url($twitter_url);?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
            <?php }

            $google_url = nominee_option('google-plus-link');
            if ($google_url) { ?>
                <li><a href="<?php echo esc_url($google_url);?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
            <?php }

            $youtube_url = nominee_option('youtube-link');
            if ($youtube_url) { ?>
                <li><a href="<?php echo esc_url($youtube_url);?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
            <?php }
            
            $pinterest_url = nominee_option('pinterest-link');
            if ($pinterest_url) { ?>
                <li><a href="<?php echo esc_url($pinterest_url);?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
            <?php }
            
            $flickr_url = nominee_option('flickr-link');
            if ($flickr_url) { ?>
                <li><a href="<?php echo esc_url($flickr_url);?>" target="_blank"><i class="fa fa-flickr"></i></a></li>
            <?php }
            
            $linkedin_url = nominee_option('linkedin-link');
            if ($linkedin_url) { ?>
                <li><a href="<?php echo esc_url($linkedin_url);?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
            <?php }
            
            $vimeo_url = nominee_option('vimeo-link');
            if ($vimeo_url) { ?>
                <li><a href="<?php echo esc_url($vimeo_url);?>" target="_blank"><i class="fa fa-vimeo"></i></a></li>
            <?php }
            
            $instagram_url = nominee_option('instagram-link');
            if ($instagram_url) { ?>
                <li><a href="<?php echo esc_url($instagram_url);?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
            <?php }

            $dribbble_url = nominee_option('dribbble-link');
            if ($dribbble_url) { ?>
                <li><a href="<?php echo esc_url($dribbble_url);?>" target="_blank"><i class="fa fa-dribbble"></i></a></li>
            <?php }

            $behance_url = nominee_option('behance-link');
            if ($behance_url) { ?>
                <li><a href="<?php echo esc_url($behance_url);?>" target="_blank"><i class="fa fa-behance"></i></a></li>
            <?php }
        ?>
    </ul>
</div>