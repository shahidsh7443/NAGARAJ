<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;


	$donate_currency_code = 'USD';

    if (nominee_option('donate-currency-code') == false) {
        $donate_currency_code = nominee_option('donate-custom-currency-code');
    }
?>

<div class="modal fade" id="paypal-donate">
  	<div class="modal-dialog" role="document">
	    <div class="modal-content">
	      	<div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		        	<span aria-hidden="true">&times;</span>
		        </button>

		        <h4 class="modal-title"><?php echo esc_html(nominee_option('donate-modal-title', false, true));?></h4>
	      	</div>
	      	<div class="modal-body clearfix">

	        	<form class="paypal-donate-form" action="https://www.paypal.com/cgi-bin/webscr" method="post">
					<input type="hidden" name="cmd" value="_donations">
					<input type="hidden" name="bn" value="TipsandTricks_SP">
					<input type="hidden" name="business" value="<?php echo esc_attr(nominee_option('paypal-mail', false, false));?>">
					<input type="hidden" name="item_name" value="<?php echo esc_attr(nominee_option('donate-purpose', false, false));?>">
					<input type="hidden" name="item_number">
					
					<div class="form-group col-sm-6">
						<input class="form-control" type="text" name="first_name" placeholder="<?php esc_html_e('First Name', 'nominee');?>" required>
					</div>

					<div class="form-group col-sm-6">
						<input class="form-control" type="text" name="last_name" placeholder="<?php esc_html_e('Last Name', 'nominee');?>" >
					</div>

					<div class="form-group col-sm-6">
						<input class="form-control" type="text" name="address1" placeholder="<?php esc_html_e('Address line 1', 'nominee');?>">
					</div>

					<div class="form-group col-sm-6">
						<input class="form-control" type="text" name="address2" placeholder="<?php esc_html_e('Address line 2', 'nominee');?>">
					</div>

					<div class="form-group col-sm-6">
						<input class="form-control" type="email" name="email" placeholder="<?php esc_html_e('Email', 'nominee');?>" required>
					</div>

					<div class="form-group col-sm-6">
						<input class="form-control" type="text" name="city" placeholder="<?php esc_html_e('City', 'nominee');?>">
					</div>

					<div class="form-group col-sm-4">
						<input class="form-control" type="text" name="state" placeholder="<?php esc_html_e('State', 'nominee');?>">
					</div>

					<div class="form-group col-sm-4">
						<input class="form-control" type="number" name="zip" placeholder="<?php esc_html_e('Zip', 'nominee');?>">
					</div>

					<div class="form-group col-sm-4">
						<input class="form-control" type="number" value="<?php echo esc_attr(nominee_option('donate-amount', false, false));?>" name="amount" placeholder="<?php esc_html_e('Amount', 'nominee');?>" required>
					</div>

					<input type="hidden" name="rm" value="0">
					<input type="hidden" name="currency_code" value="<?php echo esc_attr($donate_currency_code); ?>">

					<div class="col-md-12">
						<button class="btn btn-primary btn-lg" type="submit" name="submit"><?php echo esc_html(nominee_option('submit-button-text', false, true))?></button>
					</div>
				</form>

	      	</div> <!-- .modal-body -->
	    </div> <!-- .modal-content -->
  	</div> <!-- .modal-dialog -->
</div> <!-- #paypal-donate -->