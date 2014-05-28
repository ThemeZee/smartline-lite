<?php get_header(); ?>

<?php // Get Theme Options from Database
	$theme_options = smartline_theme_options();
?>

<?php // Retrieve Current Author
	$author = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
?>
	
	<div id="wrap" class="clearfix">
		
		<section id="content" class="primary" role="main">
		
			<h2 id="author-title" class="archive-title">
				<?php printf(__('Author Archives: %s', 'smartline-lite'), '<span>' . esc_attr($author->display_name) . '</span>'); ?>
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