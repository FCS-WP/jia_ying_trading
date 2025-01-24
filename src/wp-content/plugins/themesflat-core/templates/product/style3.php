<?php 
global $product;
$product_id = $product->get_id();
$get_id_post_thumbnail = get_post_thumbnail_id();
$stock_sold = ( $total_sales = get_post_meta( $product_id, 'total_sales', true ) ) ? round( $total_sales ) : 0;
$stock_available = ( $stock = get_post_meta( $product_id, '_stock', true ) ) ? round( $stock ) : 0;
$total_stock = $stock_sold + $stock_available;
$percentage = ( $stock_available > 0 ? round($stock_sold/$stock_available * 100) : 0 );
$featured_image = sprintf('<img src="%s" alt="image">', \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings )); 
?>
<div class="item" data-product-id="<?php echo esc_attr($product_id); ?>">
    <div class="image">
        <?php echo sprintf('%s',$featured_image);?>
        <?php echo themesflat_product_action_btn();?>
    </div>
    <div class="content">
        <?php themesflat_display_product_cat( $product_id ); ?>
        <h3 class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        
        <div class="price"><?php echo trim($product->get_price_html()); ?></div>

        <?php if ( $stock_available > $stock_sold ) { ?>
        <div class="special-progress">
            <div class="infor-sold">
                <div class="left">
                    <?php echo esc_html__('Available: ','onsus').'<span class="text-theme">'.$stock_available.'</span>'; ?>
                </div>
                <div class="right">
                    <?php echo esc_html__('Sold: ','onsus').'<span class="text-theme">'.$stock_sold.'</span>'; ?>
                </div>
            </div>
            <div class="progress">
                <span class="progress-bar" style="<?php echo esc_attr('width:' . $percentage . '%'); ?>"></span>
            </div>
            
        </div>
        <?php } ?>
    </div>
        
</div>