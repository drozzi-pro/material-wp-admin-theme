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
 * @subpackage  Field_Date
 * @author      Daniel J Griffiths (Ghost1227)
 * @author      Dovy Paukstys
 * @author      Kevin Provance (kprovance)
 * @version     3.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Don't duplicate me!
if ( ! class_exists( 'RedukFramework_date' ) ) {

    /**
     * Main RedukFramework_date class
     *
     * @since       1.0.0
     */
    class RedukFramework_date {

        /**
         * Field Constructor.
         * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
         *
         * @since         1.0.0
         * @access        public
         * @return        void
         */
        function __construct( $field = array(), $value = '', $parent ) {
            $this->parent = $parent;
            $this->field  = $field;
            $this->value  = $value;
        }

        /**
         * Field Render Function.
         * Takes the vars and outputs the HTML for the field in the settings
         *
         * @since         1.0.0
         * @access        public
         * @return        void
         */
        public function render() {
            $placeholder = ( isset( $this->field['placeholder'] ) ) ? ' placeholder="' . esc_attr( $this->field['placeholder'] ) . '" ' : '';

            echo '<input data-id="' . $this->field['id'] . '" type="text" id="' . $this->field['id'] . '-date" name="' . $this->field['name'] . $this->field['name_suffix'] . '"' . $placeholder . 'value="' . $this->value . '" class="reduk-datepicker regular-text ' . $this->field['class'] . '" />';
        }

        /**
         * Enqueue Function.
         * If this field requires any scripts, or css define this function and register/enqueue the scripts/css
         *
         * @since         1.0.0
         * @access        public
         * @return        void
         */
        public function enqueue() {

            if ($this->parent->args['dev_mode']) {
                wp_enqueue_style(
                    'reduk-field-date-css',
                    RedukFramework::$_url . 'inc/fields/date/field_date.css',
                    array(),
                    time(),
                    'all'
                );
            }

            wp_enqueue_script(
                'reduk-field-date-js',
                RedukFramework::$_url . 'inc/fields/date/field_date' . Reduk_Functions::isMin() . '.js',
                array( 'jquery', 'jquery-ui-core', 'jquery-ui-datepicker', 'reduk-js' ),
                time(),
                true
            );
        }
    }
}