<?php
/**
 * Footer Template
 *
 * The footer template is generally used on every page of your site. Nearly all other
 * templates call it somewhere near the bottom of the file. It is used mostly as a closing
 * wrapper, which is opened with the header.php file. It also executes key functions needed
 * by the theme and plugins. 
 */
?>

		</div><!-- #content-container -->
	</div><!-- #body-wrapper -->
	<div id="footer-container">
		<div id="footer">
		<!--
			<span>Dansk Materiale Teknik A/S  |  Smedeholm 8, DK-2730 Herlev, Danmark</span>
			<span>CVR: 25063481  |  dmt@dmtas.dk  |  +45 70201601</span>
		-->
		    <?php get_template_part( 'menu-footer' ) ?>
		    <?php dynamic_sidebar( 'footer' ); ?>
			<?php //do_atomic( 'breadcrumb' ); // breadcrumb trail ?>
		</div><!-- #footer -->
	</div><!-- #footer-container -->
</div><!-- #body-container -->

<?php wp_footer(); ?>

</body>
</html>