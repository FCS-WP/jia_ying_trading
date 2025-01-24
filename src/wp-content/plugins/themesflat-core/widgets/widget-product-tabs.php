<?php
class TFProductTabs_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tftabs';
    }
    
    public function get_title() {
        return esc_html__( 'TF Product Tabs', 'themesflat-core' );
    }

    public function get_icon() {
        return 'eicon-tabs';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
		return ['tf-tabs','tf-products','tf-product'];
	}

    public function get_script_depends() {
		return [ 'owl-carousel','tf-tabs','countdown','tf-posts' ];
	}

	protected function register_controls() {
        // Start Tab Setting        
			$this->start_controls_section( 'section_tabs',
	            [
	                'label' => esc_html__('Tabs', 'themesflat-core'),
	            ]
	        );	    
	        $repeater = new \Elementor\Repeater();
	        $repeater->add_control( 'set_active',
				[
					'label' => esc_html__( 'Set Active Tab', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Yes', 'themesflat-core' ),
					'label_off' => esc_html__( 'No', 'themesflat-core' ),
					'return_value' => 'set-active-tab',
					'default' => 'inactive',
				]
			);

	       	
			$repeater->add_control( 'list_title', [
				'label' => esc_html__( 'Title text', 'themesflat-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Recent Product' , 'themesflat-core' ),
				'label_block' => true,
			]
			);

			$repeater->add_control(
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

			$repeater->add_control( 
				'style',
				[
					'label' => esc_html__( 'Layout Style', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'style1',
					'options' => [
						'style1' => esc_html__( 'Style 1', 'themesflat-core' ),
						'style2' => esc_html__( 'Style 2', 'themesflat-core' ),
						// 'style3' => esc_html__( 'Style 3', 'themesflat-core' ),
						// 'style4' => esc_html__( 'Style 4', 'themesflat-core' ),
						// 'style5' => esc_html__( 'Style 5', 'themesflat-core' ),
						// 'style6' => esc_html__( 'Style 6', 'themesflat-core' ),
						// 'style7' => esc_html__( 'Style 7', 'themesflat-core' ),
						// 'style8' => esc_html__( 'Style 8', 'themesflat-core' ),
						// 'style9' => esc_html__( 'Style 9', 'themesflat-core' ),
					],
				]
			);
		

			$this->add_control( 'tab_list',
					[					
						'type' => \Elementor\Controls_Manager::REPEATER,
						'fields' => $repeater->get_controls(),
						'default' => [
							[
								'list_title' => esc_html__( 'Recent Product', 'themesflat-core' ),
							],
					
						],
						'title_field' => '{{{ list_title }}}',
					]
				);
				
				
			$this->end_controls_section();
        // /.End Tab Setting 

	// Start Layout        
		$this->start_controls_section( 
			'section_posts_layout',
			[
				'label' => esc_html__('Layout', 'themesflat-core'),
			]
		);	
		
		$this->add_control( 
			'posts_per_page',
			[
				'label' => esc_html__( 'Posts Per Page', 'themesflat-core' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => '3',
			]
		);

		$this->add_control(
			'posts_layout',
			[
				'label' => esc_html__( 'Columns', 'themesflat-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'column-3',
				'options' => [
					'column-1' => esc_html__( '1', 'themesflat-core' ),
					'column-2' => esc_html__( '2', 'themesflat-core' ),
					'column-3' => esc_html__( '3', 'themesflat-core' ),
					'column-4' => esc_html__( '4', 'themesflat-core' ),
					'column-5' => esc_html__( '5', 'themesflat-core' ),
					'column-6' => esc_html__( '6', 'themesflat-core' ),
					'column-7' => esc_html__( '7', 'themesflat-core' ),
				],
			]
		);

		$this->add_control( 
			'posts_layout_tablet',
			[
				'label' => esc_html__( 'Columns Tablet', 'themesflat-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'tablet-column-1',
				'options' => [
					'tablet-column-1' => esc_html__( '1', 'themesflat-core' ),
					'tablet-column-2' => esc_html__( '2', 'themesflat-core' ),
					'tablet-column-3' => esc_html__( '3', 'themesflat-core' ),
				],
			]
		);

		$this->add_control( 
			'posts_layout_mobile',
			[
				'label' => esc_html__( 'Columns Mobile', 'themesflat-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'mobile-column-1',
				'options' => [
					'mobile-column-1' => esc_html__( '1', 'themesflat-core' ),
					'mobile-column-2' => esc_html__( '2', 'themesflat-core' ),
				],
			]
		);

		$this->add_group_control( 
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail',
				'default' => 'image-540',
			]
		);

		$this->add_control( 
			'show_image',
			[
				'label' => esc_html__( 'Show Image', 'themesflat-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'themesflat-core' ),
				'label_off' => esc_html__( 'Hide', 'themesflat-core' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control( 
			'show_sale',
			[
				'label' => esc_html__( 'Show Sale (Only when product sale)', 'themesflat-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'themesflat-core' ),
				'label_off' => esc_html__( 'Hide', 'themesflat-core' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control( 
			'show_group_btn',
			[
				'label' => esc_html__( 'Show Group Button', 'themesflat-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'themesflat-core' ),
				'label_off' => esc_html__( 'Hide', 'themesflat-core' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control( 
			'show_thum',
			[
				'label' => esc_html__( 'Show Thumb Image', 'themesflat-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'themesflat-core' ),
				'label_off' => esc_html__( 'Hide', 'themesflat-core' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control( 
			'show_meta',
			[
				'label' => esc_html__( 'Show Category', 'themesflat-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'themesflat-core' ),
				'label_off' => esc_html__( 'Hide', 'themesflat-core' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);  

		$this->add_control( 
			'show_title',
			[
				'label' => esc_html__( 'Show Title', 'themesflat-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'themesflat-core' ),
				'label_off' => esc_html__( 'Hide', 'themesflat-core' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);			

		$this->add_control( 
			'show_price',
			[
				'label' => esc_html__( 'Show Price', 'themesflat-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'themesflat-core' ),
				'label_off' => esc_html__( 'Hide', 'themesflat-core' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control( 
			'show_save_price',
			[
				'label' => esc_html__( 'Show Save Price', 'themesflat-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'themesflat-core' ),
				'label_off' => esc_html__( 'Hide', 'themesflat-core' ),
				'return_value' => 'yes',
				'default' => 'no',
				'condition' => [
					'style' => 'style1',
				],
			]
		);

		$this->add_control( 
			'show_coutdown',
			[
				'label' => esc_html__( 'Show Coutdown (Only when product sale time)', 'themesflat-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'themesflat-core' ),
				'label_off' => esc_html__( 'Hide', 'themesflat-core' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control( 
			'show_skillbar',
			[
				'label' => esc_html__( 'Show Skillbar (Only when product on sold)', 'themesflat-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'themesflat-core' ),
				'label_off' => esc_html__( 'Hide', 'themesflat-core' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control( 
			'show_information',
			[
				'label' => esc_html__( 'Show Information', 'themesflat-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'themesflat-core' ),
				'label_off' => esc_html__( 'Hide', 'themesflat-core' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control( 
			'show_delivery',
			[
				'label' => esc_html__( 'Show Delivery', 'themesflat-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'themesflat-core' ),
				'label_off' => esc_html__( 'Hide', 'themesflat-core' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control( 
			'show_add_to_cart',
			[
				'label' => esc_html__( 'Show Add To Cart', 'themesflat-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'themesflat-core' ),
				'label_off' => esc_html__( 'Hide', 'themesflat-core' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->end_controls_section();




	    // Start Style Tab Nav
	        $this->start_controls_section( 'section_style_title1',
	            [
	                'label' => esc_html__( 'Tab Nav', 'themesflat-core' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );

	        $this->add_control( 'heading_wrap_nav',
				[
					'label' => esc_html__( 'Wrap Nav', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
				]
			);

			$this->add_responsive_control( 'nav_align',
				[
					'label' => esc_html__( 'Alignment', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'default' => 'nav-justify',
					'toggle' => false,
					'options' => [
						'nav-left'    => [
							'title' => esc_html__( 'Left', 'themesflat-core' ),
							'icon' => 'eicon-text-align-left',
						],
						'nav-center' => [
							'title' => esc_html__( 'Center', 'themesflat-core' ),
							'icon' => 'eicon-text-align-center',
						],
						'nav-right' => [
							'title' => esc_html__( 'Right', 'themesflat-core' ),
							'icon' => 'eicon-text-align-right',
						],
						'nav-justify' => [
							'title' => esc_html__( 'Justified', 'themesflat-core' ),
							'icon' => 'eicon-text-align-justify',
						],
					],
					'condition' => [
                        'tab_type' => 'horizontal',
                    ],
				]
			);									

			$this->add_responsive_control( 'wrap_nav_padding',
	            [
	                'label' => esc_html__( 'Padding', 'themesflat-core' ),
	                'type' => \Elementor\Controls_Manager::DIMENSIONS,
	                'size_units' => ['px', 'em', '%'],
	                'selectors' => [
	                    '{{WRAPPER}} .tf-tabs  .tf-tabnav ul' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );	

	        $this->add_responsive_control( 'wrap_nav_margin',
	            [
	                'label' => esc_html__( 'Margin', 'themesflat-core' ),
	                'type' => \Elementor\Controls_Manager::DIMENSIONS,
	                'size_units' => ['px', 'em', '%'],
	                'selectors' => [
	                    '{{WRAPPER}} .tf-tabs  .tf-tabnav' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

	        $this->add_control( 'wrap_nav_background',
				[
					'label' => esc_html__( 'Background Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tf-tabs .tf-tabnav ul' => 'background-color: {{VALUE}}',
					],
				]
			);        

	        $this->add_control( 'heading_nav',
				[
					'label' => esc_html__( 'Item Nav', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);				

	        $this->add_group_control( \Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'title_typography',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-tabs .tf-tabnav ul > li .tab-title-text',
				]
			);

			$this->add_responsive_control( 'title_padding',
	            [
	                'label' => esc_html__( 'Padding', 'themesflat-core' ),
	                'type' => \Elementor\Controls_Manager::DIMENSIONS,
	                'size_units' => ['px', 'em', '%'],
	                'selectors' => [
	                    '{{WRAPPER}} .tf-tabs .tf-tabnav ul > li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );			

	        $this->add_responsive_control( 'title_margin1',
	            [
	                'label' => esc_html__( 'Margin', 'themesflat-core' ),
	                'type' => \Elementor\Controls_Manager::DIMENSIONS,
	                'size_units' => ['px', 'em', '%'],
	                'selectors' => [
	                    '{{WRAPPER}} .tf-tabs .tf-tabnav ul > li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],	                
	            ]
	        );

	        // $this->add_control( 'title_hover_animation',
			// 	[
			// 		'label' => esc_html__( 'Hover Animation', 'themesflat-core' ),
			// 		'type' => \Elementor\Controls_Manager::HOVER_ANIMATION,	
			// 	]
			// );

	        $this->start_controls_tabs( 'title_style_tabs' );
	        	$this->start_controls_tab( 'title_style_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'themesflat-core' ),
					]
					);	        		
			        $this->add_control( 'title_color1',
						[
							'label' => esc_html__( 'Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .tf-tabs .tf-tabnav ul > li .tab-title-text' => 'color: {{VALUE}}',
							],
						]
					);

					$this->add_control( 'title_background_color',
						[
							'label' => esc_html__( 'Background Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .tf-tabs .tf-tabnav ul > li' => 'background-color: {{VALUE}}',
							],
						]
					);
					$this->add_group_control( \Elementor\Group_Control_Border::get_type(),
			            [
			                'name' => 'title_border',
			                'label' => esc_html__( 'Border', 'themesflat-core' ),
			                'selector' => '{{WRAPPER}} .tf-tabs .tf-tabnav ul > li',
			            ]
			        );
			        $this->add_responsive_control( 'title_border_radius',
			            [
			                'label' => esc_html__('Border Radius', 'themesflat-core'),
			                'type' => \Elementor\Controls_Manager::DIMENSIONS,
			                'size_units' => ['px', 'em', '%'],
			                'selectors' => [
			                    '{{WRAPPER}} .tf-tabs .tf-tabnav ul > li' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			                ],
			            ]
			        );
			        $this->add_group_control( \Elementor\Group_Control_Box_Shadow::get_type(),
			            [
			                'name' => 'title_shadow',	                
			                'label' => esc_html__( 'Box Shadow', 'themesflat-core' ),
			                'selector' => '{{WRAPPER}} .tf-tabs .tf-tabnav ul > li',
			            ]
			        );
			        // $this->add_control( 'heading_icon_normal',
					// 	[
					// 		'label' => esc_html__( 'Icon', 'themesflat-core' ),
					// 		'type' => \Elementor\Controls_Manager::HEADING,
					// 	]
					// );
					// $this->add_control( 'icon_color',
					// 	[
					// 		'label' => esc_html__( 'Color', 'themesflat-core' ),
					// 		'type' => \Elementor\Controls_Manager::COLOR,
					// 		'selectors' => [
					// 			'{{WRAPPER}} .tf-tabs .tf-tabnav ul > li i' => 'color: {{VALUE}}',
					// 			'{{WRAPPER}} .tf-tabs .tf-tabnav ul > li svg' => 'fill: {{VALUE}};',
					// 		],
					// 	]
					// );

				$this->end_controls_tab();
				$this->start_controls_tab( 'title_style_hover_tab',
					[
						'label' => esc_html__( 'Hover & Active', 'themesflat-core' ),
					]
					);
					$this->add_control( 'title_color_hover1',
						[
							'label' => esc_html__( 'Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .tf-tabs .tf-tabnav ul > li:hover .tab-title-text' => 'color: {{VALUE}};',
								'{{WRAPPER}} .tf-tabs .tf-tabnav ul > li.active .tab-title-text' => 'color: {{VALUE}};',
							],
						]
					);

					$this->add_group_control(
						\Elementor\Group_Control_Background::get_type(),
						[
							'name' => 'title_background_color_hover',
							'label' => esc_html__( 'Background Title', 'themesflat-core' ),
							'types' => [ 'gradient' ],
							'selector' => '{{WRAPPER}} .tf-tabs .tf-tabnav ul > li::after, {{WRAPPER}} .tf-tabs .tf-tabnav ul > li.active
							, {{WRAPPER}} .tf-tabs .tf-tabnav ul > li.set-active-tab',
						]
					);

					$this->add_group_control( \Elementor\Group_Control_Border::get_type(),
			            [
			                'name' => 'title_border_hover',
			                'label' => esc_html__( 'Border', 'themesflat-core' ),
			                'selector' => '{{WRAPPER}} .tf-tabs .tf-tabnav ul > li:hover',
			            ]
			        );
			        $this->add_responsive_control( 'title_border_radius_hover',
			            [
			                'label' => esc_html__('Border Radius', 'themesflat-core'),
			                'type' => \Elementor\Controls_Manager::DIMENSIONS,
			                'size_units' => ['px', 'em', '%'],
			                'selectors' => [
			                    '{{WRAPPER}} .tf-tabs .tf-tabnav ul > li:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			                ],
			            ]
			        );
			        $this->add_group_control( \Elementor\Group_Control_Box_Shadow::get_type(),
			            [
			                'name' => 'title_shadow_hover',	                
			                'label' => esc_html__( 'Box Shadow', 'themesflat-core' ),
			                'selector' => '{{WRAPPER}} .tf-tabs .tf-tabnav ul > li:hover',
			            ]
			        );
			        // $this->add_control( 'heading_icon_hover',
					// 	[
					// 		'label' => esc_html__( 'Icon', 'themesflat-core' ),
					// 		'type' => \Elementor\Controls_Manager::HEADING,
					// 	]
					// );
					// $this->add_control( 'icon_color_hover',
					// 	[
					// 		'label' => esc_html__( 'Color', 'themesflat-core' ),
					// 		'type' => \Elementor\Controls_Manager::COLOR,
					// 		'selectors' => [
					// 			'{{WRAPPER}} .tf-tabs .tf-tabnav ul > li:hover i' => 'color: {{VALUE}};',
					// 			'{{WRAPPER}} .tf-tabs .tf-tabnav ul > li:hover svg' => 'fill: {{VALUE}};',
					// 		],
					// 	]
					// );
				$this->end_controls_tab();

			$this->end_controls_tabs();
	        
	        $this->end_controls_section();    
	    // /.End Style Tab Nav 

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
						'{{WRAPPER}} .tf-products .item .inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .tf-products' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_group_control( 
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'box_shadow',
					'label' => esc_html__( 'Box Shadow', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-products .item .inner',
				]
			);
			
			$this->add_group_control( 
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'border',
					'label' => esc_html__( 'Border', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-products .item .inner',
				]
			);
			$this->add_responsive_control( 
				'border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px' , '%' ],
					'selectors' => [
						'{{WRAPPER}} .tf-products .item .inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			
			$this->add_control(
				'image_size',
				[
					'label' => esc_html__( 'Size', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
							'step' => 1,
						],
					],
					
					'selectors' => [
						'{{WRAPPER}} .tf-products .item .inner .left' => 'max-width: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .tf-products .item .image img' => 'width: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .tf-products .item .content ' => 'width: calc(100% - 14px - {{SIZE}}px);',
					],
					'condition' => [
						'style' => ['style2'],
					],
				]
			);
	
			$this->add_responsive_control( 
				'padding_image',
				[
					'label' => esc_html__( 'Padding', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px' ],
					'selectors' => [
						'{{WRAPPER}} .tf-products .item .image' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .tf-products .item .image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);  
	
			$this->add_group_control( 
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'box_shadow_image',
					'label' => esc_html__( 'Box Shadow', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-products .item .image',
				]
			); 
	
			$this->add_group_control( 
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'border_image',
					'label' => esc_html__( 'Border', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-products .item .image',
				]
			); 
	
			$this->add_responsive_control( 
				'border_radius_image',
				[
					'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px' , '%' ],
					'selectors' => [
						'{{WRAPPER}} .tf-products .item .image, {{WRAPPER}} .tf-products .item .image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			); 
				
			$this->end_controls_section();    
		// /.End Image Style
	
		// Start Sale Style 
			$this->start_controls_section( 
				'section_style_sale',
				[
					'label' => esc_html__( 'Sale', 'themesflat-core' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
					'condition' => [
						'show_sale'	=> 'yes',
					],
				]
			);	        
			$this->add_responsive_control( 
				'sale_width',
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
						'{{WRAPPER}} .tf-products .item .label-sale ' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			); 	  

			$this->add_responsive_control( 
				'sale_height',
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
						'{{WRAPPER}} .tf-products .item .label-sale ' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			); 	  

			$this->add_control( 
				'sale_color',
				[
					'label' => esc_html__( 'Color ', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}}  .tf-products .item .label-sale .text' => 'color: {{VALUE}}',
						'{{WRAPPER}}  .tf-products .item .label-sale .percent-sale' => 'color: {{VALUE}}',
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
						'{{WRAPPER}}  .tf-products .item .label-sale' => 'background: {{VALUE}}',
					],
				]
			);

			$this->add_group_control( 
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'sale_s1_typography',
					'label' => esc_html__( 'Typography Text', 'themesflat-core' ),	
					'selector' => '{{WRAPPER}} .tf-products .item .label-sale .text',
				]
			);

			$this->add_group_control( 
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'sale_s2_typography',
					'label' => esc_html__( 'Typography %', 'themesflat-core' ),	
					'selector' => '{{WRAPPER}} .tf-products .item .label-sale .percent-sale',
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
						'{{WRAPPER}}  .tf-products .item .wrap-btn-action .tf-btn-quickview svg path' => 'fill: {{VALUE}}',
						'{{WRAPPER}}  .tf-products .item .wrap-btn-action .yith-wcwl-add-to-wishlist svg path' => 'fill: {{VALUE}}',
						'{{WRAPPER}}  .tf-products .item .wrap-btn-action .compare-button svg path' => 'fill: {{VALUE}}',
						'{{WRAPPER}}  .tf-products .item .wrap-btn-action .yith-wcwl-add-to-wishlist i' => 'color: {{VALUE}}',
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
						'{{WRAPPER}}  .tf-products .item .wrap-btn-action .tf-btn-quickview' => 'background: {{VALUE}}',
						'{{WRAPPER}}  .tf-products .item .wrap-btn-action .yith-wcwl-add-to-wishlist' => 'background: {{VALUE}}',
						'{{WRAPPER}}  .tf-products .item .wrap-btn-action .compare-button' => 'background: {{VALUE}}',
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
						'{{WRAPPER}}  .tf-products .item .wrap-btn-action .tf-btn-quickview:hover svg path' => 'fill: {{VALUE}}',
						'{{WRAPPER}}  .tf-products .item .wrap-btn-action .yith-wcwl-add-to-wishlist:hover svg path' => 'fill: {{VALUE}}',
						'{{WRAPPER}}  .tf-products .item .wrap-btn-action .compare-button:hover svg path' => 'fill: {{VALUE}}',
						'{{WRAPPER}}  .tf-products .item .wrap-btn-action .yith-wcwl-add-to-wishlist:hover i' => 'color: {{VALUE}}',
						
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
						'{{WRAPPER}}  .tf-products .item .wrap-btn-action .tf-btn-quickview:hover' => 'background: {{VALUE}}',
						'{{WRAPPER}}  .tf-products .item .wrap-btn-action .yith-wcwl-add-to-wishlist:hover' => 'background: {{VALUE}}',
						'{{WRAPPER}}  .tf-products .item .wrap-btn-action .yith-wcwl-add-to-wishlist .add_to_wishlist:hover ' => 'background: {{VALUE}}',
						'{{WRAPPER}}  .tf-products .item .wrap-btn-action .compare-button:hover' => 'background: {{VALUE}}',
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
						'{{WRAPPER}} .tf-products .item .product-option li' => 'width: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .tf-products .item .product-option li' => 'height: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .tf-products .item .product-option li' => 'margin-right: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .tf-products .item .product-option li' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .tf-products .item .product-option' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);  
			$this->add_group_control( 
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'border_thum',
					'label' => esc_html__( 'Border', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-products .item .product-option li',
				]
			); 
	
			$this->add_responsive_control( 
				'border_radius_thum',
				[
					'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px' , '%' ],
					'selectors' => [
						'{{WRAPPER}} .tf-products .item .product-option li, {{WRAPPER}} .tf-products .item .product-option li img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'selector' => '{{WRAPPER}} .tf-products .product-cats a',
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
						'{{WRAPPER}}  .tf-products .item .product-cats a' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .tf-products .item .product-cats a:hover' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .tf-products .item .name a' => 'color: {{VALUE}}',
					],
				]
			);
	
			$this->add_control( 
				'title_color_hover',
				[
					'label' => esc_html__( 'Color Hover', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-products .item .name a:hover' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_group_control( 
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'title_s1_typography',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					
					'selector' => '{{WRAPPER}} .tf-products .item .name a',
				]
			);
	
			$this->add_responsive_control( 
				'title_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-products .item .name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .tf-products .item .price' => 'color: {{VALUE}}',
						'{{WRAPPER}} .tf-products .item .price ins' => 'color: {{VALUE}}',
	
					],
				]
			);
			$this->add_control( 
				'text_color_sale',
				[
					'label' => esc_html__( 'Color Sale', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-products .item .price del' => 'color: {{VALUE}}',
	
					],
				]
			);
			$this->add_group_control( 
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'text_typography',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-products .item .price',
	
				]
			);
			$this->add_group_control( 
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'text_typography_ins',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selector' => 
						'{{WRAPPER}} .tf-products .item .price ins',
				]
			);
			$this->add_group_control( 
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'text_typography_sale',
					'label' => esc_html__( 'Typography Sale', 'themesflat-core' ),
					'selector' => 
						'{{WRAPPER}} .tf-products .item .price del',
				]
			);
			$this->add_responsive_control( 
				'text_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-products .item .price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .tf-products .item .tf-countdown .countdown-inner .time ' => 'width: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .tf-products .item .tf-countdown .countdown-inner .time ' => 'height: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .tf-products .item .tf-countdown .countdown-inner > div:not(:last-child) ' => 'padding-right: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .tf-products .item .tf-countdown .countdown-inner > div:not(:last-child) ' => 'margin-right: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .tf-products .item .tf-countdown' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
	
			$this->add_control( 
				'bg_color3',
				[
					'label' => esc_html__( 'Background Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-products .item .tf-countdown .countdown-inner .time' => 'background: {{VALUE}}',
					],
				]
			);
	
			$this->add_control( 
				'color_time',
				[
					'label' => esc_html__( 'Color Time', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-products .item .tf-countdown .countdown-inner .time' => 'color: {{VALUE}}',
					],
				]
			);
	
			$this->add_control( 
				'color_text_time',
				[
					'label' => esc_html__( 'Color Text Time', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-products .item .tf-countdown .countdown-inner .text' => 'color: {{VALUE}}',
					],
				]
			);
	
			$this->add_control( 
				'color_text_time_icon',
				[
					'label' => esc_html__( 'Color Time :', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-products .item .tf-countdown .countdown-inner > div::after' => 'color: {{VALUE}}',
					],
				]
			);
	
			$this->add_group_control( 
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'text_typography2',
					'label' => esc_html__( 'Typography Time', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-products .item .tf-countdown .countdown-inner .time',
				]
			);
	
			$this->add_group_control( 
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'text_typography3',
					'label' => esc_html__( 'Typography Text Time', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-products .item .tf-countdown .countdown-inner .text',
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
						'{{WRAPPER}} .tf-products .item .special-progress .progress' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			); 	  
	
			$this->add_control( 
				'bg_color1',
				[
					'label' => esc_html__( 'Background Progessbar Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-products .item .special-progress .progress' => 'background: {{VALUE}}',
					],
				]
			);
	
			$this->add_control( 
				'bg_color2',
				[
					'label' => esc_html__( 'Width Progessbar Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-products .item .special-progress .progress .progress-bar' => 'background: {{VALUE}}',
					],
				]
			);
	
			$this->add_control( 
				'text_color1',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-products .item .special-progress .infor-sold' => 'color: {{VALUE}}',
					],
				]
			);
	
			$this->add_group_control( 
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'text_typography1',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-products .item .special-progress .infor-sold',
				]
			);
			
			$this->add_responsive_control( 
				'text_margin1',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-products .item .special-progress' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .tf-products .item .product-footer .table .row-tb span' => 'color: {{VALUE}}',
					],
				]
			);
	
			$this->add_group_control( 
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'info_typography1',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-products .item .product-footer .table .row-tb span',
				]
			);
			
			$this->add_responsive_control( 
				'info_margin1',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-products .item .product-footer .table ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .tf-products .item .time-delivery .text' => 'color: {{VALUE}}',
						'{{WRAPPER}} .tf-products .item .time-delivery svg path' => 'fill: {{VALUE}}',
						'{{WRAPPER}} .tf-products .item .time-delivery svg path' => 'stroke: {{VALUE}}',
					],
				]
			);
	
			$this->add_group_control( 
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'deli_typography1',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-products .item .time-delivery .text',
				]
			);
			
			$this->add_responsive_control( 
				'deli_margin1',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-products .item .time-delivery' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .tf-products .item .time-delivery' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
	
			$this->add_group_control( 
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'border_deli',
					'label' => esc_html__( 'Border', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-products .item .time-delivery',
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
						'{{WRAPPER}} .tf-products .item .btn-add-to-cart' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_group_control( 
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'button_s1_typography',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
	
					'selector' => '{{WRAPPER}} .tf-products .item .btn-add-to-cart .add_to_cart',
				]
			);
			$this->add_control( 
				'button_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tf-products .item .btn-add-to-cart .add_to_cart' => 'color: {{VALUE}}',
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
						'{{WRAPPER}}  .tf-products .item .btn-add-to-cart .add_to_cart' => 'background: {{VALUE}}',
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
						'{{WRAPPER}} .tf-products .item .btn-add-to-cart .add_to_cart:hover' => 'color: {{VALUE}}',
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
						'{{WRAPPER}}  .tf-products .item .btn-add-to-cart .add_to_cart:hover' => 'background: {{VALUE}}',
					],
				]
			); 
	
			$this->end_controls_section();
		// /.End Button Style

	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();
		$has_carousel = 'no-carousel';
		// $settings['carousel'] == 'no';
		// if ( $settings['carousel'] == 'yes' ) {
		// 	$has_carousel = 'has-carousel';
		// }
		$show_image = 'no';
		$settings['show_image'] == 'no';
		if ( $settings['show_image'] == 'yes' ) {
			$show_image = 'yes';
		}

		$show_sale = 'no';
		$settings['show_sale'] == 'no';
		if ( $settings['show_sale'] == 'yes' ) {
			$show_sale = 'yes';
		}

		$show_group_btn = 'no';
		$settings['show_group_btn'] == 'no';
		if ( $settings['show_group_btn'] == 'yes' ) {
			$show_group_btn = 'yes';
		}

		$show_thum = 'no';
		$settings['show_thum'] == 'no';
		if ( $settings['show_thum'] == 'yes' ) {
			$show_thum = 'yes';
		}

		$show_meta = 'no';
		$settings['show_meta'] == 'no';
		if ( $settings['show_meta'] == 'yes' ) {
			$show_meta = 'yes';
		}

		$show_title = 'no';
		$settings['show_title'] == 'no';
		if ( $settings['show_title'] == 'yes' ) {
			$show_title = 'yes';
		}

		$show_price = 'no';
		$settings['show_price'] == 'no';
		if ( $settings['show_price'] == 'yes' ) {
			$show_price = 'yes';
		}

		$show_save_price = 'no';
		$settings['show_save_price'] == 'no';
		if ( $settings['show_save_price'] == 'yes' ) {
			$show_save_price = 'yes';
		}

		$show_coutdown = 'no';
		$settings['show_coutdown'] == 'no';
		if ( $settings['show_coutdown'] == 'yes' ) {
			$show_coutdown = 'yes';
		}

		$show_skillbar = 'no';
		$settings['show_skillbar'] == 'no';
		if ( $settings['show_skillbar'] == 'yes' ) {
			$show_skillbar = 'yes';
		}

		$show_information = 'no';
		$settings['show_information'] == 'no';
		if ( $settings['show_information'] == 'yes' ) {
			$show_information = 'yes';
		}

		$show_delivery = 'no';
		$settings['show_delivery'] == 'no';
		if ( $settings['show_delivery'] == 'yes' ) {
			$show_delivery = 'yes';
		}

		$show_add_to_cart = 'no';
		$settings['show_add_to_cart'] == 'no';
		if ( $settings['show_add_to_cart'] == 'yes' ) {
			$show_add_to_cart = 'yes';
		}
		// $settings['show_image'] == 'no';
		// $settings['show_sale'] == 'no';
		// $settings['show_group_btn'] == 'no';
		// $settings['show_thum'] == 'no';
		// $settings['show_meta'] == 'no';
		// $settings['show_title'] == 'no';
		// $settings['show_price'] == 'no';
		// $settings['show_save_price'] == 'no';
		// $settings['show_coutdown'] == 'no';
		// $settings['show_skillbar'] == 'no';
		// $settings['show_information'] == 'no';
		// $settings['show_delivery'] == 'no';
		// $settings['show_add_to_cart'] == 'no';
		
		
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

		

		$this->add_render_attribute( 'tf_tabs_wrapper', ['id' => "tf-tabs-{$this->get_id()}", 'class' => ['tf-tabs ', 'data-tabid' => $this->get_id()]] );

		$this->add_render_attribute( 'tf_product_wrapper', ['id' => "tf-products-{$this->get_id()}", 'class' => ['tf-products', 'data-tabid' => $this->get_id(), $settings['posts_layout'], $settings['posts_layout_tablet'], $settings['posts_layout_mobile'] , $has_carousel]] );

		$count_li = 0;
		$count_content = 0;		
		?>
		<div <?php echo $this->get_render_attribute_string('tf_tabs_wrapper'); ?>>
			<div class="tf-tabnav">
				<ul>
				<?php foreach ($settings['tab_list'] as $tab): $count_li ++;?>
					<li class="tab-filter-2 tablinks <?php echo esc_attr($tab['set_active']); ?>  ?>" data-tab="tab-<?php echo esc_attr($count_li); ?>" data-post='<?php echo $settings['posts_per_page'] ?>' data-filter='<?php echo $tab['filter_by'] ?>' data-image='<?php echo $show_image; ?>' data-sale='<?php echo $show_sale; ?>' data-group-btn='<?php echo $show_group_btn; ?>' data-thum='<?php echo $show_thum; ?>' data-meta='<?php echo $show_meta; ?>' data-title='<?php echo $show_title; ?>' data-price='<?php echo $show_price; ?>' data-save-price='<?php echo $show_save_price; ?>' data-coutdown='<?php echo $show_coutdown; ?>' data-skillbar='<?php echo $show_skillbar; ?>' data-information='<?php echo $show_information; ?>' data-delivery='<?php echo $show_delivery; ?>' data-add-to-cart='<?php echo $show_add_to_cart; ?>'>						
						<?php if ( $tab['list_title'] != '' ) : ?>
							<span class="tab-title-text"><?php echo esc_attr($tab['list_title']); ?></span>
						<?php endif; ?>
					</li>
				<?php endforeach;?>
				</ul>
			</div>
			
			<div class="tf-tabcontent">
				<?php //foreach ($settings['tab_list'] as $tab): $count_content ++;?>
					<!-- <div id="tab-<?php //echo esc_attr($count_content); ?>" class="tf-tabcontent-inner <?php //echo esc_attr($tab['set_active']); ?> "> -->
					<?php
					foreach ($settings['tab_list'] as $tab): {
						$filter = $tab['filter_by'];
						break;
					} endforeach;
					global $woocommerce;
					$number = $settings['posts_per_page'] + 1;
					switch(  $filter ){
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
			
					
					$query = new WP_Query( $query_args );
						if ( $query->have_posts() ) : ?>
							<div id="product-tab-content-filter-2" <?php echo $this->get_render_attribute_string('tf_product_wrapper'); ?> >
								<?php //if ( $settings['carousel'] == 'yes' ): ?>
									<!-- <div class="owl-carousel"> -->
								<?php //endif; ?>
									<?php while ( $query->have_posts() ) : $query->the_post();						
										$attr['settings'] = $settings; 
										tf_get_template_widget("product/{$tab['style']}", $attr);
										?>					
									<?php endwhile; ?>
								<?php //if ( $settings['carousel'] == 'yes' ): ?>
									<!-- </div> -->
								<?php //endif; ?>
								
								<?php wp_reset_postdata(); ?>
							</div>
						<?php
						else:
							esc_html_e('No posts found', 'themesflat-core');
						endif;		
						?>
					<!-- </div> -->
				<?php //endforeach;?>
			</div>
		</div>
		
		<?php
		
	}

}