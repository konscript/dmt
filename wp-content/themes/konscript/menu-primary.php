<?php
/**
 * Primary Menu Template
 *
 * Displays the Primary Menu if it has active menu items.
 * @link http://themehybrid.com/themes/hybrid/menus
 */

//if ( has_nav_menu( 'primary' ) ) : ?>

	<div id="top-menu-container" class="menu-container">
		<div id="top-menu" class="menu">
		<?php 
		if (!is_front_page()) {
		echo wp_nav_menu(array( 
			'theme_location' 	=> get_area(), 
			'container' 			=> false, 
			'menu_class' 			=> 'primary-menu',
			'after'           => '<span class="separator">•</span>',
			'fallback_cb' 		=> ''));
		echo wp_nav_menu(array( 
			'theme_location' 	=> 'area', 
			'container' 			=> false, 
			'menu_class' 			=> 'area-menu',
			'fallback_cb' 		=> ''));
			} ?>
		</div>
	</div><!-- #primary-menu .menu-container -->

<?php //endif; ?>