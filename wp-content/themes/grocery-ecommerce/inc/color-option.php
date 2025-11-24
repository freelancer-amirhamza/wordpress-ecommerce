<?php

	$grocery_ecommerce_first_theme_color = get_theme_mod('grocery_ecommerce_first_theme_color');
	$grocery_ecommerce_second_theme_color = get_theme_mod('grocery_ecommerce_second_theme_color');

	$grocery_ecommerce_custom_css = '';


	/*------------------ Theme Color Option -----------*/
	if ($grocery_ecommerce_first_theme_color) {
		$grocery_ecommerce_custom_css .= ':root {';
		$grocery_ecommerce_custom_css .= '--primary-color: ' . esc_attr($grocery_ecommerce_first_theme_color) . ' !important;';
		$grocery_ecommerce_custom_css .= '} ';
	}

	if ($grocery_ecommerce_second_theme_color) {
		$grocery_ecommerce_custom_css .= ':root {';
		$grocery_ecommerce_custom_css .= '--secondary-color: ' . esc_attr($grocery_ecommerce_second_theme_color) . ' !important;';
		$grocery_ecommerce_custom_css .= '} ';
	}

	// Layout Options
	$grocery_ecommerce_theme_layout = get_theme_mod( 'grocery_ecommerce_theme_layout_options','Default Theme');
    if($grocery_ecommerce_theme_layout == 'Default Theme'){
		$grocery_ecommerce_custom_css .='body{';
			$grocery_ecommerce_custom_css .='max-width: 100%;';
		$grocery_ecommerce_custom_css .='}';
	}else if($grocery_ecommerce_theme_layout == 'Container Theme'){
		$grocery_ecommerce_custom_css .='body{';
			$grocery_ecommerce_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$grocery_ecommerce_custom_css .='}';
	}else if($grocery_ecommerce_theme_layout == 'Box Container Theme'){
		$grocery_ecommerce_custom_css .='body{';
			$grocery_ecommerce_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$grocery_ecommerce_custom_css .='}';
	}
	
	/*--------- Preloader Color Option -------*/
	$grocery_ecommerce_preloader_color = get_theme_mod('grocery_ecommerce_preloader_color');

	if($grocery_ecommerce_preloader_color != false){
		$grocery_ecommerce_custom_css .=' .tg-loader{';
			$grocery_ecommerce_custom_css .='border-color: '.esc_attr($grocery_ecommerce_preloader_color).';';
		$grocery_ecommerce_custom_css .='} ';
		$grocery_ecommerce_custom_css .=' .tg-loader-inner, .preloader .preloader-container .animated-preloader, .preloader .preloader-container .animated-preloader:before{';
			$grocery_ecommerce_custom_css .='background-color: '.esc_attr($grocery_ecommerce_preloader_color).';';
		$grocery_ecommerce_custom_css .='} ';
	}

	$grocery_ecommerce_preloader_bg_color = get_theme_mod('grocery_ecommerce_preloader_bg_color');

	if($grocery_ecommerce_preloader_bg_color != false){
		$grocery_ecommerce_custom_css .=' #overlayer, .preloader{';
			$grocery_ecommerce_custom_css .='background-color: '.esc_attr($grocery_ecommerce_preloader_bg_color).';';
		$grocery_ecommerce_custom_css .='} ';
	}

	$grocery_ecommerce_preloader_bg_img = get_theme_mod('grocery_ecommerce_preloader_bg_img');
	if($grocery_ecommerce_preloader_bg_img != false){
		$grocery_ecommerce_custom_css .=' #overlayer, .preloader{';
			$grocery_ecommerce_custom_css .='background: url('.esc_attr($grocery_ecommerce_preloader_bg_img).');-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;';
		$grocery_ecommerce_custom_css .='}';
	}

	/*------------ Button Settings option-----------------*/

	$grocery_ecommerce_top_button_padding = get_theme_mod('grocery_ecommerce_top_button_padding');
	$grocery_ecommerce_bottom_button_padding = get_theme_mod('grocery_ecommerce_bottom_button_padding');
	$grocery_ecommerce_left_button_padding = get_theme_mod('grocery_ecommerce_left_button_padding');
	$grocery_ecommerce_right_button_padding = get_theme_mod('grocery_ecommerce_right_button_padding');
	if($grocery_ecommerce_top_button_padding != false || $grocery_ecommerce_bottom_button_padding != false || $grocery_ecommerce_left_button_padding != false || $grocery_ecommerce_right_button_padding != false){
		$grocery_ecommerce_custom_css .='.blogbtn a, .read-more a, #comments input[type="submit"].submit{';
			$grocery_ecommerce_custom_css .='padding-top: '.esc_attr($grocery_ecommerce_top_button_padding).'px; padding-bottom: '.esc_attr($grocery_ecommerce_bottom_button_padding).'px; padding-left: '.esc_attr($grocery_ecommerce_left_button_padding).'px; padding-right: '.esc_attr($grocery_ecommerce_right_button_padding).'px; display:inline-block;';
		$grocery_ecommerce_custom_css .='}';
	}

	$grocery_ecommerce_button_border_radius = get_theme_mod('grocery_ecommerce_button_border_radius');
	$grocery_ecommerce_custom_css .='.blogbtn a, .read-more a, #comments input[type="submit"].submit{';
		$grocery_ecommerce_custom_css .='border-radius: '.esc_attr($grocery_ecommerce_button_border_radius).'px;';
	$grocery_ecommerce_custom_css .='}';

	// button font weight
	$grocery_ecommerce_button_font_weight = get_theme_mod('grocery_ecommerce_button_font_weight', '500');
  	$grocery_ecommerce_custom_css .='.blogbtn a{';
    $grocery_ecommerce_custom_css .='font-weight: '.esc_attr($grocery_ecommerce_button_font_weight).';';
  	$grocery_ecommerce_custom_css .='}';


  	// button text transform
  	$grocery_ecommerce_button_text_transform = get_theme_mod('grocery_ecommerce_button_text_transform');
  	if($grocery_ecommerce_button_text_transform == 'uppercase' ){
    	$grocery_ecommerce_custom_css .='.blogbtn a{';
      	$grocery_ecommerce_custom_css .=' text-transform: uppercase;';
    	$grocery_ecommerce_custom_css .='}';
  	}elseif($grocery_ecommerce_button_text_transform == 'Capitalize' ){
    	$grocery_ecommerce_custom_css .='.blogbtn a{';
      	$grocery_ecommerce_custom_css .=' text-transform: Capitalize;';
    	$grocery_ecommerce_custom_css .='}';
  	}elseif($grocery_ecommerce_button_text_transform == 'lowercase' ){
    	$grocery_ecommerce_custom_css .='.blogbtn a{';
      	$grocery_ecommerce_custom_css .=' text-transform: lowercase;';
    	$grocery_ecommerce_custom_css .='}';
  	}

	// Button letter spacing
	$grocery_ecommerce_button_letter_spacing = get_theme_mod('grocery_ecommerce_button_letter_spacing', '0');
	$grocery_ecommerce_custom_css .='.blogbtn a{';
		$grocery_ecommerce_custom_css .='letter-spacing: '.esc_attr($grocery_ecommerce_button_letter_spacing).'px;';
	$grocery_ecommerce_custom_css .='}';
	
	//Button hover effect
	$grocery_ecommerce_button_hover_effect = get_theme_mod('grocery_ecommerce_button_hover_effect', 'disable');
	if ($grocery_ecommerce_button_hover_effect !== 'disable') {
		$grocery_ecommerce_custom_css .= '.blogbtn:hover {';
		switch ($grocery_ecommerce_button_hover_effect) {
			case 'pulse':
				$grocery_ecommerce_custom_css .= 'animation: pulse 0.5s ease-in-out;';
				break;
			case 'rubberBand':
				$grocery_ecommerce_custom_css .= 'animation: rubberBand 0.5s ease-in-out;';
				break;
			case 'swing':
				$grocery_ecommerce_custom_css .= 'animation: swing 0.5s ease-in-out;';
				break;
			case 'tada':
				$grocery_ecommerce_custom_css .= 'animation: tada 0.5s ease-in-out;';
				break;
			case 'jello':
				$grocery_ecommerce_custom_css .= 'animation: jello 0.5s ease-in-out;';
				break;
		}
		$grocery_ecommerce_custom_css .= '}';
	}

	//keyframes for all animations
	$grocery_ecommerce_custom_css .= '
	@keyframes pulse {
		0% { transform: scale(1); }
		50% { transform: scale(1.1); }
		100% { transform: scale(1); }
	}

	@keyframes rubberBand {
		0% { transform: scale(1); }
		30% { transform: scaleX(1.25) scaleY(0.75); }
		40% { transform: scaleX(0.75) scaleY(1.25); }
		50% { transform: scale(1); }
	}

	@keyframes swing {
		20% { transform: rotate(15deg); }
		40% { transform: rotate(-10deg); }
		60% { transform: rotate(5deg); }
		80% { transform: rotate(-5deg); }
		100% { transform: rotate(0deg); }
	}

	@keyframes tada {
		0% { transform: scale(1); }
		10%, 20% { transform: scale(0.9) rotate(-3deg); }
		30%, 50%, 70%, 90% { transform: scale(1.1) rotate(3deg); }
		40%, 60%, 80% { transform: scale(1.1) rotate(-3deg); }
		100% { transform: scale(1) rotate(0); }
	}

	@keyframes jello {
		0%, 11.1%, 100% { transform: none; }
		22.2% { transform: skewX(-12.5deg) skewY(-12.5deg); }
		33.3% { transform: skewX(6.25deg) skewY(6.25deg); }
		44.4% { transform: skewX(-3.125deg) skewY(-3.125deg); }
		55.5% { transform: skewX(1.5625deg) skewY(1.5625deg); }
		66.6% { transform: skewX(-0.78125deg) skewY(-0.78125deg); }
		77.7% { transform: skewX(0.390625deg) skewY(0.390625deg); }
		88.8% { transform: skewX(-0.1953125deg) skewY(-0.1953125deg); }
	}';

  	// widgets heading font size
	$grocery_ecommerce_widgets_heading_fontsize = get_theme_mod('grocery_ecommerce_widgets_heading_fontsize',25);
	if($grocery_ecommerce_widgets_heading_fontsize != false){
		$grocery_ecommerce_custom_css .='#footer h3, #footer h2, #footer .wp-block-search__label{';
			$grocery_ecommerce_custom_css .='font-size: '.esc_attr($grocery_ecommerce_widgets_heading_fontsize).'px; ';
		$grocery_ecommerce_custom_css .='}';
	}

	// widgets heading font weight
	$grocery_ecommerce_widgets_heading_font_weight = get_theme_mod('grocery_ecommerce_widgets_heading_font_weight', '600');
  	$grocery_ecommerce_custom_css .='#footer h3, #footer h2, #footer .wp-block-search__label{';
    $grocery_ecommerce_custom_css .='font-weight: '.esc_attr($grocery_ecommerce_widgets_heading_font_weight).';';
  	$grocery_ecommerce_custom_css .='}';

	/*----------- Footer widgets heading alignment -----*/
	$grocery_ecommerce_footer_widgets_heading = get_theme_mod( 'grocery_ecommerce_footer_widgets_heading','Left');
    if($grocery_ecommerce_footer_widgets_heading == 'Left'){
		$grocery_ecommerce_custom_css .='#footer h3{';
		$grocery_ecommerce_custom_css .='text-align: left;';
		$grocery_ecommerce_custom_css .='}';
	}else if($grocery_ecommerce_footer_widgets_heading == 'Center'){
		$grocery_ecommerce_custom_css .='#footer h3{';
			$grocery_ecommerce_custom_css .='text-align: center;';
		$grocery_ecommerce_custom_css .='}';
	}else if($grocery_ecommerce_footer_widgets_heading == 'Right'){
		$grocery_ecommerce_custom_css .='#footer h3{';
			$grocery_ecommerce_custom_css .='text-align: right;';
		$grocery_ecommerce_custom_css .='}';
	}

	// Footer Heading Text Transform
	$grocery_ecommerce_theme_lay = get_theme_mod( 'grocery_ecommerce_footer_text_tranform','Capitalize');
    if($grocery_ecommerce_theme_lay == 'Uppercase'){
		$grocery_ecommerce_custom_css .='#footer h3{';
			$grocery_ecommerce_custom_css .='text-transform: Uppercase;';
		$grocery_ecommerce_custom_css .='}';
	}else if($grocery_ecommerce_theme_lay == 'Lowercase'){
		$grocery_ecommerce_custom_css .='#footer h3{';
			$grocery_ecommerce_custom_css .='text-transform: Lowercase;';
		$grocery_ecommerce_custom_css .='}';
	}
	else if($grocery_ecommerce_theme_lay == 'Capitalize'){
		$grocery_ecommerce_custom_css .='#footer h3{';
			$grocery_ecommerce_custom_css .='text-transform: Capitalize;';
		$grocery_ecommerce_custom_css .='}';
	}		

	// Footer Heading  letter spacing
	$grocery_ecommerce_widgets_heading_letter_spacing = get_theme_mod('grocery_ecommerce_widgets_heading_letter_spacing','');
	$grocery_ecommerce_custom_css .='#footer h3{';
	$grocery_ecommerce_custom_css .='letter-spacing: '.esc_attr($grocery_ecommerce_widgets_heading_letter_spacing).'px;';
	$grocery_ecommerce_custom_css .='}';	

	$grocery_ecommerce_footer_widgets_content = get_theme_mod( 'grocery_ecommerce_footer_widgets_content','Left');
    if($grocery_ecommerce_footer_widgets_content == 'Left'){
		$grocery_ecommerce_custom_css .='#footer .widget ul{';
		$grocery_ecommerce_custom_css .='text-align: left;';
		$grocery_ecommerce_custom_css .='}';
	}else if($grocery_ecommerce_footer_widgets_content == 'Center'){
		$grocery_ecommerce_custom_css .='#footer .widget ul{';
			$grocery_ecommerce_custom_css .='text-align: center;';
		$grocery_ecommerce_custom_css .='}';
	}else if($grocery_ecommerce_footer_widgets_content == 'Right'){
		$grocery_ecommerce_custom_css .='#footer .widget ul{';
			$grocery_ecommerce_custom_css .='text-align: right;';
		$grocery_ecommerce_custom_css .='}';
	}

	/*----------- Copyright css -----*/
	$grocery_ecommerce_copyright_top_padding = get_theme_mod('grocery_ecommerce_top_copyright_padding');
	$grocery_ecommerce_copyright_bottom_padding = get_theme_mod('grocery_ecommerce_bottom_copyright_padding');
	if($grocery_ecommerce_copyright_top_padding != '' || $grocery_ecommerce_copyright_bottom_padding != ''){
		$grocery_ecommerce_custom_css .='.inner{';
			$grocery_ecommerce_custom_css .='padding-top: '.esc_attr($grocery_ecommerce_copyright_top_padding).'px; padding-bottom: '.esc_attr($grocery_ecommerce_copyright_bottom_padding).'px; ';
		$grocery_ecommerce_custom_css .='}';
	}

	$grocery_ecommerce_copyright_alignment = get_theme_mod('grocery_ecommerce_copyright_alignment', 'center');
	if($grocery_ecommerce_copyright_alignment == 'center' ){
		$grocery_ecommerce_custom_css .='#footer .copyright p{';
			$grocery_ecommerce_custom_css .='text-align: '. $grocery_ecommerce_copyright_alignment .';';
		$grocery_ecommerce_custom_css .='}';
	}elseif($grocery_ecommerce_copyright_alignment == 'left' ){
		$grocery_ecommerce_custom_css .='#footer .copyright p{';
			$grocery_ecommerce_custom_css .=' text-align: '. $grocery_ecommerce_copyright_alignment .';';
		$grocery_ecommerce_custom_css .='}';
	}elseif($grocery_ecommerce_copyright_alignment == 'right' ){
		$grocery_ecommerce_custom_css .='#footer .copyright p{';
			$grocery_ecommerce_custom_css .='text-align: '. $grocery_ecommerce_copyright_alignment .';';
		$grocery_ecommerce_custom_css .='}';
	}

	$grocery_ecommerce_copyright_font_size = get_theme_mod('grocery_ecommerce_copyright_font_size');
	$grocery_ecommerce_custom_css .='#footer .copyright p{';
		$grocery_ecommerce_custom_css .='font-size: '.esc_attr($grocery_ecommerce_copyright_font_size).'px;';
	$grocery_ecommerce_custom_css .='}';

	$grocery_ecommerce_copyright_color = get_theme_mod('grocery_ecommerce_copyright_color');
	$grocery_ecommerce_custom_css .='#footer .copyright p,#footer .copyright a{';
		$grocery_ecommerce_custom_css .='color: '.esc_attr($grocery_ecommerce_copyright_color).'!important;';
	$grocery_ecommerce_custom_css .='}';

	$grocery_ecommerce_back_to_top_color = get_theme_mod('grocery_ecommerce_back_to_top_color');
	$grocery_ecommerce_custom_css .='.back-to-top{';
		$grocery_ecommerce_custom_css .='background-color: '.esc_attr($grocery_ecommerce_back_to_top_color).'!important;';
	$grocery_ecommerce_custom_css .='}';
		$grocery_ecommerce_back_to_top_color = get_theme_mod('grocery_ecommerce_back_to_top_color');
	$grocery_ecommerce_custom_css .='.back-to-top::before{';
		$grocery_ecommerce_custom_css .='border-bottom-color: '.esc_attr($grocery_ecommerce_back_to_top_color).'!important;';
	$grocery_ecommerce_custom_css .='}';

	$grocery_ecommerce_back_to_top_text_color = get_theme_mod('grocery_ecommerce_back_to_top_text_color');
	$grocery_ecommerce_custom_css .='.back-to-top{';
		$grocery_ecommerce_custom_css .='color: '.esc_attr($grocery_ecommerce_back_to_top_text_color).'!important;';
	$grocery_ecommerce_custom_css .='}';	

	// back to top icon hover color
	$grocery_ecommerce_scroll_icon_hover_color = get_theme_mod('grocery_ecommerce_scroll_icon_hover_color');
	$grocery_ecommerce_custom_css .='.back-to-top:hover{';
		$grocery_ecommerce_custom_css .='background-color: '.esc_attr($grocery_ecommerce_scroll_icon_hover_color). ' !important;';
	$grocery_ecommerce_custom_css .='}';
		$grocery_ecommerce_scroll_icon_hover_color = get_theme_mod('grocery_ecommerce_scroll_icon_hover_color');
	$grocery_ecommerce_custom_css .='.back-to-top:hover::before{';
		$grocery_ecommerce_custom_css .='border-bottom-color: '.esc_attr($grocery_ecommerce_scroll_icon_hover_color).'!important;';
	$grocery_ecommerce_custom_css .='}';

	/*------ Topbar padding ------*/
	$grocery_ecommerce_top_topbar_padding = get_theme_mod('grocery_ecommerce_top_topbar_padding');
	$grocery_ecommerce_bottom_topbar_padding = get_theme_mod('grocery_ecommerce_bottom_topbar_padding');
	if($grocery_ecommerce_top_topbar_padding != false || $grocery_ecommerce_bottom_topbar_padding != false){
		$grocery_ecommerce_custom_css .='.top-bar, .page-template-custom-front-page .top-bar{';
			$grocery_ecommerce_custom_css .='padding-top: '.esc_attr($grocery_ecommerce_top_topbar_padding).'px !important; padding-bottom: '.esc_attr($grocery_ecommerce_bottom_topbar_padding).'px !important; ';
		$grocery_ecommerce_custom_css .='}';
	}

	// Header Social Icons Font Size
    $grocery_ecommerce_header_icons_font_size = get_theme_mod('grocery_ecommerce_header_icons_font_size', '14');
    $grocery_ecommerce_custom_css .='.woo-icons a,.woo-icons a.cart-icon i{';
        $grocery_ecommerce_custom_css .='font-size: '.esc_attr($grocery_ecommerce_header_icons_font_size).'px;';
    $grocery_ecommerce_custom_css .='}';

	/*------ Woocommerce ----*/
	$grocery_ecommerce_product_border = get_theme_mod('grocery_ecommerce_product_border',true);

	if($grocery_ecommerce_product_border == false){
		$grocery_ecommerce_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$grocery_ecommerce_custom_css .='border: 0;';
		$grocery_ecommerce_custom_css .='}';
	}

	$grocery_ecommerce_product_top = get_theme_mod('grocery_ecommerce_product_top_padding',10);
	$grocery_ecommerce_product_bottom = get_theme_mod('grocery_ecommerce_product_bottom_padding',10);
	$grocery_ecommerce_product_left = get_theme_mod('grocery_ecommerce_product_left_padding',10);
	$grocery_ecommerce_product_right = get_theme_mod('grocery_ecommerce_product_right_padding',10);
	if($grocery_ecommerce_product_top != false || $grocery_ecommerce_product_bottom != false || $grocery_ecommerce_product_left != false || $grocery_ecommerce_product_right != false){
		$grocery_ecommerce_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$grocery_ecommerce_custom_css .='padding-top: '.esc_attr($grocery_ecommerce_product_top).'px; padding-bottom: '.esc_attr($grocery_ecommerce_product_bottom).'px; padding-left: '.esc_attr($grocery_ecommerce_product_left).'px; padding-right: '.esc_attr($grocery_ecommerce_product_right).'px;';
		$grocery_ecommerce_custom_css .='}';
	}

	$grocery_ecommerce_product_border_radius = get_theme_mod('grocery_ecommerce_product_border_radius');
	if($grocery_ecommerce_product_border_radius != false){
		$grocery_ecommerce_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$grocery_ecommerce_custom_css .='border-radius: '.esc_attr($grocery_ecommerce_product_border_radius).'px;';
		$grocery_ecommerce_custom_css .='}';
	}

	$grocery_ecommerce_product_box_shadow = get_theme_mod('grocery_ecommerce_product_box_shadow','0');
	$grocery_ecommerce_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$grocery_ecommerce_custom_css .='box-shadow: '.esc_attr($grocery_ecommerce_product_box_shadow).'px '.esc_attr($grocery_ecommerce_product_box_shadow).'px '.esc_attr($grocery_ecommerce_product_box_shadow).'px #eee;';
	$grocery_ecommerce_custom_css .='}';	

	/*----- WooCommerce button css --------*/
	$grocery_ecommerce_product_button_top = get_theme_mod('grocery_ecommerce_product_button_top_padding',10);
	$grocery_ecommerce_product_button_bottom = get_theme_mod('grocery_ecommerce_product_button_bottom_padding',10);
	$grocery_ecommerce_product_button_left = get_theme_mod('grocery_ecommerce_product_button_left_padding',12);
	$grocery_ecommerce_product_button_right = get_theme_mod('grocery_ecommerce_product_button_right_padding',12);
	if($grocery_ecommerce_product_button_top != false || $grocery_ecommerce_product_button_bottom != false || $grocery_ecommerce_product_button_left != false || $grocery_ecommerce_product_button_right != false){
		$grocery_ecommerce_custom_css .='.woocommerce ul.products li.product .button, .woocommerce div.product form.cart .button, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button, .woocommerce #payment #place_order, .woocommerce-page #payment #place_order, button.woocommerce-button.button.woocommerce-form-login__submit, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled]{';
			$grocery_ecommerce_custom_css .='padding-top: '.esc_attr($grocery_ecommerce_product_button_top).'px; padding-bottom: '.esc_attr($grocery_ecommerce_product_button_bottom).'px; padding-left: '.esc_attr($grocery_ecommerce_product_button_left).'px; padding-right: '.esc_attr($grocery_ecommerce_product_button_right).'px;';
		$grocery_ecommerce_custom_css .='}';
	}

	$grocery_ecommerce_product_button_border_radius = get_theme_mod('grocery_ecommerce_product_button_border_radius');
	if($grocery_ecommerce_product_button_border_radius != false){
		$grocery_ecommerce_custom_css .='.woocommerce ul.products li.product .button, .woocommerce div.product form.cart .button, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button, a.checkout-button.button.alt.wc-forward, .woocommerce #payment #place_order, .woocommerce-page #payment #place_order, button.woocommerce-button.button.woocommerce-form-login__submit{';
			$grocery_ecommerce_custom_css .='border-radius: '.esc_attr($grocery_ecommerce_product_button_border_radius).'px;';
		$grocery_ecommerce_custom_css .='}';
	}

	/*----- WooCommerce product sale css --------*/
	$grocery_ecommerce_product_sale_top = get_theme_mod('grocery_ecommerce_product_sale_top_padding');
	$grocery_ecommerce_product_sale_bottom = get_theme_mod('grocery_ecommerce_product_sale_bottom_padding');
	$grocery_ecommerce_product_sale_left = get_theme_mod('grocery_ecommerce_product_sale_left_padding');
	$grocery_ecommerce_product_sale_right = get_theme_mod('grocery_ecommerce_product_sale_right_padding');
	if($grocery_ecommerce_product_sale_top != false || $grocery_ecommerce_product_sale_bottom != false || $grocery_ecommerce_product_sale_left != false || $grocery_ecommerce_product_sale_right != false){
		$grocery_ecommerce_custom_css .='.woocommerce span.onsale {';
			$grocery_ecommerce_custom_css .='padding-top: '.esc_attr($grocery_ecommerce_product_sale_top).'px; padding-bottom: '.esc_attr($grocery_ecommerce_product_sale_bottom).'px; padding-left: '.esc_attr($grocery_ecommerce_product_sale_left).'px; padding-right: '.esc_attr($grocery_ecommerce_product_sale_right).'px;';
		$grocery_ecommerce_custom_css .='}';
	}

	$grocery_ecommerce_product_sale_border_radius = get_theme_mod('grocery_ecommerce_product_sale_border_radius',0);
	if($grocery_ecommerce_product_sale_border_radius != false){
		$grocery_ecommerce_custom_css .='.woocommerce span.onsale {';
			$grocery_ecommerce_custom_css .='border-radius: '.esc_attr($grocery_ecommerce_product_sale_border_radius).'px;';
		$grocery_ecommerce_custom_css .='}';
	}

	$grocery_ecommerce_menu_case = get_theme_mod('grocery_ecommerce_product_sale_position', 'Right');
	if($grocery_ecommerce_menu_case == 'Right' ){
		$grocery_ecommerce_custom_css .='.woocommerce ul.products li.product .onsale{';
			$grocery_ecommerce_custom_css .=' left:auto; right:0;';
		$grocery_ecommerce_custom_css .='}';
	}elseif($grocery_ecommerce_menu_case == 'Left' ){
		$grocery_ecommerce_custom_css .='.woocommerce ul.products li.product .onsale{';
			$grocery_ecommerce_custom_css .=' left:-10px; right:auto;';
		$grocery_ecommerce_custom_css .='}';
	}

	$grocery_ecommerce_product_sale_font_size = get_theme_mod('grocery_ecommerce_product_sale_font_size',13);
	$grocery_ecommerce_custom_css .='.woocommerce span.onsale {';
		$grocery_ecommerce_custom_css .='font-size: '.esc_attr($grocery_ecommerce_product_sale_font_size).'px;';
	$grocery_ecommerce_custom_css .='}';


	/*---- Comment form ----*/
	$grocery_ecommerce_comment_width = get_theme_mod('grocery_ecommerce_comment_width', '100');
	$grocery_ecommerce_custom_css .='#comments textarea{';
		$grocery_ecommerce_custom_css .=' width:'.esc_attr($grocery_ecommerce_comment_width).'%;';
	$grocery_ecommerce_custom_css .='}';

	$grocery_ecommerce_comment_submit_text = get_theme_mod('grocery_ecommerce_comment_submit_text', 'Post Comment');
	if($grocery_ecommerce_comment_submit_text == ''){
		$grocery_ecommerce_custom_css .='#comments p.form-submit {';
			$grocery_ecommerce_custom_css .='display: none;';
		$grocery_ecommerce_custom_css .='}';
	}

	$grocery_ecommerce_comment_title = get_theme_mod('grocery_ecommerce_comment_title', 'Leave a Reply');
	if($grocery_ecommerce_comment_title == ''){
		$grocery_ecommerce_custom_css .='#comments h2#reply-title {';
			$grocery_ecommerce_custom_css .='display: none;';
		$grocery_ecommerce_custom_css .='}';
	}

	/*------ Footer background css -------*/
	$grocery_ecommerce_footer_bg_color = get_theme_mod('grocery_ecommerce_footer_bg_color');
	if($grocery_ecommerce_footer_bg_color != false){
		$grocery_ecommerce_custom_css .='.footerinner{';
			$grocery_ecommerce_custom_css .='background-color: '.esc_attr($grocery_ecommerce_footer_bg_color).';';
		$grocery_ecommerce_custom_css .='}';
	}

	$grocery_ecommerce_footer_bg_image = get_theme_mod('grocery_ecommerce_footer_bg_image');
	if($grocery_ecommerce_footer_bg_image != false){
		$grocery_ecommerce_custom_css .='.footerinner{';
			$grocery_ecommerce_custom_css .='background: url('.esc_attr($grocery_ecommerce_footer_bg_image).'); background-size: cover;';
		$grocery_ecommerce_custom_css .='}';
	}


	/*-------- Footer Icon Alignment ------*/
	$grocery_ecommerce_footer_icon_alignment = get_theme_mod('grocery_ecommerce_footer_icon_alignment', 'Center');
	if($grocery_ecommerce_footer_icon_alignment == 'Center' ){
		$grocery_ecommerce_custom_css .='#footer .copyright{';
			$grocery_ecommerce_custom_css .='text-align: '. $grocery_ecommerce_footer_icon_alignment .';';
		$grocery_ecommerce_custom_css .='}';
	}elseif($grocery_ecommerce_footer_icon_alignment == 'Left' ){
		$grocery_ecommerce_custom_css .='#footer .copyright{';
			$grocery_ecommerce_custom_css .=' text-align: '. $grocery_ecommerce_footer_icon_alignment .';';
		$grocery_ecommerce_custom_css .='}';
	}elseif($grocery_ecommerce_footer_icon_alignment == 'Right' ){
		$grocery_ecommerce_custom_css .='#footer .copyright{';
			$grocery_ecommerce_custom_css .='text-align: '. $grocery_ecommerce_footer_icon_alignment .';';
		$grocery_ecommerce_custom_css .='}';
	}

	//Footer Social Icon Font size
	$grocery_ecommerce_footer_icon_font_size = get_theme_mod('grocery_ecommerce_footer_icon_font_size');
	$grocery_ecommerce_custom_css .='#footer .copyright a i{';
	$grocery_ecommerce_custom_css .='font-size: '.esc_attr($grocery_ecommerce_footer_icon_font_size).'px;';
	$grocery_ecommerce_custom_css .='}';

    // footer image position
	$grocery_ecommerce_footer_img_position = get_theme_mod('grocery_ecommerce_footer_img_position','center center');
	if($grocery_ecommerce_footer_img_position != false){
		$grocery_ecommerce_custom_css .='.footerinner{';
			$grocery_ecommerce_custom_css .='background-position: '.esc_attr($grocery_ecommerce_footer_img_position).'!important;';
		$grocery_ecommerce_custom_css .='}';
	}	

	// Footer Attatchment
	$grocery_ecommerce_theme_lay = get_theme_mod( 'grocery_ecommerce_footer_attatchment','scroll');
	if($grocery_ecommerce_theme_lay == 'fixed'){
		$grocery_ecommerce_custom_css .='.footerinner{';
			$grocery_ecommerce_custom_css .='background-attachment: fixed;';
		$grocery_ecommerce_custom_css .='}';
	}elseif ($grocery_ecommerce_theme_lay == 'scroll'){
		$grocery_ecommerce_custom_css .='.footerinner{';
			$grocery_ecommerce_custom_css .='background-attachment: scroll;';
		$grocery_ecommerce_custom_css .='}';
	}	
	
	/*---------------------------Footer top bottom padding -------------------*/

	$grocery_ecommerce_footer_padding = get_theme_mod('grocery_ecommerce_footer_padding');
	if($grocery_ecommerce_footer_padding != false){
		$grocery_ecommerce_custom_css .='#footer .footerinner{';
			$grocery_ecommerce_custom_css .='padding: '.esc_attr($grocery_ecommerce_footer_padding).' 0 !important;';
		$grocery_ecommerce_custom_css .='}';
	}

