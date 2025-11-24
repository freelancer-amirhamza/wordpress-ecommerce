<?php 
  $grocery_ecommerce_archive_year  = get_the_time('Y'); 
  $grocery_ecommerce_archive_month = get_the_time('m'); 
  $grocery_ecommerce_archive_day    = get_the_time('d'); 
?>
<?php $grocery_ecommerce_related_posts = grocery_ecommerce_related_posts_function(); ?>

<?php if ( $grocery_ecommerce_related_posts->have_posts() ): ?>

	<div class="related-posts clearfix py-3">
		<?php if ( get_theme_mod('grocery_ecommerce_related_posts_title','You May Also Like') != '' ) {?>
			<h2 class="related-posts-main-title"><?php echo esc_html( get_theme_mod('grocery_ecommerce_related_posts_title',__('You May Also Like','grocery-ecommerce')) ); ?></h2>
		<?php }?>
		<div class="row">
			<?php while ( $grocery_ecommerce_related_posts->have_posts() ) : $grocery_ecommerce_related_posts->the_post(); ?>

				<div class="col-lg-4 col-md-6">
				    <article class="blog-sec text-start p-2 mb-4">
				        <?php 
						    if(has_post_thumbnail() && get_theme_mod('grocery_ecommerce_show_related_posts_image',true) == true) { 
						      the_post_thumbnail(); 
						    }
							
					  	?>
				        <h3 class="text-start"><a href="<?php echo esc_url(get_permalink() ); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h3>
			            <?php if( get_theme_mod( 'grocery_ecommerce_related_post_date',true) != '' || get_theme_mod( 'grocery_ecommerce_related_post_author',true) != '' || get_theme_mod( 'grocery_ecommerce_related_post_comment_no',true) != '' || get_theme_mod( 'grocery_ecommerce_related_post_time',true) != '') { ?>
							<div class="post-info p-2 mb-2">
							<?php if( get_theme_mod( 'grocery_ecommerce_related_post_date',true) != '') { ?>
								<i class="<?php echo esc_attr(get_theme_mod('grocery_ecommerce_related_post_date_icon',"fa fa-calendar pe-2" )); ?>"></i><a href="<?php echo esc_url( get_day_link( $grocery_ecommerce_archive_year, $grocery_ecommerce_archive_month, $grocery_ecommerce_archive_day )); ?>"><span class="entry-date pe-1"><?php echo esc_html( get_the_date() ); ?></span><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a>
							<?php }?>
							<?php if( get_theme_mod( 'grocery_ecommerce_related_post_author',true) != '') { ?>
								<i class="<?php echo esc_attr(get_theme_mod('grocery_ecommerce_related_post_author_icon',"fa fa-user pe-2" )); ?>"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><span class="entry-author pe-1"> <?php the_author(); ?></span><span class="screen-reader-text"><?php the_author(); ?></span></a>
							<?php }?>
							<?php if( get_theme_mod( 'grocery_ecommerce_related_post_comment_no',true) != '') { ?>
								<i class="<?php echo esc_attr(get_theme_mod('grocery_ecommerce_related_post_comment_icon',"fa fa-comments pe-2" )); ?>"></i><span class="entry-comments pe-1"> <?php comments_number( __('0 Comments','grocery-ecommerce'), __('0 Comments','grocery-ecommerce'), __('% Comments','grocery-ecommerce') ); ?></span> 
							<?php }?>
							<?php if( get_theme_mod( 'grocery_ecommerce_related_post_time',true) != '') { ?>
								<span class="entry-comments me-2"><i class="<?php echo esc_attr(get_theme_mod('grocery_ecommerce_related_post_time_icon',"fa fa-clock pe-2" )); ?>"></i> <?php echo esc_html( get_the_time() ); ?></span>
							<?php }?>
							</div>
						<?php }?>
						<?php if(get_the_excerpt()) { ?>
			                <div class="entry-content"><p><?php $grocery_ecommerce_excerpt = get_the_excerpt(); echo esc_html( grocery_ecommerce_string_limit_words( $grocery_ecommerce_excerpt, esc_attr(get_theme_mod('grocery_ecommerce_related_post_excerpt_number','20')))); ?> <?php echo esc_html( get_theme_mod('grocery_ecommerce_related_post_excerpt_suffix','...') ); ?></p></div>
				        <?php }?>
				        <?php if ( get_theme_mod('grocery_ecommerce_related_button_text','Read Full') != '' ) {?>
				            <div class="blogbtn my-3">
				              <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small"><?php echo esc_html( get_theme_mod('grocery_ecommerce_related_button_text',__('Read Full', 'grocery-ecommerce')) ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('grocery_ecommerce_related_button_text',__('Read Full', 'grocery-ecommerce')) ); ?></span></a>
				            </div>
				        <?php }?>
				    </article>
				</div>

			<?php endwhile; ?>
		</div>

	</div><!--/.post-related-->
<?php endif; ?>

<?php wp_reset_postdata(); ?>