<?php
/**
 * Listing Options - Image Effect
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'Sirpi_Woo_Listing_Option_Thumb_Button_Element_Style' ) ) {

    class Sirpi_Woo_Listing_Option_Thumb_Button_Element_Style extends Sirpi_Woo_Listing_Option_Core {

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

            $this->option_slug          = 'product-thumb-buttonelement-style';
            $this->option_name          = esc_html__('Button Element - Style', 'sirpi');
            $this->option_type          = array ( 'class', 'value-css' );
            $this->option_default_value = 'product-thumb-buttonelement-style-simple';
            $this->option_value_prefix  = 'product-thumb-buttonelement-style-';

            $this->render_backend();
        }

        /**
         * Backend Render
         */
        function render_backend() {
            add_filter( 'sirpi_woo_custom_product_template_thumb_options', array( $this, 'woo_custom_product_template_thumb_options'), 45, 1 );
        }

        /**
         * Custom Product Templates - Options
         */
        function woo_custom_product_template_thumb_options( $template_options ) {

            array_push( $template_options, $this->setting_args() );

            return $template_options;
        }

        /**
         * Settings Group
         */
        function setting_group() {
            return 'thumb';
        }

        /**
         * Setting Args
         */
        function setting_args() {
            $settings            =  array ();
            $settings['id']      =  $this->option_slug;
            $settings['type']    =  'select';
            $settings['title']   =  $this->option_name;
            $settings['options'] =  array (
                'product-thumb-buttonelement-style-simple'                      => esc_html__('Simple', 'sirpi'),
                'product-thumb-buttonelement-style-bgfill-square'               => esc_html__('Background Fill Square', 'sirpi'),
                'product-thumb-buttonelement-style-bgfill-rounded-square'       => esc_html__('Background Fill Rounded Square', 'sirpi'),
                'product-thumb-buttonelement-style-bgfill-rounded'              => esc_html__('Background Fill Rounded', 'sirpi'),
                'product-thumb-buttonelement-style-brdrfill-square'             => esc_html__('Border Fill Square', 'sirpi'),
                'product-thumb-buttonelement-style-brdrfill-rounded-square'     => esc_html__('Border Fill Rounded Square', 'sirpi'),
                'product-thumb-buttonelement-style-brdrfill-rounded'            => esc_html__('Border Fill Rounded', 'sirpi'),
                'product-thumb-buttonelement-style-skinbgfill-square'           => esc_html__('Skin Background Fill Square', 'sirpi'),
                'product-thumb-buttonelement-style-skinbgfill-rounded-square'   => esc_html__('Skin Background Fill Rounded Square', 'sirpi'),
                'product-thumb-buttonelement-style-skinbgfill-rounded'          => esc_html__('Skin Background Fill Rounded', 'sirpi'),
                'product-thumb-buttonelement-style-skinbrdrfill-square'         => esc_html__('Skin Border Fill Square', 'sirpi'),
                'product-thumb-buttonelement-style-skinbrdrfill-rounded-square' => esc_html__('Skin Border Fill Rounded Square', 'sirpi'),
                'product-thumb-buttonelement-style-skinbrdrfill-rounded'        => esc_html__('Skin Border Fill Rounded', 'sirpi')
            );
            $settings['default']    =  $this->option_default_value;

            return $settings;
        }
    }

}

if( !function_exists('sirpi_woo_listing_option_thumb_buttonelement_style') ) {
	function sirpi_woo_listing_option_thumb_buttonelement_style() {
		return Sirpi_Woo_Listing_Option_Thumb_Button_Element_Style::instance();
	}
}

sirpi_woo_listing_option_thumb_buttonelement_style();