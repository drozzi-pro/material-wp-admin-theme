<div class="wrap about-wrap">
    <h1><?php printf( __( 'Welcome to Reduk Framework %s', 'mtrl_framework' ), $this->display_version ); ?></h1>

    <div
        class="about-text"><?php printf( __( 'Thank you for updating to the latest version! Reduk Framework %s is a huge step forward in Reduk Development. Look at all that\'s new.', 'mtrl_framework' ), $this->display_version ); ?></div>
    <div
        class="reduk-badge"><i
            class="el el-reduk"></i><span><?php printf( __( 'Version %s', 'mtrl_framework' ), RedukFramework::$_version ); ?></span>
    </div>

    <?php $this->actions(); ?>
    <?php $this->tabs(); ?>

    <div id="reduk-message" class="updated">
        <h4><?php _e( 'What is Reduk Framework?', 'mtrl_framework' ); ?></h4>

        <p><?php _e( 'Reduk Framework is the core of many products on the web. It is an option framework which developers use to
            enhance their products.', 'mtrl_framework' ); ?></p>

        <p class="submit">
            <a class="button-primary" href="<?php echo 'http://';?>redukframework.com"
               target="_blank"><?php _e( 'Learn More', 'mtrl_framework' ); ?></a>
        </p>
    </div>

    <div class="changelog">

        <h2><?php _e( 'New in this Release', 'mtrl_framework' ); ?></h2>

        <div class="changelog about-integrations">
            <div class="wc-feature feature-section col three-col">
                <div>
                    <h4>Ajax Saving & More Speed!</h4>

                    <p>This version the fastest Reduk ever released. We've integrated ajax_saving as well as many other
                        speed improvements to make Reduk even surpass the load time of <a
                            href="<?php echo 'https://';?>github.com/syamilmj/Options-Framework" target="_blank">SMOF</a> even with
                        large panels.</p>
                </div>
                <div>
                    <h4>The New Reduk API</h4>

                    <p>We've gone back to the drawing boards and made Reduk the <strong>simplest</strong> framework to
                        use. Introducing the Reduk API. Easily add fields, extensions, templates, and more without every
                        having to define a class! <a href="<?php echo 'http://';?>docs.redukframework.com/core/reduk-api/" target="_blank">Learn More</a></p>
                </div>
                <div class="last-feature">
                    <h4>Security Improvments</h4>

                    <p>Thanks to the help of <a href="<?php echo 'http://';?>www.pritect.net/" target="_blank">James Golovich
                            (Pritect)</a>, we have patched varying security flaws in Reduk. This is the most secure
                        version of Reduk yet!</p>
                </div>
            </div>
        </div>
        <div class="changelog">
            <div class="feature-section col three-col">
                <div>
                    <h4>Panel Templates</h4>

                    <p>Now developers can easily customize the Reduk panel by declaring a templates location path. We've
                        also made use of template versioning so if we change anything, you will know. <br /><a href="<?php echo 'http://';?>docs.redukframework.com/core/templates/" target="_blank">Learn More</a></p>
                </div>
                <div>
                    <h4>Full Width for ANY Field</h4>

                    <p>Any field can now be set to full width! Just set the <code>full_width</code> argument and your
                        field will expand to the full width of your panel or metabox.</p>
                </div>
                <div class="last-feature">
                    <h4>Elusive Icons Update</h4>

                    <p>Reduk is now taking over development of Elusive Icons. As a result, we've refreshed our copy of
                        Elusive to the newest version.</p>
                </div>
            </div>
        </div>
    </div>
</div>
