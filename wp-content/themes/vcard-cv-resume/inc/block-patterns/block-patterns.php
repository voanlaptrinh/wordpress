<?php
/**
 * Vcard CV Resume: Block Patterns
 *
 * @package Vcard CV Resume
 * @since   1.0.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'vcard-cv-resume',
		array( 'label' => __( 'Vcard CV Resume', 'vcard-cv-resume' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'vcard-cv-resume/banner-section',
		array(
			'title'      => __( 'Banner Section', 'vcard-cv-resume' ),
			'categories' => array( 'vcard-cv-resume' ),
			'content'    => "<!-- wp:cover {\"url\":\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/slider-bg-img.png\",\"id\":3695,\"dimRatio\":0,\"overlayColor\":\"white\",\"align\":\"full\",\"className\":\"banner-section\"} -->\n<div class=\"wp-block-cover alignfull has-white-background-color banner-section\"><img class=\"wp-block-cover__image-background wp-image-3695\" alt=\"\" src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/slider-bg-img.png\" data-object-fit=\"cover\"/><div class=\"wp-block-cover__inner-container\"><!-- wp:columns {\"className\":\"mx-lg-5 mx-md-4 mx-0 px-lg-5 px-md-0 px-0\"} -->\n<div class=\"wp-block-columns mx-lg-5 mx-md-4 mx-0 px-lg-5 px-md-0 px-0\"><!-- wp:column {\"className\":\"mt-5 pt-5\"} -->\n<div class=\"wp-block-column mt-5 pt-5\"><!-- wp:heading {\"textAlign\":\"left\",\"level\":1,\"style\":{\"typography\":{\"fontSize\":\"50px\"}}} -->\n<h1 class=\"has-text-align-left\" style=\"font-size:50px\">I'm a Designer</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"left\",\"fontSize\":\"normal\"} -->\n<p class=\"has-text-align-left has-normal-font-size\">Lorem ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem ipsum&nbsp;is simply dummy text. Lorem ipsum&nbsp;is simply dummy text of the printing and typesetting industry. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"style\":{\"color\":{\"background\":\"#e88c09\"},\"typography\":{\"fontSize\":\"15px\"}},\"className\":\"banner-btn\"} -->\n<div class=\"wp-block-button has-custom-font-size banner-btn\" style=\"font-size:15px\"><a class=\"wp-block-button__link has-background\" style=\"background-color:#e88c09\">Read More</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"id\":3708,\"sizeSlug\":\"full\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-full\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/slider-img.png\" alt=\"\" class=\"wp-image-3708\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->",
		)
	);

	register_block_pattern(
		'vcard-cv-resume/services-section',
		array(
			'title'      => __( 'Services Section', 'vcard-cv-resume' ),
			'categories' => array( 'vcard-cv-resume' ),
			'content'    => "<!-- wp:group {\"align\":\"wide\",\"className\":\"services-section p-4 mx-2 mt-5\"} -->\n<div class=\"wp-block-group alignwide services-section p-4 mx-2 mt-5\"><!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column {\"width\":\"66.66%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:66.66%\"><!-- wp:heading {\"textAlign\":\"left\",\"style\":{\"typography\":{\"fontSize\":\"35px\"},\"color\":{\"text\":\"#373293\"}}} -->\n<h2 class=\"has-text-align-left has-text-color\" style=\"color:#373293;font-size:35px\">Read My Own Blog. Be Trendy</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#777777\"}},\"fontSize\":\"normal\"} -->\n<p class=\"has-text-color has-normal-font-size\" style=\"color:#777777\">Lorem ipsum&nbsp;is simply dummy text of the printing and typesetting industry.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"33.33%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:33.33%\"><!-- wp:buttons {\"contentJustification\":\"right\"} -->\n<div class=\"wp-block-buttons is-content-justification-right\"><!-- wp:button {\"style\":{\"typography\":{\"fontSize\":\"15px\"},\"color\":{\"background\":\"#373293\"},\"border\":{\"radius\":0}},\"className\":\"services-btn\"} -->\n<div class=\"wp-block-button has-custom-font-size services-btn\" style=\"font-size:15px\"><a class=\"wp-block-button__link has-background no-border-radius\" style=\"background-color:#373293\">View All</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:columns {\"className\":\"left-service-box\"} -->\n<div class=\"wp-block-columns left-service-box\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"id\":3776,\"sizeSlug\":\"full\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-full\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/services-1.png\" alt=\"\" class=\"wp-image-3776\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"py-5 ps-lg-0 ps-md-0 ps-3\"} -->\n<div class=\"wp-block-column py-5 ps-lg-0 ps-md-0 ps-3\"><!-- wp:heading {\"textAlign\":\"left\",\"level\":3,\"style\":{\"color\":{\"text\":\"#373293\"}},\"fontSize\":\"medium\"} -->\n<h3 class=\"has-text-align-left has-text-color has-medium-font-size\" style=\"color:#373293\">We Are Provide Unique Ideas. We Help Clients.</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"left\",\"style\":{\"color\":{\"text\":\"#777777\"}},\"fontSize\":\"normal\"} -->\n<p class=\"has-text-align-left has-text-color has-normal-font-size\" style=\"color:#777777\">Lorem ipsum&nbsp;is simply dummy text of the printing and typesetting industry.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"style\":{\"color\":{\"text\":\"#e88c09\"}},\"fontSize\":\"normal\"} -->\n<div class=\"wp-block-button has-custom-font-size has-normal-font-size\"><a class=\"wp-block-button__link has-text-color\" style=\"color:#e88c09\">Read More</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:columns {\"className\":\"right-service-box\"} -->\n<div class=\"wp-block-columns right-service-box\"><!-- wp:column {\"className\":\"py-5 ps-4\"} -->\n<div class=\"wp-block-column py-5 ps-4\"><!-- wp:heading {\"textAlign\":\"left\",\"level\":3,\"style\":{\"color\":{\"text\":\"#373293\"}},\"fontSize\":\"medium\"} -->\n<h3 class=\"has-text-align-left has-text-color has-medium-font-size\" style=\"color:#373293\">We Are Provide Unique Ideas. We Help Clients.</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"left\",\"style\":{\"color\":{\"text\":\"#777777\"}},\"fontSize\":\"normal\"} -->\n<p class=\"has-text-align-left has-text-color has-normal-font-size\" style=\"color:#777777\">Lorem ipsum&nbsp;is simply dummy text of the printing and typesetting industry.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"style\":{\"color\":{\"text\":\"#e88c09\"}},\"fontSize\":\"normal\"} -->\n<div class=\"wp-block-button has-custom-font-size has-normal-font-size\"><a class=\"wp-block-button__link has-text-color\" style=\"color:#e88c09\">Read More</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"id\":3778,\"sizeSlug\":\"full\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-full\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/services-2.png\" alt=\"\" class=\"wp-image-3778\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:group -->",
		)
	);
}