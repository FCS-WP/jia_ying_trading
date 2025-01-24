<?php
get_header(); 
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="wrap-content-area">
				<div id="primary" class="content-area">	
					<main id="main" class="main-content" role="main">
						<div class="entry-content">	
							<?php while ( have_posts() ) : the_post(); ?>
								<div class="featured-post"><?php the_post_thumbnail('themesflat-portfolio-image-single'); ?></div> 

								<?php if ( themesflat_get_opt('portfolios_featured_title') != '' ): ?>
								
								<?php endif; ?>
								<div class="porfolio-inner">

								
								<?php $portfolio_img = themesflat_get_opt_elementor('portfolio_post_img')['url']; ?>
								<div class="img-portfolio-detail"><img src="<?php echo esc_url($portfolio_img); ?>" alt="<?php esc_html_e('Image','themesflat-core') ?>"/></div>
								<div class="meta-post">
									<div class="inner-meta-post">
										<h3 class="inner-title"><?php esc_html_e('Portfolio Details','themesflat-core') ?></h3>

										<div class="meta-post-item meta-post-date">
											<span class="meta-post-title">
												<?php 
													$portfolio_post_icon_date  = \Elementor\Addon_Elementor_Icon_manager::render_icon( themesflat_get_opt_elementor('portfolio_post_icon_date'), [ 'aria-hidden' => 'true' ] );
													if ($portfolio_post_icon_date) {
														echo '<span class="post-icon">'.$portfolio_post_icon_date.'</span>';
													}
												?>
												<?php esc_html_e('Date :','themesflat-core') ?></span>
											<span class="meta-post-content"><?php echo esc_attr( the_date() ); ?></span>
										</div>

										<div class="meta-post-item meta-post-category">
											<span class="meta-post-title">
												<?php 
													$portfolio_post_icon_category  = \Elementor\Addon_Elementor_Icon_manager::render_icon( themesflat_get_opt_elementor('portfolio_post_icon_category'), [ 'aria-hidden' => 'true' ] );
													if ($portfolio_post_icon_category) {
														echo '<span class="post-icon">'.$portfolio_post_icon_category.'</span>';
													}
												?>
												<?php esc_html_e('Category :','themesflat-core') ?></span>
											<span class="meta-post-content"><?php echo esc_attr ( the_terms( get_the_ID(), 'portfolios_category', '', ', ', '' ) ); ?></span>
										</div>

										<?php if (themesflat_get_opt_elementor('portfolio_post_clients') != ''): ?>
										<div class="meta-post-item meta-post-clients">
											<span class="meta-post-title">													
												<?php 
													$portfolio_post_icon_client  = \Elementor\Addon_Elementor_Icon_manager::render_icon( themesflat_get_opt_elementor('portfolio_post_icon_client'), [ 'aria-hidden' => 'true' ] );
													if ($portfolio_post_icon_client) {
														echo '<span class="post-icon">'.$portfolio_post_icon_client.'</span>';
													}
												?><?php esc_html_e('Client :','themesflat-core') ?></span>
											<span class="meta-post-content"><?php echo themesflat_get_opt_elementor('portfolio_post_clients'); ?></span>
										</div>
										<?php endif; ?>



										<?php if (themesflat_get_opt_elementor('portfolio_post_location') != ''): ?>
										<div class="meta-post-item meta-post-website">
											<span class="meta-post-title">
												<?php 
													$portfolio_post_icon_website  = \Elementor\Addon_Elementor_Icon_manager::render_icon( themesflat_get_opt_elementor('portfolio_post_icon_website'), [ 'aria-hidden' => 'true' ] );
													if ($portfolio_post_icon_website) {
														echo '<span class="post-icon">'.$portfolio_post_icon_website.'</span>';
													}
												?>
												<?php esc_html_e('Website :','themesflat-core') ?></span>
											<span class="meta-post-content"><?php echo themesflat_get_opt_elementor('portfolio_post_location'); ?></span>
										</div>
										<?php endif; ?>
										<?php 
													$social_html = $social_1 = $social_2 = $social_3 = $social_4 = '';
													$target_1 = $target_2 = $target_3 = $target_4 = '';
													$nofollow_1 = $nofollow_2 = $nofollow_3 = $nofollow_4 = '';
													$icon_1 = $icon_2 = $icon_3 = $icon_4 = '';
													$link_1 = $link_2 = $link_3 = $link_4 = '';

													$icon_1 = \Elementor\Addon_Elementor_Icon_manager::render_icon( themesflat_get_opt_elementor('portfolio_post_social_icon_1') );
													$icon_2 = \Elementor\Addon_Elementor_Icon_manager::render_icon( themesflat_get_opt_elementor('portfolio_post_social_icon_2') );
													$icon_3 = \Elementor\Addon_Elementor_Icon_manager::render_icon( themesflat_get_opt_elementor('portfolio_post_social_icon_3') );
													$icon_4 = \Elementor\Addon_Elementor_Icon_manager::render_icon( themesflat_get_opt_elementor('portfolio_post_social_icon_4') );

													if ( $icon_1 != '' ) {
														if ( ! empty( themesflat_get_opt_elementor('portfolio_post_social_link_1')['url'] ) ) {
															$link_1 = themesflat_get_opt_elementor('portfolio_post_social_link_1')['url'];
															$target_1 = themesflat_get_opt_elementor('portfolio_post_social_link_1')['is_external'] ? ' target="_blank"' : '';
															$nofollow_1 = themesflat_get_opt_elementor('portfolio_post_social_link_1')['nofollow'] ? ' rel="nofollow"' : '';
														}												

														$social_1 .= '<a href="' . $link_1 . '" ' . $target_1 . $nofollow_1 . '>'.$icon_1.'</a>';
													}

													if ( $icon_2 != '' ) {
														if ( ! empty( themesflat_get_opt_elementor('portfolio_post_social_link_2')['url'] ) ) {
															$link_2 = themesflat_get_opt_elementor('portfolio_post_social_link_2')['url'];
															$target_2 = themesflat_get_opt_elementor('portfolio_post_social_link_2')['is_external'] ? ' target="_blank"' : '';
															$nofollow_2 = themesflat_get_opt_elementor('portfolio_post_social_link_2')['nofollow'] ? ' rel="nofollow"' : '';
														}												

														$social_2 .= '<a href="' . $link_2 . '" ' . $target_2 . $nofollow_2 . '>'.$icon_2.'</a>';
													}

													if ( $icon_3 != '' ) {
														if ( ! empty( themesflat_get_opt_elementor('portfolio_post_social_link_3')['url'] ) ) {
															$link_3 = themesflat_get_opt_elementor('portfolio_post_social_link_3')['url'];
															$target_3 = themesflat_get_opt_elementor('portfolio_post_social_link_3')['is_external'] ? ' target="_blank"' : '';
															$nofollow_3 = themesflat_get_opt_elementor('portfolio_post_social_link_3')['nofollow'] ? ' rel="nofollow"' : '';
														}												

														$social_3 .= '<a href="' . $link_3 . '" ' . $target_3 . $nofollow_3 . '>'.$icon_3.'</a>';
													}

													if ( $icon_4 != '' ) {
														if ( ! empty( themesflat_get_opt_elementor('portfolio_post_social_link_4')['url'] ) ) {
															$link_4 = themesflat_get_opt_elementor('portfolio_post_social_link_4')['url'];
															$target_4 = themesflat_get_opt_elementor('portfolio_post_social_link_4')['is_external'] ? ' target="_blank"' : '';
															$nofollow_4 = themesflat_get_opt_elementor('portfolio_post_social_link_4')['nofollow'] ? ' rel="nofollow"' : '';
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
								<h1 class="post-title"><?php the_title(); ?></h1>
								<?php the_content();?>
								
							<?php endwhile; // end of the loop. ?>

						</div><!-- ./entry-content -->
					</main><!-- #main -->
				</div><!-- #primary -->
			</div>
		</div>
	</div>
</div>

<?php if ( themesflat_get_opt( 'portfolios_show_post_navigator' ) == 1 ): ?>
<!-- Navigation  -->
<div class="container">
	<div class="row">
		<div class="col-lg-12"><?php themesflat_post_navigation(); ?></div>
	</div>			
</div>	
<?php endif; ?>

<!-- Related -->
<?php if ( themesflat_get_opt( 'portfolios_show_related' ) == 1 ) { ?>
	<div class="container">
	<?php		
		$grid_columns = themesflat_get_opt( 'portfolios_related_grid_columns' );
		$layout =  'portfolios-grid';

		if ( get_query_var('paged') ) {
		    $paged = get_query_var('paged');
		} elseif ( get_query_var('page') ) {
		    $paged = get_query_var('page');
		} else {
		    $paged = 1;
		}

		$terms = get_the_terms( $post->ID, 'portfolios_category' );
		if ( $terms != '' ){
			$term_ids = wp_list_pluck( $terms, 'term_id' );
			$args = array(
				'post_type' => 'portfolios',
				'posts_per_page'      => -1,
				'tax_query' => array(
					array(
					'taxonomy' => 'portfolios_category',
					'field' => 'term_id',
					'terms' => $term_ids,
					'operator'=> 'IN'
					)),
				'posts_per_page'      => themesflat_get_opt( 'number_related_post_portfolios' ),
				'ignore_sticky_posts' => 1,
				'post__not_in'=> array( $post->ID )
			);

			if ( $layout != '' ) {
			    $class[] = $layout;
			}
			if ( $grid_columns != '' ) {
			    $class[] = 'column-' . $grid_columns ;
			}
			
			?>
			<div class="related-post related-posts-box">
			    <div class="box-wrapper">
			        <div class="box-title">
			        	<h6 class="sub-title"><?php esc_html_e( "Related Portfolio", 'themesflat-core' ) ?></h6>
			        	<h2 class="title"><?php esc_html_e( "Let's See Some Portfolio", 'themesflat-core' ) ?></h2>	
		        	</div>
			        
			        <div class="themesflat-portfolios-taxonomy">			            
		            	<div class="<?php echo esc_attr( implode( ' ', $class ) ) ?> wrap-portfolios-post row">
				            <?php 
				            $query = new WP_Query($args);
				            if( $query->have_posts() ) {
				                while ( $query->have_posts() ) : $query->the_post(); ?>           
				                    <div class="item">
				                        <div class="portfolios-post portfolios-post-<?php the_ID(); ?>">
				                            <div class="featured-post">
				                            	<a href="<?php echo get_the_permalink(); ?>">
				                                <?php 
				                                    if ( has_post_thumbnail() ) { 
				                                        $themesflat_thumbnail = "themesflat-portfolio-image";                              
				                                        the_post_thumbnail( $themesflat_thumbnail );
				                                    }                                           
				                                ?>
				                                </a>
				                            </div>
				                            <div class="content">
				                            	<div class="inner-content">
				                                    <h2 class="title">
				                                         <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
				                                    </h2>
				                                    <?php if (themesflat_get_opt_elementor('portfolio_post_position') != ''): ?>
				                                    <div class="post-meta">
			                                            <?php echo themesflat_get_opt_elementor('portfolio_post_position'); ?>
				                                    </div>
				                                    <?php endif; ?>
			                                    </div>				                                
				                            </div>
				                        </div>
				                    </div>                    
				                    <?php 
				                endwhile; 
				            }
				            wp_reset_postdata();
				            ?>            
				        </div>			            
			        </div>
			    </div>
			</div>
		<?php } ?>
	</div>	
<?php } ?>

<?php get_footer(); ?>