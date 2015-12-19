
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<?php the_title( '<h1 class="entry-title post-title">', '</h1>' ); ?>
		
		<div class="entry-meta postmeta"><?php smartline_display_postmeta(); ?></div>

		<div class="entry clearfix">
			<?php smartline_display_thumbnail_single(); ?>
			<?php the_content(); ?>
			<!-- <?php trackback_rdf(); ?> -->
			<div class="page-links"><?php wp_link_pages(); ?></div>			
		</div>
		
		<div class="postinfo clearfix"><?php smartline_display_postinfo(); ?></div>

	</article>