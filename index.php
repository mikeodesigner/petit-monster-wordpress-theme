<!-- 

//  Index.php 
//  it is the most generic template representing all pages

-->

<?php get_header(); ?>

  <section class="main section">
   <!-- display content -->
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    
        <?php if ( is_singular()) { ?> <!-- checks for single post or instead of single.php-->
                  
        <article class="single">
        <?php if ( !is_front_page() ) { the_title( '<h1>', '</h1>' ); }?><!-- display title everywhere but on the home page -->
        <?php if ( !is_page()) { ?> <time> <?php the_time('F jS, Y') ?> </time> <?php } ?><!--displays creation time for posts only -->
        <?php the_content(__('Read Article'));?>
        </article>
        
        <?php } else { ?>

        <article class="loop"> 
         <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
         <time> <?php the_time('F jS, Y') ?> </time>
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


<?php get_footer(); ?>

