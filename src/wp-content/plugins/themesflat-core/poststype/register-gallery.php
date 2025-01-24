<?php
add_action('init', 'themesflat_register_gallery_post_type');
/**
  * Register gallery post type
*/
function themesflat_register_gallery_post_type() {
    $gallery_slug = 'gallery';

    $labels = array(
        'name'               => esc_html__( 'Gallery', 'themesflat-core' ),
        'singular_name'      => esc_html__( 'Gallery Item', 'themesflat-core' ),
        'add_new'            => esc_html__( 'Add New', 'themesflat-core' ),
        'add_new_item'       => esc_html__( 'Add New Item', 'themesflat-core' ),
        'new_item'           => esc_html__( 'New Item', 'themesflat-core' ),
        'edit_item'          => esc_html__( 'Edit Item', 'themesflat-core' ),
        'view_item'          => esc_html__( 'View Item', 'themesflat-core' ),
        'all_items'          => esc_html__( 'All Items', 'themesflat-core' ),
        'search_items'       => esc_html__( 'Search Items', 'themesflat-core' ),
        'parent_item_colon'  => esc_html__( 'Parent Items:', 'themesflat-core' ),
        'not_found'          => esc_html__( 'No items found.', 'themesflat-core' ),
        'not_found_in_trash' => esc_html__( 'No items found in Trash.', 'themesflat-core' )
    );

    $args = array(
        'labels'        => $labels,
        'rewrite'       => array( 'slug' => $gallery_slug ),
        'supports'      => array( 'title', 'thumbnail'  ),
        'public'        => true
    );

    register_post_type( 'gallery', $args );
}

add_filter( 'post_updated_messages', 'themesflat_gallery_updated_messages' );
/**
  * gallery update messages.
*/
function themesflat_gallery_updated_messages( $messages ) {
    $post             = get_post();
    $post_type        = get_post_type( $post );
    $post_type_object = get_post_type_object( $post_type );

    $messages['gallery'] = array(
        0  => '', // Unused. Messages start at index 1.
        1  => esc_html__( 'Gallery updated.', 'themesflat-core' ),
        2  => esc_html__( 'Custom field updated.', 'themesflat-core' ),
        3  => esc_html__( 'Custom field deleted.', 'themesflat-core' ),
        4  => esc_html__( 'Gallery updated.', 'themesflat-core' ),
        5  => isset( $_GET['revision'] ) ? sprintf( esc_html__( 'Gallery restored to revision from %s', 'themesflat-core' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
        6  => esc_html__( 'Gallery published.', 'themesflat-core' ),
        7  => esc_html__( 'Gallery saved.', 'themesflat-core' ),
        8  => esc_html__( 'Gallery submitted.', 'themesflat-core' ),
        9  => sprintf(
            esc_html__( 'Gallery scheduled for: <strong>%1$s</strong>.', 'themesflat-core' ),
            date_i18n( esc_html__( 'M j, Y @ G:i', 'themesflat-core' ), strtotime( $post->post_date ) )
        ),
        10 => esc_html__( 'Gallery draft updated.', 'themesflat-core' )
    );
    return $messages;
}

add_action( 'init', 'themesflat_register_gallery_taxonomy' );
/**
  * Register gallery taxonomy
*/
function themesflat_register_gallery_taxonomy() {
    $cat_slug = 'gallery_category';

    $labels = array(
        'name'                       => esc_html__( 'Gallery Categories', 'themesflat-core' ),
        'singular_name'              => esc_html__( 'Category', 'themesflat-core' ),
        'search_items'               => esc_html__( 'Search Categories', 'themesflat-core' ),
        'menu_name'                  => esc_html__( 'Categories', 'themesflat-core' ),
        'all_items'                  => esc_html__( 'All Categories', 'themesflat-core' ),
        'parent_item'                => esc_html__( 'Parent Category', 'themesflat-core' ),
        'parent_item_colon'          => esc_html__( 'Parent Category:', 'themesflat-core' ),
        'new_item_name'              => esc_html__( 'New Category Name', 'themesflat-core' ),
        'add_new_item'               => esc_html__( 'Add New Category', 'themesflat-core' ),
        'edit_item'                  => esc_html__( 'Edit Category', 'themesflat-core' ),
        'update_item'                => esc_html__( 'Update Category', 'themesflat-core' ),
        'add_or_remove_items'        => esc_html__( 'Add or remove categories', 'themesflat-core' ),
        'choose_from_most_used'      => esc_html__( 'Choose from the most used categories', 'themesflat-core' ),
        'not_found'                  => esc_html__( 'No Category found.', 'themesflat-core' ),
        'menu_name'                  => esc_html__( 'Categories', 'themesflat-core' ),
    );
    $args = array(
        'labels'        => $labels,
        'rewrite'       => array('slug'=>$cat_slug),
        'hierarchical'  => true,
    );
    register_taxonomy( 'gallery_category', 'gallery', $args );
}