<div class="theme-offer">
<?php

    function ecommerce_bazaar_create_customizer_nav_menu() {
        // ------- Create Nav Menu --------
        $ecommerce_bazaar_menuname = 'Primary';
        $ecommerce_bazaar_menulocation = 'primary';
        $ecommerce_bazaar_menu_exists = wp_get_nav_menu_object($ecommerce_bazaar_menuname);

        if (!$ecommerce_bazaar_menu_exists) {
            $ecommerce_bazaar_menu_id = wp_create_nav_menu($ecommerce_bazaar_menuname);

            wp_update_nav_menu_item($ecommerce_bazaar_menu_id, 0, array(
                'menu-item-title' => __('Home', 'ecommerce-bazaar'),
                'menu-item-url' => home_url('/'),
                'menu-item-status' => 'publish',
            ));

            wp_update_nav_menu_item($ecommerce_bazaar_menu_id, 0, array(
                'menu-item-title' => __('About Us', 'ecommerce-bazaar'),
                'menu-item-url' => home_url('/index.php/about-us/'),
                'menu-item-status' => 'publish',
            ));

            wp_update_nav_menu_item($ecommerce_bazaar_menu_id, 0, array(
                'menu-item-title' => __('Services', 'ecommerce-bazaar'),
                'menu-item-url' => home_url('/index.php/services/'),
                'menu-item-status' => 'publish',
            ));

            wp_update_nav_menu_item($ecommerce_bazaar_menu_id, 0, array(
                'menu-item-title' => __('Pages', 'ecommerce-bazaar'),
                'menu-item-url' => home_url('/index.php/pages/'),
                'menu-item-status' => 'publish',
            ));

            wp_update_nav_menu_item($ecommerce_bazaar_menu_id, 0, array(
                'menu-item-title' => __('Blog', 'ecommerce-bazaar'),
                'menu-item-url' => home_url('/index.php/blog/'),
                'menu-item-status' => 'publish',
            ));

            // Set menu to location
            $ecommerce_bazaar_locations = get_theme_mod('nav_menu_locations');
            if (!is_array($ecommerce_bazaar_locations)) {
                $ecommerce_bazaar_locations = array();
            }
            $ecommerce_bazaar_locations[$ecommerce_bazaar_menulocation] = $ecommerce_bazaar_menu_id;
            set_theme_mod('nav_menu_locations', $ecommerce_bazaar_locations);
        }
    }

    // POST and update the customizer and other related data of Ecommerce Bazaar
    if (isset($_POST['submit'])) {

        // -------- Plugin Installation and Activation (WooCommerce & Classic Widgets) -------- //
        include_once(ABSPATH . 'wp-admin/includes/plugin.php');
        include_once(ABSPATH . 'wp-admin/includes/plugin-install.php');
        include_once(ABSPATH . 'wp-admin/includes/class-wp-upgrader.php');
        include_once(ABSPATH . 'wp-admin/includes/file.php');
        include_once(ABSPATH . 'wp-admin/includes/misc.php');

        // Plugin list
        $ecommerce_bazaar_plugins = array(
            array(
                'slug' => 'woocommerce',
                'file' => 'woocommerce/woocommerce.php',
                'download_url' => 'https://downloads.wordpress.org/plugin/woocommerce.zip'
            ),
            array(
                'slug' => 'classic-widgets',
                'file' => 'classic-widgets/classic-widgets.php',
                'download_url' => 'https://downloads.wordpress.org/plugin/classic-widgets.zip'
            )
        );

        foreach ($ecommerce_bazaar_plugins as $plugin) {
            $installed_plugins = get_plugins();

            // Install the plugin if it's not installed
            if (!isset($installed_plugins[$plugin['file']])) {
                $upgrader = new Plugin_Upgrader();
                $upgrader->install($plugin['download_url']);
            }

            // Activate the plugin if it's not active
            if (file_exists(WP_PLUGIN_DIR . '/' . $plugin['file']) && !is_plugin_active($plugin['file'])) {
                activate_plugin($plugin['file']);
            }
        }

        // ------- Create Menu --------
        ecommerce_bazaar_create_customizer_nav_menu();

        // ------- Create Pages --------
        function create_demo_page($title, $content = '', $template = '') {
            $page_id = ecommerce_bazaar_get_page_id_by_title($title);
        
            if (!$page_id) {
                $page_data = array(
                    'post_type'    => 'page',
                    'post_title'   => $title,
                    'post_content' => $content,
                    'post_status'  => 'publish',
                    'post_author'  => 1,
                );
        
                $page_id = wp_insert_post($page_data);
        
                if ($template && !is_wp_error($page_id)) {
                    update_post_meta($page_id, '_wp_page_template', $template);
                }
            }
        
            return $page_id;
        }
        

        $ecommerce_bazaar_home_id = create_demo_page('Home', '', 'home/home.php');
        update_option('page_on_front', $ecommerce_bazaar_home_id);
        update_option('show_on_front', 'page');

        create_demo_page('Pages', '<p>Lorem Ipsum ...</p>');
        create_demo_page('About Us', '<p>Lorem Ipsum ...</p>');
        create_demo_page('Services', '<p>Service description...</p>');
        // Create blog page and assign it to display posts
        $blog_page_id = create_demo_page('Blog');
        update_option('page_for_posts', $blog_page_id);

        // Create the nav menu
        ecommerce_bazaar_create_customizer_nav_menu();

        // ------- Set Theme Mods --------
        set_theme_mod('ecommerce_bazaar_header_phone_number', '+1800124124');
        
        set_theme_mod('ecommerce_bazaar_social_media1_heading', 'www.facebook.com');
        set_theme_mod('ecommerce_bazaar_social_media2_heading', 'www.instagram.com');
        set_theme_mod('ecommerce_bazaar_social_media3_heading', 'www.twitter.com');
        set_theme_mod('ecommerce_bazaar_social_media4_heading', 'www.youtube.com');

        // ------- Banner Section --------
        
        set_theme_mod("ecommerce_bazaar_banner_image", get_template_directory_uri() . "/img/banner.png");
        set_theme_mod("ecommerce_bazaar_banner_heading", 'For a Sustainable Products Store');
        set_theme_mod("ecommerce_bazaar_banner_text", 'Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquauis ipsum suspendisse ultrices grawdwvida. Risus commodo viverra maecenas accumsan.');
        set_theme_mod("ecommerce_bazaar_banner_button_link", '#');
         set_theme_mod("ecommerce_bazaar_banner_product_head", 'Upgrade Your Style');

    if ( class_exists( 'WooCommerce' ) ) {

    $category_names = array('Velvet Dress', 'Hiking Boots','Fringe Scarf');
    $category_slugs = array();
    $i = 1;

    foreach ( $category_names as $name ) {
        $slug = sanitize_title( $name );

        // Check if category exists
        $existing_term = term_exists( $slug, 'product_cat' );

        if ( ! $existing_term ) {
            // Create category
            $new_cat = wp_insert_term( $name, 'product_cat', array( 'slug' => $slug ) );
            $term_id = $new_cat['term_id'];
        } else {
            $term_id = is_array( $existing_term ) ? $existing_term['term_id'] : $existing_term;
        }

        // Assign a demo image
        $image_path = get_template_directory() . "/img/prod$i.png"; // Ensure these files exist
        $image_url = get_template_directory_uri() . "/img/prod$i.png";

        if ( file_exists( $image_path ) ) {
            $upload_dir = wp_upload_dir();
            $image_data = file_get_contents( $image_path );
            $filename = basename( $image_path );

            if ( wp_mkdir_p( $upload_dir['path'] ) ) {
                $file = $upload_dir['path'] . '/' . $filename;
            } else {
                $file = $upload_dir['basedir'] . '/' . $filename;
            }

            // Create the image  file on the server
            if ( ! function_exists( 'WP_Filesystem' ) ) {
                require_once( ABSPATH . 'wp-admin/includes/file.php' );
            }
            
            WP_Filesystem();
            global $wp_filesystem;
            
            if ( ! $wp_filesystem->put_contents( $file, $image_data, FS_CHMOD_FILE ) ) {
                wp_die( 'Error saving file!' );
            }

            $wp_filetype = wp_check_filetype( $filename, null );
            $attachment = array(
                'post_mime_type' => $wp_filetype['type'],
                'post_title'     => sanitize_file_name( $filename ),
                'post_content'   => '',
                'post_status'    => 'inherit',
            );

            $attach_id = wp_insert_attachment( $attachment, $file );
            require_once( ABSPATH . 'wp-admin/includes/image.php' );
            $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
            wp_update_attachment_metadata( $attach_id, $attach_data );

            // Set thumbnail ID for category
            update_term_meta( $term_id, 'thumbnail_id', $attach_id );
        }

        // Save slug in theme mod setting
        set_theme_mod( 'ecommerce_bazaar_best_category_name' . $i, $slug );

        $i++;
    }

    // Save total number of categories
    set_theme_mod( 'ecommerce_bazaar_category_number', 3 );
}

    // === Create one product per category ===
    $i = 1;
    foreach ( $category_names as $name ) {
        $slug = sanitize_title( $name );

        // Get category term
        $term = get_term_by( 'slug', $slug, 'product_cat' );
        if ( ! $term ) {
            continue;
        }

        // Check if product exists
        $existing = ecommerce_bazaar_get_page_id_by_title( $name, OBJECT, 'product' );
        if ( $existing ) {
            continue; // Skip if already exists
        }

        // Create product
        $post_id = wp_insert_post( array(
            'post_title'  => $name,
            'post_content'=> 'Demo product for ' . $name,
            'post_status' => 'publish',
            'post_type'   => 'product',
        ) );

        if ( $post_id && ! is_wp_error( $post_id ) ) {
            // Set product type
            wp_set_object_terms( $post_id, 'simple', 'product_type' );

            // Assign category
            wp_set_object_terms( $post_id, array( $term->term_id ), 'product_cat' );

            // Set regular price
            update_post_meta( $post_id, '_regular_price', '29.99' );
            update_post_meta( $post_id, '_price', '29.99' );

            // Set product image
            $image_path = get_template_directory() . "/img/prod$i.png";
            if ( file_exists( $image_path ) ) {
                $upload_dir = wp_upload_dir();
                $image_data = file_get_contents( $image_path );
                $filename = basename( $image_path );

                $file = $upload_dir['path'] . '/' . $filename;
                // Create the image  file on the server
                if ( ! function_exists( 'WP_Filesystem' ) ) {
                    require_once( ABSPATH . 'wp-admin/includes/file.php' );
                }

                WP_Filesystem();
                global $wp_filesystem;

                if ( ! $wp_filesystem->put_contents( $file, $image_data, FS_CHMOD_FILE ) ) {
                    wp_die( 'Error saving file!' );
                }
                $wp_filetype = wp_check_filetype( $filename, null );
                $attachment = array(
                    'post_mime_type' => $wp_filetype['type'],
                    'post_title'     => sanitize_file_name( $filename ),
                    'post_content'   => '',
                    'post_status'    => 'inherit',
                );

                $attach_id = wp_insert_attachment( $attachment, $file, $post_id );
                require_once( ABSPATH . 'wp-admin/includes/image.php' );
                $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
                wp_update_attachment_metadata( $attach_id, $attach_data );

                set_post_thumbnail( $post_id, $attach_id );
            }
        }

        $i++;
    }

        
        // ------- product Section --------
        
        set_theme_mod('ecommerce_bazaar_product_main_heading', 'We Have lots of Categories Product');
        $ecommerce_bazaar_product_category = wp_create_category('home-product'); 
        set_theme_mod('ecommerce_bazaar_product_category', get_cat_name($ecommerce_bazaar_product_category));

        wp_insert_term(
          'home-product', // the term
          'product_cat', // the taxonomy
          array(
          'description'=> '',
          'slug' => 'home-product',
          'term_id'=>12,
          'term_taxonomy_id'=>34,
        ));

    if ( class_exists( 'WooCommerce' ) ) {
      for($i=1;$i<=5;$i++) {
        $title = 'Lorem ipsum is simply';
        $content = 'Lorem ipsum dolor sit amet, tetur piscing elit. Suspendisse smod congue bibendum.';

        // Create post object
        $ecommerce_bazaar_home_product_post = array(
          'post_title'    => wp_strip_all_tags( $title ),
          'post_content'  => $content,
          'post_status'   => 'publish',
          'post_type'     => 'product',
          'product_cat'   => array($ecommerce_bazaar_product_category)
        );

        // Insert the post into the database
        $ecommerce_bazaar_home_product_id = wp_insert_post( $ecommerce_bazaar_home_product_post );


        // Gets term object from Tree in the database.
        $term = get_term_by('name', 'home-product', 'product_cat');
        wp_set_object_terms($ecommerce_bazaar_home_product_id, $term->term_id, 'product_cat');

        update_post_meta( $ecommerce_bazaar_home_product_id, '_price', '$5124' );
        update_post_meta( $ecommerce_bazaar_home_product_id, '_sale_price', "$5124" );
        update_post_meta( $ecommerce_bazaar_home_product_id, '_regular_price', "$5124" );

        $ecommerce_bazaar_home_product_image_url = get_template_directory_uri().'/img/product'.$i.'.png';

      $ecommerce_bazaar_home_product_image_name = 'product'.$i.'.png';
      $ecommerce_bazaar_home_product_upload_dir       = wp_upload_dir(); 
      // Set upload folder
      $ecommerce_bazaar_home_product_image_data       = file_get_contents($ecommerce_bazaar_home_product_image_url); 
       
      // Get image data
      $ecommerce_bazaar_home_product_unique_file_name = wp_unique_filename( $ecommerce_bazaar_home_product_upload_dir['path'], $ecommerce_bazaar_home_product_image_name ); 
      // Generate unique name
      $filename= basename( $ecommerce_bazaar_home_product_unique_file_name ); 
      // Create image file name
      // Check folder permission and define file location
      if( wp_mkdir_p( $ecommerce_bazaar_home_product_upload_dir['path'] ) ) {
          $file = $ecommerce_bazaar_home_product_upload_dir['path'] . '/' . $filename;
      } else {
          $file = $ecommerce_bazaar_home_product_upload_dir['basedir'] . '/' . $filename;
      }
      
      // Create the image  file on the server
        if ( ! function_exists( 'WP_Filesystem' ) ) {
            require_once( ABSPATH . 'wp-admin/includes/file.php' );
        }

        WP_Filesystem();
        global $wp_filesystem;

        if ( ! $wp_filesystem->put_contents( $file, $ecommerce_bazaar_home_product_image_data, FS_CHMOD_FILE ) ) {
            wp_die( 'Error saving file!' );
        }

      $wp_filetype = wp_check_filetype( $filename, null );
      $ecommerce_bazaar_home_product_attachment = array(
          'post_mime_type' => $wp_filetype['type'],
          'post_title'     => sanitize_file_name( $filename ),
          'post_content'   => '',
          'post_type'     => 'product',
          'post_status'    => 'inherit'
      );
      $attach_id = wp_insert_attachment( $ecommerce_bazaar_home_product_attachment, $file, $ecommerce_bazaar_home_product_id );
      require_once(ABSPATH . 'wp-admin/includes/image.php');
      $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
          wp_update_attachment_metadata( $attach_id, $attach_data );
          set_post_thumbnail( $ecommerce_bazaar_home_product_id, $attach_id );
        
      }
    }
        
        echo '<div class="success">Demo Import Successful</div>';
    }
?>

<ul>
    <li>
        <hr>
        <?php if (!isset($_POST['submit'])) : ?>
            <?php echo esc_html__('Click on the below button to get demo content installed.', 'ecommerce-bazaar'); ?>
            <br>
            <form id="demo-importer-form" action="" method="POST" onsubmit="return confirm('Do you really want to do this?');">
                <input class="run-btn" type="submit" name="submit" value="<?php echo esc_attr('Run Importer', 'ecommerce-bazaar'); ?>">
            </form>
        <?php else: ?>
            <div class="visit">
                <a href="<?php echo esc_url(home_url()); ?>" class="button button-primary button-large run-btn" style="margin-top: 10px;" target="_blank">View Site</a>
            </div>
        <?php endif; ?>
        <hr>
    </li>
</ul>
</div>