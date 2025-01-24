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
								<div class="row">
									<div class="col-lg-12 col-md-12">
										<div class="team-wrap-infor">

											<div class="featured-post">
												<?php the_post_thumbnail('themesflat-team-image'); ?>
												
											</div>
											<div class="inner-team">
											
												<span class="team-category"><?php echo esc_attr ( the_terms( get_the_ID(), 'team_category', '', ', ', '' ) ); ?></span>

												<?php if ( themesflat_get_opt('team_featured_title') != '' ): ?>
													<h3 class="post-title"><?php the_title(); ?></h3>
												<?php endif; ?>

												<p class="post-description"><?php echo themesflat_get_opt_elementor('team_post_description'); ?></p>

												<div class="meta-team">
														

													<?php if (themesflat_get_opt_elementor('team_post_phone') != ''): ?>
														<div class="phone list-info">
															<span class="list-title">
																<?php 
																	$team_post_icon_phone  = \Elementor\Addon_Elementor_Icon_manager::render_icon( themesflat_get_opt_elementor('team_post_icon_phone'), [ 'aria-hidden' => 'true' ] );
																	if ($team_post_icon_phone) {
																		echo '<span class="post-icon">'.$team_post_icon_phone.'</span>';
																	}
																?>
																<?php esc_html_e('Phone :','themesflat-core') ?>
															</span>
															<span class="list-content"><?php echo themesflat_get_opt_elementor('team_post_phone'); ?></span>
														</div>
													<?php endif; ?>												

													<?php if (themesflat_get_opt_elementor('team_post_mail') != ''): ?>
														<div class="mail list-info">
															<span class="list-title">
																<?php 
																	$team_post_icon_mail  = \Elementor\Addon_Elementor_Icon_manager::render_icon( themesflat_get_opt_elementor('team_post_icon_mail'), [ 'aria-hidden' => 'true' ] );
																	if ($team_post_icon_mail) {
																		echo '<span class="post-icon">'.$team_post_icon_mail.'</span>';
																	}
																?>
																<?php esc_html_e('Email :','themesflat-core') ?>
															</span>
															
															<span class="list-content"><?php echo themesflat_get_opt_elementor('team_post_mail'); ?></span>
														</div>
													<?php endif; ?>

													<?php if (themesflat_get_opt_elementor('team_post_address') != ''): ?>
														<div class="address list-info">
															<span class="list-title">
																<?php 
																	$team_post_icon_address  = \Elementor\Addon_Elementor_Icon_manager::render_icon( themesflat_get_opt_elementor('team_post_icon_address'), [ 'aria-hidden' => 'true' ] );
																	if ($team_post_icon_address) {
																		echo '<span class="post-icon">'.$team_post_icon_address.'</span>';
																	}
																?>
																<?php esc_html_e('Address :','themesflat-core') ?>
															</span>
															
															<span class="list-content"><?php echo themesflat_get_opt_elementor('team_post_address'); ?></span>
														</div>
													<?php endif; ?>

													
												</div>
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
									<div class="col-lg-12">
										<?php the_content(); ?>
									</div>
								</div>
							<?php endwhile; // end of the loop. ?>
						</div><!-- ./entry-content -->
					</main><!-- #main -->
				</div><!-- #primary -->
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>