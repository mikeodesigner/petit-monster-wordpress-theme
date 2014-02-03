<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<title><?php wp_title('|', true, 'right'); ?> <?php bloginfo('name'); ?> </title>


<!-- disable zoom for iOS-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

<meta name="keywords" content="<?php wp_title(); echo ' , '; bloginfo( 'name' ); echo ' , '; bloginfo( 'description' ); ?>" />
<meta name="description" content="<?php wp_title(); echo ' | '; bloginfo( 'description' ); ?>" />

<!-- main wordpress stylesheet-->
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

<!-- loads Colors and typography from customizer-->
<link rel="stylesheet" type="text/css" media="all" href="<?php echo of_get_option('typography', 'default.css' ); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo of_get_option('colors', 'default.css' ); ?>" />
<!-- loads layout.css and grids.css only if width > 800px for mobile first flow-->
<link rel="stylesheet" type="text/css" media="only screen and (min-width:800px)" href="<?php echo of_get_option('layout', 'default.css' ); ?>" />


<link rel="shortcut icon" type="image/ico" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />


<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
    
<div class="container" id="top">
  <!-- header -->
    <header class="main header">
    <div class="logo">
        <a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
            <?php if ( of_get_option('logo') ) { ?>
            <img src="<?php echo of_get_option('logo'); ?>" />
            <?php } else { ?>
            <h1><?php bloginfo( 'name' ); ?> </h1>
            <!-- <p class="slogan">  <?php bloginfo( 'description' ); ?></p>  --><!--uncomment this line if you want tagline tagline-->  
            <?php }  ?>
        </a>
        
    </div>
    
    <!-- nav mobile nav show and hclasse links-->
    <a href="#nav" id="nav_link" class="hidden"></a>
    <nav class="main nav" id="nav">
            <?php wp_nav_menu( array( 'theme_location' => 'header_menu', 'container' => '', 'fallback_cb' => '' ) );  ?>
            <!--add the menu without <div> for HTML5 purity you can manage it via Appearance > menus > header menuheader menu-->

        <a id="close_nav_link" href="#top" class="hidden"></a>
    </nav>
    </header>
  <!-- header end -->