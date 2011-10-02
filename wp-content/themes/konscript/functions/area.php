<?php
/**
 * Area (area.php)
 * Logic for the DMT areas (tools/materials) scoping
 */

/* Enable sessions (for DMT area tracking) */
if (!session_id())
    session_start();

/**
 * Retrieves the current DMT area scope for the page/post (or reverts to general if not applicable)
 */
function get_wp_area($post_id = false) {
	if ( is_page() ) {
		if (!$post_id) {
			global $wp_query;
			$post_id = $wp_query->post->ID;
		}
		$post = get_post($post_id);
		$meta = get_post_meta($post->ID, 'dmt-area-scoping');
		if(empty($meta)) {
			$meta = get_post_meta($post->post_parent, 'dmt-area-scoping');
			if (empty($meta)) {
				$parentpost = get_post($post->post_parent);
				$found = false;
				while($found == false) {
					$meta = get_post_meta($parentpost->post_parent, 'dmt-area-scoping');
					if (!empty($meta)) {
						$found = true;
					} else {
						$parentpost = get_post($parentpost->post_parent);
					}
				}
			}
		}
	}
	if (empty($meta)) {
		$meta = "General";
	} else if (is_array($meta)) {
		$meta = $meta[0];
	}
	$meta = strtolower($meta);
	return $meta;
}

/**
 * Retrieves the current DMT area scope for visitor's sessions
 */
function get_visitor_area() {
	if (!isset($_SESSION['dmt-current-area'])) {
	  $_SESSION['dmt-current-area'] = "materials";
	} 
	return $_SESSION['dmt-current-area'];
}
/**
 * Returns the canonical current DMT area based on visitor session and changes if WP tells it to
 */
function get_area() {
	$wp_area = get_wp_area();
	$visitor_area = get_visitor_area();
	if ($wp_area != "general" && $wp_area != $visitor_area) {
		$_SESSION['dmt-current-area'] = $wp_area;
		$area = $wp_area;
	} else {
		$area = $visitor_area;
	}
	return $area;
}


?>