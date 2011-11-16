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