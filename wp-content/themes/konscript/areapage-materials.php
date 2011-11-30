<?php
/**
 * Template for the Materials front page
 */
?>
<div class="materials-front-content">
    <div id="materials-front-left-column">
        <?php the_content(); ?>
    </div>
    
    <div id="materials-front-right-column">
	
	    <div class="box-call-to-action">
	        <div class="box-call-to-action-inner">
						Tlf. <?php dmt_company_info('phone'); ?> eller <a href="mailto:<?php dmt_company_info('email'); ?>"><?php dmt_company_info('email'); ?></a><br />
						for bestilling og konsultation
					</div>
	    </div>	
	
	    <div id="materials-front-manufacturers">
	      <div id="materials-front-manufacturers-title">
					<span>Vores hovedleverandører</span>
	      </div>
		    <div id="materials-front-manufacturers-content">
        	<?php the_field('right_column'); ?>
				</div>
			</div>
    </div>
</div>