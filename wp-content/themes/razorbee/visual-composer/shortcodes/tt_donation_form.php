<?php
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    ob_start();

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    $donate_currency = '$';
    if (nominee_option('donate-currency') == false) {
        $donate_currency = nominee_option('donate-custom-currency');
    }

    $donate_currency_code = 'USD';

    if (nominee_option('donate-currency-code') == false) {
        $donate_currency_code = nominee_option('donate-custom-currency-code');
    }

    $donation500 = nominee_option('donate-amount-500');
    $donation200 = nominee_option('donate-amount-200');
    $donation100 = nominee_option('donate-amount-100');
    $donation50 = nominee_option('donate-amount-50');
    
?>

<div class="tt-paypal-donation <?php echo esc_attr($tt_atts['el_class'].' '.$css_class); ?>">
    <span><?php echo esc_html(nominee_option('donate-modal-title', false, true));?></span>
    <form class="paypal-donate-form clearfix" action="https://www.paypal.com/cgi-bin/webscr" method="post">
        <div class="col-md-12">
            <div class="donate-amount btn-group" data-toggle="buttons">
                <?php if ($donation500): ?>
                    <label class="btn amount-button">
                        <input name="amount" value="<?php echo esc_attr($donation500); ?>" type="radio"><?php echo esc_html($donate_currency.''.$donation500);?>
                    </label>
                <?php endif;?>
                
                <?php if ($donation200): ?>
                    <label class="btn amount-button">
                        <input name="amount" value="<?php echo esc_attr($donation200); ?>" type="radio"><?php echo esc_html($donate_currency.''.$donation200);?>
                    </label>
                <?php endif; ?>

                <?php if ($donation100): ?>
                    <label class="btn amount-button">
                        <input name="amount" value="<?php echo esc_attr($donation100); ?>" type="radio"><?php echo esc_html($donate_currency.''.$donation100);?>
                    </label>
                <?php endif; ?>

                <?php if ($donation50): ?>
                    <label class="btn amount-button">
                        <input name="amount" value="<?php echo esc_attr($donation50); ?>" type="radio"><?php echo esc_html($donate_currency.''.$donation50);?>
                    </label>
                <?php endif; ?>
                
                <input class="others-amount form-control" type="number" value="<?php echo esc_attr(nominee_option('donate-amount', false, false));?>" name="amount" placeholder="<?php esc_html_e('or, enter your amount', 'nominee');?>">
            </div>
        </div>

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

        <div class="form-group col-sm-6">
            <input class="form-control" type="text" name="state" placeholder="<?php esc_html_e('State', 'nominee');?>">
        </div>

        <div class="form-group col-sm-6">
            <input class="form-control" type="number" name="zip" placeholder="<?php esc_html_e('Zip', 'nominee');?>">
        </div>

        <input type="hidden" name="rm" value="0">
        <input type="hidden" name="currency_code" value="<?php echo esc_attr($donate_currency_code); ?>">

        <div class="col-md-12">
            <button class="btn btn-primary btn-xl" type="submit" name="submit"><?php echo esc_html(nominee_option('submit-button-text', false, true))?></button>
        </div>
    </form> <!-- .paypal-donate-form -->
</div> <!-- .tt-paypal-donation -->

<?php echo ob_get_clean();