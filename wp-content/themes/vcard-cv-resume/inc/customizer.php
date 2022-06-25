<?php
/**
 * Vcard CV Resume Theme Customizer
 *
 * @package Vcard CV Resume
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function vcard_cv_resume_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vcard_cv_resume_custom_controls' );

function vcard_cv_resume_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'vcard_cv_resume_Customize_partial_blogname',
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'vcard_cv_resume_Customize_partial_blogdescription',
	));

	// add home page setting pannel
	$vcard_cv_resume_parent_panel = new Vcard_CV_Resume_WP_Customize_Panel( $wp_customize, 'vcard_cv_resume_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'VW Settings', 'vcard-cv-resume' ),
		'priority' => 10,
	));

	// Layout
	$wp_customize->add_section( 'vcard_cv_resume_left_right', array(
    	'title' => esc_html__( 'General Settings', 'vcard-cv-resume' ),
		'panel' => 'vcard_cv_resume_panel_id'
	) );

	$wp_customize->add_setting('vcard_cv_resume_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'vcard_cv_resume_sanitize_choices'
	));
	$wp_customize->add_control(new Vcard_CV_Resume_Image_Radio_Control($wp_customize, 'vcard_cv_resume_width_option', array(
        'type' => 'select',
        'label' => esc_html__('Width Layouts','vcard-cv-resume'),
        'description' => esc_html__('Here you can change the width layout of Website.','vcard-cv-resume'),
        'section' => 'vcard_cv_resume_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
    ))));

	$wp_customize->add_setting('vcard_cv_resume_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vcard_cv_resume_sanitize_choices'
	));
	$wp_customize->add_control('vcard_cv_resume_theme_options',array(
        'type' => 'select',
        'label' => esc_html__('Post Sidebar Layout','vcard-cv-resume'),
        'description' => esc_html__('Here you can change the sidebar layout for posts. ','vcard-cv-resume'),
        'section' => 'vcard_cv_resume_left_right',
        'choices' => array(
            'Left Sidebar' => esc_html__('Left Sidebar','vcard-cv-resume'),
            'Right Sidebar' => esc_html__('Right Sidebar','vcard-cv-resume'),
            'One Column' => esc_html__('One Column','vcard-cv-resume'),
            'Grid Layout' => esc_html__('Grid Layout','vcard-cv-resume')
        ),
	) );

	$wp_customize->add_setting('vcard_cv_resume_page_layout',array(
        'default' => 'One_Column',
        'sanitize_callback' => 'vcard_cv_resume_sanitize_choices'
	));
	$wp_customize->add_control('vcard_cv_resume_page_layout',array(
        'type' => 'select',
        'label' => esc_html__('Page Sidebar Layout','vcard-cv-resume'),
        'description' => esc_html__('Here you can change the sidebar layout for pages. ','vcard-cv-resume'),
        'section' => 'vcard_cv_resume_left_right',
        'choices' => array(
            'Left_Sidebar' => esc_html__('Left Sidebar','vcard-cv-resume'),
            'Right_Sidebar' => esc_html__('Right Sidebar','vcard-cv-resume'),
            'One_Column' => esc_html__('One Column','vcard-cv-resume')
        ),
	) );

    // Pre-Loader
	$wp_customize->add_setting( 'vcard_cv_resume_loader_enable',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
    ) );
    $wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','vcard-cv-resume' ),
        'section' => 'vcard_cv_resume_left_right'
    )));

	$wp_customize->add_setting('vcard_cv_resume_preloader_bg_color', array(
		'default'           => '#373293',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vcard_cv_resume_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'vcard-cv-resume'),
		'section'  => 'vcard_cv_resume_left_right',
	)));

	$wp_customize->add_setting('vcard_cv_resume_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vcard_cv_resume_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'vcard-cv-resume'),
		'section'  => 'vcard_cv_resume_left_right',
	)));

	// Top Bar
	$wp_customize->add_section( 'vcard_cv_resume_top_bar' , array(
    	'title' => esc_html__( 'Top Bar', 'vcard-cv-resume' ),
		'panel' => 'vcard_cv_resume_panel_id'
	) );	

	$wp_customize->add_setting('vcard_cv_resume_topbar_btn_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_topbar_btn_text',array(
		'label'	=> esc_html__('Add Button Text','vcard-cv-resume'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Hire Me', 'vcard-cv-resume' ),
        ),
		'section'=> 'vcard_cv_resume_top_bar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vcard_cv_resume_topbar_btn_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('vcard_cv_resume_topbar_btn_link',array(
		'label'	=> esc_html__('Add Button Link','vcard-cv-resume'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'www.example-info.com', 'vcard-cv-resume' ),
        ),
		'section'=> 'vcard_cv_resume_top_bar',
		'type'=> 'url'
	));

	$wp_customize->add_setting('vcard_cv_resume_navigation_menu_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_navigation_menu_font_size',array(
		'label'	=> __('Menus Font Size','vcard-cv-resume'),
		'description'	=> __('Enter a value in pixels. Example:20px','vcard-cv-resume'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vcard-cv-resume' ),
        ),
		'section'=> 'vcard_cv_resume_top_bar',
		'type'=> 'text'
	));

	//Slider
	$wp_customize->add_section( 'vcard_cv_resume_slidersettings' , array(
    	'title' => esc_html__( 'Slider Settings', 'vcard-cv-resume' ),
		'panel' => 'vcard_cv_resume_panel_id'
	) );

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('vcard_cv_resume_slider_arrows',array(
		'selector'        => '#slider .carousel-caption h1',
		'render_callback' => 'vcard_cv_resume_Customize_partial_vcard_cv_resume_slider_arrows',
	));

	$wp_customize->add_setting( 'vcard_cv_resume_slider_arrows',array(
    	'default' => 0,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
    ));  
    $wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_slider_arrows',array(
      	'label' => esc_html__( 'Show / Hide Slider','vcard-cv-resume' ),
      	'section' => 'vcard_cv_resume_slidersettings'
    )));

	for ( $count = 1; $count <= 3; $count++ ) {
		$wp_customize->add_setting( 'vcard_cv_resume_slider_page' . $count, array(
			'default'  => '',
			'sanitize_callback' => 'vcard_cv_resume_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vcard_cv_resume_slider_page' . $count, array(
			'label'    => esc_html__( 'Select Slider Page', 'vcard-cv-resume' ),
			'description' => esc_html__('Slider image size (650 x 650)','vcard-cv-resume'),
			'section'  => 'vcard_cv_resume_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

    $wp_customize->add_setting( 'vcard_cv_resume_slider_excerpt_number', array(
		'default'              => 45,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vcard_cv_resume_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vcard_cv_resume_slider_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vcard-cv-resume' ),
		'section'     => 'vcard_cv_resume_slidersettings',
		'type'        => 'range',
		'settings'    => 'vcard_cv_resume_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vcard_cv_resume_slider_button_text',array(
		'default'=> esc_html__('Read More','vcard-cv-resume'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_slider_button_text',array(
		'label'	=> esc_html__('Add Button Text','vcard-cv-resume'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Read More', 'vcard-cv-resume' ),
        ),
		'section'=> 'vcard_cv_resume_slidersettings',
		'type'=> 'text'
	));

	//Services
	$wp_customize->add_section('vcard_cv_resume_services',array(
		'title'	=> __('Services Section','vcard-cv-resume'),
		'description' => __('Add the content and select the post category to display post.','vcard-cv-resume'),
		'panel' => 'vcard_cv_resume_panel_id',
	));

	$wp_customize->add_setting('vcard_cv_resume_services_heading',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vcard_cv_resume_services_heading',array(
		'label'	=> esc_html__('Services Section Heading','vcard-cv-resume'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Read My Own Blog', 'vcard-cv-resume' ),
        ),
		'section'=> 'vcard_cv_resume_services',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vcard_cv_resume_services_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_services_text',array(
		'label'	=> esc_html__('Services Section Text','vcard-cv-resume'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s', 'vcard-cv-resume' ),
        ),
		'section'=> 'vcard_cv_resume_services',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vcard_cv_resume_services_viewbtn_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vcard_cv_resume_services_viewbtn_text',array(
		'label'	=> esc_html__('Services Section Button Text','vcard-cv-resume'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'View All', 'vcard-cv-resume' ),
        ),
		'section'=> 'vcard_cv_resume_services',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vcard_cv_resume_services_viewbtn_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('vcard_cv_resume_services_viewbtn_link',array(
		'label'	=> esc_html__('Services Section Button Link','vcard-cv-resume'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'www.example12356.com', 'vcard-cv-resume' ),
        ),
		'section'=> 'vcard_cv_resume_services',
		'type'=> 'url'
	));

	$categories = get_categories();
		$cat_posts = array();
			$i = 0;
			$cat_posts[]='Select';
		foreach($categories as $category){
			if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vcard_cv_resume_services_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'vcard_cv_resume_sanitize_choices',
	));
	$wp_customize->add_control('vcard_cv_resume_services_category',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select Category to display services','vcard-cv-resume'),
		'section' => 'vcard_cv_resume_services',
	));


	//Blog Post
	$wp_customize->add_panel( $vcard_cv_resume_parent_panel );

	$BlogPostParentPanel = new Vcard_CV_Resume_WP_Customize_Panel( $wp_customize, 'vcard_cv_resume_blog_post_parent_panel', array(
		'title' => esc_html__( 'Blog Post Settings', 'vcard-cv-resume' ),
		'panel' => 'vcard_cv_resume_panel_id',
		'priority' => 20,
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'vcard_cv_resume_post_settings', array(
		'title' => esc_html__( 'Post Settings', 'vcard-cv-resume' ),
		'panel' => 'vcard_cv_resume_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vcard_cv_resume_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'vcard_cv_resume_Customize_partial_vcard_cv_resume_toggle_postdate', 
	));

	$wp_customize->add_setting( 'vcard_cv_resume_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
    ) );
    $wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','vcard-cv-resume' ),
        'section' => 'vcard_cv_resume_post_settings'
    )));

    $wp_customize->add_setting( 'vcard_cv_resume_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
    ) );
    $wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_toggle_author',array(
		'label' => esc_html__( 'Author','vcard-cv-resume' ),
		'section' => 'vcard_cv_resume_post_settings'
    )));

    $wp_customize->add_setting( 'vcard_cv_resume_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
    ) );
    $wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_toggle_comments',array(
		'label' => esc_html__( 'Comments','vcard-cv-resume' ),
		'section' => 'vcard_cv_resume_post_settings'
    )));

    $wp_customize->add_setting( 'vcard_cv_resume_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
    ) );
    $wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_toggle_time',array(
		'label' => esc_html__( 'Time','vcard-cv-resume' ),
		'section' => 'vcard_cv_resume_post_settings'
    )));

    $wp_customize->add_setting( 'vcard_cv_resume_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
	));
    $wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_featured_image_hide_show', array(
		'label' => esc_html__( 'Featured Image','vcard-cv-resume' ),
		'section' => 'vcard_cv_resume_post_settings'
    )));

    $wp_customize->add_setting( 'vcard_cv_resume_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vcard_cv_resume_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vcard_cv_resume_featured_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','vcard-cv-resume' ),
		'section'     => 'vcard_cv_resume_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    $wp_customize->add_setting( 'vcard_cv_resume_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
	));
    $wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_toggle_tags', array(
		'label' => esc_html__( 'Tags','vcard-cv-resume' ),
		'section' => 'vcard_cv_resume_post_settings'
    )));

    $wp_customize->add_setting( 'vcard_cv_resume_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vcard_cv_resume_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vcard_cv_resume_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vcard-cv-resume' ),
		'section'     => 'vcard_cv_resume_post_settings',
		'type'        => 'range',
		'settings'    => 'vcard_cv_resume_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vcard_cv_resume_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vcard-cv-resume'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vcard-cv-resume'),
		'section'=> 'vcard_cv_resume_post_settings',
		'type'=> 'text'
	));

    $wp_customize->add_setting('vcard_cv_resume_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'vcard_cv_resume_sanitize_choices'
	));
	$wp_customize->add_control('vcard_cv_resume_excerpt_settings',array(
        'type' => 'select',
        'label' => esc_html__('Post Content','vcard-cv-resume'),
        'section' => 'vcard_cv_resume_post_settings',
        'choices' => array(
        	'Content' => esc_html__('Content','vcard-cv-resume'),
            'Excerpt' => esc_html__('Excerpt','vcard-cv-resume'),
            'No Content' => esc_html__('No Content','vcard-cv-resume')
        ),
	) );

    // Button Settings
	$wp_customize->add_section( 'vcard_cv_resume_button_settings', array(
		'title' => esc_html__( 'Button Settings', 'vcard-cv-resume' ),
		'panel' => 'vcard_cv_resume_blog_post_parent_panel',
	));

	$wp_customize->add_setting( 'vcard_cv_resume_button_border_radius', array(
		'default'              => 5,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vcard_cv_resume_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vcard_cv_resume_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','vcard-cv-resume' ),
		'section'     => 'vcard_cv_resume_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vcard_cv_resume_button_text', array( 
		'selector' => '.post-main-box .more-btn a', 
		'render_callback' => 'vcard_cv_resume_Customize_partial_vcard_cv_resume_button_text', 
	));

    $wp_customize->add_setting('vcard_cv_resume_button_text',array(
		'default'=> esc_html__('Read More','vcard-cv-resume'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_button_text',array(
		'label'	=> esc_html__('Add Button Text','vcard-cv-resume'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Read More', 'vcard-cv-resume' ),
        ),
		'section'=> 'vcard_cv_resume_button_settings',
		'type'=> 'text'
	));

	// Related Post Settings
	$wp_customize->add_section( 'vcard_cv_resume_related_posts_settings', array(
		'title' => esc_html__( 'Related Posts Settings', 'vcard-cv-resume' ),
		'panel' => 'vcard_cv_resume_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vcard_cv_resume_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'vcard_cv_resume_Customize_partial_vcard_cv_resume_related_post_title', 
	));

    $wp_customize->add_setting( 'vcard_cv_resume_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
    ) );
    $wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_related_post',array(
		'label' => esc_html__( 'Related Post','vcard-cv-resume' ),
		'section' => 'vcard_cv_resume_related_posts_settings'
    )));

    $wp_customize->add_setting('vcard_cv_resume_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_related_post_title',array(
		'label'	=> esc_html__('Add Related Post Title','vcard-cv-resume'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Related Post', 'vcard-cv-resume' ),
        ),
		'section'=> 'vcard_cv_resume_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('vcard_cv_resume_related_posts_count',array(
		'default'=> 3,
		'sanitize_callback'	=> 'vcard_cv_resume_sanitize_number_absint'
	));
	$wp_customize->add_control('vcard_cv_resume_related_posts_count',array(
		'label'	=> esc_html__('Add Related Post Count','vcard-cv-resume'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '3', 'vcard-cv-resume' ),
        ),
		'section'=> 'vcard_cv_resume_related_posts_settings',
		'type'=> 'number'
	));

	// Single Posts Settings
	$wp_customize->add_section( 'vcard_cv_resume_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'vcard-cv-resume' ),
		'panel' => 'vcard_cv_resume_blog_post_parent_panel',
	));

	$wp_customize->add_setting('vcard_cv_resume_single_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_single_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vcard-cv-resume'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vcard-cv-resume'),
		'section'=> 'vcard_cv_resume_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vcard_cv_resume_single_blog_comment_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vcard_cv_resume_single_blog_comment_title',array(
		'label'	=> __('Add Comment Title','vcard-cv-resume'),
		'input_attrs' => array(
            'placeholder' => __( 'Leave a Reply', 'vcard-cv-resume' ),
        ),
		'section'=> 'vcard_cv_resume_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vcard_cv_resume_single_blog_comment_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vcard_cv_resume_single_blog_comment_button_text',array(
		'label'	=> __('Add Comment Button Text','vcard-cv-resume'),
		'input_attrs' => array(
            'placeholder' => __( 'Post Comment', 'vcard-cv-resume' ),
        ),
		'section'=> 'vcard_cv_resume_single_blog_settings',
		'type'=> 'text'
	));

	//Responsive Media Settings
	$wp_customize->add_section('vcard_cv_resume_responsive_media',array(
		'title'	=> esc_html__('Responsive Media','vcard-cv-resume'),
		'panel' => 'vcard_cv_resume_panel_id',
	));

    $wp_customize->add_setting( 'vcard_cv_resume_resp_slider_hide_show',array(
      	'default' => 0,
     	'transport' => 'refresh',
      	'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
    ));  
    $wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_resp_slider_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Slider','vcard-cv-resume' ),
      	'section' => 'vcard_cv_resume_responsive_media'
    )));

    $wp_customize->add_setting( 'vcard_cv_resume_sidebar_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
    ));  
    $wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_sidebar_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Sidebar','vcard-cv-resume' ),
      	'section' => 'vcard_cv_resume_responsive_media'
    )));

    $wp_customize->add_setting( 'vcard_cv_resume_resp_scroll_top_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
    ));  
    $wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_resp_scroll_top_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vcard-cv-resume' ),
      	'section' => 'vcard_cv_resume_responsive_media'
    )));

    $wp_customize->add_setting('vcard_cv_resume_res_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Vcard_CV_Resume_Fontawesome_Icon_Chooser(
        $wp_customize,'vcard_cv_resume_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','vcard-cv-resume'),
		'transport' => 'refresh',
		'section'	=> 'vcard_cv_resume_responsive_media',
		'setting'	=> 'vcard_cv_resume_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vcard_cv_resume_res_menu_close_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Vcard_CV_Resume_Fontawesome_Icon_Chooser(
        $wp_customize,'vcard_cv_resume_res_menu_close_icon',array(
		'label'	=> __('Add Close Menu Icon','vcard-cv-resume'),
		'transport' => 'refresh',
		'section'	=> 'vcard_cv_resume_responsive_media',
		'setting'	=> 'vcard_cv_resume_res_menu_close_icon',
		'type'		=> 'icon'
	)));

	//Footer Text
	$wp_customize->add_section('vcard_cv_resume_footer',array(
		'title'	=> esc_html__('Footer Settings','vcard-cv-resume'),
		'panel' => 'vcard_cv_resume_panel_id',
	));	

	$wp_customize->add_setting('vcard_cv_resume_footer_background_color', array(
		'default'           => '#111111',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vcard_cv_resume_footer_background_color', array(
		'label'    => __('Footer Background Color', 'vcard-cv-resume'),
		'section'  => 'vcard_cv_resume_footer',
	)));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vcard_cv_resume_footer_text', array( 
		'selector' => '.copyright p', 
		'render_callback' => 'vcard_cv_resume_Customize_partial_vcard_cv_resume_footer_text', 
	));
	
	$wp_customize->add_setting('vcard_cv_resume_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vcard_cv_resume_footer_text',array(
		'label'	=> esc_html__('Copyright Text','vcard-cv-resume'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Copyright 2020, .....', 'vcard-cv-resume' ),
        ),
		'section'=> 'vcard_cv_resume_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vcard_cv_resume_copyright_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_copyright_font_size',array(
		'label'	=> __('Copyright Font Size','vcard-cv-resume'),
		'description'	=> __('Enter a value in pixels. Example:20px','vcard-cv-resume'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vcard-cv-resume' ),
        ),
		'section'=> 'vcard_cv_resume_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vcard_cv_resume_copyright_alingment',array(
        'default' => 'center',
        'sanitize_callback' => 'vcard_cv_resume_sanitize_choices'
	));
	$wp_customize->add_control(new Vcard_CV_Resume_Image_Radio_Control($wp_customize, 'vcard_cv_resume_copyright_alingment', array(
        'type' => 'select',
        'label' => esc_html__('Copyright Alignment','vcard-cv-resume'),
        'section' => 'vcard_cv_resume_footer',
        'settings' => 'vcard_cv_resume_copyright_alingment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

    $wp_customize->add_setting( 'vcard_cv_resume_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
    ));  
    $wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll to Top','vcard-cv-resume' ),
      	'section' => 'vcard_cv_resume_footer'
    )));

     //Selective Refresh
	$wp_customize->selective_refresh->add_partial('vcard_cv_resume_scroll_to_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'vcard_cv_resume_Customize_partial_vcard_cv_resume_scroll_to_top_icon', 
	));

    $wp_customize->add_setting('vcard_cv_resume_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'vcard_cv_resume_sanitize_choices'
	));
	$wp_customize->add_control(new Vcard_CV_Resume_Image_Radio_Control($wp_customize, 'vcard_cv_resume_scroll_top_alignment', array(
        'type' => 'select',
        'label' => esc_html__('Scroll To Top','vcard-cv-resume'),
        'section' => 'vcard_cv_resume_footer',
        'settings' => 'vcard_cv_resume_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));

    //Woocommerce settings
	$wp_customize->add_section('vcard_cv_resume_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'vcard-cv-resume'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

    // Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vcard_cv_resume_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product #sidebar', 
		'render_callback' => 'vcard_cv_resume_customize_partial_vcard_cv_resume_woocommerce_shop_page_sidebar', ) );

    // Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vcard_cv_resume_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
    ) );
    $wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','vcard-cv-resume' ),
		'section' => 'vcard_cv_resume_woocommerce_section'
    )));

    // Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vcard_cv_resume_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product #sidebar', 
		'render_callback' => 'vcard_cv_resume_customize_partial_vcard_cv_resume_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vcard_cv_resume_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vcard_cv_resume_switch_sanitization'
    ) );
    $wp_customize->add_control( new Vcard_CV_Resume_Toggle_Switch_Custom_Control( $wp_customize, 'vcard_cv_resume_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','vcard-cv-resume' ),
		'section' => 'vcard_cv_resume_woocommerce_section'
    )));

    $wp_customize->add_setting('vcard_cv_resume_products_btn_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_products_btn_padding_top_bottom',array(
		'label'	=> __('Products Button Padding Top Bottom','vcard-cv-resume'),
		'description'	=> __('Enter a value in pixels. Example:20px','vcard-cv-resume'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vcard-cv-resume' ),
        ),
		'section'=> 'vcard_cv_resume_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vcard_cv_resume_products_btn_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_products_btn_padding_left_right',array(
		'label'	=> __('Products Button Padding Left Right','vcard-cv-resume'),
		'description'	=> __('Enter a value in pixels. Example:20px','vcard-cv-resume'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vcard-cv-resume' ),
        ),
		'section'=> 'vcard_cv_resume_woocommerce_section',
		'type'=> 'text'
	));

    //Products Sale Badge
	$wp_customize->add_setting('vcard_cv_resume_woocommerce_sale_position',array(
        'default' => 'left',
        'sanitize_callback' => 'vcard_cv_resume_sanitize_choices'
	));
	$wp_customize->add_control('vcard_cv_resume_woocommerce_sale_position',array(
        'type' => 'select',
        'label' => __('Sale Badge Position','vcard-cv-resume'),
        'section' => 'vcard_cv_resume_woocommerce_section',
        'choices' => array(
            'left' => __('Left','vcard-cv-resume'),
            'right' => __('Right','vcard-cv-resume'),
        ),
	) );

    $wp_customize->add_setting('vcard_cv_resume_woocommerce_sale_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_woocommerce_sale_font_size',array(
		'label'	=> __('Sale Font Size','vcard-cv-resume'),
		'description'	=> __('Enter a value in pixels. Example:20px','vcard-cv-resume'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vcard-cv-resume' ),
        ),
		'section'=> 'vcard_cv_resume_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vcard_cv_resume_woocommerce_sale_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_woocommerce_sale_padding_top_bottom',array(
		'label'	=> __('Sale Padding Top Bottom','vcard-cv-resume'),
		'description'	=> __('Enter a value in pixels. Example:20px','vcard-cv-resume'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vcard-cv-resume' ),
        ),
		'section'=> 'vcard_cv_resume_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vcard_cv_resume_woocommerce_sale_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vcard_cv_resume_woocommerce_sale_padding_left_right',array(
		'label'	=> __('Sale Padding Left Right','vcard-cv-resume'),
		'description'	=> __('Enter a value in pixels. Example:20px','vcard-cv-resume'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vcard-cv-resume' ),
        ),
		'section'=> 'vcard_cv_resume_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vcard_cv_resume_woocommerce_sale_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vcard_cv_resume_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vcard_cv_resume_woocommerce_sale_border_radius', array(
		'label'       => esc_html__( 'Sale Border Radius','vcard-cv-resume' ),
		'section'     => 'vcard_cv_resume_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    // Has to be at the top
	$wp_customize->register_panel_type( 'Vcard_CV_Resume_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'Vcard_CV_Resume_WP_Customize_Section' );
}

add_action( 'customize_register', 'vcard_cv_resume_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class Vcard_CV_Resume_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'vcard_cv_resume_panel';
	    public function json() {
			$array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
			$array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
			$array['content'] = $this->get_content();
			$array['active'] = $this->active();
			$array['instanceNumber'] = $this->instance_number;
			return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class Vcard_CV_Resume_WP_Customize_Section extends WP_Customize_Section {
	    public $section;
	    public $type = 'vcard_cv_resume_section';
	    public function json() {
			$array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
			$array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
			$array['content'] = $this->get_content();
			$array['active'] = $this->active();
			$array['instanceNumber'] = $this->instance_number;

			if ( $this->panel ) {
			$array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
			} else {
			$array['customizeAction'] = 'Customizing';
			}
			return $array;
    	}
  	}
}

// Enqueue our scripts and styles
function vcard_cv_resume_customize_controls_scripts() {
	wp_enqueue_script( 'vcard-cv-resume-customizer-controls', get_theme_file_uri( '/assets/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'vcard_cv_resume_customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Vcard_CV_Resume_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Vcard_CV_Resume_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new Vcard_CV_Resume_Customize_Section_Pro( $manager,'vcard_cv_resume_go_pro', array(
			'priority'   => 1,
			'title'    => esc_html__( 'CV RESUME PRO', 'vcard-cv-resume' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'vcard-cv-resume' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/cv-resume-wordpress-theme/'),
		) )	);

		$manager->add_section(new Vcard_CV_Resume_Customize_Section_Pro($manager,'vcard_cv_resume_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'vcard-cv-resume' ),
			'pro_text' => esc_html__( 'DOCS', 'vcard-cv-resume' ),
			'pro_url'  => admin_url('themes.php?page=vcard_cv_resume_guide'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vcard-cv-resume-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vcard-cv-resume-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Vcard_CV_Resume_Customize::get_instance();