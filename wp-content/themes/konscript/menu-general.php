<?php
/**
 * Primary Menu Template
 *
 * Displays the Primary Menu if it has active menu items.
 * @link http://themehybrid.com/themes/hybrid/menus
 */

//if ( has_nav_menu( 'primary' ) ) : ?>

	<div id="general-menu-container" class="menu-container">
		<div id="general-menu" class="menu">
		<?php 
		echo wp_nav_menu(array( 
			'theme_location' 	=> 'general', 
			'container' 			=> false, 
			'menu_class' 			=> 'general-menu',
			'after'           => '<span class="separator">•</span>',
			'fallback_cb' 		=> ''));
		?>
		</div>
	</div><!-- #primary-menu .menu-container -->

<?php //endif; ?>