/*---------------------------Footer Style -------------------*/

	$grocery_ecommerce_theme_lay = get_theme_mod( 'grocery_ecommerce_footer_template','grocery_ecommerce-footer-one');
    if($grocery_ecommerce_theme_lay == 'grocery_ecommerce-footer-one'){
		$grocery_ecommerce_custom_css .='.footerinner {';
			$grocery_ecommerce_custom_css .='';
		$grocery_ecommerce_custom_css .='}';

	}else if($grocery_ecommerce_theme_lay == 'grocery_ecommerce-footer-two'){
		$grocery_ecommerce_custom_css .='.footerinner {';
			$grocery_ecommerce_custom_css .='background: #E3F2FD !important;';
		$grocery_ecommerce_custom_css .='}';
		$grocery_ecommerce_custom_css .='.footerinner p,.footerinner span,.footerinner li a,.footerinner #wp-calendar caption,.footerinner #wp-calendar td,.footerinner #wp-calendar th, .footerinner, .footerinner h3, .footerinner a.rsswidget, .footerinner #wp-calendar a, .copyright a, .footerinner .custom_details, .footerinner ins span, .footerinner .tagcloud a, .main-inner-box span.entry-date a, nav.woocommerce-MyAccount-navigation ul li:hover a, #footer ul li a, .footerinner table, .footerinner th, .footerinner td, .footerinner caption, #sidebar caption,.footerinner nav.wp-calendar-nav a,.footerinner .search-form .search-field{';
			$grocery_ecommerce_custom_css .='color:#000 !important;';
		$grocery_ecommerce_custom_css .='}';
		$grocery_ecommerce_custom_css .='#footer p{';
			$grocery_ecommerce_custom_css .='color:#000 !important;';
		$grocery_ecommerce_custom_css .='}';
		$grocery_ecommerce_custom_css .='.footerinner ul li::before{';
			$grocery_ecommerce_custom_css .='background:#000;';
		$grocery_ecommerce_custom_css .='}';
		$grocery_ecommerce_custom_css .='.footerinner table, .footerinner th, .footerinner td,.footerinner.search-form .search-field,.footerinner .tagcloud a{';
			$grocery_ecommerce_custom_css .='border: 1px solid #000;';
		$grocery_ecommerce_custom_css .='}';

	}else if($grocery_ecommerce_theme_lay == 'grocery_ecommerce-footer-three'){
		$grocery_ecommerce_custom_css .='.footerinner {';
			$grocery_ecommerce_custom_css .='background: #0A0A1F !important;;';
		$grocery_ecommerce_custom_css .='}';
	}
	else if($grocery_ecommerce_theme_lay == 'grocery_ecommerce-footer-four'){
		$grocery_ecommerce_custom_css .='.footerinner {';
			$grocery_ecommerce_custom_css .='background: #F5F5DC !important;;';
		$grocery_ecommerce_custom_css .='}';
		$grocery_ecommerce_custom_css .='.footerinner p,.footerinner span,.footerinner li a,.footerinner #wp-calendar caption,.footerinner #wp-calendar td,.footerinner #wp-calendar th, .footerinner, .footerinner h3, .footerinner a.rsswidget, .footerinner #wp-calendar a, .copyright a, .footerinner .custom_details, .footerinner ins span, .footerinner .tagcloud a, .main-inner-box span.entry-date a, nav.woocommerce-MyAccount-navigation ul li:hover a, #footer ul li a, .footerinner table, .footerinner th, .footerinner td, .footerinner caption, #sidebar caption,.footerinner nav.wp-calendar-nav a,.footerinner .search-form .search-field{';
			$grocery_ecommerce_custom_css .='color:#000 !important;';
		$grocery_ecommerce_custom_css .='}';
		$grocery_ecommerce_custom_css .='#footer p{';
			$grocery_ecommerce_custom_css .='color:#000 !important;';
		$grocery_ecommerce_custom_css .='}';
		$grocery_ecommerce_custom_css .='.footerinner ul li::before{';
			$grocery_ecommerce_custom_css .='background:#000;';
		$grocery_ecommerce_custom_css .='}';
		$grocery_ecommerce_custom_css .='.footerinner table, .footerinner th, .footerinner td,.footerinner.search-form .search-field,.footerinner .tagcloud a{';
			$grocery_ecommerce_custom_css .='border: 1px solid #000;';
		$grocery_ecommerce_custom_css .='}';
	}
    else if($grocery_ecommerce_theme_lay == 'grocery_ecommerce-footer-five'){
	$grocery_ecommerce_custom_css .='.footerinner {';
		$grocery_ecommerce_custom_css .='background: #333333 !important;;';
	$grocery_ecommerce_custom_css .='}';
   }	

	/*----- Featured image css -----*/
	$grocery_ecommerce_feature_image_border_radius = get_theme_mod('grocery_ecommerce_feature_image_border_radius');
	if($grocery_ecommerce_feature_image_border_radius != false){
		$grocery_ecommerce_custom_css .='#blog_post .blog-sec img{';
			$grocery_ecommerce_custom_css .='border-radius: '.esc_attr($grocery_ecommerce_feature_image_border_radius).'px;';
		$grocery_ecommerce_custom_css .='}';
	}

	$grocery_ecommerce_feature_image_shadow = get_theme_mod('grocery_ecommerce_feature_image_shadow');
	if($grocery_ecommerce_feature_image_shadow != false){
		$grocery_ecommerce_custom_css .='#blog_post .blog-sec img{';
			$grocery_ecommerce_custom_css .='box-shadow: '.esc_attr($grocery_ecommerce_feature_image_shadow).'px '.esc_attr($grocery_ecommerce_feature_image_shadow).'px '.esc_attr($grocery_ecommerce_feature_image_shadow).'px #aaa;';
		$grocery_ecommerce_custom_css .='}';
	}

	// blog post Pagination Alignment
	$grocery_ecommerce_post_pagination_alignment = get_theme_mod( 'grocery_ecommerce_post_pagination_option','Right');
	if($grocery_ecommerce_post_pagination_alignment == 'Left'){
		$grocery_ecommerce_custom_css .='.navigation nav.pagination{';
			$grocery_ecommerce_custom_css .='justify-content: left;';
		$grocery_ecommerce_custom_css .='}';
	}else if($grocery_ecommerce_post_pagination_alignment == 'Center'){
		$grocery_ecommerce_custom_css .='.navigation nav.pagination{';
			$grocery_ecommerce_custom_css .='justify-content: center;';
		$grocery_ecommerce_custom_css .='}';
	}else if($grocery_ecommerce_post_pagination_alignment == 'Right'){
		$grocery_ecommerce_custom_css .='.navigation nav.pagination{';
			$grocery_ecommerce_custom_css .='justify-content: right;';
		$grocery_ecommerce_custom_css .='}';
	}

	//Blog Post Initial Cap
	$grocery_ecommerce_initial_caps_enable = get_theme_mod('grocery_ecommerce_initial_caps_enable', 'false');
	if($grocery_ecommerce_initial_caps_enable == 'true' ){
		$grocery_ecommerce_custom_css .='.blogger .entry-content p:nth-of-type(1)::first-letter,.blogger p:nth-of-type(1)::first-letter{';
			$grocery_ecommerce_custom_css .=' font-size: 60px!important; font-weight: 800!important;';
		$grocery_ecommerce_custom_css .=' margin-right: 4px;text-transform: uppercase;';
			$grocery_ecommerce_custom_css .=' font-family: "Vollkorn", serif!important;';
		$grocery_ecommerce_custom_css .='}';
	}elseif($grocery_ecommerce_initial_caps_enable == 'false' ){
		$grocery_ecommerce_custom_css .='.blogger .entry-content p:nth-of-type(1)::first-letter,.blogger p:nth-of-type(1)::first-letter{';
			$grocery_ecommerce_custom_css .='display: none!important;';
		$grocery_ecommerce_custom_css .='}';
	}

	/*----- Related posts image css-----*/
	$grocery_ecommerce_related_posts_image_shadow = get_theme_mod('grocery_ecommerce_related_posts_image_shadow');
	if($grocery_ecommerce_related_posts_image_shadow != false){
		$grocery_ecommerce_custom_css .='.related-posts .blog-sec img{';
			$grocery_ecommerce_custom_css .='box-shadow: '.esc_attr($grocery_ecommerce_related_posts_image_shadow).'px '.esc_attr($grocery_ecommerce_related_posts_image_shadow).'px '.esc_attr($grocery_ecommerce_related_posts_image_shadow).'px #aaa;';
		$grocery_ecommerce_custom_css .='}';
	}

	$grocery_ecommerce_related_image_border_radius = get_theme_mod('grocery_ecommerce_related_image_border_radius');
	if($grocery_ecommerce_related_image_border_radius != false){
		$grocery_ecommerce_custom_css .='.related-posts .blog-sec img{';
			$grocery_ecommerce_custom_css .='border-radius: '.esc_attr($grocery_ecommerce_related_image_border_radius).'px;';
		$grocery_ecommerce_custom_css .='}';
	}

	/*----- Related Post display type css ------*/
	$grocery_ecommerce_related_post_display_type = get_theme_mod('grocery_ecommerce_related_post_display_type', 'blocks');
	if($grocery_ecommerce_related_post_display_type == 'without blocks' ){
		$grocery_ecommerce_custom_css .='.related-posts .blog-sec{';
			$grocery_ecommerce_custom_css .='border: 0!important;';
		$grocery_ecommerce_custom_css .='}';
	}
    // Metabox Seperator related post
	$grocery_ecommerce_related_post_metabox_seperator = get_theme_mod('grocery_ecommerce_related_post_metabox_seperator', '|');
	if($grocery_ecommerce_related_post_metabox_seperator != '' ){
		$grocery_ecommerce_custom_css .='.related-posts .blog-sec .post-info span:after{';
			$grocery_ecommerce_custom_css .=' content: "'.esc_attr($grocery_ecommerce_related_post_metabox_seperator).'"; padding-left:10px;';
		$grocery_ecommerce_custom_css .='}';
		$grocery_ecommerce_custom_css .='.related-posts .blog-sec .post-info span:last-child:after{';
			$grocery_ecommerce_custom_css .=' content: none;';
		$grocery_ecommerce_custom_css .='}';
	}	
	/*------ Sticky header padding ------------*/
	$grocery_ecommerce_top_sticky_header_padding = get_theme_mod('grocery_ecommerce_top_sticky_header_padding');
	$grocery_ecommerce_bottom_sticky_header_padding = get_theme_mod('grocery_ecommerce_bottom_sticky_header_padding');
	$grocery_ecommerce_custom_css .=' .fixed-header{';
		$grocery_ecommerce_custom_css .=' padding-top: '.esc_attr($grocery_ecommerce_top_sticky_header_padding).'px; padding-bottom: '.esc_attr($grocery_ecommerce_bottom_sticky_header_padding).'px';
	$grocery_ecommerce_custom_css .='}';

	// featured image dimention
	$grocery_ecommerce_blog_image_dimension = get_theme_mod('grocery_ecommerce_blog_image_dimension', 'default');
	$grocery_ecommerce_feature_image_custom_width = get_theme_mod('grocery_ecommerce_feature_image_custom_width',250);
	$grocery_ecommerce_feature_image_custom_height = get_theme_mod('grocery_ecommerce_feature_image_custom_height',250);
	if($grocery_ecommerce_blog_image_dimension == 'custom'){
		$grocery_ecommerce_custom_css .='#blog_post .blog-sec img{';
			$grocery_ecommerce_custom_css .='width: '.esc_attr($grocery_ecommerce_feature_image_custom_width).'px; height: '.esc_attr($grocery_ecommerce_feature_image_custom_height).'px;';
		$grocery_ecommerce_custom_css .='}';
	}

	/*------ Related products ---------*/
	$grocery_ecommerce_related_products = get_theme_mod('grocery_ecommerce_single_related_products',true);
	if($grocery_ecommerce_related_products == false){
		$grocery_ecommerce_custom_css .=' .related.products{';
			$grocery_ecommerce_custom_css .='display: none;';
		$grocery_ecommerce_custom_css .='}';
	}

	/*-------- Menu Font Size --------*/
	$grocery_ecommerce_menu_font_size = get_theme_mod('grocery_ecommerce_menu_font_size',13);
	if($grocery_ecommerce_menu_font_size != false){
		$grocery_ecommerce_custom_css .='.nav-menu li a{';
			$grocery_ecommerce_custom_css .='font-size: '.esc_attr($grocery_ecommerce_menu_font_size).'px !important;';
		$grocery_ecommerce_custom_css .='}';
	}

	$grocery_ecommerce_menu_font_weight = get_theme_mod('grocery_ecommerce_menu_font_weight');
	$grocery_ecommerce_custom_css .='.nav-menu li a{';
		$grocery_ecommerce_custom_css .='font-weight: '.esc_attr($grocery_ecommerce_menu_font_weight).'!important;';
	$grocery_ecommerce_custom_css .='}';

	// Featured image header
	$header_image_url = grocery_ecommerce_banner_image( $image_url = '' );
	$grocery_ecommerce_custom_css .='#page-site-header{';
		$grocery_ecommerce_custom_css .='background-image: url('. esc_url( $header_image_url ).'); background-size: cover;';
	$grocery_ecommerce_custom_css .='}';

	$grocery_ecommerce_post_featured_image = get_theme_mod('grocery_ecommerce_post_featured_image', 'in-content');
	if($grocery_ecommerce_post_featured_image == 'banner' ){
		$grocery_ecommerce_custom_css .='.single #wrapper h1, .page #wrapper h1, .page #wrapper img{';
			$grocery_ecommerce_custom_css .=' display: none;';
		$grocery_ecommerce_custom_css .='}';
		$grocery_ecommerce_custom_css .='.page-template-custom-front-page #page-site-header{';
			$grocery_ecommerce_custom_css .=' display: none;';
		$grocery_ecommerce_custom_css .='}';
	}

	// Woocommerce Shop page pagination
	$grocery_ecommerce_shop_page_navigation = get_theme_mod('grocery_ecommerce_shop_page_navigation',true);
	if ($grocery_ecommerce_shop_page_navigation == false) {
		$grocery_ecommerce_custom_css .='.woocommerce nav.woocommerce-pagination{';
			$grocery_ecommerce_custom_css .='display: none;';
		$grocery_ecommerce_custom_css .='}';
	}

	/*----- Blog Post display type css ------*/
	$grocery_ecommerce_blog_post_display_type = get_theme_mod('grocery_ecommerce_blog_post_display_type', 'blocks');
	if($grocery_ecommerce_blog_post_display_type == 'without blocks' ){
		$grocery_ecommerce_custom_css .='.blog .blog-sec, .blog #sidebar .widget{';
			$grocery_ecommerce_custom_css .='border: 0;';
		$grocery_ecommerce_custom_css .='}';
	}

	/*---------- Responsive style ---------*/

	$grocery_ecommerce_toggle_button_bg_color_settings = get_theme_mod('grocery_ecommerce_toggle_button_bg_color_settings');
	$grocery_ecommerce_custom_css .='.toggle-menu {';
	$grocery_ecommerce_custom_css .='background-color: '.esc_attr($grocery_ecommerce_toggle_button_bg_color_settings).';';
	$grocery_ecommerce_custom_css .='} ';

	if (get_theme_mod('grocery_ecommerce_hide_topbar_responsive',true) == true && get_theme_mod('grocery_ecommerce_top_header',false) == false) {
		$grocery_ecommerce_custom_css .='.top-bar{';
			$grocery_ecommerce_custom_css .=' display: none;';
		$grocery_ecommerce_custom_css .='} ';
	}

	if (get_theme_mod('grocery_ecommerce_sticky_header_responsive') == false) {
		$grocery_ecommerce_custom_css .='@media screen and (max-width: 575px){
			.sticky{';
			$grocery_ecommerce_custom_css .=' position: static;';
		$grocery_ecommerce_custom_css .='} }';
	}

	if (get_theme_mod('grocery_ecommerce_hide_topbar_responsive',true) == false) {
		$grocery_ecommerce_custom_css .='@media screen and (max-width: 575px){
			.top-bar{';
			$grocery_ecommerce_custom_css .=' display: none;';
		$grocery_ecommerce_custom_css .='} }';
	} else if(get_theme_mod('grocery_ecommerce_hide_topbar_responsive',true) == true){
		$grocery_ecommerce_custom_css .='@media screen and (max-width: 575px){
			.top-bar{';
			$grocery_ecommerce_custom_css .=' display: block;';
		$grocery_ecommerce_custom_css .='} }';
	}

	$grocery_ecommerce_resp_sidebar = get_theme_mod( 'grocery_ecommerce_sidebar_hide_show',true);
    if($grocery_ecommerce_resp_sidebar == true){
    	$grocery_ecommerce_custom_css .='@media screen and (max-width:575px) {';
		$grocery_ecommerce_custom_css .='#sidebar{';
			$grocery_ecommerce_custom_css .='display:block;';
		$grocery_ecommerce_custom_css .='} }';
	}else if($grocery_ecommerce_resp_sidebar == false){
		$grocery_ecommerce_custom_css .='@media screen and (max-width:575px) {';
		$grocery_ecommerce_custom_css .='#sidebar{';
			$grocery_ecommerce_custom_css .='display:none;';
		$grocery_ecommerce_custom_css .='} }';
	}

	// Site title Font Size
	$grocery_ecommerce_site_title_font_size = get_theme_mod('grocery_ecommerce_site_title_font_size', '25');
	$grocery_ecommerce_custom_css .='.logo h1, .logo p.site-title{';
		$grocery_ecommerce_custom_css .='font-size: '.esc_attr($grocery_ecommerce_site_title_font_size).'px;';
	$grocery_ecommerce_custom_css .='}';

	// Site tagline Font Size
	$grocery_ecommerce_site_tagline_font_size = get_theme_mod('grocery_ecommerce_site_tagline_font_size', '14');
	$grocery_ecommerce_custom_css .='.logo p.site-description{';
		$grocery_ecommerce_custom_css .='font-size: '.esc_attr($grocery_ecommerce_site_tagline_font_size).'px;';
	$grocery_ecommerce_custom_css .='}';

	/*---- Slider Content Position -----*/
	$grocery_ecommerce_top_position = get_theme_mod('grocery_ecommerce_slider_top_position');
	$grocery_ecommerce_bottom_position = get_theme_mod('grocery_ecommerce_slider_bottom_position');
	$grocery_ecommerce_left_position = get_theme_mod('grocery_ecommerce_slider_left_position');
	$grocery_ecommerce_right_position = get_theme_mod('grocery_ecommerce_slider_right_position');
	if($grocery_ecommerce_top_position != false || $grocery_ecommerce_bottom_position != false || $grocery_ecommerce_left_position != false || $grocery_ecommerce_right_position != false){
		$grocery_ecommerce_custom_css .='#slider .carousel-caption{';
			$grocery_ecommerce_custom_css .='top: '.esc_attr($grocery_ecommerce_top_position).'%; bottom: '.esc_attr($grocery_ecommerce_bottom_position).'%; left: '.esc_attr($grocery_ecommerce_left_position).'%; right: '.esc_attr($grocery_ecommerce_right_position).'%;';
		$grocery_ecommerce_custom_css .='}';
	}

	// Slider Arrows hover color
	$grocery_ecommerce_slider_arrows_hover_color = get_theme_mod('grocery_ecommerce_slider_arrows_hover_color','var(--secondary-color)');
	$grocery_ecommerce_custom_css .='#slider .carousel-control-prev-icon:hover,#slider .carousel-control-next-icon:hover{';
			$grocery_ecommerce_custom_css .='background-color: '.esc_attr($grocery_ecommerce_slider_arrows_hover_color).' !important;';
	$grocery_ecommerce_custom_css .='}';

	/*--------------------------- Slider Opacity -------------------*/
	$grocery_ecommerce_theme_lay = get_theme_mod( 'grocery_ecommerce_slider_image_opacity','0.7');
	if($grocery_ecommerce_theme_lay == '0'){
		$grocery_ecommerce_custom_css .='#slider img{';
			$grocery_ecommerce_custom_css .='opacity:0';
		$grocery_ecommerce_custom_css .='}';
		}else if($grocery_ecommerce_theme_lay == '0.1'){
		$grocery_ecommerce_custom_css .='#slider img{';
			$grocery_ecommerce_custom_css .='opacity:0.1';
		$grocery_ecommerce_custom_css .='}';
		}else if($grocery_ecommerce_theme_lay == '0.2'){
		$grocery_ecommerce_custom_css .='#slider img{';
			$grocery_ecommerce_custom_css .='opacity:0.2';
		$grocery_ecommerce_custom_css .='}';
		}else if($grocery_ecommerce_theme_lay == '0.3'){
		$grocery_ecommerce_custom_css .='#slider img{';
			$grocery_ecommerce_custom_css .='opacity:0.3';
		$grocery_ecommerce_custom_css .='}';
		}else if($grocery_ecommerce_theme_lay == '0.4'){
		$grocery_ecommerce_custom_css .='#slider img{';
			$grocery_ecommerce_custom_css .='opacity:0.4';
		$grocery_ecommerce_custom_css .='}';
		}else if($grocery_ecommerce_theme_lay == '0.5'){
		$grocery_ecommerce_custom_css .='#slider img{';
			$grocery_ecommerce_custom_css .='opacity:0.5';
		$grocery_ecommerce_custom_css .='}';
		}else if($grocery_ecommerce_theme_lay == '0.6'){
		$grocery_ecommerce_custom_css .='#slider img{';
			$grocery_ecommerce_custom_css .='opacity:0.6';
		$grocery_ecommerce_custom_css .='}';
		}else if($grocery_ecommerce_theme_lay == '0.7'){
		$grocery_ecommerce_custom_css .='#slider img{';
			$grocery_ecommerce_custom_css .='opacity:0.7';
		$grocery_ecommerce_custom_css .='}';
		}else if($grocery_ecommerce_theme_lay == '0.8'){
		$grocery_ecommerce_custom_css .='#slider img{';
			$grocery_ecommerce_custom_css .='opacity:0.8';
		$grocery_ecommerce_custom_css .='}';
		}else if($grocery_ecommerce_theme_lay == '0.9'){
		$grocery_ecommerce_custom_css .='#slider img{';
			$grocery_ecommerce_custom_css .='opacity:0.9';
		$grocery_ecommerce_custom_css .='}';
		}

	// slider overlay
	$grocery_ecommerce_slider_overlay = get_theme_mod('grocery_ecommerce_slider_overlay', true);
	if($grocery_ecommerce_slider_overlay == false){
		$grocery_ecommerce_custom_css .='#slider img{';
			$grocery_ecommerce_custom_css .='opacity:1;';
		$grocery_ecommerce_custom_css .='}';
	} 
	$grocery_ecommerce_slider_image_overlay_color = get_theme_mod('grocery_ecommerce_slider_image_overlay_color');
	if($grocery_ecommerce_slider_overlay != false){
		$grocery_ecommerce_custom_css .='#slider .carousel-item{';
			$grocery_ecommerce_custom_css .='background-color: '.esc_attr($grocery_ecommerce_slider_image_overlay_color).'!important;';
		$grocery_ecommerce_custom_css .='}';
	}	

	/*-----------Slider Content Layout ----------------*/

	$grocery_ecommerce_slider_layout = get_theme_mod( 'grocery_ecommerce_slider_alignment_option','Left Align');
    if($grocery_ecommerce_slider_layout == 'Left Align'){
    	$grocery_ecommerce_custom_css .='@media screen and (min-width:721px) {';
		$grocery_ecommerce_custom_css .='#slider .carousel-caption, #slider .inner_carousel{';
			$grocery_ecommerce_custom_css .='text-align:left;';
		$grocery_ecommerce_custom_css .='}';
		$grocery_ecommerce_custom_css .='#slider .carousel-caption{';
		$grocery_ecommerce_custom_css .='left:5%; right:55%;';
		$grocery_ecommerce_custom_css .='}}';
	}else if($grocery_ecommerce_slider_layout == 'Center Align'){
		$grocery_ecommerce_custom_css .='#slider .carousel-caption, #slider .inner_carousel{';
			$grocery_ecommerce_custom_css .='text-align:center;';
		$grocery_ecommerce_custom_css .='}';
		$grocery_ecommerce_custom_css .='#slider .carousel-caption{';
		$grocery_ecommerce_custom_css .='left:25%; right:25%;';
		$grocery_ecommerce_custom_css .='}';
	}else if($grocery_ecommerce_slider_layout == 'Right Align'){
		$grocery_ecommerce_custom_css .='@media screen and (min-width:721px) {';
		$grocery_ecommerce_custom_css .='#slider .carousel-caption, #slider .inner_carousel{';
			$grocery_ecommerce_custom_css .='text-align:right;';
		$grocery_ecommerce_custom_css .='}';
		$grocery_ecommerce_custom_css .='#slider .carousel-caption{';
		$grocery_ecommerce_custom_css .='left:55%; right:5%;';
		$grocery_ecommerce_custom_css .='}}';
	}	

	/*-------- Blog Post Alignment ------*/
	$grocery_ecommerce_post_alignment = get_theme_mod('grocery_ecommerce_blog_post_alignment', 'center');
	if($grocery_ecommerce_post_alignment == 'left' ){
		$grocery_ecommerce_custom_css .='.blog-sec, .blog-sec h2, .post-info, .blog-sec .blogbtn{';
			$grocery_ecommerce_custom_css .=' text-align: '. $grocery_ecommerce_post_alignment .'!important;';
		$grocery_ecommerce_custom_css .='}';
	}elseif($grocery_ecommerce_post_alignment == 'right' ){
		$grocery_ecommerce_custom_css .='.blog-sec, .blog-sec h2, .post-info, .blog-sec .blogbtn{';
			$grocery_ecommerce_custom_css .='text-align: '. $grocery_ecommerce_post_alignment .'!important;';
		$grocery_ecommerce_custom_css .='}';
	}	

	// responsive settings
	if (get_theme_mod('grocery_ecommerce_preloader_responsive',false) == true && get_theme_mod('grocery_ecommerce_preloader',false) == false) {
		$grocery_ecommerce_custom_css .='@media screen and (min-width: 575px){
			.preloader, #overlayer, .tg-loader{';
			$grocery_ecommerce_custom_css .=' visibility: hidden;';
		$grocery_ecommerce_custom_css .='} }';
	}
	if (get_theme_mod('grocery_ecommerce_preloader_responsive',false) == false) {
		$grocery_ecommerce_custom_css .='@media screen and (max-width: 575px){
			.preloader, #overlayer, .tg-loader{';
			$grocery_ecommerce_custom_css .=' visibility: hidden;';
		$grocery_ecommerce_custom_css .='} }';
	}

	// scroll to top
	$grocery_ecommerce_scroll = get_theme_mod( 'grocery_ecommerce_backtotop_responsive',true);
	if (get_theme_mod('grocery_ecommerce_backtotop_responsive',true) == true && get_theme_mod('grocery_ecommerce_hide_scroll',true) == false) {
    	$grocery_ecommerce_custom_css .='.show-back-to-top{';
			$grocery_ecommerce_custom_css .='visibility: hidden !important;';
		$grocery_ecommerce_custom_css .='} ';
	}
    if($grocery_ecommerce_scroll == true){
    	$grocery_ecommerce_custom_css .='@media screen and (max-width:575px) {';
		$grocery_ecommerce_custom_css .='.show-back-to-top{';
			$grocery_ecommerce_custom_css .='visibility: visible !important;';
		$grocery_ecommerce_custom_css .='} }';
	}else if($grocery_ecommerce_scroll == false){
		$grocery_ecommerce_custom_css .='@media screen and (max-width:575px) {';
		$grocery_ecommerce_custom_css .='.show-back-to-top{';
			$grocery_ecommerce_custom_css .='visibility: hidden !important;';
		$grocery_ecommerce_custom_css .='} }';
	}

	/*------ Footer background css -------*/
	$grocery_ecommerce_copyright_bg_color = get_theme_mod('grocery_ecommerce_copyright_bg_color');
	if($grocery_ecommerce_copyright_bg_color != false){
		$grocery_ecommerce_custom_css .='.inner{';
			$grocery_ecommerce_custom_css .='background-color: '.esc_attr($grocery_ecommerce_copyright_bg_color).';';
		$grocery_ecommerce_custom_css .='}';
	}

	//footer icon color
	$grocery_ecommerce_footer_icon_color = get_theme_mod('grocery_ecommerce_footer_icon_color', '#fff');
	$grocery_ecommerce_custom_css .='#footer .copyright a i{';
		$grocery_ecommerce_custom_css .='color: '.esc_attr($grocery_ecommerce_footer_icon_color).'!important;';
	$grocery_ecommerce_custom_css .='}';	

	// site logo padding 
	$grocery_ecommerce_logo_spacing = get_theme_mod('grocery_ecommerce_logo_spacing', '');
	$grocery_ecommerce_custom_css .='.logo{';
	$grocery_ecommerce_custom_css .='padding: '.esc_attr($grocery_ecommerce_logo_spacing).'px;';
	$grocery_ecommerce_custom_css .='}';

	// site title color
	$grocery_ecommerce_site_title_text_color = get_theme_mod('grocery_ecommerce_site_title_text_color');
	$grocery_ecommerce_custom_css .='.logo h1 a, .logo p.site-title a{';
		$grocery_ecommerce_custom_css .='color: '.esc_attr($grocery_ecommerce_site_title_text_color).' !important;';
	$grocery_ecommerce_custom_css .='}';

	// site tagline color
	$grocery_ecommerce_site_tagline_text_color = get_theme_mod('grocery_ecommerce_site_tagline_text_color');
	$grocery_ecommerce_custom_css .='.logo p.site-description{';
		$grocery_ecommerce_custom_css .='color: '.esc_attr($grocery_ecommerce_site_tagline_text_color).' !important;';
	$grocery_ecommerce_custom_css .='}';

	// responsive slider
	if (get_theme_mod('grocery_ecommerce_slider_responsive',true) == true && get_theme_mod('grocery_ecommerce_show_slider',false) == false) {
		$grocery_ecommerce_custom_css .='@media screen and (min-width: 575px){
			#slider{';
			$grocery_ecommerce_custom_css .=' display: none;';
		$grocery_ecommerce_custom_css .='} }';
	}
	if (get_theme_mod('grocery_ecommerce_slider_responsive',true) == false) {
		$grocery_ecommerce_custom_css .='@media screen and (max-width: 575px){
			#slider{';
			$grocery_ecommerce_custom_css .=' display: none;';
		$grocery_ecommerce_custom_css .='} }';
	}

	// slider button
	if (get_theme_mod('grocery_ecommerce_slider_button_responsive',true) == true && get_theme_mod('grocery_ecommerce_slider_button',true) == false) {
		$grocery_ecommerce_custom_css .='@media screen and (min-width: 575px){
			.read-more{';
			$grocery_ecommerce_custom_css .=' display: none;';
		$grocery_ecommerce_custom_css .='} }';
	}
	if (get_theme_mod('grocery_ecommerce_slider_button_responsive',true) == false) {
		$grocery_ecommerce_custom_css .='@media screen and (max-width: 575px){
			.read-more{';
			$grocery_ecommerce_custom_css .=' display: none;';
		$grocery_ecommerce_custom_css .='} }';
	}

	// Slider Button color
	$grocery_ecommerce_slider_btn_color = get_theme_mod('grocery_ecommerce_slider_btn_color','#fff');
	$grocery_ecommerce_custom_css .='.read-more a{';
			$grocery_ecommerce_custom_css .='color: '.esc_attr($grocery_ecommerce_slider_btn_color).' !important;';
	$grocery_ecommerce_custom_css .='}';

	// Slider button bg color
	$grocery_ecommerce_slider_btn_bg_color = get_theme_mod('grocery_ecommerce_slider_btn_bg_color','var(--primary-color)');
	$grocery_ecommerce_custom_css .='.read-more a{';
			$grocery_ecommerce_custom_css .='background: '.esc_attr($grocery_ecommerce_slider_btn_bg_color).' !important;';
	$grocery_ecommerce_custom_css .='}';

	// Slider button border radius
	$grocery_ecommerce_slider_btn_border_radius = get_theme_mod('grocery_ecommerce_slider_btn_border_radius','5');
	$grocery_ecommerce_custom_css .='.read-more a{';
		$grocery_ecommerce_custom_css .='border-radius: '.esc_attr($grocery_ecommerce_slider_btn_border_radius).'px !important;';
	$grocery_ecommerce_custom_css .='}';

	// Slider button lable hover color
	$grocery_ecommerce_slider_btn_lable_hover_color = get_theme_mod('grocery_ecommerce_slider_btn_lable_hover_color','#fff');
	$grocery_ecommerce_custom_css .='.read-more a:hover{';
			$grocery_ecommerce_custom_css .='color: '.esc_attr($grocery_ecommerce_slider_btn_lable_hover_color).' !important;';
	$grocery_ecommerce_custom_css .='}';

	// Slider button bg hover color
	$grocery_ecommerce_slider_btn_bg_hover_color = get_theme_mod('grocery_ecommerce_slider_btn_bg_hover_color','var(--secondary-color)');
	$grocery_ecommerce_custom_css .='#slider .read-more a:hover{';
			$grocery_ecommerce_custom_css .='background: '.esc_attr($grocery_ecommerce_slider_btn_bg_hover_color).';';
	$grocery_ecommerce_custom_css .='}';

	/*---- Slider Height ------*/
	$grocery_ecommerce_slider_height = get_theme_mod('grocery_ecommerce_slider_height');
	$grocery_ecommerce_custom_css .='#slider img{';
		$grocery_ecommerce_custom_css .='height: '.esc_attr($grocery_ecommerce_slider_height).'px;';
	$grocery_ecommerce_custom_css .='}';
	$grocery_ecommerce_custom_css .='@media screen and (max-width: 768px){
		#slider img{';
		$grocery_ecommerce_custom_css .='height: auto;';
	$grocery_ecommerce_custom_css .='} }';

	// Metabox Seperator
	$grocery_ecommerce_metabox_seperator = get_theme_mod('grocery_ecommerce_metabox_seperator','|');
	if($grocery_ecommerce_metabox_seperator != '' ){
		$grocery_ecommerce_custom_css .='#blog_post .blog-sec .post-info span:after{';
			$grocery_ecommerce_custom_css .=' content: "'.esc_attr($grocery_ecommerce_metabox_seperator).'"; padding-left:10px;';
		$grocery_ecommerce_custom_css .='}';
		$grocery_ecommerce_custom_css .='#blog_post .blog-sec .post-info span:last-child:after{';
			$grocery_ecommerce_custom_css .=' content: none;';
		$grocery_ecommerce_custom_css .='}';
	}

	// Metabox Seperator Single post
	$grocery_ecommerce_single_post_metabox_seperator = get_theme_mod('grocery_ecommerce_single_post_metabox_seperator','|');
	if($grocery_ecommerce_single_post_metabox_seperator != '' ){
		$grocery_ecommerce_custom_css .='.post-info span:after{';
			$grocery_ecommerce_custom_css .=' content: "'.esc_attr($grocery_ecommerce_single_post_metabox_seperator).'"; padding-left:10px;';
		$grocery_ecommerce_custom_css .='}';
		$grocery_ecommerce_custom_css .='.post-info span:last-child:after{';
			$grocery_ecommerce_custom_css .=' content: none;';
		$grocery_ecommerce_custom_css .='}';
	}

	// Metabox Seperator Grid post
	$grocery_ecommerce_grid_post_metabox_seperator = get_theme_mod('grocery_ecommerce_grid_post_metabox_seperator','|');
	if($grocery_ecommerce_grid_post_metabox_seperator != '' ){
		$grocery_ecommerce_custom_css .='.grid-post-info span:after{';
			$grocery_ecommerce_custom_css .=' content: "'.esc_attr($grocery_ecommerce_grid_post_metabox_seperator).'"; padding-left:10px;';
		$grocery_ecommerce_custom_css .='}';
		$grocery_ecommerce_custom_css .='.grid-post-info span:last-child:after{';
			$grocery_ecommerce_custom_css .=' content: none;';
		$grocery_ecommerce_custom_css .='}';
	}

	/*----- grid Post display type css ------*/
	$grocery_ecommerce_grid_post_display_type = get_theme_mod('grocery_ecommerce_grid_post_display_type', 'blocks');
	if($grocery_ecommerce_grid_post_display_type == 'without blocks' ){
		$grocery_ecommerce_custom_css .='.grid-sec{';
			$grocery_ecommerce_custom_css .='border: 0;';
		$grocery_ecommerce_custom_css .='}';
	}
	 /*----- grid Post css ------*/
	 $grocery_ecommerce_grid_post_image_border_radius = get_theme_mod('grocery_ecommerce_grid_post_image_border_radius');
	 if($grocery_ecommerce_grid_post_image_border_radius != false){
		 $grocery_ecommerce_custom_css .='.grid-sec img{';
			 $grocery_ecommerce_custom_css .='border-radius: '.esc_attr($grocery_ecommerce_grid_post_image_border_radius).'px;';
		 $grocery_ecommerce_custom_css .='}';
	 }
 
	$grocery_ecommerce_grid_posts_image_shadow = get_theme_mod('grocery_ecommerce_grid_posts_image_shadow');
	if($grocery_ecommerce_grid_posts_image_shadow != false){
		$grocery_ecommerce_custom_css .='.grid-sec img{';
			$grocery_ecommerce_custom_css .='box-shadow: '.esc_attr($grocery_ecommerce_grid_posts_image_shadow).'px '.esc_attr($grocery_ecommerce_grid_posts_image_shadow).'px '.esc_attr($grocery_ecommerce_grid_posts_image_shadow).'px #aaa;';
		$grocery_ecommerce_custom_css .='}';
	}

	/*-------- grid post Alignment ------*/
	$grocery_ecommerce_grid_alignment = get_theme_mod('grocery_ecommerce_grid_alignment', 'center');
	if($grocery_ecommerce_grid_alignment == 'left' ){
		$grocery_ecommerce_custom_css .='.grid-sec, .grid-sec h2, .grid-post-info, .grid-sec .entry-content, .grid-sec .blogbtn{';
			$grocery_ecommerce_custom_css .=' text-align: '. $grocery_ecommerce_grid_alignment .'!important;';
		$grocery_ecommerce_custom_css .='}';
	}elseif($grocery_ecommerce_grid_alignment == 'right' ){
		$grocery_ecommerce_custom_css .='.grid-sec, .grid-sec h2, .grid-post-info, .grid-sec .entry-content, .grid-sec .blogbtn{';
			$grocery_ecommerce_custom_css .='text-align: '. $grocery_ecommerce_grid_alignment .'!important;';
		$grocery_ecommerce_custom_css .='}';
	}	

	// menu padding
	$grocery_ecommerce_menu_padding = get_theme_mod('grocery_ecommerce_menu_padding',10);
	$grocery_ecommerce_custom_css .='.nav-menu ul li a, .sf-arrows ul .sf-with-ul, .sf-arrows .sf-with-ul{';
		$grocery_ecommerce_custom_css .='padding-top: '.esc_attr($grocery_ecommerce_menu_padding).'px;';
		$grocery_ecommerce_custom_css .='padding-bottom: '.esc_attr($grocery_ecommerce_menu_padding).'px;';
	$grocery_ecommerce_custom_css .='}';

	// menu text transform
	$grocery_ecommerce_theme_lay = get_theme_mod( 'grocery_ecommerce_text_tranform_menu','Uppercase');
    if($grocery_ecommerce_theme_lay == 'Uppercase'){
		$grocery_ecommerce_custom_css .='.nav-menu ul li a{';
			$grocery_ecommerce_custom_css .='';
		$grocery_ecommerce_custom_css .='}';
	}else if($grocery_ecommerce_theme_lay == 'Lowercase'){
		$grocery_ecommerce_custom_css .='.nav-menu ul li a{';
			$grocery_ecommerce_custom_css .='text-transform: lowercase;';
		$grocery_ecommerce_custom_css .='}';
	}
	else if($grocery_ecommerce_theme_lay == 'Capitalize'){
		$grocery_ecommerce_custom_css .='.nav-menu ul li a{';
			$grocery_ecommerce_custom_css .='text-transform: Capitalize;';
		$grocery_ecommerce_custom_css .='}';
	}

	$grocery_ecommerce_menus_item = get_theme_mod( 'grocery_ecommerce_menus_item_style','None');
    if($grocery_ecommerce_menus_item == 'None'){
		$grocery_ecommerce_custom_css .='.nav-menu ul li a{';
			$grocery_ecommerce_custom_css .='';
		$grocery_ecommerce_custom_css .='}';
	}else if($grocery_ecommerce_menus_item == 'Zoom In'){
		$grocery_ecommerce_custom_css .='.nav-menu ul li a:hover{';
			$grocery_ecommerce_custom_css .='transition: all 0.3s ease-in-out !important; transform: scale(1.2) !important;';
		$grocery_ecommerce_custom_css .='}';
	}else if ($grocery_ecommerce_menus_item == 'Underline Expand') { 
		$grocery_ecommerce_custom_css .= '.nav-menu ul li a { position: relative; text-decoration: none; }';
		$grocery_ecommerce_custom_css .= '.nav-menu ul li a::before {';
			$grocery_ecommerce_custom_css .= 'content: ""; position: absolute; left: 50%; bottom: calc(' . esc_attr($grocery_ecommerce_menu_padding) . 'px / 2); width: 0; height: 3px; background-color: currentColor; opacity: 0;';
			$grocery_ecommerce_custom_css .= 'transition: width 0.5s ease, left 0.5s ease, opacity 0.3s ease;';
		$grocery_ecommerce_custom_css .= '}';
		$grocery_ecommerce_custom_css .= '.nav-menu ul li a:hover::before {';
			$grocery_ecommerce_custom_css .= 'width: 100%; left: 0; opacity: 1;';
		$grocery_ecommerce_custom_css .= '}';
	}				

	// menu color
	$grocery_ecommerce_menu_color = get_theme_mod('grocery_ecommerce_menu_color');
	$grocery_ecommerce_custom_css .='.nav-menu a,.nav-menu .current_page_item > a, .nav-menu .current-menu-item > a, .nav-menu .current_page_ancestor > a{';
			$grocery_ecommerce_custom_css .='color: '.esc_attr($grocery_ecommerce_menu_color).' !important;';
	$grocery_ecommerce_custom_css .='}';
	$grocery_ecommerce_custom_css .='.nav-menu ul li.current_page_item a:before{';
			$grocery_ecommerce_custom_css .='background-color: '.esc_attr($grocery_ecommerce_menu_color).' !important;';
	$grocery_ecommerce_custom_css .='}';

	// menu hover color
	$grocery_ecommerce_menu_hover_color = get_theme_mod('grocery_ecommerce_menu_hover_color');
	$grocery_ecommerce_custom_css .='.nav-menu a:hover, .nav-menu ul li a:hover{';
			$grocery_ecommerce_custom_css .='color: '.esc_attr($grocery_ecommerce_menu_hover_color).' !important;';
	$grocery_ecommerce_custom_css .='}';
	$grocery_ecommerce_custom_css .='.nav-menu ul li a:before{';
			$grocery_ecommerce_custom_css .='background-color: '.esc_attr($grocery_ecommerce_menu_hover_color).' !important;';
	$grocery_ecommerce_custom_css .='}';

	// Submenu color
	$grocery_ecommerce_submenu_menu_color = get_theme_mod('grocery_ecommerce_submenu_menu_color');
	$grocery_ecommerce_custom_css .='.nav-menu ul.sub-menu a, .nav-menu ul.sub-menu li a,.nav-menu ul.children a, .nav-menu ul.children li a{';
			$grocery_ecommerce_custom_css .='color: '.esc_attr($grocery_ecommerce_submenu_menu_color).' !important;';
	$grocery_ecommerce_custom_css .='}';

	// submenu hover color
	$grocery_ecommerce_submenu_hover_color = get_theme_mod('grocery_ecommerce_submenu_hover_color');
	$grocery_ecommerce_custom_css .='.nav-menu ul.sub-menu a:hover, .nav-menu ul.sub-menu li a:hover.nav-menu ul.children a:hover, .nav-menu ul.children li a:hover{';
			$grocery_ecommerce_custom_css .='color: '.esc_attr($grocery_ecommerce_submenu_hover_color).' !important;';
	$grocery_ecommerce_custom_css .='}';

	// Breadcrumb Alignmennt
	$grocery_ecommerce_single_page_breadcrumb_alignment = get_theme_mod('grocery_ecommerce_single_page_breadcrumb_alignment', 'Left');
	if($grocery_ecommerce_single_page_breadcrumb_alignment == 'Center' ){
		$grocery_ecommerce_custom_css .='.bradcrumbs{';
			$grocery_ecommerce_custom_css .='text-align: '. $grocery_ecommerce_single_page_breadcrumb_alignment .';';
		$grocery_ecommerce_custom_css .='}';
	}elseif($grocery_ecommerce_single_page_breadcrumb_alignment == 'Left' ){
		$grocery_ecommerce_custom_css .='.bradcrumbs{';
			$grocery_ecommerce_custom_css .=' text-align: '. $grocery_ecommerce_single_page_breadcrumb_alignment .';';
		$grocery_ecommerce_custom_css .='}';
	}elseif($grocery_ecommerce_single_page_breadcrumb_alignment == 'Right' ){
		$grocery_ecommerce_custom_css .='.bradcrumbs{';
			$grocery_ecommerce_custom_css .='text-align: '. $grocery_ecommerce_single_page_breadcrumb_alignment .';';
		$grocery_ecommerce_custom_css .='}';
	}

	// Breadcrumb color option
	$grocery_ecommerce_breadcrumb_color = get_theme_mod('grocery_ecommerce_breadcrumb_color');
	$grocery_ecommerce_custom_css .='.bradcrumbs a,.bradcrumbs span{';
		$grocery_ecommerce_custom_css .='color: '.esc_attr($grocery_ecommerce_breadcrumb_color).'!important;';
	$grocery_ecommerce_custom_css .='}';

	// Breadcrumb bg color option
	$grocery_ecommerce_breadcrumb_background_color = get_theme_mod('grocery_ecommerce_breadcrumb_background_color');
	$grocery_ecommerce_custom_css .='.bradcrumbs a,.bradcrumbs span{';
		$grocery_ecommerce_custom_css .='background-color: '.esc_attr($grocery_ecommerce_breadcrumb_background_color).'!important;';
	$grocery_ecommerce_custom_css .='}';

	// Breadcrumb hover color option
	$grocery_ecommerce_breadcrumb_hover_color = get_theme_mod('grocery_ecommerce_breadcrumb_hover_color');
	$grocery_ecommerce_custom_css .='.bradcrumbs a:hover{';
		$grocery_ecommerce_custom_css .='color: '.esc_attr($grocery_ecommerce_breadcrumb_hover_color).'!important;';
	$grocery_ecommerce_custom_css .='}';

	// Breadcrumb hover bg color option
	$grocery_ecommerce_breadcrumb_hover_bg_color = get_theme_mod('grocery_ecommerce_breadcrumb_hover_bg_color');
	$grocery_ecommerce_custom_css .='#maincontent .bradcrumbs a:hover{';
		$grocery_ecommerce_custom_css .='background-color: '.esc_attr($grocery_ecommerce_breadcrumb_hover_bg_color).'!important;';
	$grocery_ecommerce_custom_css .='}';


	// Single post image border radious
	$grocery_ecommerce_single_post_img_border_radius = get_theme_mod('grocery_ecommerce_single_post_img_border_radius', 0);
	$grocery_ecommerce_custom_css .='.feature-box img{';
		$grocery_ecommerce_custom_css .='border-radius: '.esc_attr($grocery_ecommerce_single_post_img_border_radius).'px;';
	$grocery_ecommerce_custom_css .='}';

	// Single post image box shadow
	$grocery_ecommerce_single_post_img_box_shadow = get_theme_mod('grocery_ecommerce_single_post_img_box_shadow',0);
	$grocery_ecommerce_custom_css .='.feature-box img{';
		$grocery_ecommerce_custom_css .='box-shadow: '.esc_attr($grocery_ecommerce_single_post_img_box_shadow).'px '.esc_attr($grocery_ecommerce_single_post_img_box_shadow).'px '.esc_attr($grocery_ecommerce_single_post_img_box_shadow).'px #ccc;';
	$grocery_ecommerce_custom_css .='}';

	// single post image dimention
	$grocery_ecommerce_single_post_image_dimension = get_theme_mod('grocery_ecommerce_single_post_image_dimension', 'default');
	$grocery_ecommerce_single_post_image_custom_width = get_theme_mod('grocery_ecommerce_single_post_image_custom_width',400);
	$grocery_ecommerce_single_post_image_custom_height = get_theme_mod('grocery_ecommerce_single_post_image_custom_height',400);
	if($grocery_ecommerce_single_post_image_dimension == 'custom'){
		$grocery_ecommerce_custom_css .='.singlepost-page .feature-box img{';
			$grocery_ecommerce_custom_css .='width: '.esc_attr($grocery_ecommerce_single_post_image_custom_width).'px; height: '.esc_attr($grocery_ecommerce_single_post_image_custom_height).'px;';
		$grocery_ecommerce_custom_css .='}';
	}

	// Button Font Size
	$grocery_ecommerce_button_font_size = get_theme_mod('grocery_ecommerce_button_font_size', '16');
	$grocery_ecommerce_custom_css .='.blogbtn a{';
		$grocery_ecommerce_custom_css .='font-size: '.esc_attr($grocery_ecommerce_button_font_size).'px;';
	$grocery_ecommerce_custom_css .='}';

	// sticky sidebar
	$grocery_ecommerce_sticky_sidebar = get_theme_mod('grocery_ecommerce_sticky_sidebar');
	if ( $grocery_ecommerce_sticky_sidebar ) {
		$grocery_ecommerce_custom_css .= '@media (min-width: 768px) {';
			$grocery_ecommerce_custom_css .= '#sidebar {';
				$grocery_ecommerce_custom_css .= 'position: sticky;';
				$grocery_ecommerce_custom_css .= 'top: 25px;';
				$grocery_ecommerce_custom_css .= 'align-self: start;';
			$grocery_ecommerce_custom_css .= '}';
		$grocery_ecommerce_custom_css .= '}';
	}