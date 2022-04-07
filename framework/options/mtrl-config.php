<?php
    /**
     * RedukFramework Sample Config File
     * For full documentation, please visit: http://docs.redukframework.com/
     */

    if ( ! class_exists( 'Reduk' ) ) {
        return;
    }


    // This is your option name where all the Reduk data is stored.
    $opt_name = "mtrl_demo";



    // If Reduk is running as a plugin, this will remove the demo notice and links
    //add_action( 'reduk/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('reduk/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('reduk/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('reduk/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('reduk/options/' . $opt_name . '/sections', 'dynamic_section');


    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Reduk.
     * For full documentation on arguments, please refer to: https://github.com/RedukFramework/RedukFramework/wiki/Arguments
     * */




            /*ADDED in Material Admin - START */
                // manageoptions and super admin

                $mtrladmin_permissions = mtrl_get_option( "mtrladmin_plugin_access","manage_options");
                if($mtrladmin_permissions == "super_admin" && is_super_admin()){
                    $mtrladmin_permissions = 'manage_options';
                }

                // specific user
                $mtrladmin_userid = mtrl_get_option( "mtrladmin_plugin_userid","");
                if($mtrladmin_permissions == "specific_user" && $mtrladmin_userid == get_current_user_id()){
                    $mtrladmin_permissions = 'read';
                }

                // if plugin is network activated, then hide it from inner sites.
                $menu_type = 'menu';

                if ( ! function_exists( 'is_plugin_active_for_network' ) ){
                    require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
                }

                // Makes sure the plugin is defined before trying to use it
                    if ( is_plugin_active_for_network( 'material-admin/mtrl-core.php' )){
                        if(!is_main_site()){
                            $menu_type = 'hidden';
                        }
                    }


