# Custom Form Field for Contact Form 7

Use this code in functions.php file

```
function dynamic_field_values ($tag, $unused) {
    if ( $tag['name'] != 'custom-dropdown-field' )
        return $tag;
    $args = array (
        'numberposts'   => -1,
        'post_type'     => 'post',
        'orderby'       => 'title',
        'order'         => 'ASC',
    );
    $custom_posts = get_posts($args);
    if ( ! $custom_posts )
        return $tag;
    foreach ( $custom_posts as $custom_post ) {
        $tag['raw_values'][] = $custom_post->post_title;
        $tag['values'][] = $custom_post->post_title;
        $tag['labels'][] = $custom_post->post_title;
    }
    return $tag;
}
add_filter( 'wpcf7_form_tag', 'dynamic_field_values', 10, 2);
```

'custom-dropdown-field' is the field name.
select will be form tag.

Replace use post, product, custom-post-type as value of 'post_type' in this code.

Use 

```
[select custom-dropdown-field include_blank]
```

in form and for mail tag use 

```
[custom-dropdown-field]
```

in mail body in contact form 7.


WebStylePress

youtube.com/webstylepress
