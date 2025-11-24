<?php
/**
 * The Template for displaying all single posts.
 * @package Grocery Ecommerce
 */
get_header(); ?>
<?php 
$grocery_ecommerce_content_col_class = ( get_theme_mod( 'grocery_ecommerce_sidebar_size', 'Sidebar 1/4' ) == 'Sidebar 1/3' ) 
    ? 'col-lg-8 col-md-8' 
    : 'col-lg-9 col-md-9';

$grocery_ecommerce_sidebar_col_class = ( get_theme_mod( 'grocery_ecommerce_sidebar_size', 'Sidebar 1/4' ) == 'Sidebar 1/3' ) 
    ? 'col-lg-4 col-md-4' 
    : 'col-lg-3 col-md-3';
?>
<div class="container">
    <main id="maincontent" role="main" class="main-wrap-box singlepost-page py-4">
    	<?php
	    $grocery_ecommerce_left_right = get_theme_mod( 'grocery_ecommerce_single_post_layout','Right Sidebar');
	    if($grocery_ecommerce_left_right == 'Right Sidebar'){ ?>
		    <div class="row">
				<div class="<?php echo $grocery_ecommerce_content_col_class; ?>" id="wrapper">
		            <?php if(get_theme_mod('grocery_ecommerce_single_post_breadcrumb',true) != ''){ ?>
			            <div class="bradcrumbs">
			                <?php grocery_ecommerce_the_breadcrumb(); ?>
			            </div>
					<?php }?>
					<?php while ( have_posts() ) : the_post(); 

						get_template_part( 'template-parts/single-post');

		            endwhile; // end of the loop. 
		            wp_reset_postdata();?>
		       	</div>
				<div class="<?php echo $grocery_ecommerce_sidebar_col_class; ?>"><?php get_sidebar();?></div>
			</div>
		<?php }else if($grocery_ecommerce_left_right == 'Left Sidebar'){ ?>
			<div class="row">
				<div class="<?php echo $grocery_ecommerce_sidebar_col_class; ?>"><?php get_sidebar();?></div>
				<div class="<?php echo $grocery_ecommerce_content_col_class; ?>" id="wrapper">
		            <?php if(get_theme_mod('grocery_ecommerce_single_post_breadcrumb',true) != ''){ ?>
			            <div class="bradcrumbs">
			                <?php grocery_ecommerce_the_breadcrumb(); ?>
			            </div>
					<?php }?>
					<?php while ( have_posts() ) : the_post(); 
						
						get_template_part( 'template-parts/single-post');

		            endwhile; // end of the loop. 
		            wp_reset_postdata();?>
		       	</div>	     
		    </div>  	
		<?php }else if($grocery_ecommerce_left_right == 'One Column'){ ?>
			<div id="wrapper">
	            <?php if(get_theme_mod('grocery_ecommerce_single_post_breadcrumb',true) != ''){ ?>
		            <div class="bradcrumbs">
		                <?php grocery_ecommerce_the_breadcrumb(); ?>
		            </div>
				<?php }?>
				<?php while ( have_posts() ) : the_post(); 
						
					get_template_part( 'template-parts/single-post');

	            endwhile; // end of the loop. 
	            wp_reset_postdata();?>
	       	</div>
	    <?php } ?>
        <div class="clearfix"></div>
    </main>
</div>

<?php get_footer(); ?>