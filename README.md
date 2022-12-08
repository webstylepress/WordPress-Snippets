# Fix Blurry Images WooCommerce

Use this code in functions.php file

```
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'custom_loop_product_thumbnail', 10 );
function custom_loop_product_thumbnail() {
    global $product;
    $size = 'woocommerce_thumbnail';
    $image_size = apply_filters( 'single_product_archive_thumbnail_size', $size );
    echo $product ? $product->get_image( 'full' ) : '';
}
```

WebStylePress

youtube.com/webstylepress
