<?php
/**
 * The template for displaying archive team.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package monal
 */

get_header(); ?>
<?php 
$team_number_post = themesflat_get_opt( 'team_number_post' ) ? themesflat_get_opt( 'team_number_post' ) : 6;
$columns = themesflat_get_opt('team_grid_columns');
$themesflat_paging_style = themesflat_get_opt('team_archive_pagination_style');
$orderby = themesflat_get_opt('team_order_by');
$order = themesflat_get_opt('team_order_direction');
$exclude = themesflat_get_opt('team_exclude');
$terms_slug = wp_list_pluck( get_terms( 'team_category','hide_empty=0'), 'slug' );

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

$query_args = array(
    'post_type' => 'team',
    'orderby'   => $orderby,
    'order' => $order,    
    'paged' => $paged,    
    'posts_per_page' => $team_number_post,  
    'tax_query' => array(
        array(
            'taxonomy' => 'team_category',   
            'field'    => 'slug',                   
        	'terms'    => $terms_slug,
        ),
    ),
);	

if ( ! empty( $exclude ) ) {				
	if ( ! is_array( $exclude ) )
		$exclude = explode( ',', $exclude );

	$query_args['post__not_in'] = $exclude;
}
$query = new WP_Query( $query_args );
?>

<div class="themesflat-team-taxonomy">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="wrap-content-area">
                    <div id="primary" class="content-area"> 
                        <main id="main" class="main-content" role="main">
                            <div class="wrap-team-post row column-<?php echo esc_attr($columns); ?>">
                                <?php 
                                
                                if( $query->have_posts() ) {
                                    while ( $query->have_posts() ) : $query->the_post();
                                    	?>           
                                        <div class="item">
                                            <div class="team-post team-post-<?php the_ID(); ?>">
                                                <div class="featured-post">
                                                    <a href="<?php echo get_the_permalink(); ?>">
                                                    <?php 
                                                        if ( has_post_thumbnail() ) { 
                                                            $themesflat_thumbnail = "themesflat-team-image";
                                                            the_post_thumbnail( $themesflat_thumbnail );
                                                        }                                           
                                                    ?>
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h2 class="title">
                                                        <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                                                    </h2>

                                                    <?php if (themesflat_get_opt_elementor('team_post_position') != ''): ?>
                                                    <div class="position"><?php echo themesflat_get_opt_elementor('team_post_position'); ?></div>
                                                    <?php endif; ?> 

                                                    <?php 
                                                        $social_html = $social_1 = $social_2 = $social_3 = $social_4 = '';
                                                        $target_1 = $target_2 = $target_3 = $target_4 = '';
                                                        $nofollow_1 = $nofollow_2 = $nofollow_3 = $nofollow_4 = '';
                                                        $icon_1 = $icon_2 = $icon_3 = $icon_4 = '';
                                                        $link_1 = $link_2 = $link_3 = $link_4 = '';

                                                        $icon_1 = \Elementor\Addon_Elementor_Icon_manager::render_icon( themesflat_get_opt_elementor('team_post_social_icon_1') );
                                                        $icon_2 = \Elementor\Addon_Elementor_Icon_manager::render_icon( themesflat_get_opt_elementor('team_post_social_icon_2') );
                                                        $icon_3 = \Elementor\Addon_Elementor_Icon_manager::render_icon( themesflat_get_opt_elementor('team_post_social_icon_3') );
                                                        $icon_4 = \Elementor\Addon_Elementor_Icon_manager::render_icon( themesflat_get_opt_elementor('team_post_social_icon_4') );

                                                        if ( $icon_1 != '' ) {
                                                            if ( ! empty( themesflat_get_opt_elementor('team_post_social_link_1')['url'] ) ) {
                                                                $link_1 = themesflat_get_opt_elementor('team_post_social_link_1')['url'];
                                                                $target_1 = themesflat_get_opt_elementor('team_post_social_link_1')['is_external'] ? ' target="_blank"' : '';
                                                                $nofollow_1 = themesflat_get_opt_elementor('team_post_social_link_1')['nofollow'] ? ' rel="nofollow"' : '';
                                                            }                                               

                                                            $social_1 .= '<a href="' . $link_1 . '" ' . $target_1 . $nofollow_1 . '>'.$icon_1.'</a>';
                                                        }

                                                        if ( $icon_2 != '' ) {
                                                            if ( ! empty( themesflat_get_opt_elementor('team_post_social_link_2')['url'] ) ) {
                                                                $link_2 = themesflat_get_opt_elementor('team_post_social_link_2')['url'];
                                                                $target_2 = themesflat_get_opt_elementor('team_post_social_link_2')['is_external'] ? ' target="_blank"' : '';
                                                                $nofollow_2 = themesflat_get_opt_elementor('team_post_social_link_2')['nofollow'] ? ' rel="nofollow"' : '';
                                                            }                                               

                                                            $social_2 .= '<a href="' . $link_2 . '" ' . $target_2 . $nofollow_2 . '>'.$icon_2.'</a>';
                                                        }

                                                        if ( $icon_3 != '' ) {
                                                            if ( ! empty( themesflat_get_opt_elementor('team_post_social_link_3')['url'] ) ) {
                                                                $link_3 = themesflat_get_opt_elementor('team_post_social_link_3')['url'];
                                                                $target_3 = themesflat_get_opt_elementor('team_post_social_link_3')['is_external'] ? ' target="_blank"' : '';
                                                                $nofollow_3 = themesflat_get_opt_elementor('team_post_social_link_3')['nofollow'] ? ' rel="nofollow"' : '';
                                                            }                                               

                                                            $social_3 .= '<a href="' . $link_3 . '" ' . $target_3 . $nofollow_3 . '>'.$icon_3.'</a>';
                                                        }

                                                        if ( $icon_4 != '' ) {
                                                            if ( ! empty( themesflat_get_opt_elementor('team_post_social_link_4')['url'] ) ) {
                                                                $link_4 = themesflat_get_opt_elementor('team_post_social_link_4')['url'];
                                                                $target_4 = themesflat_get_opt_elementor('team_post_social_link_4')['is_external'] ? ' target="_blank"' : '';
                                                                $nofollow_4 = themesflat_get_opt_elementor('team_post_social_link_4')['nofollow'] ? ' rel="nofollow"' : '';
                                                            }                                               

                                                            $social_4 .= '<a href="' . $link_4 . '" ' . $target_4 . $nofollow_4 . '>'.$icon_4.'</a>';
                                                        }

                                                        if ( $icon_1 != '' || $icon_2 != '' || $icon_3 != '' || $icon_4 != '' ){
                                                            echo '<div class="social">'.$social_1.$social_2.$social_3.$social_4.'</div>';
                                                        }
                                                    ?>                                                   
                                                </div>
                                            </div>
                                        </div>                    
                                        <?php 
                                    endwhile;
                                } else {
                                    get_template_part( 'template-parts/content', 'none' );
                                }
                                ?>            
                            </div>
                            <?php 
                                themesflat_pagination_posttype($query);
                                wp_reset_postdata();
                            ?>  
                        </main><!-- #main -->
                    </div><!-- #primary -->
                </div>
            </div>
        </div>
    </div>
</div><!-- /.themesflat-team-taxonomy -->

<?php get_footer(); ?>