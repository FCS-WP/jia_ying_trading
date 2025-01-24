<?php 
global $product;
$product_id = $product->get_id();
$get_id_post_thumbnail = get_post_thumbnail_id();
if(\Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail2', $settings )){
    $featured_image = sprintf('<img src="%1$s" class="img_thumbnail" alt="image">',  \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail2', $settings )); 
} else $featured_image ='';

if(\Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail3', $settings )){
    $featured_image2 = sprintf('<img src="%1$s" class="img_thumbnail" alt="image">',  \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail3', $settings )); 
} else $featured_image2 ='';



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
        $product_sale = ( $regular_price > 0 ? round(($regular_price - $sale_price)/$regular_price * 100) : 0 );
        $product_save = ( $regular_price > 0 ? ($regular_price - $sale_price) : 0 );
    }else{
        return  '';
    }
}else{		
    $regular_price = get_post_meta( get_the_ID(), '_regular_price', true);
    $sale_price = get_post_meta( get_the_ID(), '_sale_price', true);
    $regular_price = intval(floatval($regular_price));
    $sale_price = intval(floatval($sale_price));
    $regular_price1 = get_post_meta( get_the_ID(), '_regular_price', true);
    $sale_price1 = get_post_meta( get_the_ID(), '_sale_price', true);
    if (isset($sale_price) && $sale_price != 0 && isset($regular_price) && $regular_price != 0 ) {
        $product_sale = ( $regular_price > 0 ? round(($regular_price - $sale_price)/$regular_price * 100) : 0 );
        $product_save = ( $regular_price1 > 0 ? ($regular_price1 - $sale_price1) : 0 );
    }
}
?>

<div class="item col-2x" data-product-id="<?php echo esc_attr($product_id); ?>"  >
    <?php if($featured_image != '') { ?>
    <div class="image">
        <div class="swiper-container gallery-slider3">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><a href="<?php echo the_permalink();?>"><?php echo sprintf('%s',$featured_image)?></a><?php if (isset( $sale_price) &&  $sale_price != 0) {?> <div class="price-save"><div class="label"><?php echo esc_html__( 'Save', 'themesflat-core' ) ?></div><?php echo esc_html__( '$', 'themesflat-core' ).$product_save  ?></div> <?php } ?><?php echo themesflat_product_action_btn();?></div>
                <?php
                $attachment_ids = $product->get_gallery_image_ids();
                if (isset($attachment_ids)) {$count = count($attachment_ids);} else $count = 0;
                    $c = 1;
                if($count != 0) {
                    foreach( $attachment_ids as $attachment_id ) { 
                        $image_link = \Elementor\Group_Control_Image_Size::get_attachment_image_src( $attachment_id , 'thumbnail2', $settings);?>
                        <div class="swiper-slide"><a href="<?php echo the_permalink();?>"><img src="<?php echo $image_link; ?>" alt="Image"></a><?php if (isset( $sale_price) &&  $sale_price != 0) {?> <div class="price-save"><div class="label"><?php echo esc_html__( 'Save', 'themesflat-core' ) ?></div><?php echo esc_html__( '$', 'themesflat-core' ).$product_save ?></div> <?php } ?></div>
                    <?php $c++; if ($c > 2) break; }  }
                ?>
            </div>
        </div>
        <div class="swiper-container gallery-thumbs3">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><?php echo sprintf('%s',$featured_image2)?></div>
                <?php
                $attachment_ids = $product->get_gallery_image_ids();
                $count = count($attachment_ids);
                $c = 1;
                if($count != 0) {
                    foreach( $attachment_ids as $attachment_id ) { 
                        $image_link = \Elementor\Group_Control_Image_Size::get_attachment_image_src( $attachment_id , 'thumbnail3', $settings);?>
                        <div class="swiper-slide"><img src="<?php echo $image_link; ?>" alt="Image"></div>
                    <?php $c++; if ($c > 2) break; }  }
                ?>
            </div>

        </div>
        
    </div>
    <?php } ?>
    <div class="bottom-product">
        <div class="content">
            <h3 class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <div class="price"><?php echo trim($product->get_price_html()); ?></div>
        </div>
        <?php
            $time_sale = get_post_meta( $product_id, '_sale_price_dates_to', true );
            if ( $time_sale ) { ?>
                <div class="time-wrapper">
                    <div class=" tf-countdown  clearfix" 
                        data-date="<?php echo  esc_attr( date( 'Y-m-d H:i:s', $time_sale ) )  ; ?>">
                    </div>
                </div>
        <?php } ?>
    </div>
        
</div>
