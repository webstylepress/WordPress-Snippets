# User Account Dashboard Management

## 1- Code for Adding New Link 

- Replace PAGE_ONE, PAGE-ONE and PAGE ONE in code below

```
// register an end point

add_action( 'init', 'register_PAGE_ONE_endpoint');
function register_PAGE_ONE_endpoint() {
	add_rewrite_endpoint( 'PAGE-ONE', EP_ROOT | EP_PAGES );
}

// adjust query variables

add_filter( 'query_vars', 'PAGE_ONE_query_vars' );
function PAGE_ONE_query_vars( $vars ) {
	$vars[] = 'PAGE-ONE';
	return $vars;
}

// add link 

add_filter( 'woocommerce_account_menu_items', 'add_PAGE_ONE_tab' );
function add_PAGE_ONE_tab( $links ) {
	$links['PAGE-ONE'] = "PAGE ONE";
	return $links;
}

// add content

add_action( 'woocommerce_account_PAGE-ONE_endpoint', 'add_PAGE_ONE_content' );
function add_PAGE_ONE_content() {
	echo "PAGE ONE contents here!";
}
```

## 2- Code that I have Used

```
// Offer One

// register an end point
add_action( 'init', 'register_offer_one_endpoint');
function register_offer_one_endpoint() {
	add_rewrite_endpoint( 'offer-one', EP_ROOT | EP_PAGES );
}
// adjust query variables
add_filter( 'query_vars', 'offer_one_query_vars' );
function offer_one_query_vars( $vars ) {
	$vars[] = 'offer-one';
	return $vars;
}
// add link 
add_filter( 'woocommerce_account_menu_items', 'add_offer_one_tab' );
function add_offer_one_tab( $links ) {
	$links['offer-one'] = "Offer One";
	return $links;
}
// add content
add_action( 'woocommerce_account_offer-one_endpoint', 'add_offer_one_content' );
function add_offer_one_content() {
	echo "Offer One contents here!";
}

// Offer Two

// register an end point
add_action( 'init', 'register_offer_two_endpoint');
function register_offer_two_endpoint() {
	add_rewrite_endpoint( 'offer-two', EP_ROOT | EP_PAGES );
}
// adjust query variables
add_filter( 'query_vars', 'offer_two_query_vars' );
function offer_two_query_vars( $vars ) {
	$vars[] = 'offer-two';
	return $vars;
}
// add link 
add_filter( 'woocommerce_account_menu_items', 'add_offer_two_tab' );
function add_offer_two_tab( $links ) {
	$links['offer-two'] = "Offer Two";
	return $links;
}
// add content
add_action( 'woocommerce_account_offer-two_endpoint', 'add_offer_two_content' );
function add_offer_two_content() {
	echo "Offer Two contents here!";
}
```

### Re-arrange Links

```
function reorder_account_menu( $items ) {
	return array(
		'dashboard'          => __( 'Dashboard', 'woocommerce' ),
		'orders'             => __( 'Orders', 'woocommerce' ),
		'downloads'          => __( 'Downloads', 'woocommerce' ),
		'edit-address'       => __( 'Addresses', 'woocommerce' ),
		'offer-one'          => __( 'Offer One', 'woocommerce' ),
		'offer-two'          => __( 'Offer Two', 'woocommerce' ),
		'edit-account'       => __( 'Edit Account', 'woocommerce' ),
		'customer-logout'    => __( 'Logout', 'woocommerce' ),
	);
}
add_filter ( 'woocommerce_account_menu_items', 'reorder_account_menu' );
```


WebStylePress

youtube.com/webstylepress
