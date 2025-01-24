<?php
class TFWooCategory_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tfproductcategories';
    }
    
    public function get_title() {
        return esc_html__( 'TF Product Categories', 'themesflat-core' );
    }

    public function get_icon() {
        return 'eicon-product-categories';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
		return ['owl-carousel','tf-product-categories'];
	}

	public function get_script_depends() {
		return [ 'owl-carousel','tf-product-category' ];
	}

	protected function register_controls() {
		// Start Setting        
			$this->start_controls_section( 'section_setting',
	            [
	                'label' => esc_html__('Setting', 'themesflat-core'),
	            ]
	        );	

			$this->add_control(
                'columns',
                [
                    'label' => esc_html__( 'Columns', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'columns-4',
                    'options' => [
                    	'columns-1' => esc_html__( '1', 'themesflat-core' ),
                        'columns-2' => esc_html__( '2', 'themesflat-core' ),
                        'columns-3' => esc_html__( '3', 'themesflat-core' ),
                        'columns-4' => esc_html__( '4', 'themesflat-core' ),
                        'columns-5' => esc_html__( '5', 'themesflat-core' ),
						'columns-6' => esc_html__( '6', 'themesflat-core' ),
                        'columns-7' => esc_html__( '7', 'themesflat-core' ),
                        'columns-8' => esc_html__( '8', 'themesflat-core' ),
                        'columns-9' => esc_html__( '9', 'themesflat-core' ),
                        'columns-10' => esc_html__( '10', 'themesflat-core' ),
                    ],                    
                ]
            ); 

			$this->add_control(
                'columns_tab',
                [
                    'label' => esc_html__( 'Columns Tablet', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'columns-tb-3',
                    'options' => [
                    	'columns-tb-1' => esc_html__( '1', 'themesflat-core' ),
                        'columns-tb-2' => esc_html__( '2', 'themesflat-core' ),
                        'columns-tb-3' => esc_html__( '3', 'themesflat-core' ),
                        'columns-tb-4' => esc_html__( '4', 'themesflat-core' ),
                        'columns-tb-5' => esc_html__( '5', 'themesflat-core' ),
						'columns-tb-6' => esc_html__( '6', 'themesflat-core' ),
                        'columns-tb-7' => esc_html__( '7', 'themesflat-core' ),
                    ],                    
                ]
            ); 

			$this->add_control(
                'columns_mob',
                [
                    'label' => esc_html__( 'Columns Mobile', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'columns-mb-2',
                    'options' => [
                    	'columns-mb-1' => esc_html__( '1', 'themesflat-core' ),
                        'columns-mb-2' => esc_html__( '2', 'themesflat-core' ),
                        'columns-mb-3' => esc_html__( '3', 'themesflat-core' ),
                        'columns-mb-4' => esc_html__( '4', 'themesflat-core' ),
                        'columns-mb-5' => esc_html__( '5', 'themesflat-core' ),
                    ],                    
                ]
            ); 

			// $this->add_control(
            //     'columns_mob3',
            //     [
            //         'label' => esc_html__( 'Columns Mobile (767 > 500)', 'themesflat-core' ),
            //         'type' => \Elementor\Controls_Manager::SELECT,
            //         'default' => 'columns-mb-2',
            //         'options' => [
            //         	'columns-mb-1' => esc_html__( '1', 'themesflat-core' ),
            //             'columns-mb-2' => esc_html__( '2', 'themesflat-core' ),
            //             'columns-mb-3' => esc_html__( '3', 'themesflat-core' ),
            //             'columns-mb-4' => esc_html__( '4', 'themesflat-core' ),
            //             'columns-mb-5' => esc_html__( '5', 'themesflat-core' ),
            //         ],                    
            //     ]
            // ); 

			$this->add_control(
                'columns_mob2',
                [
                    'label' => esc_html__( 'Columns Mobile (< 500)', 'themesflat-core' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'columns-mb2-1',
                    'options' => [
                    	'columns-mb2-1' => esc_html__( '1', 'themesflat-core' ),
                        'columns-mb2-2' => esc_html__( '2', 'themesflat-core' ),
                        'columns-mb2-3' => esc_html__( '3', 'themesflat-core' ),
                    ],                    
                ]
            ); 

			$this->add_control(
				'number',
				[
					'label' => esc_html__( 'Categories Count', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::NUMBER,
					'default' => '5',
				]
			);

			$this->add_control( 
	        	'style',
				[
					'label' => esc_html__( 'Layout Style', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'style1',
					'options' => [
						'style1' => esc_html__( 'Style 1', 'themesflat-core' ),
						'style2' => esc_html__( 'Style 2', 'themesflat-core' ),
					],
				]
			);

			$this->end_controls_section();

			$this->start_controls_section(
				'section_filter',
				[
					'label' => esc_html__( 'Query', 'themesflat-core' ),
					'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				]
			);

			$this->add_control(
				'source',
				[
					'label' => esc_html__( 'Source', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'options' => [
						'' => esc_html__( 'Show All', 'themesflat-core' ),
						'by_id' => esc_html__( 'Manual Selection', 'themesflat-core' ),
						'by_parent' => esc_html__( 'By Parent', 'themesflat-core' ),
						'current_subcategories' => esc_html__( 'Current Subcategories', 'themesflat-core' ),
					],
					'label_block' => true,
				]
			);

			$categories = get_terms( 'product_cat' );

			$options = [];
			foreach ( $categories as $category ) {
				$options[ $category->term_id ] = $category->name;
			}

			$this->add_control(
				'categories',
				[
					'label' => esc_html__( 'Categories', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT2,
					'options' => $options,
					'default' => [],
					'label_block' => true,
					'multiple' => true,
					'condition' => [
						'source' => 'by_id',
					],
				]
			);

			$parent_options = [ '0' => esc_html__( 'Only Top Level', 'themesflat-core' ) ] + $options;
			$this->add_control(
				'parent',
				[
					'label' => esc_html__( 'Parent', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => '0',
					'options' => $parent_options,
					'condition' => [
						'source' => 'by_parent',
					],
				]
			);

			$this->add_control(
				'hide_empty',
				[
					'label' => esc_html__( 'Hide Empty', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'default' => '',
					'label_on' => 'Hide',
					'label_off' => 'Show',
				]
			);

			$this->add_control(
				'orderby',
				[
					'label' => esc_html__( 'Order By', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'name',
					'options' => [
						'name' => esc_html__( 'Name', 'themesflat-core' ),
						'slug' => esc_html__( 'Slug', 'themesflat-core' ),
						'description' => esc_html__( 'Description', 'themesflat-core' ),
						'count' => esc_html__( 'Count', 'themesflat-core' ),
					],
				]
			);

			$this->add_control(
				'order',
				[
					'label' => esc_html__( 'Order', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'desc',
					'options' => [
						'asc' => esc_html__( 'ASC', 'themesflat-core' ),
						'desc' => esc_html__( 'DESC', 'themesflat-core' ),
					],
				]
			);

			$this->end_controls_section();			
        // /.End Setting  

		// Start Style Setting
			$this->start_controls_section(
				'section_products_style',
				[
					'label' => esc_html__( 'Products', 'themesflat-core' ),
					'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);

			$this->add_control(
				'column_gap',
				[
					'label'     => esc_html__( 'Columns Gap', 'themesflat-core' ),
					'type'      => \Elementor\Controls_Manager::SLIDER,
					'range'     => [
						'px' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tf-product-category ' => 'grid-column-gap: {{SIZE}}{{UNIT}}',
					],
					'condition' => [
						'carousel' => 'no',
					],
				]
			);

			$this->add_control(
				'row_gap',
				[
					'label'     => esc_html__( 'Rows Gap', 'themesflat-core' ),
					'type'      => \Elementor\Controls_Manager::SLIDER,
					'range'     => [
						'px' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tf-product-category' => 'grid-row-gap: {{SIZE}}{{UNIT}}',
					],
					'condition' => [
						'carousel' => 'no',
					],
				]
			);

			// $this->add_responsive_control(
			// 	'align',
			// 	[
			// 		'label'     => esc_html__( 'Alignment', 'themesflat-core' ),
			// 		'type'      => \Elementor\Controls_Manager::CHOOSE,
			// 		'options'   => [
			// 			'left'   => [
			// 				'title' => esc_html__( 'Left', 'themesflat-core' ),
			// 				'icon'  => 'eicon-text-align-left',
			// 			],
			// 			'center' => [
			// 				'title' => esc_html__( 'Center', 'themesflat-core' ),
			// 				'icon'  => 'eicon-text-align-center',
			// 			],
			// 			'right'  => [
			// 				'title' => esc_html__( 'Right', 'themesflat-core' ),
			// 				'icon'  => 'eicon-text-align-right',
			// 			],
			// 		],
			// 		'default' => 'center',
			// 		'selectors' => [
			// 			'{{WRAPPER}} .tf-product-category .products li .inner' => 'text-align: {{VALUE}}',
			// 		],
			// 	]
			// );

			$this->add_control(
				'bg_color',
				[
					'label'     => esc_html__( 'Background Color', 'themesflat-core' ),
					'type'      => \Elementor\Controls_Manager::COLOR,
					'default'	=> '',
					'selectors' => [
						'{{WRAPPER}} .tf-product-category  .inner' => 'background-color: {{VALUE}}',
					],
				]
			);

			$this->add_responsive_control(
				'border_radius',
				[
					'label'      => esc_html__( 'Border Radius', 'themesflat-core' ),
					'type'       => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .tf-product-category  .inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
					],
				]
			);

			$this->add_responsive_control(
				'padding',
				[
					'label'      => esc_html__( 'Padding', 'themesflat-core' ),
					'type'       => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .tf-product-category  .inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
					],
				]
			);

			$this->add_control(
				'heading_image_style',
				[
					'label'     => esc_html__( 'Image', 'themesflat-core' ),
					'type'      => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name'     => 'image_border',
					'selector' => '{{WRAPPER}} .tf-product-category .category-thumbnail img',
				]
			);

			$this->add_responsive_control(
				'image_border_radius',
				[
					'label'      => esc_html__( 'Border Radius', 'themesflat-core' ),
					'type'       => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .tf-product-category .category-thumbnail img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
					],
				]
			);

			// $this->add_responsive_control(
			// 	'image_width',
			// 	[
			// 		'label'      => esc_html__( 'Max Width', 'themesflat-core' ),
			// 		'type'       => \Elementor\Controls_Manager::SLIDER,
			// 		'size_units' => [ 'px', '%' ],
			// 		'range' => [
			// 			'px' => [
			// 				'min' => 0,
			// 				'max' => 500,
			// 				'step' => 1,
			// 			],
			// 			'%' => [
			// 				'min' => 0,
			// 				'max' => 100,
			// 			],
			// 		],
			// 		'selectors'  => [
			// 			'{{WRAPPER}} .tf-product-category .products li .category-thumbnail > a' => 'max-width: {{SIZE}}{{UNIT}}',
			// 		],
			// 	]
			// );

			$this->add_responsive_control(
				'image_spacing_top',
				[
					'label'      => esc_html__( 'Spacing Top', 'themesflat-core' ),
					'type'       => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', 'em' ],
					'selectors'  => [
						'{{WRAPPER}} .tf-product-category .category-thumbnail' => 'margin-top: {{SIZE}}{{UNIT}}',
					],
				]
			);

			$this->add_responsive_control(
				'image_spacing_bottom',
				[
					'label'      => esc_html__( 'Spacing Bottom', 'themesflat-core' ),
					'type'       => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', 'em' ],
					'selectors'  => [
						'{{WRAPPER}} .tf-product-category .category-thumbnail' => 'margin-bottom: {{SIZE}}{{UNIT}}',
					],
				]
			);

			// $this->add_control(
			// 	'heading_overlay_image_style',
			// 	[
			// 		'label'     => esc_html__( 'Overlay Image', 'themesflat-core' ),
			// 		'type'      => \Elementor\Controls_Manager::HEADING,
			// 		'separator' => 'before',
			// 	]
			// );

			// $this->add_responsive_control(
			// 	'image_overlay_size',
			// 	[
			// 		'label'      => esc_html__( 'Size', 'themesflat-core' ),
			// 		'type'       => \Elementor\Controls_Manager::SLIDER,
			// 		'size_units' => [ 'px', '%' ],
			// 		'range' => [
			// 			'px' => [
			// 				'min' => 0,
			// 				'max' => 500,
			// 				'step' => 1,
			// 			],
			// 			'%' => [
			// 				'min' => 0,
			// 				'max' => 100,
			// 			],
			// 		],
				
			// 		'selectors'  => [
			// 			'{{WRAPPER}} .tf-product-category .products li .category-thumbnail:before' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}}',
			// 		],
			// 	]
			// );

			// $this->add_control(
			// 	'image_overlay_color',
			// 	[
			// 		'label'     => esc_html__( 'Color', 'themesflat-core' ),
			// 		'type'      => \Elementor\Controls_Manager::COLOR,
			// 		'default'	=> '',
			// 		'selectors' => [
			// 			'{{WRAPPER}} .tf-product-category .products li .category-thumbnail:before' => 'background-color: {{VALUE}}',
			// 		],
			// 	]
			// );

			$this->add_control(
				'heading_title_style',
				[
					'label'     => esc_html__( 'Title', 'themesflat-core' ),
					'type'      => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'title_s1_typography',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					
					'selector' => '{{WRAPPER}} .tf-product-category .woocommerce-loop-category__title a',
				]
			);

			$this->add_control(
				'title_color',
				[
					'label'     => esc_html__( 'Color', 'themesflat-core' ),
					'type'      => \Elementor\Controls_Manager::COLOR,
					'default'	=> '',
					'selectors' => [
						'{{WRAPPER}} .tf-product-category .woocommerce-loop-category__title a' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'title_color_hover',
				[
					'label'     => esc_html__( 'Color Hover', 'themesflat-core' ),
					'type'      => \Elementor\Controls_Manager::COLOR,
					'default'	=> '',
					'selectors' => [
						'{{WRAPPER}} .tf-product-category .woocommerce-loop-category__title a:hover' => 'color: {{VALUE}}',
					],
				]
			);


			// $this->add_control(
			// 	'heading_count_style',
			// 	[
			// 		'label'     => esc_html__( 'Count', 'themesflat-core' ),
			// 		'type'      => \Elementor\Controls_Manager::HEADING,
			// 		'separator' => 'before',
			// 	]
			// );

			// $this->add_control(
			// 	'count_color',
			// 	[
			// 		'label'     => esc_html__( 'Color', 'themesflat-core' ),
			// 		'type'      => \Elementor\Controls_Manager::COLOR,
			// 		'default'	=> '',
			// 		'selectors' => [
			// 			'{{WRAPPER}} .tf-product-category .category-total' => 'color: {{VALUE}}',
			// 		],
			// 	]
			// );

			// $this->add_group_control(
			// 	\Elementor\Group_Control_Typography::get_type(),
			// 	[
			// 		'name'     => 'count_typography',
			// 		'fields_options' => [
			// 	        'typography' => ['default' => 'yes'],
			// 	    ],
			// 		'selector' => '{{WRAPPER}} .tf-product-category .category-total',
			// 	]
			// );

			// $this->add_control(
			// 	'heading_cat_desc_style',
			// 	[
			// 		'label'     => esc_html__( 'Description', 'themesflat-core' ),
			// 		'type'      => \Elementor\Controls_Manager::HEADING,
			// 		'separator' => 'before',
			// 	]
			// );

			// $this->add_control(
			// 	'cat_desc_color',
			// 	[
			// 		'label'     => esc_html__( 'Color', 'themesflat-core' ),
			// 		'type'      => \Elementor\Controls_Manager::COLOR,
			// 		'selectors' => [
			// 			'{{WRAPPER}} .tf-product-category .shop_cat_desc' => 'color: {{VALUE}}',
			// 		],
			// 	]
			// );

			// $this->add_group_control(
			// 	\Elementor\Group_Control_Typography::get_type(),
			// 	[
			// 		'name'     => 'cat_desc_typography',
			// 		'selector' => '{{WRAPPER}} .tf-product-category .shop_cat_desc',
			// 	]
			// );
	        
			$this->end_controls_section();
		// /.End Setting 
// Start Carousel        
	$this->start_controls_section( 
		'section_posts_carousel',
		[
			'label' => esc_html__('Carousel', 'themesflat-core'),
		]
	);	

	$this->add_control( 
		'carousel',
		[
			'label' => esc_html__( 'Carousel', 'themesflat-core' ),
			'type' => \Elementor\Controls_Manager::SWITCHER,
			'label_on' => esc_html__( 'On', 'themesflat-core' ),
			'label_off' => esc_html__( 'Off', 'themesflat-core' ),
			'return_value' => 'yes',
			'default' => 'no',
		]
	);        

	$this->add_control( 
		'carousel_loop',
		[
			'label' => esc_html__( 'Loop', 'themesflat-core' ),
			'type' => \Elementor\Controls_Manager::SWITCHER,
			'label_on' => esc_html__( 'On', 'themesflat-core' ),
			'label_off' => esc_html__( 'Off', 'themesflat-core' ),
			'return_value' => 'yes',
			'default' => 'no',
			'condition' => [
				'carousel' => 'yes',
			],
		]
	);

	$this->add_control( 
		'carousel_auto',
		[
			'label' => esc_html__( 'Auto Play', 'themesflat-core' ),
			'type' => \Elementor\Controls_Manager::SWITCHER,
			'label_on' => esc_html__( 'On', 'themesflat-core' ),
			'label_off' => esc_html__( 'Off', 'themesflat-core' ),
			'return_value' => 'yes',
			'default' => 'no',
			'condition' => [
				'carousel' => 'yes',
			],
		]
	);

	$this->add_control( 
		'carousel_column_desk',
		[
			'label' => esc_html__( 'Columns Desktop', 'themesflat-core' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'default' => '10',
			'options' => [
				'1' => esc_html__( '1', 'themesflat-core' ),
				'2' => esc_html__( '2', 'themesflat-core' ),
				'3' => esc_html__( '3', 'themesflat-core' ),
				'4' => esc_html__( '4', 'themesflat-core' ),
				'5' => esc_html__( '5', 'themesflat-core' ),
				'6' => esc_html__( '6', 'themesflat-core' ),
				'7' => esc_html__( '7', 'themesflat-core' ),
				'8' => esc_html__( '8', 'themesflat-core' ),
				'9' => esc_html__( '9', 'themesflat-core' ),
				'10' => esc_html__( '10', 'themesflat-core' ),
			],
			'condition' => [
				'carousel' => 'yes',
			],
		]
	);

	$this->add_control( 
		'carousel_column_tablet',
		[
			'label' => esc_html__( 'Columns Tablet', 'themesflat-core' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'default' => '3',
			'options' => [
				'1' => esc_html__( '1', 'themesflat-core' ),
				'2' => esc_html__( '2', 'themesflat-core' ),
				'3' => esc_html__( '3', 'themesflat-core' ),
				'4' => esc_html__( '4', 'themesflat-core' ),
				'5' => esc_html__( '5', 'themesflat-core' ),
				'6' => esc_html__( '6', 'themesflat-core' ),
				'7' => esc_html__( '7', 'themesflat-core' ),
			],
			'condition' => [
				'carousel' => 'yes',
			],
		]
	);

	$this->add_control( 
		'carousel_column_mobile',
		[
			'label' => esc_html__( 'Columns Mobile', 'themesflat-core' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'default' => '1',
			'options' => [
				'1' => esc_html__( '1', 'themesflat-core' ),
				'2' => esc_html__( '2', 'themesflat-core' ),
				'3' => esc_html__( '3', 'themesflat-core' ),
				'4' => esc_html__( '4', 'themesflat-core' ),
				'5' => esc_html__( '5', 'themesflat-core' ),
			],
			'condition' => [
				'carousel' => 'yes',
			],
		]
	);

	$this->add_control(
		'carousel_spacer',
		[
			'label' => esc_html__( 'Spacer', 'themesflat-core' ),
			'type' => \Elementor\Controls_Manager::NUMBER,
			'min' => 0,
			'max' => 100,
			'step' => 1,
			'default' => 0,
			'condition' => [
				'carousel' => 'yes',
			],			
		]
	);	

	$this->add_control( 
		'carousel_arrow',
		[
			'label' => esc_html__( 'Arrow', 'themesflat-core' ),
			'type' => \Elementor\Controls_Manager::SWITCHER,
			'label_on' => esc_html__( 'Show', 'themesflat-core' ),
			'label_off' => esc_html__( 'Hide', 'themesflat-core' ),
			'return_value' => 'yes',
			'default' => 'no',
			'condition' => [
				'carousel' => 'yes',
			],
			'description'	=> 'Just show when you have two slide',
			'separator' => 'before',
		]
	);

	// $this->add_control( 
	// 	'carousel_prev_icon', [
	// 		'label' => esc_html__( 'Prev Icon', 'themesflat-core' ),
	// 		'type' => \Elementor\Controls_Manager::ICON,
	// 		'default' => 'fas fa-arrow-left',
	// 		'include' => [
	// 			'fas fa-angle-double-left',
	// 			'fas fa-angle-left',
	// 			'fas fa-chevron-left',
	// 			'fas fa-arrow-left',
	// 		],  
	// 		'condition' => [
	// 			'carousel' => 'yes',
	// 			'carousel_arrow' => 'yes',
	// 		]
	// 	]
	// );

	// $this->add_control( 
	// 	'carousel_next_icon', [
	// 		'label' => esc_html__( 'Next Icon', 'themesflat-core' ),
	// 		'type' => \Elementor\Controls_Manager::ICON,
	// 		'default' => 'fas fa-arrow-right',
	// 		'include' => [
	// 			'fas fa-angle-double-right',
	// 			'fas fa-angle-right',
	// 			'fas fa-chevron-right',
	// 			'fas fa-arrow-right',
	// 		], 
	// 		'condition' => [
	// 			'carousel' => 'yes',
	// 			'carousel_arrow' => 'yes',
	// 		]
	// 	]
	// );

	$this->add_responsive_control( 
		'carousel_arrow_fontsize',
		[
			'label' => esc_html__( 'Font Size', 'themesflat-core' ),
			'type' => \Elementor\Controls_Manager::SLIDER,
			'size_units' => [ 'px' ],
			'range' => [
				'px' => [
					'min' => 0,
					'max' => 100,
					'step' => 1,
				]
			],
			
			'selectors' => [
				'{{WRAPPER}} .tf-product-category .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-product-category .owl-carousel .owl-nav .owl-next' => 'font-size: {{SIZE}}{{UNIT}};',
			],
			'condition' => [
				'carousel' => 'yes',
				'carousel_arrow' => 'yes',
			]
		]
	);

	$this->add_responsive_control( 
		'w_size_carousel_arrow',
		[
			'label' => esc_html__( 'Width', 'themesflat-core' ),
			'type' => \Elementor\Controls_Manager::SLIDER,
			'size_units' => [ 'px' ],
			'range' => [
				'px' => [
					'min' => 0,
					'max' => 200,
					'step' => 1,
				]
			],
			
			'selectors' => [
				'{{WRAPPER}} .tf-product-category .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-product-category .owl-carousel .owl-nav .owl-next' => 'width: {{SIZE}}{{UNIT}};',
			],
			'condition' => [
				'carousel' => 'yes',
				'carousel_arrow' => 'yes',
			]
		]
	);

	$this->add_responsive_control( 
		'h_size_carousel_arrow',
		[
			'label' => esc_html__( 'Height', 'themesflat-core' ),
			'type' => \Elementor\Controls_Manager::SLIDER,
			'size_units' => [ 'px' ],
			'range' => [
				'px' => [
					'min' => 0,
					'max' => 200,
					'step' => 1,
				]
			],
			
			'selectors' => [
				'{{WRAPPER}} .tf-product-category .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-product-category .owl-carousel .owl-nav .owl-next' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
			],
			'condition' => [
				'carousel' => 'yes',
				'carousel_arrow' => 'yes',
			]
		]
	);	

	$this->add_responsive_control( 
		'carousel_arrow_width',
		[
			'label' => esc_html__( 'Width Wrap Nav', 'themesflat-core' ),
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
				],
			],
			
			'selectors' => [
				'{{WRAPPER}} .tf-product-category .owl-carousel .owl-nav' => 'width: {{SIZE}}{{UNIT}};',
			],
			'condition' => [
				'carousel' => 'yes',
				'carousel_arrow' => 'yes',
			]
		]
	);

	$this->add_responsive_control( 
		'carousel_arrow_horizontal_position',
		[
			'label' => esc_html__( 'Horizontal Position', 'themesflat-core' ),
			'type' => \Elementor\Controls_Manager::SLIDER,
			'size_units' => [ 'px', '%' ],
			'range' => [
				'px' => [
					'min' => -2000,
					'max' => 2000,
					'step' => 1,
				],
				'%' => [
					'min' => -100,
					'max' => 100,
				],
			],
			
			'selectors' => [
				'{{WRAPPER}} .tf-product-category .owl-carousel .owl-nav' => 'right: {{SIZE}}{{UNIT}};',
				'.rtl {{WRAPPER}} .tf-product-category .owl-carousel .owl-nav' => 'left: {{SIZE}}{{UNIT}};right: unset;',
			],
			'condition' => [
				'carousel' => 'yes',
				'carousel_arrow' => 'yes',
			]
		]
	);

	$this->add_responsive_control( 
		'carousel_arrow_vertical_position',
		[
			'label' => esc_html__( 'Vertical Position', 'themesflat-core' ),
			'type' => \Elementor\Controls_Manager::SLIDER,
			'size_units' => [ 'px', '%' ],
			'range' => [
				'px' => [
					'min' => -1000,
					'max' => 1000,
					'step' => 1,
				],
				'%' => [
					'min' => -100,
					'max' => 100,
				],
			],
			
			'selectors' => [
				'{{WRAPPER}} .tf-product-category .owl-carousel .owl-nav' => 'top: {{SIZE}}{{UNIT}};',
			],
			'condition' => [
				'carousel' => 'yes',
				'carousel_arrow' => 'yes',
			]
		]
	);

	$this->start_controls_tabs( 
		'carousel_arrow_tabs',
		[
			'condition' => [
				'carousel_arrow' => 'yes',
				'carousel' => 'yes',
			]
		] );
		$this->start_controls_tab( 
			'carousel_arrow_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'themesflat-core' ),						
			]
		);
		$this->add_control( 
			'carousel_arrow_color',
			[
				'label' => esc_html__( 'Color', 'themesflat-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tf-product-category .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-product-category .owl-carousel .owl-nav .owl-next' => 'color: {{VALUE}}',
				],
				'condition' => [
					'carousel_arrow' => 'yes',
				]
			]
		);
		$this->add_control( 
			'carousel_arrow_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'themesflat-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tf-product-category .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-product-category .owl-carousel .owl-nav .owl-next' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'carousel_arrow' => 'yes',
				]
			]
		);			        
		$this->add_group_control( 
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'carousel_arrow_border',
				'label' => esc_html__( 'Border', 'themesflat-core' ),
				
				'selector' => '{{WRAPPER}} .tf-product-category .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-product-category .owl-carousel .owl-nav .owl-next',
				'condition' => [
					'carousel_arrow' => 'yes',
				]
			]
		);
		$this->add_responsive_control( 
			'carousel_arrow_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				
				'selectors' => [
					'{{WRAPPER}} .tf-product-category .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-product-category .owl-carousel .owl-nav .owl-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'carousel_arrow' => 'yes',
				]
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab( 
			'carousel_arrow_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'themesflat-core' ),
			]
		);
		$this->add_control( 
			'carousel_arrow_color_hover',
			[
				'label' => esc_html__( 'Color', 'themesflat-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tf-product-category .owl-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-product-category .owl-carousel .owl-nav .owl-next:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .tf-product-category.has-carousel .owl-nav .owl-prev.disabled, {{WRAPPER}} .tf-product-category.has-carousel .owl-nav .owl-next.disabled' => 'color: {{VALUE}}',
				],
				'condition' => [
					'carousel_arrow' => 'yes',
				]
			]
		);
		$this->add_control( 
			'carousel_arrow_hover_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'themesflat-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tf-product-category .owl-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-product-category .owl-carousel .owl-nav .owl-next:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .tf-product-category.has-carousel .owl-nav .owl-prev.disabled, {{WRAPPER}} .tf-product-category.has-carousel .owl-nav .owl-next.disabled' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'carousel_arrow' => 'yes',
				]
			]
		);
		$this->add_group_control( 
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'carousel_arrow_border_hover',
				'label' => esc_html__( 'Border', 'themesflat-core' ),
				
				'selector' => '{{WRAPPER}} .tf-product-category .owl-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-product-category .owl-carousel .owl-nav .owl-next:hover, {{WRAPPER}} .tf-product-category.has-carousel .owl-nav .owl-prev.disabled, {{WRAPPER}} .tf-product-category.has-carousel .owl-nav .owl-next.disabled',
				'condition' => [
					'carousel_arrow' => 'yes',
				]
			]
		);
		$this->add_responsive_control( 
			'carousel_arrow_border_radius_hover',
			[
				'label' => esc_html__( 'Border Radius Previous', 'themesflat-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .tf-product-category .owl-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-product-category .owl-carousel .owl-nav .owl-next:hover, {{WRAPPER}} .tf-product-category.has-carousel .owl-nav .owl-prev.disabled, {{WRAPPER}} .tf-product-category.has-carousel .owl-nav .owl-next.disabled' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'carousel_arrow' => 'yes',
				]
			]
		);
	   $this->end_controls_tab();
	$this->end_controls_tabs();

	$this->add_control( 
		'carousel_bullets',
		[
			'label'         => esc_html__( 'Bullets', 'themesflat-core' ),
			'type'          => \Elementor\Controls_Manager::SWITCHER,
			'label_on'      => esc_html__( 'Show', 'themesflat-core' ),
			'label_off'     => esc_html__( 'Hide', 'themesflat-core' ),
			'return_value'  => 'yes',
			'default'       => 'no',
			'condition' => [
				'carousel' => 'yes',
			],
			'separator' => 'before',
		]
	);	

	$this->add_responsive_control( 
		'w_size_carousel_bullets',
			[
				'label' => esc_html__( 'Width', 'themesflat-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					]
				],
				
				'selectors' => [
					'{{WRAPPER}} .tf-product-category .owl-dots .owl-dot' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'carousel' => 'yes',
					'carousel_bullets' => 'yes',
				]
			]
	);

	$this->add_responsive_control( 
		'h_size_carousel_bullets',
		[
			'label' => esc_html__( 'Height', 'themesflat-core' ),
			'type' => \Elementor\Controls_Manager::SLIDER,
			'size_units' => [ 'px' ],
			'range' => [
				'px' => [
					'min' => 0,
					'max' => 100,
					'step' => 1,
				]
			],
			
			'selectors' => [
				'{{WRAPPER}} .tf-product-category .owl-dots .owl-dot' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
			],
			'condition' => [
				'carousel' => 'yes',
				'carousel_bullets' => 'yes',
			]
		]
	);

	$this->add_responsive_control( 
		'carousel_bullets_horizontal_position',
		[
			'label' => esc_html__( 'Horizonta Offset', 'themesflat-core' ),
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
				],
			],
			
			'selectors' => [
				'{{WRAPPER}} .tf-product-category .owl-dots' => 'left: {{SIZE}}{{UNIT}};',
			],
			'condition' => [
				'carousel' => 'yes',
				'carousel_bullets' => 'yes',
			]
		]
	);

	$this->add_responsive_control( 
		'carousel_bullets_vertical_position',
		[
			'label' => esc_html__( 'Vertical Offset', 'themesflat-core' ),
			'type' => \Elementor\Controls_Manager::SLIDER,
			'size_units' => [ 'px', '%' ],
			'range' => [
				'px' => [
					'min' => -200,
					'max' => 1000,
					'step' => 1,
				],
				'%' => [
					'min' => 0,
					'max' => 100,
				],
			],
			
			'selectors' => [
				'{{WRAPPER}} .tf-product-category .owl-dots' => 'bottom: {{SIZE}}{{UNIT}};',
			],
			'condition' => [
				'carousel' => 'yes',
				'carousel_bullets' => 'yes',
			]
		]
	);

	$this->start_controls_tabs( 
		'carousel_bullets_tabs',
			[
				'condition' => [
					'carousel' => 'yes',
					'carousel_bullets' => 'yes',
				]
			] );
		$this->start_controls_tab( 
			'carousel_bullets_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'themesflat-core' ),						
			]
		);
		$this->add_control( 
			'carousel_bullets_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'themesflat-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tf-product-category .owl-dots .owl-dot' => 'background-color: {{VALUE}}',
				],
				'condition' => [
					'carousel_bullets' => 'yes',
				]
			]
		);			         
		$this->add_group_control( 
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'carousel_bullets_border',
				'label' => esc_html__( 'Border', 'themesflat-core' ),
				'selector' => '{{WRAPPER}} .tf-product-category .owl-dots .owl-dot',
				'condition' => [
					'carousel_bullets' => 'yes',
				]
			]
		);
		$this->add_responsive_control( 
			'carousel_bullets_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				
				'selectors' => [
					'{{WRAPPER}} .tf-product-category .owl-dots .owl-dot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'carousel_bullets' => 'yes',
				]
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab( 
			'carousel_bullets_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'themesflat-core' ),
		]
		); 
		$this->add_control( 
			'carousel_bullets_hover_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'themesflat-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tf-product-category .owl-dots .owl-dot:hover, {{WRAPPER}} .tf-product-category .owl-dots .owl-dot.active' => 'background-color: {{VALUE}}',
				],
				'condition' => [
					'carousel_bullets' => 'yes',
				]
			]
		); 
		$this->add_group_control( 
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'carousel_bullets_border_hover',
				'label' => esc_html__( 'Border', 'themesflat-core' ),
				'selector' => '{{WRAPPER}} .tf-product-category .owl-dots .owl-dot:hover, {{WRAPPER}} .tf-product-category .owl-dots .owl-dot.active',
				'condition' => [
					'carousel_bullets' => 'yes',
				]
			]
		);
		$this->add_responsive_control( 
			'carousel_bullets_border_radius_hover',
			[
				'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .tf-product-category .owl-dots .owl-dot:hover, {{WRAPPER}} .tf-product-category .owl-dots .owl-dot.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'carousel_bullets' => 'yes',
				]
			]
		);
		$this->end_controls_tab();
	$this->end_controls_tabs();

	$this->end_controls_section();
