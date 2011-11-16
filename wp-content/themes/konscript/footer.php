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
			<div id="footer-products">
				<div class="footer-products-text">Se hvilke produkter vi udbyder indenfor:</div><br />
				<a class="footer-button first" href="materialer/produkter">Materialer</a>
				<a class="footer-button" href="vaerktoejer/vaerktoejer-produkter">Værktøjer</a>
			</div>
			<div id="footer-info">
				<img src="<?php echo get_bloginfo ('template_url'); ?>/graphics/logo_footer.png" />				
				<div>Dansk Materiale Teknik A/S  |  Smedeholm 8, DK-2730 Herlev, Danmark<br />
				CVR: 25063481  |  dmt@dmtas.dk  |  +45 70201601</div>
			</div>
		    <?php //get_template_part( 'menu-footer' ) ?>
		    <?php //dynamic_sidebar( 'footer' ); ?>
			<?php //do_atomic( 'breadcrumb' ); // breadcrumb trail ?>
		</div><!-- #footer -->
	</div><!-- #footer-container -->
</div><!-- #body-container -->

<?php wp_footer(); ?>

</body>
</html>