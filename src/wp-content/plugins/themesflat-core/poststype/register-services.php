<?php
add_action('init', 'themesflat_register_services_post_type');
/**
  * Register project post type
*/
function themesflat_register_services_post_type() {
    $services_slug = 'services';
    $labels = array(
        'name'                  => esc_html__( 'Services', 'themesflat-core' ),
        'singular_name'         => esc_html__( 'Services', 'themesflat-core' ),
        'menu_name'             => esc_html__( 'Services', 'themesflat-core' ),
        'add_new'               => esc_html__( 'New Services', 'themesflat-core' ),
        'add_new_item'          => esc_html__( 'Add New Services', 'themesflat-core' ),
        'new_item'              => esc_html__( 'New Services Item', 'themesflat-core' ),
        'edit_item'             => esc_html__( 'Edit Services Item', 'themesflat-core' ),
        'view_item'             => esc_html__( 'View Services', 'themesflat-core' ),
        'all_items'             => esc_html__( 'All Services', 'themesflat-core' ),
        'search_items'          => esc_html__( 'Search Services', 'themesflat-core' ),
        'not_found'             => esc_html__( 'No Services Items Found', 'themesflat-core' ),
        'not_found_in_trash'    => esc_html__( 'No Services Items Found In Trash', 'themesflat-core' ),
        'parent_item_colon'     => esc_html__( 'Parent Services:', 'themesflat-core' ),
        'not_found'             => esc_html__( 'No Services found', 'themesflat-core' ),
        'not_found_in_trash'    => esc_html__( 'No Services found in Trash', 'themesflat-core' )

    );
    $args = array(
        'labels'      => $labels,
        'supports'    => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'elementor'  ),
        'rewrite'       => array( 'slug' => $services_slug ),
        'public'      => true,   
        'show_in_rest' => true,  
        'has_archive' => true 
    );
    register_post_type( 'services', $args );
    flush_rewrite_rules();
}

add_filter( 'post_updated_messages', 'themesflat_services_updated_messages' );
/**
  * Services update messages.
*/
function themesflat_services_updated_messages ( $messages ) {
    Global $post, $post_ID;
    $messages[esc_html__( 'services' )] = array(
        0  => '',
        1  => sprintf( esc_html__( 'Services Updated. <a href="%s">View services</a>', 'themesflat-core' ), esc_url( get_permalink( $post_ID ) ) ),
        2  => esc_html__( 'Custom Field Updated.', 'themesflat-core' ),
        3  => esc_html__( 'Custom Field Deleted.', 'themesflat-core' ),
        4  => esc_html__( 'Services Updated.', 'themesflat-core' ),
        5  => isset( $_GET['revision']) ? sprintf( esc_html__( 'Services Restored To Revision From %s', 'themesflat-core' ), wp_post_revision_title((int)$_GET['revision'], false)) : false,
        6  => sprintf( esc_html__( 'Services Published. <a href="%s">View Services</a>', 'themesflat-core' ), esc_url( get_permalink( $post_ID ) ) ),
        7  => esc_html__( 'Services Saved.', 'themesflat-core' ),
        8  => sprintf( esc_html__('Services Submitted. <a target="_blank" href="%s">Preview Services</a>', 'themesflat-core' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
        9  => sprintf( esc_html__( 'Services Scheduled For: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Services</a>', 'themesflat-core' ),date_i18n( esc_html__( 'M j, Y @ G:i', 'themesflat-core' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ) ),
        10 => sprintf( esc_html__( 'Services Draft Updated. <a target="_blank" href="%s">Preview Services</a>', 'themesflat-core' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
    );
    return $messages;
}

add_action( 'init', 'themesflat_register_services_taxonomy' );
/**
  * Register project taxonomy
*/
function themesflat_register_services_taxonomy() {
    /*Services Categories*/    
    $services_cat_slug = 'services_category'; 
    $labels = array(
        'name'                       => esc_html__( 'Services Categories', 'themesflat-core' ),
        'singular_name'              => esc_html__( 'Categories', 'themesflat-core' ),
        'search_items'               => esc_html__( 'Search Categories', 'themesflat-core' ),
        'menu_name'                  => esc_html__( 'Categories', 'themesflat-core' ),
        'all_items'                  => esc_html__( 'All Categories', 'themesflat-core' ),
        'parent_item'                => esc_html__( 'Parent Categories', 'themesflat-core' ),
        'parent_item_colon'          => esc_html__( 'Parent Categories:', 'themesflat-core' ),
        'new_item_name'              => esc_html__( 'New Categories Name', 'themesflat-core' ),
        'add_new_item'               => esc_html__( 'Add New Categories', 'themesflat-core' ),
        'edit_item'                  => esc_html__( 'Edit Categories', 'themesflat-core' ),
        'update_item'                => esc_html__( 'Update Categories', 'themesflat-core' ),
        'add_or_remove_items'        => esc_html__( 'Add or remove Categories', 'themesflat-core' ),
        'choose_from_most_used'      => esc_html__( 'Choose from the most used Categories', 'themesflat-core' ),
        'not_found'                  => esc_html__( 'No Categories found.' ),
        'menu_name'                  => esc_html__( 'Categories' ),
    );
    $args = array(
        'labels'        => $labels,
        'rewrite'       => array('slug'=>$services_cat_slug),
        'hierarchical'  => true,
        'show_in_rest'  => true,
    );
    register_taxonomy( 'services_category', 'services', $args );
    flush_rewrite_rules();
}

