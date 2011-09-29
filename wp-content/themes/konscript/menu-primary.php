<?php
/**
 * Primary Menu Template
 *
 * Displays the Primary Menu if it has active menu items.
 * @link http://themehybrid.com/themes/hybrid/menus
 */

if ( has_nav_menu( 'primary' ) ) : ?>
	<div id="primary-menu" class="menu-container">
		<span id="primary-menu-left-end"><img src="<?php bloginfo('template_url'); ?>/graphics/primary-menu_left.png"></span>
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'menu', 'menu_class' => '', 'fallback_cb' => '' ) );?>
		<span id="primary-menu-right-end"><img src="<?php bloginfo('template_url'); ?>/graphics/primary-menu_right.png"></span>		
	</div><!-- #primary-menu .menu-container -->

<?php endif; ?>