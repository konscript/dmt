<?php
// Start custom gallery link code

/* -------------------------------
CUSTOM LINK PER GALLERY IMAGE
------------------------------- */
function rt_image_attachment_fields_to_edit($form_fields, $post) {
  $form_fields["rt-image-link"] = array(
    "label" => __("Custom Link"),
    "input" => "text", // default
    "value" => get_post_meta($post->ID, "_rt-image-link", true),
    //"helps" => __("To be used with special slider added via [rt_carousel] shortcode."),
  );
  return $form_fields;
}
add_filter("attachment_fields_to_edit", "rt_image_attachment_fields_to_edit", null, 2);

function rt_image_attachment_fields_to_save($post, $attachment) {
  // $attachment part of the form $_POST ($_POST[attachments][postID])
  // $post['post_type'] == 'attachment'
  if( isset($attachment['rt-image-link']) ){
    // update_post_meta(postID, meta_key, meta_value);
    update_post_meta($post['ID'], '_rt-image-link', $attachment['rt-image-link']);
  }
  return $post;
}
add_filter("attachment_fields_to_save", "rt_image_attachment_fields_to_save", null , 2);

/* -------------------------------
MODIFIED CORE FUNCTION
------------------------------- */
add_shortcode('gallery', 'geekee_gallery_shortcode');

/**
* The Gallery shortcode.
*
* This implements the functionality of the Gallery Shortcode for displaying
* WordPress images on a post.
*
* @since 2.5.0
*
* @param array $attr Attributes attributed to the shortcode.
* @return string HTML content to display gallery.
*/
function geekee_gallery_shortcode($attr) {
  global $post, $wp_locale;

  static $instance = 0;
  $instance++;

  // Allow plugins/themes to override the default gallery template.
  $output = apply_filters('post_gallery', '', $attr);
  if ( $output != '' )
    return $output;

  // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
  if ( isset( $attr['orderby'] ) ) {
    $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
    if ( !$attr['orderby'] )
      unset( $attr['orderby'] );
  }

  extract(shortcode_atts(array(
    'order'      => 'ASC',
    'orderby'    => 'menu_order ID',
    'id'         => $post->ID,
    'itemtag'    => 'dl',
    'icontag'    => 'dt',
    'captiontag' => 'dd',
    'columns'    => 3,
    'size'       => 'thumbnail',
    'include'    => '',
    'exclude'    => ''
  ), $attr));

  $id = intval($id);
  if ( 'RAND' == $order )
    $orderby = 'none';

  if ( !empty($include) ) {
    $include = preg_replace( '/[^0-9,]+/', '', $include );
    $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

    $attachments = array();
    foreach ( $_attachments as $key => $val ) {
      $attachments[$val->ID] = $_attachments[$key];
    }
  } elseif ( !empty($exclude) ) {
    $exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
    $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
  } else {
    $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
  }

  if ( empty($attachments) )
    return '';

  if ( is_feed() ) {
    $output = "\n";
    foreach ( $attachments as $att_id => $attachment )
      $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
    return $output;
  }

  $itemtag = tag_escape($itemtag);
  $captiontag = tag_escape($captiontag);
  $columns = intval($columns);
  $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
  $float = is_rtl() ? 'right' : 'left';

  $selector = "gallery-{$instance}";

	$gallery_style = $gallery_div = '';
	if ( apply_filters( 'use_default_gallery_style', true ) )
		$gallery_style = "
		<style type='text/css'>
			#{$selector} {
				margin: auto;
			}
			#{$selector} .gallery-item {
				float: {$float};
				margin-top: 10px;
				text-align: center;
				width: {$itemwidth}%;
			}
			#{$selector} img {
				border: 2px solid #cfcfcf;
			}
			#{$selector} .gallery-caption {
				margin-left: 0;
			}
		</style>
		<!-- see gallery_shortcode() in wp-includes/media.php -->";
	$size_class = sanitize_html_class( $size );
	$gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";
	$output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );

  $i = 0;
  foreach ( $attachments as $id => $attachment ) {
    $link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);

  /* -------------------------------
  MODIFICATION ################
  ------------------------------- */
  $image = wp_get_attachment_image($id, $size, false);
  $attachment_meta = get_post_meta($id, '_rt-image-link', true);
  if($attachment_meta){
    if($attr['link'] == 'custom_url'){
      $link = $attachment_meta;
    }
  }

  $output .= "<{$itemtag} class='gallery-item'>";
  $output .= "<{$icontag} class='gallery-icon'>";

    /* -------------------------------
  MODIFICATION ################
  ------------------------------- */
  if($attachment_meta){
    $output .= "<a href='$link'>$image</a>";
  } else {
    $output .= $link;
  }
 
  $output .= "</{$icontag}>";
  if ( $captiontag && trim($attachment->post_excerpt) ) {
    $output .= "<{$captiontag} class='gallery-caption'>" . wptexturize($attachment->post_excerpt) . "</{$captiontag}>";
  }
  $output .= "</{$itemtag}>";
  if ( $columns > 0 && ++$i % $columns == 0 )
    $output .= '<br style="clear: both;" />';
  }
 
  $output .= "<br style='clear: both;' /></div>\n";
 
  return $output;
}
?>