<?php
/**
 * Template Name: Homepage
 */

get_header(); // Loads the header.php template. ?>
	<div id="content" class="hfeed content">
		
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">

				<div id="banner-container">
					<div id="banner-materials">
						<a href="<?php echo get_bloginfo('siteurl'); ?>/materialer">
						<div class="banner-button">Materialer</div>
						<p>
							Bronze,<br />
							Filterbronze,<br /> 
							Glidelejer,<br />
							Metaller,<br />
							m.fl.
						</p>						
						</a>
					</div>
					<div id="banner-surface">
						<a href="<?php echo get_bloginfo('siteurl'); ?>/overfladebehandling">
						<div class="banner-button">Overfladebehandling</div>
						<p>
							Nedox, Tixon,<br /> 
							Tufram, Ytox,<br /> 
							Anodisering,<br />
							Forkroming,<br />
							m.fl.</p>
						</a>
					</div>
					<div id="banner-tools">
						<a href="<?php echo get_bloginfo('siteurl'); ?>/vaerktoejer">
						<div class="banner-button">Værktøj</div>
						<p>
							Facom,<br />
							Hitachi,<br /> 
							Skydda,<br /> 
							Serenco,<br />
							m.fl.</p>
						</a>
					</div>
				</div>
				
				<div class="entry-content">
					<?php the_content(); ?>
					<?php wp_link_pages( array( 'before' => '<p class="page-links pages">' . __( 'Pages:', hybrid_get_textdomain() ), 'after' => '</p>' ) ); ?>
					<?php do_atomic( 'entry_footer' ); ?>
				</div><!-- .entry-content -->
			</div><!-- .hentry -->
			
			<div id="home-widgetzone" class="widgetzone">
				<?php //dynamic_sidebar( 'homepage' ); ?>
		    <div class="box-call-to-action">
		        <div class="box-call-to-action-inner">
							Tlf. <?php dmt_company_info('phone'); ?> eller <a href="mailto:<?php dmt_company_info('email'); ?>"><?php dmt_company_info('email'); ?></a><br />
							for bestilling og konsultation
						</div>
		    </div>
			</div>
				
			<?php endwhile; ?>
		<?php else: ?>

			<?php get_template_part( 'loop-error' ); // Loads the loop-error.php template. ?>

		<?php endif; ?>

	</div><!-- .content .hfeed -->
<?php get_footer(); // Loads the footer.php template. ?>