<?php
/**
 * The template for displaying all single posts.
 *
 * @package Ecommerce Bazaar
 */

get_header();
ecommerce_bazaar_before_title();
if (true === get_theme_mod('ecommerce_bazaar_enable_page_title', true)) :
    do_action('ecommerce_bazaar_get_page_title');
endif;
ecommerce_bazaar_after_title();

$ecommerce_bazaar_prevarticle = esc_html(get_theme_mod( 'ecommerce_bazaar_single_post_previous_article_text', esc_html__('Previous Article','ecommerce-bazaar')));
$ecommerce_bazaar_nextarticle = esc_html(get_theme_mod( 'ecommerce_bazaar_single_post_next_article_text', esc_html__('Next Article','ecommerce-bazaar')));

?>
<div class="content-section img-overlay"></div>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="content-inner">
			<div id="blog-section">
				<div class="container">
			        <div class="row">
			        	<?php
			        		if('right'===esc_html(get_theme_mod('ecommerce_bazaar_blog_single_sidebar_layout','right'))) {
			        			?>			        				
        							<div id="post-wrapper" class="col-md-8">
										<?php
											while ( have_posts() ) : the_post();

												get_template_part( 'template-parts/post/content', 'single');

												the_post_navigation(
												    array(
												        'prev_text' => '<span class="meta-nav" aria-hidden="true"><i class="bi bi-arrow-left-circle"></i>'. $ecommerce_bazaar_prevarticle .'</span> ' .
																		'<span class="screen-reader-text"> '. $ecommerce_bazaar_prevarticle .' </span> ' .
																		'<h5 class="post-title">%title</h5>',
												        'next_text' => '<span class="meta-nav" aria-hidden="true">'. $ecommerce_bazaar_nextarticle .'</span> ' .
																		'<span class="screen-reader-text">'. $ecommerce_bazaar_nextarticle .'</span> <i class="bi bi-arrow-right-circle"></i> ' .
																		'<h5 class="post-title">%title</h5>',
												        'screen_reader_text' => esc_html__('Posts navigation', 'ecommerce-bazaar')
												    )
												);

												// If comments are open or we have at least one comment, load up the comment template.
												if ( comments_open() || get_comments_number() ) :
													comments_template();
												endif;

											endwhile; // End of the loop.
										?>							
									</div>
									<div id="sidebar-wrapper" class="col-md-4">
										<?php get_sidebar(); ?>
									</div>
			        			<?php
			        		}
			        		else if('left'===esc_html(get_theme_mod('ecommerce_bazaar_blog_single_sidebar_layout','right'))) {
			        			?>
        							<div id="sidebar-wrapper" class="col-md-4">
										<?php get_sidebar(); ?>
									</div>
			        				<div id="post-wrapper" class="col-md-8">
										<?php
											while ( have_posts() ) : the_post();

												get_template_part( 'template-parts/post/content', 'single');

												the_post_navigation(
												    array(
												        'prev_text' => '<span class="meta-nav" aria-hidden="true"><i class="bi bi-arrow-left-circle"></i>'. $ecommerce_bazaar_prevarticle .'</span> ' .
																		'<span class="screen-reader-text"> '. $ecommerce_bazaar_prevarticle .' </span> ' .
																		'<h5 class="post-title">%title</h5>',
												        'next_text' => '<span class="meta-nav" aria-hidden="true">'. $ecommerce_bazaar_nextarticle .'</span> ' .
																		'<span class="screen-reader-text">'. $ecommerce_bazaar_nextarticle .'</span><i class="bi bi-arrow-right-circle"></i> ' .
																		'<h5 class="post-title">%title</h5>',
												        'screen_reader_text' => esc_html__('Posts navigation', 'ecommerce-bazaar')
												    )
												);

												// If comments are open or we have at least one comment, load up the comment template.
												if ( comments_open() || get_comments_number() ) :
													comments_template();
												endif;

											endwhile; // End of the loop.
										?>							
									</div>
			        			<?php
			        		}
			        		else {
			        			?>
									<div class="col-md-12">
										<?php
											while ( have_posts() ) : the_post();

												get_template_part( 'template-parts/post/content', 'single');

												the_post_navigation(
												    array(
												        'prev_text' => '<span class="meta-nav" aria-hidden="true"><i class="bi bi-arrow-left-circle"></i>'. $ecommerce_bazaar_prevarticle .'</span> ' .
																		'<span class="screen-reader-text"> '. $ecommerce_bazaar_prevarticle .' </span> ' .
																		'<h5 class="post-title">%title</h5>',
												        'next_text' => '<span class="meta-nav" aria-hidden="true">'. $ecommerce_bazaar_nextarticle .'</span> ' .
																		'<span class="screen-reader-text">'. $ecommerce_bazaar_nextarticle .'</span><i class="bi bi-arrow-right-circle"></i> ' .
																		'<h5 class="post-title">%title</h5>',
												        'screen_reader_text' => esc_html__('Posts navigation', 'ecommerce-bazaar')
												    )
												);
												
												// If comments are open or we have at least one comment, load up the comment template.
												if ( comments_open() || get_comments_number() ) :
													comments_template();
												endif;

											endwhile; // End of the loop.
										?>
						            </div>
								<?php
			        		}
			        	?>							
					</div>
				</div>
			</div>
		</div>		
	</main>
</div>

<?php
get_footer();
