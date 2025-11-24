<?php
/**
 * The template for displaying Archive pages.
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
<main id="maincontent" role="main">
    <?php
    $grocery_ecommerce_left_right = get_theme_mod( 'grocery_ecommerce_layout','Right Sidebar');
    if($grocery_ecommerce_left_right == 'Right Sidebar'){ ?>
        <div id="blog_post">
            <div class="innerlightbox pt-5">
                <div class="container">  
                    <div class="row">      
                        <div class="<?php echo $grocery_ecommerce_content_col_class; ?>">
                            <?php
                                the_archive_title( '<h1 class="page-title text-center mb-4">', '</h1>' );
                                the_archive_description( '<div class="taxonomy-description">', '</div>' );
                            ?>
                            <?php if( get_theme_mod( 'grocery_ecommerce_blog_nav_position','bottom') == 'top' || get_theme_mod( 'grocery_ecommerce_blog_nav_position','bottom') == 'both') { ?>
                                <?php if( get_theme_mod( 'grocery_ecommerce_post_navigation',true) != '') { ?>
                                    <div class="navigation">
                                        <?php grocery_ecommerce_posts_pagination();?>
                                        <div class="clearfix"></div>
                                    </div>
                                <?php }?>
                            <?php }?>
                            <?php if ( have_posts() ) :
                                /* Start the Loop */
                                while ( have_posts() ) : the_post();
                                    get_template_part( 'template-parts/content' , get_post_format() );
                                endwhile;
                                  else :
                                    get_template_part( 'no-results' ); 
                                endif; 
                            ?>
                            <?php if( get_theme_mod( 'grocery_ecommerce_blog_nav_position','bottom') == 'bottom' || get_theme_mod( 'grocery_ecommerce_blog_nav_position','bottom') == 'both') { ?>
                                <?php if( get_theme_mod( 'grocery_ecommerce_post_navigation',true) != '') { ?>
                                    <div class="navigation">
                                        <?php grocery_ecommerce_posts_pagination();?>
                                        <div class="clearfix"></div>
                                    </div>
                                <?php }?>
                            <?php }?>
                        </div>      
                        <div class="<?php echo $grocery_ecommerce_sidebar_col_class; ?>"><?php get_sidebar();?></div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    <?php }else if($grocery_ecommerce_left_right == 'Left Sidebar'){ ?>
        <div id="blog_post">
            <div class="innerlightbox pt-5">
                <div class="container">
                    <div class="row">
                        <div class="<?php echo $grocery_ecommerce_sidebar_col_class; ?>"><?php get_sidebar();?></div>
                        <div class="<?php echo $grocery_ecommerce_content_col_class; ?>"> 
                            <?php
                                the_archive_title( '<h1 class="page-title text-center mb-4">', '</h1>' );
                                the_archive_description( '<div class="taxonomy-description">', '</div>' );
                            ?>  
                            <?php if( get_theme_mod( 'grocery_ecommerce_blog_nav_position','bottom') == 'top' || get_theme_mod( 'grocery_ecommerce_blog_nav_position','bottom') == 'both') { ?>
                                <?php if( get_theme_mod( 'grocery_ecommerce_post_navigation',true) != '') { ?>
                                    <div class="navigation">
                                        <?php grocery_ecommerce_posts_pagination();?>
                                        <div class="clearfix"></div>
                                    </div>
                                <?php }?>
                            <?php }?>             
                            <?php if ( have_posts() ) :
                                /* Start the Loop */
                                while ( have_posts() ) : the_post();
                                    get_template_part( 'template-parts/content' , get_post_format() );
                                endwhile;
                                  else :
                                    get_template_part( 'no-results' ); 
                                endif; 
                            ?>
                            <?php if( get_theme_mod( 'grocery_ecommerce_blog_nav_position','bottom') == 'bottom' || get_theme_mod( 'grocery_ecommerce_blog_nav_position','bottom') == 'both') { ?>
                                <?php if( get_theme_mod( 'grocery_ecommerce_post_navigation',true) != '') { ?>
                                    <div class="navigation">
                                        <?php grocery_ecommerce_posts_pagination();?>
                                        <div class="clearfix"></div>
                                    </div>
                                <?php }?>
                            <?php }?>
                        </div>  
                    </div>                  
                </div>
            </div>
        </div>
    <?php }else if($grocery_ecommerce_left_right == 'One Column'){ ?>
        <div id="blog_post">
            <div class="innerlightbox pt-5">
                <div class="container">
                    <?php
                        the_archive_title( '<h1 class="page-title text-center mb-4">', '</h1>' );
                        the_archive_description( '<div class="taxonomy-description">', '</div>' );
                    ?>
                    <?php if( get_theme_mod( 'grocery_ecommerce_blog_nav_position','bottom') == 'top' || get_theme_mod( 'grocery_ecommerce_blog_nav_position','bottom') == 'both') { ?>
                        <?php if( get_theme_mod( 'grocery_ecommerce_post_navigation',true) != '') { ?>
                            <div class="navigation">
                                <?php grocery_ecommerce_posts_pagination();?>
                                <div class="clearfix"></div>
                            </div>
                        <?php }?>
                    <?php }?>
                    <?php if ( have_posts() ) :
                        /* Start the Loop */
                        while ( have_posts() ) : the_post();
                            get_template_part( 'template-parts/content' , get_post_format() );
                        endwhile;
                          else :
                            get_template_part( 'no-results' ); 
                        endif; 
                    ?>
                    <?php if( get_theme_mod( 'grocery_ecommerce_blog_nav_position','bottom') == 'bottom' || get_theme_mod( 'grocery_ecommerce_blog_nav_position','bottom') == 'both') { ?>
                        <?php if( get_theme_mod( 'grocery_ecommerce_post_navigation',true) != '') { ?>
                            <div class="navigation">
                                <?php grocery_ecommerce_posts_pagination();?>
                                <div class="clearfix"></div>
                            </div>
                        <?php }?>
                    <?php }?>                    
                </div>
            </div>
        </div>
    <?php }else if($grocery_ecommerce_left_right == 'Three Columns'){ ?>
        <div id="blog_post">
            <div class="innerlightbox pt-5">
                <div class="container">
                    <div class="row">
                        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-1');?></div>
                        <div class="col-lg-6 col-md-6">
                            <?php
                                the_archive_title( '<h1 class="page-title text-center mb-4">', '</h1>' );
                                the_archive_description( '<div class="taxonomy-description">', '</div>' );
                            ?>
                            <?php if( get_theme_mod( 'grocery_ecommerce_blog_nav_position','bottom') == 'top' || get_theme_mod( 'grocery_ecommerce_blog_nav_position','bottom') == 'both') { ?>
                                <?php if( get_theme_mod( 'grocery_ecommerce_post_navigation',true) != '') { ?>
                                    <div class="navigation">
                                        <?php grocery_ecommerce_posts_pagination();?>
                                        <div class="clearfix"></div>
                                    </div>
                                <?php }?>
                            <?php }?>
                            <?php if ( have_posts() ) :
                                /* Start the Loop */
                                while ( have_posts() ) : the_post();
                                    get_template_part( 'template-parts/content' , get_post_format() );
                                endwhile;
                                  else :
                                    get_template_part( 'no-results' ); 
                                endif; 
                            ?>
                            <?php if( get_theme_mod( 'grocery_ecommerce_blog_nav_position','bottom') == 'bottom' || get_theme_mod( 'grocery_ecommerce_blog_nav_position','bottom') == 'both') { ?>
                                <?php if( get_theme_mod( 'grocery_ecommerce_post_navigation',true) != '') { ?>
                                    <div class="navigation">
                                        <?php grocery_ecommerce_posts_pagination();?>
                                        <div class="clearfix"></div>
                                    </div>
                                <?php }?>
                            <?php }?>
                        </div> 
                        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2');?></div> 
                    </div>              
                </div>
            </div>
        </div>
    <?php }else if($grocery_ecommerce_left_right == 'Four Columns'){ ?>
        <div id="blog_post">
            <div class="innerlightbox pt-5">
                <div class="container">
                    <div class="row">
                        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-1');?></div>
                        <div class="col-lg-3 col-md-3">
                            <?php
                                the_archive_title( '<h1 class="page-title text-center mb-4">', '</h1>' );
                                the_archive_description( '<div class="taxonomy-description">', '</div>' );
                            ?>
                            <?php if( get_theme_mod( 'grocery_ecommerce_blog_nav_position','bottom') == 'top' || get_theme_mod( 'grocery_ecommerce_blog_nav_position','bottom') == 'both') { ?>
                                <?php if( get_theme_mod( 'grocery_ecommerce_post_navigation',true) != '') { ?>
                                    <div class="navigation">
                                        <?php grocery_ecommerce_posts_pagination();?>
                                        <div class="clearfix"></div>
                                    </div>
                                <?php }?>
                            <?php }?>
                            <?php if ( have_posts() ) :
                                /* Start the Loop */
                                while ( have_posts() ) : the_post();
                                    get_template_part( 'template-parts/content' , get_post_format() );
                                endwhile;
                                  else :
                                    get_template_part( 'no-results' ); 
                                endif; 
                            ?>
                            <?php if( get_theme_mod( 'grocery_ecommerce_blog_nav_position','bottom') == 'bottom' || get_theme_mod( 'grocery_ecommerce_blog_nav_position','bottom') == 'both') { ?>
                                <?php if( get_theme_mod( 'grocery_ecommerce_post_navigation',true) != '') { ?>
                                    <div class="navigation">
                                        <?php grocery_ecommerce_posts_pagination();?>
                                        <div class="clearfix"></div>
                                    </div>
                                <?php }?>
                            <?php }?>
                        </div> 
                        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2');?></div>
                        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-3');?></div>
                    </div>
                </div>
            </div>
        </div>
    <?php }else if($grocery_ecommerce_left_right == 'Grid Layout'){ ?>
        <div id="blog_post">
            <div class="innerlightbox pt-5">
                <div class="container"> 
                    <div class="row">       
                        <?php 
                            $sidebar_layout = get_theme_mod('grocery_ecommerce_grid_post_sidebar_layout', 'Right Sidebar');

                        if ($sidebar_layout == 'Left Sidebar') { ?>
                            <div class="<?php echo $grocery_ecommerce_sidebar_col_class; ?>"><?php get_sidebar(); ?></div>
                        <?php } ?>

                        <div class="<?php echo ( $sidebar_layout == 'One Column' ) ? 'col-lg-12' : $grocery_ecommerce_content_col_class; ?>">
                            <?php
                                the_archive_title( '<h1 class="page-title text-center mb-4">', '</h1>' );
                                the_archive_description( '<div class="taxonomy-description">', '</div>' );
                            ?>
                            <?php if( get_theme_mod( 'grocery_ecommerce_blog_nav_position','bottom') == 'top' || get_theme_mod( 'grocery_ecommerce_blog_nav_position','bottom') == 'both') { ?>
                                <?php if( get_theme_mod( 'grocery_ecommerce_post_navigation',true) != '') { ?>
                                    <div class="navigation">
                                        <?php grocery_ecommerce_posts_pagination();?>
                                        <div class="clearfix"></div>
                                    </div>
                                <?php }?>
                            <?php }?>
                            <div class="row">
                                <?php if ( have_posts() ) :
                                    /* Start the Loop */
                                    while ( have_posts() ) : the_post();
                                        get_template_part( 'template-parts/grid-layout' );
                                    endwhile;
                                      else :
                                        get_template_part( 'no-results' );
                                    endif; 
                                ?>
                            </div>
                            <?php if( get_theme_mod( 'grocery_ecommerce_blog_nav_position','bottom') == 'bottom' || get_theme_mod( 'grocery_ecommerce_blog_nav_position','bottom') == 'both') { ?>
                                <?php if( get_theme_mod( 'grocery_ecommerce_post_navigation',true) != '') { ?>
                                    <div class="navigation">
                                        <?php grocery_ecommerce_posts_pagination();?>
                                        <div class="clearfix"></div>
                                    </div>
                                <?php }?>
                            <?php }?>
                        </div>      
                        <?php if ($sidebar_layout == 'Right Sidebar') { ?>
                            <div class="<?php echo $grocery_ecommerce_sidebar_col_class; ?>"><?php get_sidebar(); ?></div>
                        <?php } ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    <?php }else {?>
        <div id="blog_post">
            <div class="innerlightbox pt-5">
                <div class="container">  
                    <div class="row">      
                        <div class="<?php echo $grocery_ecommerce_content_col_class; ?>">
                            <?php
                                the_archive_title( '<h1 class="page-title text-center mb-4">', '</h1>' );
                                the_archive_description( '<div class="taxonomy-description">', '</div>' );
                            ?>
                            <?php if( get_theme_mod( 'grocery_ecommerce_blog_nav_position','bottom') == 'top' || get_theme_mod( 'grocery_ecommerce_blog_nav_position','bottom') == 'both') { ?>
                                <?php if( get_theme_mod( 'grocery_ecommerce_post_navigation',true) != '') { ?>
                                    <div class="navigation">
                                        <?php grocery_ecommerce_posts_pagination();?>
                                        <div class="clearfix"></div>
                                    </div>
                                <?php }?>
                            <?php }?>
                            <?php if ( have_posts() ) :
                                /* Start the Loop */
                                while ( have_posts() ) : the_post();
                                    get_template_part( 'template-parts/content' , get_post_format() );
                                endwhile;
                                  else :
                                    get_template_part( 'no-results' ); 
                                endif; 
                            ?>
                            <?php if( get_theme_mod( 'grocery_ecommerce_blog_nav_position','bottom') == 'bottom' || get_theme_mod( 'grocery_ecommerce_blog_nav_position','bottom') == 'both') { ?>
                                <?php if( get_theme_mod( 'grocery_ecommerce_post_navigation',true) != '') { ?>
                                    <div class="navigation">
                                        <?php grocery_ecommerce_posts_pagination();?>
                                        <div class="clearfix"></div>
                                    </div>
                                <?php }?>
                            <?php }?>
                        </div>      
                        <div class="<?php echo $grocery_ecommerce_sidebar_col_class; ?>"><?php get_sidebar();?></div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</main>

<?php get_footer(); ?>