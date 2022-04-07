<?php
    /**
     * The template for the panel header area.
     * Override this template by specifying the path where it is stored (templates_path) in your Reduk config.
     *
     * @author      Reduk Framework
     * @package     RedukFramework/Templates
     * @version:    3.5.4.18
     */

    $tip_title = __( 'Developer Mode Enabled', 'mtrl_framework' );

    if ( $this->parent->dev_mode_forced ) {
        $is_debug     = false;
        $is_localhost = false;

        $debug_bit = '';
        if ( Reduk_Helpers::isWpDebug() ) {
            $is_debug  = true;
            $debug_bit = __( 'WP_DEBUG is enabled', 'mtrl_framework' );
        }

        $localhost_bit = '';
        if ( Reduk_Helpers::isLocalHost() ) {
            $is_localhost  = true;
            $localhost_bit = __( 'you are working in a localhost environment', 'mtrl_framework' );
        }

        $conjunction_bit = '';
        if ( $is_localhost && $is_debug ) {
            $conjunction_bit = ' ' . __( 'and', 'mtrl_framework' ) . ' ';
        }

        $tip_msg = __( 'This has been automatically enabled because', 'mtrl_framework' ) . ' ' . $debug_bit . $conjunction_bit . $localhost_bit . '.';
    } else {
        $tip_msg = __( 'If you are not a developer, your theme/plugin author shipped with developer mode enabled. Contact them directly to fix it.', 'mtrl_framework' );
    }

?>
<div id="reduk-header">
    <?php if ( ! empty( $this->parent->args['display_name'] ) ) { ?>
        <div class="display_header">

            <?php if ( isset( $this->parent->args['dev_mode'] ) && $this->parent->args['dev_mode'] ) { ?>
                <?php /* ?><div clas   s="reduk-dev-mode-notice-container reduk-dev-qtip"
                     qtip-title="<?php echo esc_attr( $tip_title ); ?>"
                     qtip-content="<?php echo esc_attr( $tip_msg ); ?>">
                    <span
                        class="reduk-dev-mode-notice"><?php _e( 'Developer Mode Enabled', 'mtrl_framework' ); ?></span>
                </div><?php */ ?>
            <?php } elseif (isset($this->parent->args['forced_dev_mode_off']) && $this->parent->args['forced_dev_mode_off'] == true ) {/* ?>
                <?php $tip_title    = 'The "forced_dev_mode_off" argument has been set to true.'; ?>
                <?php $tip_msg      = 'Support options are not available while this argument is enabled.  You will also need to switch this argument to false before deploying your project.  If you are a user of this product and you are seeing this message, please contact the author of this theme/plugin.'; ?>
                <div class="reduk-dev-mode-notice-container reduk-dev-qtip" 
                     qtip-title="<?php echo esc_attr( $tip_title ); ?>"
                     qtip-content="<?php echo esc_attr( $tip_msg ); ?>">
                    <span
                        class="reduk-dev-mode-notice" style="background-color: #FF001D;"><?php _e( 'FORCED DEV MODE OFF ENABLED', 'mtrl_framework' ); ?></span>
                </div>
            
            <?php */} ?>

            <h2><?php echo wp_kses_post( $this->parent->args['display_name'] ); ?></h2>

            <?php if ( ! empty( $this->parent->args['display_version'] ) ) { ?>
                <span><?php echo wp_kses_post( $this->parent->args['display_version'] ); ?></span>
            <?php } ?>

        </div>
    <?php } ?>

    <div class="clear"></div>
</div>