<?php
/**
 * Post overview Template
 *
 */

get_header(); // Loads the header.php template. ?>
    
    <?php // Get taxonomy term - values: term_id name slug term_group term_taxonomy_id taxonomy description parent count
    // Get ID for "Nyheder" page
    $slug = 'nyheder';
    $args = array('name' => $slug, 'post_type' => 'page', 'post_status' => 'publish', 'caller_get_posts'=> 1 );
    $page = get_posts($args); ?>

	<div id="content" class="hfeed content">
	    <!-- Title banner -->
		<div id="banner-container">
		    <div id="banner">
			    <h1 class="page-title entry-title">
                    <a href="<?php echo $_SERVER['REQUEST_URI']; ?>" title="<?php echo $page[0]->post_title; ?>" rel="bookmark">
                    <?php if (is_tag()): ?>
                        <?php echo single_tag_title('Tag: '); ?>
                    <?php elseif (is_category()): ?>
                        <?php echo single_cat_title(); ?>
                    <?php elseif (is_author()): ?>
                        <?php $author = get_userdata( get_query_var('author') ); ?>
                        <?php echo "Forfatter: " . $author->display_name; ?>                        
                    <?php else: ?>
                        <?php echo $page[0]->post_title; ?>
                    <?php endif; ?>
                    </a>
                </h1>
		    </div>
		</div>
		<!-- /Title banner -->

		<a href="<?php echo get_permalink($page[0]->ID); ?>">Gå til nyhedsoversigten</a>

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