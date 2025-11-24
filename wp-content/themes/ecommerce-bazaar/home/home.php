<?php
/**
 * Template Name: Home
 */

get_header();
?>

<main id="primary">
        
    <?php
        /**
         * Hook - ecommerce_bazaar_action_home_banner.
         *
         * @hooked ecommerce_bazaar_home_banner_section - 10
         */
        do_action( 'ecommerce_bazaar_action_home_banner' );

        /**
         * Hook - ecommerce_bazaar_action_home_product.
         *
         * @hooked ecommerce_bazaar_home_product_section - 10
         */
        do_action( 'ecommerce_bazaar_action_home_product' );

        /**
         * Hook - ecommerce_bazaar_action_home_extra.
         *
         * @hooked ecommerce_bazaar_home_extra_section - 10
         */
        do_action( 'ecommerce_bazaar_action_home_extra' );
    ?>
    
</main>

<?php
get_footer();