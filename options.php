<?php
/**
 * The theme option name is set as 'options-theme-customizer' here.
 * In your own project, you should use a different option name.
 * I'd recommend using the name of your theme.
 *
 * This option name will be used later when we set up the options
 * for the front end theme customizer.
 */

function optionsframework_option_name() {

	$optionsframework_settings = get_option('optionsframework');
	
	// Edit 'options-theme-customizer' and set your own theme name instead
	$optionsframework_settings['id'] = 'options_theme_customizer';
	update_option('optionsframework', $optionsframework_settings);
}


/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 */

function optionsframework_options() {

	// Typograpgy CSS list
	$typography = options_stylesheets_get_file_list(
		get_stylesheet_directory() . '/css/typography/', // $directory_path
		'css', // $filetype
		get_stylesheet_directory_uri() . '/css/typography/' // $directory_uri
	);


	// Layout CSS list
	$layout = options_stylesheets_get_file_list(
		get_stylesheet_directory() . '/css/layout/', // $directory_path
		'css', // $filetype
		get_stylesheet_directory_uri() . '/css/layout/' // $directory_uri
	);
	
	// Colors CSS list
	$colors = options_stylesheets_get_file_list(
		get_stylesheet_directory() . '/css/colors/', // $directory_path
		'css', // $filetype
		get_stylesheet_directory_uri() . '/css/colors/' // $directory_uri
	);




	$options = array();
		

// Typography
// typography in the Theme options
	
  	$options['typography'] = array( 
		"name" => "Typography",
  		"id" => "typography",
  		"type" => "radio",
  		"options" => $typography );


// Colors
// Colors in the Theme options
	
  	$options['colors'] = array( 
		"name" => "Colors",
  		"id" => "colors",
  		"type" => "radio",
  		"options" => $colors );
 
	// Color Picker
		
    $options['example_colorpicker'] = array(
    	"name" => "Colorpicker",
    	"id" => "example_colorpicker",
    	"std" => "#666666",
    	"type" => "color" );



// Layout
// Layout in the Theme options
	
  	$options['layout'] = array( 
		"name" => "Layout CSS variants",
  		"id" => "layout",
  		"type" => "radio",
  		"options" => $layout );
 


// site Width setting 
		
 	$options['site_width'] = array(
   	 	"name" => "Site Width",
   	    "id" => "site_width",
   	    "std" => "Default Value",
   	    "type" => "text" );

// Logo uploader

	$options['logo'] = array(
		"name" => "Logo image",
		"desc" => "This creates a full size uploader that previews the image.",
		"id" => "logo",
		"type" => "upload" );
		

	return $options;
}

/**
 * Front End Customizer
 *
 * WordPress 3.4 Required
 */

add_action( 'customize_register', 'options_theme_customizer_register' );

function options_theme_customizer_register($wp_customize) {

	/**
	 * This is optional, but if you want to reuse some of the defaults
	 * or values you already have built in the options panel, you
	 * can load them into $options for easy reference
	 */
	 
	$options = optionsframework_options();
	
	/* Add Layout Section */

	$wp_customize->add_section( 'options_theme_customizer_layout', array(
		'title' => __( 'Layout', 'options_theme_customizer' ),
		'priority' => 150
	) );


	
	// layout css selector
	
	$wp_customize->add_setting( 'options_theme_customizer[layout]', array(
		'default' => $options['layout']['std'],
		'type' => 'option'
	) );

	$wp_customize->add_control( 'options_theme_customizer_layout', array(
		'label' => $options['layout']['name'],
		'section' => 'options_theme_customizer_layout',
		'settings' => 'options_theme_customizer[layout]',
		'type' => $options['layout']['type'],
		'choices' => $options['layout']['options']
	) );


	
	// site wodth
	
	
	$wp_customize->add_setting( 'options_theme_customizer[site_width]', array(
		'default' => $options['site_width']['std'],
		'type' => 'option'
	) );

	$wp_customize->add_control( 'options_theme_customizer_site_width', array(
		'label' => $options['site_width']['name'],
		'section' => 'options_theme_customizer_layout',
		'settings' => 'options_theme_customizer[site_width]',
		'type' => $options['site_width']['type']
	) );
		
	
	// logo Uploader
	
	$wp_customize->add_setting( 'options_theme_customizer[logo]', array(
		'type' => 'option'
	) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo', array(
		'label' => $options['logo']['name'],
		'section' => 'options_theme_customizer_layout',
		'settings' => 'options_theme_customizer[logo]'
	) ) );
	
	
	//
	/* Typography Section */
	//
	

	$wp_customize->add_section( 'options_theme_customizer_typography', array(
		'title' => __( 'Typography', 'options_theme_customizer' ),
		'priority' => 130
	) );
	
	
	// Typography in customizer
	
	
	$wp_customize->add_setting( 'options_theme_customizer[typography]', array(
		'type' => 'option'
	) );

	$wp_customize->add_control( 'options_theme_customizer_typography', array(
		'label' => $options['typography']['name'],
		'section' => 'options_theme_customizer_typography',
		'settings' => 'options_theme_customizer[typography]',
		'type' => $options['typography']['type'],
		'choices' => $options['typography']['options']
	) );
	
	//
	
	
	//
	/* colors Section */
	//
	
	$wp_customize->add_section( 'options_theme_customizer_colors', array(
		'title' => __( 'Colors', 'options_theme_customizer' ),
		'priority' => 140
	) );
	
	
	// colors in customizer
	
	$wp_customize->add_setting( 'options_theme_customizer[colors]', array(
		'type' => 'option'
	) );

	$wp_customize->add_control( 'options_theme_customizer_colors', array(
		'label' => $options['colors']['name'],
		'section' => 'options_theme_customizer_colors',
		'settings' => 'options_theme_customizer[colors]',
		'type' => $options['colors']['type'],
		'choices' => $options['colors']['options']
	) );
	
}





