# Remove Product and Product category from URL in WordPress

## 1- Remove product from permalink or URL in wordpress 

From permalink settings under optional in 'product category base' type period . and copy following code in functions.php file 

```
function wsp_remove_slug( $post_link, $post, $leavename ) {
    if ( 'product' != $post->post_type || 'publish' != $post->post_status ) {
        return $post_link;
    }
    $post_link = str_replace( '/product/', '/', $post_link );
    return $post_link;
}
add_filter( 'post_type_link', 'wsp_remove_slug', 10, 3 );

function change_slug_structure( $query ) {
    if ( ! $query->is_main_query() || 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
        return;
    }
    if ( ! empty( $query->query['name'] ) ) {
        $query->set( 'post_type', array( 'post', 'product', 'page' ) );
    } elseif ( ! empty( $query->query['pagename'] ) && false === strpos( $query->query['pagename'], '/' ) ) {
        $query->set( 'post_type', array( 'post', 'product', 'page' ) );
        // We also need to set the name query var since redirect_guess_404_permalink() relies on it.
        $query->set( 'name', $query->query['pagename'] );
    }
}
add_action( 'pre_get_posts', 'change_slug_structure', 99 );
```

## 2- Remove product-category from permalink or URL in wordpress

```
add_filter('request', function( $vars ) {
	global $wpdb;
	if( ! empty( $vars['pagename'] ) || ! empty( $vars['category_name'] ) || ! empty( $vars['name'] ) || ! empty( $vars['attachment'] ) ) {
		$slug = ! empty( $vars['pagename'] ) ? $vars['pagename'] : ( ! empty( $vars['name'] ) ? $vars['name'] : ( !empty( $vars['category_name'] ) ? $vars['category_name'] : $vars['attachment'] ) );
		$exists = $wpdb->get_var( $wpdb->prepare( "SELECT t.term_id FROM $wpdb->terms t LEFT JOIN $wpdb->term_taxonomy tt ON tt.term_id = t.term_id WHERE tt.taxonomy = 'product_cat' AND t.slug = %s" ,array( $slug )));
		if( $exists ){
			$old_vars = $vars;
			$vars = array('product_cat' => $slug );
			if ( !empty( $old_vars['paged'] ) || !empty( $old_vars['page'] ) )
				$vars['paged'] = ! empty( $old_vars['paged'] ) ? $old_vars['paged'] : $old_vars['page'];
			if ( !empty( $old_vars['orderby'] ) )
	 	        	$vars['orderby'] = $old_vars['orderby'];
      			if ( !empty( $old_vars['order'] ) )
 			        $vars['order'] = $old_vars['order'];	
		}
	}
	return $vars;
});
```

WebStylePress

youtube.com/webstylepress
