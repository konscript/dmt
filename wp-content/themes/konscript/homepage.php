<?php
/**
 * Template Name: Homepage
 */

get_header(); // Loads the header.php template. ?>
	<div id="content" class="hfeed content">
		
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">

				<div id="banner-container">
					<div id="banner">
					</div>
				</div>
				
				<div class="entry-content">
					<?php the_content(); ?>
					<?php wp_link_pages( array( 'before' => '<p class="page-links pages">' . __( 'Pages:', hybrid_get_textdomain() ), 'after' => '</p>' ) ); ?>
				</div><!-- .entry-content -->
				<?php do_atomic( 'entry_footer' ); ?>
			</div><!-- .hentry -->
			
			<div id="home-widgetzone" class="widgetzone">
				<?php dynamic_sidebar( 'homepage' ); ?>
			</div>
				
			<?php endwhile; ?>
		<?php else: ?>

			<?php get_template_part( 'loop-error' ); // Loads the loop-error.php template. ?>

		<?php endif; ?>

	</div><!-- .content .hfeed -->
<?php get_footer(); // Loads the footer.php template. ?>