
	<?php if ( ! dynamic_sidebar( 'Sidebar 1' )) : ?>
			
	  <section class="widget">
			<h3>Archives</h3>
			<ul>
				<?php wp_get_archives( 'type=monthly' ); ?>
			</ul>
	 </section>
	

	<?php endif; ?>