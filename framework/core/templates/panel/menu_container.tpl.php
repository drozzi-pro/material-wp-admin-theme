<?php
/**
 * The template for the menu container of the panel.
 *
 * Override this template by specifying the path where it is stored (templates_path) in your Reduk config.
 *
 * @author 	Reduk Framework
 * @package 	RedukFramework/Templates
 * @version:    3.5.4
 */

?>
<div class="reduk-sidebar">
    <ul class="reduk-group-menu">
<?php
        foreach ( $this->parent->sections as $k => $section ) {
            $title = isset ( $section[ 'title' ] ) ? $section[ 'title' ] : '';

            $skip_sec = false;
            foreach ( $this->parent->hidden_perm_sections as $num => $section_title ) {
                if ( $section_title == $title ) {
                    $skip_sec = true;
                }
            }

            if ( isset ( $section[ 'customizer_only' ] ) && $section[ 'customizer_only' ] == true ) {
                continue;
            }

            if ( false == $skip_sec ) {
                echo $this->parent->section_menu ( $k, $section );
                $skip_sec = false;
            }
        }

        /**
         * action 'reduk-page-after-sections-menu-{opt_name}'
         *
         * @param object $this RedukFramework
         */
        do_action ( "reduk-page-after-sections-menu-{$this->parent->args[ 'opt_name' ]}", $this );

        /**
         * action 'reduk/page/{opt_name}/menu/after'
         *
         * @param object $this RedukFramework
         */
        do_action ( "reduk/page/{$this->parent->args[ 'opt_name' ]}/menu/after", $this );
?>
    </ul>
</div>