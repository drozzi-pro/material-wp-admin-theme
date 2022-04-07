<?php

    class Reduk_Full_Package implements themecheck {
        protected $error = array();

        function check( $php_files, $css_files, $other_files ) {

            $ret = true;

            $check = Reduk_ThemeCheck::get_instance();
            $reduk = $check::get_reduk_details( $php_files );

            if ( $reduk ) {

                $blacklist = array(
                    '.tx'                    => __( 'Reduk localization utilities', 'mtrl_framework' ),
                    'bin'                    => __( 'Reduk Resting Diles', 'mtrl_framework' ),
                    'codestyles'             => __( 'Reduk Code Styles', 'mtrl_framework' ),
                    'tests'                  => __( 'Reduk Unit Testing', 'mtrl_framework' ),
                    'class.reduk-plugin.php' => __( 'Reduk Plugin File', 'mtrl_framework' ),
                    'bootstrap_tests.php'    => __( 'Reduk Boostrap Tests', 'mtrl_framework' ),
                    '.travis.yml'            => __( 'CI Testing FIle', 'mtrl_framework' ),
                    'phpunit.xml'            => __( 'PHP Unit Testing', 'mtrl_framework' ),
                );

                $errors = array();

                foreach ( $blacklist as $file => $reason ) {
                    checkcount();
                    if ( file_exists( $reduk['parent_dir'] . $file ) ) {
                        $errors[ $reduk['parent_dir'] . $file ] = $reason;
                    }
                }

                if ( ! empty( $errors ) ) {
                    $error = '<span class="tc-lead tc-required">REQUIRED</span> ' . __( 'It appears that you have embedded the full Reduk package inside your theme. You need only embed the <strong>RedukCore</strong> folder. Embedding anything else will get your rejected from theme submission. Suspected Reduk package file(s):', 'mtrl_framework' );
                    $error .= '<ol>';
                    foreach ( $errors as $key => $e ) {
                        $error .= '<li><strong>' . $e . '</strong>: ' . $key . '</li>';
                    }
                    $error .= '</ol>';
                    $this->error[] = '<div class="reduk-error">' . $error . '</div>';
                    $ret           = false;
                }
            }

            return $ret;
        }

        function getError() {
            return $this->error;
        }
    }

    $themechecks[] = new Reduk_Full_Package();