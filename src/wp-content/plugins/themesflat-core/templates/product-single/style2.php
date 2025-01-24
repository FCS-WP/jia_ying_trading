<?php 
global $product;
$product_id = $product->get_id();
$get_id_post_thumbnail = get_post_thumbnail_id();
if(\Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings )){
    $featured_image = sprintf('<img src="%1$s" class="img_thumbnail" alt="image">',  \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings )); 
} else $featured_image ='';

$stock_sold = ( $total_sales = get_post_meta( $product_id, 'total_sales', true ) ) ? round( $total_sales ) : 0;
$stock_available = ( $stock = get_post_meta( $product_id, '_stock', true ) ) ? round( $stock ) : 0;
$total_stock = $stock_sold + $stock_available;
$percentage = ( $stock_available > 0 ? round($stock_sold/$stock_available * 100) : 0 );

$product_type = $product->get_type();
$sale_price  = 0;
$regular_price = 0;
if($product_type === 'variable'){
    $product_variations = $product->get_available_variations();
    foreach ($product_variations as $kay => $value){
        if($value['display_price'] < $value['display_regular_price']){
            $sale_price = $value['display_price'];
            $regular_price = $value['display_regular_price'];
        }
    }
    if($regular_price > $sale_price && $stock != 'outofstock') {
        // $product_sale = intval(((floatval($regular_price) - floatval($sale_price)) / floatval($regular_price)) * 100);
        $product_sale = ( $regular_price > 0 ? round($sale_price/$regular_price * 100) : 0 );
    }else{
        return  '';
    }
}else{		
    $regular_price = get_post_meta( get_the_ID(), '_regular_price', true);
    $sale_price = get_post_meta( get_the_ID(), '_sale_price', true);
    $regular_price = intval(floatval($regular_price));
    $sale_price = intval(floatval($sale_price));
    if (isset($sale_price) && $sale_price != 0 && isset($regular_price) && $regular_price != 0 ) {
        // $product_sale = intval(((floatval($regular_price) - floatval($sale_price)) / floatval($regular_price)) * 100);
        $product_sale = ( $regular_price > 0 ? round($sale_price/$regular_price * 100) : 0 );
    }
}
?>
<div class="item col-1x" data-product-id="<?php echo esc_attr($product_id); ?>">
    <div class="ounner">
        <div class="inner">
            <div class="image">
                <?php if($featured_image != '') { ?> <a href="<?php echo the_permalink();?>"><?php echo sprintf('%s',$featured_image)?></a><?php } ?>
                
            </div>
            <div class="content">
                <?php themesflat_display_product_cat( $product_id ); ?>
                <h3 class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <div class="group-bt">
                    <div class="price"><?php echo trim($product->get_price_html()); ?></div>
                    <?php echo themesflat_product_action_btn_2();?>
                </div>                
            </div>
            <!-- <div class="product-footer">
                <?php echo tf_configuration(); ?>
                <?php echo tf_delivery(); ?>                
            </div>    -->
        </div>        
    </div> 
</div>
