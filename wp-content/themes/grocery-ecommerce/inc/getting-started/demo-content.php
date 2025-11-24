<div class="theme-info">
	<?php
        // Check if the demo import has been completed
        $grocery_ecommerce_demo_import_completed = get_option('grocery_ecommerce_demo_import_completed', false);

        // If the demo import is completed, display the "View Site" button
        if ($grocery_ecommerce_demo_import_completed) {
        echo '<p class="notice-text">' . esc_html__('Your demo import has been completed successfully.', 'grocery-ecommerce') . '</p>';
        echo '<span><a href="' . esc_url(home_url()) . '" class="import-btn site-btn" target="_blank">' . esc_html__('VIEW SITE', 'grocery-ecommerce') . '</a></span>';
        echo '<span><a href="' . esc_url( admin_url('customize.php')) . '" class="import-btn site-btn" target="_blank">' . esc_html__('CUSTOMIZE', 'grocery-ecommerce') . '</a></span>';
        }

		//POST and update the customizer and other related data of POLITICAL CAMPAIGN
        if (isset($_POST['submit'])) {

            // Check if woocommerce is installed and activated
            if (!is_plugin_active('woocommerce/woocommerce.php')) {
                // Install the plugin if it doesn't exist
                $grocery_ecommerce_plugin_slug = 'woocommerce';
                $grocery_ecommerce_plugin_file = 'woocommerce/woocommerce.php';

                // Check if plugin is installed
                $grocery_ecommerce_installed_plugins = get_plugins();
                if (!isset($grocery_ecommerce_installed_plugins[$grocery_ecommerce_plugin_file])) {
                    include_once(ABSPATH . 'wp-admin/includes/plugin-install.php');
                    include_once(ABSPATH . 'wp-admin/includes/file.php');
                    include_once(ABSPATH . 'wp-admin/includes/misc.php');
                    include_once(ABSPATH . 'wp-admin/includes/class-wp-upgrader.php');

                    // Install the plugin
                    $grocery_ecommerce_upgrader = new Plugin_Upgrader();
                    $grocery_ecommerce_upgrader->install('https://downloads.wordpress.org/plugin/woocommerce.latest-stable.zip');
                }
                // Activate the plugin
                activate_plugin($grocery_ecommerce_plugin_file);
            }

            // Check if  GTranslate is installed and activated
            if (!is_plugin_active('gtranslate/gtranslate.php')) {
                // Install the plugin if it doesn't exist
                $grocery_ecommerce_plugin_slug = 'gtranslate';
                $grocery_ecommerce_plugin_file = 'gtranslate/gtranslate.php';

                // Check if plugin is installed
                $grocery_ecommerce_installed_plugins = get_plugins();
                if (!isset($grocery_ecommerce_installed_plugins[$grocery_ecommerce_plugin_file])) {
                    include_once(ABSPATH . 'wp-admin/includes/plugin-install.php');
                    include_once(ABSPATH . 'wp-admin/includes/file.php');
                    include_once(ABSPATH . 'wp-admin/includes/misc.php');
                    include_once(ABSPATH . 'wp-admin/includes/class-wp-upgrader.php');

                    // Install the plugin
                    $grocery_ecommerce_upgrader = new Plugin_Upgrader();
                    $grocery_ecommerce_upgrader->install('https://downloads.wordpress.org/plugin/gtranslate.latest-stable.zip');
                }
                // Activate the plugin
                activate_plugin($grocery_ecommerce_plugin_file);
            }

            //Check if  YITH WooCommerce Wishlist is installed and activated
            if (!is_plugin_active('yith-woocommerce-wishlist/yith-woocommerce-wishlist.php')) {       
                // Install the plugin if it doesn't exist
                $grocery_ecommerce_plugin_slug = 'yith-woocommerce-wishlist';
                $grocery_ecommerce_plugin_file = 'yith-woocommerce-wishlist/yith-woocommerce-wishlist.php';

                // Check if plugin is installed
                $grocery_ecommerce_installed_plugins = get_plugins();
                if (!isset($grocery_ecommerce_installed_plugins[$grocery_ecommerce_plugin_file])) {
                include_once(ABSPATH . 'wp-admin/includes/plugin-install.php');
                include_once(ABSPATH . 'wp-admin/includes/file.php');
                include_once(ABSPATH . 'wp-admin/includes/misc.php');
                include_once(ABSPATH . 'wp-admin/includes/class-wp-upgrader.php');

                // Install the plugin
                $grocery_ecommerce_upgrader = new Plugin_Upgrader();
                $grocery_ecommerce_upgrader->install('https://downloads.wordpress.org/plugin/yith-woocommerce-wishlist.latest-stable.zip');
                }

                // Activate the plugin
                activate_plugin($grocery_ecommerce_plugin_file);
            }

            // ------- Create Nav Menu --------
            $grocery_ecommerce_menuname = 'Main Menus';
            $grocery_ecommerce_bpmenulocation = 'primary';
            $grocery_ecommerce_menu_exists = wp_get_nav_menu_object($grocery_ecommerce_menuname);

            if (!$grocery_ecommerce_menu_exists) {
                $grocery_ecommerce_menu_id = wp_create_nav_menu($grocery_ecommerce_menuname);

                // Create Home Page
                $grocery_ecommerce_home_title = 'Home';
                $grocery_ecommerce_home = array(
                    'post_type' => 'page',
                    'post_title' => $grocery_ecommerce_home_title,
                    'post_content' => '',
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_slug' => 'home'
                );
                $grocery_ecommerce_home_id = wp_insert_post($grocery_ecommerce_home);
                // Assign Home Page Template
                add_post_meta($grocery_ecommerce_home_id, '_wp_page_template', 'page-template/custom-front-page.php');
                // Update options to set Home Page as the front page
                update_option('page_on_front', $grocery_ecommerce_home_id);
                update_option('show_on_front', 'page');
                // Add Home Page to Menu
                wp_update_nav_menu_item($grocery_ecommerce_menu_id, 0, array(
                    'menu-item-title' => __('Home', 'grocery-ecommerce'),
                    'menu-item-classes' => 'home',
                    'menu-item-url' => home_url('/'),
                    'menu-item-status' => 'publish',
                    'menu-item-object-id' => $grocery_ecommerce_home_id,
                    'menu-item-object' => 'page',
                    'menu-item-type' => 'post_type'
                ));

                // Create Pages Page with Dummy Content
                $grocery_ecommerce_pages_title = 'Pages';
                $grocery_ecommerce_pages_content = '
                <p>Explore all the pages we have on our website. Find information about our services, company, and more.</p>

                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br> 

                All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
                $grocery_ecommerce_pages = array(
                    'post_type' => 'page',
                    'post_title' => $grocery_ecommerce_pages_title,
                    'post_content' => $grocery_ecommerce_pages_content,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_slug' => 'pages'
                );
                $grocery_ecommerce_pages_id = wp_insert_post($grocery_ecommerce_pages);
                // Add Pages Page to Menu
                wp_update_nav_menu_item($grocery_ecommerce_menu_id, 0, array(
                    'menu-item-title' => __('Pages', 'grocery-ecommerce'),
                    'menu-item-classes' => 'pages',
                    'menu-item-url' => home_url('/pages/'),
                    'menu-item-status' => 'publish',
                    'menu-item-object-id' => $grocery_ecommerce_pages_id,
                    'menu-item-object' => 'page',
                    'menu-item-type' => 'post_type'
                ));

                // Create About Us Page with Dummy Content
                $grocery_ecommerce_about_title = 'About Us';
                $grocery_ecommerce_about_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...<br>

                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br> 

                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text.<br> 

                All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
                $grocery_ecommerce_about = array(
                    'post_type' => 'page',
                    'post_title' => $grocery_ecommerce_about_title,
                    'post_content' => $grocery_ecommerce_about_content,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_slug' => 'about-us'
                );
                $grocery_ecommerce_about_id = wp_insert_post($grocery_ecommerce_about);
                // Add About Us Page to Menu
                wp_update_nav_menu_item($grocery_ecommerce_menu_id, 0, array(
                    'menu-item-title' => __('About Us', 'grocery-ecommerce'),
                    'menu-item-classes' => 'about-us',
                    'menu-item-url' => home_url('/about-us/'),
                    'menu-item-status' => 'publish',
                    'menu-item-object-id' => $grocery_ecommerce_about_id,
                    'menu-item-object' => 'page',
                    'menu-item-type' => 'post_type'
                ));
                // Create Blog Page only if it doesn't exist already
                $grocery_ecommerce_existing_blog_page = get_page_by_path('blog');
                if (!$grocery_ecommerce_existing_blog_page) {
                    $grocery_ecommerce_blog_id = wp_insert_post(array(
                    'post_type'    => 'page',
                    'post_title'   => __('Blog', 'grocery-ecommerce'),
                    'post_content' => '',
                    'post_status'  => 'publish',
                    'post_author'  => 1,
                    'post_name'    => 'blog'
                    ));
                } else {
                    $grocery_ecommerce_blog_id = $grocery_ecommerce_existing_blog_page->ID;
                }
                // Assign as Posts Page
                update_option('page_for_posts', $grocery_ecommerce_blog_id);
                update_option('show_on_front', 'page');
                //Add to Menu (only if not already added)
                $grocery_ecommerce_menu_items = wp_get_nav_menu_items($grocery_ecommerce_menu_id);
                $grocery_ecommerce_blog_in_menu = false;
                if ($grocery_ecommerce_menu_items) {
                    foreach ($grocery_ecommerce_menu_items as $grocery_ecommerce_item) {
                        if ((int) $grocery_ecommerce_item->object_id === (int) $grocery_ecommerce_blog_id) {
                            $grocery_ecommerce_blog_in_menu = true;
                            break;
                        }
                    }
                    }
                if (!$grocery_ecommerce_blog_in_menu) {
                wp_update_nav_menu_item($grocery_ecommerce_menu_id, 0, array(
                    'menu-item-title'       => __('Blog', 'grocery-ecommerce'),
                    'menu-item-url'         => home_url('/blog/'),
                    'menu-item-status'      => 'publish',
                    'menu-item-object-id'   => $grocery_ecommerce_blog_id,
                    'menu-item-object'      => 'page',
                    'menu-item-type'        => 'post_type',
                    'menu-item-classes'     => 'grocery-ecommerce-blog-link'
                ));
                }
                // Create Shop Page only if it doesn't exist already
                $grocery_ecommerce_existing_shop_page = get_page_by_path('shop');
                if (!$grocery_ecommerce_existing_shop_page) {
                $grocery_ecommerce_shop_id = wp_insert_post(array(
                    'post_type'    => 'page',
                    'post_title'   => __('Shop', 'grocery-ecommerce'),
                    'post_content' => '',
                    'post_status'  => 'publish',
                    'post_author'  => 1,
                    'post_name'    => 'shop'
                ));
                } else {
                    $grocery_ecommerce_shop_id = $grocery_ecommerce_existing_shop_page->ID;
                }
                // Assign as WooCommerce Shop Page
                update_option('woocommerce_shop_page_id', $grocery_ecommerce_shop_id);
                // Add to Menu (only if not already added)
                $grocery_ecommerce_menu_items = wp_get_nav_menu_items($grocery_ecommerce_menu_id);
                $grocery_ecommerce_shop_in_menu = false;

                if ($grocery_ecommerce_menu_items) {
                    foreach ($grocery_ecommerce_menu_items as $grocery_ecommerce_item) {
                        if ((int) $grocery_ecommerce_item->object_id === (int) $grocery_ecommerce_shop_id) {
                            $grocery_ecommerce_shop_in_menu = true;
                            break;
                        }
                    }
                }
                if (!$grocery_ecommerce_shop_in_menu) {
                wp_update_nav_menu_item($grocery_ecommerce_menu_id, 0, array(
                    'menu-item-title'       => __('Shop', 'grocery-ecommerce'),
                    'menu-item-url'         => home_url('/shop/'),
                    'menu-item-status'      => 'publish',
                    'menu-item-object-id'   => $grocery_ecommerce_shop_id,
                    'menu-item-object'      => 'page',
                    'menu-item-type'        => 'post_type',
                    'menu-item-classes'     => 'grocery-ecommerce-shop-link'
                ));
                }
            // Assign the menu to the primary location if not already set
            if ( ! has_nav_menu( $grocery_ecommerce_bpmenulocation ) ) {
                $grocery_ecommerce_locations = get_theme_mod( 'nav_menu_locations' );
                if ( empty( $grocery_ecommerce_locations ) ) {
                    $grocery_ecommerce_locations = array();
                }
                $grocery_ecommerce_locations[ $grocery_ecommerce_bpmenulocation ] = $grocery_ecommerce_menu_id;
                set_theme_mod( 'nav_menu_locations', $grocery_ecommerce_locations );
            }
        
                // Set the menu location if it's not already set
                if (!has_nav_menu($grocery_ecommerce_bpmenulocation)) {
                    $grocery_ecommerce_locations = get_theme_mod('nav_menu_locations'); // Use 'nav_menu_locations' to get locations array
                    if (empty($grocery_ecommerce_locations)) {
                        $grocery_ecommerce_locations = array();
                    }
                    $grocery_ecommerce_locations[$grocery_ecommerce_bpmenulocation] = $grocery_ecommerce_menu_id;
                    set_theme_mod('nav_menu_locations', $grocery_ecommerce_locations);
                }
                
        }    

        // Set the demo import completion flag
        update_option('grocery_ecommerce_demo_import_completed', true);
        // Display success message and "View Site" button
        echo '<p class="notice-text">' . esc_html__('Your demo import has been completed successfully.', 'grocery-ecommerce') . '</p>';
        echo '<span><a href="' . esc_url(home_url()) . '" class="import-btn site-btn" target="_blank">' . esc_html__('VIEW SITE', 'grocery-ecommerce') . '</a></span>';
        echo '<span><a href="' . esc_url( admin_url('customize.php')) . '" class="import-btn site-btn" target="_blank">' . esc_html__('CUSTOMIZE', 'grocery-ecommerce') . '</a></span>';
        //end 

        //Topbar
        set_theme_mod( 'grocery_ecommerce_order_text', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry' );
        set_theme_mod( 'grocery_ecommerce_cashback_text', '20% Cashback for all users | Code: GroBasket20' );
        set_theme_mod( 'grocery_ecommerce_call', '+1 123 456 7890' );

        //Header
        set_theme_mod( 'grocery_ecommerce_topbar_button_text', 'READ MORE' );
        set_theme_mod( 'grocery_ecommerce_topbar_button_link', '#' );
        set_theme_mod( 'grocery_ecommerce_top_header', true );

        //Slider Section
        set_theme_mod( 'grocery_ecommerce_show_slider', true );
        set_theme_mod( 'grocery_ecommerce_slider_button_label', 'READ MORE' );
        set_theme_mod( 'grocery_ecommerce_slider_button_link', '#' );

        $grocery_ecommerce_slider_titles = array(
            'Fresh Grocery Shopping',       
            'Healthy Eating Made Easy',      
            'Your Favorite Grocery Store', 
            'Fresh and Clean Veggies Anytime' 
        );

        for ($grocery_ecommerce_i = 1; $grocery_ecommerce_i <= 4; $grocery_ecommerce_i++) {
            // Select a title from the array based on the current iteration
            $grocery_ecommerce_slider_title = $grocery_ecommerce_slider_titles[($grocery_ecommerce_i - 1) % count($grocery_ecommerce_slider_titles)]; // Cycle through titles
            $grocery_ecommerce_slider_content = 'Lorem Ipsum is simply dummy text of the printing industry';

            // Create post object
            $grocery_ecommerce_my_post = array(
                'post_title'    => wp_strip_all_tags($grocery_ecommerce_slider_title),
                'post_content'  => $grocery_ecommerce_slider_content,
                'post_status'   => 'publish',
                'post_type'     => 'page',
            );

            // Insert the post into the database
            $grocery_ecommerce_post_id = wp_insert_post($grocery_ecommerce_my_post);

            if ($grocery_ecommerce_post_id) {
                // Set the theme mod for the slider page
                set_theme_mod('grocery_ecommerce_slidersettings_page' . $grocery_ecommerce_i, $grocery_ecommerce_post_id);

                // Prepare image URL for each slider
                $grocery_ecommerce_image_url = get_template_directory_uri() . '/images/slider' . $grocery_ecommerce_i . '.png';

                // Handle the image upload and set as featured image
                $grocery_ecommerce_image_id = media_sideload_image($grocery_ecommerce_image_url, $grocery_ecommerce_post_id, null, 'id');

                if (!is_wp_error($grocery_ecommerce_image_id)) {
                    // Set the downloaded image as the post's featured image
                    set_post_thumbnail($grocery_ecommerce_post_id, $grocery_ecommerce_image_id);
                }
            }
        }

        //Product Section

        // Set a future date (e.g., 7 days from now)
        $future_date = date( 'F d Y H:i:s', strtotime( '+8 days' ) );

        set_theme_mod( 'grocery_ecommerce_show_product_section', true );
        set_theme_mod( 'grocery_ecommerce_small_title', 'BEST SELLERS' );
        set_theme_mod( 'grocery_ecommerce_section_title', 'SPECIALS OF THIS WEEK' );
        set_theme_mod( 'grocery_ecommerce_product_timer_text', 'Time Remaining For This Offer' );
        set_theme_mod( 'grocery_ecommerce_product_clock_timer_end', $future_date );

        // Define the First Category
        $grocery_ecommerce_category_name_first = 'Exclusive Product Category';

        // Set theme mod for the first category
        set_theme_mod('grocery_ecommerce_sale_product_category', $grocery_ecommerce_category_name_first);

        // Set product details for the first product
        $grocery_ecommerce_product_details = array(
            'name'           => 'Product Name',  // Product name
            'brand'          => 'Artisan Pizzas Co.',  // Product brand
            'regular_price'  => 23.56,  // Regular price
            'sale_price'     => 18.23,  // Sale price
            'discount'       => '14% Off',  // Discount text
        );

        // Create or retrieve the first product category
        $grocery_ecommerce_category_term = term_exists($grocery_ecommerce_category_name_first, 'product_cat');
        if (!$grocery_ecommerce_category_term) {
            $grocery_ecommerce_category_term = wp_insert_term($grocery_ecommerce_category_name_first, 'product_cat');
            if (is_wp_error($grocery_ecommerce_category_term)) {
                error_log('Error creating category: ' . $grocery_ecommerce_category_term->get_error_message());
                return;
            }
        }
        $grocery_ecommerce_category_id_first = $grocery_ecommerce_category_term['term_id'];

        // Create the first product
        $grocery_ecommerce_product_post = array(
            'post_title'    => wp_strip_all_tags($grocery_ecommerce_product_details['name']),
            'post_content'  => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
            'post_status'   => 'publish',
            'post_type'     => 'product',
        );

        // Insert the product and handle errors
        $grocery_ecommerce_product_id_first = wp_insert_post($grocery_ecommerce_product_post);
        if (is_wp_error($grocery_ecommerce_product_id_first)) {
            error_log('Error creating product: ' . $grocery_ecommerce_product_id_first->get_error_message());
            return;
        }

        // Assign the product to the first category
        wp_set_object_terms($grocery_ecommerce_product_id_first, array($grocery_ecommerce_category_id_first), 'product_cat');

        // Set product pricing and custom meta for the first product
        update_post_meta($grocery_ecommerce_product_id_first, '_regular_price', $grocery_ecommerce_product_details['regular_price']);
        update_post_meta($grocery_ecommerce_product_id_first, '_price', $grocery_ecommerce_product_details['sale_price']);
        update_post_meta($grocery_ecommerce_product_id_first, '_sale_price', $grocery_ecommerce_product_details['sale_price']);
        update_post_meta($grocery_ecommerce_product_id_first, '_product_brand', $grocery_ecommerce_product_details['brand']);
        update_post_meta($grocery_ecommerce_product_id_first, '_product_discount', $grocery_ecommerce_product_details['discount']);

        // Handle the featured image for the first product
        $grocery_ecommerce_image_url_first = get_template_directory_uri() . '/images/product-image.png';
        $grocery_ecommerce_image_id_first = media_sideload_image($grocery_ecommerce_image_url_first, $grocery_ecommerce_product_id_first, null, 'id');
        if (!is_wp_error($grocery_ecommerce_image_id_first)) {
            set_post_thumbnail($grocery_ecommerce_product_id_first, $grocery_ecommerce_image_id_first);
        } else {
            error_log('Error downloading image: ' . $grocery_ecommerce_image_id_first->get_error_message());
        }

        // Define the second category
        $grocery_ecommerce_category_name_second = 'Product Category';

        // Set theme mod for the second category
        set_theme_mod('grocery_ecommerce_product_category', $grocery_ecommerce_category_name_second);

        // Define the second product details
        $grocery_ecommerce_products = array(
            array(
                'name'   => 'Product Name 1',  
                'brand'  => 'Artisan Pizzas Co.',
                'price'  => 23.56,
                'image'  => 'product-image1.png',
            ),
            array(
                'name'   => 'Product Name 2',  
                'brand'  => 'Margherita Masters',
                'price'  => 20.45,
                'image'  => 'product-image2.png',
            ),
        );

        // Create or retrieve the second product category
        $grocery_ecommerce_category_term = term_exists($grocery_ecommerce_category_name_second, 'product_cat');
        if (!$grocery_ecommerce_category_term) {
            $grocery_ecommerce_category_term = wp_insert_term($grocery_ecommerce_category_name_second, 'product_cat');
            if (is_wp_error($grocery_ecommerce_category_term)) {
                error_log('Error creating category: ' . $grocery_ecommerce_category_term->get_error_message());
                return;
            }
        }
        $grocery_ecommerce_category_id_second = $grocery_ecommerce_category_term['term_id'];

        // Loop through the products and create them
        foreach ($grocery_ecommerce_products as $grocery_ecommerce_product_details) {
            // Create the product
            $grocery_ecommerce_product_post = array(
                'post_title'   => wp_strip_all_tags($grocery_ecommerce_product_details['name']),
                'post_content' => 'Lorem Ipsum ' . $grocery_ecommerce_product_details['name'] . ' Lorem Ipsum is simply dummy text of the printing and typesetting industry',
                'post_status'  => 'publish',
                'post_type'    => 'product',
            );
            $grocery_ecommerce_product_id = wp_insert_post($grocery_ecommerce_product_post);
            
            if (is_wp_error($grocery_ecommerce_product_id)) {
                error_log('Error creating product: ' . $grocery_ecommerce_product_id->get_error_message());
                continue; // Skip to the next product if an error occurs
            }

            // Assign the product to the second category
            wp_set_object_terms($grocery_ecommerce_product_id, array($grocery_ecommerce_category_id_second), 'product_cat');

            // Set product price
            update_post_meta($grocery_ecommerce_product_id, '_price', $grocery_ecommerce_product_details['price']);

            // Add custom meta for the brand
            update_post_meta($grocery_ecommerce_product_id, '_product_brand', $grocery_ecommerce_product_details['brand']);

            // Handle the featured image
            $grocery_ecommerce_image_url = get_template_directory_uri() . '/images/' . $grocery_ecommerce_product_details['image'];
            $grocery_ecommerce_image_id = media_sideload_image($grocery_ecommerce_image_url, $grocery_ecommerce_product_id, null, 'id');
            if (!is_wp_error($grocery_ecommerce_image_id)) {
                set_post_thumbnail($grocery_ecommerce_product_id, $grocery_ecommerce_image_id);
            } else {
                error_log('Error downloading image: ' . $grocery_ecommerce_image_id->get_error_message());
            }
        }
        //Copyright Text
        set_theme_mod( 'grocery_ecommerce_footer_text', 'By Themesglance' );}
    ?>

    <form action="<?php echo esc_url(home_url()); ?>/wp-admin/themes.php?page=grocery_ecommerce_guide" method="POST" onsubmit="return validate(this);">
    <?php if (!get_option('grocery_ecommerce_demo_import_completed')) : ?>
        <div class="demo-btn">
        <p><?php echo  esc_html_e( 'You are about to use the most easy to use and flexible WordPress theme.', 'grocery-ecommerce' ); ?></p>
            <button id="import-button" type="submit" name="submit" class="import-btn run-import button-large">
                <?php esc_html_e('Demo Importer', 'grocery-ecommerce'); ?>
                    <span id="spinner" style="display: none;">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/spinner.gif" alt="Loading..." style="width:34px; height:34px; margin-left:10px;vertical-align: middle;" />
                    </span>
            </button>
        </div>
    <?php endif; ?>
    </form>
	<script type="text/javascript">
		function validate(valid) {
			 if(confirm("Do you really want to import the Demo Theme Content?")){
			    document.getElementById('spinner').style.display = 'inline-block';
			}
		    else {
			    return false;
		    }
		}
	</script>
</div>
