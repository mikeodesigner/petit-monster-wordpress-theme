<?php

/* 
 * Helper function to return the theme option value. If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 *
 */

if ( !function_exists( 'of_get_option' ) ) {
function of_get_option($name, $default = false) {
	
	$optionsframework_settings = get_option('optionsframework');
	
	// Gets the unique option id
	$option_name = $optionsframework_settings['id'];
	
	if ( get_option($option_name) ) {
		$options = get_option($option_name);
	}
		
	if ( isset($options[$name]) ) {
		return $options[$name];
	} else {
		return $default;
	}
}
}




// custom menu support 
add_theme_support( 'menus' );
if ( function_exists( 'register_nav_menus' ) ) {
  	register_nav_menus(
  		array(
  		  'header_menu' => 'Header Menu',
  		  'sidebar_menu' => 'Sidebar Menu',
  		  'footer_menu' => 'Footer Menu'
  		)
  	);
}


// removes div for HTML5 purity
function wp_nav_menu_no_ul()
{
    $options = array(
        'echo' => false,
        'container' => false,
        'fallback_cb'=> 'default_page_menu'
    );

    $menu = wp_nav_menu($options);
    echo preg_replace(array(
        '#^<ul[^>]*>#',
        '#</ul>$#'
    ), '', $menu);

}

// before you set up menu just list all pages with no DIV
function default_page_menu() {
   wp_list_pages('title_li=');
}


// custom background support
// add_custom_background();


// register sidebar for widgets with section mark up instead li
register_sidebar(array(
     'before_widget' => '<section id="%1$s" class="widget %2$s">',
     'after_widget' => '</section>',
 ));

 
 /* 
 * The CSS file selected in the options panel 'stylesheet' option
 * is loaded on the theme front end
 *
 * If you'd prefer to use the 'auto_stylesheet' option, replace
 * of_get_option('stylesheet') with of_get_option('auto_stylesheet')
 *
 * If the "Default" option is selected, "0" is returned (equivalent to false),
 * which means no files will be registered or enqueued
 */


function options_stylesheets_alt_style()   {
	if ( of_get_option('stylesheet') ) {
		wp_enqueue_style( 'options_stylesheets_alt_style', of_get_option('stylesheet'), array(), null );
	}
}
add_action( 'wp_enqueue_scripts', 'options_stylesheets_alt_style' );

/**
 * Returns an array of all files in $directory_path of type $filetype.
 *
 * The $directory_uri + file name is used for the key
 * The file name is the value
 */
 
function options_stylesheets_get_file_list( $directory_path, $filetype, $directory_uri ) {
	$alt_stylesheets = array();
	$alt_stylesheet_files = array();
	if ( is_dir( $directory_path ) ) {
		$alt_stylesheet_files = glob( $directory_path . "*.$filetype");
		foreach ( $alt_stylesheet_files as $file ) {
			$file = str_replace( $directory_path, "", $file);
			$alt_stylesheets[ $directory_uri . $file] = $file;
		}
	}
	return $alt_stylesheets;
}




