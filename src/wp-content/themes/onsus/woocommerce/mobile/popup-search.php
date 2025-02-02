<div class="modal modal-search fade" id="tf_search_popup" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<a href="#" class="close" data-dismiss="modal" aria-label="Close"><span	aria-hidden="true"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M13.0673 12.1829C13.1254 12.241 13.1714 12.3099 13.2028 12.3858C13.2343 12.4617 13.2505 12.543 13.2505 12.6251C13.2505 12.7072 13.2343 12.7885 13.2028 12.8644C13.1714 12.9403 13.1254 13.0092 13.0673 13.0673C13.0092 13.1254 12.9403 13.1714 12.8644 13.2028C12.7885 13.2343 12.7072 13.2505 12.6251 13.2505C12.543 13.2505 12.4617 13.2343 12.3858 13.2028C12.3099 13.1714 12.241 13.1254 12.1829 13.0673L7.0001 7.8837L1.81729 13.0673C1.70002 13.1846 1.54096 13.2505 1.3751 13.2505C1.20925 13.2505 1.05019 13.1846 0.932916 13.0673C0.81564 12.95 0.749756 12.791 0.749756 12.6251C0.749756 12.4593 0.81564 12.3002 0.932916 12.1829L6.11651 7.0001L0.932916 1.81729C0.81564 1.70002 0.749756 1.54096 0.749756 1.3751C0.749756 1.20925 0.81564 1.05019 0.932916 0.932916C1.05019 0.81564 1.20925 0.749756 1.3751 0.749756C1.54096 0.749756 1.70002 0.81564 1.81729 0.932916L7.0001 6.11651L12.1829 0.932916C12.3002 0.81564 12.4593 0.749756 12.6251 0.749756C12.791 0.749756 12.95 0.81564 13.0673 0.932916C13.1846 1.05019 13.2505 1.20925 13.2505 1.3751C13.2505 1.54096 13.1846 1.70002 13.0673 1.81729L7.8837 7.0001L13.0673 12.1829Z" fill="#333E48"/>
</svg></span></a>
                <?php  if ( class_exists( 'woocommerce' ) ) {  ?>
                    <div class="search-form-inner" id="form_search_inner">
                        <form action="<?php echo esc_url( home_url( '/' ) ); ?>"  method="get" class="search-form products-search searchform ajax-search" >
                            <?php 
                                $args = array(
                                    'show_count' => 0,
                                    'hierarchical' => true,
                                    'show_uncategorized' => 0,
                                    'hide_empty'        => 1,
                                    'selected' => false,
                                    'parent' => 0,
                                    'show_option_none'   => __( 'All categories', 'onsus' ),
                                );
                                
                                echo '<span class="select-category">';
                                    wc_product_dropdown_categories( $args );
                                echo '</span>';
                            
                            ?>
                            <label>
                                <input type="search" value="<?php get_search_query() ?>" name="s" class="s search-field input-search" placeholder="<?php echo esc_html__( "Search for products", "onsus" ) ?>" autocomplete="off" />
                                <input type="hidden" name="post_type" value="product">
                                <ul class="result-search-products" ></ul>
                            </label>
                            <button type="submit" class="search-submit"><i class="onsus-icon-search"></i></button>    
                            
                            <div class='clear-input'><i class='onsus-icon-close'></i></div>
                        </form>
                    </div>
                <?php  } ?>
		</div>
	</div>
</div>