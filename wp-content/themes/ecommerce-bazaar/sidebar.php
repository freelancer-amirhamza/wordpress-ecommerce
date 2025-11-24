<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Ecommerce Bazaar
 */


?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'primary-sidebar' ); ?>
</aside><!-- #secondary -->

<?php if ( ! is_active_sidebar( 'primary-sidebar' ) ) { ?>

	<aside id="secondary" class="widget-area" role="complementary">
		<!-- Search -->
		<aside id="search-3" class="widget widget_search">
			<h2 class="widget-title"><?php esc_html_e('Search Here', 'ecommerce-bazaar'); ?></h2>
			<?php get_search_form(); ?>
		</aside>
		<!-- Categories -->
		<aside id="categories" class="widget widget_categories" role="complementary" aria-label="<?php esc_attr_e( 'secondsidebar', 'ecommerce-bazaar' ); ?>">
		    <h2 class="widget-title"><?php esc_html_e('Categories', 'ecommerce-bazaar'); ?></h2>
		    <ul>
		        <?php
		        $args = array(
		            'title_li' => '',
		        );
		        wp_list_categories($args);
		        ?>
		    </ul>
		</aside>
		<!-- Archive -->
		<aside id="archive" class="widget widget_archive" role="complementary" aria-label="<?php esc_attr_e( 'secondsidebar', 'ecommerce-bazaar' ); ?>">
		    <h2 class="widget-title"><?php esc_html_e('Archive List', 'ecommerce-bazaar'); ?></h2>
		    <ul>
		        <?php wp_get_archives('type=monthly'); ?>
		    </ul>
		</aside>
		<!-- Tag Sidebar -->
		<aside id="tag-sidebar" class="widget widget_tag_cloud" role="complementary" aria-label="<?php esc_attr_e( 'thirdsidebar', 'ecommerce-bazaar' ); ?>">
		    <h2 class="widget-title"><?php esc_html_e('Popular Tags', 'ecommerce-bazaar'); ?></h2>
		    <div class="tagcloud">
		        <?php
		        $ecommerce_bazaar_tags = get_tags(array(
		            'orderby' => 'count',
		            'order'   => 'DESC',
		            'number'  => 20, // You can change the number of tags displayed
		        ));

		        if ($ecommerce_bazaar_tags) {
		            foreach ($ecommerce_bazaar_tags as $ecommerce_bazaar_tag) {
		                $ecommerce_bazaar_tag_link = get_tag_link($ecommerce_bazaar_tag->term_id);
		                $ecommerce_bazaar_tag_name = $ecommerce_bazaar_tag->name;
		                $ecommerce_bazaar_tag_count = $ecommerce_bazaar_tag->count;
		                echo '<a href="' . esc_url($ecommerce_bazaar_tag_link) . '" class="tag-link" title="' . esc_attr($ecommerce_bazaar_tag_name) . ' (' . $ecommerce_bazaar_tag_count . ' posts)">' . esc_html($ecommerce_bazaar_tag_name) . '</a> ';
		            }
		        } else {
		            echo '<p>' . esc_html__('No tags found.', 'ecommerce-bazaar') . '</p>';
		        }
		        ?>
		    </div>
		</aside>	
	</aside>

<?php } ?>
