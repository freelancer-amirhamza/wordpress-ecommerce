<?php
/**
 * Custom template hooks for this theme.
 *
 * @package Ecommerce Bazaar
 */


/**
 * Before title meta hook
 */
if ( ! function_exists( 'ecommerce_bazaar_before_title' ) ) :
function ecommerce_bazaar_before_title() {
	do_action('ecommerce_bazaar_before_title');
}
endif;


/**
 * Before title content hook
 */
if ( ! function_exists( 'ecommerce_bazaar_before_title_content' ) ) :
	function ecommerce_bazaar_before_title_content() {
		do_action('ecommerce_bazaar_before_title_content');
	}
endif;


/**
 * After title content hook
 */
if ( ! function_exists( 'ecommerce_bazaar_after_title_content' ) ) :
	function ecommerce_bazaar_after_title_content() {
		do_action('ecommerce_bazaar_after_title_content');
	}
endif;


/**
 * After title meta hook
 */
if ( ! function_exists( 'ecommerce_bazaar_after_title' ) ) :
function ecommerce_bazaar_after_title() {
	do_action('ecommerce_bazaar_after_title');
}
endif;

/**
 * Single post content after meta hook
 */
if ( ! function_exists( 'ecommerce_bazaar_single_post_after_content' ) ) :
	function ecommerce_bazaar_single_post_after_content($postID) {
		do_action('ecommerce_bazaar_single_post_after_content',$postID);
	}
endif;