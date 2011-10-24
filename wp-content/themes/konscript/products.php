<?php
/**
 * Products Template (products.php)
 *
 * WordPress currently supports custom post types displayed on the singular post level. This template
 * is a catchall template for the singular views of these posts. It should only be used as a backup or if
 * your custom post type doesn't require a custom structure. The template hierarchy for singular views
 * of post types is like so: $post_type-$template.php, $post_type-$slug.php, $post_type-$id.php,
 * $post_type.php, and singular.php.
 */

get_header(); ?>
	<div id="content" class="hfeed content">
        
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">
				<?php do_atomic( 'entry_header' ); ?>
    			<div class="entry-content">
    			    <div id="product-left-column">
    			        <?php if (get_field('image_1')): ?>
        				<div id="product-image-container">
        				    <div id="product-main-image-container">
        				        <img id="product-main-image" src="<?php the_field('image_1'); ?>" />
        				    </div>
        				    <?php if (get_field('image_2')): ?>
                            <ul>
                              <li><img class="product-gallery-thumb" src="<?php the_field('image_1'); ?>" /></li>
                              <li><img class="product-gallery-thumb" src="<?php the_field('image_2'); ?>" /></li>
                              <?php if (get_field('image_3')): ?>
                              <li><img class="product-gallery-thumb" src="<?php the_field('image_3'); ?>" /></li>
                              <?php endif; ?>
                            </ul>
                            <?php endif; ?>
        				</div>
        				<?php endif; ?>
        				<div id="product-description">
        				    <?php the_field('product_description'); ?>
        				</div>
        				<div id="product-data">
        				    <div id="product-data-header">Hent materialedata</div>
			                <a href="<?php the_field('data_sheet'); ?>"><?php echo basename(get_field('data_sheet')); ?> <img id="product-data-icon" src="<?php bloginfo('template_url'); ?>/graphics/product_data-sheet-pdf-icon.png" /></a>
        				</div>
        				<div id="product-call-to-action">
        				    Bestil på 70201601 eller <a href="mailto:dmt@dmtas.dk">dmt@dmtas.dk</a>
        				</div>
    				</div>
    				<div id="product-right-column">
    				    <div id="product-content-header">Specifikationer</div>
        				<div id="product-content">
        					<?php the_content(); ?>
        					<?php wp_link_pages( array( 'before' => '<p class="page-links pages">' . __( 'Pages:', hybrid_get_textdomain() ), 'after' => '</p>' ) ); ?>
        				</div>
    				</div>
				</div>
				<?php do_atomic( 'entry_footer' ); ?>
			</div>

		<?php endwhile; ?>
		<?php else : ?>

			<?php get_template_part( 'loop-error' ); // Loads the loop-error.php template. ?>

		<?php endif; ?>

		<?php get_template_part( 'loop-nav' ); ?>
	</div><!-- .content .hfeed -->
<?php get_footer(); // Loads the footer.php template. ?>