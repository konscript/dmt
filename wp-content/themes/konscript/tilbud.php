<?php
/**
 * Template Name: Tilbud Viewer
 * For singular tilbud pages
 */

get_header(); // Loads the header.php template.  ?>
	<div id="content" class="hfeed content">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">
			    <?php do_atomic( 'entry_header' ); ?>
				
                <div id="tilbud-embedded">
                    <a href="<?php echo get_permalink($post->post_parent); ?>">Gå til tilbudsoversigten</a> | <a href="<?php the_field('catalogue_pdf'); ?>">Download katalog</a>
                    
                    <iframe src="https://docs.google.com/viewer?url=<?php the_field('catalogue_pdf'); ?>&hl=da&embedded=true">
                    </iframe>
                    
                </div>
                
				<?php do_atomic( 'entry_footer' ); ?>
			</div><!-- .hentry -->

			<?php endwhile; ?>
		<?php else: ?>

			<?php get_template_part( 'loop-error' ); // Loads the loop-error.php template. ?>

		<?php endif; ?>

	</div><!-- .content .hfeed -->
<?php get_footer(); // Loads the footer.php template. ?>