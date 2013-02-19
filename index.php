<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Template &middot; Bootstrap</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<!-- styles -->
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo of_get_option('typography', 'default.css' ); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo of_get_option('colors', 'default.css' ); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo of_get_option('layout', 'default.css' ); ?>" />
<style type="text/css">
/* Custom container 
 .container {
	margin: 0 auto;
	width: <?php echo of_get_option('site_width', '1000px');
?>;
}
*/

@media only screen and (max-width:<?php echo of_get_option('site_width', '0');?> ) {


}

</style>


<!-- plugs in responsive.css when screen is smaller then global width-->

<!--link rel="stylesheet" type="text/css" media="only screen and (max-width: <?php echo of_get_option('site_width', '800px');?>)" href="<?php bloginfo('template_directory'); ?>/responsive.css" />


<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="container"> 
  <!-- header -->
	<header class="global">
  	<hgroup>
		<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
      		<?php if ( of_get_option('logo') ) { ?>
      		<img src="<?php echo of_get_option('logo'); ?>" />
      		<?php } else { ?>
      		<h1 class="logo"><?php bloginfo( 'name' ); ?> </h1>
			<!-- <p class="slogan">  <?php bloginfo( 'description' ); ?></p>  --><!--uncomment this line if you want tagline tagline-->  
      		<?php }  ?>
		</a>
	</hgroup>
	<nav class="global">
    	<ul>
			<?php wp_nav_menu_no_ul( array( 'theme_location' => 'header_menu', 'container' => '' ) );  ?>
      		<!--add the menu without <div> for HTML5 purity you can manage it via Appearance > menus > header menuheader menu-->
		</ul>
	</nav>

	</header>
  <!-- header end -->

  <section class="content global">
    <div>

    <!-- display content -->
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <section class="post-content entry-content">
	    <?php if ( !is_front_page() ) { the_title( '<h1>', '</h1>' ); }?><!-- display title everywhere but on the home page -->
		<?php if ( !is_page()) { ?> <time> <? the_time('F jS, Y') ?> </time> <?php } ?><!--displays creation time for posts only -->
		<?php the_content(__('Read more'));?>
    </section>
    <?php endwhile; else: ?>
    <div class="no-results">
      <p><strong>There has been an error.</strong></p>
      <p>We apologize for any inconvenience, please <a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>">return to the home page</a></p>
    </div>
    <!--noResults-->
    <?php endif; ?>
    <!-- end display content --> 
    </div>
  	</section>
  <?php if ( ! is_front_page()) : ?>
  <!-- display sidebar on all pages apart from home -->
  <aside class="global">
    <?php
	get_sidebar();
	?>
  </aside>
  <?php endif; ?>


  <footer class='global'>
    <p>&copy; Company 2012</p>
  </footer>
</div>
<!-- /container --> 

<?php wp_footer(); ?>
</body>
</html>
