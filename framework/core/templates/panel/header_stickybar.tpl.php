<?php
    /**
     * The template for the header sticky bar.
     * Override this template by specifying the path where it is stored (templates_path) in your Reduk config.
     *
     * @author        Reduk Framework
     * @package       RedukFramework/Templates
     * @version:      3.5.7.8
     */
?>
<div id="reduk-sticky">
    <div id="info_bar">

        <a href="javascript:void(0);" class="expand_options<?php echo esc_attr(( $this->parent->args['open_expanded'] ) ? ' expanded' : ''); ?>"<?php echo $this->parent->args['hide_expand'] ? ' style="display: none;"' : '' ?>>
            <?php esc_attr_e( 'Expand', 'mtrl_framework' ); ?>
        </a>

        <div class="reduk-action_bar">
            <span class="spinner"></span>
            <?php if ( false === $this->parent->args['hide_save'] ) { ?>
                <?php submit_button( esc_attr__( 'Save Changes', 'mtrl_framework' ), 'primary', 'reduk_save', false ); ?>
            <?php } ?>
            
            <?php if ( false === $this->parent->args['hide_reset'] ) { ?>
                <?php submit_button( esc_attr__( 'Reset Section', 'mtrl_framework' ), 'secondary', $this->parent->args['opt_name'] . '[defaults-section]', false, array( 'id' => 'reduk-defaults-section' ) ); ?>
                <?php submit_button( esc_attr__( 'Reset All', 'mtrl_framework' ), 'secondary', $this->parent->args['opt_name'] . '[defaults]', false, array( 'id' => 'reduk-defaults' ) ); ?>
            <?php } ?>
        </div>
        <div class="reduk-ajax-loading" alt="<?php esc_attr_e( 'Working...', 'mtrl_framework' ) ?>">&nbsp;</div>
        <div class="clear"></div>
    </div>

    <!-- Notification bar -->
    <div id="reduk_notification_bar">
        <?php $this->notification_bar(); ?>
    </div>


</div>