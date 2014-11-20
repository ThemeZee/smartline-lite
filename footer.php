
	<footer id="footer" class="clearfix" role="contentinfo">
		
		<?php // Display Footer Navigation
		if ( has_nav_menu( 'footer' ) ) : ?>
		
		<nav id="footernav" class="clearfix" role="navigation">
			<?php wp_nav_menu(	array(
				'theme_location' => 'footer', 
				'container' => false, 
				'menu_id' => 'footernav-menu', 
				'fallback_cb' => '', 
				'depth' => 1)
			);
			?>
			<h5 id="footernav-icon"><?php _e('Menu', 'smartline-lite'); ?></h5>
		</nav>
		
		<?php endif; ?>
		
		<div id="credit-link"><?php smartline_credit_link(); ?></div>
		
	</footer>

</div><!-- end #wrapper -->

<?php wp_footer(); ?>
</body>
</html>