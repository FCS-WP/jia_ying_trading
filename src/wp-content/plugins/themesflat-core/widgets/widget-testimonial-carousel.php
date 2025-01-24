<?php
class TFTestimonialCarousel_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-testimonial-carousel';
    }
    
    public function get_title() {
        return esc_html__( 'TF Testimonial Carousel', 'themesflat-core' );
    }

    public function get_icon() {
        return 'eicon-slider-push';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
		return ['owl-carousel','tf-testimonial'];
	}

	public function get_script_depends() {
		return ['owl-carousel','tf-testimonial'];
	}

	protected function register_controls() {
        // Start Carousel Setting        
			$this->start_controls_section( 
				'section_carousel',
	            [
	                'label' => esc_html__('Testimonial Carousel', 'themesflat-core'),
	            ]
	        );

	        $this->add_control(
				'testimonial_style',
				[
					'label' => esc_html__( 'Layout Style', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'style-2',
					'options' => [
						// 'style-1'  => esc_html__( 'Style 1', 'themesflat-core' ),
						'style-2'  => esc_html__( 'Style ', 'themesflat-core' ),
					],
				]
			);	    

			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'avatar',
				[
					'label' => esc_html__( 'Choose Avatar', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME."assets/img/default-team.jpg",
					],
				]
			);


			$repeater->add_control(
				'description',
				[
					'label' => esc_html__( 'Description', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::WYSIWYG,
					'rows' => 10,
					'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla iaculis velit, pharetra aliquet urna faucibus et. Vivamus blandit vulputate risus. Praesent at justo sed nibh interdum viverra at non magna', 'themesflat-core' ),
				]
			);

			$repeater->add_control(
				'time',
				[
					'label' => esc_html__( 'Time', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::WYSIWYG,
					'rows' => 10,
					'default' => esc_html__( '14/12/2020 lúc 17:20', 'themesflat-core' ),
				]
			);

			$repeater->add_control(
				'name',
				[
					'label' => esc_html__( 'Name', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Cameron Williamson', 'themesflat-core' ),
				]
			);

			$repeater->add_control(
				'position',
				[
					'label' => esc_html__( 'Text des 1', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Color: Black', 'themesflat-core' ),
				]
			);

			$repeater->add_control(
				'position2',
				[
					'label' => esc_html__( 'Text des 2', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Verified Purchase', 'themesflat-core' ),
				]
			);

			// $repeater->add_control(
			// 	'icon_quote',
			// 	[
			// 		'label' => esc_html__( 'Icon', 'themesflat-core' ),
			// 		'type' => \Elementor\Controls_Manager::ICONS,
			// 		'default' => [
			// 			'value' => 'fas fa-quote-left',
			// 			'library' => 'solid',
			// 		],
			// 	]
			// );

			$this->add_control( 
				'carousel_list',
					[					
						'type' => \Elementor\Controls_Manager::REPEATER,
						'fields' => $repeater->get_controls(),
						'default' => [
							[ 
								'name' => 'Cameron Williamson',
								
								'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla iaculis velit, pharetra aliquet urna faucibus et. Vivamus blandit vulputate risus. Praesent at justo sed nibh interdum viverra at non magna',
							],
							[ 
								'name' => 'Cameron Williamson',
								'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla iaculis velit, pharetra aliquet urna faucibus et. Vivamus blandit vulputate risus. Praesent at justo sed nibh interdum viverra at non magna',
							],
							[ 
								'name' => 'Cameron Williamson',
								'description'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla iaculis velit, pharetra aliquet urna faucibus et. Vivamus blandit vulputate risus. Praesent at justo sed nibh interdum viverra at non magna',
							],
						],					
					]
				);
			
			$this->end_controls_section();
        // /.End Carousel	

        // Start Setting        
			$this->start_controls_section( 
				'section_setting',
	            [
	                'label' => esc_html__('Setting', 'themesflat-core'),
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
					'default' => 30,				
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
				]
			);

			$this->add_control( 
	        	'carousel_column_tablet',
				[
					'label' => esc_html__( 'Columns Tablet', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => '2',
					'options' => [
						'1' => esc_html__( '1', 'themesflat-core' ),
						'2' => esc_html__( '2', 'themesflat-core' ),
						'3' => esc_html__( '3', 'themesflat-core' ),
						'4' => esc_html__( '4', 'themesflat-core' ),
						'5' => esc_html__( '5', 'themesflat-core' ),
						'6' => esc_html__( '6', 'themesflat-core' ),
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
						'6' => esc_html__( '6', 'themesflat-core' ),
					],				
				]
			);

			$this->add_control( 
	        	'index_active',
				[
					'label' => esc_html__( 'Index Active', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => '0',
					'options' => [
						'0' => esc_html__( '1', 'themesflat-core' ),
						'1' => esc_html__( '2', 'themesflat-core' ),
						'2' => esc_html__( '3', 'themesflat-core' ),
						'3' => esc_html__( '4', 'themesflat-core' ),
						'4' => esc_html__( '5', 'themesflat-core' ),
						'5' => esc_html__( '6', 'themesflat-core' ),
					],				
				]
			);

	        $this->end_controls_section();
        // /.End Setting

        // Start Arrow        
			$this->start_controls_section( 
				'section_arrow',
	            [
	                'label' => esc_html__('Arrow', 'themesflat-core'),
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
					'description'	=> 'Just show when you have two slide',
					'separator' => 'before',
				]
			);

	        $this->add_control( 
				'carousel_prev_icon', [
	                'label' => esc_html__( 'Prev Icon', 'themesflat-core' ),
	                'type' => \Elementor\Controls_Manager::ICON,
	                'default' => 'fa fa-chevron-left',
	                'include' => [
						'fa fa-angle-double-left',
						'fa fa-angle-left',
						'fa fa-chevron-left',
						'fa fa-arrow-left',
						'monal-icon-long-arrow-left1',
					],  
	                'condition' => [                	
	                    'carousel_arrow' => 'yes',
	                ]
	            ]
	        );

	    	$this->add_control( 
	    		'carousel_next_icon', [
	                'label' => esc_html__( 'Next Icon', 'themesflat-core' ),
	                'type' => \Elementor\Controls_Manager::ICON,
	                'default' => 'fa fa-chevron-right',
	                'include' => [
						'fa fa-angle-double-right',
						'fa fa-angle-right',
						'fa fa-chevron-right',
						'fa fa-arrow-right',
						'monal-icon-long-arrow-right2',
					], 
	                'condition' => [                	
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
						'size' => 12,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next' => 'font-size: {{SIZE}}{{UNIT}};',
					],
					'condition' => [					
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
					'default' => [
						'unit' => 'px',
						'size' => 46,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next' => 'width: {{SIZE}}{{UNIT}};',
					],
					'condition' => [					
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
					'default' => [
						'unit' => 'px',
						'size' => 46,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
					],
					'condition' => [					
	                    'carousel_arrow' => 'yes',
	                ]
				]
			);	

			$this->add_responsive_control( 
				'carousel_arrow_horizontal_position_prev',
				[
					'label' => esc_html__( 'Horizontal Position Previous', 'themesflat-core' ),
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
					'default' => [
						'unit' => '%',
						'size' => 0,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev' => 'left: {{SIZE}}{{UNIT}};',
					],
					'condition' => [					
	                    'carousel_arrow' => 'yes',
	                ]
				]
			);

			$this->add_responsive_control( 
				'carousel_arrow_horizontal_position_next',
				[
					'label' => esc_html__( 'Horizontal Position Next', 'themesflat-core' ),
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
					'default' => [
						'unit' => 'px',
						'size' => 0,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next' => 'right: {{SIZE}}{{UNIT}};',
					],
					'condition' => [					
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
					'default' => [
						'unit' => '%',
						'size' => 50,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next' => 'top: {{SIZE}}{{UNIT}};',
					],
					'condition' => [					
	                    'carousel_arrow' => 'yes',
	                ]
				]
			);

			$this->start_controls_tabs( 
				'carousel_arrow_tabs',
				[
					'condition' => [
		                'carousel_arrow' => 'yes',	                
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
							'{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next' => 'color: {{VALUE}}',
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
							'{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next' => 'background-color: {{VALUE}};',
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
						'selector' => '{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next',
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
		                    '{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
							'{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next:hover' => 'color: {{VALUE}}',
							'{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev.disabled, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next.disabled' => 'color: {{VALUE}}',
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
							'{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next:hover' => 'background-color: {{VALUE}};',
							'{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev.disabled, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next.disabled' => 'background-color: {{VALUE}};',
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
						'selector' => '{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next:hover, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev.disabled, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next.disabled',
						'condition' => [
		                    'carousel_arrow' => 'yes',
		                ]
					]
				);

				$this->add_responsive_control( 
					'carousel_arrow_border_radius_hover',
		            [
		                'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::DIMENSIONS,
		                'size_units' => [ 'px', '%', 'em' ],
		                'selectors' => [
		                    '{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		                    '{{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-prev.disabled, {{WRAPPER}} .tf-testimonial-carousel .owl-nav .owl-next.disabled' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		                ],
		                'condition' => [
		                    'carousel_arrow' => 'yes',
		                ]
		            ]
		        );

	       		$this->end_controls_tab();

	        $this->end_controls_tabs();

	        $this->end_controls_section();
        // /.End Arrow

        // Start Bullets        
			$this->start_controls_section( 
				'section_bullets',
	            [
	                'label' => esc_html__('Bullets', 'themesflat-core'),
	            ]
	        );

			$this->add_control( 
				'carousel_bullets',
	            [
	                'label'         => esc_html__( 'Bullets', 'themesflat-core' ),
	                'type'          => \Elementor\Controls_Manager::SWITCHER,
	                'label_on'      => esc_html__( 'Show', 'themesflat-core' ),
	                'label_off'     => esc_html__( 'Hide', 'themesflat-core' ),
	                'return_value'  => 'yes',
	                'default'       => 'yes',
	                'separator' => 'before',
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
						'{{WRAPPER}} .tf-testimonial-carousel .owl-dots' => 'left: {{SIZE}}{{UNIT}};',
					],
					'condition' => [					
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
						'{{WRAPPER}} .tf-testimonial-carousel .owl-dots' => 'bottom: {{SIZE}}{{UNIT}};',
					],
					'condition' => [					
	                    'carousel_bullets' => 'yes',
	                ]
				]
			);

			$this->add_responsive_control( 
				'carousel_bullets_margin',
				[
					'label' => esc_html__( 'Spacing', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 50,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot' => 'margin: 0 {{SIZE}}{{UNIT}};',
					],
					'condition' => [
	                    'carousel_bullets' => 'yes',
	                ]
				]
			);

			$this->start_controls_tabs( 
				'carousel_bullets_tabs',
					[
						'condition' => [						
		                    'carousel_bullets' => 'yes',
		                ]
					] );
				$this->start_controls_tab( 
					'carousel_bullets_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'themesflat-core' ),						
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
								'{{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot' => 'width: {{SIZE}}{{UNIT}};',
							],
							'condition' => [						
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
							'{{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
						],
						'condition' => [					
		                    'carousel_bullets' => 'yes',
		                ]
					]
				);

				$this->add_control( 
					'carousel_bullets_bg_color',
		            [
		                'label' => esc_html__( 'Background Color', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::COLOR,
		            
		                'selectors' => [
							'{{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot' => 'background-color: {{VALUE}}',
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
						'selector' => '{{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot',						
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
		                    '{{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'label' => esc_html__( 'Active', 'themesflat-core' ),
					]
				);

				$this->add_responsive_control( 
		        	'w_size_carousel_bullets_active',
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
								'{{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot.active' => 'width: {{SIZE}}{{UNIT}};',
							],
							'condition' => [						
			                    'carousel_bullets' => 'yes',
			                ]
						]
				);

				$this->add_responsive_control( 
					'h_size_carousel_bullets_active',
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
							'{{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot.active' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
						],
						'condition' => [					
		                    'carousel_bullets' => 'yes',
		                ]
					]
				);

				$this->add_control( 
					'size_carousel_bullets_active_scale_hover',
					[
						'label' => esc_html__( 'Scale', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'size_units' => [ 'px' ],
						'range' => [
							'px' => [
								'min' => 1,
								'max' => 2,
								'step' => 0.1,
							],
						],
						
						'selectors' => [
							'{{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot.active, {{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot:hover' => 'transform: scale({{SIZE}});',
						],
					]
				);	

	        	$this->add_control( 
	        		'carousel_bullets_hover_bg_color',
		            [
		                'label' => esc_html__( 'Background Color', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::COLOR,
		                'selectors' => [
							'{{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot:hover, {{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot.active' => 'background-color: {{VALUE}}',
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
						'selector' => '{{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot:hover, {{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot.active',
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
		                    '{{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot:hover, {{WRAPPER}} .tf-testimonial-carousel .owl-dots .owl-dot.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		                ],
		                'condition' => [
		                    'carousel_bullets' => 'yes',
		                ]
		            ]
		        );

				$this->end_controls_tab();

		    $this->end_controls_tabs();	

	        $this->end_controls_section();
        // /.End Bullets   
		
		// Start General
			$this->start_controls_section( 'section_general',
	            [
	                'label' => esc_html__( 'General', 'themesflat-core' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        ); 

			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'border',
					'label' => esc_html__( 'Border', 'plugin-domain' ),
					'selector' => '{{WRAPPER}} .tf-testimonial-carousel .item-testimonial',
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'box_shadow',
					'label' => esc_html__( 'Box Shadow', 'plugin-domain' ),
					'selector' => '{{WRAPPER}} .tf-testimonial-carousel .item-testimonial',
				]
			);
			$this->add_control(
				'background',
				[
					'label' => esc_html__( 'Background Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,

					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel .item-testimonial' => 'background-color: {{VALUE}}',
					],
				]
			);
			$this->add_responsive_control(
				'padding',
				[
					'label' => esc_html__( 'Padding', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					
					'selectors' => [
						'{{WRAPPER}}  .tf-testimonial-carousel .item-testimonial' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_responsive_control(
				'margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel .item-testimonial' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_responsive_control(
				'border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel .owl-carousel .owl-stage-outer' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

	    	$this->end_controls_section();    
	    // /.End General 

		// Start Image
			$this->start_controls_section( 'section_image',
	            [
	                'label' => esc_html__( 'Image', 'themesflat-core' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        ); 

			$this->add_responsive_control(
				'avatar_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel .item .avatar' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'avatar_size',
				[
					'label' => esc_html__( 'Size', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel .item .avatar' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);


	    	$this->end_controls_section();    
	    // /.End Image 
		
		// Start Description
			$this->start_controls_section( 'section_description',
	            [
	                'label' => esc_html__( 'Description', 'themesflat-core' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        ); 

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'description_typography',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					// 'fields_options' => [
				    //     'typography' => ['default' => 'yes'],
				    //     'font_family' => [
				    //         'default' => 'Inter',
				    //     ],
				    //     'font_size' => [
				    //         'default' => [
				    //             'unit' => 'px',
				    //             'size' => '20',
				    //         ],
				    //     ],
				    //     'font_weight' => [
				    //         'default' => '400',
				    //     ],
				    //     'line_height' => [
				    //         'default' => [
				    //             'unit' => 'px',
				    //             'size' => '30',
				    //         ],
				    //     ],
				    //     'text_transform' => [
					// 		'default' => '',
					// 	],
					// 	'letter_spacing' => [
				    //         'default' => [
				    //             'unit' => 'px',
				    //             'size' => '0',
				    //         ],
				    //     ],
				    // ],
					'selector' => '{{WRAPPER}} .tf-testimonial-carousel .item .description',
				]
			);
			$this->add_control(
				'description_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel .item .description' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_responsive_control(
				'description_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel .item .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

	    	$this->end_controls_section();    
	    // /.End Description

		// Start Infor
			$this->start_controls_section( 'section_infor',
	            [
	                'label' => esc_html__( 'Infor', 'themesflat-core' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        ); 

			$this->add_control(
				'h_name',
				[
					'label' => esc_html__( 'Name', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'name_typography',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .tf-testimonial-carousel .item .name',
				]
			);
			$this->add_control(
				'name_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel .item .name' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_responsive_control(
				'name_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel .item .name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'h_position',
				[
					'label' => esc_html__( 'Text 1', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'position_typography',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					
					'selector' => '{{WRAPPER}} .tf-testimonial-carousel .item .thump-text .text1',
				]
			);
			$this->add_control(
				'position_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel .item .thump-text .text 1' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_control(
				'h_position2',
				[
					'label' => esc_html__( 'Text 2', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'position2_typography',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					
					'selector' => '{{WRAPPER}} .tf-testimonial-carousel .item .thump-text .text2',
				]
			);
			$this->add_control(
				'position2_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel .item .thump-text .text2' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_responsive_control(
				'position_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel .item .thump-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

	    	$this->end_controls_section();    
	    // /.End Infor
		
		// Start Icon
			$this->start_controls_section( 'section_icon',
				[
					'label' => esc_html__( 'Rating', 'themesflat-core' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			); 
			// $this->add_control(
			// 	'h_rating',
			// 	[
			// 		'label' => esc_html__( 'Rating', 'themesflat-core' ),
			// 		'type' => \Elementor\Controls_Manager::HEADING,
			// 		'separator' => 'before',
			// 	]
			// );
			$this->add_control(
				'rating_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#FCC65D',
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel .testimonial-star-rating' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_control(
				'rating',
				[
					'label' => esc_html__( 'Rating', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => '100',
					'options' => [
						'0'   => esc_html__( '0 stars', 'themesflat-core' ),
						'20'  => esc_html__( '1 star', 'themesflat-core' ),
						'40'  => esc_html__( '2 stars', 'themesflat-core' ),
						'60'  => esc_html__( '3 stars', 'themesflat-core' ),
						'80'  => esc_html__( '4 stars', 'themesflat-core' ),
						'100' => esc_html__( '5 stars', 'themesflat-core' ),
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel .testimonial-star-rating span' => 'width: {{VALUE}}%',
					],
				]
			);
			// $this->add_control(
			// 	'icon_fontsize',
			// 	[
			// 		'label' => esc_html__( 'Font Size', 'themesflat-core' ),
			// 		'type' => \Elementor\Controls_Manager::SLIDER,
			// 		'size_units' => [ 'px', '%' ],
			// 		'range' => [
			// 			'px' => [
			// 				'min' => 0,
			// 				'max' => 150,
			// 				'step' => 1,
			// 			],
			// 		],
			// 		'selectors' => [
			// 			'{{WRAPPER}} .tf-testimonial-carousel .item .icon-quote i' => 'font-size: {{SIZE}}{{UNIT}};',
			// 			'{{WRAPPER}} .tf-testimonial-carousel .item .icon-quote svg' => 'width: {{SIZE}}{{UNIT}};',
			// 		],
			// 	]
			// );

			// $this->add_control(
			// 	'icon_color',
			// 	[
			// 		'label' => esc_html__( 'Color', 'themesflat-core' ),
			// 		'type' => \Elementor\Controls_Manager::COLOR,
			// 		'selectors' => [
			// 			'{{WRAPPER}} .tf-testimonial-carousel .item .icon-quote' => 'color: {{VALUE}}',
			// 			'{{WRAPPER}} .tf-testimonial-carousel .item .icon-quote svg' => 'fill: {{VALUE}}',
			// 		],
			// 	]
			// );

			// $this->add_responsive_control(
			// 	'icon_left',
			// 	[
			// 		'label' => esc_html__( 'Bottom', 'themesflat-core' ),
			// 		'type' => \Elementor\Controls_Manager::SLIDER,
			// 		'size_units' => [ 'px', '%' ],
			// 		'range' => [
			// 			'px' => [
			// 				'min' => 0,
			// 				'max' => 150,
			// 				'step' => 1,
			// 			],
			// 		],
			// 		'selectors' => [
			// 			'{{WRAPPER}} .tf-testimonial-carousel .item .icon-quote ' => 'bottom: {{SIZE}}{{UNIT}};',
			// 		]
			// 	]
			// );

			// $this->add_responsive_control(
			// 	'icon_right',
			// 	[
			// 		'label' => esc_html__( 'Right', 'themesflat-core' ),
			// 		'type' => \Elementor\Controls_Manager::SLIDER,
			// 		'size_units' => [ 'px', '%' ],
			// 		'range' => [
			// 			'px' => [
			// 				'min' => 0,
			// 				'max' => 150,
			// 				'step' => 1,
			// 			],
			// 		],
			// 		'selectors' => [
			// 			'{{WRAPPER}} .tf-testimonial-carousel .item .icon-quote ' => 'right: {{SIZE}}{{UNIT}};',
			// 		]
			// 	]
			// );

			$this->end_controls_section();    
		// End Icon

		// Start Time
			$this->start_controls_section( 'section_time',
				[
					'label' => esc_html__( 'Time', 'themesflat-core' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			); 
			
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'time_typography',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),

					'selector' => '{{WRAPPER}} .tf-testimonial-carousel .item .time',
				]
			);
			$this->add_control(
				'time_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial-carousel .item .time' => 'color: {{VALUE}}',
					],
				]
			);

			$this->end_controls_section();    
		// /.End Time
	    
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();
		
		$carousel_arrow = 'no-arrow';
		if ( $settings['carousel_arrow'] == 'yes' ) {
			$carousel_arrow = 'has-arrow';
		}

		$carousel_bullets = 'no-bullets';
		if ( $settings['carousel_bullets'] == 'yes' ) {
			$carousel_bullets = 'has-bullets';
		}

		$icon_quote = '';

		?>
		<div class="tf-testimonial-carousel <?php echo esc_attr($settings['testimonial_style']) ?> <?php echo esc_attr($carousel_arrow); ?> <?php echo esc_attr($carousel_bullets); ?>" data-loop="<?php echo esc_attr($settings['carousel_loop']); ?>" data-auto="<?php echo esc_attr($settings['carousel_auto']); ?>" data-column="<?php echo esc_attr($settings['carousel_column_desk']); ?>" data-column2="<?php echo esc_attr($settings['carousel_column_tablet']); ?>" data-column3="<?php echo esc_attr($settings['carousel_column_mobile']); ?>" data-spacer="<?php echo esc_attr($settings['carousel_spacer']); ?>" data-prev_icon="<?php echo esc_attr($settings['carousel_prev_icon']) ?>" data-next_icon="<?php echo esc_attr($settings['carousel_next_icon']) ?>" data-arrow="<?php echo esc_attr($settings['carousel_arrow']) ?>" data-bullets="<?php echo esc_attr($settings['carousel_bullets']) ?>" data-index_active="<?php echo esc_attr($settings['index_active']) ?>">
			<div class="owl-carousel owl-theme">
			<?php if ($settings['testimonial_style'] == 'style-1'): ?>
				<?php foreach ($settings['carousel_list'] as $carousel): 
						//$icon_quote = \Elementor\Addon_Elementor_Icon_manager::render_icon( $carousel['icon_quote'], [ 'aria-hidden' => 'true' ] );
					?>				
					<div class="item">	
						<div class="avatar"><img src="<?php echo esc_attr($carousel['avatar']['url']); ?>" alt="image"></div>
						
						<div class="item-testimonial">							
							<div class="description"><?php echo sprintf( '%1$s', $carousel['description'] ); ?></div>
							<div class="wrap-author">				
								<div class="content">
									<div class="name"><?php echo esc_attr($carousel['name']); ?></div>
									<div class="position"><?php echo esc_attr($carousel['position']); ?></div>
								</div>
							</div>
							<?php //if ($icon_quote): ?>
								<!-- <div class="icon-quote"><?php //echo sprintf($icon_quote); ?></div> -->
							<?php //endif; ?>
						</div>	
					</div>				
				<?php endforeach;?>
			<?php elseif ($settings['testimonial_style'] == 'style-2'): ?>
				<?php foreach ($settings['carousel_list'] as $carousel): 
					?>				
					<div class="item">
						<div class="item-testimonial">
							<div class="avatar"><img src="<?php echo esc_attr($carousel['avatar']['url']); ?>" alt="image"></div>
							<div class="content-testimonial">
								<div class="name"><?php echo esc_attr($carousel['name']); ?></div>
								<div class="thump-text">
									<span class="text1"><?php echo esc_attr($carousel['position']); ?></span>
									<span class="text2"><?php echo esc_attr($carousel['position2']); ?></span>
								</div>
								<div class="rating">
									<span class="testimonial-star-rating"><span></span></span>
								</div>
								<div class="description"><?php echo sprintf( '%1$s', $carousel['description'] ); ?></div>	
								<div class="time"><?php echo sprintf( '%1$s', $carousel['time'] ); ?></div>
							</div>		
						</div>	
					</div>				
				<?php endforeach;?>
			<?php endif; ?>	
			</div>
		</div>
		<?php	
	}

}