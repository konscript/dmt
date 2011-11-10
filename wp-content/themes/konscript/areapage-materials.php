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
        <?php the_field('right_column'); ?>
    </div>
</div>