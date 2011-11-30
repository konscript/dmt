<?php
/**
 * Template Name: Tilbud
 * Page template for the page "Tilbud lige nu"
 */

get_header(); // Loads the header.php template. ?>
	<div id="content" class="hfeed content">
		<?php do_atomic( 'entry_header' ); ?>
		<div class="tilbud-content">
		    <?php $parent = $post->ID; ?>
            <?php query_posts('post_type=page&post_parent='.$parent); ?>
            <?php $perrow = 4; $count = 1; ?>
            <div class="tilbud-centering-container">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <div class="tilbud-thumbnail-container">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail( array(175, 200) /* size */ ); ?>
                        <span><?php the_title(); ?></span>
                    </a>
                </div>
                
            <?php if ($count % $perrow != 0): ?>
                <div class="tilbud-spacer">&nbsp;</div>
            <?php endif; $count++; ?>
                
            <?php endwhile; ?>
            <?php else : ?>
    			<?php get_template_part( 'loop-error' ); // Loads the loop-error.php template. ?>
    		<?php endif; ?>
    		
    		<?php get_template_part( 'loop-nav' ); ?>
    		</div> <!-- .tilbud-centering-container -->
		</div>
		<?php do_atomic( 'entry_footer' ); ?>

	</div><!-- .content .hfeed -->
<?php get_footer(); // Loads the footer.php template. ?>