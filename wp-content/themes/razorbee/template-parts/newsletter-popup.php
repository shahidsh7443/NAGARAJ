<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;
?>

<div class="tt-newsletter-popup modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<div class="modal-body text-center subscribe-form form-inline">
				<?php echo do_shortcode( wp_kses( nominee_option( 'newsletter-popup-content', false, '<p></p>' ), array(
					'h2'     => array( 'class' => array() ),
                    'h3'     => array( 'class' => array() ),
					'span'   => array( 'class' => array() ),
					'strong' => array( 'class' => array() ),
					'ul'     => array( 'class' => array() ),
					'ol'     => array( 'class' => array() ),
					'a'      => array( 'class' => array(), 'href' => array(), 'target' => array() ),
					'li'     => array( 'class' => array() ),
					'p'      => array( 'class' => array() ),
					'div'    => array( 'class' => array() ),
					'img'    => array( 'class' => array(), 'src' => array(), 'alt' => array() ),
				) ) ) ?>
			</div>
		</div> <!-- .modal-content -->
	</div> <!-- .modal-dialog -->
</div><!-- .modal -->