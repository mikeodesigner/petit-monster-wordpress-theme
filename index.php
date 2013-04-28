<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<title><?php wp_title('|', true, 'right'); ?> <?php bloginfo('name'); ?> </title>


<!-- disable zoom for iOS-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

<!--aligner plugin-
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/plugins/aligner/aligner.css" />

-->

<!-- styles -->
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />


<meta name="keywords" content="<?php wp_title(); echo ' , '; bloginfo( 'name' ); echo ' , '; bloginfo( 'description' ); ?>" />
<meta name="description" content="<?php wp_title(); echo ' | '; bloginfo( 'description' ); ?>" />


<link rel="stylesheet" type="text/css" media="all" href="<?php echo of_get_option('typography', 'default.css' ); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo of_get_option('colors', 'default.css' ); ?>" />
<link rel="stylesheet" type="text/css" media="only screen and (min-width:800px)" href="<?php echo of_get_option('layout', 'default.css' ); ?>" />


<!--
<link href="<?php bloginfo('template_directory'); ?>/css/random/typography/<?php echo mt_rand(1, 7); ?>.css" rel="stylesheet" type="text/css"/>
<link href="<?php bloginfo('template_directory'); ?>/css/random/colors/<?php echo mt_rand(1, 9); ?>.css" rel="stylesheet" type="text/css"/>
<link href="<?php bloginfo('template_directory'); ?>/css/random/layout/<?php echo mt_rand(1, 7); ?>.css" rel="stylesheet" type="text/css"/>
-->

<!-- plugs in responsive.css when screen is smaller then global width-
<link rel="stylesheet" type="text/css" media="only screen and (max-width:800px)" href="<?php bloginfo('template_directory'); ?>/responsive.css" /-->

<link rel="shortcut icon" type="image/ico" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />


<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
	
	<!-- simplifying 
	<div id="main_container">
<div class="container" id="top"--> 


<div class="container">
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
	<a href="#nav" id="nav_link"></a>
	
	
	<nav class="main nav">
    	<ul>
			<?php wp_nav_menu_no_ul( array( 'theme_location' => 'header_menu', 'container' => '' ) );  ?>
			<a id="close_nav_link" href="#top"></a>
      		<!--add the menu without <div> for HTML5 purity you can manage it via Appearance > menus > header menuheader menu-->
		</ul>
	</nav>

	</header>
  <!-- header end -->

  <section class="main section">

    <!-- display content -->
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<?php if ( is_archive()) { ?>
			<article class="loop"> 
		    <?php the_title( '<h2>', '</h2>' ); ?><!-- display title everywhere but on the home page -->
		 <time> <? the_time('F jS, Y') ?> </time> <!--displays creation time for posts only -->
		<?php the_content(__('Read Article'));?>
		</article>
		<?php } else { ?>

		<article class="single">
	    <?php if ( !is_front_page() ) { the_title( '<h1>', '</h1>' ); }?><!-- display title everywhere but on the home page -->
		<?php if ( !is_page()) { ?> <time> <? the_time('F jS, Y') ?> </time> <?php } ?><!--displays creation time for posts only -->
		<?php the_content(__('Read Article'));?>
		
		<?php } ?>
		
		
    </article>
    <?php endwhile; else: ?>
    <div class="no-results">
      <p><strong>There has been an error.</strong></p>
      <p>We apologize for any inconvenience, please <a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>">return to the home page</a></p>
    </div>
    <!--noResults-->
    <?php endif; ?>
    <!-- end display content --> 
  	</section>
  <?php if ( ! is_front_page()) : ?>
  <!-- display sidebar on all pages apart from home -->
  <aside class="main aside">
    <?php
	get_sidebar();
	?>
  </aside>
  <?php endif; ?>


  <footer class="main footer">
	<section>
    <p>	&copy; <?php echo date("Y") ?> <a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></p>
  	</section>
</footer>

<!-- simplifying 

</div>
</div>

-->

<?php wp_footer(); ?>


</div><!--container--> 
</body>
</html>
