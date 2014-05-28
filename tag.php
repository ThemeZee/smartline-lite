<?php get_header(); ?>

<?php // Get Theme Options from Database
	$theme_options = smartline_theme_options();
?>

	<div id="wrap" class="clearfix">
		
		<section id="content" class="primary" role="main">

		<h2 id="tag-title" class="archive-title">
			<?php printf(__('Tag Archives: %s', 'smartline-lite'), '<span>' . single_cat_title( '', false ) . '</span>'); ?>
		</h2>

		<?php if (have_posts()) : while (have_posts()) : the_post();
		
			get_template_part( 'content', $theme_options['posts_length'] );
		
			endwhile;
			
		smartline_display_pagination();

		endif; ?>
			
		</section>
		
		<?php get_sidebar(); ?>
	</div>
	
<?php get_footer(); ?>	