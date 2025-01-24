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
            <?php if ( $settings['show_meta'] == 'yes' ): ?> 
                <?php
                $archive_year  = get_the_time('Y'); 
                $archive_month = get_the_time('m'); 
                $archive_day   = get_the_time('d');
                ?>
               <span class="post-meta post-meta-time"><a href="<?php echo get_day_link($archive_year, $archive_month, $archive_day); ?>">
               <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.33333 3.66667V1V3.66667ZM9.66667 3.66667V1V3.66667ZM3.66667 6.33333H10.3333H3.66667ZM2.33333 13H11.6667C12.0203 13 12.3594 12.8595 12.6095 12.6095C12.8595 12.3594 13 12.0203 13 11.6667V3.66667C13 3.31304 12.8595 2.97391 12.6095 2.72386C12.3594 2.47381 12.0203 2.33333 11.6667 2.33333H2.33333C1.97971 2.33333 1.64057 2.47381 1.39052 2.72386C1.14048 2.97391 1 3.31304 1 3.66667V11.6667C1 12.0203 1.14048 12.3594 1.39052 12.6095C1.64057 12.8595 1.97971 13 2.33333 13Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
  <?php echo get_the_date(); ?></a></span>
            <?php endif; ?> 
             
            <?php if ( $settings['show_title'] == 'yes' ): ?>
                <h2 class="title"><a href="<?php echo esc_url( get_the_permalink() ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo get_the_title(); ?></a></h2>
            <?php endif; ?>

            <?php if ( $settings['show_meta'] == 'yes' ): ?>                                          
            <div class="post-meta">
                <span class="post-meta-author">
                    <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><i class='icon-monal-user'></i>  <?php echo esc_html__('By ', 'themesflat-core').'<span>'.get_the_author().'</span>'; ?></a>
                </span>
                <div class="post-meta-comment">
                    <i class='icon-monal-comment'></i> 
         
                    <?php echo comments_popup_link( esc_html__( '0 Comments ', 'tf-addon-for-elementer' ), esc_html__(  '1 Comment', 'tf-addon-for-elementer' ), esc_html__( '% Comments', 'tf-addon-for-elementer' ) ); ?>
                </div>
            </div>                                                  
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