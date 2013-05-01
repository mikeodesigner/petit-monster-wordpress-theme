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

  <section class="main section">
   <!-- display content -->
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    
        <?php if ( is_singular()) { ?> <!-- checks for single post or instead of single.php-->
                  
        <article class="single">
        <?php if ( !is_front_page() ) { the_title( '<h1>', '</h1>' ); }?><!-- display title everywhere but on the home page -->
        <?php if ( !is_page()) { ?> <time> <? the_time('F jS, Y') ?> </time> <?php } ?><!--displays creation time for posts only -->
        <?php the_content(__('Read Article'));?>
        </article>
        
        <?php } else { ?>

        <article class="loop"> 
         <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
         <time> <? the_time('F jS, Y') ?> </time>
        <?php the_content(__('Read Article'));?>
        </article>
        
        <?php } ?>
        
    <?php endwhile; else: ?>
    
    <div class="no-results">
      <h3>There has been an error.</h3>
      <p>We apologize for any inconvenience, please <a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>">return to the home page</a></p>
    </div>
    <!--noResults-->
    <?php endif; ?>
    <!-- end display content --> 
    </section>



  <?php if ( ! is_front_page()) : ?><!-- display sidebar on all pages apart from home -->
  <aside class="main aside"> 
  <?php dynamic_sidebar( 'Sidebar 1' ); ?>
  </aside>
  <?php endif; ?>



<footer class="main footer">
    <section>
    <p> &copy; <?php echo date("Y") ?> <a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></p>
    </section>
</footer>

<?php wp_footer(); ?>

</div><!--container--> 
</body>
</html>
