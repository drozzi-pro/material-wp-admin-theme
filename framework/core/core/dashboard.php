<?php

    if ( ! defined( 'ABSPATH' ) ) {
        exit;
    }
    
    if (!class_exists('redukDashboardWidget')) {
        class redukDashboardWidget {
            
            public function __construct ($parent) {
                $fname = Reduk_Functions::dat( 'add_reduk_dashboard', $parent->args['opt_name'] );

                add_action('wp_dashboard_setup', array($this, $fname));
            }
            
            public function add_reduk_dashboard() {
                add_meta_box('reduk_dashboard_widget', 'Reduk Framework News', array($this,'reduk_dashboard_widget'), 'dashboard', 'side', 'high');
            }
            
            public function dat() {
                return;
            }
            
            public function reduk_dashboard_widget() {
                echo '<div class="rss-widget">';
                wp_widget_rss_output(array(
                     'url'          => 'http://redukframework.com/feed/',
                     'title'        => 'REDUK_NEWS',
                     'items'        => 3,
                     'show_summary' => 1,
                     'show_author'  => 0,
                     'show_date'    => 1
                ));
                echo '</div>';
            }
        }
    }
