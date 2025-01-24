<?php 
$get_id_post_thumbnail = get_post_thumbnail_id();
$featured_image = sprintf('<img src="%s" alt="image">', \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings )); 
 ?>
<div class="item">
    <div class="entry blog-post"> 
        <?php if ( $settings['show_image'] == 'yes' ): ?>                                    
        <div class="featured-post">
            <a href="<?php echo esc_url( get_permalink() ) ?>">
                <?php echo sprintf('%s',$featured_image); ?>
            </a>            
        </div>
        <?php endif; ?>
        
        <div class="content">
           
             
            <?php if ( $settings['show_title'] == 'yes' ): ?>
                <h2 class="title"><a href="<?php echo esc_url( get_the_permalink() ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo get_the_title(); ?></a></h2>
            <?php endif; ?>

            <?php if ( $settings['show_meta'] == 'yes' ): ?> 
                <?php
                $archive_year  = get_the_time('Y'); 
                $archive_month = get_the_time('m'); 
                $archive_day   = get_the_time('d');
                ?>
                <span class="post-meta post-meta-time"><a href="<?php echo get_day_link($archive_year, $archive_month, $archive_day); ?>"><i class='icon-monal-date'></i>
                <?php echo get_the_date(); ?></a></span>
            <?php endif; ?> 

            <?php if ( $settings['show_excerpt_2'] == 'yes' ): ?>
                <div class="description"><?php echo wp_trim_words( get_the_content(), $settings['excerpt_lenght'], '' ); ?></div>
            <?php endif; ?>  

            <?php if ( $settings['show_button_2'] == 'yes' && $settings['button_text'] != '' ): ?>
                <div class="tf-button-container">
                    <a href="<?php echo esc_url( get_permalink() ) ?>" class="tf-button">
                    <?php echo \Elementor\Addon_Elementor_Icon_manager::render_icon( $settings['post_icon_readmore'], [ 'aria-hidden' => 'true' ] );?>
                    <?php echo esc_attr( $settings['button_text'] ); ?>
                    <?php echo \Elementor\Addon_Elementor_Icon_manager::render_icon( $settings['post_icon_readmore'], [ 'aria-hidden' => 'true' ] );?></a>
                </div>
            <?php endif; ?>  
        </div>                      
    </div>
</div>