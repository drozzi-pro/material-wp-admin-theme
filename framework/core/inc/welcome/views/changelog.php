<div class="wrap about-wrap">
    <h1><?php esc_html_e( 'Reduk Framework - Changelog', 'mtrl_framework' ); ?></h1>

    <div class="about-text">
        <?php esc_html_e( 'Our core mantra at Reduk is backwards compatibility. With hundreds of thousands of instances worldwide, you can be assured that we will take care of you and your clients.', 'mtrl_framework' ); ?>
    </div>
    <div class="reduk-badge">
        <i class="el el-reduk"></i>
        <span>
            <?php printf( __( 'Version %s', 'mtrl_framework' ), esc_html(RedukFramework::$_version) ); ?>
        </span>
    </div>

    <?php $this->actions(); ?>
    <?php $this->tabs(); ?>

    <div class="changelog">
        <div class="feature-section">
            <?php echo wp_kses_post($this->parse_readme()); ?>
        </div>
    </div>

</div>