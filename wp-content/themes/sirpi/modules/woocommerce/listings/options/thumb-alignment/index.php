<?php
/**
 * Listing Options - Image Effect
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if( !class_exists( 'Sirpi_Woo_Listing_Option_Thumb_Alignment' ) ) {

    class Sirpi_Woo_Listing_Option_Thumb_Alignment extends Sirpi_Woo_Listing_Option_Core {

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

            $this->option_slug          = 'product-thumb-alignment';
            $this->option_name          = esc_html__('Alignment', 'sirpi');
            $this->option_type          = array ( 'class', 'value-css' );
            $this->option_default_value = 'product-thumb-alignment-top';
            $this->option_value_prefix  = 'product-thumb-alignment-';

            $this->render_backend();
        }

        /**
         * Backend Render
         */
        function render_backend() {
            add_filter( 'sirpi_woo_custom_product_template_thumb_options', array( $this, 'woo_custom_product_template_thumb_options'), 15, 1 );
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
                'product-thumb-alignment-top'          => esc_html__('Top', 'sirpi'),
                'product-thumb-alignment-top-left'     => esc_html__('Top Left', 'sirpi'),
                'product-thumb-alignment-top-right'    => esc_html__('Top Right', 'sirpi'),
                'product-thumb-alignment-middle'       => esc_html__('Middle', 'sirpi'),
                'product-thumb-alignment-bottom'       => esc_html__('Bottom', 'sirpi'),
                'product-thumb-alignment-bottom-left'  => esc_html__('Bottom Left', 'sirpi'),
                'product-thumb-alignment-bottom-right' => esc_html__('Bottom Right', 'sirpi')
            );
            $settings['default'] =  $this->option_default_value;

            return $settings;
        }
    }

}

if( !function_exists('sirpi_woo_listing_option_thumb_alignment') ) {
	function sirpi_woo_listing_option_thumb_alignment() {
		return Sirpi_Woo_Listing_Option_Thumb_Alignment::instance();
	}
}

sirpi_woo_listing_option_thumb_alignment();