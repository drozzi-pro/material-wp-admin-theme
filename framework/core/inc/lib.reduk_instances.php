<?php

    /**
     * RedukFrameworkInstances Functions
     *
     * @package     Reduk_Framework
     * @subpackage  Core
     */
    if ( ! function_exists( 'get_reduk_instance' ) ) {

        /**
         * Retreive an instance of RedukFramework
         *
         * @param  string $opt_name the defined opt_name as passed in $args
         *
         * @return object                RedukFramework
         */
        function get_reduk_instance( $opt_name ) {
            return RedukFrameworkInstances::get_instance( $opt_name );
        }
    }

    if ( ! function_exists( 'get_all_reduk_instances' ) ) {

        /**
         * Retreive all instances of RedukFramework
         * as an associative array.
         *
         * @return array        format ['opt_name' => $RedukFramework]
         */
        function get_all_reduk_instances() {
            return RedukFrameworkInstances::get_all_instances();
        }
    }