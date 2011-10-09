<?php
/**
 * Footer Menu Template
 *
 * Displays the Footer Menu if it has active menu items.
 * @link http://themehybrid.com/themes/hybrid/menus
 */

//if ( has_nav_menu( 'primary' ) ) : ?>

	<div id="footer-menu-container">
		<div id="materials-footer-menu">
		<span class="footer-menu-title">Genveje - Materialer</span>
		<?php
		echo wp_nav_menu(array( 
			'theme_location' 	=> 'materials-footer', 
			'container' 			=> false, 
			'menu_class' 			=> 'materials-footer-menu',
			'fallback_cb' 		=> ''));
		?>
		</div>
		<div id="tools-footer-menu">
		<span class="footer-menu-title">Genveje - Værktøjer</span>
		<?php
		echo wp_nav_menu(array( 
			'theme_location' 	=> 'tools-footer', 
			'container' 			=> false, 
			'menu_class' 			=> 'tools-footer-menu',
			'fallback_cb' 		=> ''));
		?>
		</div>
	</div><!-- #primary-menu .menu-container -->

<?php //endif; ?>