<?php
/**
 * Post overview Template
 *
 * This template should not be shown.  It is a placeholder. Specific templates for each type 
 * of content are available.
 */

get_header(); // Loads the header.php template. ?>

	<div id="content" class="hfeed content">
	    <?php // Get taxonomy term - values: term_id name slug term_group term_taxonomy_id taxonomy description parent count ?>
	    <?php // Get ID for "Nyheder" page
        $slug = 'nyheder';
        $args = array('name' => $slug, 'post_type' => 'page', 'post_status' => 'publish', 'caller_get_posts'=> 1 );
        $page = get_posts($args); ?>
	    <!-- Title banner -->
		<div id="banner-container">
		    <div id="banner">
			    <h1 class="page-title">
                    <a href="<?php echo $_SERVER['REQUEST_URI']; ?>" title="<?php echo $page[0]->post_title; ?>" rel="bookmark"><?php echo $page[0]->post_title; ?></a>
                </h1>
		    </div>
		</div>
		<!-- /Title banner -->

		<?php do_atomic( 'breadcrumb' ); // breadcrumb trail ?>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">
			    
			    <div class="entry-container">
			    <!-- Post title -->
                <div class="entry-overview-title">
				    <a href="<?php the_permalink(); ?>"><?php echo the_title(); //do_atomic( 'entry_header' ); ?></a>
                </div>
                <?php do_atomic('entry_byline'); ?>
                <!-- /Post title -->
                
                <!-- Post content -->
				<div class="entry-content">
					<?php the_content( sprintf( __( 'Continue reading %1$s', hybrid_get_textdomain() ), the_title( ' "', '"', false ) ) ); ?>
					<?php wp_link_pages( array( 'before' => '<p class="page-links pages">' . __( 'Pages:', hybrid_get_textdomain() ), 'after' => '</p>' ) ); ?>
				</div><!-- .entry-content -->
				<!-- /Post content -->

				<?php do_atomic( 'entry_footer' ); ?>
				</div>

			</div><!-- .hentry -->

			<?php if ( is_singular() ) { ?>

				<?php comments_template( '/comments.php', true ); // Loads the comments.php template ?>

			<?php } ?>

			<?php endwhile; ?>

		<?php else: ?>

			<?php get_template_part( 'loop-error' ); // Loads the loop-error.php template. ?>

		<?php endif; ?>

		<?php get_template_part( 'loop-nav' ); ?>

	</div><!-- .content .hfeed -->

<?php get_footer(); // Loads the footer.php template. ?>