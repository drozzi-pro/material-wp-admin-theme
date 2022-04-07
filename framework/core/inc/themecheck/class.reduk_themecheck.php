<?php
    /**
     * Reduk ThemeCheck
     *
     * @package   RedukFramework
     * @author    Dovy <dovy@reduk.io>
     * @license   GPL-3.0+
     * @link      http://reduk.op
     * @copyright 2015 RedukFramework
     */

    /**
     * Reduk-ThemeCheck class
     *
     * @package Reduk_ThemeCheck
     * @author  Dovy <dovy@reduk.io>
     */
    // Don't duplicate me!
    if ( ! class_exists( 'Reduk_ThemeCheck' ) ) {
        class Reduk_ThemeCheck {

            /**
             * Plugin version, used for cache-busting of style and script file references.
             *
             * @since   1.0.0
             * @var     string
             */
            protected $version = '1.0.0';

            /**
             * Instance of this class.
             *
             * @since    1.0.0
             * @var      object
             */
            protected static $instance = null;

            /**
             * Instance of the Reduk class.
             *
             * @since    1.0.0
             * @var      object
             */
            protected static $reduk = null;

            /**
             * Details of the embedded Reduk class.
             *
             * @since    1.0.0
             * @var      object
             */
            protected static $reduk_details = null;

            /**
             * Slug for various elements.
             *
             * @since   1.0.0
             * @var     string
             */
            protected $slug = 'reduk_themecheck';

            /**
             * Initialize the plugin by setting localization, filters, and administration functions.
             *
             * @since     1.0.0
             */
            private function __construct() {

                if ( ! class_exists( 'ThemeCheckMain' ) ) {
                    return;
                }

                // Load admin style sheet and JavaScript.
                add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_styles' ) );
                add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );

                add_action( 'themecheck_checks_loaded', array( $this, 'disable_checks' ) );
                add_action( 'themecheck_checks_loaded', array( $this, 'add_checks' ) );

            }

            /**
             * Return an instance of this class.
             *
             * @since     1.0.0
             * @return    object    A single instance of this class.
             */
            public static function get_instance() {

                // If the single instance hasn't been set, set it now.
                if ( null == self::$instance ) {
                    self::$instance = new self;
                }

                return self::$instance;
            }

            /**
             * Return an instance of this class.
             *
             * @since     1.0.0
             * @return    object    A single instance of this class.
             */
            public static function get_reduk_instance() {

                // If the single instance hasn't been set, set it now.
                if ( null == self::$reduk && RedukFramework::$_as_plugin ) {
                    self::$reduk = new RedukFramework();
                    self::$reduk->init();
                }

                return self::$reduk;
            }

            /**
             * Return the Reduk path info, if had.
             *
             * @since     1.0.0
             * @return    object    A single instance of this class.
             */
            public static function get_reduk_details( $php_files = array() ) {
                if ( self::$reduk_details === null ) {
                    foreach ( $php_files as $php_key => $phpfile ) {
                        if ( strpos( $phpfile, 'class' . ' RedukFramework {' ) !== false ) {
                            self::$reduk_details               = array(
                                'filename' => strtolower( basename( $php_key ) ),
                                'path'     => $php_key,
                            );
                            self::$reduk_details['dir']        = str_replace( basename( $php_key ), '', $php_key );
                            self::$reduk_details['parent_dir'] = str_replace( basename( self::$reduk_details['dir'] ) . '/', '', self::$reduk_details['dir'] );
                        }
                    }
                }
                if ( self::$reduk_details === null ) {
                    self::$reduk_details = false;
                }

                return self::$reduk_details;
            }

            /**
             * Disable Theme-Check checks that aren't relevant for ThemeForest themes
             *
             * @since    1.0.0
             */
            function disable_checks() {
                global $themechecks;

                //$checks_to_disable = array(
                //	'IncludeCheck',
                //	'I18NCheck',
                //	'AdminMenu',
                //	'Bad_Checks',
                //	'MalwareCheck',
                //	'Theme_Support',
                //	'CustomCheck',
                //	'EditorStyleCheck',
                //	'IframeCheck',
                //);
                //
                //foreach ( $themechecks as $keyindex => $check ) {
                //	if ( $check instanceof themecheck ) {
                //		$check_class = get_class( $check );
                //		if ( in_array( $check_class, $checks_to_disable ) ) {
                //			unset( $themechecks[$keyindex] );
                //		}
                //	}
                //}
            }

            /**
             * Disable Theme-Check checks that aren't relevant for ThemeForest themes
             *
             * @since    1.0.0
             */
            function add_checks() {
                global $themechecks;

                // load all the checks in the checks directory
                $dir = 'checks';
                foreach ( glob( dirname( __FILE__ ) . '/' . $dir . '/*.php' ) as $file ) {
                    require_once $file;
                }
            }

            /**
             * Register and enqueue admin-specific style sheet.
             *
             * @since     1.0.1
             */
            public function enqueue_admin_styles() {
                $screen = get_current_screen();
                if ( 'appearance_page_themecheck' == $screen->id ) {
                    wp_enqueue_style( $this->slug . '-admin-styles', RedukFramework::$_url . 'inc/themecheck/css/admin.css', array(), $this->version );
                }
            }

            /**
             * Register and enqueue admin-specific JavaScript.
             *
             * @since     1.0.1
             */
            public function enqueue_admin_scripts() {

                $screen = get_current_screen();

                if ( 'appearance_page_themecheck' == $screen->id ) {
                    wp_enqueue_script( $this->slug . '-admin-script', RedukFramework::$_url . 'inc/themecheck/js/admin.js', array( 'jquery' ), $this->version );

                    if ( ! isset( $_POST['themename'] ) ) {

                        $intro = '';
                        $intro .= '<h2>Reduk Theme-Check</h2>';
                        $intro .= '<p>Extra checks for Reduk to ensure you\'re ready for marketplace submission to marketplaces.</p>';

                        $reduk_check_intro['text'] = $intro;

                        wp_localize_script( $this->slug . '-admin-script', 'reduk_check_intro', $reduk_check_intro );

                    }
                }

            }
        }

        Reduk_ThemeCheck::get_instance();
    }