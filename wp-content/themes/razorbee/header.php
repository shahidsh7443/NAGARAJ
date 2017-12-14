<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif; ?>
<?php

$rurl=is_home()?"":site_url();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php esc_url( bloginfo( 'pingback_url' ) ); ?>">
    <link rel="icon" type="image/jpg" href="<?php echo $rurl?>/wp-content/uploads/2015/12/nagaraj_logo2.png">
    <?php wp_head(); ?>
</head>

<body id="home" <?php body_class(); ?> data-spy="scroll" data-target=".navbar" data-offset="100">
    <?php if (nominee_option('page-preloader', false, true)) : ?>
        <div id="preloader" style="background-color: <?php echo esc_attr(nominee_option('loader-bg-color', false, '#ffffff'));?>">
            <div id="status">
                <div class="status-mes" style="background-image: url(<?php echo esc_url(nominee_option('tt-loader', 'url', get_template_directory_uri() . '/images/preloader.gif'));?>);"></div>
            </div>
        </div>
    <?php endif; ?>

    <?php
    $tt_header_style = nominee_option('header-style', false, 'header-default');

    if ($tt_header_style == 'header-transparent') :
        get_header('transparent');
    else :
        get_header('default');
    endif; ?>

<?php get_template_part( 'page', 'header' );
