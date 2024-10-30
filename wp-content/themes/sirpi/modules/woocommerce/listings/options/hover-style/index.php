<?php

/**
 * Listing Options - Hover Style
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'Sirpi_Woo_Listing_Option_Hover_Style' ) ) {

    class Sirpi_Woo_Listing_Option_Hover_Style extends Sirpi_Woo_Listing_Option_Core {

        private static $_instance = null;

        public $option_slug;

        public $option_name;

        public $option_type;

        public $option_default_value;

        public $option_value_prefix;

        public static function instance() {

            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }

            return self::$_instance;

        }

        function __construct() {

            $this->option_slug          = 'product-hover-style';
            $this->option_name          = esc_html__('Hover Style', 'sirpi');
            $this->option_type          = array ( 'class', 'value-css' );
            $this->option_default_value = 'product-hover-fade-border';
            $this->option_value_prefix  = 'product-hover-';

            $this->render_backend();

        }

        /*
        Backend Render
        */
        function render_backend() {
            add_filter( 'sirpi_woo_custom_product_template_hover_options', array( $this, 'woo_custom_product_template_hover_options'), 5, 1 );
        }

        /*
        Custom Product Templates - Options
        */
        function woo_custom_product_template_hover_options( $template_options ) {
            array_push( $template_options, $this->setting_args() );
            return $template_options;
        }

        /*
        Setting Group
        */
        function setting_group() {
            return 'hover';
        }

        /*
        Setting Arguments
        */
        function setting_args() {

            $settings                                     =  array ();

            $settings['id']                               =  $this->option_slug;
            $settings['type']                             =  'select';
            $settings['title']                            =  $this->option_name;
            $settings['options']                          =  array (
                ''                                        => esc_html__('None', 'sirpi'),
                'product-hover-fade-border'               => esc_html__('Fade - Border', 'sirpi'),
                'product-hover-fade-skinborder'           => esc_html__('Fade - Skin Border', 'sirpi'),
                'product-hover-fade-gradientborder'       => esc_html__('Fade - Gradient Border', 'sirpi'),
                'product-hover-fade-shadow'               => esc_html__('Fade - Shadow', 'sirpi'),
                'product-hover-fade-inshadow'             => esc_html__('Fade - InShadow', 'sirpi'),
                'product-hover-thumb-fade-border'         => esc_html__('Fade Thumb Border', 'sirpi'),
                'product-hover-thumb-fade-skinborder'     => esc_html__('Fade Thumb SkinBorder', 'sirpi'),
                'product-hover-thumb-fade-gradientborder' => esc_html__('Fade Thumb Gradient Border', 'sirpi'),
                'product-hover-thumb-fade-shadow'         => esc_html__('Fade Thumb Shadow', 'sirpi'),
                'product-hover-thumb-fade-inshadow'       => esc_html__('Fade Thumb InShadow', 'sirpi')
            );
            $settings['default']                          =  $this->option_default_value;

            return $settings;

        }

    }

}

if( !function_exists('sirpi_woo_listing_option_hover_style') ) {
	function sirpi_woo_listing_option_hover_style() {
		return Sirpi_Woo_Listing_Option_Hover_Style::instance();
	}
}

sirpi_woo_listing_option_hover_style();