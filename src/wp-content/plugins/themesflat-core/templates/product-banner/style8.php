<?php
    $target_nofollow = '';	
    $target = !empty($settings['button_link']['is_external']) ? ' target="_blank"' : '';
    $nofollow = !empty($settings['button_link']['nofollow']) ? ' rel="nofollow"' : '';
    $target_nofollow = $target .' '. $nofollow;	
?>
<div class=" item-banner">
    <div class="inner">
        <div class="category"><?php echo esc_attr($settings['category']); ?></div>
        <h2 class="heading"><?php echo esc_attr($settings['heading']); ?></h2>
        <div class="sub-heading"><?php echo esc_attr($settings['sub_heading']); ?></div>
        <div class="content-price"> <span class=label-text><?php echo esc_attr($settings['labeltext3']); ?></span><span class="price"><?php echo esc_attr($settings['label4']); ?></span></div>
        <?php if ($settings['button_text'] != '') { ?> <a href="<?php echo esc_url($settings['button_link']['url']); ?>" class="button-banner" <?php echo esc_attr($target_nofollow); ?>> <?php echo esc_attr($settings['button_text']); ?><?php echo \Elementor\Addon_Elementor_Icon_manager::render_icon( $settings['button_icon'], [ 'aria-hidden' => 'true' ] );?></a> <?php } ?>
    </div>
</div>