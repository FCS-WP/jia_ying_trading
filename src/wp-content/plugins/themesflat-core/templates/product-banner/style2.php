<?php
    $target_nofollow = '';	
    $target = $settings['button_link']['is_external'] ? ' target="_blank"' : '';
    $nofollow = $settings['button_link']['nofollow'] ? ' rel="nofollow"' : '';
    $target_nofollow = $target .' '. $nofollow;	
?>
<div class=" item-banner">
    <div class="inner">
        <?php if ($settings['labeltext'] != '' || $settings['label'] != '') {?>
        <div class="label"><div class="text"><?php echo esc_attr($settings['labeltext']); ?></div><?php echo esc_attr($settings['label']); ?></div>
        <?php } ?>
        <div class="category"><?php echo esc_attr($settings['category2']); ?></div>
        <h2 class="heading"><?php echo esc_attr($settings['heading2']); ?></h2>
        <div class="from"><?php echo esc_attr($settings['from']); ?></div>
        <div class="price"><?php echo esc_attr($settings['price']); ?></div>
        <?php if ($settings['button_text'] != '') { ?><a href="<?php echo esc_url($settings['button_link']['url']); ?>" class="button-banner" <?php echo esc_attr($target_nofollow); ?>> <?php echo \Elementor\Addon_Elementor_Icon_manager::render_icon( $settings['button_icon'], [ 'aria-hidden' => 'true' ] );?><?php echo esc_attr($settings['button_text']); ?></a><?php } ?>
    </div>
</div>