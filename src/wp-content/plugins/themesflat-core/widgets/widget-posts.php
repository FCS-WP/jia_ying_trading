<?php
class TFPosts_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-posts';
    }
    
    public function get_title() {
        return esc_html__( 'TF Posts', 'themesflat-core' );
    }

    public function get_icon() {
        return 'eicon-posts-grid';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
		return ['owl-carousel','tf-posts'];
	}

	public function get_script_depends() {
		return ['owl-carousel','tf-posts'];
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
				'posts_per_page',
	            [
	                'label' => esc_html__( 'Posts Per Page', 'themesflat-core' ),
	                'type' => \Elementor\Controls_Manager::NUMBER,
	                'default' => '3',
	            ]
	        );

	        $this->add_control( 
	        	'order_by',
				[
					'label' => esc_html__( 'Order By', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'date',
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
					'label' => esc_html__( 'Order', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'desc',
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
					'options' => ThemesFlat_Addon_For_Elementor_core::tf_get_taxonomies(),
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

		// Start Layout        
			$this->start_controls_section( 
				'section_posts_layout',
	            [
	                'label' => esc_html__('Layout', 'themesflat-core'),
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
						// 'style2' => esc_html__( 'Style 2', 'themesflat-core' ),
						// 'style3' => esc_html__( 'Style 3', 'themesflat-core' ),
						// 'style4' => esc_html__( 'Style 4', 'themesflat-core' ),
						// 'style5' => esc_html__( 'Style 5', 'themesflat-core' ),
					],
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

			$this->add_control(
				'layout_align',
				[
					'label' => esc_html__( 'Alignment', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'left'    => [
							'title' => esc_html__( 'Left', 'themesflat-core' ),
							'icon' => 'eicon-text-align-left',
						],
						'center' => [
							'title' => esc_html__( 'Center', 'themesflat-core' ),
							'icon' => 'eicon-text-align-center',
						],
						'right' => [
							'title' => esc_html__( 'Right', 'themesflat-core' ),
							'icon' => 'eicon-text-align-right',
						],
						'justify' => [
							'title' => esc_html__( 'Justified', 'themesflat-core' ),
							'icon' => 'eicon-text-align-justify',
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tf-posts' => 'text-align: {{VALUE}}',
					],
				]
			);

			$this->add_control( 
				'heading_image',
				[
					'label' => esc_html__( 'Image', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_group_control( 
				\Elementor\Group_Control_Image_Size::get_type(),
				[
					'name' => 'thumbnail',
					'default' => 'full',
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
				'heading_content',
				[
					'label' => esc_html__( 'Content', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
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
				'show_excerpt',
				[
					'label' => esc_html__( 'Show Excerpt', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themesflat-core' ),
					'label_off' => esc_html__( 'Hide', 'themesflat-core' ),
					'return_value' => 'yes',
					'default' => 'yes',
					'condition' => [
						'style' => ['style1','style2']
					],
				]
			);

			$this->add_control( 
				'show_excerpt_2',
				[
					'label' => esc_html__( 'Show Excerpt', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themesflat-core' ),
					'label_off' => esc_html__( 'Hide', 'themesflat-core' ),
					'return_value' => 'yes',
					'default' => 'no',
					'condition' => [
						'style' => ['style3']
					],
				]
			);

			$this->add_control( 
				'excerpt_lenght',
				[
					'label' => esc_html__( 'Excerpt Length', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::NUMBER,
					'min' => 0,
					'max' => 500,
					'step' => 1,
					'default' => 15,
					'condition' => [
						'show_excerpt' => 'yes'
					],
				]
			);

			// $this->add_control( 
			// 	'heading_button',
			// 	[
			// 		'label' => esc_html__( 'Button', 'themesflat-core' ),
			// 		'type' => \Elementor\Controls_Manager::HEADING,
			// 		'separator' => 'before',
			// 	]
			// );

			// $this->add_control( 
			// 	'show_button',
			// 	[
			// 		'label' => esc_html__( 'Show Button', 'themesflat-core' ),
			// 		'type' => \Elementor\Controls_Manager::SWITCHER,
			// 		'label_on' => esc_html__( 'Show', 'themesflat-core' ),
			// 		'label_off' => esc_html__( 'Hide', 'themesflat-core' ),
			// 		'return_value' => 'yes',
			// 		'default' => 'yes',
			// 		'condition' => [
			// 			'style' => ['style3']
			// 		],
			// 	]
			// );

			// $this->add_control( 
			// 	'show_button_2',
			// 	[
			// 		'label' => esc_html__( 'Show Button', 'themesflat-core' ),
			// 		'type' => \Elementor\Controls_Manager::SWITCHER,
			// 		'label_on' => esc_html__( 'Show', 'themesflat-core' ),
			// 		'label_off' => esc_html__( 'Hide', 'themesflat-core' ),
			// 		'return_value' => 'yes',
			// 		'default' => 'no',
			// 		'condition' => [
			// 			'style' => ['style3']
			// 		],
			// 	]
			// );

			// $this->add_control( 
			// 	'button_text',
			// 	[
			// 		'label' => esc_html__( 'Button Text', 'themesflat-core' ),
			// 		'type' => \Elementor\Controls_Manager::TEXT,
			// 		'default' => esc_html__( 'READ MORE', 'themesflat-core' ),
			// 		'condition' => [
	        //             'show_button'	=> 'yes',
	        //         ],
			// 	]
			// );		

			// $this->add_control(
			// 	'post_icon_readmore',
			// 	[
			// 		'label' => esc_html__( 'Post Icon ', 'themesflat-core' ),
			// 		'type' => \Elementor\Controls_Manager::ICONS,
			// 		'default' => [
			// 			'value' => 'icon-monal-arrow-right',
			// 			'library' => 'theme_icon',
			// 		],
			// 		'condition' => [
	        //             'show_button'	=> 'yes',
	        //         ],
			// 	]
			// );

			$this->add_control( 
				'heading_meta',
				[
					'label' => esc_html__( 'Meta', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_control( 
				'show_meta',
				[
					'label' => esc_html__( 'Show Meta', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themesflat-core' ),
					'label_off' => esc_html__( 'Hide', 'themesflat-core' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);    
			
			$this->add_control( 
				'show_pagination',
				[
					'label' => esc_html__( 'Pagination', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themesflat-core' ),
					'label_off' => esc_html__( 'Hide', 'themesflat-core' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);   

			$this->end_controls_section();
        // /.End Layout

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
					'default' => '3',
					'options' => [
						'1' => esc_html__( '1', 'themesflat-core' ),
						'2' => esc_html__( '2', 'themesflat-core' ),
						'3' => esc_html__( '3', 'themesflat-core' ),
						'4' => esc_html__( '4', 'themesflat-core' ),
						'5' => esc_html__( '5', 'themesflat-core' ),
						'6' => esc_html__( '6', 'themesflat-core' ),
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
					'default' => '1',
					'options' => [
						'1' => esc_html__( '1', 'themesflat-core' ),
						'2' => esc_html__( '2', 'themesflat-core' ),
						'3' => esc_html__( '3', 'themesflat-core' ),
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
					],
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

			$this->add_control( 
				'carousel_prev_icon', [
	                'label' => esc_html__( 'Prev Icon', 'themesflat-core' ),
	                'type' => \Elementor\Controls_Manager::ICON,
	                'default' => 'fas fa-chevron-left',
	                'include' => [
						'fas fa-angle-double-left',
						'fas fa-angle-left',
						'fas fa-chevron-left',
						'fas fa-arrow-left',
					],  
	                'condition' => [
	                	'carousel' => 'yes',
	                    'carousel_arrow' => 'yes',
	                ]
	            ]
	        );

	    	$this->add_control( 
	    		'carousel_next_icon', [
	                'label' => esc_html__( 'Next Icon', 'themesflat-core' ),
	                'type' => \Elementor\Controls_Manager::ICON,
	                'default' => 'fas fa-chevron-right',
	                'include' => [
						'fas fa-angle-double-right',
						'fas fa-angle-right',
						'fas fa-chevron-right',
						'fas fa-arrow-right',
					], 
	                'condition' => [
	                	'carousel' => 'yes',
	                    'carousel_arrow' => 'yes',
	                ]
	            ]
	        );

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
					'default' => [
						'unit' => 'px',
						'size' => 21,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-posts .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-posts .owl-carousel .owl-nav .owl-next' => 'font-size: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .tf-posts .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-posts .owl-carousel .owl-nav .owl-next' => 'width: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .tf-posts .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-posts .owl-carousel .owl-nav .owl-next' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .tf-posts .owl-carousel .owl-nav' => 'width: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .tf-posts .owl-carousel .owl-nav' => 'right: {{SIZE}}{{UNIT}};',
						'.rtl {{WRAPPER}} .tf-posts .owl-carousel .owl-nav' => 'left: {{SIZE}}{{UNIT}};right: unset;',
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
						'{{WRAPPER}} .tf-posts .owl-carousel .owl-nav' => 'top: {{SIZE}}{{UNIT}};',
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
		                
		                'selectors' => [
							'{{WRAPPER}} .tf-posts .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-posts .owl-carousel .owl-nav .owl-next' => 'color: {{VALUE}}',
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
		                
		                'selectors' => [
							'{{WRAPPER}} .tf-posts .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-posts .owl-carousel .owl-nav .owl-next' => 'background-color: {{VALUE}};',
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
						
						'selector' => '{{WRAPPER}} .tf-posts .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-posts .owl-carousel .owl-nav .owl-next',
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
		                    '{{WRAPPER}} .tf-posts .owl-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-posts .owl-carousel .owl-nav .owl-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		               
		                'selectors' => [
							'{{WRAPPER}} .tf-posts .owl-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-posts .owl-carousel .owl-nav .owl-next:hover' => 'color: {{VALUE}}',
							'{{WRAPPER}} .tf-posts.has-carousel .owl-nav .owl-prev.disabled, {{WRAPPER}} .tf-posts.has-carousel .owl-nav .owl-next.disabled' => 'color: {{VALUE}}',
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
		                
		                'selectors' => [
							'{{WRAPPER}} .tf-posts .owl-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-posts .owl-carousel .owl-nav .owl-next:hover' => 'background-color: {{VALUE}};',
							'{{WRAPPER}} .tf-posts.has-carousel .owl-nav .owl-prev.disabled, {{WRAPPER}} .tf-posts.has-carousel .owl-nav .owl-next.disabled' => 'background-color: {{VALUE}};',
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
						
						'selector' => '{{WRAPPER}} .tf-posts .owl-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-posts .owl-carousel .owl-nav .owl-next:hover, {{WRAPPER}} .tf-posts.has-carousel .owl-nav .owl-prev.disabled, {{WRAPPER}} .tf-posts.has-carousel .owl-nav .owl-next.disabled',
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
		                    '{{WRAPPER}} .tf-posts .owl-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-posts .owl-carousel .owl-nav .owl-next:hover, {{WRAPPER}} .tf-posts.has-carousel .owl-nav .owl-prev.disabled, {{WRAPPER}} .tf-posts.has-carousel .owl-nav .owl-next.disabled' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
							'{{WRAPPER}} .tf-posts .owl-dots .owl-dot' => 'width: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .tf-posts .owl-dots .owl-dot' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .tf-posts .owl-dots' => 'left: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .tf-posts .owl-dots' => 'bottom: {{SIZE}}{{UNIT}};',
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
		                
		                'selectors' => [
							'{{WRAPPER}} .tf-posts .owl-dots .owl-dot' => 'background-color: {{VALUE}}',
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
						'selector' => '{{WRAPPER}} .tf-posts .owl-dots .owl-dot',
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
		                    '{{WRAPPER}} .tf-posts .owl-dots .owl-dot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		                
		                'selectors' => [
							'{{WRAPPER}} .tf-posts .owl-dots .owl-dot:hover, {{WRAPPER}} .tf-posts .owl-dots .owl-dot.active' => 'background-color: {{VALUE}}',
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
						'selector' => '{{WRAPPER}} .tf-posts .owl-dots .owl-dot:hover, {{WRAPPER}} .tf-posts .owl-dots .owl-dot.active',
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
		                    '{{WRAPPER}} .tf-posts .owl-dots .owl-dot:hover, {{WRAPPER}} .tf-posts .owl-dots .owl-dot.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .tf-posts .item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],										
				]
			);
			$this->add_responsive_control( 
				'margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'allowed_dimensions' => [ 'right', 'left' ],
					'default' => [
						'right' => '',
						'left' => '',
						'unit' => 'px',
						'isLinked' => true,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-posts' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_group_control( 
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'box_shadow',
					'label' => esc_html__( 'Box Shadow', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-posts .blog-post',
					'condition' => [
						'style!' => 'style1'
					],
				]
			);
			$this->add_group_control( 
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'box_shadow_s1',
					'label' => esc_html__( 'Box Shadow', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-posts.blog-post .content',
				]
			);
			$this->add_group_control( 
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'border',
					'label' => esc_html__( 'Border', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-posts .blog-post',
				]
			);
			$this->add_responsive_control( 
				'border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px' , '%' ],
					'selectors' => [
						'{{WRAPPER}} .tf-posts .blog-post' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

	        $this->add_responsive_control( 
	        	'padding_image',
				[
					'label' => esc_html__( 'Padding', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px' ],
					'selectors' => [
						'{{WRAPPER}} .tf-posts .featured-post' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .tf-posts .featured-post' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);  

			$this->add_group_control( 
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'box_shadow_image',
					'label' => esc_html__( 'Box Shadow', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-posts .featured-post',
				]
			); 

			$this->add_group_control( 
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'border_image',
					'label' => esc_html__( 'Border', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-posts .featured-post',
				]
			); 

			$this->add_responsive_control( 
				'border_radius_image',
				[
					'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px' , '%' ],
					'selectors' => [
						'{{WRAPPER}} .tf-posts .featured-post, {{WRAPPER}} .tf-posts .featured-post img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			); 

			$this->add_control( 
				'heading_overlay',
				[
					'label' => esc_html__( 'Overlay', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);        
		        
	        $this->end_controls_section();    
	    // /.End Image Style

	    // Start Content Style 
		    $this->start_controls_section( 
		    	'section_style_content',
	            [
	                'label' => esc_html__( 'Content', 'themesflat-core' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );
	        $this->add_responsive_control( 
				'content_padding',
				[
					'label' => esc_html__( 'Padding', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-posts .blog-post .content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		    $this->end_controls_section();
	    // /.End Content Style

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
						'{{WRAPPER}} .tf-posts .blog-post .title a' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control( 
				'title_color_hover',
				[
					'label' => esc_html__( 'Color Hover', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-posts .blog-post .title a:hover' => 'color: {{VALUE}}',
					],
				]
			);
	        $this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'title_s1_typography',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					
					'selector' => '{{WRAPPER}} .tf-posts .blog-post .title',
				]
			);

			$this->add_responsive_control( 
				'title_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-posts .blog-post .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		    $this->end_controls_section();
	    // /.End Title Style

	    // Start Excerpt Style 
		    $this->start_controls_section( 
		    	'section_style_text',
	            [
	                'label' => esc_html__( 'Excerpt', 'themesflat-core' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
					'condition' => [
	                    'show_excerpt'	=> 'yes',
						'show_excerpt_2'	=> 'yes',
	                ],
	            ]
	        );
	        $this->add_control( 
				'text_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-posts .blog-post .description' => 'color: {{VALUE}}',
					],
				]
			);
	        $this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'text_typography',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-posts .blog-post .description',
				]
			);
			$this->add_responsive_control( 
				'text_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-posts .blog-post .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		    $this->end_controls_section();
	    // /.End Excerpt Style

	    // Start Button Style 
		    $this->start_controls_section( 
		    	'section_style_button',
	            [
	                'label' => esc_html__( 'Button', 'themesflat-core' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	                'condition' => [
	                    'show_button'	=> 'yes',
						'show_button_2'	=> 'yes',
	                ],
	            ]
	        );
	        $this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'button_s1_typography',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .tf-posts .blog-post .tf-button',
				]
			);
			$this->add_control( 
				'button_color',
				[
					'label' => esc_html__( 'Color ', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}}  .tf-posts .blog-post .tf-button a' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .tf-posts .blog-post .tf-button a:hover' => 'color: {{VALUE}}',
					],
				]
			); 

			$this->add_control( 
				'heading_button_icon',
				[
					'label' => esc_html__( 'Icon', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			); 
			
			$this->add_control( 
				'button_icon_size',
				[
					'label' => esc_html__( 'Icon Size', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tf-posts .blog-post .content .tf-button-container a i ' => 'font-size: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .tf-posts .blog-post .content .tf-button-container a i svg ' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			); 

			$this->start_controls_tabs( 
				'icon_generel_tabs',
				);
				$this->start_controls_tab( 
					'icon_style_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'themesflat-core' ),
					] ); 

					$this->add_group_control(
						\Elementor\Group_Control_Background::get_type(),
						[
							'name' => 'icon_color_gradient',
							'label' => esc_html__( 'Icon Color', 'themesflat-core' ),
							'types' => ['gradient' ],
							'selector' => '{{WRAPPER}}  .tf-posts .blog-post .content .tf-button-container a i',
						]
					);

					
				$this->end_controls_tab();

				$this->start_controls_tab( 
					'icon_style_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'themesflat-core' ),
					] );

					$this->add_group_control(
						\Elementor\Group_Control_Background::get_type(),
						[
							'name' => 'icon_color_hover_gradient',
							'label' => esc_html__( 'Icon Color Hover', 'themesflat-core' ),
							'types' => ['gradient' ],
							'selector' => '{{WRAPPER}}  .tf-posts .blog-post .content .tf-button-container a i',
						]
					);
					
				$this->end_controls_tab();
			$this->end_controls_tabs(); 

		    $this->end_controls_section();
	    // /.End Button Style

		// Start Meta Style 
		    $this->start_controls_section( 
		    	'section_style_meta',
	            [
	                'label' => esc_html__( 'Meta', 'themesflat-core' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );	

	        $this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'meta_s1_typography',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),	
					'selector' => '{{WRAPPER}} .tf-posts .post-meta a',
				]
			);

			$this->add_control( 
				'heading_meta_1',
				[
					'label' => esc_html__( 'Meta ', 'themesflat-core' ),
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
						'{{WRAPPER}}  .tf-posts .blog-post .post-meta a' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .tf-posts .blog-post .post-meta a:hover' => 'color: {{VALUE}}',
					],
				]
			); 

			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'name' => 'icon_color_gradient_meta',
					'label' => esc_html__( 'Icon Color', 'themesflat-core' ),
					'types' => ['gradient' ],
					'selector' => '{{WRAPPER}} .tf-posts .blog-post .post-meta i',
				]
			);

			$this->add_control( 
				'heading_meta_day',
				[
					'label' => esc_html__( 'Day', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			); 

			$this->add_control( 
				'meta_color_time',
				[
					'label' => esc_html__( 'Color ', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}}  .tf-posts .blog-post .post-meta.post-meta-time a' => 'color: {{VALUE}}',
					],
				]
			); 

			$this->add_control( 
				'meta_color_time_icon',
				[
					'label' => esc_html__( 'Color Icon ', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}}  .tf-posts .blog-post .post-meta.post-meta-time i' => 'color: {{VALUE}}',
						'{{WRAPPER}}  .tf-posts .blog-post .post-meta.post-meta-time svg' => 'fill: {{VALUE}}',
					],
				]
			); 

		    $this->end_controls_section();
	    // /.End Meta Style
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();

		$has_carousel = 'no-carousel';
		if ( $settings['carousel'] == 'yes' ) {
			$has_carousel = 'has-carousel';
		}

		$this->add_render_attribute( 'tf_posts', ['id' => "tf-posts-{$this->get_id()}", 'class' => ['tf-posts', $settings['style'], $settings['posts_layout'], $settings['posts_layout_tablet'], $settings['posts_layout_mobile'], $has_carousel ], 'data-tabid' => $this->get_id()] );

		if ( get_query_var('paged') ) {
           $paged = get_query_var('paged');
        } elseif ( get_query_var('page') ) {
           $paged = get_query_var('page');
        } else {
           $paged = 1;
        }
		$query_args = array(
            'post_type' => 'post',
            'posts_per_page' => $settings['posts_per_page'],
            'paged'     => $paged
        );
        if (! empty( $settings['posts_categories'] )) {
        	$query_args['category_name'] = implode(',', $settings['posts_categories']);
        }        
        if ( ! empty( $settings['exclude'] ) ) {				
			if ( ! is_array( $settings['exclude'] ) )
				$exclude = explode( ',', $settings['exclude'] );

			$query_args['post__not_in'] = $exclude;
		}
		$query_args['orderby'] = $settings['order_by'];
		$query_args['order'] = $settings['order'];	
		
		$query = new WP_Query( $query_args );
		if ( $query->have_posts() ) : ?>
			<div <?php echo $this->get_render_attribute_string('tf_posts'); ?> data-loop="<?php echo esc_attr($settings['carousel_loop']); ?>" data-auto="<?php echo esc_attr($settings['carousel_auto']); ?>" data-column="<?php echo esc_attr($settings['carousel_column_desk']); ?>" data-column2="<?php echo esc_attr($settings['carousel_column_tablet']); ?>" data-column3="<?php echo esc_attr($settings['carousel_column_mobile']); ?>" data-prev_icon="<?php echo esc_attr($settings['carousel_prev_icon']) ?>" data-next_icon="<?php echo esc_attr($settings['carousel_next_icon']) ?>" data-arrow="<?php echo esc_attr($settings['carousel_arrow']) ?>" data-bullets="<?php echo esc_attr($settings['carousel_bullets']) ?>" >
				<?php if ( $settings['carousel'] == 'yes' ): ?>
				<div class="owl-carousel">
				<?php endif; ?>
					<?php while ( $query->have_posts() ) : $query->the_post();						
						$attr['settings'] = $settings; 
						tf_get_template_widget("posts/{$settings['style']}", $attr);
						?>					
					<?php endwhile; ?>
				<?php if ( $settings['carousel'] == 'yes' ): ?>
				</div>
				<?php endif; ?>
				<?php if ( $settings['show_pagination'] == 'yes' ): ?>
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
			
				<nav class="navigation paging-navigation numeric text-center"
					role="navigation">
					<div class="pagination loop-pagination">
						<?php echo wp_kses($numeric_links, themesflat_kses_allowed_html()) ?>
					</div>
				</nav>
				<?php endif; ?>
		<?php
		else:
			esc_html_e('No posts found', 'themesflat-core');
		endif;		
		
	}

	

	

}