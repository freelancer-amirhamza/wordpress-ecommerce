<?php
/**
 * The template for displaying the footer.
 * @package Grocery Ecommerce
 */
?>
<?php if (get_theme_mod('grocery_ecommerce_hide_scroll', true) != '' || get_theme_mod('grocery_ecommerce_backtotop_responsive', true) != '') { ?>
  <?php $grocery_ecommerce_scroll_align = get_theme_mod('grocery_ecommerce_back_to_top', 'Right');
  if ($grocery_ecommerce_scroll_align == 'Left') { ?>
    <a href="#content" class="back-to-top scroll-left text-center"><?php esc_html_e('Top', 'grocery-ecommerce'); ?><span
        class="screen-reader-text"><?php esc_html_e('Back to Top', 'grocery-ecommerce'); ?></span></a>
  <?php } else if ($grocery_ecommerce_scroll_align == 'Center') { ?>
      <a href="#content" class="back-to-top scroll-center text-center"><?php esc_html_e('Top', 'grocery-ecommerce'); ?><span
          class="screen-reader-text"><?php esc_html_e('Back to Top', 'grocery-ecommerce'); ?></span></a>
  <?php } else { ?>
      <a href="#content" class="back-to-top scroll-right text-center"><?php esc_html_e('Top', 'grocery-ecommerce'); ?><span
          class="screen-reader-text"><?php esc_html_e('Back to Top', 'grocery-ecommerce'); ?></span></a>
  <?php } ?>
<?php } ?>
<footer role="contentinfo" id="footer">
  <?php //Set widget areas classes based on user choice
  $grocery_ecommerce_footer_columns = get_theme_mod('grocery_ecommerce_footer_widget', '4');
  if ($grocery_ecommerce_footer_columns == '3') {
    $grocery_ecommerce_cols = 'col-lg-4 col-md-4';
  } elseif ($grocery_ecommerce_footer_columns == '4') {
    $grocery_ecommerce_cols = 'col-lg-3 col-md-3';
  } elseif ($grocery_ecommerce_footer_columns == '2') {
    $grocery_ecommerce_cols = 'col-lg-6 col-md-6';
  } else {
    $grocery_ecommerce_cols = 'col-lg-12 col-md-12';
  }
  ?>
  <?php if (get_theme_mod('grocery_ecommerce_footer_hide_show', true)) { ?>
    <div class="footerinner py-4">
      <div class="container">
        <div class="row">
          <!-- Footer 1 -->
          <div class="<?php echo esc_attr($grocery_ecommerce_cols); ?> footer-block wow zoomIn">
            <?php if (is_active_sidebar('footer-1')): ?>
              <?php dynamic_sidebar('footer-1'); ?>
            <?php else: ?>
              <aside id="categories" class="widget py-3" role="complementary"
                aria-label="<?php esc_attr_e('footer1', 'grocery-ecommerce'); ?>">
                <h3 class="widget-title"><?php esc_html_e('Categories', 'grocery-ecommerce'); ?></h3>
                <ul>
                  <?php wp_list_categories('title_li='); ?>
                </ul>
              </aside>
            <?php endif; ?>
          </div>

          <!-- Footer 2 -->
          <div class="<?php echo esc_attr($grocery_ecommerce_cols); ?> footer-block wow zoomIn">
            <?php if (is_active_sidebar('footer-2')): ?>
              <?php dynamic_sidebar('footer-2'); ?>
            <?php else: ?>
              <aside id="archives" class="widget py-3" role="complementary"
                aria-label="<?php esc_attr_e('footer2', 'grocery-ecommerce'); ?>">
                <h3 class="widget-title"><?php esc_html_e('Archives', 'grocery-ecommerce'); ?></h3>
                <ul>
                  <?php wp_get_archives(array('type' => 'monthly')); ?>
                </ul>
              </aside>
            <?php endif; ?>
          </div>

          <!-- Footer 3 -->
          <div class="<?php echo esc_attr($grocery_ecommerce_cols); ?> footer-block wow zoomIn">
            <?php if (is_active_sidebar('footer-3')): ?>
              <?php dynamic_sidebar('footer-3'); ?>
            <?php else: ?>
              <aside id="meta" class="widget py-3" role="complementary"
                aria-label="<?php esc_attr_e('footer3', 'grocery-ecommerce'); ?>">
                <h3 class="widget-title"><?php esc_html_e('Meta', 'grocery-ecommerce'); ?></h3>
                <ul>
                  <?php wp_register(); ?>
                  <li><?php wp_loginout(); ?></li>
                  <?php wp_meta(); ?>
                </ul>
              </aside>
            <?php endif; ?>
          </div>

          <!-- Footer 4 -->
          <div class="<?php echo esc_attr($grocery_ecommerce_cols); ?> footer-block wow zoomIn">
            <?php if (is_active_sidebar('footer-4')): ?>
              <?php dynamic_sidebar('footer-4'); ?>
            <?php else: ?>
              <aside id="search-widget" class="widget py-3" role="complementary"
                aria-label="<?php esc_attr_e('footer4', 'grocery-ecommerce'); ?>">
                <h3 class="widget-title"><?php esc_html_e('Search', 'grocery-ecommerce'); ?></h3>
                <?php the_widget('WP_Widget_Search'); ?>
              </aside>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
  <?php if (get_theme_mod('grocery_ecommerce_copyright_hide_show', true)) { ?>
    <div class="inner">
      <div class="container">
        <div class="copyright">
          <p class="m-0 text-success widget "><?php  ?>
          <span class="text-success-light" >Developed & Designed By</span>
          <a class="text-success" href="http://amirhamzadev.com" target="_blank" rel="noopener noreferrer"><strong class="text-success text-bold widget-title">Developer Amir Hamza </strong> </a>
        </p>
          <?php if (get_theme_mod('grocery_ecommerce_footer_social_media_hide_show', false)) { ?>
            <div class="mt-2">
              <?php if (get_theme_mod('grocery_ecommerce_footer_facebook_link', '') != "") { ?>
                <a target="_blank"
                  href="<?php echo esc_attr(get_theme_mod('grocery_ecommerce_footer_facebook_link', '')); ?>"><i
                    class="<?php echo esc_html(get_theme_mod('grocery_ecommerce_footer_facebook_icon', 'fab fa-facebook-f')); ?>"></i><span
                    class="screen-reader-text"><?php echo esc_html('Facebook', 'grocery-ecommerce'); ?></span></a>
              <?php } ?>
              <?php if (get_theme_mod('grocery_ecommerce_footer_twitter_link', '') != "") { ?>
                <a target="_blank"
                  href="<?php echo esc_attr(get_theme_mod('grocery_ecommerce_footer_twitter_link', '')); ?>"><i
                    class="<?php echo esc_html(get_theme_mod('grocery_ecommerce_footer_twitter_icon', 'fab fa-twitter')); ?>"></i><span
                    class="screen-reader-text"><?php echo esc_html('Twitter', 'grocery-ecommerce'); ?></span></a>
              <?php } ?>
              <?php if (get_theme_mod('grocery_ecommerce_footer_linkdin_link', '') != "") { ?>
                <a target="_blank"
                  href="<?php echo esc_attr(get_theme_mod('grocery_ecommerce_footer_linkdin_link', '')); ?>"><i
                    class="<?php echo esc_html(get_theme_mod('grocery_ecommerce_footer_linkdin_icon', 'fab fa-linkedin-in')); ?>"></i><span
                    class="screen-reader-text"><?php echo esc_html('Linkdin', 'grocery-ecommerce'); ?></span></a>
              <?php } ?>
              <?php if (get_theme_mod('grocery_ecommerce_footer_instagram_link', '') != "") { ?>
                <a target="_blank"
                  href="<?php echo esc_attr(get_theme_mod('grocery_ecommerce_footer_instagram_link', '')); ?>"><i
                    class="<?php echo esc_html(get_theme_mod('grocery_ecommerce_footer_insta_icon', 'fab fa-instagram')); ?>"></i><span
                    class="screen-reader-text"><?php echo esc_html('Instagram', 'grocery-ecommerce'); ?></span></a>
              <?php } ?>
              <?php if (get_theme_mod('grocery_ecommerce_footer_pintrest_link', '') != "") { ?>
                <a target="_blank"
                  href="<?php echo esc_attr(get_theme_mod('grocery_ecommerce_footer_pintrest_link', '')); ?>"><i
                    class="<?php echo esc_html(get_theme_mod('grocery_ecommerce_footer_pintrest_icon', 'fab fa-pinterest-p')); ?>"></i><span
                    class="screen-reader-text"><?php echo esc_html('Pintrest', 'grocery-ecommerce'); ?></span></a>
              <?php } ?>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  <?php } ?>
</footer>
<?php wp_footer(); ?>
</body>

</html>