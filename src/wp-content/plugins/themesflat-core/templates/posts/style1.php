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
            <div class="post-meta">
                <span class="post-meta-author">
                    <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"> <svg class="meta-icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2792 10.488C14.2792 12.8733 12.8732 14.2793 10.4879 14.2793H5.29988C2.90854 14.2793 1.49988 12.8733 1.49988 10.488V5.288C1.49988 2.906 2.37588 1.5 4.76188 1.5H6.09521C6.57388 1.50067 7.02455 1.72533 7.31121 2.10867L7.91988 2.918C8.20788 3.30067 8.65855 3.526 9.13721 3.52667H11.0239C13.4152 3.52667 14.2979 4.744 14.2979 7.178L14.2792 10.488Z" stroke="#73787D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M4.9873 9.64193H10.8106" stroke="#73787D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>   <?php echo '<span>'.get_the_author().'</span>'; ?></a>
                </span>
                <?php if ( $settings['show_meta'] == 'yes' ): ?> 
                <?php
                    $archive_year  = get_the_time('Y'); 
                    $archive_month = get_the_time('m'); 
                    $archive_day   = get_the_time('d');
                ?>
               <span class="post-meta-time"><a href="<?php echo get_day_link($archive_year, $archive_month, $archive_day); ?>"> <?php echo get_the_date(); ?></a></span>
            <?php endif; ?> 
            </div>                                                  
             <?php endif; ?>
             
            <?php if ( $settings['show_title'] == 'yes' ): ?>
                <h2 class="title"><a href="<?php echo esc_url( get_the_permalink() ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo get_the_title(); ?></a></h2>
            <?php endif; ?>

            <?php if ( $settings['show_excerpt'] == 'yes' ): ?>
                <div class="description"><?php echo wp_trim_words( get_the_content(), $settings['excerpt_lenght'], '' ); ?></div>
            <?php endif; ?>  

           
        </div>                      
    </div>
</div>