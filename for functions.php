
///////////// Install Plugins
// http://tgmpluginactivation.com/configuration/
// add this code in functions.php file 

require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
function my_theme_register_required_plugins() {
  /*
   * Array of plugin arrays. Required keys are name and slug.
   * If the source is NOT from the .org repo, then local source is also required.
   */
  $plugins = array(
   array(
      'name'     => 'All-in-One WP Migration',
      'slug'     => 'all-in-one-wp-migration',
      'required' => true,
    ),
    array( 
      'name'     => 'Contact Form 7', 
      'slug'     => 'contact-form-7', 
      'required' => true,
    ),
    array( 
      'name'     => 'Disable Admin Notices individually', 
      'slug'     => 'disable-admin-notices', 
      'required' => true,
    ),
    array( 
      'name'     => 'Disable Gutenberg', 
      'slug'     => 'disable-gutenberg', 
      'required' => true,
    ),
    array( 
      'name'     => 'Duplicate Post Page Menu & Custom Post Type', 
      'slug'     => 'duplicate-post-page-menu-custom-post-type', 
      'required' => false,
    ),
    array( 
      'name'     => 'Elementor Website Builder', 
      'slug'     => 'elementor', 
      'required' => false,
    ),
    array( 
      'name'     => 'Elementor Header & Footer Builder', 
      'slug'     => 'header-footer-elementor', 
      'required' => false,
    ),
    array( 
      'name'     => 'Simple Custom Post Order', 
      'slug'     => 'simple-custom-post-order', 
      'required' => true,
    ),
    array( 
      'name'     => 'Website File Changes Monitor', 
      'slug'     => 'website-file-changes-monitor', 
      'required' => true,
    ),
    array( 
      'name'     => 'WooCommerce', 
      'slug'     => 'woocommerce', 
      'required' => false,
    ),
    array( 
      'name'     => 'WP Activity Log', 
      'slug'     => 'wp-security-audit-log', 
      'required' => true,
    ),
    array( 
      'name'     => 'WP Rollback', 
      'slug'     => 'wp-rollback', 
      'required' => true,
    ),
    array( 
      'name'     => 'Yoast SEO', 
      'slug'     => 'wordpress-seo', 
      'required' => true,
    ),
    /*array( 
      'name'     => 'which template file',
      'slug'     => 'which-template-file', // The slug has to match the extracted folder from the zip.
      'source'   => get_template_directory_uri() . '/bundled-plugins/plugin-file-name.zip',
      'required' => true,
    ),*/
  );

  /*
   * Array of configuration settings.
  */
  $config = array(
    'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
    'default_path' => '',                      // Default absolute path to bundled plugins.
    'menu'         => 'tgmpa-install-plugins', // Menu slug.
    'parent_slug'  => 'themes.php',            // Parent menu slug.
    'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
    'has_notices'  => true,                    // Show admin notices or not.
    'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
    'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
    'is_automatic' => false,                   // Automatically activate plugins after installation or not.
    'message'      => '',                      // Message to output right before the plugins table.
    /*
    'strings'      => array(
      'page_title'                      => __( 'Install Required Plugins', 'theme-slug' ),
      'menu_title'                      => __( 'Install Plugins', 'theme-slug' ),
      // <snip>...</snip>
      'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
    )
    */
  );
  tgmpa( $plugins, $config );
}
