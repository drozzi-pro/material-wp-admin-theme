<?php

    /**
     * Reduk Framework is free software: you can redistribute it and/or modify
     * it under the terms of the GNU General Public License as published by
     * the Free Software Foundation, either version 2 of the License, or
     * any later version.
     * Reduk Framework is distributed in the hope that it will be useful,
     * but WITHOUT ANY WARRANTY; without even the implied warranty of
     * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
     * GNU General Public License for more details.
     * You should have received a copy of the GNU General Public License
     * along with Reduk Framework. If not, see <http://www.gnu.org/licenses/>.
     *
     * @package     RedukFramework
     * @author      Kevin Provance (kprovance)
     * @version     3.0.0
     */

// Exit if accessed directly
    if ( ! defined( 'ABSPATH' ) ) {
        exit;
    }

// Don't duplicate me!
    if ( ! class_exists( 'RedukFramework_extension_vendor_support' ) ) {

        /**
         * Main RedukFramework custom_field extension class
         *
         * @since       3.1.6
         */
        class RedukFramework_extension_vendor_support {

            static $version = "1.0.0";

            /**
             * Class Constructor. Defines the args for the extions class
             *
             * @since       1.0.0
             * @access      public
             *
             * @param       array $sections   Panel sections.
             * @param       array $args       Class constructor arguments.
             * @param       array $extra_tabs Extra panel tabs.
             *
             * @return      void
             */
            public function __construct( $parent = null ) {
                if ( empty( $this->extension_dir ) ) {
                    $this->extension_dir = trailingslashit( str_replace( '\\', '/', dirname( __FILE__ ) ) );
                    $this->extension_url = site_url( str_replace( trailingslashit( str_replace( '\\', '/', ABSPATH ) ), '', $this->extension_dir ) );
                }

                include_once $this->extension_dir . 'class.vendor-url.php';

                Reduk_VendorURL::$dir = $this->extension_dir;
                Reduk_VendorURL::$url = $this->extension_url;
            }
        } // class
    } // if