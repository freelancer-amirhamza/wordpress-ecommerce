<?php
//about theme info
add_action( 'admin_menu', 'grocery_ecommerce_gettingstarted' );
function grocery_ecommerce_gettingstarted() {    	
	add_theme_page( esc_html__('Demo Theme Content', 'grocery-ecommerce'), esc_html__('Demo Theme Content', 'grocery-ecommerce'), 'edit_theme_options', 'grocery_ecommerce_guide', 'grocery_ecommerce_mostrar_guide');   
}
// Add a Custom CSS file to WP Admin Area
function grocery_ecommerce_admin_theme_style() {
   wp_enqueue_style('custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getting-started/getting-started.css');
}
add_action('admin_enqueue_scripts', 'grocery_ecommerce_admin_theme_style');

//guidline for about theme
function grocery_ecommerce_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'grocery-ecommerce' );
?>
<div class="wrapper-info">
	<div class="intro">
		<h3><?php esc_html_e( 'Welcome to Grocery Ecommerce WordPress Theme', 'grocery-ecommerce' ); ?></h3>
		<p>( Version: <?php echo esc_html($theme['Version']);?> )</p>
	</div>
	<div class="col-left">
		<div class="left-box">
			<div class="color_bg_blue color-info">

				<div class="intro-text"><img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/themesglance-logo.png" alt="" />
				</div>
				<p class="intro_version"><span class="highlight1">Congratulations!</span></p>
				<?php
					/* Demo Import */
					require get_parent_theme_file_path( '/inc/getting-started/demo-content.php' );
				?>
			</div>
			<div class="best-offers">
				<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/best-offer.png" alt="best-offer" />
				<div class="offers">
					<p class="offer-text"><?php echo esc_html__( 'On Premium WordPress Theme', 'grocery-ecommerce' ); ?></p>
					<p class="coupon"><?php echo esc_html__( 'Use Coupon Code:" GET 20 "', 'grocery-ecommerce' ); ?></p>
					<a href="<?php echo esc_url( GROCERY_ECOMMERCE_THEMESGLANCE_PRO_THEME_URL ); ?>" class="btn-pro" target="_blank" >
						<?php esc_html_e('Get Pro', 'grocery-ecommerce'); ?>
					</a>
				</div>
			</div>
		</div>
		<div class="started">
			<h3><?php esc_html_e( 'Lite Theme Info', 'grocery-ecommerce' ); ?></h3>
			<p><?php esc_html_e( 'Grocery Ecommerce is a modern, clean, and elegant theme designed for grocery stores, supermarkets, multivendor shops, organic fruit and vegetable markets, retail outlets, food delivery services, and other online essentials businesses. Perfect for selling groceries, organic products, home decor, clothing, and daily needs, this theme offers a responsive and mobile-friendly layout built on the Bootstrap framework. It features eye-catching banners, testimonial sections, responsive sliders, and customizable display options that help create a professional and engaging online store. With its SEO-friendly, lightweight HTML code, Grocery Ecommerce ensures fast page loading and optimized search visibility. The theme is fully compatible with WooCommerce for online product listings and payments, Contact Form 7 for inquiries, WPML for multilingual stores, and Yoast SEO for better rankings. It also includes social media integration and interactive Call to Action (CTA) buttons to increase engagement and conversions. Ideal for creating grocery delivery websites, organic food shops, or general eCommerce platforms, Grocery Ecommerce delivers performance, flexibility, and style for modern online retail businesses.', 'grocery-ecommerce')?></p>
			<hr>

			<div class="service">
				<div class="info col-lg-3 col-md-3">
					<h3><span class="dashicons dashicons-media-document"></span> <?php esc_html_e('Get Support', 'grocery-ecommerce'); ?></h3>
					<ol>
						<li>
						<a href="<?php echo esc_url( GROCERY_ECOMMERCE_THEMESGLANCE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'grocery-ecommerce'); ?></a>
						</li>
					</ol>
				</div>
				<div class="info col-lg-3 col-md-3">
					<h3><span class="dashicons dashicons-welcome-widgets-menus"></span> <?php esc_html_e('Getting Started', 'grocery-ecommerce'); ?></h3>
					<ol>
						<li> <?php esc_html_e('Start', 'grocery-ecommerce'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'grocery-ecommerce'); ?></a> <?php esc_html_e('your website.', 'grocery-ecommerce'); ?></li>
					</ol>
				</div>
				<div class="info col-lg-3 col-md-3">
					<h3><span class="dashicons dashicons-star-filled"></span> <?php esc_html_e('Rate This Theme', 'grocery-ecommerce'); ?></h3>
					<ol>
						<li>
						<a href="<?php echo esc_url( GROCERY_ECOMMERCE_THEMESGLANCE_REVIEW ); ?>" target="_blank"><?php esc_html_e('Rate it here', 'grocery-ecommerce'); ?></a>
						</li>
					</ol>
				</div>
				<div class="info col-lg-3 col-md-3">
					<h3><span class="dashicons dashicons-editor-help"></span> <?php esc_html_e( 'Help Docs', 'grocery-ecommerce' ); ?></h3>
					<ol>
						<li><?php esc_html_e( 'Grocery Ecommerce Lite', 'grocery-ecommerce' ); ?> <a href="<?php echo esc_url( GROCERY_ECOMMERCE_THEMESGLANCE_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'grocery-ecommerce' ); ?></a></li>
					</ol>
				</div>
			</div>
			
			<h3><?php esc_html_e( 'Get started with Grocery Ecommerce Theme', 'grocery-ecommerce' ); ?></h3>
			<div class="col-left-inner"> 
				<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/free-screenshot.png" alt="" />
			</div>		
			<div class="col-right-inner">
				<p><?php esc_html_e( 'Go to', 'grocery-ecommerce' ); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizer', 'grocery-ecommerce' ); ?> </a> <?php esc_html_e( 'and start customizing your website', 'grocery-ecommerce' ); ?></p>
				<ul>
					<li><?php esc_html_e( 'Easily customizable ', 'grocery-ecommerce' ); ?> </li>
					<li><?php esc_html_e( 'Absolutely free', 'grocery-ecommerce' ); ?> </li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-right">
		<div class="centerbold">
			<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/responsive.png" alt="" />
			<hr class="firsthr">
			<div class="btn-grp">
				<a href="<?php echo esc_url( GROCERY_ECOMMERCE_THEMESGLANCE_PRO_THEME_URL ); ?>" target="_blank"><?php esc_html_e('Get Premium', 'grocery-ecommerce'); ?></a>
				<a href="<?php echo esc_url( GROCERY_ECOMMERCE_THEMESGLANCE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'grocery-ecommerce'); ?></a>
				<a href="<?php echo esc_url( GROCERY_ECOMMERCE_THEMESGLANCE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'grocery-ecommerce'); ?></a>
				<a href="<?php echo esc_url( GROCERY_ECOMMERCE_BUNDLE_URL ); ?>" target="_blank"><?php esc_html_e('Bundle of 176+ Premium WP Themes at $99', 'grocery-ecommerce'); ?></a>
			</div>
			<hr class="secondhr">
		</div>
		<h3><?php esc_html_e( 'PREMIUM THEME FEATURES', 'grocery-ecommerce'); ?></h3>
		<ul>
		 	<li><?php esc_html_e( 'Slider with unlimited slides', 'grocery-ecommerce'); ?></li>
		 	<li><?php esc_html_e( 'Custom Posttype for "Cause" listing', 'grocery-ecommerce'); ?></li>
		 	<li><?php esc_html_e( 'Custom Posttype for "Events" listing', 'grocery-ecommerce'); ?></li>
		 	<li><?php esc_html_e( 'Donation form with contact form 7', 'grocery-ecommerce'); ?></li>
		 	<li><?php esc_html_e( 'Gallery Plugin with shortcode', 'grocery-ecommerce'); ?></li>
		 	<li><?php esc_html_e( 'Custom Posttype for "Volunteers" listing', 'grocery-ecommerce'); ?></li>
		 	<li><?php esc_html_e( 'Social Icon widget', 'grocery-ecommerce'); ?></li>
		 	<li><?php esc_html_e( 'Custom Posttype for "Testimonials" listing', 'grocery-ecommerce'); ?></li>
		 	<li><?php esc_html_e( 'Contact widget for footer', 'grocery-ecommerce'); ?></li>
		 	<li><?php esc_html_e( 'Custom Posttype for "Donators" listing', 'grocery-ecommerce'); ?></li>
		 	<li><?php esc_html_e( 'Contact page Template', 'grocery-ecommerce'); ?></li>
		 	<li><?php esc_html_e( 'Partner listing with slider', 'grocery-ecommerce'); ?></li>
		 	<li><?php esc_html_e( 'Recent Post Widget with thumbnails', 'grocery-ecommerce'); ?></li>
		 	<li><?php esc_html_e( 'Blog full width, With Left and Right sidebar Template', 'grocery-ecommerce'); ?></li>
		</ul>
	</div>
	
</div>
<?php } ?>