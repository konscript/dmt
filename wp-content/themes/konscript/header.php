<?php
/**
 * Header Template (header.php)
 *
 * The header template is generally used on every page of your site. Nearly all other
 * templates call it somewhere near the top of the file. It is used mostly as an opening
 * wrapper, which is closed with the footer.php file. It also executes key functions needed
 * by the theme, child themes, and plugins. 
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>
<head>
	
	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
	<meta name="keywords" content="materialer, værktøjer, bronze, specialmetaller, overfladebelægninger, glidelejer" />
	<title><?php if (is_front_page()) { echo "Dansk Materiale Teknik: Materialer og Værktøjer"; } else hybrid_document_title(); ?> | Dansk Materiale Teknik A/S</title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); // wp_head ?>
	<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/stylesheet/compiled/main.css" type="text/css" media="all" />
	<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/stylesheet/compiled/print.css" type="text/css" media="print" />
	<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/javascript/jquery.cycle.lite.js"></script>
	<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/javascript/main.js"></script>
	
</head>
<body class="bp <?php hybrid_body_class(); ?> <?php echo 'dmt-area-' . get_area(); ?>">
	<div id="body-container">
		<div id="body-wrapper">
			<div id="header-container">
				<div id="header">
					<?php do_atomic( 'header' ); // hybrid_header ?>
					<?php get_template_part( 'menu-general' ); ?>				
					<div id="site-sponsors">
						<a href="http://www.findsmiley.dk/da-DK/Searching/DetailsView.htm?virk=506740" target="_blank" style="width: 59px">
							<img id="sponsor-logo-3-hover" class="sponsor-hover" title="Fødevarestyrelsens smiley-rapport" src="<?php echo get_bloginfo ('template_url'); ?>/graphics/sponsor-logo-smiley-color.png" />
							<img id="sponsor-logo-3" class="sponsor-idle" title="Fødevarestyrelsens smiley-rapport" src="<?php echo get_bloginfo ('template_url'); ?>/graphics/sponsor-logo-smiley-gray.png" />
						</a>
						<a href="http://www.danskjern.dk/" target="_blank" style="width: 70px">
							<img id="sponsor-logo-1-hover" class="sponsor-hover" title="Dansk Jerncentral" src="<?php echo get_bloginfo ('template_url'); ?>/graphics/sponsor-logo-dj-color.png" />
							<img id="sponsor-logo-1" class="sponsor-idle" title="Dansk Jerncentral" src="<?php echo get_bloginfo ('template_url'); ?>/graphics/sponsor-logo-dj-gray.png" />
						</a>
						<a href="http://www.cancer.dk/" target="_blank" style="width: 90px">
							<img id="sponsor-logo-2-hover" class="sponsor-hover" title="Kræftens Bekæmpelse" src="<?php echo get_bloginfo ('template_url'); ?>/graphics/sponsor-logo-cancer-color.png" />
							<img id="sponsor-logo-2" class="sponsor-idle" title="Kræftens Bekæmpelse" src="<?php echo get_bloginfo ('template_url'); ?>/graphics/sponsor-logo-cancer-gray.png" />
						</a>
					</div>
					<?php get_template_part( 'menu-primary' ); ?>
				</div><!-- #header -->
			</div><!-- #header-container -->

			<div id="content-container">