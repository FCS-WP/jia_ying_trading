<?php
add_action('init', 'themesflat_register_team_post_type');
/**
  * Register team post type
*/
function themesflat_register_team_post_type() {
    $team_slug = 'team';
    $labels = array(
        'name'                  => esc_html__( 'Team', 'themesflat-core' ),
        'singular_name'         => esc_html__( 'Team', 'themesflat-core' ),
        'menu_name'             => esc_html__( 'Team', 'themesflat-core' ),
        'add_new'               => esc_html__( 'New Team', 'themesflat-core' ),
        'add_new_item'          => esc_html__( 'Add New Team', 'themesflat-core' ),
        'new_item'              => esc_html__( 'New Team Item', 'themesflat-core' ),
        'edit_item'             => esc_html__( 'Edit Team Item', 'themesflat-core' ),
        'view_item'             => esc_html__( 'View Team', 'themesflat-core' ),
        'all_items'             => esc_html__( 'All Team', 'themesflat-core' ),
        'search_items'          => esc_html__( 'Search Team', 'themesflat-core' ),
        'not_found'             => esc_html__( 'No Team Items Found', 'themesflat-core' ),
        'not_found_in_trash'    => esc_html__( 'No Team Items Found In Trash', 'themesflat-core' ),
        'parent_item_colon'     => esc_html__( 'Parent Team:', 'themesflat-core' ),
        'not_found'             => esc_html__( 'No Team found', 'themesflat-core' ),
        'not_found_in_trash'    => esc_html__( 'No Team found in Trash', 'themesflat-core' )

    );
    $args = array(
        'labels'      => $labels,
        'supports'    => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'elementor'  ),
        'rewrite'       => array( 'slug' => $team_slug ),
        'public'      => true,   
        'show_in_rest' => true,  
        'has_archive' => true 
    );
    register_post_type( 'team', $args );
    flush_rewrite_rules();
}

add_filter( 'post_updated_messages', 'themesflat_team_updated_messages' );
/**
  * team update messages.
*/
function themesflat_team_updated_messages ( $messages ) {
    Global $post, $post_ID;
    $messages[esc_html__( 'team' )] = array(
        0  => '',
        1  => sprintf( esc_html__( 'team Updated. <a href="%s">View team</a>', 'themesflat-core' ), esc_url( get_permalink( $post_ID ) ) ),
        2  => esc_html__( 'Custom Field Updated.', 'themesflat-core' ),
        3  => esc_html__( 'Custom Field Deleted.', 'themesflat-core' ),
        4  => esc_html__( 'team Updated.', 'themesflat-core' ),
        5  => isset( $_GET['revision']) ? sprintf( esc_html__( 'team Restored To Revision From %s', 'themesflat-core' ), wp_post_revision_title((int)$_GET['revision'], false)) : false,
        6  => sprintf( esc_html__( 'team Published. <a href="%s">View team</a>', 'themesflat-core' ), esc_url( get_permalink( $post_ID ) ) ),
        7  => esc_html__( 'team Saved.', 'themesflat-core' ),
        8  => sprintf( esc_html__('team Submitted. <a target="_blank" href="%s">Preview team</a>', 'themesflat-core' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
        9  => sprintf( esc_html__( 'team Scheduled For: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview team</a>', 'themesflat-core' ),date_i18n( esc_html__( 'M j, Y @ G:i', 'themesflat-core' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ) ),
        10 => sprintf( esc_html__( 'team Draft Updated. <a target="_blank" href="%s">Preview team</a>', 'themesflat-core' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
    );
    return $messages;
}

add_action( 'init', 'themesflat_register_team_taxonomy' );
/**
  * Register project taxonomy
*/
function themesflat_register_team_taxonomy() {
    /*team Categories*/    
    $team_cat_slug = 'team_category'; 
    $labels = array(
        'name'                       => esc_html__( 'team Categories', 'themesflat-core' ),
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
        'rewrite'       => array('slug'=>$team_cat_slug),
        'hierarchical'  => true,
        'show_in_rest'  => true,
    );
    register_taxonomy( 'team_category', 'team', $args );
    flush_rewrite_rules();
}