/*ADDED in Material Admin - END*/




    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => __( 'Material Admin', 'mtrl_framework' ),
        // Name that appears at the top of your panel
        'display_version'      =>  '',
        // Version that appears at the top of your panel
        'menu_type'            => $menu_type,
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Material Admin', 'mtrl_framework' ),
        'page_title'           => __( 'Material Admin', 'mtrl_framework' ),
        // You will need to generate a Google API key to use this feature.
        'disable_tracking'         => true,
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => 'mtrladmin',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => false,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => $mtrladmin_permissions,
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '_mtrloptions',
        // Page slug used to denote the panel
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
         'footer_credit'     => '&nbsp;',                   // Disable the footer credit of Reduk. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'system_info'          => false,
        // REMOVE

        //'compiler'             => true,

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'light',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    Reduk::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */
/*
    $tabs = array(
        array(
            'id'      => 'reduk-help-tab-1',
            'title'   => __( 'Theme Information 1', 'mtrl_framework' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'mtrl_framework' )
        ),
        array(
            'id'      => 'reduk-help-tab-2',
            'title'   => __( 'Theme Information 2', 'mtrl_framework' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'mtrl_framework' )
        )
    );
    Reduk::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'mtrl_framework' );
    Reduk::setHelpSidebar( $opt_name, $content );
*/

    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Reduk 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // -> START Basic Fields
            $standard_fonts = array(
                '0' => 'Select Font',
                'Arial, Helvetica, sans-serif' => 'Arial, Helvetica, sans-serif',
                "'Arial Black', Gadget, sans-serif" => "'Arial Black', Gadget, sans-serif",
                "'Bookman Old Style', serif" => "'Bookman Old Style', serif",
                "'Comic Sans MS', cursive" => "'Comic Sans MS', cursive",
                "Courier, monospace" => "Courier, monospace",
                "Garamond, serif" => "Garamond, serif",
                "Georgia, serif" => "Georgia, serif",
                "Impact, Charcoal, sans-serif" => "Impact, Charcoal, sans-serif",
                "'Lucida Console', Monaco, monospace" => "'Lucida Console', Monaco, monospace",
                "'Lucida Sans Unicode', 'Lucida Grande', sans-serif" => "'Lucida Sans Unicode', 'Lucida Grande', sans-serif",
                "'MS Sans Serif', Geneva, sans-serif" => "'MS Sans Serif', Geneva, sans-serif",
                "'MS Serif', 'New York', sans-serif" => "'MS Serif', 'New York', sans-serif",
                "'Palatino Linotype', 'Book Antiqua', Palatino, serif" => "'Palatino Linotype', 'Book Antiqua', Palatino, serif",
                "Tahoma, Geneva, sans-serif" => "Tahoma, Geneva, sans-serif",
                "'Times New Roman', Times, serif" => "'Times New Roman', Times, serif",
                "'Trebuchet MS', Helvetica, sans-serif" => "'Trebuchet MS', Helvetica, sans-serif",
                "Verdana, Geneva, sans-serif" => "Verdana, Geneva, sans-serif"
            );


            $google_fonts = array(
                "0" => "Select Font",
                "ABeeZee" => "ABeeZee",
                "Abel" => "Abel",
                "Abril Fatface" => "Abril Fatface",
                "Aclonica" => "Aclonica",
                "Acme" => "Acme",
                "Actor" => "Actor",
                "Adamina" => "Adamina",
                "Advent Pro" => "Advent Pro",
                "Aguafina Script" => "Aguafina Script",
                "Akronim" => "Akronim",
                "Aladin" => "Aladin",
                "Aldrich" => "Aldrich",
                "Alef" => "Alef",
                "Alegreya" => "Alegreya",
                "Alegreya SC" => "Alegreya SC",
                "Alegreya Sans" => "Alegreya Sans",
                "Alegreya Sans SC" => "Alegreya Sans SC",
                "Alex Brush" => "Alex Brush",
                "Alfa Slab One" => "Alfa Slab One",
                "Alice" => "Alice",
                "Alike" => "Alike",
                "Alike Angular" => "Alike Angular",
                "Allan" => "Allan",
                "Allerta" => "Allerta",
                "Allerta Stencil" => "Allerta Stencil",
                "Allura" => "Allura",
                "Almendra" => "Almendra",
                "Almendra Display" => "Almendra Display",
                "Almendra SC" => "Almendra SC",
                "Amarante" => "Amarante",
                "Amaranth" => "Amaranth",
                "Amatic SC" => "Amatic SC",
                "Amethysta" => "Amethysta",
                "Anaheim" => "Anaheim",
                "Andada" => "Andada",
                "Andika" => "Andika",
                "Angkor" => "Angkor",
                "Annie Use Your Telescope" => "Annie Use Your Telescope",
                "Anonymous Pro" => "Anonymous Pro",
                "Antic" => "Antic",
                "Antic Didone" => "Antic Didone",
                "Antic Slab" => "Antic Slab",
                "Anton" => "Anton",
                "Arapey" => "Arapey",
                "Arbutus" => "Arbutus",
                "Arbutus Slab" => "Arbutus Slab",
                "Architects Daughter" => "Architects Daughter",
                "Archivo Black" => "Archivo Black",
                "Archivo Narrow" => "Archivo Narrow",
                "Arimo" => "Arimo",
                "Arizonia" => "Arizonia",
                "Armata" => "Armata",
                "Artifika" => "Artifika",
                "Arvo" => "Arvo",
                "Asap" => "Asap",
                "Asset" => "Asset",
                "Astloch" => "Astloch",
                "Asul" => "Asul",
                "Atomic Age" => "Atomic Age",
                "Aubrey" => "Aubrey",
                "Audiowide" => "Audiowide",
                "Autour One" => "Autour One",
                "Average" => "Average",
                "Average Sans" => "Average Sans",
                "Averia Gruesa Libre" => "Averia Gruesa Libre",
                "Averia Libre" => "Averia Libre",
                "Averia Sans Libre" => "Averia Sans Libre",
                "Averia Serif Libre" => "Averia Serif Libre",
                "Bad Script" => "Bad Script",
                "Balthazar" => "Balthazar",
                "Bangers" => "Bangers",
                "Basic" => "Basic",
                "Battambang" => "Battambang",
                "Baumans" => "Baumans",
                "Bayon" => "Bayon",
                "Belgrano" => "Belgrano",
                "Belleza" => "Belleza",
                "BenchNine" => "BenchNine",
                "Bentham" => "Bentham",
                "Berkshire Swash" => "Berkshire Swash",
                "Bevan" => "Bevan",
                "Bigelow Rules" => "Bigelow Rules",
                "Bigshot One" => "Bigshot One",
                "Bilbo" => "Bilbo",
                "Bilbo Swash Caps" => "Bilbo Swash Caps",
                "Bitter" => "Bitter",
                "Black Ops One" => "Black Ops One",
                "Bokor" => "Bokor",
                "Bonbon" => "Bonbon",
                "Boogaloo" => "Boogaloo",
                "Bowlby One" => "Bowlby One",
                "Bowlby One SC" => "Bowlby One SC",
                "Brawler" => "Brawler",
                "Bree Serif" => "Bree Serif",
                "Bubblegum Sans" => "Bubblegum Sans",
                "Bubbler One" => "Bubbler One",
                "Buda" => "Buda",
                "Buenard" => "Buenard",
                "Butcherman" => "Butcherman",
                "Butterfly Kids" => "Butterfly Kids",
                "Cabin" => "Cabin",
                "Cabin Condensed" => "Cabin Condensed",
                "Cabin Sketch" => "Cabin Sketch",
                "Caesar Dressing" => "Caesar Dressing",
                "Cagliostro" => "Cagliostro",
                "Calligraffitti" => "Calligraffitti",
                "Cambo" => "Cambo",
                "Candal" => "Candal",
                "Cantarell" => "Cantarell",
                "Cantata One" => "Cantata One",
                "Cantora One" => "Cantora One",
                "Capriola" => "Capriola",
                "Cardo" => "Cardo",
                "Carme" => "Carme",
                "Carrois Gothic" => "Carrois Gothic",
                "Carrois Gothic SC" => "Carrois Gothic SC",
                "Carter One" => "Carter One",
                "Caudex" => "Caudex",
                "Cedarville Cursive" => "Cedarville Cursive",
                "Ceviche One" => "Ceviche One",
                "Changa One" => "Changa One",
                "Chango" => "Chango",
                "Chau Philomene One" => "Chau Philomene One",
                "Chela One" => "Chela One",
                "Chelsea Market" => "Chelsea Market",
                "Chenla" => "Chenla",
                "Cherry Cream Soda" => "Cherry Cream Soda",
                "Cherry Swash" => "Cherry Swash",
                "Chewy" => "Chewy",
                "Chicle" => "Chicle",
                "Chivo" => "Chivo",
                "Cinzel" => "Cinzel",
                "Cinzel Decorative" => "Cinzel Decorative",
                "Clicker Script" => "Clicker Script",
                "Coda" => "Coda",
                "Coda Caption" => "Coda Caption",
                "Codystar" => "Codystar",
                "Combo" => "Combo",
                "Comfortaa" => "Comfortaa",
                "Coming Soon" => "Coming Soon",
                "Concert One" => "Concert One",
                "Condiment" => "Condiment",
                "Content" => "Content",
                "Contrail One" => "Contrail One",
                "Convergence" => "Convergence",
                "Cookie" => "Cookie",
                "Copse" => "Copse",
                "Corben" => "Corben",
                "Courgette" => "Courgette",
                "Cousine" => "Cousine",
                "Coustard" => "Coustard",
                "Covered By Your Grace" => "Covered By Your Grace",
                "Crafty Girls" => "Crafty Girls",
                "Creepster" => "Creepster",
                "Crete Round" => "Crete Round",
                "Crimson Text" => "Crimson Text",
                "Croissant One" => "Croissant One",
                "Crushed" => "Crushed",
                "Cuprum" => "Cuprum",
                "Cutive" => "Cutive",
                "Cutive Mono" => "Cutive Mono",
                "Damion" => "Damion",
                "Dancing Script" => "Dancing Script",
                "Dangrek" => "Dangrek",
                "Dawning of a New Day" => "Dawning of a New Day",
                "Days One" => "Days One",
                "Delius" => "Delius",
                "Delius Swash Caps" => "Delius Swash Caps",
                "Delius Unicase" => "Delius Unicase",
                "Della Respira" => "Della Respira",
                "Denk One" => "Denk One",
                "Devonshire" => "Devonshire",
                "Didact Gothic" => "Didact Gothic",
                "Diplomata" => "Diplomata",
                "Diplomata SC" => "Diplomata SC",
                "Domine" => "Domine",
                "Donegal One" => "Donegal One",
                "Doppio One" => "Doppio One",
                "Dorsa" => "Dorsa",
                "Dosis" => "Dosis",
                "Dr Sugiyama" => "Dr Sugiyama",
                "Droid Sans" => "Droid Sans",
                "Droid Sans Mono" => "Droid Sans Mono",
                "Droid Serif" => "Droid Serif",
                "Duru Sans" => "Duru Sans",
                "Dynalight" => "Dynalight",
                "EB Garamond" => "EB Garamond",
                "Eagle Lake" => "Eagle Lake",
                "Eater" => "Eater",
                "Economica" => "Economica",
                "Electrolize" => "Electrolize",
                "Elsie" => "Elsie",
                "Elsie Swash Caps" => "Elsie Swash Caps",
                "Emblema One" => "Emblema One",
                "Emilys Candy" => "Emilys Candy",
                "Engagement" => "Engagement",
                "Englebert" => "Englebert",
                "Enriqueta" => "Enriqueta",
                "Erica One" => "Erica One",
                "Esteban" => "Esteban",
                "Euphoria Script" => "Euphoria Script",
                "Ewert" => "Ewert",
                "Exo" => "Exo",
                "Exo 2" => "Exo 2",
                "Expletus Sans" => "Expletus Sans",
                "Fanwood Text" => "Fanwood Text",
                "Fascinate" => "Fascinate",
                "Fascinate Inline" => "Fascinate Inline",
                "Faster One" => "Faster One",
                "Fasthand" => "Fasthand",
                "Fauna One" => "Fauna One",
                "Federant" => "Federant",
                "Federo" => "Federo",
                "Felipa" => "Felipa",
                "Fenix" => "Fenix",
                "Finger Paint" => "Finger Paint",
                "Fjalla One" => "Fjalla One",
                "Fjord One" => "Fjord One",
                "Flamenco" => "Flamenco",
                "Flavors" => "Flavors",
                "Fondamento" => "Fondamento",
                "Fontdiner Swanky" => "Fontdiner Swanky",
                "Forum" => "Forum",
                "Francois One" => "Francois One",
                "Freckle Face" => "Freckle Face",
                "Fredericka the Great" => "Fredericka the Great",
                "Fredoka One" => "Fredoka One",
                "Freehand" => "Freehand",
                "Fresca" => "Fresca",
                "Frijole" => "Frijole",
                "Fruktur" => "Fruktur",
                "Fugaz One" => "Fugaz One",
                "GFS Didot" => "GFS Didot",
                "GFS Neohellenic" => "GFS Neohellenic",
                "Gabriela" => "Gabriela",
                "Gafata" => "Gafata",
                "Galdeano" => "Galdeano",
                "Galindo" => "Galindo",
                "Gentium Basic" => "Gentium Basic",
                "Gentium Book Basic" => "Gentium Book Basic",
                "Geo" => "Geo",
                "Geostar" => "Geostar",
                "Geostar Fill" => "Geostar Fill",
                "Germania One" => "Germania One",
                "Gilda Display" => "Gilda Display",
                "Give You Glory" => "Give You Glory",
                "Glass Antiqua" => "Glass Antiqua",
                "Glegoo" => "Glegoo",
                "Gloria Hallelujah" => "Gloria Hallelujah",
                "Goblin One" => "Goblin One",
                "Gochi Hand" => "Gochi Hand",
                "Gorditas" => "Gorditas",
                "Goudy Bookletter 1911" => "Goudy Bookletter 1911",
                "Graduate" => "Graduate",
                "Grand Hotel" => "Grand Hotel",
                "Gravitas One" => "Gravitas One",
                "Great Vibes" => "Great Vibes",
                "Griffy" => "Griffy",
                "Gruppo" => "Gruppo",
                "Gudea" => "Gudea",
                "Habibi" => "Habibi",
                "Hammersmith One" => "Hammersmith One",
                "Hanalei" => "Hanalei",
                "Hanalei Fill" => "Hanalei Fill",
                "Handlee" => "Handlee",
                "Hanuman" => "Hanuman",
                "Happy Monkey" => "Happy Monkey",
                "Headland One" => "Headland One",
                "Henny Penny" => "Henny Penny",
                "Herr Von Muellerhoff" => "Herr Von Muellerhoff",
                "Holtwood One SC" => "Holtwood One SC",
                "Homemade Apple" => "Homemade Apple",
                "Homenaje" => "Homenaje",
                "IM Fell DW Pica" => "IM Fell DW Pica",
                "IM Fell DW Pica SC" => "IM Fell DW Pica SC",
                "IM Fell Double Pica" => "IM Fell Double Pica",
                "IM Fell Double Pica SC" => "IM Fell Double Pica SC",
                "IM Fell English" => "IM Fell English",
                "IM Fell English SC" => "IM Fell English SC",
                "IM Fell French Canon" => "IM Fell French Canon",
                "IM Fell French Canon SC" => "IM Fell French Canon SC",
                "IM Fell Great Primer" => "IM Fell Great Primer",
                "IM Fell Great Primer SC" => "IM Fell Great Primer SC",
                "Iceberg" => "Iceberg",
                "Iceland" => "Iceland",
                "Imprima" => "Imprima",
                "Inconsolata" => "Inconsolata",
                "Inder" => "Inder",
                "Indie Flower" => "Indie Flower",
                "Inika" => "Inika",
                "Irish Grover" => "Irish Grover",
                "Istok Web" => "Istok Web",
                "Italiana" => "Italiana",
                "Italianno" => "Italianno",
                "Jacques Francois" => "Jacques Francois",
                "Jacques Francois Shadow" => "Jacques Francois Shadow",
                "Jim Nightshade" => "Jim Nightshade",
                "Jockey One" => "Jockey One",
                "Jolly Lodger" => "Jolly Lodger",
                "Josefin Sans" => "Josefin Sans",
                "Josefin Slab" => "Josefin Slab",
                "Joti One" => "Joti One",
                "Judson" => "Judson",
                "Julee" => "Julee",
                "Julius Sans One" => "Julius Sans One",
                "Junge" => "Junge",
                "Jura" => "Jura",
                "Just Another Hand" => "Just Another Hand",
                "Just Me Again Down Here" => "Just Me Again Down Here",
                "Kameron" => "Kameron",
                "Kantumruy" => "Kantumruy",
                "Karla" => "Karla",
                "Kaushan Script" => "Kaushan Script",
                "Kavoon" => "Kavoon",
                "Kdam Thmor" => "Kdam Thmor",
                "Keania One" => "Keania One",
                "Kelly Slab" => "Kelly Slab",
                "Kenia" => "Kenia",
                "Khmer" => "Khmer",
                "Kite One" => "Kite One",
                "Knewave" => "Knewave",
                "Kotta One" => "Kotta One",
                "Koulen" => "Koulen",
                "Kranky" => "Kranky",
                "Kreon" => "Kreon",
                "Kristi" => "Kristi",
                "Krona One" => "Krona One",
                "La Belle Aurore" => "La Belle Aurore",
                "Lancelot" => "Lancelot",
                "Lato" => "Lato",
                "League Script" => "League Script",
                "Leckerli One" => "Leckerli One",
                "Ledger" => "Ledger",
                "Lekton" => "Lekton",
                "Lemon" => "Lemon",
                "Libre Baskerville" => "Libre Baskerville",
                "Life Savers" => "Life Savers",
                "Lilita One" => "Lilita One",
                "Lily Script One" => "Lily Script One",
                "Limelight" => "Limelight",
                "Linden Hill" => "Linden Hill",
                "Lobster" => "Lobster",
                "Lobster Two" => "Lobster Two",
                "Londrina Outline" => "Londrina Outline",
                "Londrina Shadow" => "Londrina Shadow",
                "Londrina Sketch" => "Londrina Sketch",
                "Londrina Solid" => "Londrina Solid",
                "Lora" => "Lora",
                "Love Ya Like A Sister" => "Love Ya Like A Sister",
                "Loved by the King" => "Loved by the King",
                "Lovers Quarrel" => "Lovers Quarrel",
                "Luckiest Guy" => "Luckiest Guy",
                "Lusitana" => "Lusitana",
                "Lustria" => "Lustria",
                "Macondo" => "Macondo",
                "Macondo Swash Caps" => "Macondo Swash Caps",
                "Magra" => "Magra",
                "Maiden Orange" => "Maiden Orange",
                "Mako" => "Mako",
                "Marcellus" => "Marcellus",
                "Marcellus SC" => "Marcellus SC",
                "Marck Script" => "Marck Script",
                "Margarine" => "Margarine",
                "Marko One" => "Marko One",
                "Marmelad" => "Marmelad",
                "Marvel" => "Marvel",
                "Mate" => "Mate",
                "Mate SC" => "Mate SC",
                "Maven Pro" => "Maven Pro",
                "McLaren" => "McLaren",
                "Meddon" => "Meddon",
                "MedievalSharp" => "MedievalSharp",
                "Medula One" => "Medula One",
                "Megrim" => "Megrim",
                "Meie Script" => "Meie Script",
                "Merienda" => "Merienda",
                "Merienda One" => "Merienda One",
                "Merriweather" => "Merriweather",
                "Merriweather Sans" => "Merriweather Sans",
                "Metal" => "Metal",
                "Metal Mania" => "Metal Mania",
                "Metamorphous" => "Metamorphous",
                "Metrophobic" => "Metrophobic",
                "Michroma" => "Michroma",
                "Milonga" => "Milonga",
                "Miltonian" => "Miltonian",
                "Miltonian Tattoo" => "Miltonian Tattoo",
                "Miniver" => "Miniver",
                "Miss Fajardose" => "Miss Fajardose",
                "Modern Antiqua" => "Modern Antiqua",
                "Molengo" => "Molengo",
                "Molle" => "Molle",
                "Monda" => "Monda",
                "Monofett" => "Monofett",
                "Monoton" => "Monoton",
                "Monsieur La Doulaise" => "Monsieur La Doulaise",
                "Montaga" => "Montaga",
                "Montez" => "Montez",
                "Montserrat" => "Montserrat",
                "Montserrat Alternates" => "Montserrat Alternates",
                "Montserrat Subrayada" => "Montserrat Subrayada",
                "Moul" => "Moul",
                "Moulpali" => "Moulpali",
                "Mountains of Christmas" => "Mountains of Christmas",
                "Mouse Memoirs" => "Mouse Memoirs",
                "Mr Bedfort" => "Mr Bedfort",
                "Mr Dafoe" => "Mr Dafoe",
                "Mr De Haviland" => "Mr De Haviland",
                "Mrs Saint Delafield" => "Mrs Saint Delafield",
                "Mrs Sheppards" => "Mrs Sheppards",
                "Muli" => "Muli",
                "Mystery Quest" => "Mystery Quest",
                "Neucha" => "Neucha",
                "Neuton" => "Neuton",
                "New Rocker" => "New Rocker",
                "News Cycle" => "News Cycle",
                "Niconne" => "Niconne",
                "Nixie One" => "Nixie One",
                "Nobile" => "Nobile",
                "Nokora" => "Nokora",
                "Norican" => "Norican",
                "Nosifer" => "Nosifer",
                "Nothing You Could Do" => "Nothing You Could Do",
                "Noticia Text" => "Noticia Text",
                "Noto Sans" => "Noto Sans",
                "Noto Serif" => "Noto Serif",
                "Nova Cut" => "Nova Cut",
                "Nova Flat" => "Nova Flat",
                "Nova Mono" => "Nova Mono",
                "Nova Oval" => "Nova Oval",
                "Nova Round" => "Nova Round",
                "Nova Script" => "Nova Script",
                "Nova Slim" => "Nova Slim",
                "Nova Square" => "Nova Square",
                "Numans" => "Numans",
                "Nunito" => "Nunito",
                "Odor Mean Chey" => "Odor Mean Chey",
                "Offside" => "Offside",
                "Old Standard TT" => "Old Standard TT",
                "Oldenburg" => "Oldenburg",
                "Oleo Script" => "Oleo Script",
                "Oleo Script Swash Caps" => "Oleo Script Swash Caps",
                "Open Sans" => "Open Sans",
                "Open Sans Condensed" => "Open Sans Condensed",
                "Oranienbaum" => "Oranienbaum",
                "Orbitron" => "Orbitron",
                "Oregano" => "Oregano",
                "Orienta" => "Orienta",
                "Original Surfer" => "Original Surfer",
                "Oswald" => "Oswald",
                "Over the Rainbow" => "Over the Rainbow",
                "Overlock" => "Overlock",
                "Overlock SC" => "Overlock SC",
                "Ovo" => "Ovo",
                "Oxygen" => "Oxygen",
                "Oxygen Mono" => "Oxygen Mono",
                "PT Mono" => "PT Mono",
                "PT Sans" => "PT Sans",
                "PT Sans Caption" => "PT Sans Caption",
                "PT Sans Narrow" => "PT Sans Narrow",
                "PT Serif" => "PT Serif",
                "PT Serif Caption" => "PT Serif Caption",
                "Pacifico" => "Pacifico",
                "Paprika" => "Paprika",
                "Parisienne" => "Parisienne",
                "Passero One" => "Passero One",
                "Passion One" => "Passion One",
                "Pathway Gothic One" => "Pathway Gothic One",
                "Patrick Hand" => "Patrick Hand",
                "Patrick Hand SC" => "Patrick Hand SC",
                "Patua One" => "Patua One",
                "Paytone One" => "Paytone One",
                "Peralta" => "Peralta",
                "Permanent Marker" => "Permanent Marker",
                "Petit Formal Script" => "Petit Formal Script",
                "Petrona" => "Petrona",
                "Philosopher" => "Philosopher",
                "Piedra" => "Piedra",
                "Pinyon Script" => "Pinyon Script",
                "Pirata One" => "Pirata One",
                "Plaster" => "Plaster",
                "Play" => "Play",
                "Playball" => "Playball",
                "Playfair Display" => "Playfair Display",
                "Playfair Display SC" => "Playfair Display SC",
                "Podkova" => "Podkova",
                "Poiret One" => "Poiret One",
                "Poller One" => "Poller One",
                "Poly" => "Poly",
                "Pompiere" => "Pompiere",
                "Pontano Sans" => "Pontano Sans",
                "Port Lligat Sans" => "Port Lligat Sans",
                "Port Lligat Slab" => "Port Lligat Slab",
                "Prata" => "Prata",
                "Preahvihear" => "Preahvihear",
                "Press Start 2P" => "Press Start 2P",
                "Princess Sofia" => "Princess Sofia",
                "Prociono" => "Prociono",
                "Prosto One" => "Prosto One",
                "Puritan" => "Puritan",
                "Purple Purse" => "Purple Purse",
                "Quando" => "Quando",
                "Quantico" => "Quantico",
                "Quattrocento" => "Quattrocento",
                "Quattrocento Sans" => "Quattrocento Sans",
                "Questrial" => "Questrial",
                "Quicksand" => "Quicksand",
                "Quintessential" => "Quintessential",
                "Qwigley" => "Qwigley",
                "Racing Sans One" => "Racing Sans One",
                "Radley" => "Radley",
                "Raleway" => "Raleway",
                "Raleway Dots" => "Raleway Dots",
                "Rambla" => "Rambla",
                "Rammetto One" => "Rammetto One",
                "Ranchers" => "Ranchers",
                "Rancho" => "Rancho",
                "Rationale" => "Rationale",
                "Redressed" => "Redressed",
                "Reenie Beanie" => "Reenie Beanie",
                "Revalia" => "Revalia",
                "Ribeye" => "Ribeye",
                "Ribeye Marrow" => "Ribeye Marrow",
                "Righteous" => "Righteous",
                "Risque" => "Risque",
                "Roboto" => "Roboto",
                "Roboto Condensed" => "Roboto Condensed",
                "Roboto Slab" => "Roboto Slab",
                "Rochester" => "Rochester",
                "Rock Salt" => "Rock Salt",
                "Rokkitt" => "Rokkitt",
                "Romanesco" => "Romanesco",
                "Ropa Sans" => "Ropa Sans",
                "Rosario" => "Rosario",
                "Rosarivo" => "Rosarivo",
                "Rouge Script" => "Rouge Script",
                "Ruda" => "Ruda",
                "Rufina" => "Rufina",
                "Ruge Boogie" => "Ruge Boogie",
                "Ruluko" => "Ruluko",
                "Rum Raisin" => "Rum Raisin",
                "Ruslan Display" => "Ruslan Display",
                "Russo One" => "Russo One",
                "Ruthie" => "Ruthie",
                "Rye" => "Rye",
                "Sacramento" => "Sacramento",
                "Sail" => "Sail",
                "Salsa" => "Salsa",
                "Sanchez" => "Sanchez",
                "Sancreek" => "Sancreek",
                "Sansita One" => "Sansita One",
                "Sarina" => "Sarina",
                "Satisfy" => "Satisfy",
                "Scada" => "Scada",
                "Schoolbell" => "Schoolbell",
                "Seaweed Script" => "Seaweed Script",
                "Sevillana" => "Sevillana",
                "Seymour One" => "Seymour One",
                "Shadows Into Light" => "Shadows Into Light",
                "Shadows Into Light Two" => "Shadows Into Light Two",
                "Shanti" => "Shanti",
                "Share" => "Share",
                "Share Tech" => "Share Tech",
                "Share Tech Mono" => "Share Tech Mono",
                "Shojumaru" => "Shojumaru",
                "Short Stack" => "Short Stack",
                "Siemreap" => "Siemreap",
                "Sigmar One" => "Sigmar One",
                "Signika" => "Signika",
                "Signika Negative" => "Signika Negative",
                "Simonetta" => "Simonetta",
                "Sintony" => "Sintony",
                "Sirin Stencil" => "Sirin Stencil",
                "Six Caps" => "Six Caps",
                "Skranji" => "Skranji",
                "Slackey" => "Slackey",
                "Smokum" => "Smokum",
                "Smythe" => "Smythe",
                "Sniglet" => "Sniglet",
                "Snippet" => "Snippet",
                "Snowburst One" => "Snowburst One",
                "Sofadi One" => "Sofadi One",
                "Sofia" => "Sofia",
                "Sonsie One" => "Sonsie One",
                "Sorts Mill Goudy" => "Sorts Mill Goudy",
                "Source Code Pro" => "Source Code Pro",
                "Source Sans Pro" => "Source Sans Pro",
                "Special Elite" => "Special Elite",
                "Spicy Rice" => "Spicy Rice",
                "Spinnaker" => "Spinnaker",
                "Spirax" => "Spirax",
                "Squada One" => "Squada One",
                "Stalemate" => "Stalemate",
                "Stalinist One" => "Stalinist One",
                "Stardos Stencil" => "Stardos Stencil",
                "Stint Mtrl Condensed" => "Stint Mtrl Condensed",
                "Stint Mtrl Expanded" => "Stint Mtrl Expanded",
                "Stoke" => "Stoke",
                "Strait" => "Strait",
                "Sue Ellen Francisco" => "Sue Ellen Francisco",
                "Sunshiney" => "Sunshiney",
                "Supermercado One" => "Supermercado One",
                "Suwannaphum" => "Suwannaphum",
                "Swanky and Moo Moo" => "Swanky and Moo Moo",
                "Syncopate" => "Syncopate",
                "Tangerine" => "Tangerine",
                "Taprom" => "Taprom",
                "Tauri" => "Tauri",
                "Telex" => "Telex",
                "Tenor Sans" => "Tenor Sans",
                "Text Me One" => "Text Me One",
                "The Girl Next Door" => "The Girl Next Door",
                "Tienne" => "Tienne",
                "Tinos" => "Tinos",
                "Titan One" => "Titan One",
                "Titillium Web" => "Titillium Web",
                "Trade Winds" => "Trade Winds",
                "Trocchi" => "Trocchi",
                "Trochut" => "Trochut",
                "Trykker" => "Trykker",
                "Tulpen One" => "Tulpen One",
                "Ubuntu" => "Ubuntu",
                "Ubuntu Condensed" => "Ubuntu Condensed",
                "Ubuntu Mono" => "Ubuntu Mono",
                "Mtrl" => "Mtrl",
                "Uncial Antiqua" => "Uncial Antiqua",
                "Underdog" => "Underdog",
                "Unica One" => "Unica One",
                "UnifrakturCook" => "UnifrakturCook",
                "UnifrakturMaguntia" => "UnifrakturMaguntia",
                "Unkempt" => "Unkempt",
                "Unlock" => "Unlock",
                "Unna" => "Unna",
                "VT323" => "VT323",
                "Vampiro One" => "Vampiro One",
                "Varela" => "Varela",
                "Varela Round" => "Varela Round",
                "Vast Shadow" => "Vast Shadow",
                "Vibur" => "Vibur",
                "Vidaloka" => "Vidaloka",
                "Viga" => "Viga",
                "Voces" => "Voces",
                "Volkhov" => "Volkhov",
                "Vollkorn" => "Vollkorn",
                "Voltaire" => "Voltaire",
                "Waiting for the Sunrise" => "Waiting for the Sunrise",
                "Wallpoet" => "Wallpoet",
                "Walter Turncoat" => "Walter Turncoat",
                "Warnes" => "Warnes",
                "Wellfleet" => "Wellfleet",
                "Wendy One" => "Wendy One",
                "Wire One" => "Wire One",
                "Yanone Kaffeesatz" => "Yanone Kaffeesatz",
                "Yellowtail" => "Yellowtail",
                "Yeseva One" => "Yeseva One",
                "Yesteryear" => "Yesteryear",
                "Zeyada" => "Zeyada",
            );


            $more_settings_msg = 'You have chosen an inbuilt theme. One or more setting options in this section are applicable for custom theme only.';

                $modbaseurl = plugins_url('/', __FILE__);
                $modbaseurl = str_replace("framework/options/","",$modbaseurl);

                global $mtrl_color_list;

                foreach($mtrl_color_list as $colorid => $colorname){
                    $mtrl_color_thumbs[$colorid]['title'] = esc_attr($colorname, 'mtrl_framework');
                    $mtrl_color_thumbs[$colorid]['img'] = $modbaseurl . 'images/assets/'.$colorid.'.jpg';
                }



    Reduk::setSection( $opt_name, array(
        'id'         => 'pick-theme',
                'title' => __('Pick Theme', 'mtrl_framework'),
                'icon' => 'el-icon-css',
                'fields' => array(
                   

                    array(
                        'id' => 'dynamic-css-type',
                        'type' => 'image_select',
                        'title' => __('Choose Theme', 'mtrl_framework'),
                        'desc' => __('Select the default themes inbuilt with the plugin or choose custom theme options defined below.', 'mtrl_framework'),
                        'options' => $mtrl_color_thumbs,
                        'default' => 'custom'
                    ),



                    array(
                        'id' => 'primary-color',
                        'type' => 'color',
                        'title' => __('Primary Color of theme', 'mtrl_framework'),
                        'subtitle' => __('Pick primary color for theme.', 'mtrl_framework'),
                        'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'default' => '#3f51b5',
                        'validate' => 'color',
                    ),
                ),
    ) );

    Reduk::setSection( $opt_name, array(
                'title' => __('Layout', 'mtrl_framework'),
                'icon' => 'el-icon-css',
                'fields' => array(
                    array(
                        'id' => 'page-bg',
                        'type' => 'background',
                        'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'title' => __('Page Background', 'mtrl_framework'),
                        'subtitle' => __('Background image, color and settings etc. for admin page', 'mtrl_framework'),
                        'default' => array(
                            'background-color' => '#EEEEEE',
                        )
                    ),
                    array(
                        'id' => 'page-heading-bg',
                        'type' => 'background',
                        'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'title' => __('Page Heading Background', 'mtrl_framework'),
                        'subtitle' => __('Background image, color and settings etc. for page heading bar.', 'mtrl_framework'),
                        'default' => array(
                            'background-color' => '#ffffff',
                        )
                    ),
                    array(
                        'id' => 'heading-color',
                        'type' => 'color',
                        'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'title' => __('Heading Color', 'mtrl_framework'),
                        'subtitle' => __('Pick color for headings and titles in the theme.', 'mtrl_framework'),
                        'default' => '#424242',
                        'validate' => 'color',
                    ),
                    array(
                        'id' => 'body-text-color',
                        'type' => 'color',
                        'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'title' => __('Body Text Color', 'mtrl_framework'),
                        'subtitle' => __('Pick color for page text.', 'mtrl_framework'),
                        'default' => '#757575',
                        'validate' => 'color',
                    ),
                    array(
                        'id' => 'link-color',
                        'type' => 'link_color',
                        'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'title' => __('Anchor/URL Links Color', 'mtrl_framework'),
                        'subtitle' => __('Pick colors for different states of URL links', 'mtrl_framework'),
                        'active' => false, // Disable Active Color
                        'default' => array(
                            'regular' => '#3f51b5',
                            'hover' => '#424242',
                        )
                    ),
                    array(
                        'id' => 'opt1-info-field',
                        'type' => 'info',
                        'desc' => __('Msg: '.$more_settings_msg, 'mtrl_framework'),
                        'required' => array( 'dynamic-css-type', 'not', 'custom' ),
                    ),

                ),
    ) );

    Reduk::setSection( $opt_name, array(
                'title' => __('Typography Fonts', 'mtrl_framework'),
                'icon' => 'el-icon-font',
                'fields' => array(
                    array(
                        'id' => 'google_body',
                        'type' => 'typography',
                        'title' => __('Body Font', 'mtrl_framework'),
                        'subtitle' => __('Specify the body font properties.', 'mtrl_framework'),
                        'google' => true,
                        'font-backup' => true, // Select a backup non-google font in addition to a google font
                        'font-style' => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                        'font-size' => true,
                        'line-height' => true,
                        'text-align' => false,
                        'word-spacing' => true, // Defaults to false
                        'letter-spacing' => true, // Defaults to false
                        'color' => false,
                        'default' => array(
                            'font-family' => 'Roboto',
                            'font-weight' => '400',
                            'font-backup' => "Arial, Helvetica, sans-serif",
                            'font-size' => '14px',
                            'line-height' => '23px',
                        ),
                    ),
                    array(
                        'id' => 'google_nav',
                        'type' => 'typography',
                        'title' => __('Main Menu Font', 'mtrl_framework'),
                        'subtitle' => __('Specify the main menu font properties.', 'mtrl_framework'),
                        'google' => true,
                        'font-backup' => true, // Select a backup non-google font in addition to a google font
                        'font-style' => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                        'font-size' => true,
                        'line-height' => true,
                        'text-align' => false,
                        'word-spacing' => true, // Defaults to false
                        'letter-spacing' => true, // Defaults to false
                        'color' => false,
                        'default' => array(
                            'font-family' => 'Roboto',
                            'font-weight' => '300',
                            'font-backup' => "Arial, Helvetica, sans-serif",
                            'font-size' => '15px',
                            'line-height' => '40px',
                        ),
                    ),
                    array(
                        'id' => 'google_headings',
                        'type' => 'typography',
                        'title' => __('Headings Font', 'mtrl_framework'),
                        'subtitle' => __('Specify the heading font properties.', 'mtrl_framework'),
                        'google' => true,
                        'font-backup' => true, // Select a backup non-google font in addition to a google font
                        'font-style' => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                        'font-size' => false,
                        'line-height' => false,
                        'text-align' => false,
                        'word-spacing' => true, // Defaults to false
                        'letter-spacing' => true, // Defaults to false
                        'color' => false,
                        'default' => array(
                            'font-family' => 'Roboto',
                            'font-weight' => '400',
                            'font-backup' => "Arial, Helvetica, sans-serif"
                        ),
                    ),
                    array(
                        'id' => 'google_button',
                        'type' => 'typography',
                        'title' => __('Button Font', 'mtrl_framework'),
                        'subtitle' => __('Specify the button font properties.', 'mtrl_framework'),
                        'google' => true,
                        'font-backup' => true, // Select a backup non-google font in addition to a google font
                        'font-style' => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                        'font-size' => true,
                        'line-height' => true,
                        'text-align' => false,
                        'word-spacing' => true, // Defaults to false
                        'letter-spacing' => true, // Defaults to false
                        'color' => false,
                        'default' => array(
                            'font-family' => 'Roboto',
                            'font-weight' => '400',
                            'font-backup' => "Arial, Helvetica, sans-serif",
                            'font-size' => '14px',
                            'line-height' => '21px',
                        ),
                    ),
                ),
    ) );

    Reduk::setSection( $opt_name, array(
                'title' => __('Admin Menu', 'mtrl_framework'),
                'icon' => 'el-icon-css',
                'fields' => array(

                    /*array(
                        'id' => 'enable-allusers-mtrladmin',
                        'type' => 'switch',
                        'title' => __('Enable Material Admin Panel for users', 'mtrl_framework'),
                        'desc' => __('Check ON to show Material Admin Settings Panel to all Users, OFF to show only to Admin User.', 'mtrl_framework'),
                        'default' => '0'// 1 = on | 0 = off
                    ),*/


                    array("title" => "Admin Menu Style",
                        "desc" => "Select the main admin menu display style.",
                        "id" => "menu-style",
                        "default" => "style1",
                        "type" => "select",
                        "options" => array('style1' => 'Left Aligned','style2' =>'Centered Menu'),
                    ),

                    array(
                        'id' => 'menu-bg',
                        'type' => 'background',
                        'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'title' => __('Menu Background', 'mtrl_framework'),
                        'subtitle' => __('Background image, color and settings etc. for Admin Menu', 'mtrl_framework'),
                        'default' => array(
                            'background-color' => '#ffffff',
                        )
                    ),
                    array(
                        'id' => 'menu-color',
                        'type' => 'color',
                        'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'title' => __('Menu Text Color', 'mtrl_framework'),
                        'subtitle' => __('Pick link/text color for admin menu.', 'mtrl_framework'),
                        'default' => '#757575',
                        'validate' => 'color',
                    ),
                    array(
                        'id' => 'menu-hover-color',
                        'type' => 'color',
                        'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'title' => __('Menu Hover Text Color', 'mtrl_framework'),
                        'subtitle' => __('Pick link/text color for admin menu on hover.', 'mtrl_framework'),
                        'default' => '#212121',
                        'validate' => 'color',
                    ),
                    array(
                        'id' => 'submenu-color',
                        'type' => 'color',
                        'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'title' => __('SubMenu Text Color', 'mtrl_framework'),
                        'subtitle' => __('Pick link/text color for admin submenu.', 'mtrl_framework'),
                        'default' => '#757575',
                        'validate' => 'color',
                    ),
                    array(
                        'id' => 'menu-primary-bg',
                        'type' => 'color',
                        'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'title' => __('Menu Primary Background Color', 'mtrl_framework'),
                        'subtitle' => __('Pick background color for admin menu. It is the hover or default background color of Menu link', 'mtrl_framework'),
                        'default' => '#eeeeee',
                        'validate' => 'color',
                    ),
                    array(
                        'id' => 'menu-secondary-bg',
                        'type' => 'color',
                        'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'title' => __('Menu Secondary Background Color', 'mtrl_framework'),
                        'subtitle' => __('Pick background color for admin submenu. It is the hover or default background color of Submenu link', 'mtrl_framework'),
                        'default' => '#ffffff',
                        'validate' => 'color',
                    ),
                    array(
                        'id' => 'menu-transform-text',
                        'type' => 'select',
                        'title' => __('Menu Text transform', 'mtrl_framework'),
                        'subtitle' => __('Pick to convert menu item to uppercase, lowercase, capitalize each word or use original.', 'mtrl_framework'),
                        "default" => "capitalize",
                        "options" => array('uppercase' => 'Uppercase','lowercase' =>'Lowercase','capitalize' => 'Capitalize', 'none' => 'Use Original')
                    ),
                    array(
                        'id' => 'opt2-info-field',
                        'type' => 'info',
                        'desc' => __('Msg: '.$more_settings_msg, 'mtrl_framework'),
                        'required' => array( 'dynamic-css-type', 'not', 'custom' ),
                    ),

                ),
    ) );

    Reduk::setSection( $opt_name, array(
                'title' => __('Logo Settings', 'mtrl_framework'),
                'icon' => 'el-icon-star',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields' => array(
                    array(
                        'id' => 'enable-logo',
                        'type' => 'switch',
                        'title' => __('Show Logo', 'mtrl_framework'),
                        'desc' => __('Check ON to show logo in menu and favicon, OFF to disable.', 'mtrl_framework'),
                        'default' => '1'// 1 = on | 0 = off
                    ),

                    array(
                            'id'       => 'logo-url',
                            'type'     => 'text',
                            'title'    => __( 'Logo URL', 'mtrl_framework' ),
                            'subtitle' => __( 'On clicking logo, user will be redirected to this mentioned url.', 'mtrl_framework' ),
                            'validate' => 'url',
                            'default'  => '',
                            //                        'text_hint' => array(
                            //                            'title'     => '',
                            //                            'content'   => 'Please enter a valid <strong>URL</strong> in this field.'
                            //                        )
                    ),

                    array(
                        'id' => 'logo-bg',
                        'type' => 'color',
                        'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'title' => __('Logo Background', 'mtrl_framework'),
                        'subtitle' => __('Background image, color and settings etc. for logo in Admin Menu', 'mtrl_framework'),
                        'default' => 'transparent',
                        'validate' => 'color',
                    ),

                    array(
                        'id' => 'logo',
                        'type' => 'media',
                        'url' => true,
                        'readonly' => false,
                        'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'title' => __('Logo', 'mtrl_framework'),
                        'subtitle' => __('Upload your own logo of 230px (width) * 69px (height)', 'mtrl_framework'),
                        'default' => array('url' => $modbaseurl."images/logo-dark.png")
                    ),
                    array(
                        'id' => 'logo_folded',
                        'type' => 'media',
                        'url' => true,
                        'readonly' => false,
                        'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'title' => __('Collapsed Menu Logo', 'mtrl_framework'),
                        'subtitle' => __('Upload your own logo of 46px (width) * 69px (height)', 'mtrl_framework'),
                        'default' => array('url' => $modbaseurl."images/logo-folded-dark.png")
                    ),


                    array(
                        'id' => 'login-logo',
                        'type' => 'media',
                        'url' => true,
                        'readonly' => false,
                        'title' => __('Login Page Logo', 'mtrl_framework'),
                        'subtitle' => __('Upload your login page logo.', 'mtrl_framework'),
                        'default' => array('url' => $modbaseurl."images/login-logo.png")
                    ),
                    
                    array(
                        'id' => 'favicon',
                        'type' => 'media',
                        'url' => true,
                        'readonly' => false,
                        'compiler' => 'true',
                        'title' => __('Favicon', 'mtrl_framework'),
                        'subtitle' => __('image that will be used as favicon (16px x 16px).', 'mtrl_framework'),
                        'default' => array('url' => $modbaseurl."images/favicon.png")
                    ),
                    array(
                        'id' => 'iphone_icon',
                        'type' => 'media',
                        'readonly' => false,
                        'url' => true,
                        'compiler' => 'true',
                        'title' => __('Apple Iphone Icon', 'mtrl_framework'),
                        'subtitle' => __('Apple Iphone Icon (57px x 57px).', 'mtrl_framework'),
                        'default' => array('url' => $modbaseurl."images/apple-touch-icon-57-precomposed.png")
                    ),
                    array(
                        'id' => 'iphone_icon_retina',
                        'type' => 'media',
                        'url' => true,
                        'readonly' => false,
                        'compiler' => 'true',
                        'title' => __('Apple Iphone Retina Icon', 'mtrl_framework'),
                        'subtitle' => __('Apple Iphone Retina Icon (114px x 114px).', 'mtrl_framework'),
                        'default' => array('url' => $modbaseurl."images/apple-touch-icon-114-precomposed.png")
                    ),
                    array(
                        'id' => 'ipad_icon',
                        'type' => 'media',
                        'url' => true,
                        'readonly' => false,
                        'compiler' => 'true',
                        'title' => __('Apple iPad Icon', 'mtrl_framework'),
                        'subtitle' => __('Apple Iphone Retina Icon (72px x 72px).', 'mtrl_framework'),
                        'default' => array('url' => $modbaseurl."images/apple-touch-icon-72-precomposed.png")
                    ),
                    array(
                        'id' => 'ipad_icon_retina',
                        'type' => 'media',
                        'url' => true,
                        'readonly' => false,
                        'compiler' => 'true',
                        'title' => __('Apple iPad Retina Icon', 'mtrl_framework'),
                        'subtitle' => __('Apple iPad Retina Icon (144px x 144px).', 'mtrl_framework'),
                        'default' => array('url' => $modbaseurl."images/apple-touch-icon-144-precomposed.png")
                    ),
                ),
    ) );

    Reduk::setSection( $opt_name, array(
                'title' => __('Content Box', 'mtrl_framework'),
                'icon' => 'el-icon-css',
                'fields' => array(

                    array(
                        'id' => 'box-bg',
                        'type' => 'background',
                        'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'title' => __('Content Box Background', 'mtrl_framework'),
                        'subtitle' => __('Background image, color and settings etc. for Content Boxes. Eg: Welcome box on dashboard', 'mtrl_framework'),
                        'default' => array(
                            'background-color' => '#ffffff',
                        )
                    ),
                    array(
                        'id' => 'box-head-bg',
                        'type' => 'background',
                        'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'title' => __('Content Box Header Background', 'mtrl_framework'),
                        'subtitle' => __('Background image, color and settings etc. for Content Box Header area. Eg: Welcome box on dashboard', 'mtrl_framework'),
                        'default' => array(
                            'background-color' => '#ffffff',
                        )
                    ),

                    array(
                        'id' => 'box-head-color',
                        'type' => 'color',
                        'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'title' => __('Box Head Text Color', 'mtrl_framework'),
                        'subtitle' => __('Pick text color for content box header area.', 'mtrl_framework'),
                        'default' => '#424242',
                        'validate' => 'color',
                    ),                    
                    array(
                        'id' => 'opt3-info-field',
                        'type' => 'info',
                        'desc' => __('Msg: '.$more_settings_msg, 'mtrl_framework'),
                        'required' => array( 'dynamic-css-type', 'not', 'custom' ),
                    ),
                ),
    ) );

    Reduk::setSection( $opt_name, array(
                'title' => __('Button', 'mtrl_framework'),
                'icon' => 'el-icon-css',
                'fields' => array(
                    array(
                        'id' => 'button-primary-bg',
                        'type' => 'color',
                        'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'title' => __('Primary Button Background Color', 'mtrl_framework'),
                        'subtitle' => __('Pick background color for primary button', 'mtrl_framework'),
                        'default' => '#3f51b5',
                        'validate' => 'color',
                    ),
                    array(
                        'id' => 'button-primary-hover-bg',
                        'type' => 'color',
                        'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'title' => __('Primary Button Hover Background Color', 'mtrl_framework'),
                        'subtitle' => __('Pick hover background color for primary button', 'mtrl_framework'),
                        'default' => '#E91E63',
                        'validate' => 'color',
                    ),
                    array(
                        'id' => 'button-secondary-bg',
                        'type' => 'color',
                        'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'title' => __('Secondary Button Background Color', 'mtrl_framework'),
                        'subtitle' => __('Pick background color for secondary button', 'mtrl_framework'),
                        'default' => '#bdbdbd',
                        'validate' => 'color',
                    ),
                    array(
                        'id' => 'button-secondary-hover-bg',
                        'type' => 'color',
                        'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'title' => __('Secondary Button Hover Background Color', 'mtrl_framework'),
                        'subtitle' => __('Pick hover background color for secondary button', 'mtrl_framework'),
                        'default' => '#9e9e9e',
                        'validate' => 'color',
                    ),
                    array(
                        'id' => 'button-text-color',
                        'type' => 'color',
                        'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'title' => __('Button Text Color', 'mtrl_framework'),
                        'subtitle' => __('Pick text color for a button.', 'mtrl_framework'),
                        'default' => '#ffffff',
                        'validate' => 'color',
                    ),                    
                    array(
                        'id' => 'opt4-info-field',
                        'type' => 'info',
                        'desc' => __('Msg: '.$more_settings_msg, 'mtrl_framework'),
                        'required' => array( 'dynamic-css-type', 'not', 'custom' ),
                    ),

                ),
    ) );

    Reduk::setSection( $opt_name, array(
                'title' => __('Form', 'mtrl_framework'),
                'icon' => 'el-icon-css',
                'fields' => array(

                    array(
                        'id' => 'form-bg',
                        'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'type' => 'color',
                        'title' => __('Form Elements Background Color', 'mtrl_framework'),
                        'subtitle' => __('Pick background color for form elements', 'mtrl_framework'),
                        'default' => 'transparent',
                        'validate' => 'color',
                    ),

                    array(
                        'id' => 'form-text-color',
                        'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'type' => 'color',
                        'title' => __('Form Elements Text Color', 'mtrl_framework'),
                        'subtitle' => __('Pick text color for form elements', 'mtrl_framework'),
                        'default' => '#757575',
                        'validate' => 'color',
                    ),

                    array(
                        'id' => 'form-border-color',
                        'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'type' => 'color',
                        'title' => __('Form Elements Border Color', 'mtrl_framework'),
                        'subtitle' => __('Pick border color for form elements.', 'mtrl_framework'),
                        'default' => '#dedede',
                        'validate' => 'color',
                    ),
                    array(
                        'id' => 'opt5-info-field',
                        'type' => 'info',
                        'desc' => __('Msg: '.$more_settings_msg, 'mtrl_framework'),
                        'required' => array( 'dynamic-css-type', 'not', 'custom' ),
                    ),

                ),
    ) );

    Reduk::setSection( $opt_name, array(
                'title' => __('Login Page', 'mtrl_framework'),
                'icon' => 'el-icon-css',
                'fields' => array(

                    /*array(
                        'id' => 'enable-login',
                        'type' => 'switch',
                        'title' => __('Enable Custom Login Screen', 'mtrl_framework'),
                        'desc' => __('Check ON to show custom login screen. OFF for default WordPress Login Page.', 'mtrl_framework'),
                        'default' => '1'// 1 = on | 0 = off
                    ),*/


                    array(
                        'id' => 'login-background',
                        'tiles' => true,
                        //'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'type' => 'background',
                        'title' => __('Login Page Background', 'mtrl_framework'),
                        'subtitle' => __('Background image, color and settings etc. for login page (Eg: http://www.yourdomain.com/wp-login.php)', 'mtrl_framework'),
                        'preview' => false,
                        'preview_media' => true,
                        'default' => array(
                            'background-color' => '#424242',
                            'background-image' => $modbaseurl."images/login-bg.png",
                            'background-position' => 'center center',
                        )
                    ),
                    
                    array(
                        'id' => 'login-form-background',
                        'tiles' => true,
                       // 'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'type' => 'background',
                        'title' => __('Login Form Box Background', 'mtrl_framework'),
                        'subtitle' => __('Background image, color and settings etc. for login form box', 'mtrl_framework'),
                        'preview' => false,
                        'preview_media' => true,
                        'default' => array(
                            'background-color' => '#424242',
                        )
                    ),
                    
                    array(
                        'id' => 'login-form-bg-opacity',
                        'type' => 'text',
                        'title' => __('Login Form background Opacity', 'mtrl_framework'),
                        'subtitle' => __('Define opacity in range from 0.1 to 1.0. Eg: 0.8', 'mtrl_framework'),
                        'default' => '0.9',
                    ),
                    array(
                        'id' => 'login-logo-background',
                        'tiles' => true,
                        //'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'type' => 'background',
                        'title' => __('Login Logo Box Background', 'mtrl_framework'),
                        'subtitle' => __('Background image, color and settings etc. for desktop view only. For smaller screens (mobile devices) it is set as transparent.', 'mtrl_framework'),
                        'preview' => false,
                        'preview_media' => true,
                        'default' => array(
                            'background-color' => '#e91e63',
                        )
                    ),


                    array(
                        'id' => 'login-text-color',
                        'type' => 'color',
                        //'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'title' => __('Login Page Text color', 'mtrl_framework'),
                        'subtitle' => __('Pick color for login page text.', 'mtrl_framework'),
                        'validate' => 'color',
                        'default' => '#9e9e9e',
                    ),

                    array(
                        'id' => 'login-link-color',
                        'type' => 'link_color',
                       // 'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'title' => __('Login Page Anchor/URL Links Color', 'mtrl_framework'),
                        'subtitle' => __('Pick colors for different states of login page links', 'mtrl_framework'),
                        //'regular'   => false, // Disable Regular Color
                        //'hover'     => false, // Disable Hover Color
                        'active' => false, // Disable Active Color
                        //'visited'   => true,  // Enable Visited Color
                        'default' => array(
                            'regular' => '#9e9e9e',
                            'hover' => '#eeeeee',
                        )
                    ),

                    array(
                        'id' => 'login-input-text-color',
                        'type' => 'color',
                       // 'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'title' => __('Login Input Fields Text color', 'mtrl_framework'),
                        'subtitle' => __('Pick text color for login page input fields.', 'mtrl_framework'),
                        'validate' => 'color',
                        'default' => '#eeeeee', 
                    ),

                    array(
                        'id' => 'login-input-bg-color',
                        'type' => 'color',
                       // 'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'title' => __('Login Input Fields background color', 'mtrl_framework'),
                        'subtitle' => __('Pick background color for login page input fields.', 'mtrl_framework'),
                        'validate' => 'color',
                        'default' => 'transparent',
                    ),
                    array(
                        'id' => 'login-input-bg-opacity',
                        'type' => 'text',
                        'title' => __('Login Input Fields background Opacity', 'mtrl_framework'),
                        'subtitle' => __('Define opacity in range from 0.1 to 1.0. Eg: 0.8', 'mtrl_framework'),
                        'default' => '0.5',
                    ),
                    array(
                        'id' => 'login-input-bg-hover-opacity',
                        'type' => 'text',
                        'title' => __('Login Input Fields Focus/Hover background Opacity', 'mtrl_framework'),
                        'subtitle' => __('Define opacity in range from 0.1 to 1.0. Eg: 0.8', 'mtrl_framework'),
                        'default' => '1',
                    ),


                    array(
                        'id' => 'login-input-border-color',
                        'type' => 'color',
                      //  'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'title' => __('Login Input Fields bottom border color', 'mtrl_framework'),
                        'subtitle' => __('Pick bottom border color for login page input fields.', 'mtrl_framework'),
                        'validate' => 'color',
                        'default' => '#9e9e9e',
                    ),


                    array(
                        'id' => 'login-button-bg',
                        'type' => 'color',
                      //  'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'title' => __('Login Button Background Color', 'mtrl_framework'),
                        'subtitle' => __('Pick background color for login button', 'mtrl_framework'),
                        'default' => '#E91E63',
                        'validate' => 'color',
                    ),
                    array(
                        'id' => 'login-button-hover-bg',
                        'type' => 'color',
                      //  'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'title' => __('Login Button Hover Background Color', 'mtrl_framework'),
                        'subtitle' => __('Pick hover background color for login button', 'mtrl_framework'),
                        'default' => '#D81B60',
                        'validate' => 'color',
                    ),

                    array(
                        'id' => 'login-button-text-color',
                        'type' => 'color',
                      //  'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'title' => __('Login button Text Color', 'mtrl_framework'),
                        'subtitle' => __('Pick text color for a login button.', 'mtrl_framework'),
                        'default' => '#ffffff',
                        'validate' => 'color',
                    ),                    

                    
                    array("title" => "Back to main site Link",
                        "desc" => "Select to show or hide back to main site link on login page.",
                        "id" => "backtosite_login_link",
                        "default" => '1',
                        "type" => "switch"),

                    array("title" => "Forgot Password Link",
                        "desc" => "Select to show or hide Forgot Password link on login page.",
                        "id" => "forgot_login_link",
                        "default" => '1',
                        "type" => "switch"),

                    array(
                        'id' => 'login-logo-title',
                        'type' => 'text',
                        'title' => __('Login Logo Title', 'mtrl_framework'),
                        'subtitle' => __('The title tooltip shown on login logo when mouse is taken over it.', 'mtrl_framework'),
                        'default' => 'Login Page',
                    ),


                    /*array(
                        'id' => 'opt6-info-field',
                        'type' => 'info',
                        'desc' => __('Msg: '.$more_settings_msg, 'mtrl_framework'),
                        'required' => array( 'dynamic-css-type', 'not', 'custom' ),
                    ),*/
                ),
    ) );

    Reduk::setSection( $opt_name, array(
                'title' => __('Admin Top Bar', 'mtrl_framework'),
                'icon' => 'el-icon-css',
                'fields' => array(

                    array(
                        'id' => 'enable-topbar',
                        'type' => 'switch',
                        'title' => __('Enable Admin Top Bar in admin panel', 'mtrl_framework'),
                        'desc' => __('Check ON to show admin panel top bar in the menu, OFF to hide.', 'mtrl_framework'),
                        'default' => '1'// 1 = on | 0 = off
                    ),

                    array(
                        'id' => 'enable-topbar-wp',
                        'type' => 'switch',
                        'title' => __('Enable Top Bar on front End (on website)', 'mtrl_framework'),
                        'desc' => __('Check ON to show admin panel top bar on the website for logged in users, OFF to hide.<br>This option does not change styling of front end top bar.', 'mtrl_framework'),
                        'default' => '1'// 1 = on | 0 = off
                    ),

/*                    array("title" => "Admin Top Bar Style",
                        "desc" => "Select the default style to display the top bar menu.",
                        "id" => "topbar-style",
                        "default" => "style2",
                        "type" => "select",
                        "options" => array('style1' => '100% Width Style','style2' =>'Besides Main Menu'),
                    ),*/

                    array(
                        'id' => 'topbar-menu-color',
                        'type' => 'color',
                        'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'title' => __('Top Bar Menu Text Color', 'mtrl_framework'),
                        'subtitle' => __('Pick link/text color for top bar menu.', 'mtrl_framework'),
                        'default' => '#ffffff',
                        'validate' => 'color',
                    ),


                    array(
                        'id' => 'topbar-menu-bg',
                        'type' => 'background',
                        'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'title' => __('Top Bar Menu Background', 'mtrl_framework'),
                        'subtitle' => __('Background image, color and settings etc. for top bar Menu', 'mtrl_framework'),
                        'default' => array(
                            'background-color' => '#3f51b5',
                        )
                    ),

                    array(
                        'id' => 'topbar-submenu-color',
                        'type' => 'color',
                        'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'title' => __('Top Bar SubMenu Text Color', 'mtrl_framework'),
                        'subtitle' => __('Pick link/text color for top bar submenu.', 'mtrl_framework'),
                        'default' => '#757575',
                        'validate' => 'color',
                    ),
                    array(
                        'id' => 'topbar-submenu-bg',
                        'type' => 'color',
                        'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'title' => __('Top Bar SubMenu Background Color', 'mtrl_framework'),
                        'subtitle' => __('Pick background color for top bar menu. It is the default background color of Menu link', 'mtrl_framework'),
                        'default' => '#ffffff',
                        'validate' => 'color',
                    ),


                    array(
                        'id' => 'topbar-submenu-hover-bg',
                        'type' => 'color',
                        'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'title' => __('Top Bar SubMenu Hover Background Color', 'mtrl_framework'),
                        'subtitle' => __('Pick background color for top bar submenu. It is the hover or focus background color of Submenu link', 'mtrl_framework'),
                        'default' => '#eeeeee',
                        'validate' => 'color',
                    ),

                    array(
                        'id' => 'topbar-submenu-hover-color',
                        'type' => 'color',
                        'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'title' => __('Top Bar SubMenu Hover Text Color', 'mtrl_framework'),
                        'subtitle' => __('Pick text color for top bar submenu on hover. It is the hover or focus text color of Submenu link', 'mtrl_framework'),
                        'default' => '#757575',
                        'validate' => 'color',
                    ),

                    array(
                        'id' => 'enable-topbar-links-wp',
                        'type' => 'switch',
                        'title' => __('Top Bar WordPress Menu', 'mtrl_framework'),
                        'desc' => __('Check ON to show  top bar wordpress menu and submenu links, OFF to hide.', 'mtrl_framework'),
                        'default' => '1'// 1 = on | 0 = off
                    ),


                    array(
                        'id' => 'enable-topbar-links-site',
                        'type' => 'switch',
                        'title' => __('Top Bar Site Menu', 'mtrl_framework'),
                        'desc' => __('Check ON to show  top bar site menu and submenu links, OFF to hide.', 'mtrl_framework'),
                        'default' => '1'// 1 = on | 0 = off
                    ),

                    array(
                        'id' => 'enable-topbar-links-comments',
                        'type' => 'switch',
                        'title' => __('Top Bar Comments link', 'mtrl_framework'),
                        'desc' => __('Check ON to show  top bar comments link, OFF to hide.', 'mtrl_framework'),
                        'default' => '1'// 1 = on | 0 = off
                    ),

                    array(
                        'id' => 'enable-topbar-links-new',
                        'type' => 'switch',
                        'title' => __('Top Bar Add New Menu', 'mtrl_framework'),
                        'desc' => __('Check ON to show  top bar add new menu and submenu links, OFF to hide.', 'mtrl_framework'),
                        'default' => '1'// 1 = on | 0 = off
                    ),

                    array(
                        'id' => 'enable-topbar-links-updates',
                        'type' => 'switch',
                        'title' => __('Top Bar Updates Menu Link', 'mtrl_framework'),
                        'desc' => __('Check ON to show  top bar updates link, OFF to hide.', 'mtrl_framework'),
                        'default' => '1'// 1 = on | 0 = off
                    ),

                    array(
                        'id' => 'enable-topbar-links-mtrladmin',
                        'type' => 'switch',
                        'title' => __('Top Bar Material Admin Menu', 'mtrl_framework'),
                        'desc' => __('Check ON to show  top bar Material Admin menu and submenu links, OFF to hide.', 'mtrl_framework'),
                        'default' => '1'// 1 = on | 0 = off
                    ),


                    array(
                        'id' => 'topbar-removeids',
                        'type' => 'text',
                        'title' => __('Remove Top bar Link Node ids', 'mtrl_framework'),
                        'desc' => __('Enter node ids of link top bar to remove. Separate by comma(,) Eg: new-content,comments', 'mtrl_framework'),
                        'default' => '',
                    ),

                    array(
                        'id' => 'myaccount_greet',
                        'type' => 'text',
                        'title' => __('Greet User with', 'mtrl_framework'),
                        'desc' => __('Enter the greeting word for logged in user. Default is Howdy. Eg: Welcome ', 'mtrl_framework'),
                        'default' => 'Howdy',
                    ),



                    array(
                        'id' => 'opt7-info-field',
                        'type' => 'info',
                        'desc' => __('Msg: '.$more_settings_msg, 'mtrl_framework'),
                        'required' => array( 'dynamic-css-type', 'not', 'custom' ),
                    ),

                ),
    ) );

    Reduk::setSection( $opt_name, array(
                'title' => __('User Profile', 'mtrl_framework'),
                'icon' => 'el-icon-user',
                'fields' => array(


                    array("title" => "User Profile Type",
                        "desc" => "Select the user profile display style.",
                        "id" => "user-profile-style",
                        "default" => "style1",
                        "type" => "radio",
                        "options" => array(
                            'style1' => 'User Profile in Menu',
                            'style2' =>'Default User Profile in Top Bar',
                            'style3' => 'Only Logout Link in Top bar (No user profile)'
                        ),
                    ),


                ),
    ) );


    Reduk::setSection( $opt_name, array(
                'title' => __('Dashboard Widgets', 'mtrl_framework'),
                'icon' => 'el-icon-menu',


                'fields' => array(


                    array(
                        "title" => "Custom Widgets to display on Dashboard",
                        "desc" => "Select the widgets to display on dashboard. These widgets are added by this plugin.",
                        "id" => "dashboard-widgets",
                        "default" => array(
                            "mtrl_visitors_type" => 1,
                            "mtrl_user_type" => 1,
                            "mtrl_browser_type" => 1,
                            "mtrl_platform_type" => 1,
                            "mtrl_country_type" => 1,
                            "mtrl_today_visitors" => 1,
                            "mtrl_pagestats_add_dashboard" => 1,
                            "mtrl_poststats_add_dashboard" => 1,
                            "mtrl_commentstats_add_dashboard" => 1,
                            "mtrl_catstats_add_dashboard" => 1,
                            "mtrl_userstats_add_dashboard" => 1,
                            "mtrl_browser_type" => 1,
                        ),
                        "type" => "checkbox",
                        "options" => array(
                            'mtrl_visitors_type' => 'Visitors in Last 15 days',
                            'mtrl_user_type' =>'Users in last 15 days',
                            'mtrl_browser_type' => 'Browsers Used',
                            'mtrl_platform_type' => 'Platforms Used',
                            'mtrl_country_type' => 'Visits by Country',
                            'mtrl_today_visitors' => 'Today Page Views & Online Users',

                            'mtrl_pagestats_add_dashboard' => 'Pages Count & Type',
                            'mtrl_poststats_add_dashboard' => 'Posts Statistics',
                            'mtrl_commentstats_add_dashboard' => 'User Comments',
                            'mtrl_catstats_add_dashboard' => 'Category Statistics',
                            'mtrl_userstats_add_dashboard' => 'User Statistics',
                        ),
                    ),


                    array("title" => "Select Default Widgets to display on Dashboard",
                        "desc" => "Select the widgets to display on dashboard. This includes default dashboard widgets<br>Some default widgets might not be found in your current wordpress version.",
                        "id" => "dashboard-default-widgets",
                        "default" => "",
                        "type" => "checkbox",
                        "options" => array(
                            'welcome_panel' => 'Welcome Panel',
                            'dashboard_primary' => 'WordPress News',
                            'dashboard_quick_press' => 'Quick Draft',
                            'dashboard_recent_drafts' => 'Recent Drafts',
                            'dashboard_recent_comments' => 'Recent Comments',
                            'dashboard_right_now' => 'At a Glance',
                            'dashboard_activity' => 'Activity',
                            'dashboard_incoming_links' => 'Incoming Links',
                            'dashboard_plugins' => 'Plugins Widget',
                            'dashboard_secondary' => 'Secondary Widget'
                        ),
                    ),
                    
                    array(
                        'id' => 'front-usertracking',
                        'type' => 'switch',
                        'title' => __('Enable User Location Tracking', 'mtrl_framework'),
                        'desc' => __('Check ON to enable user tracking based on IP. This option records user IP, country, city and region etc., OFF to disable.', 'mtrl_framework'),
                        'default' => '1'// 1 = on | 0 = off
                    ),


                    
                    // array(
                    //     "title" => "Dashboard Widgets Color Pallette",
                    //     "desc" => "Enter the valid color values in #HEX format. This colors will be displayed in dashboard widgets.",
                    //     "id" => "dashboard-widget-colors",
                    //     "validate" => "color",
                    //     "default" => array(
                    //        '0' => '#7986CB',
                    //        '1' => '#4dd0e1',
                    //        '2' => '#9575CD',
                    //        '3' => '#4FC3F7',
                    //        '4' => '#64B5F6',
                    //        '5' => '#4DB6AC',
                    //     ),
                    //     "type" => "text",
                    // ),

                    array(
                        'id' => 'dashboard-widget-colors',
                        'type' => 'text',
                        'title' => __('Dashboard Widgets Color Pallette', 'mtrl_framework'),
                        'subtitle' => __('Enter the valid color values in #HEX format separated by comma(,). This colors will be displayed in dashboard widgets. Min. 5 colors needed.', 'mtrl_framework'),
                        'default' => '#7986CB,#4dd0e1,#9575CD,#4FC3F7,#64B5F6,#4DB6AC',
                    ),





                ),
    ) );


    Reduk::setSection( $opt_name, array(
                'title' => __('Floating Menu', 'mtrl_framework'),
                'icon' => 'el-icon-menu',


                'fields' => array(

                    array(
                        'id' => 'floatingmenu-enable',
                        'type' => 'switch',
                        'title' => __('Enable Floating Menu', 'mtrl_framework'),
                        'desc' => __('Check ON to enable floating menu, OFF to disable.', 'mtrl_framework'),
                        'default' => '1'// 1 = on | 0 = off
                    ),



                    /*array(
                        "title" => "Floating Menu Open Effect",
                        "desc" => "Select the opening style for floating menu.",
                        "id" => "floatingmenu-style",
                        "default" => "slidein",
                        "type" => "select",
                        "options" => array(
                            'slidein' => 'Slide In',
                            'zoomin' =>'Zoom In',
                            'slidein-spring' =>'Bounce In',
                            'fountain' =>'Fountatin',
                        ),
                    ),*/


                    array("title" => "Floating Menu Position",
                        "desc" => "Select the position of floating menu.",
                        "id" => "floatingmenu-pos",
                        "default" => "br",
                        "type" => "select",
                        "options" => array(
                            'br' => 'Bottom Right',
                            'bl' =>'Bottom Left',
                            'tr' =>'Top Right',
                            'tl' =>'Top Left',
                            ),
                    ),

                    array(
                        'id' => 'floatingmenu-bg',
                        'type' => 'background',
                        'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'title' => __('Floating Menu Background', 'mtrl_framework'),
                        'subtitle' => __('Background image, color and settings etc. for floating menu', 'mtrl_framework'),
                        'default' => array(
                            'background-color' => '#e91e63',
                        )
                    ),
                    array(
                        'id' => 'floatingmenu-color',
                        'type' => 'color',
                        'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'title' => __('Floating Menu Icon Color', 'mtrl_framework'),
                        'subtitle' => __('Pick color for floating menu icon.', 'mtrl_framework'),
                        'default' => '#ffffff',
                        'validate' => 'color',
                    ),
                    // array(
                    //     'id' => 'floatingmenu-open',
                    //     'title' => __('Floating Menu Open Event', 'mtrl_framework'),
                    //     'desc' => __('Open floating menu on hover or click.', 'mtrl_framework'),
                    //     "default" => "hover",
                    //     "type" => "select",
                    //     "options" => array(
                    //         'hover' => 'Hover',
                    //         'click' =>'Click',
                    //         ),
                    // ),



                    // array(
                    //     "title" => "Floating Menu Links",
                    //     "desc" => "Enter the links you want to show in the floating menu. Eg: Link Title|icon classname|http://sitename/mypagelink.<br>You can also use the keywords in url link. eg: ADMINURL will be replaced with your site admin url.",
                    //     "id" => "floatingmenu-links",
                    //     "default" => array(
                    //        '0' => 'Add New Post | dashicons-before dashicons-admin-post | ADMINURL/post-new.php',
                    //        '1' => 'Add New Page | dashicons-before dashicons-admin-page | ADMINURL/post-new.php?post_type=page',
                    //        '2' => 'Add New User | dashicons-before dashicons-admin-users | ADMINURL/user-new.php',
                    //     ),
                    //     "type" => "multi_text",
                    // ),

                    array(
                        "id" => "floatingmenu-links-1",
                        'type' => 'text',
                        'title' => __('Floating Menu Link 1', 'mtrl_framework'),
                        'subtitle' => __('Enter the links you want to show in the floating menu. Eg: Link Title|icon classname|http://sitename/mypagelink.<br>You can also use the keywords in url link. eg: ADMINURL will be replaced with your site admin url.', 'mtrl_framework'),
                        'default' => 'Add New Post | dashicons-before dashicons-admin-post | ADMINURL/post-new.php',
                    ),

                    array(
                        "id" => "floatingmenu-links-2",
                        'type' => 'text',
                        'title' => __('Floating Menu Link 2', 'mtrl_framework'),
                        'subtitle' => __('Enter the links you want to show in the floating menu. Eg: Link Title|icon classname|http://sitename/mypagelink.<br>You can also use the keywords in url link. eg: ADMINURL will be replaced with your site admin url.', 'mtrl_framework'),
                        'default' => 'Add New Page | dashicons-before dashicons-admin-page | ADMINURL/post-new.php?post_type=page',
                    ),

                    array(
                        "id" => "floatingmenu-links-3",
                        'type' => 'text',
                        'title' => __('Floating Menu Link 3', 'mtrl_framework'),
                        'subtitle' => __('Enter the links you want to show in the floating menu. Eg: Link Title|icon classname|http://sitename/mypagelink.<br>You can also use the keywords in url link. eg: ADMINURL will be replaced with your site admin url.', 'mtrl_framework'),
                        'default' => 'Add New User | dashicons-before dashicons-admin-users | ADMINURL/user-new.php',
                    ),

                    array(
                        "id" => "floatingmenu-links-4",
                        'type' => 'text',
                        'title' => __('Floating Menu Link 4', 'mtrl_framework'),
                        'subtitle' => __('Enter the links you want to show in the floating menu. Eg: Link Title|icon classname|http://sitename/mypagelink.<br>You can also use the keywords in url link. eg: ADMINURL will be replaced with your site admin url.', 'mtrl_framework'),
                        'default' => '',
                    ),

                    array(
                        "id" => "floatingmenu-links-5",
                        'type' => 'text',
                        'title' => __('Floating Menu Link 5', 'mtrl_framework'),
                        'subtitle' => __('Enter the links you want to show in the floating menu. Eg: Link Title|icon classname|http://sitename/mypagelink.<br>You can also use the keywords in url link. eg: ADMINURL will be replaced with your site admin url.', 'mtrl_framework'),
                        'default' => '',
                    ),



                ),
    ) );




    Reduk::setSection( $opt_name, array(
                'title' => __('Page Loader', 'mtrl_framework'),
                'icon' => 'el-icon-css',
                'fields' => array(

                    array(
                        'id' => 'enable-pageloader',
                        'type' => 'switch',
                        'title' => __('Enable Page Loading Top Bar', 'mtrl_framework'),
                        'desc' => __('Check ON to enable progress bar on top, OFF to disable.', 'mtrl_framework'),
                        'default' => '1'// 1 = on | 0 = off
                    ),


                    array(
                        'id' => 'pace-color',
                        'type' => 'color',
                        'title' => __('Page Loader Background Color', 'mtrl_framework'),
                        'subtitle' => __('Pick page loader background color.', 'mtrl_framework'),
                        'required' => array('dynamic-css-type', 'equals', 'custom'),
                        'default' => '#e91e63',
                        'validate' => 'color',
                    ),
                ),
    ) );

    Reduk::setSection( $opt_name, array(
                'title' => __('Smooth Scroll', 'mtrl_framework'),
                'icon' => 'el-icon-css',
                'fields' => array(
                    array(
                        'id' => 'enable-smoothscroll',
                        'type' => 'switch',
                        'title' => __('Enable Smooth Scrolling of Page', 'mtrl_framework'),
                        'desc' => __('Check ON to enable smooth scrolling of window, OFF to disable.', 'mtrl_framework'),
                        'default' => '1'// 1 = on | 0 = off
                    ),


                ),
    ) );


    Reduk::setSection( $opt_name, array(
        'title' => __('Email Settings', 'ultra_framework'),
        'icon' => 'el-icon-css',
        'fields' => array(

            array(
                'id' => 'from-mail-email',
                'type' => 'text',
                'title' => __('From Mail Email Address', 'ultra_framework'),
                'desc' => __('Change the from email address used in an email sent using the wp_mail function. (Default is wordpress@domain.com). Change it to your personal brand or domain name. To avoid being marked as spam make sure the email is from the same domain as your website.', 'ultra_framework'),
                'default' => '',
            ),

            array(
                'id' => 'from-mail-name',
                'type' => 'text',
                'title' => __('From Mail Name', 'ultra_framework'),
                'desc' => __('Change the from name used in an email sent using the wp_mail function. (Default is Wordpress). Change it to your personal brand or domain name.', 'ultra_framework'),
                'default' => '',
            ),



        ),
) );


    Reduk::setSection( $opt_name, array(
                'title' => __('Extra Settings', 'mtrl_framework'),
                'icon' => 'el-icon-css',
                'fields' => array(

                    array("title" => "Footer Text",
                        "desc" => "Enter the text that displays in the footer bar. HTML markup can be used.",
                        "id" => "footer_text",
                        "default" => 'Thank you for creating with <a href="https://wordpress.org/">WordPress</a> and <a target="_blank" href="http://codecanyon.net/user/themepassion/portfolio">Material - White Label WordPress Admin Theme</a>',
                        "type" => "editor"),

                    array("title" => "Footer Version",
                        "desc" => "Select to show WordPress version info in footer area or not.",
                        "id" => "footer_version",
                        "default" => '1',
                        "type" => "switch"),

                    array("title" => "Screen Option Tab",
                        "desc" => "Select to show screen option tab in top right corner of admin screen",
                        "id" => "screen_option_tab",
                        "default" => '1',
                        "type" => "switch"),

                    array("title" => "Screen Help Tab",
                        "desc" => "Select to show screen help tab in top right corner of admin screen",
                        "id" => "screen_help_tab",
                        "default" => '1',
                        "type" => "switch"),

                        array(
                            'id'       => 'custom-css',
                            'type'     => 'ace_editor',
                            'title'    => __( 'Custom Admin Area CSS Code', 'mtrl_framework' ),
                            'subtitle' => __( 'Paste your CSS code here. This code will be applied in all your admin panel', 'mtrl_framework' ),
                            'mode'     => 'css',
                            'theme'    => 'monokai',
                            'desc'     => 'In case if you need to overwrite any CSS setting, you can add !important at the end of CSS property. eg: color: #da2234 !important; 
<br/>
You can use dynamic css variables in custom css code. 
<pre>
Eg:
.css-selector{
    background: var(--tp-primary-color);
    border-color: var(--tp-primary-color);
}
</pre>
Following is the list of defined css variables based on your settings configured.
<pre>
:root {
    --tp-primary-color: #3f51b5;
    --tp-page-bg-background-color: #eeeeee;
    --tp-heading-color: #424242;
    --tp-body-text-color: #757575;
    --tp-link-color-regular: #3f51b5;
    --tp-link-color-hover: #424242;
    --tp-menu-bg-background-color: #ffffff;
    --tp-menu-color: #757575;
    --tp-menu-hover-color: #212121;
    --tp-submenu-color: #757575;
    --tp-menu-primary-bg: #eeeeee;
    --tp-menu-secondary-bg: #ffffff;
    --tp-box-bg-background-color: #ffffff;
    --tp-box-head-bg-background-color: #ffffff;
    --tp-box-head-color: #424242;
    --tp-button-primary-bg: #3f51b5;
    --tp-button-primary-hover-bg: #e91e63;
    --tp-button-secondary-bg: #bdbdbd;
    --tp-button-secondary-hover-bg: #9e9e9e;
    --tp-button-text-color: #ffffff;
    --tp-form-bg: transparent;
    --tp-form-text-color: #757575;
    --tp-form-border-color: #dedede;
    --tp-logo-bg: transparent;
    --tp-topbar-menu-color: #ffffff;
    --tp-topbar-menu-bg-background-color: #3f51b5;
    --tp-topbar-submenu-color: #757575;
    --tp-topbar-submenu-bg: #ffffff;
    --tp-topbar-submenu-hover-bg: #eeeeee;
  }
  
</pre>


                            ',
                            'default'  => ""
                        ),

                        array(
                            'id'       => 'custom-login-css',
                            'type'     => 'ace_editor',
                            'title'    => __( 'Custom Login Page CSS Code', 'mtrl_framework' ),
                            'subtitle' => __( 'Paste your CSS code here. This code will be applied on your admin login page.', 'mtrl_framework' ),
                            'mode'     => 'css',
                            'theme'    => 'monokai',
                            'desc'     => 'In case if you need to overwrite any CSS setting, you can add !important at the end of CSS property. eg: color: #da2234 !important; ',
                            'default'  => ""
                        ),


                    array("title" => "3D Hover Effects - Rise Position",
                        "desc" => "Enable or disable 3D effects rising effect on mouse hover of any element.",
                        "id" => "hover3d_translate",
                        "default" => '1',
                        "type" => "switch"),

                    array("title" => "3D Hover Effects - Shadow",
                        "desc" => "Enable or disable 3D effects shadow on mouse hover of any element.",
                        "id" => "hover3d_shadow",
                        "default" => '1',
                        "type" => "switch"),




                ),
    ) );

    /*
     * <--- END SECTIONS
     */

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'reduk_validate_callback_function' ) ) {
        function reduk_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $return['error'] = $field;
                $field['msg']    = 'your custom error message';
            }

            if ( $warning == true ) {
                $return['warning'] = $field;
                $field['msg']      = 'your custom warning message';
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'reduk_my_custom_field' ) ) {
        function reduk_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    function dynamic_section_delete_mtrl_conflict( $sections ) {
        //$sections = array();
        $sections[] = array(
            'title'  => __( 'Section via hook', 'mtrl_framework' ),
            'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'mtrl_framework' ),
            'icon'   => 'el el-paper-clip',
            // Leave this as a blank section, no options just some intro text set above.
            'fields' => array()
        );

        return $sections;
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    function change_arguments_delete_mtrl_conflict( $args ) {
        //$args['dev_mode'] = true;

        return $args;
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    function change_defaults_delete_mtrl_conflict( $defaults ) {
        $defaults['str_replace'] = 'Testing filter hook!';

        return $defaults;
    }

    // Remove the demo link and the notice of integrated demo from the reduk-framework plugin
    function remove_demo_delete_mtrl_conflict() {

        // Used to hide the demo mode link from the plugin page. Only used when Reduk is a plugin.
        if ( class_exists( 'RedukFrameworkPlugin' ) ) {
            remove_filter( 'plugin_row_meta', array(
                RedukFrameworkPlugin::instance(),
                'plugin_metalinks'
            ), null, 2 );

            // Used to hide the activation notice informing users of the demo panel. Only used when Reduk is a plugin.
            remove_action( 'admin_notices', array( RedukFrameworkPlugin::instance(), 'admin_notices' ) );
        }
    }
