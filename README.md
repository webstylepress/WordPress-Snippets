# WooCommerce Ajax & Cart Counter

## 1- Regular Code to Display Cart Count

```
<a href="<?php echo site_url(); ?>/cart/">
	<?php echo WC()->cart->get_cart_contents_count(); ?>
</a>
```

## 2- WooCommerce Ajax Plugins

- WPC AJAX Add to Cart for WooCommerce
- WooCommerce Ajaxified Cart
- WooCommerce Ajax Cart Plugin

## 3- WooCommerce Cart Counter Using ShortCode

### Allow shortcode in menu (Code for functions.php)

`add_filter('wp_nav_menu_items', 'do_shortcode');`

### Code for functions.php

```
add_shortcode ('woo_cart_count', 'woo_cart_count' );
function woo_cart_count() {
	ob_start();
		$items_count = WC()->cart->get_cart_contents_count();
    ?>
    <span class="mini-cart-count"><?php echo $items_count ? $items_count : '0'; ?></span>
    <?php
    return ob_get_clean();
}
```

### Display Cart Count in Menu

`[woo_cart_count]`

### Display Cart Count in Template

`<?php echo do_shortcode('[woo_cart_count]') ?>`

## 4- WooCommerce Cart Counter Using Filter

### Filter for functions.php file

```
add_filter('woocommerce_add_to_cart_fragments', 'wc_refresh_mini_cart_count');
function wc_refresh_mini_cart_count($fragments){
	ob_start();
	$items_count = WC()->cart->get_cart_contents_count();
?>
<span class="mini-cart-count"><?php echo $items_count ? $items_count : '0'; ?></span>
<?php
    $fragments['.mini-cart-count'] = ob_get_clean();
	return $fragments;
}
```

### Code for Template File

```
<small class="product_counter">
	<?php $items_count = WC()->cart->get_cart_contents_count(); ?>
	<span id="mini-cart-count"><?php echo $items_count ? $items_count : '0'; ?></span>
</small>
```

WebStylePress

youtube.com/webstylepress
