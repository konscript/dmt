<?php
/**
 * Template Name: Products
 * Page template for the overall product page ("Produkter")
 */

get_header(); // Loads the header.php template. ?>
	<div id="content" class="hfeed content">
	    <?php // Get taxonomy term - values: term_id name slug term_group term_taxonomy_id taxonomy description parent count ?>
	    <?php $term = get_term_by('slug', get_query_var( 'product-categories' ), 'product-categories' ); ?>
	    <!-- Title banner -->
		<div id="banner-container">
		    <div id="banner">
			    <h1 class="entry-title page-title"><?php the_title(); ?></h1>
		    </div>
		</div>
		<!-- /Title banner -->
		
		<div class="product-category-content">

            <?php query_posts(array( 'post_type'=>'products', 'product-categories'=>$term->slug, 'orderby'=>'title', 'order'=>'ASC', 'nopaging'=>'true' ) ); ?>
            <?php $productsperrow = 3; $pc = 1; ?>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <!-- Products go here! -->
                <div class="product-category-product">
                    <a href="<?php the_permalink(); ?>">
                        <div class="product-category-product-image-container">
                            <?php if (get_field('image_1')): ?>
                            <img class="product-category-product-image" src="<?php the_field('image_1'); ?>" />
														<?php else: ?>
														<img class="product-category-product-noimage" src="<?php bloginfo('template_url'); ?>/graphics/product_gallery-noimage.png" />
                            <?php endif; ?>
                        </div>
                        <div class="product-category-product-title">
                            <div class="product-category-product-title-text"><?php the_title(); ?></div>
                            <?php if (get_field('data_sheet')): ?>
				                    <a href="<?php the_field('data_sheet'); ?>" title="Hent materialedata"><div class="product-category-product-data"><img src="<?php bloginfo('template_url'); ?>/graphics/product_data-sheet-pdf-icon_cropped.png" /></div></a>
				                    <?php endif; ?>
                        </div>
                    </a>
                </div>
                <?php if ($pc % $productsperrow != 0): ?>
                <!--<div class="product-category-product-spacer">&nbsp;</div>-->
                <?php endif; $pc++; ?>
            <?php endwhile; ?>
            <?php else : ?>
    			<?php get_template_part( 'loop-error' ); // Loads the loop-error.php template. ?>
    		<?php endif; ?>
    		<?php get_template_part( 'loop-nav' ); ?>

		    <div class="box-call-to-action">
		        <div class="box-call-to-action-inner">
							Tlf. <?php dmt_company_info('phone'); ?> eller <a href="mailto:<?php dmt_company_info('email'); ?>"><?php dmt_company_info('email'); ?></a><br />
							for bestilling og konsultation
						</div>
		    </div>

		</div>
		<?php do_atomic( 'entry_footer' ); ?>
		
	</div><!-- .content .hfeed -->
<?php get_footer(); // Loads the footer.php template. ?>