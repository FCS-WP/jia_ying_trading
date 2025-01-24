<?php
class TFWooProductsBanner_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-woo-products-banner';
    }
    
    public function get_title() {
        return esc_html__( 'TF Product Banner', 'themesflat-core' );
    }

    public function get_icon() {
        return 'eicon-banner';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
		return ['tf-font-awesome','owl-carousel','tf-product-banner'];
	}

	public function get_script_depends() {
		return ['owl-carousel','tf-product-banner'];
	}

	protected function register_controls() {
		// Start List Setting        
			$this->start_controls_section( 'section_setting',
	            [
	                'label' => esc_html__('Setting', 'themesflat-core'),
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
						'style3' => esc_html__( 'Style 3', 'themesflat-core' ),
						'style4' => esc_html__( 'Style 4', 'themesflat-core' ),
						'style5' => esc_html__( 'Style 5', 'themesflat-core' ),
						'style6' => esc_html__( 'Style 6', 'themesflat-core' ),
						'style7' => esc_html__( 'Style 7', 'themesflat-core' ),
						'style8' => esc_html__( 'Style 8', 'themesflat-core' ),
						// 'style9' => esc_html__( 'Style 9', 'themesflat-core' ),
					],
				]
			);

	        $this->start_controls_tabs( 'slides_repeater' );
	        	$this->start_controls_tab( 'content', [ 'label' => esc_html__( 'Content', 'themesflat-core' ) ] );

					$this->add_control(
						'link_banner',
						[
							'label' => esc_html__( 'Url Banner', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::TEXT,
							'default' => esc_html__( '#', 'themesflat-core' ),
							'label_block' => true,
						]
					);
					$this->add_control(
						'image',
						[
							'label' => esc_html__( 'Choose Image', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::MEDIA,
							'default' => [
								'url' => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME."assets/img/img-product-1.png",
							],
						]
					);
					$this->add_control(
						'image2',
						[
							'label' => esc_html__( 'Choose Image', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::MEDIA,
							'default' => [
								'url' => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME."assets/img/img-product-1.png",
							],
							'condition' => [
								'style' => ['style4'],
							],
						]
					);
					$this->add_control(
						'labeltext',
						[
							'label' => esc_html__( 'Label Text', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::TEXT,
							'default' => esc_html__( 'SALE', 'themesflat-core' ),
							'label_block' => true,
							'condition' => [
								'style' => ['style1', 'style2','style3',],
							],
							
						]
					);
					$this->add_control(
						'label',
						[
							'label' => esc_html__( 'Label', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::TEXT,
							'default' => esc_html__( '70%', 'themesflat-core' ),
							'label_block' => true,
							'condition' => [
								'style' => ['style1', 'style2','style3'],
							],
							
						]
					);
					$this->add_control(
						'label2',
						[
							'label' => esc_html__( 'Label', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::TEXT,
							'default' => esc_html__( '$80.000', 'themesflat-core' ),
							'label_block' => true,
							'condition' => [
								'style' => 'style4',
							],
						]
					);
					$this->add_control(
						'labeltext2',
						[
							'label' => esc_html__( 'Label Text', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::TEXT,
							'default' => esc_html__( 'SAVE', 'themesflat-core' ),
							'label_block' => true,
							'condition' => [
								'style' => 'style4',
							],
						]
					);
					$this->add_control(
						'label3',
						[
							'label' => esc_html__( 'Label', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::TEXT,
							'default' => esc_html__( '$399', 'themesflat-core' ),
							'label_block' => true,
							'condition' => [
								'style' => 'style5',
							],
						]
					);
					$this->add_control(
						'labeltext3',
						[
							'label' => esc_html__( 'Label Text', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::TEXT,
							'default' => esc_html__( 'FROM', 'themesflat-core' ),
							'label_block' => true,
							'condition' => [
								'style' => ['style5', 'style6','style8'],
							],
						]
					);
					$this->add_control(
						'label4',
						[
							'label' => esc_html__( 'Label', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::TEXT,
							'default' => esc_html__( '$1.399', 'themesflat-core' ),
							'label_block' => true,
							'condition' => [
								'style' => ['style6','style8'],
							],
						]
					);
			        $this->add_control(
						'category',
						[
							'label' => esc_html__( 'Category', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::TEXT,
							'default' => esc_html__( 'CATCH BIG', 'themesflat-core' ),
							'label_block' => true,
							'condition' => [
								'style' => ['style1','style8'],
							],
						]
					);
					$this->add_control(
						'category2',
						[
							'label' => esc_html__( 'Title', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::TEXT,
							'default' => esc_html__( 'The New Standard', 'themesflat-core' ),
							'label_block' => true,
							'condition' => [
								'style' => 'style2',
							],
						]
					);
			        $this->add_control(
						'heading',
						[
							'label' => esc_html__( 'Heading', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::TEXT,					
							'default' => esc_html__( 'DEALS', 'themesflat-core' ),
							'label_block' => true,
							'condition' => [
								'style' => ['style1','style8'],
							],
						]
					);
					$this->add_control(
						'heading2',
						[
							'label' => esc_html__( 'Sub title', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::TEXT,					
							'default' => esc_html__( 'Under favorable 360 cameras', 'themesflat-core' ),
							'label_block' => true,
							'condition' => [
								'style' => 'style2',
							],
						]
					);
					$this->add_control(
						'heading3',
						[
							'label' => esc_html__( 'Title', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::TEXT,					
							'default' => esc_html__( 'GameConsole Destiny Special Edition', 'themesflat-core' ),
							'label_block' => true,
							'condition' => [
								'style' => 'style3',
							],
						]
					);
					$this->add_control(
						'heading4',
						[
							'label' => esc_html__( 'Title', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::TEXT,					
							'default' => esc_html__( 'Shop and', 'themesflat-core' ),
							'label_block' => true,
							'condition' => [
								'style' => 'style4',
							],
						]
					);
					$this->add_control(
						'heading42',
						[
							'label' => esc_html__( 'Title 2', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::TEXT,					
							'default' => esc_html__( 'SAVE BIG', 'themesflat-core' ),
							'label_block' => true,
							'condition' => [
								'style' => 'style4',
							],
						]
					);
					$this->add_control(
						'heading43',
						[
							'label' => esc_html__( 'Title 3', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::TEXT,					
							'default' => esc_html__( 'on hottest camera', 'themesflat-core' ),
							'label_block' => true,
							'condition' => [
								'style' => 'style4',
							],
						]
					);

					$this->add_control(
						'heading5',
						[
							'label' => esc_html__( 'Title', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::TEXT,					
							'default' => esc_html__( 'Lenovo ThinkBook', 'themesflat-core' ),
							'label_block' => true,
							'condition' => [
								'style' => 'style5',
							],
						]
					);
					$this->add_control(
						'heading52',
						[
							'label' => esc_html__( 'Title 2', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::TEXT,					
							'default' => esc_html__( '8GB/MX450 2GB', 'themesflat-core' ),
							'label_block' => true,
							'condition' => [
								'style' => 'style5',
							],
						]
					);
					$this->add_control(
						'heading6',
						[
							'label' => esc_html__( 'Title', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::TEXT,					
							'default' => esc_html__( 'ThinkPad X1 Carbon Gen 9', 'themesflat-core' ),
							'label_block' => true,
							'condition' => [
								'style' => 'style6',
							],
						]
					);
					$this->add_control(
						'heading62',
						[
							'label' => esc_html__( 'Title 2', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::TEXT,					
							'default' => esc_html__( '4K HDR-Core i7 32GB', 'themesflat-core' ),
							'label_block' => true,
							'condition' => [
								'style' => 'style6',
							],
						]
					);
					$this->add_control(
						'heading7',
						[
							'label' => esc_html__( 'Title', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::TEXT,					
							'default' => esc_html__( 'Samsung 8K TV', 'themesflat-core' ),
							'label_block' => true,
							'condition' => [
								'style' => 'style7',
							],
						]
					);
					$this->add_control(
						'heading72',
						[
							'label' => esc_html__( 'Title 2', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::TEXT,					
							'default' => esc_html__( '70”', 'themesflat-core' ),
							'label_block' => true,
							'condition' => [
								'style' => 'style7',
							],
						]
					);
					$this->add_control(
						'sub_heading',
						[
							'label' => esc_html__( 'Sub Heading', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::TEXT,
							'default' => esc_html__( 'ON THE CAMERAS', 'themesflat-core' ),
							'label_block' => true,
							'condition' => [
								'style' => ['style1','style8'],
							],
						]
					);
					$this->add_control(
						'sub_heading2',
						[
							'label' => esc_html__( 'Sub Heading', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::TEXT,
							'default' => esc_html__( 'NVIDIA GeForce MX450 2GB; Intel Iris Xe Graphics', 'themesflat-core' ),
							'label_block' => true,
							'condition' => [
								'style' => 'style5',
							],
						]
					);
					$this->add_control(
						'sub_heading3',
						[
							'label' => esc_html__( 'Sub Heading', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::TEXT,
							'default' => esc_html__( 'For a limited time, get a free 4k TV when you join t-Mobile and buy an eligible Samsung smartphone.', 'themesflat-core' ),
							'label_block' => true,
							'condition' => [
								'style' => 'style7',
							],
						]
					);
					
					$this->add_control(
						'from',
						[
							'label' => esc_html__( 'From', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::TEXT,					
							'default' => esc_html__( 'From', 'themesflat-core' ),
							'label_block' => true,
							'condition' => [
								'style' => 'style2',
							],
						]
					);
					$this->add_control(
						'price_sale',
						[
							'label' => esc_html__( 'Price Sale', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::TEXT,					
							'default' => esc_html__( '$99.000', 'themesflat-core' ),
							'label_block' => true,
							'condition' => [
								'style' => 'style3',
							],
						]
					);
					$this->add_control(
						'price',
						[
							'label' => esc_html__( 'Price', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::TEXT,					
							'default' => esc_html__( '$287', 'themesflat-core' ),
							'label_block' => true,
							'condition' => [
								'style' => 'style2',
							],
						]
					);
					$this->add_control(
						'price3',
						[
							'label' => esc_html__( 'Price', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::TEXT,					
							'default' => esc_html__( '$80.000', 'themesflat-core' ),
							'label_block' => true,
							'condition' => [
								'style' => 'style3',
							],
						]
					);
					$this->add_control(
						'button_text',
						[
							'label' => esc_html__( 'Button Text', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::TEXT,
							'default' => esc_html__( 'Shop Now', 'themesflat-core' ),
							'label_block' => true,
							'condition' => [
								'style' => ['style1', 'style2','style3','style8'],
							],
						]
					);
					$this->add_control(
						'button_link',
						[
							'label' => esc_html__( 'Button Link', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::URL,
							'placeholder' => esc_html__( 'https://your-link.com', 'themesflat-core' ),
							'show_external' => true,
							'default' => [
								'url' => '#',
								'is_external' => false,
								'nofollow' => false,
							],
							'condition' => [
								'button_text!' => '',
								'style' => ['style1', 'style2','style3','style8'],
							],
						]
					);

					$this->add_control(
						'button_icon',
						[
							'label' => esc_html__( 'Button Icon ', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::ICONS,
							'default' => [
								'value' => 'fa fa-chevron-circle-right',
								'library' => 'fa-solid',
							],
							'condition' => [
								'button_text!' => '',
								'style' => ['style1', 'style2','style3','style8'],
							],
						]
					);

				$this->end_controls_tab();


				$this->start_controls_tab( 'style_tab', [ 'label' => esc_html__( 'Style', 'themesflat-core' ) ] );
					
					$this->add_control(
						'background_color',
						[
							'label' => esc_html__( 'Background Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .tf-products-banner .item-banner' => 'background-color: {{VALUE}}',
							],
						]
					);
					$this->add_group_control(
						\Elementor\Group_Control_Background::get_type(),
						[
							'name' => 'background_image',
							'label' => esc_html__( 'Background Image', 'themesflat-core' ),
							'types' => [ 'classic' ],
							'selector' => '{{WRAPPER}} .tf-products-banner .item-banner:before',
						]
					);

					$this->add_control(
						'h_image',
						[
							'label' => esc_html__( 'Image', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::HEADING,
							'separator' => 'before',
						]
					);
					$this->add_responsive_control(
						'image_size',
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
							'default' => [
								'unit' => 'px',
								'size' => 171,
							],
							'selectors' => [
								'{{WRAPPER}} .tf-products-banner .image ' => 'max-width: {{SIZE}}{{UNIT}};',
								'{{WRAPPER}} .tf-products-banner .image img' => 'width: {{SIZE}}{{UNIT}};',
							],
						]
					);

					$this->add_responsive_control(
						'image_right',
						[
							'label' => esc_html__( 'Right', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::SLIDER,
							'size_units' => [ 'px', '%' ],
							'mobile_default' => [

								'unit' => 'px',
								'size' => '15',
		
							],
							'range' => [
								'px' => [
									'min' => -1000,
									'max' => 1000,
									'step' => 1,
								],
							],
							
							'selectors' => [
								'{{WRAPPER}} .tf-products-banner .image ' => 'right: {{SIZE}}{{UNIT}} !important;',
							],
						]
					);
					$this->add_responsive_control(
						'image_bottom',
						[
							'label' => esc_html__( 'Botttom', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::SLIDER,
							'size_units' => [ 'px', '%' ],
							'range' => [
								'px' => [
									'min' => -1000,
									'max' => 1000,
									'step' => 1,
								],
							],
							'selectors' => [
								'{{WRAPPER}} .tf-products-banner .image ' => 'bottom: {{SIZE}}{{UNIT}};',
							],
						]
					);

					$this->add_responsive_control(
						'image_size2',
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
							'default' => [
								'unit' => 'px',
								'size' => 171,
							],
							'selectors' => [
								'{{WRAPPER}} .tf-products-banner .image2 ' => 'max-width: {{SIZE}}{{UNIT}};',
								'{{WRAPPER}} .tf-products-banner .image2 img' => 'width: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'style' => ['style4'],
							],
						]
					);

					$this->add_responsive_control(
						'image_right2',
						[
							'label' => esc_html__( 'Right', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::SLIDER,
							'size_units' => [ 'px', '%' ],
							'range' => [
								'px' => [
									'min' => -1000,
									'max' => 1000,
									'step' => 1,
								],
							],
							
							'selectors' => [
								'{{WRAPPER}} .tf-products-banner .image2 ' => 'right: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'style' => ['style4'],
							],
						]
					);
					$this->add_responsive_control(
						'image_bottom2',
						[
							'label' => esc_html__( 'Botttom', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::SLIDER,
							'size_units' => [ 'px', '%' ],
							'range' => [
								'px' => [
									'min' => -1000,
									'max' => 1000,
									'step' => 1,
								],
							],
							'selectors' => [
								'{{WRAPPER}} .tf-products-banner .image2 ' => 'bottom: {{SIZE}}{{UNIT}};',
							],
							'condition' => [
								'style' => ['style4'],
							],
						]
					);

					$this->add_control(
						'h_cat',
						[
							'label' => esc_html__( 'Category', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::HEADING,
							'separator' => 'before',
						]
					);
					$this->add_control(
						'cat_color',
						[
							'label' => esc_html__( 'Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .tf-products-banner .item-banner .category' => 'color: {{VALUE}}',
							],
						]
					);
					$this->add_group_control( 
			        	\Elementor\Group_Control_Typography::get_type(),
						[
							'name' => 'cat_typography',
							'label' => esc_html__( 'Typography', 'themesflat-core' ),
							'selector' => '{{WRAPPER}} .tf-products-banner .item-banner .category',
						]
					);

					$this->add_responsive_control(
						'margin_cat',
						[
							'label' => esc_html__( 'Margin', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::DIMENSIONS,
							'size_units' => ['px', 'em', '%'],
							'selectors' => [
								'{{WRAPPER}} .tf-products-banner .item-banner .category' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_control(
						'h_heading',
						[
							'label' => esc_html__( 'Heading', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::HEADING,
							'separator' => 'before',
						]
					);
					$this->add_control(
						'heading_color',
						[
							'label' => esc_html__( 'Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .tf-products-banner .item-banner .heading' => 'color: {{VALUE}}',
							],
						]
					);
					$this->add_group_control( 
			        	\Elementor\Group_Control_Typography::get_type(),
						[
							'name' => 'heading_typography',
							'label' => esc_html__( 'Typography', 'themesflat-core' ),
							'selector' => '{{WRAPPER}} .tf-products-banner .item-banner .heading',
						]
					);

					$this->add_responsive_control(
						'margin_heading',
						[
							'label' => esc_html__( 'Margin', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::DIMENSIONS,
							'size_units' => ['px', 'em', '%'],
							'selectors' => [
								'{{WRAPPER}} .tf-products-banner .item-banner .heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_control(
						'h_sub_heading',
						[
							'label' => esc_html__( 'Sub Heading', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::HEADING,
							'separator' => 'before',
						]
					);
					$this->add_control(
						'sub_heading_color',
						[
							'label' => esc_html__( 'Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .tf-products-banner .item-banner .sub-heading' => 'color: {{VALUE}}',
							],
						]
					);
					$this->add_group_control( 
			        	\Elementor\Group_Control_Typography::get_type(),
						[
							'name' => 'sub_heading_typography',
							'label' => esc_html__( 'Typography', 'themesflat-core' ),
							'selector' => '{{WRAPPER}} .tf-products-banner .item-banner .sub-heading',
						]
					);

					$this->add_responsive_control(
						'margin_sub',
						[
							'label' => esc_html__( 'Margin', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::DIMENSIONS,
							'size_units' => ['px', 'em', '%'],
							'selectors' => [
								'{{WRAPPER}} .tf-products-banner .item-banner .sub-heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_control(
						'h_sub_labeltext',
						[
							'label' => esc_html__( 'Label Text', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::HEADING,
							'separator' => 'before',
							'condition' => [
								'style' => ['style8'],
							],
						]
					);
					$this->add_control(
						'sub_labeltext_color2',
						[
							'label' => esc_html__( 'Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .tf-products-banner .item-banner .label-text ' => 'color: {{VALUE}}',
							],
							'condition' => [
								'style' => ['style8'],
							],
						]
					);
					$this->add_group_control( 
			        	\Elementor\Group_Control_Typography::get_type(),
						[
							'name' => 'sub_labeltext_typography',
							'label' => esc_html__( 'Typography', 'themesflat-core' ),
							'selector' => '{{WRAPPER}} .tf-products-banner .item-banner .label-text ',
							'condition' => [
								'style' => ['style8'],
							],
						]
					);

					$this->add_responsive_control(
						'margin_labeltext',
						[
							'label' => esc_html__( 'Margin', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::DIMENSIONS,
							'size_units' => ['px', 'em', '%'],
							'selectors' => [
								'{{WRAPPER}} .tf-products-banner .item-banner .label-text ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
							'condition' => [
								'style' => ['style8'],
							],
						]
					);

					$this->add_control(
						'h_sub_labeltext2',
						[
							'label' => esc_html__( 'Label Price', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::HEADING,
							'separator' => 'before',
							'condition' => [
								'style' => ['style8','style2','style3'],
							],
						]
					);

					$this->add_control(
						'sub_labeltext2_color',
						[
							'label' => esc_html__( 'Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .tf-products-banner .item-banner .price ' => 'color: {{VALUE}}',
							],
							'condition' => [
								'style' => ['style8','style2','style3'],
							],
						]
					);
					$this->add_group_control( 
			        	\Elementor\Group_Control_Typography::get_type(),
						[
							'name' => 'sub_labeltext2_typography',
							'label' => esc_html__( 'Typography', 'themesflat-core' ),
							'selector' => '{{WRAPPER}} .tf-products-banner .item-banner .price ',
							'condition' => [
								'style' => ['style8','style2','style3'],
							],
						]
					);

					$this->add_responsive_control(
						'margin_labeltext2',
						[
							'label' => esc_html__( 'Margin', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::DIMENSIONS,
							'size_units' => ['px', 'em', '%'],
							'selectors' => [
								'{{WRAPPER}} .tf-products-banner .item-banner .price ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
							'condition' => [
								'style' => ['style8','style2','style3'],
							],
						]
					);

					$this->add_control(
						'h_sub_labeltext3',
						[
							'label' => esc_html__( 'Label Price Sale', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::HEADING,
							'separator' => 'before',
							'condition' => [
								'style' => ['style3'],
							],
						]
					);

					$this->add_control(
						'sub_labeltext3_color',
						[
							'label' => esc_html__( 'Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .tf-products-banner .item-banner .price-sale ' => 'color: {{VALUE}}',
							],
							'condition' => [
								'style' => ['style3'],
							],
						]
					);
					$this->add_group_control( 
			        	\Elementor\Group_Control_Typography::get_type(),
						[
							'name' => 'sub_labeltext3_typography',
							'label' => esc_html__( 'Typography', 'themesflat-core' ),
							'selector' => '{{WRAPPER}} .tf-products-banner .item-banner .price-sale ',
							'condition' => [
								'style' => ['style3'],
							],
						]
					);

					$this->add_responsive_control(
						'margin_labeltext4',
						[
							'label' => esc_html__( 'Margin', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::DIMENSIONS,
							'size_units' => ['px', 'em', '%'],
							'selectors' => [
								'{{WRAPPER}} .tf-products-banner .item-banner .price-sale ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
							'condition' => [
								'style' => ['style3'],
							],
						]
					);


					$this->add_control(
						'h_sub_labeltext5',
						[
							'label' => esc_html__( 'Sub Heading', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::HEADING,
							'separator' => 'before',
						]
					);
					$this->add_control(
						'sub_labeltext_color',
						[
							'label' => esc_html__( 'Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .tf-products-banner .item-banner .sub-heading' => 'color: {{VALUE}}',
							],
						]
					);
					$this->add_group_control( 
			        	\Elementor\Group_Control_Typography::get_type(),
						[
							'name' => 'sub_labeltext_typography2',
							'label' => esc_html__( 'Typography', 'themesflat-core' ),
							'selector' => '{{WRAPPER}} .tf-products-banner .item-banner .sub-heading',
						]
					);

					$this->add_responsive_control(
						'margin_labeltext3',
						[
							'label' => esc_html__( 'Margin', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::DIMENSIONS,
							'size_units' => ['px', 'em', '%'],
							'selectors' => [
								'{{WRAPPER}} .tf-products-banner .item-banner .sub-heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_control(
						'h_button',
						[
							'label' => esc_html__( 'Button', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::HEADING,
							'separator' => 'before',
						]
					);
					$this->add_control(
						'button_color',
						[
							'label' => esc_html__( 'Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .tf-products-banner .item-banner .button-banner' => 'color: {{VALUE}}',
							],
						]
					);
					$this->add_control(
						'button_bgcolor',
						[
							'label' => esc_html__( 'Background Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .tf-products-banner .item-banner .button-banner' => 'background-color: {{VALUE}}',
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
								'{{WRAPPER}} .tf-products-banner .item-banner .button-banner:hover' => 'color: {{VALUE}}',
							],
						]
					);
					$this->add_control(
						'button_bgcolor_hover',
						[
							'label' => esc_html__( 'Background Color Hover', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .tf-products-banner .item-banner .button-banner:hover' => 'background-color: {{VALUE}}',
							],
						]
					);
					$this->add_group_control( 
			        	\Elementor\Group_Control_Typography::get_type(),
						[
							'name' => 'button_typography',
							'label' => esc_html__( 'Typography', 'themesflat-core' ),
							'selector' => '{{WRAPPER}} .tf-products-banner .item-banner .button-banner',
						]
					);
					$this->add_responsive_control( 'button_padding',
						[
							'label' => esc_html__( 'Padding', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::DIMENSIONS,
							'size_units' => ['px', 'em', '%'],
							'selectors' => [
								'{{WRAPPER}} .tf-products-banner .item-banner .button-banner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
					$this->add_responsive_control(
						'margin_button',
						[
							'label' => esc_html__( 'Margin', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::DIMENSIONS,
							'size_units' => ['px', 'em', '%'],
							'selectors' => [
								'{{WRAPPER}} .tf-products-banner .item-banner .button-banner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
				$this->end_controls_tab();
			$this->end_controls_tabs();		
			
			
	        
			$this->end_controls_section();
        // /.End List Setting  

	    // Start Style Style
			$this->start_controls_section(
				'section_style',
				[
					'label' => esc_html__( 'Style', 'themesflat-core' ),
					'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);

			$this->add_responsive_control(
				'wrap_width',
				[
					'label' => esc_html__( 'Width Content', 'themesflat-core' ),
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
						'{{WRAPPER}} .tf-products-banner .item-banner .inner ' => 'max-width: {{SIZE}}{{UNIT}};',
					],
					
				]
			);


			$this->add_responsive_control( 'wrap_nav_padding',
	            [
	                'label' => esc_html__( 'Padding', 'themesflat-core' ),
	                'type' => \Elementor\Controls_Manager::DIMENSIONS,
	                'size_units' => ['px', 'em', '%'],
	                'selectors' => [
	                    '{{WRAPPER}} .tf-products-banner .item-banner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

            $this->add_responsive_control(
				'margin_item',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
	                'size_units' => ['px', 'em', '%'],
	                'selectors' => [
	                    '{{WRAPPER}} .tf-products-banner .item-banner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
				]
			);

			$this->end_controls_section();
		// /.End Style 

	}	

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();		

		$this->add_render_attribute( 'tf_products_banner', ['id' => "tf-products-banner-{$this->get_id()}", 'class' => ['tf-products-banner', $settings['style'] ], 'data-tabid' => $this->get_id() ] );
        ?>
		<a class="test" href="<?php echo esc_attr($settings['link_banner']); ?>">
        <div <?php echo $this->get_render_attribute_string('tf_products_banner') ?>>
		
			<div class="image"><img src="<?php echo esc_attr($settings['image']['url']); ?>" alt="image"></div>
			<?php if ($settings['style'] == 'style4') {?>
			<div class="image2"><img src="<?php echo esc_attr($settings['image2']['url']); ?>" alt="image"></div>
			<?php } ?>
			<?php
				$attr['settings'] = $settings; 
				tf_get_template_widget("product-banner/{$settings['style']}", $attr);
				?>
		
	    </div>
		</a>
        <?php 		
	}

}