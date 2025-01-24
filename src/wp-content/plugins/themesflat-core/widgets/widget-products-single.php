<?php
class TFProductSingle_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-product-single';
    }
    
    public function get_title() {
        return esc_html__( 'TF Product Single', 'themesflat-core' );
    }

    public function get_icon() {
        return 'eicon-posts-grid';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
		return ['owl-carousel','swiper-min','tf-product-single'];
	}

	public function get_script_depends() {
		return ['owl-carousel','swiper-min','countdown','tf-product-single'];
	}

	protected function register_controls() {
        // Start Posts Query        
			$this->start_controls_section( 
				'section_posts_query',
	            [
	                'label' => esc_html__('Query', 'themesflat-core'),
	            ]
	        );	

			$this->add_control( 
	        	'style',
				[
					'label' => esc_html__( 'Layout Style', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'style1',
					'options' => [
						'style1' => esc_html__( '3 Row', 'themesflat-core' ),
						'style2' => esc_html__( '2 Row', 'themesflat-core' ),
						'style3' => esc_html__( 'Style Single', 'themesflat-core' ),
					],
				]
			);
			$this->add_control( 
				'posts_per_page',
	            [
	                'label' => esc_html__( 'Products Per Page', 'themesflat-core' ),
	                'type' => \Elementor\Controls_Manager::NUMBER,
	                'default' => '3',
	            ]
	        );

			$this->add_control(
                'filter_by',
                [
                    'label' => esc_html__( 'Filter By', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'recent',
                    'options' => [
                        'recent' => esc_html__( 'Recent Products', 'themesflat-core' ),
                        'featured' => esc_html__( 'Featured Products', 'themesflat-core' ),
                        'best_selling' => esc_html__( 'Best Selling Products', 'themesflat-core' ),
                        'sale' => esc_html__( 'Sale Products', 'themesflat-core' ),
                        'top_rated' => esc_html__( 'Top Rated Products', 'themesflat-core' ),
                        'mixed_order' => esc_html__( 'Mixed order Products', 'themesflat-core' ),
                    ],
                ]
            );

	        $this->add_control( 
	        	'order_by',
				[
					'label' => esc_html__( 'Order By (Only when recent product)', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'title',
					'options' => [						
			            'date' => 'Date',
			            'ID' => 'Post ID',			            
			            'title' => 'Title',
					],
				]
			);

			$this->add_control( 
				'order',
				[
					'label' => esc_html__( 'Order (Only when recent product)', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'asc',
					'options' => [						
			            'desc' => 'Descending',
			            'asc' => 'Ascending',	
					],
				]
			);

			$this->add_control( 
				'posts_categories',
				[
					'label' => esc_html__( 'Categories', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT2,
					'options' => ThemesFlat_Addon_For_Elementor_core::tf_get_taxonomies('product_cat'),
					'label_block' => true,
	                'multiple' => true,
				]
			);

			$this->add_control( 
				'exclude',
				[
					'label' => esc_html__( 'Exclude', 'themesflat-core' ),
					'type'	=> \Elementor\Controls_Manager::TEXT,	
					'description' => esc_html__( 'Post Ids Will Be Inorged. Ex: 1,2,3', 'themesflat-core' ),
					'default' => '',
					'label_block' => true,				
				]
			);

			$this->end_controls_section();
        // /.End Posts Query

		// Start General Style 
			$this->start_controls_section( 
				'section_style_general',
				[
					'label' => esc_html__( 'General', 'themesflat-core' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);
		
			$this->add_responsive_control(
				'padding',
				[
					'label' => esc_html__( 'Padding', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'default' => [
						'top' => '15',
						'right' => '15',
						'bottom' => '15',
						'left' => '15',
						'unit' => 'px',
						'isLinked' => true,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-products-single .item .inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],										
				]
			);
			$this->add_responsive_control( 
				'margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'allowed_dimensions' => [ 'right', 'left', ],
					
					'selectors' => [
						'{{WRAPPER}} .tf-products-single' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_group_control( 
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'box_shadow',
					'label' => esc_html__( 'Box Shadow', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-products-single .item ',
				]
			);
			
			$this->add_group_control( 
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'border',
					'label' => esc_html__( 'Border', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-products-single .item ',
				]
			);
			$this->add_responsive_control( 
				'border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px' , '%' ],
					'selectors' => [
						'{{WRAPPER}} .tf-products-single .item ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control( 
				'item_bgcolor',
				[
					'label' => esc_html__( 'Background Color ', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}}  .tf-products-single .item.col-2x' => 'background: {{VALUE}}',
						'{{WRAPPER}}  .tf-products-single .item.col-1x' => 'background: {{VALUE}}',
					],
				]
			);

			$this->add_control( 
	        	'item_gap_column',
				[
					'label' => esc_html__( 'Spacing Column', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 300,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tf-products-single ' => 'column-gap: {{SIZE}}{{UNIT}};',
					],
				]
			);
			
			$this->add_control( 
	        	'item_row_column',
				[
					'label' => esc_html__( 'Spacing Row', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 300,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tf-products-single' => 'row-gap: {{SIZE}}{{UNIT}};',
					],
				]
			);
			

			$this->end_controls_section();    
		// /.End General Style

		// Start Image Style 
			$this->start_controls_section( 
				'section_style_image',
				[
					'label' => esc_html__( 'Image', 'themesflat-core' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);	       
			
			$this->add_control( 'heading_image_size',
				[
					'label' => esc_html__( 'Image Size ', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
				]
			);
			$this->add_group_control( 
				\Elementor\Group_Control_Image_Size::get_type(),
				[
					
					'name' => 'thumbnail',
					'default' => 'image-244',
				]
			);
	
			$this->add_control( 'heading_image_size2',
				[
					'label' => esc_html__( 'Image Size Slider', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
				]
			);
	
			$this->add_group_control( 
				\Elementor\Group_Control_Image_Size::get_type(),
				[
					
					'name' => 'thumbnail2',
					'default' => 'image-640',
				]
			);

			$this->add_control( 'heading_image_size3',
				[
					'label' => esc_html__( 'Image Size Thumbnail Slider', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
				]
			);
			$this->add_group_control( 
				\Elementor\Group_Control_Image_Size::get_type(),
				[
					
					'name' => 'thumbnail3',
					'default' => 'image-100',
				]
			);

			$this->add_responsive_control( 
				'padding_image',
				[
					'label' => esc_html__( 'Padding', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px' ],
					'selectors' => [
						'{{WRAPPER}} .tf-products-single .item .image' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					]
				]
			);	

			$this->add_responsive_control( 
				'margin_image',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px' ],				
					'selectors' => [
						'{{WRAPPER}} .tf-products-single .item .image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);  

			$this->add_group_control( 
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'box_shadow_image',
					'label' => esc_html__( 'Box Shadow', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-products-single .item .image',
				]
			); 

			$this->add_group_control( 
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'border_image',
					'label' => esc_html__( 'Border', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-products-single .item .image',
				]
			); 

			$this->add_responsive_control( 
				'border_radius_image',
				[
					'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px' , '%' ],
					'selectors' => [
						'{{WRAPPER}} .tf-products-single .item .image, {{WRAPPER}} .tf-products-single .item .image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			); 
				
			$this->end_controls_section();    
		// /.End Image Style

		// Start Sale Style 
			$this->start_controls_section( 
				'section_style_sale',
				[
					'label' => esc_html__( 'Price Save', 'themesflat-core' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,

				]
			);	        
			// $this->add_responsive_control( 
			// 	'sale_width',
			// 	[
			// 		'label' => esc_html__( 'Width', 'themesflat-core' ),
			// 		'type' => \Elementor\Controls_Manager::SLIDER,
			// 		'size_units' => [ 'px', '%' ],
			// 		'range' => [
			// 			'px' => [
			// 				'min' => 0,
			// 				'max' => 2000,
			// 				'step' => 1,
			// 			],
			// 			'%' => [
			// 				'min' => 0,
			// 				'max' => 100,
			// 				'step' => 1,
			// 			],
			// 		],

			// 		'selectors' => [
			// 			'{{WRAPPER}} .tf-products-single .item .label-sale ' => 'width: {{SIZE}}{{UNIT}};',
			// 		],
			// 	]
			// ); 	  

			// $this->add_responsive_control( 
			// 	'sale_height',
			// 	[
			// 		'label' => esc_html__( 'Height', 'themesflat-core' ),
			// 		'type' => \Elementor\Controls_Manager::SLIDER,
			// 		'size_units' => [ 'px', '%' ],
			// 		'range' => [
			// 			'px' => [
			// 				'min' => 0,
			// 				'max' => 2000,
			// 				'step' => 1,
			// 			],
			// 			'%' => [
			// 				'min' => 0,
			// 				'max' => 100,
			// 				'step' => 1,
			// 			],
			// 		],

			// 		'selectors' => [
			// 			'{{WRAPPER}} .tf-products-single .item .label-sale ' => 'height: {{SIZE}}{{UNIT}};',
			// 		],
			// 	]
			// ); 	  

			$this->add_control( 
				'sale_color',
				[
					'label' => esc_html__( 'Color ', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}}  .tf-products-single .item .price-save' => 'color: {{VALUE}}',
						'{{WRAPPER}}  .tf-products-single .item .price-save .label' => 'color: {{VALUE}}',
					],
				]
			); 

			$this->add_control( 
				'sale_bgcolor',
				[
					'label' => esc_html__( 'Background Color ', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}}  .tf-products-single .item .price-save' => 'background: {{VALUE}}',
					],
				]
			);

			$this->add_group_control( 
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'sale_s1_typography',
					'label' => esc_html__( 'Typography Price', 'themesflat-core' ),	
					'selector' => '{{WRAPPER}} .tf-products-single .item .price-save .text',
				]
			);

			$this->add_group_control( 
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'sale_s2_typography',
					'label' => esc_html__( 'Typography Label', 'themesflat-core' ),	
					'selector' => '{{WRAPPER}} .tf-products-single .item .price-save .label',
				]
			);

			$this->end_controls_section();    
		// /.End Sale Style

		// Start Wrapbutton Style 
			$this->start_controls_section( 
				'section_style_wrap',
				[
					'label' => esc_html__( 'Wrap Button', 'themesflat-core' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
					'condition' => [
						'show_group_btn'	=> 'yes',
					],
				]
			);	        

			$this->add_control( 
				'wrap_color',
				[
					'label' => esc_html__( 'Color ', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}}  .tf-products-single .item .wrap-btn-action .tf-btn-quickview svg path' => 'fill: {{VALUE}}',
						'{{WRAPPER}}  .tf-products-single .item .wrap-btn-action .yith-wcwl-add-to-wishlist svg path' => 'fill: {{VALUE}}',
						'{{WRAPPER}}  .tf-products-single .item .wrap-btn-action .compare-button svg path' => 'fill: {{VALUE}}',
						'{{WRAPPER}}  .tf-products-single .item .wrap-btn-action .yith-wcwl-add-to-wishlist i' => 'color: {{VALUE}}',
					],
				]
			); 

			$this->add_control( 
				'wrap_bgcolor',
				[
					'label' => esc_html__( 'Background Color ', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}}  .tf-products-single .item .wrap-btn-action .tf-btn-quickview' => 'background: {{VALUE}}',
						'{{WRAPPER}}  .tf-products-single .item .wrap-btn-action .yith-wcwl-add-to-wishlist' => 'background: {{VALUE}}',
						'{{WRAPPER}}  .tf-products-single .item .wrap-btn-action .compare-button' => 'background: {{VALUE}}',
					],
				]
			);	
			
			$this->add_control( 
				'wrap_color2',
				[
					'label' => esc_html__( 'Color Hover', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}}  .tf-products-single .item .wrap-btn-action .tf-btn-quickview:hover svg path' => 'fill: {{VALUE}}',
						'{{WRAPPER}}  .tf-products-single .item .wrap-btn-action .yith-wcwl-add-to-wishlist:hover svg path' => 'fill: {{VALUE}}',
						'{{WRAPPER}}  .tf-products-single .item .wrap-btn-action .compare-button:hover svg path' => 'fill: {{VALUE}}',
						'{{WRAPPER}}  .tf-products-single .item .wrap-btn-action .yith-wcwl-add-to-wishlist:hover i' => 'color: {{VALUE}}',
						
					],
				]
			); 

			$this->add_control( 
				'wrap_bgcolor2',
				[
					'label' => esc_html__( 'Background Color Hover', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}}  .tf-products-single .item .wrap-btn-action .tf-btn-quickview:hover' => 'background: {{VALUE}}',
						'{{WRAPPER}}  .tf-products-single .item .wrap-btn-action .yith-wcwl-add-to-wishlist:hover' => 'background: {{VALUE}}',
						'{{WRAPPER}}  .tf-products-single .item .wrap-btn-action .yith-wcwl-add-to-wishlist .add_to_wishlist:hover ' => 'background: {{VALUE}}',
						'{{WRAPPER}}  .tf-products-single .item .wrap-btn-action .compare-button:hover' => 'background: {{VALUE}}',
					],
				]
			);			

			$this->end_controls_section();    
		// /.End Wrapbutton Style

		// Start Thumnail Style 
			$this->start_controls_section( 
				'section_style_thum',
				[
					'label' => esc_html__( 'Thumb Image', 'themesflat-core' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
					'condition' => [
						'show_thum'	=> 'yes',
					],
				]
			);	   
			
			$this->add_responsive_control( 
				'width_thum',
				[
					'label' => esc_html__( 'Width', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 2000,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tf-products-single .item .product-option li' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			); 	  

			$this->add_responsive_control( 
				'height_thum',
				[
					'label' => esc_html__( 'Height', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 2000,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tf-products-single .item .product-option li' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			); 	  

			$this->add_responsive_control( 
				'padding_thum',
				[
					'label' => esc_html__( 'Spacing', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px' ],
					'selectors' => [
						'{{WRAPPER}} .tf-products-single .item .product-option li' => 'margin-right: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .tf-products-single .item .product-option li' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					]
				]
			);	

			$this->add_responsive_control( 
				'margin_thum',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px' ],				
					'selectors' => [
						'{{WRAPPER}} .tf-products-single .item .product-option' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);  
			$this->add_group_control( 
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'border_thum',
					'label' => esc_html__( 'Border', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-products-single .item .product-option li',
				]
			); 

			$this->add_responsive_control( 
				'border_radius_thum',
				[
					'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px' , '%' ],
					'selectors' => [
						'{{WRAPPER}} .tf-products-single .item .product-option li, {{WRAPPER}} .tf-products-single .item .product-option li img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			); 
				
			$this->end_controls_section();    
		// /.End Thumnail Style

		// Start Meta Style 
			$this->start_controls_section( 
				'section_style_meta',
				[
					'label' => esc_html__( 'Category', 'themesflat-core' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,

				]
			);	

			$this->add_group_control( 
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'meta_s1_typography',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),	
					'selector' => '{{WRAPPER}} .tf-products-single .product-cats a',
				]
			);

			$this->add_control( 
				'heading_meta_1',
				[
					'label' => esc_html__( 'Category ', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			); 

			$this->add_control( 
				'meta_color',
				[
					'label' => esc_html__( 'Color ', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}}  .tf-products-single .item .product-cats a' => 'color: {{VALUE}}',
					],
				]
			); 
			$this->add_control( 
				'meta_color_hover',
				[
					'label' => esc_html__( 'Color Hover', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tf-products-single .item .product-cats a:hover' => 'color: {{VALUE}}',
					],
				]
			); 


			$this->end_controls_section();
		// /.End Meta Style

		// Start Title Style 
			$this->start_controls_section( 
				'section_style_title',
				[
					'label' => esc_html__( 'Title', 'themesflat-core' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,

				]
			);
			$this->add_control( 
				'title_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-products-single .item .name a' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control( 
				'title_color_hover',
				[
					'label' => esc_html__( 'Color Hover', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-products-single .item .name a:hover' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_group_control( 
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'title_s1_typography',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					
					'selector' => '{{WRAPPER}} .tf-products-single .item .name a',
				]
			);

			$this->add_responsive_control( 
				'title_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-products-single .item .name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->end_controls_section();
		// /.End Title Style

		// Start Price Style 
			$this->start_controls_section( 
				'section_style_text',
				[
					'label' => esc_html__( 'Price', 'themesflat-core' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);
			$this->add_control( 
				'text_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-products-single .item .price' => 'color: {{VALUE}}',
						'{{WRAPPER}} .tf-products-single .item .price ins' => 'color: {{VALUE}}',

					],
				]
			);
			$this->add_control( 
				'text_color_sale',
				[
					'label' => esc_html__( 'Color Sale', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-products-single .item .price del' => 'color: {{VALUE}}',

					],
				]
			);
			$this->add_group_control( 
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'text_typography',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-products-single .item .price',

				]
			);
			$this->add_group_control( 
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'text_typography_ins',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selector' => 
						'{{WRAPPER}} .tf-products-single .item .price ins',
				]
			);
			$this->add_group_control( 
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'text_typography_sale',
					'label' => esc_html__( 'Typography Sale', 'themesflat-core' ),
					'selector' => 
						'{{WRAPPER}} .tf-products-single .item .price del',
				]
			);
			$this->add_responsive_control( 
				'text_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-products-single .item .price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->end_controls_section();
		// /.End Price Style

		// Start CountDown Style 
			$this->start_controls_section( 
				'section_style_text2',
				[
					'label' => esc_html__( 'CountDown', 'themesflat-core' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);

			$this->add_responsive_control( 
				'cout_width',
				[
					'label' => esc_html__( 'Width', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 2000,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
					],

					'selectors' => [
						'{{WRAPPER}} .tf-products-single .item .tf-countdown .countdown-inner .time ' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			); 	  

			$this->add_responsive_control( 
				'cout_height',
				[
					'label' => esc_html__( 'Height', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 2000,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
					],

					'selectors' => [
						'{{WRAPPER}} .tf-products-single .item .tf-countdown .countdown-inner .time ' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			); 	 

			$this->add_responsive_control( 
				'cout_spacer',
				[
					'label' => esc_html__( 'Spacer', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 2000,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
					],

					'selectors' => [
						'{{WRAPPER}} .tf-products-single .item .tf-countdown .countdown-inner > div:not(:last-child) ' => 'padding-right: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .tf-products-single .item .tf-countdown .countdown-inner > div:not(:last-child) ' => 'margin-right: {{SIZE}}{{UNIT}};',
					],
				]
			); 	  

			

			$this->add_responsive_control( 
				'cout_margin1',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-products-single .item .tf-countdown' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control( 
				'bg_color3',
				[
					'label' => esc_html__( 'Background Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-products-single .item .tf-countdown .countdown-inner .time' => 'background: {{VALUE}}',
					],
				]
			);

			$this->add_control( 
				'color_time',
				[
					'label' => esc_html__( 'Color Time', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-products-single .item .tf-countdown .countdown-inner .time' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control( 
				'color_text_time',
				[
					'label' => esc_html__( 'Color Text Time', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-products-single .item .tf-countdown .countdown-inner .text' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control( 
				'color_text_time_icon',
				[
					'label' => esc_html__( 'Color Time :', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-products-single .item .tf-countdown .countdown-inner > div::after' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_group_control( 
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'text_typography2',
					'label' => esc_html__( 'Typography Time', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-products-single .item .tf-countdown .countdown-inner .time',
				]
			);

			$this->add_group_control( 
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'text_typography3',
					'label' => esc_html__( 'Typography Text Time', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-products-single .item .tf-countdown .countdown-inner .text',
				]
			);
			
			$this->end_controls_section();
		// /.End CountDown Style

		// Start Skillbar Style 
			$this->start_controls_section( 
				'section_style_text1',
				[
					'label' => esc_html__( 'Skillbar', 'themesflat-core' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
					'condition' => [
						'show_skillbar'	=> 'yes',
					],
				]
			);

			$this->add_responsive_control( 
				'height_bg',
				[
					'label' => esc_html__( 'Height Progessbar', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 2000,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tf-products-single .item .special-progress .progress' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			); 	  

			$this->add_control( 
				'bg_color1',
				[
					'label' => esc_html__( 'Background Progessbar Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-products-single .item .special-progress .progress' => 'background: {{VALUE}}',
					],
				]
			);

			$this->add_control( 
				'bg_color2',
				[
					'label' => esc_html__( 'Width Progessbar Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-products-single .item .special-progress .progress .progress-bar' => 'background: {{VALUE}}',
					],
				]
			);

			$this->add_control( 
				'text_color1',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-products-single .item .special-progress .infor-sold' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_group_control( 
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'text_typography1',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-products-single .item .special-progress .infor-sold',
				]
			);
			
			$this->add_responsive_control( 
				'text_margin1',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-products-single .item .special-progress' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->end_controls_section();
		// /.End Skillbar Style

		// Start Information Style 
			$this->start_controls_section( 
				'section_style_info',
				[
					'label' => esc_html__( 'Information', 'themesflat-core' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);

			$this->add_control( 
				'info_color1',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-products-single .item .product-footer .table .row-tb span' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_group_control( 
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'info_typography1',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-products-single .item .product-footer .table .row-tb span',
				]
			);
			
			$this->add_responsive_control( 
				'info_margin1',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-products-single .item .product-footer .table ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->end_controls_section();
		// /.End Information Style

		// Start Delivery Style
			$this->start_controls_section( 
				'section_style_deli',
				[
					'label' => esc_html__( 'Delivery', 'themesflat-core' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);

			$this->add_control( 
				'deli_color1',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-products-single .item .time-delivery .text' => 'color: {{VALUE}}',
						'{{WRAPPER}} .tf-products-single .item .time-delivery svg path' => 'fill: {{VALUE}}',
						'{{WRAPPER}} .tf-products-single .item .time-delivery svg path' => 'stroke: {{VALUE}}',
					],
				]
			);

			$this->add_group_control( 
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'deli_typography1',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-products-single .item .time-delivery .text',
				]
			);
			
			$this->add_responsive_control( 
				'deli_margin1',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-products-single .item .time-delivery' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_responsive_control( 
				'deli_padding',
				[
					'label' => esc_html__( 'Padding', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-products-single .item .time-delivery' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_group_control( 
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'border_deli',
					'label' => esc_html__( 'Border', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-products-single .item .time-delivery',
				]
			); 
			$this->end_controls_section();
		// /.End Delivery Style

		// Start Button Style 
			$this->start_controls_section( 
				'section_style_button',
				[
					'label' => esc_html__( 'Button', 'themesflat-core' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);
			$this->add_responsive_control( 
				'button_margin1',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-products-single .item .btn-add-to-cart' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_group_control( 
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'button_s1_typography',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .tf-products-single .item .btn-add-to-cart .add_to_cart',
				]
			);
			$this->add_control( 
				'button_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tf-products-single .item .btn-add-to-cart .add_to_cart' => 'color: {{VALUE}}',
					],
				]
			); 
			$this->add_control( 
				'button_bg',
				[
					'label' => esc_html__( 'Background Color ', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}}  .tf-products-single .item .btn-add-to-cart .add_to_cart' => 'background: {{VALUE}}',
					],
				]
			); 
			$this->add_control( 
				'button_color_hover',
				[
					'label' => esc_html__( 'Color Hover', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tf-products-single .item .btn-add-to-cart .add_to_cart:hover' => 'color: {{VALUE}}',
					],
				]
			); 

			$this->add_control( 
				'button_bg_color',
				[
					'label' => esc_html__( 'Background Hover Color ', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}}  .tf-products-single .item .btn-add-to-cart .add_to_cart:hover' => 'background: {{VALUE}}',
					],
				]
			); 

			$this->end_controls_section();
		// /.End Button Style
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();


		$this->add_render_attribute( 'tf_posts', ['id' => "tf-products-{$this->get_id()}", 'class' => ['tf-products-single', $settings['style'],  ], 'data-tabid' => $this->get_id()] );

		if ( get_query_var('paged') ) {
           $paged = get_query_var('paged');
        } elseif ( get_query_var('page') ) {
           $paged = get_query_var('page');
        } else {
           $paged = 1;
        }
		$query_args = array(
            'post_type' => 'product',
            'posts_per_page' => $settings['posts_per_page'],
            'paged'     => $paged
        );
        // if (! empty( $settings['posts_categories'] )) {
        // 	$query_args['category_name'] = implode(',', $settings['posts_categories']);
        // }     
		$product_categories = $settings['posts_categories'];
        $product_cats = str_replace(' ', '', $product_categories);

        if ( "0" != $product_categories) {
            if( is_array($product_cats) && count($product_cats) > 0 ){
                $field_name = is_numeric($product_cats[0])?'term_id':'slug';
                $query_args['tax_query'][] = array(
                    array(
                        'taxonomy' => 'product_cat',
                        'terms' => $product_cats,
                        'field' => $field_name,
                        'include_children' => false
                    )
                );
            }
        }
		global $woocommerce;
		$number = $settings['posts_per_page'] + 1;

		switch( $settings['filter_by'] ){
            case 'sale':
                // $query_args['post__in'] = array_merge( array( 0 ), wc_get_product_ids_on_sale() );
				$query_args = array(
					'post_type'      => 'product',
					'posts_per_page' => $settings['posts_per_page'],
					'meta_query'     => array(
						'relation' => 'OR',
						array( // Simple products type
							'key'           => '_sale_price',
							'value'         => 0,
							'compare'       => '>',
							'type'          => 'numeric'
						),
						array( // Variable products type
							'key'           => '_min_variation_sale_price',
							'value'         => 0,
							'compare'       => '>',
							'type'          => 'numeric'
						)
					)
				);
            break;

            case 'featured':
                $query_args['tax_query'][] = array(
                    'taxonomy' => 'product_visibility',
                    'field'    => 'name',
                    'terms'    => 'featured',
                    'operator' => 'IN',
                );
            break;

            case 'best_selling':
				
				$query_args['meta_key']='total_sales';
                $query_args['orderby']='meta_value_num';
                $query_args['ignore_sticky_posts']   = 1;
                $query_args['meta_query'] = array();
                $query_args['meta_query'][] = $woocommerce->query->stock_status_meta_query();
                $query_args['meta_query'][] = $woocommerce->query->visibility_meta_query();
            break;

            case 'top_rated': 
				$query_args = array(
					'posts_per_page' => $settings['posts_per_page'],
					'no_found_rows'  => 1,
					'post_type'      => 'product',
					'meta_key'       => '_wc_average_rating',
					'orderby'        => 'meta_value_num',
					'order'          => 'DESC',
					'meta_query'     => WC()->query->get_meta_query(),
					'tax_query'      => WC()->query->get_tax_query(),
				);
				
            break;

            case 'mixed_order':
                $query_args['orderby']    = 'rand';
            break;

            default: 
            	/* Recent */
                $query_args['orderby']    = 'title';
                $query_args['order']      = 'asc';
				$query_args['orderby'] = $settings['order_by'];
				$query_args['order'] = $settings['order'];	
            break;
        }	


        if ( ! empty( $settings['exclude'] ) ) {				
			if ( ! is_array( $settings['exclude'] ) )
				$exclude = explode( ',', $settings['exclude'] );

			$query_args['post__not_in'] = $exclude;
		}

		$count = 0;
		
		$query = new WP_Query( $query_args );
		if ( $query->have_posts() ) : ?>
			<div <?php echo $this->get_render_attribute_string('tf_posts'); ?> >
					<?php while ( $query->have_posts() ) : $query->the_post() ;						
						$attr['settings'] = $settings; ?>
						

						<?php 
						if ($count == 1 && $settings['style'] != 'style3') {
							tf_get_template_widget("product-single/style1", $attr);
						}
						else if ($count != 1 && $settings['style'] != 'style3') {tf_get_template_widget("product-single/style2", $attr);}

						else if ($settings['style'] === 'style3') {
							tf_get_template_widget("product-single/style3", $attr);
						}
						?>
							
					<?php $count ++	; endwhile;  ?>
	
				<?php
					$pagenum_link = html_entity_decode(get_pagenum_link());
					$query_args = array();
					$url_parts = explode('?', $pagenum_link);
					if (isset($url_parts[1])) {
						wp_parse_str($url_parts[1], $query_args);
					}
					$pagenum_link = remove_query_arg(array_keys($query_args), $pagenum_link);
					$pagenum_link = trailingslashit($pagenum_link) . '%_%';

					$numeric_links = paginate_links(array(
						'base' => $pagenum_link,
						'total' => $query->max_num_pages,
						'current' => $paged,
						'mid_size' => 1,
						'add_args' => array_map('urlencode', $query_args),
						'prev_next' => true,
						'prev_text' => ('<'),
						'next_text' => ('>'),
					));?>
				<?php wp_reset_postdata(); ?>
			</div>
		<?php
		else:
			esc_html_e('No posts found', 'themesflat-core');
		endif;		
		
	}

	

	

}