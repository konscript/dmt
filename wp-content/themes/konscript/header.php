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
	<title><?php hybrid_document_title(); ?> | Dansk Materiale Teknik A/S</title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); // wp_head ?>
	<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/stylesheet/compiled/main.css" type="text/css" media="all" />
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
						<a href="http://www.danskjern.dk/">
							<img id="sponsor-logo-1" title="Dansk Jerncentral" src="<?php echo get_bloginfo ('template_url'); ?>/graphics/sponsor-logo-dj-gray.png" />
						</a>
						<a href="http://www.cancer.dk/">
							<img id="sponsor-logo-2" title="Kræftens Bekæmpelse" src="<?php echo get_bloginfo ('template_url'); ?>/graphics/sponsor-logo-cancer-gray.png" />
						</a>
					</div>
					<?php get_template_part( 'menu-primary' ); ?>
				</div><!-- #header -->
			</div><!-- #header-container -->

			<div id="content-container">