<?php
/**
 * Admin (admin.php)
 * This is stuff that's only executed in the admin section of WordPress (e.g. for theme settings pages)
 */

add_filter( 'manage_edit-products_columns', 'my_edit_product_columns' ) ;

function my_edit_product_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Title' ),
		'category' => __( 'Category' ),
	);

	return $columns;
}

add_action( 'manage_products_posts_custom_column', 'my_manage_product_columns', 10, 2 );

function my_manage_product_columns( $column, $post_id ) {
	global $post;

	switch( $column ) {

		/* If displaying the 'genre' column. */
		case 'category' :

			$tax = 'product-categories';

			/* Get the genres for the post. */
			$terms = get_the_terms( $post_id, $tax);
			
			/* If terms were found. */
			if ( !empty( $terms ) ) {

				$out = array();

				/* Loop through each term, linking to the 'edit posts' page for the specific term. */
				foreach ( $terms as $term ) {
					$out[] = sprintf( '<a href="%s">%s</a>',
						esc_url( add_query_arg( array( 'post_type' => $post->post_type, $tax => $term->slug ), 'edit.php' ) ),
						esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, $tax, 'display' ) )
					);
				}

				/* Join the terms, separating them with a comma. */
				echo join( ', ', $out );
			}

			/* If no terms were found, output a default message. */
			else {
				_e( 'No Category' );
			}

			break;

		/* Just break out of the switch statement for everything else. */
		default :
			break;
	}
}

?>