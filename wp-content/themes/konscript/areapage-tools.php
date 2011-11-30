<?php
/**
 * Template for the Tools front page
 */
?>
<div class="tools-front-content">

    <div class="tools-front-left-column">
	    <?php the_content(); ?>
	</div>

	<div class="tools-front-right-column">
		
    <div class="box-call-to-action">
        <div class="box-call-to-action-inner">
					Tlf. <?php dmt_company_info('phone'); ?> eller <a href="mailto:<?php dmt_company_info('email'); ?>"><?php dmt_company_info('email'); ?></a><br />
					for bestilling og konsultation
				</div>
    </div>		
		
	    <?php
        // Get ID for "Produkter" page
        $slug = 'vaerktoejer-produkter';
        $args = array(
          'name' => $slug,
          'post_type' => 'page',
          'post_status' => 'publish',
          'showposts' => 1,
          'caller_get_posts'=> 1
        );
        $page = get_posts($args);
        ?>
        <a href="<?php echo get_permalink($page[0]->ID) ?>" title="Se oversigt over vores leverandører">
	    <div id="tools-front-manufacturers">
	        <div id="tools-front-manufacturers-title">
	            <span>Vores produktleverandører</span>
	        </div>
		    <div id="tools-front-manufacturers-slideshow">
            <?php
            // Get images from "Produkter" page
            $attachments = get_children( array('post_parent' => $page[0]->ID, 'post_type' => 'attachment', 'post_mime_type' =>'image') );
            foreach ( $attachments as $attachment_id => $attachment ): $arr = (wp_get_attachment_image_src( $attachment_id )); ?>    
                <div><div style="background-image: url('<?php echo $arr[0]; ?>');"></div></div>
            <?php endforeach; ?>
           </div>
        </div>
        </a>
	    <?php
        // Get ID for "Tilbud lige nu" page
        $slug = 'tilbud';
        $args = array(
          'name' => $slug,
          'post_type' => 'page',
          'post_status' => 'publish',
          'showposts' => 1,
          'caller_get_posts'=> 1
        );
        $page = get_posts($args);
        ?>                            
        <div id="tools-front-tilbud">
            <a href="<?php echo get_permalink($page[0]->ID) ?>" title="Se alle vores tilbud">
            <div id="tools-front-tilbud-title">
                <span>Seneste tilbud</span>
            </div>
            </a>
            
            <div id="tools-front-tilbud-single-centering-container">
            <?php $parent = $page[0]->ID; ?>
            <?php $tilbud = get_posts( array('post_type' => 'page', 'post_parent' => $parent) ); ?>
            <?php $limit = 3; ?>
            <?php for ($i = 0; $i < $limit; $i++): setup_postdata($tilbud[$i]) ?>
                <?php if ($i > 0): ?>
                <div class="tools-front-tilbud-single-spacer">&nbsp;</div>
                <?php endif; ?>
                <div class="tools-front-tilbud-single">
                <a href="<?php echo get_permalink($tilbud[$i]->ID); ?>">
                <?php echo get_the_post_thumbnail($tilbud[$i]->ID, array(200,200), array( 'alt' => $tilbud[$i]->post_title, 'title' => $tilbud[$i]->post_title ) ); ?>
                </a>
                </div>
                <?php endfor; ?>
            </div>
        </div>

	</div>
	    
</div>