<?php
/**
 * Template Name: Area splashpage
 */

get_header(); // Loads the header.php template. ?>
	<div id="content" class="hfeed content">
		
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">

				<div id="banner-container">
					<div id="banner">
					</div>
				</div>
				
				<?php if (get_area() == "tools"): ?>
				    
				    <?php get_template_part('areapage-tools'); ?>
				    
				<?php else: ?>
				
				    <?php get_template_part('areapage-materials'); ?>
				    
				<?php endif; ?>
				<?php do_atomic( 'entry_footer' ); ?>
			</div><!-- .hentry -->

			<?php endwhile; ?>
		<?php else: ?>

			<?php get_template_part( 'loop-error' ); // Loads the loop-error.php template. ?>

		<?php endif; ?>

	</div><!-- .content .hfeed -->
<?php get_footer(); // Loads the footer.php template. ?>