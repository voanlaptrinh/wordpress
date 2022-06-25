<?php

	$vcard_cv_resume_custom_css= "";

	/*-----------------First Highlight Color -------------------*/

	$vcard_cv_resume_first_color = get_theme_mod('vcard_cv_resume_first_color');

	if($vcard_cv_resume_first_color != false){
		$vcard_cv_resume_custom_css .='.main-navigation ul.sub-menu>li>a:before, .view-all-btn a,.more-btn a,#comments input[type="submit"],#comments a.comment-reply-link,input[type="submit"],.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,nav.woocommerce-MyAccount-navigation ul li,.pro-button a, #preloader, #footer-2, .scrollup i, #sidebar h3, .pagination span, .pagination a, .widget_product_search button, #sidebar .wp-block-search .wp-block-search__label{';
			$vcard_cv_resume_custom_css .='background-color: '.esc_attr($vcard_cv_resume_first_color).';';
		$vcard_cv_resume_custom_css .='}';
	}

	if($vcard_cv_resume_first_color != false){
		$vcard_cv_resume_custom_css .='h1, h2, h3, h4, h5, h6, a, .post-main-box:hover h2 a, .post-main-box:hover .post-info a, .single-post .post-info:hover a, .woocommerce div.product p.price, .woocommerce div.product span.price,.woocommerce ul.products li.product .price{';
			$vcard_cv_resume_custom_css .='color: '.esc_attr($vcard_cv_resume_first_color).';';
		$vcard_cv_resume_custom_css .='}';
	}

	if($vcard_cv_resume_first_color != false){
		$vcard_cv_resume_custom_css .='.main-navigation a:hover{';
			$vcard_cv_resume_custom_css .='color: '.esc_attr($vcard_cv_resume_first_color).'!important;';
		$vcard_cv_resume_custom_css .='}';
	}

	/*-----------------Second Highlight Color -------------------*/

	$vcard_cv_resume_second_color = get_theme_mod('vcard_cv_resume_second_color');

	if($vcard_cv_resume_second_color != false){
		$vcard_cv_resume_custom_css .='.more-btn a:hover,input[type="submit"]:hover,#comments input[type="submit"]:hover,#comments a.comment-reply-link:hover,.pagination .current,.pagination a:hover,#footer .tagcloud a:hover,#sidebar .tagcloud a:hover,.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,.widget_product_search button:hover,nav.woocommerce-MyAccount-navigation ul li:hover, .topbar_btn a, #slider .carousel-control-prev-icon, #slider .carousel-control-next-icon, #slider .more-btn a, .woocommerce span.onsale, .toggle-nav button, #footer .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__button{';
			$vcard_cv_resume_custom_css .='background-color: '.esc_attr($vcard_cv_resume_second_color).';';
		$vcard_cv_resume_custom_css .='}';
	}

	if($vcard_cv_resume_second_color != false){
		$vcard_cv_resume_custom_css .='.box-content a, #footer .textwidget a,#footer li a:hover,.post-main-box:hover h3 a,#sidebar ul li a:hover,.post-navigation a:hover .post-title, .post-navigation a:focus .post-title,.post-navigation a:hover,.post-navigation a:focus, .copyright a:hover{';
			$vcard_cv_resume_custom_css .='color: '.esc_attr($vcard_cv_resume_second_color).';';
		$vcard_cv_resume_custom_css .='}';
	}

	/*-----------------Third and Fourth Highlight Color ---------------*/

	$vcard_cv_resume_third_color = get_theme_mod('vcard_cv_resume_third_color');

	$vcard_cv_resume_fourth_color = get_theme_mod('vcard_cv_resume_fourth_color');

	if($vcard_cv_resume_third_color != false || $vcard_cv_resume_fourth_color != false){
		$vcard_cv_resume_custom_css .='.home-page-header{
		background: linear-gradient(to right, '.esc_attr($vcard_cv_resume_third_color).', '.esc_attr($vcard_cv_resume_fourth_color).');
		}';
	}

	/*------------Media Third and Fourth Highlight Color ------------*/

	$vcard_cv_resume_custom_css .='@media screen and (max-width:720px) {';
		if($vcard_cv_resume_third_color != false || $vcard_cv_resume_fourth_color != false){
			$vcard_cv_resume_custom_css .='#slider .carousel-inner{
				background: linear-gradient(to right, '.esc_attr($vcard_cv_resume_third_color).', '.esc_attr($vcard_cv_resume_fourth_color).');
			}';
		}
	$vcard_cv_resume_custom_css .='}';

	$vcard_cv_resume_custom_css .='@media screen and (max-width:1000px) {';
		if($vcard_cv_resume_third_color != false || $vcard_cv_resume_fourth_color != false){
			$vcard_cv_resume_custom_css .='.page-template-custom-home-page .home-page-header{
				background: linear-gradient(to right, '.esc_attr($vcard_cv_resume_third_color).', '.esc_attr($vcard_cv_resume_fourth_color).');
			}';
		}
	$vcard_cv_resume_custom_css .='}';

	$vcard_cv_resume_custom_css .='@media screen and (min-width: 1024px) and (max-width: 1199px) {';
		if($vcard_cv_resume_third_color != false || $vcard_cv_resume_fourth_color != false){
			$vcard_cv_resume_custom_css .='.page-template-custom-home-page .home-page-header{
				background: linear-gradient(to right, '.esc_attr($vcard_cv_resume_third_color).', '.esc_attr($vcard_cv_resume_fourth_color).');
			}';
		}
	$vcard_cv_resume_custom_css .='}';


	/*--------------------------- Slider -------------------*/

	$vcard_cv_resume_slider = get_theme_mod('vcard_cv_resume_slider_arrows');
	if($vcard_cv_resume_slider == false){
		$vcard_cv_resume_custom_css .='.page-template-custom-home-page .home-page-header{';
			$vcard_cv_resume_custom_css .='position: static; background-image: linear-gradient(to right, #6629c8 , #2b90e6);';
		$vcard_cv_resume_custom_css .='}';
	}

	/*---------------------------Width Layout -------------------*/

	$vcard_cv_resume_theme_lay = get_theme_mod( 'vcard_cv_resume_width_option','Full Width');
    if($vcard_cv_resume_theme_lay == 'Boxed'){
		$vcard_cv_resume_custom_css .='body{';
			$vcard_cv_resume_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$vcard_cv_resume_custom_css .='}';
		$vcard_cv_resume_custom_css .='#slider .carousel-caption,.slider-box,.page-template-custom-home-page .home-page-header{';
			$vcard_cv_resume_custom_css .='position: static !important; transform:none !important';
		$vcard_cv_resume_custom_css .='}';
		$vcard_cv_resume_custom_css .='#slider .carousel-caption{';
			$vcard_cv_resume_custom_css .='padding-left: 50px !important;';
		$vcard_cv_resume_custom_css .='}';
		$vcard_cv_resume_custom_css .='.home-page-header{';
			$vcard_cv_resume_custom_css .='background-image: linear-gradient(to right, #6629c8 , #2b90e6) !important;';
		$vcard_cv_resume_custom_css .='}';
		$vcard_cv_resume_custom_css .='.slide-box{';
			$vcard_cv_resume_custom_css .='height: 486px !important;';
		$vcard_cv_resume_custom_css .='}';
		$vcard_cv_resume_custom_css .='.scrollup i{';
			$vcard_cv_resume_custom_css .='right: 100px;';
		$vcard_cv_resume_custom_css .='}';
		$vcard_cv_resume_custom_css .='.scrollup.left i{';
			$vcard_cv_resume_custom_css .='left: 100px;';
		$vcard_cv_resume_custom_css .='}';
	}else if($vcard_cv_resume_theme_lay == 'Wide Width'){
		$vcard_cv_resume_custom_css .='body{';
			$vcard_cv_resume_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$vcard_cv_resume_custom_css .='}';
		$vcard_cv_resume_custom_css .='.scrollup i{';
			$vcard_cv_resume_custom_css .='right: 30px;';
		$vcard_cv_resume_custom_css .='}';
		$vcard_cv_resume_custom_css .='.scrollup.left i{';
			$vcard_cv_resume_custom_css .='left: 30px;';
		$vcard_cv_resume_custom_css .='}';
	}else if($vcard_cv_resume_theme_lay == 'Full Width'){
		$vcard_cv_resume_custom_css .='body{';
			$vcard_cv_resume_custom_css .='max-width: 100%;';
		$vcard_cv_resume_custom_css .='}';
	}
	
	/*----------------Responsive Media -----------------------*/

	$vcard_cv_resume_resp_slider = get_theme_mod( 'vcard_cv_resume_resp_slider_hide_show',false);
	if($vcard_cv_resume_resp_slider == true && get_theme_mod( 'vcard_cv_resume_slider_arrows', false) == false){
    	$vcard_cv_resume_custom_css .='#slider{';
			$vcard_cv_resume_custom_css .='display:none;';
		$vcard_cv_resume_custom_css .='} ';
	}
    if($vcard_cv_resume_resp_slider == true){
    	$vcard_cv_resume_custom_css .='@media screen and (max-width:575px) {';
		$vcard_cv_resume_custom_css .='#slider{';
			$vcard_cv_resume_custom_css .='display:block;';
		$vcard_cv_resume_custom_css .='} }';
	}else if($vcard_cv_resume_resp_slider == false){
		$vcard_cv_resume_custom_css .='@media screen and (max-width:575px) {';
		$vcard_cv_resume_custom_css .='#slider{';
			$vcard_cv_resume_custom_css .='display:none;';
		$vcard_cv_resume_custom_css .='} }';
		$vcard_cv_resume_custom_css .='@media screen and (max-width:575px){';
		$vcard_cv_resume_custom_css .='.page-template-custom-home-page.admin-bar .homepageheader{';
			$vcard_cv_resume_custom_css .='margin-top: 45px;';
		$vcard_cv_resume_custom_css .='} }';
	}

	$vcard_cv_resume_resp_sidebar = get_theme_mod( 'vcard_cv_resume_sidebar_hide_show',true);
    if($vcard_cv_resume_resp_sidebar == true){
    	$vcard_cv_resume_custom_css .='@media screen and (max-width:575px) {';
		$vcard_cv_resume_custom_css .='#sidebar{';
			$vcard_cv_resume_custom_css .='display:block;';
		$vcard_cv_resume_custom_css .='} }';
	}else if($vcard_cv_resume_resp_sidebar == false){
		$vcard_cv_resume_custom_css .='@media screen and (max-width:575px) {';
		$vcard_cv_resume_custom_css .='#sidebar{';
			$vcard_cv_resume_custom_css .='display:none;';
		$vcard_cv_resume_custom_css .='} }';
	}

	$vcard_cv_resume_resp_scroll_top = get_theme_mod( 'vcard_cv_resume_resp_scroll_top_hide_show',true);
	if($vcard_cv_resume_resp_scroll_top == true && get_theme_mod( 'vcard_cv_resume_hide_show_scroll',true) == false){
    	$vcard_cv_resume_custom_css .='.scrollup i{';
			$vcard_cv_resume_custom_css .='visibility:hidden !important;';
		$vcard_cv_resume_custom_css .='} ';
	}
    if($vcard_cv_resume_resp_scroll_top == true){
    	$vcard_cv_resume_custom_css .='@media screen and (max-width:575px) {';
		$vcard_cv_resume_custom_css .='.scrollup i{';
			$vcard_cv_resume_custom_css .='visibility:visible !important;';
		$vcard_cv_resume_custom_css .='} }';
	}else if($vcard_cv_resume_resp_scroll_top == false){
		$vcard_cv_resume_custom_css .='@media screen and (max-width:575px){';
		$vcard_cv_resume_custom_css .='.scrollup i{';
			$vcard_cv_resume_custom_css .='visibility:hidden !important;';
		$vcard_cv_resume_custom_css .='} }';
	}

	/*---------------- Menus Settings ------------------*/

	$vcard_cv_resume_navigation_menu_font_size = get_theme_mod('vcard_cv_resume_navigation_menu_font_size');
	if($vcard_cv_resume_navigation_menu_font_size != false){
		$vcard_cv_resume_custom_css .='.main-navigation a{';
			$vcard_cv_resume_custom_css .='font-size: '.esc_attr($vcard_cv_resume_navigation_menu_font_size).';';
		$vcard_cv_resume_custom_css .='}';
	}

	/*---------------- Post Settings ------------------*/

	$vcard_cv_resume_featured_image_border_radius = get_theme_mod('vcard_cv_resume_featured_image_border_radius', 0);
	if($vcard_cv_resume_featured_image_border_radius != false){
		$vcard_cv_resume_custom_css .='.box-image img, .feature-box img{';
			$vcard_cv_resume_custom_css .='border-radius: '.esc_attr($vcard_cv_resume_featured_image_border_radius).'px;';
		$vcard_cv_resume_custom_css .='}';
	}

	/*---------------- Single Post Settings ------------------*/

	$vcard_cv_resume_single_blog_comment_title = get_theme_mod('vcard_cv_resume_single_blog_comment_title', 'Leave a Reply');
	if($vcard_cv_resume_single_blog_comment_title == ''){
		$vcard_cv_resume_custom_css .='#comments h2#reply-title {';
			$vcard_cv_resume_custom_css .='display: none;';
		$vcard_cv_resume_custom_css .='}';
	}

	$vcard_cv_resume_single_blog_comment_button_text = get_theme_mod('vcard_cv_resume_single_blog_comment_button_text', 'Post Comment');
	if($vcard_cv_resume_single_blog_comment_button_text == ''){
		$vcard_cv_resume_custom_css .='#comments p.form-submit {';
			$vcard_cv_resume_custom_css .='display: none;';
		$vcard_cv_resume_custom_css .='}';
	}
	
	/*---------------- Button Settings ------------------*/

	$vcard_cv_resume_button_border_radius = get_theme_mod('vcard_cv_resume_button_border_radius');
	if($vcard_cv_resume_button_border_radius != false){
		$vcard_cv_resume_custom_css .='.post-main-box .more-btn a{';
			$vcard_cv_resume_custom_css .='border-radius: '.esc_attr($vcard_cv_resume_button_border_radius).'px;';
		$vcard_cv_resume_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$vcard_cv_resume_footer_background_color = get_theme_mod('vcard_cv_resume_footer_background_color');
	if($vcard_cv_resume_footer_background_color != false){
		$vcard_cv_resume_custom_css .='#footer{';
			$vcard_cv_resume_custom_css .='background-color: '.esc_attr($vcard_cv_resume_footer_background_color).';';
		$vcard_cv_resume_custom_css .='}';
	}

	$vcard_cv_resume_copyright_font_size = get_theme_mod('vcard_cv_resume_copyright_font_size');
	if($vcard_cv_resume_copyright_font_size != false){
		$vcard_cv_resume_custom_css .='.copyright p{';
			$vcard_cv_resume_custom_css .='font-size: '.esc_attr($vcard_cv_resume_copyright_font_size).';';
		$vcard_cv_resume_custom_css .='}';
	}

	$vcard_cv_resume_copyright_alingment = get_theme_mod('vcard_cv_resume_copyright_alingment');
	if($vcard_cv_resume_copyright_alingment != false){
		$vcard_cv_resume_custom_css .='.copyright p{';
			$vcard_cv_resume_custom_css .='text-align: '.esc_attr($vcard_cv_resume_copyright_alingment).';';
		$vcard_cv_resume_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	// Site title Font Size
	$vcard_cv_resume_site_title_font_size = get_theme_mod('vcard_cv_resume_site_title_font_size');
	if($vcard_cv_resume_site_title_font_size != false){
		$vcard_cv_resume_custom_css .='.logo h1, .logo p.site-title{';
			$vcard_cv_resume_custom_css .='font-size: '.esc_attr($vcard_cv_resume_site_title_font_size).';';
		$vcard_cv_resume_custom_css .='}';
	}

	// Site tagline Font Size
	$vcard_cv_resume_site_tagline_font_size = get_theme_mod('vcard_cv_resume_site_tagline_font_size');
	if($vcard_cv_resume_site_tagline_font_size != false){
		$vcard_cv_resume_custom_css .='.logo p.site-description{';
			$vcard_cv_resume_custom_css .='font-size: '.esc_attr($vcard_cv_resume_site_tagline_font_size).';';
		$vcard_cv_resume_custom_css .='}';
	}

	/*---------------- Wocommerce Settings  -------------------*/

	$vcard_cv_resume_products_btn_padding_top_bottom = get_theme_mod('vcard_cv_resume_products_btn_padding_top_bottom');
	if($vcard_cv_resume_products_btn_padding_top_bottom != false){
		$vcard_cv_resume_custom_css .='.woocommerce a.button{';
			$vcard_cv_resume_custom_css .='padding-top: '.esc_attr($vcard_cv_resume_products_btn_padding_top_bottom).' !important; padding-bottom: '.esc_attr($vcard_cv_resume_products_btn_padding_top_bottom).' !important;';
		$vcard_cv_resume_custom_css .='}';
	}

	$vcard_cv_resume_products_btn_padding_left_right = get_theme_mod('vcard_cv_resume_products_btn_padding_left_right');
	if($vcard_cv_resume_products_btn_padding_left_right != false){
		$vcard_cv_resume_custom_css .='.woocommerce a.button{';
			$vcard_cv_resume_custom_css .='padding-left: '.esc_attr($vcard_cv_resume_products_btn_padding_left_right).' !important; padding-right: '.esc_attr($vcard_cv_resume_products_btn_padding_left_right).' !important;';
		$vcard_cv_resume_custom_css .='}';
	}

	$vcard_cv_resume_woocommerce_sale_position = get_theme_mod( 'vcard_cv_resume_woocommerce_sale_position','left');
    if($vcard_cv_resume_woocommerce_sale_position == 'left'){
		$vcard_cv_resume_custom_css .='.woocommerce ul.products li.product .onsale{';
			$vcard_cv_resume_custom_css .='left: -10px; right: auto;';
		$vcard_cv_resume_custom_css .='}';
	}else if($vcard_cv_resume_woocommerce_sale_position == 'right'){
		$vcard_cv_resume_custom_css .='.woocommerce ul.products li.product .onsale{';
			$vcard_cv_resume_custom_css .='left: auto !important; right: 15px !important;';
		$vcard_cv_resume_custom_css .='}';
	}

	$vcard_cv_resume_woocommerce_sale_font_size = get_theme_mod('vcard_cv_resume_woocommerce_sale_font_size');
	if($vcard_cv_resume_woocommerce_sale_font_size != false){
		$vcard_cv_resume_custom_css .='.woocommerce span.onsale{';
			$vcard_cv_resume_custom_css .='font-size: '.esc_attr($vcard_cv_resume_woocommerce_sale_font_size).';';
		$vcard_cv_resume_custom_css .='}';
	}

	$vcard_cv_resume_woocommerce_sale_padding_top_bottom = get_theme_mod('vcard_cv_resume_woocommerce_sale_padding_top_bottom');
	if($vcard_cv_resume_woocommerce_sale_padding_top_bottom != false){
		$vcard_cv_resume_custom_css .='.woocommerce span.onsale{';
			$vcard_cv_resume_custom_css .='padding-top: '.esc_attr($vcard_cv_resume_woocommerce_sale_padding_top_bottom).'; padding-bottom: '.esc_attr($vcard_cv_resume_woocommerce_sale_padding_top_bottom).';';
		$vcard_cv_resume_custom_css .='}';
	}

	$vcard_cv_resume_woocommerce_sale_padding_left_right = get_theme_mod('vcard_cv_resume_woocommerce_sale_padding_left_right');
	if($vcard_cv_resume_woocommerce_sale_padding_left_right != false){
		$vcard_cv_resume_custom_css .='.woocommerce span.onsale{';
			$vcard_cv_resume_custom_css .='padding-left: '.esc_attr($vcard_cv_resume_woocommerce_sale_padding_left_right).'; padding-right: '.esc_attr($vcard_cv_resume_woocommerce_sale_padding_left_right).';';
		$vcard_cv_resume_custom_css .='}';
	}

	$vcard_cv_resume_woocommerce_sale_border_radius = get_theme_mod('vcard_cv_resume_woocommerce_sale_border_radius', 0);
	if($vcard_cv_resume_woocommerce_sale_border_radius != false){
		$vcard_cv_resume_custom_css .='.woocommerce span.onsale{';
			$vcard_cv_resume_custom_css .='border-radius: '.esc_attr($vcard_cv_resume_woocommerce_sale_border_radius).'px;';
		$vcard_cv_resume_custom_css .='}';
	}

	/*---------------- Preloader Background Color  -------------------*/

	$vcard_cv_resume_preloader_bg_color = get_theme_mod('vcard_cv_resume_preloader_bg_color');
	if($vcard_cv_resume_preloader_bg_color != false){
		$vcard_cv_resume_custom_css .='#preloader{';
			$vcard_cv_resume_custom_css .='background-color: '.esc_attr($vcard_cv_resume_preloader_bg_color).';';
		$vcard_cv_resume_custom_css .='}';
	}

	$vcard_cv_resume_preloader_border_color = get_theme_mod('vcard_cv_resume_preloader_border_color');
	if($vcard_cv_resume_preloader_border_color != false){
		$vcard_cv_resume_custom_css .='.loader-line{';
			$vcard_cv_resume_custom_css .='border-color: '.esc_attr($vcard_cv_resume_preloader_border_color).'!important;';
		$vcard_cv_resume_custom_css .='}';
	}