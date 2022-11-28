# Add Inquiery Form or Content Below Product Summary in WooCommerce

## For functions.php

```
add_action('woocommerce_single_product_summary', 'fn_custom_block', 100); 
function fn_custom_block() { 
	echo '<div class="custom-block">'; 
	echo do_shortcode(''); 
	echo '</div>'; 
}
```

WebStylePress

youtube.com/webstylepress
