<?php
/**
 * The template for displaying the footer.
 *
 * @package Ecommerce Bazaar
 */

?>
	</div>
	<!-- Begin Footer Section -->
	<footer id="footer" class="ecommerce-bazaar-footer" itemscope itemtype="https://schema.org/WPFooter">
		<?php if( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ){ ?>
			<div class="footer-widgets-wrapper">
				<div class="container footer-widgets">
					<div class="row">
						<?php 
		                    if( is_active_sidebar( 'footer-1') ) {
		                        echo '<div class="col footer-1">';
		                        dynamic_sidebar( 'footer-1' ); 
		                        echo '</div>';
		                    }
		                    
		                    if( is_active_sidebar( 'footer-2') ) {
		                        echo '<div class="col footer-2">';
		                        dynamic_sidebar( 'footer-2' );
		                        echo '</div>';
		                    }
		                    
		                    if( is_active_sidebar( 'footer-3') ) {
		                        echo '<div class="col footer-3">';
		                        dynamic_sidebar( 'footer-3' );
		                        echo '</div>';
		                    }
		                    
		                    if( is_active_sidebar( 'footer-4' ) ) {
		                        echo '<div class="col footer-4">';
		                        dynamic_sidebar( 'footer-4' );
		                        echo '</div>';
		                    }
		                    ?>
					</div>
				</div>
			</div>
			<?php } else { ?>
	        <div class="footer-widgets-wrapper">
	            <div class="container">
	                <div class="row">	                    
	                    <!-- Recent Posts -->
	                    <aside id="recent-posts" class="footer-1 widget widget_recent_posts col" role="complementary" aria-label="<?php esc_attr_e( '1stsidebar', 'ecommerce-bazaar' ); ?>">
	                        <h2 class="widget-title"><?php esc_html_e('Recent Posts', 'ecommerce-bazaar'); ?></h2>
	                        <ul>
	                            <?php
	                            $args = array(
	                                'post_type'      => 'post',
	                                'posts_per_page' => 5,
	                            );
	                            $ecommerce_bazaar_recent_posts = new WP_Query($args);

	                            while ($ecommerce_bazaar_recent_posts->have_posts()) : $ecommerce_bazaar_recent_posts->the_post();
	                            ?>
	                                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
	                            <?php endwhile; ?>
	                            <?php wp_reset_postdata(); ?>
	                        </ul>
	                    </aside>
	                    <!-- Archive -->
	                    <aside id="archive" class="footer-2 widget widget_archive col" role="complementary" aria-label="<?php esc_attr_e( '2ndsidebar', 'ecommerce-bazaar' ); ?>">
	                        <h2 class="widget-title"><?php esc_html_e('Archive List', 'ecommerce-bazaar'); ?></h2>
	                        <ul>
	                            <?php wp_get_archives('type=monthly'); ?>
	                        </ul>
	                    </aside>
	                    <!-- Tags Widget -->
	                    <aside id="tags" class="footer-3 widget widget_tags col" role="complementary" aria-label="3rdsidebar">
	                        <h2 class="widget-title"><?php esc_html_e('Tags', 'ecommerce-bazaar'); ?></h2>
	                        <div class="tag-cloud">
	                            <?php wp_tag_cloud(); ?>
	                        </div>
	                    </aside>
	                    <!-- Categories -->
	                    <aside id="categories" class="footer-4 widget widget_categories col" role="complementary" aria-label="<?php esc_attr_e( '4thsidebar', 'ecommerce-bazaar' ); ?>">
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
	                </div>
	            </div>
	        </div>
    	<?php } ?>
		<div class="footer-copyright">
			<div class="container copyrights">
				<div class="row">
					<div class="footer-copyrights-wrapper">
						<?php
							/**
							 * Hook - ecommerce_bazaar_action_footer.
							 *
							 * @hooked ecommerce_bazaar_footer_copyrights - 10
							 */
							do_action( 'ecommerce_bazaar_action_footer' );
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="scrl-to-top">
			<?php if(get_theme_mod('ecommerce_bazaar_enable_scrolltop',true)=="1"){ ?>
	   			<a id="scrolltop" class="btntoTop"><i class="bi bi-arrow-up-short"></i></a>
	  		<?php } ?>
		</div>
    </footer>
	<?php wp_footer(); ?>
</body>