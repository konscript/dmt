<?php
/**
 * Page template for the overall product page ("Produkter")
 */

get_header(); // Loads the header.php template. ?>
	<div id="content" class="hfeed content">
		<?php do_atomic( 'entry_header' ); ?>
		<div class="product-category-content">
		    <div class="product-category-call-to-action">
		        Kontakt os på <?php dmt_company_info('phone'); ?> eller <a href="mailto:<?php dmt_company_info('email'); ?>"><?php dmt_company_info('email'); ?></a> for bestilling eller konsultation
		    </div>
            <?php query_posts(array( 'post_type'=>'products', 'orderby'=>'title', 'order'=>'ASC' ) ); ?>
            <?php $productsperrow = 3; $pc = 1; ?>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <!-- Products go here! -->
                <div class="product-category-product">
                    <a href="<?php the_permalink(); ?>">
                        <div class="product-category-product-image-container">
                            <img class="product-category-product-image" src="<?php the_field('image_1'); ?>" />
                        </div>
                        <div class="product-category-product-title">
                            <?php the_title(); ?>
                        </div>
                    </a>
                    <a href="<?php the_field('data_sheet'); ?>"><div class="product-category-product-data"><span>Materialedata <img src="<?php bloginfo('template_url'); ?>/graphics/product_data-sheet-pdf-icon.png" /></span></div></a>
                </div>
                <?php if ($pc % $productsperrow != 0): ?>
                <div class="product-category-product-spacer">&nbsp;</div>
                <?php endif; $pc++; ?>
            <?php endwhile; ?>
            <?php else : ?>
    			<?php get_template_part( 'loop-error' ); // Loads the loop-error.php template. ?>
    		<?php endif; ?>
    		<?php get_template_part( 'loop-nav' ); ?>
		</div>
		<?php do_atomic( 'entry_footer' ); ?>

	</div><!-- .content .hfeed -->
<?php get_footer(); // Loads the footer.php template. ?>