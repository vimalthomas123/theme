<?php 
function wpdocs_codex_companies_new_init() {
  $labels = array(
      'name'                  => _x( 'Contact Details', 'Post type general name', 'textdomain' ),
      'singular_name'         => _x( 'Contact Details', 'Post type singular name', 'textdomain' ),
      'menu_name'             => _x( 'Contact Details', 'Admin Menu text', 'textdomain' ),
      'name_admin_bar'        => _x( 'Contact Details', 'Add New on Toolbar', 'textdomain' ),
      'add_new'               => __( 'Add New', 'textdomain' ),
      'add_new_item'          => __( 'Add New Contact Details', 'textdomain' ),
      'new_item'              => __( 'New Contact Details', 'textdomain' ),
      'edit_item'             => __( 'Edit Contact Details', 'textdomain' ),
      'view_item'             => __( 'View Contact Details', 'textdomain' ),
      'all_items'             => __( 'All Contact Details', 'textdomain' ),
      'search_items'          => __( 'Search Contact Details', 'textdomain' ),
      'parent_item_colon'     => __( 'Parent Contact Details:', 'textdomain' ),
  );

  $args = array(
      'labels'             => $labels,
      'public'             => true,
      'publicly_queryable' => true,
     // 'taxonomies'         => array('year','bussinessunit',''),
      'show_ui'            => true,
      'show_in_menu'       => true,
      'query_var'          => true,
      'capability_type'    => 'post',
      'has_archive'        => false,
      'hierarchical'       => false,
      'menu_position'      => null,
      'menu_icon'          => 'dashicons-format-aside',
      'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
  );

  register_post_type( 'contacts', $args );
}

add_action( 'init', 'wpdocs_codex_companies_new_init' );

/**
   * Taxonomy: Location.
   */
function cptui_register_my_taxes_location() {
  $labels = [
    "name" => esc_html__( "Location", "custom-post-type-ui" ),
    "singular_name" => esc_html__( "Location", "custom-post-type-ui" ),
  ];

  
  $args = [
    "label" => esc_html__( "location", "custom-post-type-ui" ),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => true,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "show_admin_column" => false,
    "show_in_rest" => true,
    "show_tagcloud" => false,
    //"rest_base" => "bussinessunit",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "rest_namespace" => "wp/v2",
    "show_in_quick_edit" => false,
    "sort" => false,
    "show_in_graphql" => false,
  ];
  register_taxonomy( "location", [ "contacts" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_location' );