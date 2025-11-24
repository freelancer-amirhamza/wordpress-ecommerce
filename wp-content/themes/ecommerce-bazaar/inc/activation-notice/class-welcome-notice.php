<?php

/**
 * Welcome Notice class.
 */
class Ecommerce_Bazaar_Welcome_Notice {

	/**
	** Constructor.
	*/
	public function __construct() {
		// Render Notice
		add_action( 'admin_notices', [$this, 'ecommerce_bazaar_render_notice'] );

		// Enque AJAX Script
		add_action( 'admin_enqueue_scripts', [$this, 'ecommerce_bazaar_admin_enqueue_scripts'], 5 );

		// Dismiss
		add_action( 'admin_enqueue_scripts', [$this, 'ecommerce_bazaar_notice_enqueue_scripts'], 5 );
		add_action( 'wp_ajax_ecommerce_bazaar_dismissed_handler', [$this, 'ecommerce_bazaar_dismissed_handler'] );

		// Reset
		add_action( 'switch_theme', [$this, 'ecommerce_bazaar_reset_notices'] );
		add_action( 'after_switch_theme', [$this, 'ecommerce_bazaar_reset_notices'] );

	}

	/**
	** Render Notice
	*/
	public function ecommerce_bazaar_render_notice() {
	global $pagenow;

	$ecommerce_bazaar_screen = get_current_screen();

	if (
		$ecommerce_bazaar_screen &&
		$ecommerce_bazaar_screen->id !== 'appearance_page_ecommerce-bazaar-theme-info' &&
		$ecommerce_bazaar_screen->id !== 'appearance_page_ecommerce-bazaar-demo'
	) {
		$ecommerce_bazaar_transient_name = sprintf('%s_activation_notice', get_template());

		if ( ! get_transient($ecommerce_bazaar_transient_name) ) {
			?>
			<div class="ecommerce-bazaar-notice notice notice-info is-dismissible" data-notice="<?php echo esc_attr($ecommerce_bazaar_transient_name); ?>">
				<button type="button" class="notice-dismiss"></button>

				<?php $this->ecommerce_bazaar_render_notice_content(); ?>
			</div>
			<?php
		}
	}
}


	/**
	** Render Notice Content
	*/
	public function ecommerce_bazaar_render_notice_content() {
		$ecommerce_bazaar_action = 'install-activate';
		$ecommerce_bazaar_redirect_url = 'admin.php?page=ecommerce-bazaar-theme-info';
		$ecommerce_bazaar_demo_redirect_url = 'themes.php?page=ecommerce-bazaar-demo';
		$ecommerce_bazaar_screen = get_current_screen();

		?>
		<div class="notice-left-icon-box">
			<span class="dashicons dashicons-businessperson notc-theme-icon"></span>
		</div>
		<div class="welcome-message">
			<div class="notc-contnt">
				<h4><?php esc_html_e('Thank you for installing Legacy Themes!', 'ecommerce-bazaar'); ?></h4>
				<h1><?php esc_html_e('Welcome to Ecommerce Bazaar WordPress Theme!', 'ecommerce-bazaar'); ?></h1>
				<p><?php esc_html_e( 'Our WordPress themes are modern, minimalist, fully responsive, SEO-friendly, and packed with features—perfect for designers, bloggers, and creative professionals across various fields.', 'ecommerce-bazaar' );?>
				</p>			
				<div class="action-buttons">
					<a href="<?php echo esc_url(admin_url($ecommerce_bazaar_redirect_url)); ?>" class="button notice-btn button-hero" data-action="<?php echo esc_attr($ecommerce_bazaar_action); ?>">
						<span class="notc-btn-txt"><?php echo esc_html__( 'Get Started with Ecommerce Bazaar', 'ecommerce-bazaar' ); ?></span>
					</a>
					<a href="<?php echo esc_url(admin_url($ecommerce_bazaar_demo_redirect_url)); ?>" class="demo-btn btn" >
						<span class="demo-btn-txt"><?php echo esc_html__( 'Demo Import', 'ecommerce-bazaar' ); ?></span>
					</a>
					<a href="<?php echo esc_url(ECOMMERCE_BAZAAR_THEME_BUNDLE_URL); ?>" target="_blank" class="bundle-btn btn" >
						<span class="demo-btn-txt"><?php echo esc_html__( 'Get All Themes', 'ecommerce-bazaar' ); ?></span>
					</a>
				</div>
			</div>			
		</div>
		<div class="notice-right-img-box">
			<img class="notc-right-img" src="<?php echo esc_url( get_template_directory_uri() . '/inc/activation-notice/img/notice-right.png' ); ?>" alt="<?php esc_attr_e( 'notice themes img', 'ecommerce-bazaar' ); ?>" />
		</div>

		<?php
	}

	/**
	** Reset Notice.
	*/
	public function ecommerce_bazaar_reset_notices() {
		delete_transient( sprintf( '%s_activation_notice', get_template() ) );
	}

	/**
	** Dismissed handler
	*/
	public function ecommerce_bazaar_dismissed_handler() {
		wp_verify_nonce( null );

		if ( isset( $_POST['notice'] ) ) {
			set_transient( sanitize_text_field( wp_unslash( $_POST['notice'] ) ), true, 0 );
		}
	}

	/**
	** Notice Enqunue Scripts
	*/
	public function ecommerce_bazaar_notice_enqueue_scripts( $page ) {
		
		wp_enqueue_script( 'jquery' );

		ob_start();
		?>
		<script>
			jQuery(function($) {
				$( document ).on( 'click', '.ecommerce-bazaar-notice .notice-dismiss', function () {
					jQuery.post( 'ajax_url', {
						action: 'ecommerce_bazaar_dismissed_handler',
						notice: $( this ).closest( '.ecommerce-bazaar-notice' ).data( 'notice' ),
					});
					$( '.ecommerce-bazaar-notice' ).hide();
				} );
			});
		</script>
		<?php
		$script = str_replace( 'ajax_url', admin_url( 'admin-ajax.php' ), ob_get_clean() );

		wp_add_inline_script( 'jquery', str_replace( ['<script>', '</script>'], '', $script ) );
	}

	/**
	** Register scripts and styles for welcome notice.
	*/
	public function ecommerce_bazaar_admin_enqueue_scripts( $page ) {
		// Enqueue Styles.
		wp_enqueue_style( 'ecommerce-bazaar-welcome-notic-css', get_template_directory_uri() . '/inc/activation-notice/css/notice-bar.css' );
	}

}

new Ecommerce_Bazaar_Welcome_Notice();