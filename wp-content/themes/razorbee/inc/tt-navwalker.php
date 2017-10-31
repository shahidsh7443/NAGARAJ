<?php

if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

class Nominee_Navwalker extends Walker_Nav_Menu {
    
    private $megamenuId;
    private $megamenu_container;
    private $grid_column;

    /**
     * @see Walker::start_lvl()
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int $depth Depth of page. Used for padding.
     */
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat( "\t", $depth );

        if($this->megamenuId == 1) :
            $output .= "\n$indent<div class=\"megamenu-wrapper ".$this->megamenu_container." menu-item-depth-".$depth."\">\n";
            $output .= "\n$indent<ul role=\"menu\" class=\"dropdown-menu dropdown-megamenu menu-col-".$this->grid_column."\">\n";
        else :
            $output .= "\n$indent<div class=\"dropdown-wrapper menu-item-depth-".$depth."\">\n";
            $output .= "\n$indent<ul role=\"menu\" class=\"dropdown-menu\">\n";
        endif; 
    }

    public function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat( "\t", $depth );
        $output .= "\n$indent</ul>\n";
        $output .= "\n$indent</div>\n";

        if($this->megamenuId == 1) :
            $output .= "\n$indent</div>\n";
        endif;
    }

    /**
     * @see Walker::start_el()
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item Menu item data object.
     * @param int $depth Depth of menu item. Used for padding.
     * @param int $current_page Menu item ID.
     * @param object $args
     */
    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $wp_query;

        $megamenu = 0;
        $column = 1;

        if($depth == 1) :
            $column = get_post_meta( $item->menu_item_parent, '_menu_item_column', true );
            $megamenu = get_post_meta( $item->menu_item_parent, '_menu_item_megamenu', true );
        endif;

        $this->megamenuId    = get_post_meta( $item->ID, '_menu_item_megamenu', true );
        $this->megamenu_container  = get_post_meta( $item->ID, '_menu_item_container', true );
        $this->grid_column  = get_post_meta( $item->ID, '_menu_item_column', true );
        $this->menu_icon  = get_post_meta( $item->ID, '_menu_item_icon', true );
        $this->menu_heading  = get_post_meta( $item->ID, '_menu_item_heading', true );


        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

        if ( $args->has_children ) :
            $class_names .= ' dropdown';
        endif;

        $class_megamenu = ( $item->megamenu )? ' has-mega-menu': '';

        if ( $megamenu == 1 ) :
            $class_megamenu .= ' has-mega-menu-child';
        else :
            $class_megamenu .= ' has-menu-child';
        endif;

        if ( in_array( 'current-menu-item', $classes ) ) :
            $class_names .= ' active';
        endif;

        $class_names = $class_names ? ' class="' . esc_attr( $class_names.' '.$class_megamenu ) . '"' : '';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $value . $class_names .'>';

        $atts = array();
        $atts['title']  = ! empty( $item->title )   ? $item->title  : '';
        $atts['target'] = ! empty( $item->target )  ? $item->target : '';
        $atts['rel']    = ! empty( $item->xfn )     ? $item->xfn    : '';

        // If item use as heading text
        if ( $this->menu_heading == 'yes' ) :
            $atts['href']           = '';
            $atts['class']          = 'menu-heading';
        else :
            $atts['href'] = ! empty( $item->url ) ? $item->url : '';
        endif;

        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

        $attributes = '';
        foreach ( $atts as $attr => $value ) :
            if ( ! empty( $value ) ) :
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            endif;
        endforeach;

        $item_output = $args->before;

        /*
         * Glyphicons
         * ===========
         * Since the the menu item is NOT a Divider or Header we check the see
         * if there is a value in the attr_title property. If the attr_title
         * property is NOT null we apply it as the class name for the glyphicon.
         */
        if ( ! empty( $item->attr_title ) )
            $item_output .= '<a'. $attributes .'><span class="glyphicon ' . esc_attr( $item->attr_title ) . '"></span>&nbsp;';
        else
            $item_output .= '<a'. $attributes .'>';
        
        if (!empty($this->menu_icon)) :
            $item_output .= '<i class="'.$this->menu_icon.'"></i>';
        endif;

        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

        if ( isset( $args->has_children ) and $args->has_children and 0 === $depth ) :
            $item_output .= ' <span class="fa fa-angle-down"></span>';
        endif;

        if ( isset( $args->has_children ) and $args->has_children and $depth >= 1 and $megamenu == 0 ) :
            $item_output .= ' <span class="fa fa-angle-right"></span>';
        endif;

        $item_output .= '</a>';

        $item_output .= isset( $args->after ) ? $args->after : '';

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        
    }

    /**
     * Traverse elements to create list from elements.
     *
     * Display one element if the element doesn't have any children otherwise,
     * display the element and its children. Will only traverse up to the max
     * depth and no ignore elements under that depth.
     *
     * This method shouldn't be called directly, use the walk() method instead.
     *
     * @see Walker::start_el()
     * @since 2.5.0
     *
     * @param object $element Data object
     * @param array $children_elements List of elements to continue traversing.
     * @param int $max_depth Max depth to traverse.
     * @param int $depth Depth of current element.
     * @param array $args
     * @param string $output Passed by reference. Used to append additional content.
     * @return null Null on failure with no changes to parameters.
     */
    public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element )
            return;

        $id_field = $this->db_fields['id'];

        // Display this element.
        if ( is_object( $args[0] ) )
           $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );

        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }

    /**
     * Menu Fallback
     * =============
     * If this function is assigned to the wp_nav_menu's fallback_cb variable
     * and a manu has not been assigned to the theme location in the WordPress
     * menu manager the function with display nothing to a non-logged in user,
     * and will add a link to the WordPress menu manager if logged in as an admin.
     *
     * @param array $args passed from the wp_nav_menu function.
     *
     */
    public static function fallback( $args ) {
        if ( current_user_can( 'manage_options' ) ) {

            extract( $args );

            $fb_output = null;

            if ( $container ) {
                $fb_output = '<' . $container;

                if ( $container_id )
                    $fb_output .= ' id="' . $container_id . '"';

                if ( $container_class )
                    $fb_output .= ' class="' . $container_class . '"';

                $fb_output .= '>';
            }

            $fb_output .= '<ul';

            if ( $menu_id )
                $fb_output .= ' id="' . $menu_id . '"';

            if ( $menu_class )
                $fb_output .= ' class="menu nav navbar-nav navbar-right ' . $menu_class . '"';

            $fb_output .= '>';
            $fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">' . esc_html__( 'Add a menu', 'nominee' ) . '</a></li>';
            $fb_output .= '</ul>';

            if ( $container )
                $fb_output .= '</' . $container . '>';

            echo $fb_output;
        }
    }
}