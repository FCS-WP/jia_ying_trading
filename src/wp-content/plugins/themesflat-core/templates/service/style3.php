<div class="item">				
    <div class="services-post services-post-<?php the_ID(); ?>">
        <div class="overlay" style="background-image:url(<?php echo esc_attr($settings['bg_image']['url']) ?>)"></div>
        <?php 
            $icon_1 = \Elementor\Addon_Elementor_Icon_manager::render_icon( themesflat_get_opt_elementor('services_post_icon') );
            $icon_2 = \Elementor\Addon_Elementor_Icon_manager::render_icon( themesflat_get_opt_elementor('services_post_icon_2') );
            
            if($icon_1) {
                $icon_post_1 = '<div class="icon-1" >'.$icon_1.'</div>';
            } else {
                $icon_post_1 = '';
            }

            if($icon_2) {
                $icon_post_2 = '<div class="icon-2" >'.$icon_2.'</div>';
            } else {
                $icon_post_2 = '';
            }
            if ($icon_post_1 != '' || $icon_post_2 != '') {
                echo '<div class="post-icon">'.$icon_post_1.$icon_post_2.'</div>';
            }
           

        ?>
        <div class="content"> 
            <h4 class="title">
                <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
            </h4>

            <div class="description"><?php echo wp_trim_words( get_the_content(), $settings['excerpt_lenght'], '' ); ?></div>
            <div class="tf-button-container">
                <a href="<?php echo esc_url( get_permalink() ) ?>" class="tf-button">
                    <?php echo \Elementor\Addon_Elementor_Icon_manager::render_icon( $settings['post_icon_readmore'], [ 'aria-hidden' => 'true' ] );?>
                    <?php echo esc_attr( $settings['button_text'] ); ?>
                    <?php echo \Elementor\Addon_Elementor_Icon_manager::render_icon( $settings['post_icon_readmore'], [ 'aria-hidden' => 'true' ] );?>
                </a>
            </div> 
        </div>
    </div>
</div>