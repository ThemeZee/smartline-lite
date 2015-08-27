
	<section id="sidebar" class="secondary clearfix" role="complementary">

		<?php
			// Check if Sidebar has widgets
			if( is_active_sidebar('sidebar') ) : 
			
				dynamic_sidebar('sidebar');
			
			// Show hint where to add widgets
			else : ?>

			<aside class="widget">
				<h3 class="widgettitle"><?php _e('Sidebar', 'smartline-lite'); ?></h3>
				<div class="textwidget">
					<p><?php _e('Please go to Appearance &#8594; Widgets to set up your widgets in the sidebar.', 'smartline-lite'); ?></p>
				</div>
			</aside>
		
		<?php endif; ?>

	</section>