// /.End Carousel	
	}



	private function get_shortcode() {
		$settings = $this->get_settings();

		$attributes = [
			'number' => $settings['number'],
			'columns' => $settings['columns'],
			'hide_empty' => ( 'yes' === $settings['hide_empty'] ) ? 1 : 0,
			'orderby' => $settings['orderby'],
			'order' => $settings['order'],
		];

		if ( 'by_id' === $settings['source'] ) {
			$attributes['ids'] = implode( ',', $settings['categories'] );
		} elseif ( 'by_parent' === $settings['source'] ) {
			$attributes['parent'] = $settings['parent'];
		} elseif ( 'current_subcategories' === $settings['source'] ) {
			$attributes['parent'] = get_queried_object_id();
		}

		$this->add_render_attribute( 'shortcode', $attributes );

		$shortcode = sprintf( '[themesflat_category_products %s]', $this->get_render_attribute_string( 'shortcode' ) );

		return $shortcode;
	}

	protected function render($instance = []) {

		$settings = $this->get_settings_for_display();
		global $woocommerce_loop;
		
		
        $atts = [
            'parent'     => '',
            'ids'        => '',
			'number' => $settings['number'],
			'columns' => $settings['columns'],
			'hide_empty' => ( 'yes' === $settings['hide_empty'] ) ? 1 : 0,
			'orderby' => $settings['orderby'],
			'order' => $settings['order'],
		];

		if ( 'by_id' === $settings['source'] ) {
			$atts['ids'] = implode( ',', $settings['categories'] );
		} elseif ( 'by_parent' === $settings['source'] ) {
			$atts['parent'] = $settings['parent'];
		} elseif ( 'current_subcategories' === $settings['source'] ) {
			$atts['parent'] = get_queried_object_id();
		}

        if ( isset( $atts['ids'] ) ) {
            $ids = explode( ',', $atts['ids'] );
            $ids = array_map( 'trim', $ids );
        } else {
            $ids = array();
        }

        $hide_empty = ( $atts['hide_empty'] == true || $atts['hide_empty'] == 1 ) ? 1 : 0;

        // get terms and workaround WP bug with parents/pad counts
        $args = array(
            'orderby'    => $atts['orderby'],
            'order'      => $atts['order'],
            'hide_empty' => $hide_empty,
            'include'    => $ids,
            'pad_counts' => true,
            'child_of'   => $atts['parent']
        );

        $product_categories = get_terms( 'product_cat', $args );

        if ( '' !== $atts['parent'] ) {
            $product_categories = wp_list_filter( $product_categories, array( 'parent' => $atts['parent'] ) );
        }

        if ( $hide_empty ) {
            foreach ( $product_categories as $key => $category ) {
                if ( $category->count == 0 ) {
                    unset( $product_categories[ $key ] );
                }
            }
        }

        if ( $atts['number'] ) {
            $product_categories = array_slice( $product_categories, 0, $atts['number'] );
        }

        $columns = $settings['columns'];
        $columns_tb = $settings['columns_tab'];
        $columns_mb = $settings['columns_mob'];
        $columns_mb2 = $settings['columns_mob2'];

		$has_carousel = 'no-carousel';
		if ( $settings['carousel'] == 'yes' ) {
			$has_carousel = 'has-carousel';
		}

		$this->add_render_attribute( 'tf_product_category', ['id' => "tf-product-category-{$this->get_id()}", 'class' => ['tf-product-category', $settings['style'], $columns,$columns_tb,$columns_mb,$columns_mb2, $has_carousel], 'data-tabid' => $this->get_id() ] );

		 ?>

			<div <?php echo $this->get_render_attribute_string('tf_product_category'); ?> data-loop="<?php echo esc_attr($settings['carousel_loop']); ?>" data-auto="<?php echo esc_attr($settings['carousel_auto']); ?>" data-column="<?php echo esc_attr($settings['carousel_column_desk']); ?>" data-column2="<?php echo esc_attr($settings['carousel_column_tablet']); ?>" data-column3="<?php echo esc_attr($settings['carousel_column_mobile']); ?>" data-spacer="<?php echo esc_attr($settings['carousel_spacer']); ?>" data-prev_icon="fas fa-chevron-left" data-next_icon="fas fa-chevron-right" data-arrow="<?php echo esc_attr($settings['carousel_arrow']) ?>" data-bullets="<?php echo esc_attr($settings['carousel_bullets']) ?>">
					<?php if ( $settings['carousel'] == 'yes' ): ?>
						<div class="owl-carousel">
					<?php endif; 
							
							foreach ( $product_categories as $category ) {
								?>
								<div class="product-category">
									<div class="inner">
										<a class= "featured-img" href="<?php echo get_category_link($category); ?>">
											<div class="category-thumbnail">												
												<?php woocommerce_subcategory_thumbnail( $category ); ?>												
											</div>
										</a>
										<h2 class="woocommerce-loop-category__title">
											<a href="<?php echo get_category_link($category); ?>"><?php echo $category->name; ?></a>
										</h2>
									  
									</div>
								</div>          
								<?php
							}     

							?>
					<?php if ( $settings['carousel'] == 'yes' ): ?>
						</div>
					<?php endif; 
				
	}

}