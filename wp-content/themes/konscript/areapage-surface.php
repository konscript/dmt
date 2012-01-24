<?php
/**
 * Template for the Overfladebehandling front page
 */
?>
<div class="surface-front-content">
    <div id="surface-front-left-column">
        <?php the_content(); ?>
    </div>
    
    <div id="surface-front-right-column">
	
	    <div class="box-call-to-action">
	        <div class="box-call-to-action-inner">
						Tlf. <?php dmt_company_info('phone'); ?> eller <a href="mailto:<?php dmt_company_info('email'); ?>"><?php dmt_company_info('email'); ?></a><br />
						for bestilling og konsultation
					</div>
	    </div>
    </div>
</div>