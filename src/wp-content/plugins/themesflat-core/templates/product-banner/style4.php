<?php

?>
<div class=" item-banner">
    <div class="inner">
       
        <h2 class="heading"><?php echo esc_attr($settings['heading4']); ?> <span class="heading big"><?php echo esc_attr($settings['heading42']); ?></span></h2>
        
        <h2 class="heading"><?php echo esc_attr($settings['heading43']); ?></h2>
    </div>
    <?php if ($settings['labeltext2'] != '' || $settings['label2'] != '') {?>
    <div class="label"><div class="text"><?php echo esc_attr($settings['labeltext2']); ?></div><?php echo esc_attr($settings['label2']); ?></div>
    <?php } ?>
</div>