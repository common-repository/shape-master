<?php
/**
 * @package  Shape Master
 */
namespace Inc\Core;
use Elementor\Elementor_Base;
use Elementor\Controls_Manager;
use Elementor\Element_Base;
use Elementor\Widget_Base;
use Elementor\Repeater;
use \Inc\Core\ElsmController;

class ElsmShapeMaster extends ElsmController
{



    public function register(){
        // Injecting exp section shape
        add_action( 'elementor/element/section/section_layout/after_section_end', [ $this, 'exp_inject_section_shape_extensions'], 10);

        // ex section shape before render
        add_action( 'elementor/frontend/section/before_render', [ $this, 'exp_section_shape_before_render'] );

        /*-- Custom css compatible with elementor --*/
        add_action( 'elementor/element/parse_css', [ $this, 'exp_section_shape_css' ], 10, 2 );
    }

    /**
     * Inject Scrolling Effect Ectensions
     *
     * injecting scrolling effect extension
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function exp_inject_section_shape_extensions($element){
        $element->start_injection( [
            'at' => 'after',
            'of' => 'html-tag',
        ] );
        // add a control
        $element->start_controls_section(
            'ex_section_shape',
            [
                'label' => 'XP Shapes',
                'tab'   => \Elementor\Controls_Manager::TAB_LAYOUT
            ]
        );

        $element->add_control(
            'ex_sec_shape_one',
            [
                'label' => __( '<b>Shape One</b>', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_off' => __( 'No', 'shape-master' ),
                'label_on' => __( 'Yes', 'shape-master' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $element->add_control(
            'ex_shape_one_style',
            [
                'label' => __( 'Style', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default'  => __( 'Default', 'shape-master' ),
                    'triangle' => __( 'Triangle', 'shape-master' ),
                    'parallelogram' => __( 'Parallelogram', 'shape-master' ),
                    'pentagon' => __( 'Pentagon', 'shape-master' ),
                ],
                'condition' => [
                    'ex_sec_shape_one'  => 'yes'
                ],
            ]
        );

        $element->add_responsive_control(
            'ex_shape_one_style_value_1',
            [
                'label' => __( 'P1 (x%)', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => 50,
                'conditions' => [
                    'terms' => [
                        [
                            'name'	=> 'ex_sec_shape_one',
                            'value'	=> 'yes'
                        ],
                        [
                            'relation' => 'or',
                            'terms' => [
                                [
                                    'name'  => 'ex_shape_one_style',
                                    'value' => 'triangle',
                                ],
                                [
                                    'name'  => 'ex_shape_one_style',
                                    'value' => 'parallelogram',
                                ],
                                [
                                    'name'  => 'ex_shape_one_style',
                                    'value' => 'pentagon',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );

        $element->add_responsive_control(
            'ex_shape_one_style_value_2',
            [
                'label' => __( 'P1 (y%)', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => 0,
                'conditions' => [
                    'terms' => [
                        [
                            'name'	=> 'ex_sec_shape_one',
                            'value'	=> 'yes'
                        ],
                        [
                            'relation' => 'or',
                            'terms' => [
                                [
                                    'name'  => 'ex_shape_one_style',
                                    'value' => 'triangle',
                                ],
                                [
                                    'name'  => 'ex_shape_one_style',
                                    'value' => 'parallelogram',
                                ],
                                [
                                    'name'  => 'ex_shape_one_style',
                                    'value' => 'pentagon',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );

        $element->add_responsive_control(
            'ex_shape_one_style_value_3',
            [
                'label' => __( 'P2 (x%)', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => 0,
                'conditions' => [
                    'terms' => [
                        [
                            'name'	=> 'ex_sec_shape_one',
                            'value'	=> 'yes'
                        ],
                        [
                            'relation' => 'or',
                            'terms' => [
                                [
                                    'name'  => 'ex_shape_one_style',
                                    'value' => 'triangle',
                                ],
                                [
                                    'name'  => 'ex_shape_one_style',
                                    'value' => 'parallelogram',
                                ],
                                [
                                    'name'  => 'ex_shape_one_style',
                                    'value' => 'pentagon',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );

        $element->add_responsive_control(
            'ex_shape_one_style_value_4',
            [
                'label' => __( 'P2 (y%)', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => 100,
                'conditions' => [
                    'terms' => [
                        [
                            'name'	=> 'ex_sec_shape_one',
                            'value'	=> 'yes'
                        ],
                        [
                            'relation' => 'or',
                            'terms' => [
                                [
                                    'name'  => 'ex_shape_one_style',
                                    'value' => 'triangle',
                                ],
                                [
                                    'name'  => 'ex_shape_one_style',
                                    'value' => 'parallelogram',
                                ],
                                [
                                    'name'  => 'ex_shape_one_style',
                                    'value' => 'pentagon',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );

        $element->add_responsive_control(
            'ex_shape_one_style_value_5',
            [
                'label' => __( 'P3 (x%)', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => 100,
                'conditions' => [
                    'terms' => [
                        [
                            'name'	=> 'ex_sec_shape_one',
                            'value'	=> 'yes'
                        ],
                        [
                            'relation' => 'or',
                            'terms' => [
                                [
                                    'name'  => 'ex_shape_one_style',
                                    'value' => 'triangle',
                                ],
                                [
                                    'name'  => 'ex_shape_one_style',
                                    'value' => 'parallelogram',
                                ],
                                [
                                    'name'  => 'ex_shape_one_style',
                                    'value' => 'pentagon',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );

        $element->add_responsive_control(
            'ex_shape_one_style_value_6',
            [
                'label' => __( 'P3 (y%)', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => 100,
                'conditions' => [
                    'terms' => [
                        [
                            'name'	=> 'ex_sec_shape_one',
                            'value'	=> 'yes'
                        ],
                        [
                            'relation' => 'or',
                            'terms' => [
                                [
                                    'name'  => 'ex_shape_one_style',
                                    'value' => 'triangle',
                                ],
                                [
                                    'name'  => 'ex_shape_one_style',
                                    'value' => 'parallelogram',
                                ],
                                [
                                    'name'  => 'ex_shape_one_style',
                                    'value' => 'pentagon',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );

        $element->add_responsive_control(
            'ex_shape_one_style_value_7',
            [
                'label' => __( 'P4 (x%)', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => 50,
                'conditions' => [
                    'terms' => [
                        [
                            'name'	=> 'ex_sec_shape_one',
                            'value'	=> 'yes'
                        ],
                        [
                            'relation' => 'or',
                            'terms' => [
                                [
                                    'name'  => 'ex_shape_one_style',
                                    'value' => 'parallelogram',
                                ],
                                [
                                    'name'  => 'ex_shape_one_style',
                                    'value' => 'pentagon',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );

        $element->add_responsive_control(
            'ex_shape_one_style_value_8',
            [
                'label' => __( 'P4 (y%)', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => 50,
                'conditions' => [
                    'terms' => [
                        [
                            'name'	=> 'ex_sec_shape_one',
                            'value'	=> 'yes'
                        ],
                        [
                            'relation' => 'or',
                            'terms' => [
                                [
                                    'name'  => 'ex_shape_one_style',
                                    'value' => 'parallelogram',
                                ],
                                [
                                    'name'  => 'ex_shape_one_style',
                                    'value' => 'pentagon',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );

        $element->add_responsive_control(
            'ex_shape_one_style_value_9',
            [
                'label' => __( 'P5 (x%)', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => 50,
                'conditions' => [
                    'terms' => [
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name'	=> 'ex_sec_shape_one',
                                    'value'	=> 'yes'
                                ],
                                [
                                    'name'  => 'ex_shape_one_style',
                                    'value' => 'pentagon',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );

        $element->add_responsive_control(
            'ex_shape_one_style_value_10',
            [
                'label' => __( 'P5 (y%)', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => 50,
                'conditions' => [
                    'terms' => [
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name'	=> 'ex_sec_shape_one',
                                    'value'	=> 'yes'
                                ],
                                [
                                    'name'  => 'ex_shape_one_style',
                                    'value' => 'pentagon',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );

        $element->add_responsive_control(
            'ex_shape_one_width',
            [
                'label' => __( 'Width', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'desktop_default' => [
                    'size' => 30,
                    'unit' => '%',
                ],
                'tablet_default' => [
                    'size' => 20,
                    'unit' => '%',
                ],
                'mobile_default' => [
                    'size' => 10,
                    'unit' => '%',
                ],
                'condition' => [
                    'ex_sec_shape_one'  => 'yes'
                ],
            ]
        );
        $element->add_responsive_control(
            'ex_shape_one_height',
            [
                'label' => __( 'Height', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 50,
                ],
                'condition' => [
                    'ex_sec_shape_one'  => 'yes'
                ],
            ]
        );
        $element->add_control(
            'ex_shape_one_bg_type',
            [
                'label' => __( 'Background Type', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'label_block' => false,
                'toggle' => false,
                'default' => 'classic',
                'options' => [
                    'classic' => [
                        'title' => __( 'Classic', 'shape-master' ),
                        'icon' => 'eicon-paint-brush',
                    ],
                    'gradient' => [
                        'title' => __( 'Gradient', 'shape-master' ),
                        'icon' => 'eicon-barcode',
                    ],
                ],
                'render_type' => 'ui',
                'condition' => [
                    'ex_sec_shape_one' => 'yes',
                ],
            ]
        );
        $element->add_control(
            'ex_shape_one_bg_color',
            [
                'label' => __( 'Color', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Scheme_Color::get_type(),
                    'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name'	=> 'ex_sec_shape_one',
                                    'value'	=> 'yes'
                                ],
                                [
                                    'name'     => 'ex_shape_one_bg_type',
                                    'value'    => 'classic',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );
        $element->add_control(
            'ex_shape_one_bg_image',
            [
                'label' => __( 'Image', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'conditions' => [
                    'terms' => [
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name'	=> 'ex_sec_shape_one',
                                    'value'	=> 'yes'
                                ],
                                [
                                    'name'     => 'ex_shape_one_bg_type',
                                    'value'    => 'classic',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );
        $element->add_control(
            'ex_shape_one_bg_image_pos_x',
            [
                'label' => __( 'Position X', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 50,
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name'  => 'ex_sec_shape_one',
                                    'value' => 'yes'
                                ],
                                [
                                    'name'     => 'ex_shape_one_bg_type',
                                    'value'    => 'classic',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );
        $element->add_control(
            'ex_shape_one_bg_image_pos_y',
            [
                'label' => __( 'Position Y', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 50,
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name'  => 'ex_sec_shape_one',
                                    'value' => 'yes'
                                ],
                                [
                                    'name'     => 'ex_shape_one_bg_type',
                                    'value'    => 'classic',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );
        $element->add_control(
            'ex_shape_one_bg_image_size',
            [
                'label' => __( 'Size', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 50,
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name'  => 'ex_sec_shape_one',
                                    'value' => 'yes'
                                ],
                                [
                                    'name'     => 'ex_shape_one_bg_type',
                                    'value'    => 'classic',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );
        $element->add_control(
            'ex_shape_one_grad_color_1',
            [
                'label' => __( 'First Color', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Scheme_Color::get_type(),
                    'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name'	=> 'ex_sec_shape_one',
                                    'value'	=> 'yes'
                                ],
                                [
                                    'name'     => 'ex_shape_one_bg_type',
                                    'value'    => 'gradient',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );
        $element->add_control(
            'ex_shape_one_grad_color_1_location',
            [
                'label' => __( 'Location', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ '%' ],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 0,
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name'	=> 'ex_sec_shape_one',
                                    'value'	=> 'yes'
                                ],
                                [
                                    'name'     => 'ex_shape_one_bg_type',
                                    'value'    => 'gradient',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );
        $element->add_control(
            'ex_shape_one_grad_color_2',
            [
                'label' => __( 'Second Color', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Scheme_Color::get_type(),
                    'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name'	=> 'ex_sec_shape_one',
                                    'value'	=> 'yes'
                                ],
                                [
                                    'name'     => 'ex_shape_one_bg_type',
                                    'value'    => 'gradient',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );
        $element->add_control(
            'ex_shape_one_grad_color_2_location',
            [
                'label' => __( 'Location', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ '%' ],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 0,
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name'	=> 'ex_sec_shape_one',
                                    'value'	=> 'yes'
                                ],
                                [
                                    'name'     => 'ex_shape_one_bg_type',
                                    'value'    => 'gradient',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );

        $element->add_control(
            'ex_shape_one_grad_color_type',
            [
                'label' => __( 'Type', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'linear-gradient',
                'options' => [
                    'linear-gradient' => __( 'Linear', 'shape-master' ),
                    'radial-gradient'  => __( 'Radial', 'shape-master' ),
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name'	=> 'ex_sec_shape_one',
                                    'value'	=> 'yes'
                                ],
                                [
                                    'name'     => 'ex_shape_one_bg_type',
                                    'value'    => 'gradient',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );

        $element->add_control(
            'ex_shape_one_grad_color_lin_angle',
            [
                'label' => __( 'Angle', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'deg' ],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 359,
                    ],
                ],
                'default' => [
                    'unit' => 'deg',
                    'size' => 0,
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name'	=> 'ex_sec_shape_one',
                            'value'	=> 'yes'
                        ],
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name'	=> 'ex_shape_one_grad_color_type',
                                    'value'	=> 'linear-gradient'
                                ],
                                [
                                    'name'     => 'ex_shape_one_bg_type',
                                    'value'    => 'gradient',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );
        $element->add_control(
            'ex_shape_one_grad_color_rad_position',
            [
                'label' => __( 'Position', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'center center',
                'options' => [
                    'center center' => __( 'Center Center', 'shape-master' ),
                    'center left' => __( 'Center Left', 'shape-master' ),
                    'center right' => __( 'Center Right', 'shape-master' ),
                    'top center' => __( 'Top Center', 'shape-master' ),
                    'top left' => __( 'Top Left', 'shape-master' ),
                    'top right' => __( 'Top Right', 'shape-master' ),
                    'bottom center' => __( 'Bottom Center', 'shape-master' ),
                    'bottom left' => __( 'Bottom Left', 'shape-master' ),
                    'bottom right' => __( 'Bottom Right', 'shape-master' ),
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name'	=> 'ex_sec_shape_one',
                            'value'	=> 'yes'
                        ],
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name'	=> 'ex_shape_one_grad_color_type',
                                    'value'	=> 'radial-gradient'
                                ],
                                [
                                    'name'     => 'ex_shape_one_bg_type',
                                    'value'    => 'gradient',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );
        $element->add_control(
            'ex_shape_one_border_radius',
            [
                'label' => __( 'Border Radius', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'conditions' => [
                    'terms' => [
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name'	=> 'ex_sec_shape_one',
                                    'value'	=> 'yes'
                                ],
                                [
                                    'name'     => 'ex_shape_one_style',
                                    'value'    => 'default',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );
        $element->add_control(
            'ex_shape_one_z_index',
            [
                'label' => __( 'z-Index', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => -100,
                'step' => 1,
                'default' => 1,
                'label_block' => false,
                'condition' => [
                    'ex_sec_shape_one'  => 'yes'
                ],
            ]
        );


        $element->add_control(
            'ex_shape_one_position_h',
            [
                'label' => __( 'Horizontal Position', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'label_block' => false,
                'toggle' => false,
                'default' => 'left',
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'shape-master' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'shape-master' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'render_type' => 'ui',
                'condition' => [
                    'ex_sec_shape_one' => 'yes',
                ],
            ]
        );
        $element->add_responsive_control(
            'ex_shape_one_offset_x',
            [
                'label' => __( 'Offset', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -200,
                        'max' => 200,
                    ],
                ],
                'default' => [
                    'size' => '0',
                ],
                'size_units' => [ 'px', '%' ],
                'condition' => [
                    'ex_sec_shape_one' => 'yes',
                ],
            ]
        );

        $element->add_control(
            'ex_shape_one_position_v',
            [
                'label' => __( 'Vertical Position', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'label_block' => false,
                'toggle' => false,
                'default' => 'top',
                'options' => [
                    'top' => [
                        'title' => __( 'Top', 'shape-master' ),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'bottom' => [
                        'title' => __( 'Bottom', 'shape-master' ),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'render_type' => 'ui',
                'condition' => [
                    'ex_sec_shape_one' => 'yes',
                ],
            ]
        );
        $element->add_responsive_control(
            'ex_shape_one_offset_y',
            [
                'label' => __( 'Offset', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -200,
                        'max' => 200,
                    ],
                ],
                'default' => [
                    'size' => '0',
                ],
                'size_units' => [ 'px', '%' ],
                'condition' => [
                    'ex_sec_shape_one' => 'yes',
                ],
            ]
        );

        $element->add_control(
            'ex_shape_one_transform',
            [
                'label' => __( 'Transform', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'shape-master' ),
                'label_off' => __( 'No', 'shape-master' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'ex_sec_shape_one' => 'yes',
                ],
            ]
        );
        $element->add_responsive_control(
            'ex_shape_one_transform_scale',
            [
                'label' => __( 'Scale', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0.1,
                'max' => 2,
                'step' => 0.1,
                'default' => 1,
                'conditions' => [
                    'terms' => [
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name'	=> 'ex_sec_shape_one',
                                    'value'	=> 'yes'
                                ],
                                [
                                    'name'     => 'ex_shape_one_transform',
                                    'value'    => 'yes',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );
        $element->add_responsive_control(
            'ex_shape_one_transform_rotate',
            [
                'label' => __( 'Rotate', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'deg' ],
                'range' => [
                    'deg' => [
                        'min' => 0,
                        'max' => 360,
                        'step' => 1,
                    ]
                ],
                'default' => [
                    'unit' => 'deg',
                    'size' => 0,
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name'	=> 'ex_sec_shape_one',
                                    'value'	=> 'yes'
                                ],
                                [
                                    'name'     => 'ex_shape_one_transform',
                                    'value'    => 'yes',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );
        $element->add_responsive_control(
            'ex_shape_one_transform_translate_x',
            [
                'label' => __( 'Translate X', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => -500,
                        'max' => 500,
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
                'conditions' => [
                    'terms' => [
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name'	=> 'ex_sec_shape_one',
                                    'value'	=> 'yes'
                                ],
                                [
                                    'name'     => 'ex_shape_one_transform',
                                    'value'    => 'yes',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );
        $element->add_responsive_control(
            'ex_shape_one_transform_translate_y',
            [
                'label' => __( 'Translate Y', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => -500,
                        'max' => 500,
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
                'conditions' => [
                    'terms' => [
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name'	=> 'ex_sec_shape_one',
                                    'value'	=> 'yes'
                                ],
                                [
                                    'name'     => 'ex_shape_one_transform',
                                    'value'    => 'yes',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );
        $element->add_responsive_control(
            'ex_shape_one_transform_skew_x',
            [
                'label' => __( 'Skew X', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'deg' ],
                'range' => [
                    'deg' => [
                        'min' => -90,
                        'max' => 90,
                        'step' => 1,
                    ]
                ],
                'default' => [
                    'unit' => 'deg',
                    'size' => 0,
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name'	=> 'ex_sec_shape_one',
                                    'value'	=> 'yes'
                                ],
                                [
                                    'name'     => 'ex_shape_one_transform',
                                    'value'    => 'yes',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );
        $element->add_responsive_control(
            'ex_shape_one_transform_skew_y',
            [
                'label' => __( 'Skew Y', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'deg' ],
                'range' => [
                    'deg' => [
                        'min' => -90,
                        'max' => 90,
                        'step' => 1,
                    ]
                ],
                'default' => [
                    'unit' => 'deg',
                    'size' => 0,
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name'	=> 'ex_sec_shape_one',
                                    'value'	=> 'yes'
                                ],
                                [
                                    'name'     => 'ex_shape_one_transform',
                                    'value'    => 'yes',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );
        $element->add_control(
            'ex_shape_one_transform_origin',
            [
                'label' => __( 'Transform Origin', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default'  => __( 'Default', 'shape-master' ),
                    'top left' => __( 'Top Left', 'shape-master' ),
                    'top right' => __( 'Top Right', 'shape-master' ),
                    'center top' => __( 'Center Top', 'shape-master' ),
                    'center bottom' => __( 'Center Bottom', 'shape-master' ),
                    'center left' => __( 'Center Left', 'shape-master' ),
                    'center right' => __( 'Center Right', 'shape-master' ),
                    'center center' => __( 'Center Center', 'shape-master' ),
                    'bottom left' => __( 'Bottom Left', 'shape-master' ),
                    'bottom right' => __( 'Bottom Right', 'shape-master' ),
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name'	=> 'ex_sec_shape_one',
                                    'value'	=> 'yes'
                                ],
                                [
                                    'name'     => 'ex_shape_one_transform',
                                    'value'    => 'yes',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );


        $element->add_control(
            'ex_sec_shape_two',
            [
                'label' => __( '<b>Shape Two</b>', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_off' => __( 'No', 'shape-master' ),
                'label_on' => __( 'Yes', 'shape-master' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $element->add_control(
            'ex_shape_two_style',
            [
                'label' => __( 'Style', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default'  => __( 'Default', 'shape-master' ),
                    'triangle' => __( 'Triangle', 'shape-master' ),
                    'parallelogram' => __( 'Parallelogram', 'shape-master' ),
                    'pentagon' => __( 'Pentagon', 'shape-master' ),
                ],
                'condition' => [
                    'ex_sec_shape_two'  => 'yes'
                ],
            ]
        );

        $element->add_responsive_control(
            'ex_shape_two_style_value_1',
            [
                'label' => __( 'P1 (x%)', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => 50,
                'conditions' => [
                    'terms' => [
                        [
                            'name'	=> 'ex_sec_shape_two',
                            'value'	=> 'yes'
                        ],
                        [
                            'relation' => 'or',
                            'terms' => [
                                [
                                    'name'  => 'ex_shape_two_style',
                                    'value' => 'triangle',
                                ],
                                [
                                    'name'  => 'ex_shape_two_style',
                                    'value' => 'parallelogram',
                                ],
                                [
                                    'name'  => 'ex_shape_two_style',
                                    'value' => 'pentagon',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );

        $element->add_responsive_control(
            'ex_shape_two_style_value_2',
            [
                'label' => __( 'P1 (y%)', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => 0,
                'conditions' => [
                    'terms' => [
                        [
                            'name'	=> 'ex_sec_shape_two',
                            'value'	=> 'yes'
                        ],
                        [
                            'relation' => 'or',
                            'terms' => [
                                [
                                    'name'  => 'ex_shape_two_style',
                                    'value' => 'triangle',
                                ],
                                [
                                    'name'  => 'ex_shape_two_style',
                                    'value' => 'parallelogram',
                                ],
                                [
                                    'name'  => 'ex_shape_two_style',
                                    'value' => 'pentagon',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );

        $element->add_responsive_control(
            'ex_shape_two_style_value_3',
            [
                'label' => __( 'P2 (x%)', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => 0,
                'conditions' => [
                    'terms' => [
                        [
                            'name'	=> 'ex_sec_shape_two',
                            'value'	=> 'yes'
                        ],
                        [
                            'relation' => 'or',
                            'terms' => [
                                [
                                    'name'  => 'ex_shape_two_style',
                                    'value' => 'triangle',
                                ],
                                [
                                    'name'  => 'ex_shape_two_style',
                                    'value' => 'parallelogram',
                                ],
                                [
                                    'name'  => 'ex_shape_two_style',
                                    'value' => 'pentagon',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );

        $element->add_responsive_control(
            'ex_shape_two_style_value_4',
            [
                'label' => __( 'P2 (y%)', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => 100,
                'conditions' => [
                    'terms' => [
                        [
                            'name'	=> 'ex_sec_shape_two',
                            'value'	=> 'yes'
                        ],
                        [
                            'relation' => 'or',
                            'terms' => [
                                [
                                    'name'  => 'ex_shape_two_style',
                                    'value' => 'triangle',
                                ],
                                [
                                    'name'  => 'ex_shape_two_style',
                                    'value' => 'parallelogram',
                                ],
                                [
                                    'name'  => 'ex_shape_two_style',
                                    'value' => 'pentagon',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );

        $element->add_responsive_control(
            'ex_shape_two_style_value_5',
            [
                'label' => __( 'P3 (x%)', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => 100,
                'conditions' => [
                    'terms' => [
                        [
                            'name'	=> 'ex_sec_shape_two',
                            'value'	=> 'yes'
                        ],
                        [
                            'relation' => 'or',
                            'terms' => [
                                [
                                    'name'  => 'ex_shape_two_style',
                                    'value' => 'triangle',
                                ],
                                [
                                    'name'  => 'ex_shape_two_style',
                                    'value' => 'parallelogram',
                                ],
                                [
                                    'name'  => 'ex_shape_two_style',
                                    'value' => 'pentagon',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );

        $element->add_responsive_control(
            'ex_shape_two_style_value_6',
            [
                'label' => __( 'P3 (y%)', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => 100,
                'conditions' => [
                    'terms' => [
                        [
                            'name'	=> 'ex_sec_shape_two',
                            'value'	=> 'yes'
                        ],
                        [
                            'relation' => 'or',
                            'terms' => [
                                [
                                    'name'  => 'ex_shape_two_style',
                                    'value' => 'triangle',
                                ],
                                [
                                    'name'  => 'ex_shape_two_style',
                                    'value' => 'parallelogram',
                                ],
                                [
                                    'name'  => 'ex_shape_two_style',
                                    'value' => 'pentagon',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );

        $element->add_responsive_control(
            'ex_shape_two_style_value_7',
            [
                'label' => __( 'P4 (x%)', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => 50,
                'conditions' => [
                    'terms' => [
                        [
                            'name'	=> 'ex_sec_shape_two',
                            'value'	=> 'yes'
                        ],
                        [
                            'relation' => 'or',
                            'terms' => [
                                [
                                    'name'  => 'ex_shape_two_style',
                                    'value' => 'parallelogram',
                                ],
                                [
                                    'name'  => 'ex_shape_two_style',
                                    'value' => 'pentagon',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );

        $element->add_responsive_control(
            'ex_shape_two_style_value_8',
            [
                'label' => __( 'P4 (y%)', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => 50,
                'conditions' => [
                    'terms' => [
                        [
                            'name'	=> 'ex_sec_shape_two',
                            'value'	=> 'yes'
                        ],
                        [
                            'relation' => 'or',
                            'terms' => [
                                [
                                    'name'  => 'ex_shape_two_style',
                                    'value' => 'parallelogram',
                                ],
                                [
                                    'name'  => 'ex_shape_two_style',
                                    'value' => 'pentagon',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );

        $element->add_responsive_control(
            'ex_shape_two_style_value_9',
            [
                'label' => __( 'P5 (x%)', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => 50,
                'conditions' => [
                    'terms' => [
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name'	=> 'ex_sec_shape_two',
                                    'value'	=> 'yes'
                                ],
                                [
                                    'name'  => 'ex_shape_two_style',
                                    'value' => 'pentagon',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );

        $element->add_responsive_control(
            'ex_shape_two_style_value_10',
            [
                'label' => __( 'P5 (y%)', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => 50,
                'conditions' => [
                    'terms' => [
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name'	=> 'ex_sec_shape_two',
                                    'value'	=> 'yes'
                                ],
                                [
                                    'name'  => 'ex_shape_two_style',
                                    'value' => 'pentagon',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );

        $element->add_responsive_control(
            'ex_shape_two_width',
            [
                'label' => __( 'Width', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'desktop_default' => [
                    'size' => 30,
                    'unit' => '%',
                ],
                'tablet_default' => [
                    'size' => 20,
                    'unit' => '%',
                ],
                'mobile_default' => [
                    'size' => 10,
                    'unit' => '%',
                ],
                'condition' => [
                    'ex_sec_shape_two'  => 'yes'
                ],
            ]
        );
        $element->add_responsive_control(
            'ex_shape_two_height',
            [
                'label' => __( 'Height', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 50,
                ],
                'condition' => [
                    'ex_sec_shape_two'  => 'yes'
                ],
            ]
        );

        $element->add_control(
            'ex_shape_two_bg_type',
            [
                'label' => __( 'Background Type', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'label_block' => false,
                'toggle' => false,
                'default' => 'classic',
                'options' => [
                    'classic' => [
                        'title' => __( 'Classic', 'shape-master' ),
                        'icon' => 'eicon-paint-brush',
                    ],
                    'gradient' => [
                        'title' => __( 'Gradient', 'shape-master' ),
                        'icon' => 'eicon-barcode',
                    ],
                ],
                'render_type' => 'ui',
                'condition' => [
                    'ex_sec_shape_two' => 'yes',
                ],
            ]
        );
        $element->add_control(
            'ex_shape_two_bg_color',
            [
                'label' => __( 'Color', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Scheme_Color::get_type(),
                    'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name'	=> 'ex_sec_shape_two',
                                    'value'	=> 'yes'
                                ],
                                [
                                    'name'     => 'ex_shape_two_bg_type',
                                    'value'    => 'classic',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );
        $element->add_control(
            'ex_shape_two_bg_image',
            [
                'label' => __( 'Image', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'conditions' => [
                    'terms' => [
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name'  => 'ex_sec_shape_two',
                                    'value' => 'yes'
                                ],
                                [
                                    'name'     => 'ex_shape_two_bg_type',
                                    'value'    => 'classic',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );
        $element->add_control(
            'ex_shape_two_bg_image_pos_x',
            [
                'label' => __( 'Position X', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 50,
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name'  => 'ex_sec_shape_two',
                                    'value' => 'yes'
                                ],
                                [
                                    'name'     => 'ex_shape_two_bg_type',
                                    'value'    => 'classic',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );
        $element->add_control(
            'ex_shape_two_bg_image_pos_y',
            [
                'label' => __( 'Position Y', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 50,
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name'  => 'ex_sec_shape_two',
                                    'value' => 'yes'
                                ],
                                [
                                    'name'     => 'ex_shape_two_bg_type',
                                    'value'    => 'classic',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );
        $element->add_control(
            'ex_shape_two_bg_image_size',
            [
                'label' => __( 'Size', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 50,
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name'  => 'ex_sec_shape_two',
                                    'value' => 'yes'
                                ],
                                [
                                    'name'     => 'ex_shape_two_bg_type',
                                    'value'    => 'classic',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );
        $element->add_control(
            'ex_shape_two_grad_color_1',
            [
                'label' => __( 'First Color', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Scheme_Color::get_type(),
                    'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name'	=> 'ex_sec_shape_two',
                                    'value'	=> 'yes'
                                ],
                                [
                                    'name'     => 'ex_shape_two_bg_type',
                                    'value'    => 'gradient',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );
        $element->add_control(
            'ex_shape_two_grad_color_1_location',
            [
                'label' => __( 'Location', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ '%' ],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 0,
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name'	=> 'ex_sec_shape_two',
                                    'value'	=> 'yes'
                                ],
                                [
                                    'name'     => 'ex_shape_two_bg_type',
                                    'value'    => 'gradient',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );
        $element->add_control(
            'ex_shape_two_grad_color_2',
            [
                'label' => __( 'Second Color', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Scheme_Color::get_type(),
                    'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name'	=> 'ex_sec_shape_two',
                                    'value'	=> 'yes'
                                ],
                                [
                                    'name'     => 'ex_shape_two_bg_type',
                                    'value'    => 'gradient',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );
        $element->add_control(
            'ex_shape_two_grad_color_2_location',
            [
                'label' => __( 'Location', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ '%' ],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 0,
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name'	=> 'ex_sec_shape_two',
                                    'value'	=> 'yes'
                                ],
                                [
                                    'name'     => 'ex_shape_two_bg_type',
                                    'value'    => 'gradient',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );

        $element->add_control(
            'ex_shape_two_grad_color_type',
            [
                'label' => __( 'Type', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'linear-gradient',
                'options' => [
                    'linear-gradient' => __( 'Linear', 'shape-master' ),
                    'radial-gradient'  => __( 'Radial', 'shape-master' ),
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name'	=> 'ex_sec_shape_two',
                                    'value'	=> 'yes'
                                ],
                                [
                                    'name'     => 'ex_shape_two_bg_type',
                                    'value'    => 'gradient',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );

        $element->add_control(
            'ex_shape_two_grad_color_lin_angle',
            [
                'label' => __( 'Angle', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'deg' ],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 359,
                    ],
                ],
                'default' => [
                    'unit' => 'deg',
                    'size' => 0,
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name'	=> 'ex_sec_shape_two',
                            'value'	=> 'yes'
                        ],
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name'	=> 'ex_shape_two_grad_color_type',
                                    'value'	=> 'linear-gradient'
                                ],
                                [
                                    'name'     => 'ex_shape_two_bg_type',
                                    'value'    => 'gradient',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );
        $element->add_control(
            'ex_shape_two_grad_color_rad_position',
            [
                'label' => __( 'Position', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'center center',
                'options' => [
                    'center center' => __( 'Center Center', 'shape-master' ),
                    'center left' => __( 'Center Left', 'shape-master' ),
                    'center right' => __( 'Center Right', 'shape-master' ),
                    'top center' => __( 'Top Center', 'shape-master' ),
                    'top left' => __( 'Top Left', 'shape-master' ),
                    'top right' => __( 'Top Right', 'shape-master' ),
                    'bottom center' => __( 'Bottom Center', 'shape-master' ),
                    'bottom left' => __( 'Bottom Left', 'shape-master' ),
                    'bottom right' => __( 'Bottom Right', 'shape-master' ),
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name'	=> 'ex_sec_shape_two',
                            'value'	=> 'yes'
                        ],
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name'	=> 'ex_shape_two_grad_color_type',
                                    'value'	=> 'radial-gradient'
                                ],
                                [
                                    'name'     => 'ex_shape_two_bg_type',
                                    'value'    => 'gradient',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );

        $element->add_control(
            'ex_shape_two_border_radius',
            [
                'label' => __( 'Border Radius', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'conditions' => [
                    'terms' => [
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name'	=> 'ex_sec_shape_two',
                                    'value'	=> 'yes'
                                ],
                                [
                                    'name'     => 'ex_shape_two_style',
                                    'value'    => 'default',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );
        $element->add_control(
            'ex_shape_two_z_index',
            [
                'label' => __( 'z-Index', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => -100,
                'step' => 1,
                'default' => 1,
                'label_block' => false,
                'condition' => [
                    'ex_sec_shape_two'  => 'yes'
                ],
            ]
        );
        $element->add_control(
            'ex_shape_two_position_h',
            [
                'label' => __( 'Horizontal Position', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'label_block' => false,
                'toggle' => false,
                'default' => 'left',
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'shape-master' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'shape-master' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'render_type' => 'ui',
                'condition' => [
                    'ex_sec_shape_two' => 'yes',
                ],
            ]
        );
        $element->add_responsive_control(
            'ex_shape_two_offset_x',
            [
                'label' => __( 'Offset', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -200,
                        'max' => 200,
                    ],
                ],
                'default' => [
                    'size' => '0',
                ],
                'size_units' => [ 'px', '%' ],
                'condition' => [
                    'ex_sec_shape_two' => 'yes',
                ],
            ]
        );

        $element->add_control(
            'ex_shape_two_position_v',
            [
                'label' => __( 'Vertical Position', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'label_block' => false,
                'toggle' => false,
                'default' => 'top',
                'options' => [
                    'top' => [
                        'title' => __( 'Top', 'shape-master' ),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'bottom' => [
                        'title' => __( 'Bottom', 'shape-master' ),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'render_type' => 'ui',
                'condition' => [
                    'ex_sec_shape_two' => 'yes',
                ],
            ]
        );
        $element->add_responsive_control(
            'ex_shape_two_offset_y',
            [
                'label' => __( 'Offset', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -200,
                        'max' => 200,
                    ],
                ],
                'default' => [
                    'size' => '0',
                ],
                'size_units' => [ 'px', '%' ],
                'condition' => [
                    'ex_sec_shape_two' => 'yes',
                ],
            ]
        );

        $element->add_control(
            'ex_shape_two_transform',
            [
                'label' => __( 'Transform', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'shape-master' ),
                'label_off' => __( 'No', 'shape-master' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'ex_sec_shape_two' => 'yes',
                ],
            ]
        );
        $element->add_responsive_control(
            'ex_shape_two_transform_scale',
            [
                'label' => __( 'Scale', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0.1,
                'max' => 2,
                'step' => 0.1,
                'default' => 1,
                'conditions' => [
                    'terms' => [
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name'	=> 'ex_sec_shape_two',
                                    'value'	=> 'yes'
                                ],
                                [
                                    'name'     => 'ex_shape_two_transform',
                                    'value'    => 'yes',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );
        $element->add_responsive_control(
            'ex_shape_two_transform_rotate',
            [
                'label' => __( 'Rotate', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'deg' ],
                'range' => [
                    'deg' => [
                        'min' => 0,
                        'max' => 360,
                        'step' => 1,
                    ]
                ],
                'default' => [
                    'unit' => 'deg',
                    'size' => 0,
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name'	=> 'ex_sec_shape_two',
                                    'value'	=> 'yes'
                                ],
                                [
                                    'name'     => 'ex_shape_two_transform',
                                    'value'    => 'yes',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );
        $element->add_responsive_control(
            'ex_shape_two_transform_translate_x',
            [
                'label' => __( 'Translate X', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => -500,
                        'max' => 500,
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
                'conditions' => [
                    'terms' => [
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name'	=> 'ex_sec_shape_two',
                                    'value'	=> 'yes'
                                ],
                                [
                                    'name'     => 'ex_shape_two_transform',
                                    'value'    => 'yes',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );
        $element->add_responsive_control(
            'ex_shape_two_transform_translate_y',
            [
                'label' => __( 'Translate Y', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => -500,
                        'max' => 500,
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
                'conditions' => [
                    'terms' => [
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name'	=> 'ex_sec_shape_two',
                                    'value'	=> 'yes'
                                ],
                                [
                                    'name'     => 'ex_shape_two_transform',
                                    'value'    => 'yes',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );
        $element->add_responsive_control(
            'ex_shape_two_transform_skew_x',
            [
                'label' => __( 'Skew X', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'deg' ],
                'range' => [
                    'deg' => [
                        'min' => -90,
                        'max' => 90,
                        'step' => 1,
                    ]
                ],
                'default' => [
                    'unit' => 'deg',
                    'size' => 0,
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name'	=> 'ex_sec_shape_two',
                                    'value'	=> 'yes'
                                ],
                                [
                                    'name'     => 'ex_shape_two_transform',
                                    'value'    => 'yes',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );
        $element->add_responsive_control(
            'ex_shape_two_transform_skew_y',
            [
                'label' => __( 'Skew Y', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'deg' ],
                'range' => [
                    'deg' => [
                        'min' => -90,
                        'max' => 90,
                        'step' => 1,
                    ]
                ],
                'default' => [
                    'unit' => 'deg',
                    'size' => 0,
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name'	=> 'ex_sec_shape_two',
                                    'value'	=> 'yes'
                                ],
                                [
                                    'name'     => 'ex_shape_two_transform',
                                    'value'    => 'yes',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );
        $element->add_control(
            'ex_shape_two_transform_origin',
            [
                'label' => __( 'Transform Origin', 'shape-master' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default'  => __( 'Default', 'shape-master' ),
                    'top left' => __( 'Top Left', 'shape-master' ),
                    'top right' => __( 'Top Right', 'shape-master' ),
                    'center top' => __( 'Center Top', 'shape-master' ),
                    'center bottom' => __( 'Center Bottom', 'shape-master' ),
                    'center left' => __( 'Center Left', 'shape-master' ),
                    'center right' => __( 'Center Right', 'shape-master' ),
                    'center center' => __( 'Center Center', 'shape-master' ),
                    'bottom left' => __( 'Bottom Left', 'shape-master' ),
                    'bottom right' => __( 'Bottom Right', 'shape-master' ),
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name'	=> 'ex_sec_shape_two',
                                    'value'	=> 'yes'
                                ],
                                [
                                    'name'     => 'ex_shape_two_transform',
                                    'value'    => 'yes',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        );

        $element->end_controls_section();
        $element->end_injection();
    }

    /**
     * EXP Section Shape Before Render
     *
     * before rendering section add ex-section-shape-postID class
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function exp_section_shape_before_render($element){

        $settings = $element->get_settings_for_display();

        if( $settings['ex_sec_shape_one'] == 'yes' || $settings['ex_sec_shape_two'] == 'yes'  ){
            $element->add_render_attribute(
                '_wrapper',
                [
                    'class'	=> 'ex-section-shape-'. $element->get_id()
                ]
            );

        }

    }

    public function render() {
        $this ->exp_section_shape_before_render();
        $this -> exp_section_shape_css();
    }

    /**
     * EXP Section Shape Before Render
     *
     * before rendering section add ex-section-shape-postID class
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function exp_section_shape_css( $post_css, $element ){
        if ( $post_css instanceof Dynamic_CSS ) {
            return;
        }

        $settings = $element->get_settings_for_display();
        $css = array();
        // Shape One
        if(isset($settings['ex_sec_shape_one'])) {
            $css_property_one = array();
            $css_property_one[] = 'position: absolute;';
            $css_property_one[] = 'content: "";';


            if ($settings['ex_shape_one_bg_color'] && $settings['ex_shape_one_bg_type'] == 'classic') {
                $css_property_one[] = 'background-color:' . $settings['ex_shape_one_bg_color'] . ';';
            }

            if ($settings['ex_shape_one_bg_image']['url'] && $settings['ex_shape_one_bg_type'] == 'classic') {
                $css_property_one[] = 'background-image:url("' . $settings['ex_shape_one_bg_image']['url'] . '");';
                $css_property_one[] = 'background-position:' . $settings['ex_shape_one_bg_image_pos_x']['size'] . $settings['ex_shape_one_bg_image_pos_x']['unit'] . ' ' . $settings['ex_shape_one_bg_image_pos_y']['size'] . $settings['ex_shape_one_bg_image_pos_y']['unit'] . ';';
                $css_property_one[] = 'background-repeat: no-repeat;';
                $css_property_one[] = 'background-size: ' . $settings['ex_shape_one_bg_image_size']['size'] . $settings['ex_shape_one_bg_image_size']['unit'] . ';';
            }

            if ($settings['ex_shape_one_bg_type'] == 'gradient' && $settings['ex_shape_one_grad_color_type'] == 'linear-gradient') {
                $angle = $settings['ex_shape_one_grad_color_lin_angle']['size'] . $settings['ex_shape_one_grad_color_lin_angle']['unit'];
                $location1 = $settings['ex_shape_one_grad_color_1_location']['size'] . $settings['ex_shape_one_grad_color_1_location']['unit'];
                $location2 = $settings['ex_shape_one_grad_color_2_location']['size'] . $settings['ex_shape_one_grad_color_2_location']['unit'];

                $css_property_one[] = 'background: linear-gradient(' . $angle . ', ' . $settings['ex_shape_one_grad_color_1'] . ' ' . $location1 . ', ' . $settings['ex_shape_one_grad_color_2'] . ' ' . $location2 . ');';
            }

            if ($settings['ex_shape_one_bg_type'] == 'gradient' && $settings['ex_shape_one_grad_color_type'] == 'radial-gradient') {
                $position = $settings['ex_shape_one_grad_color_rad_position'];
                $location1 = $settings['ex_shape_one_grad_color_1_location']['size'] . $settings['ex_shape_one_grad_color_1_location']['unit'];
                $location2 = $settings['ex_shape_one_grad_color_2_location']['size'] . $settings['ex_shape_one_grad_color_2_location']['unit'];

                $css_property_one[] = 'background: radial-gradient( at ' . $position . ', ' . $settings['ex_shape_one_grad_color_1'] . ' ' . $location1 . ', ' . $settings['ex_shape_one_grad_color_2'] . ' ' . $location2 . ');';
            }

            $css_property_one[] = 'width: ' . $settings['ex_shape_one_width']['size'] . $settings['ex_shape_one_width']['unit'] . ';';

            $css_property_one[] = 'height: ' . $settings['ex_shape_one_height']['size'] . $settings['ex_shape_one_height']['unit'] . ';';

            $css_property_one[] = $settings['ex_shape_one_position_h'] . ":" . $settings['ex_shape_one_offset_x']['size'] . $settings['ex_shape_one_offset_x']['unit'] . ';';
            $css_property_one[] = $settings['ex_shape_one_position_v'] . ":" . $settings['ex_shape_one_offset_y']['size'] . $settings['ex_shape_one_offset_y']['unit'] . ';';

            $value1 = $settings['ex_shape_one_style_value_1'] . "%";
            $value2 = $settings['ex_shape_one_style_value_2'] . "%";
            $value3 = $settings['ex_shape_one_style_value_3'] . "%";
            $value4 = $settings['ex_shape_one_style_value_4'] . "%";
            $value5 = $settings['ex_shape_one_style_value_5'] . "%";
            $value6 = $settings['ex_shape_one_style_value_6'] . "%";
            $value7 = $settings['ex_shape_one_style_value_7'] . "%";
            $value8 = $settings['ex_shape_one_style_value_8'] . "%";
            $value9 = $settings['ex_shape_one_style_value_9'] . "%";
            $value10 = $settings['ex_shape_one_style_value_10'] . "%";


            if ($settings['ex_shape_one_style'] == 'triangle') {
                $css_property_one[] = 'clip-path: polygon(' . $value1 . " " . $value2 . ', ' . $value3 . " " . $value4 . ', ' . $value5 . " " . $value6 . ');';
            }

            if ($settings['ex_shape_one_style'] == 'parallelogram') {
                $css_property_one[] = 'clip-path: polygon(' . $value1 . " " . $value2 . ', ' . $value3 . " " . $value4 . ', ' . $value5 . " " . $value6 . ', ' . $value7 . " " . $value8 . ');';
            }

            if ($settings['ex_shape_one_style'] == 'pentagon') {
                $css_property_one[] = 'clip-path: polygon(' . $value1 . " " . $value2 . ', ' . $value3 . " " . $value4 . ', ' . $value5 . " " . $value6 . ', ' . $value7 . " " . $value8 . ', ' . $value9 . " " . $value10 . ');';
            }

            if ($settings['ex_shape_one_transform'] == 'yes') {
                $transform_one_val = array();
                if ($settings['ex_shape_one_transform_scale'] != '1') {
                    $transform_one_val[] = 'scale(' . $settings['ex_shape_one_transform_scale'] . ')';
                }

                if ($settings['ex_shape_one_transform_rotate']['size'] != '0') {
                    $transform_one_val[] = 'rotate(' . $settings['ex_shape_one_transform_rotate']['size'] . $settings['ex_shape_one_transform_rotate']['unit'] . ')';
                }
                if ($settings['ex_shape_one_transform_translate_x']['size'] != '0' || $settings['ex_shape_one_transform_translate_y']['size'] != '0') {
                    $transform_one_val[] = 'translate(' . $settings['ex_shape_one_transform_translate_x']['size'] . $settings['ex_shape_one_transform_translate_x']['unit'] . ',' . $settings['ex_shape_one_transform_translate_y']['size'] . $settings['ex_shape_one_transform_translate_y']['unit'] . ')';
                }
                if ($settings['ex_shape_one_transform_skew_x']['size'] != '0' || $settings['ex_shape_one_transform_skew_y']['size'] != '0') {
                    $transform_one_val[] = 'skew(' . $settings['ex_shape_one_transform_skew_x']['size'] . $settings['ex_shape_one_transform_skew_x']['unit'] . ',' . $settings['ex_shape_one_transform_skew_y']['size'] . $settings['ex_shape_one_transform_skew_y']['unit'] . ')';
                }
                if (count($transform_one_val) > '0') {
                    $css_property_one[] = 'transform:' . implode(" ", $transform_one_val) . ';';
                }
                if ($settings['ex_shape_one_transform_origin'] !== 'default') {
                    $css_property_one[] = 'transform-origin:' . $settings['ex_shape_one_transform_origin'] . ';';
                }
            }


            if ($settings['ex_shape_one_border_radius']) {
                $css_property_one[] = 'border-top-left-radius: ' . $settings['ex_shape_one_border_radius']['top'] . $settings['ex_shape_one_border_radius']['unit'] . ';';
                $css_property_one[] = 'border-bottom-left-radius: ' . $settings['ex_shape_one_border_radius']['left'] . $settings['ex_shape_one_border_radius']['unit'] . ' ;';
                $css_property_one[] = 'border-top-right-radius: ' . $settings['ex_shape_one_border_radius']['right'] . $settings['ex_shape_one_border_radius']['unit'] . ' ;';
                $css_property_one[] = 'border-bottom-right-radius: ' . $settings['ex_shape_one_border_radius']['bottom'] . $settings['ex_shape_one_border_radius']['unit'] . ' ;';
            }

            if ($settings['ex_shape_one_z_index']) {
                $css_property_one[] = 'z-index: ' . $settings['ex_shape_one_z_index'] . ';';
            }

        }

        // Shape Two
        if(isset($settings['ex_sec_shape_two'])) {
            $css_property_two = array();
            $css_property_two[] = 'position: absolute;';
            $css_property_two[] = 'content: "";';

            if ($settings['ex_shape_two_bg_color'] && $settings['ex_shape_two_bg_type'] == 'classic') {
                $css_property_two[] = 'background-color:' . $settings['ex_shape_two_bg_color'] . ';';
            }

            if ($settings['ex_shape_two_bg_image']['url'] && $settings['ex_shape_two_bg_type'] == 'classic') {
                $css_property_two[] = 'background-image:url("' . $settings['ex_shape_two_bg_image']['url'] . '");';
                $css_property_two[] = 'background-position:' . $settings['ex_shape_two_bg_image_pos_x']['size'] . $settings['ex_shape_two_bg_image_pos_x']['unit'] . ' ' . $settings['ex_shape_two_bg_image_pos_y']['size'] . $settings['ex_shape_two_bg_image_pos_y']['unit'] . ';';
                $css_property_two[] = 'background-repeat: no-repeat;';
                $css_property_two[] = 'background-size: ' . $settings['ex_shape_two_bg_image_size']['size'] . $settings['ex_shape_two_bg_image_size']['unit'] . ';';
            }

            if ($settings['ex_shape_two_bg_type'] == 'gradient' && $settings['ex_shape_two_grad_color_type'] == 'linear-gradient') {
                $angle = $settings['ex_shape_two_grad_color_lin_angle']['size'] . $settings['ex_shape_two_grad_color_lin_angle']['unit'];
                $location1 = $settings['ex_shape_two_grad_color_1_location']['size'] . $settings['ex_shape_two_grad_color_1_location']['unit'];
                $location2 = $settings['ex_shape_two_grad_color_2_location']['size'] . $settings['ex_shape_two_grad_color_2_location']['unit'];

                $css_property_two[] = 'background: linear-gradient(' . $angle . ', ' . $settings['ex_shape_two_grad_color_1'] . ' ' . $location1 . ', ' . $settings['ex_shape_two_grad_color_2'] . ' ' . $location2 . ');';
            }

            if ($settings['ex_shape_two_bg_type'] == 'gradient' && $settings['ex_shape_two_grad_color_type'] == 'radial-gradient') {
                $position = $settings['ex_shape_two_grad_color_rad_position'];
                $location1 = $settings['ex_shape_two_grad_color_1_location']['size'] . $settings['ex_shape_two_grad_color_1_location']['unit'];
                $location2 = $settings['ex_shape_two_grad_color_2_location']['size'] . $settings['ex_shape_two_grad_color_2_location']['unit'];

                $css_property_two[] = 'background: radial-gradient( at ' . $position . ', ' . $settings['ex_shape_two_grad_color_1'] . ' ' . $location1 . ', ' . $settings['ex_shape_two_grad_color_2'] . ' ' . $location2 . ');';
            }

            $css_property_two[] = 'width: ' . $settings['ex_shape_two_width']['size'] . $settings['ex_shape_two_width']['unit'] . ';';

            $css_property_two[] = 'height: ' . $settings['ex_shape_two_height']['size'] . $settings['ex_shape_two_height']['unit'] . ';';


            $css_property_two[] = $settings['ex_shape_two_position_h'] . ":" . $settings['ex_shape_two_offset_x']['size'] . $settings['ex_shape_two_offset_x']['unit'] . ';';
            $css_property_two[] = $settings['ex_shape_two_position_v'] . ":" . $settings['ex_shape_two_offset_y']['size'] . $settings['ex_shape_two_offset_y']['unit'] . ';';

            $value1 = $settings['ex_shape_two_style_value_1'] . "%";
            $value2 = $settings['ex_shape_two_style_value_2'] . "%";
            $value3 = $settings['ex_shape_two_style_value_3'] . "%";
            $value4 = $settings['ex_shape_two_style_value_4'] . "%";
            $value5 = $settings['ex_shape_two_style_value_5'] . "%";
            $value6 = $settings['ex_shape_two_style_value_6'] . "%";
            $value7 = $settings['ex_shape_two_style_value_7'] . "%";
            $value8 = $settings['ex_shape_two_style_value_8'] . "%";
            $value9 = $settings['ex_shape_two_style_value_9'] . "%";
            $value10 = $settings['ex_shape_two_style_value_10'] . "%";

            if ($settings['ex_shape_two_style'] == 'triangle') {
                $css_property_two[] = 'clip-path: polygon(' . $value1 . " " . $value2 . ', ' . $value3 . " " . $value4 . ', ' . $value5 . " " . $value6 . ');';
            }

            if ($settings['ex_shape_two_style'] == 'parallelogram') {
                $css_property_two[] = 'clip-path: polygon(' . $value1 . " " . $value2 . ', ' . $value3 . " " . $value4 . ', ' . $value5 . " " . $value6 . ', ' . $value7 . " " . $value8 . ');';
            }

            if ($settings['ex_shape_two_style'] == 'pentagon') {
                $css_property_two[] = 'clip-path: polygon(' . $value1 . " " . $value2 . ', ' . $value3 . " " . $value4 . ', ' . $value5 . " " . $value6 . ', ' . $value7 . " " . $value8 . ', ' . $value9 . " " . $value10 . ');';
            }
            if ($settings['ex_shape_two_transform'] == 'yes') {
                $transform_two_val = array();
                if ($settings['ex_shape_two_transform_scale'] != '1') {
                    $transform_two_val[] = 'scale(' . $settings['ex_shape_two_transform_scale'] . ')';
                }

                if ($settings['ex_shape_two_transform_rotate']['size'] != '0') {
                    $transform_two_val[] = 'rotate(' . $settings['ex_shape_two_transform_rotate']['size'] . $settings['ex_shape_two_transform_rotate']['unit'] . ')';
                }
                if ($settings['ex_shape_two_transform_translate_x']['size'] != '0' || $settings['ex_shape_two_transform_translate_y']['size'] != '0') {
                    $transform_two_val[] = 'translate(' . $settings['ex_shape_two_transform_translate_x']['size'] . $settings['ex_shape_two_transform_translate_x']['unit'] . ',' . $settings['ex_shape_two_transform_translate_y']['size'] . $settings['ex_shape_two_transform_translate_y']['unit'] . ')';
                }
                if ($settings['ex_shape_two_transform_skew_x']['size'] != '0' || $settings['ex_shape_two_transform_skew_y']['size'] != '0') {
                    $transform_two_val[] = 'skew(' . $settings['ex_shape_two_transform_skew_x']['size'] . $settings['ex_shape_two_transform_skew_x']['unit'] . ',' . $settings['ex_shape_two_transform_skew_y']['size'] . $settings['ex_shape_two_transform_skew_y']['unit'] . ')';
                }
                if (count($transform_two_val) > '0') {
                    $css_property_two[] = 'transform:' . implode(" ", $transform_two_val) . ';';
                }
                if ($settings['ex_shape_two_transform_origin'] !== 'default') {
                    $css_property_two[] = 'transform-origin:' . $settings['ex_shape_two_transform_origin'] . ';';
                }
            }

            if ($settings['ex_shape_two_border_radius']) {
                $css_property_two[] = 'border-top-left-radius: ' . $settings['ex_shape_two_border_radius']['top'] . $settings['ex_shape_two_border_radius']['unit'] . ';';
                $css_property_two[] = 'border-bottom-left-radius: ' . $settings['ex_shape_two_border_radius']['left'] . $settings['ex_shape_two_border_radius']['unit'] . ' ;';
                $css_property_two[] = 'border-top-right-radius: ' . $settings['ex_shape_two_border_radius']['right'] . $settings['ex_shape_two_border_radius']['unit'] . ' ;';
                $css_property_two[] = 'border-bottom-right-radius: ' . $settings['ex_shape_two_border_radius']['bottom'] . $settings['ex_shape_two_border_radius']['unit'] . ' ;';
            }

            if ($settings['ex_shape_two_z_index']) {
                $css_property_two[] = 'z-index: ' . $settings['ex_shape_two_z_index'] . ';';
            }
        }

        if (isset($settings['ex_sec_shape_one'])) {
            $css[] =
                '.ex-section-shape-' . $element->get_id() .'::before{'. implode(" ", $css_property_one) .'}';
        }

        if ( isset($settings['ex_sec_shape_two'])) {
            $css[] =
                '.ex-section-shape-' . $element->get_id() .'::after{'. implode(" ", $css_property_two) .'}';
        }

        $css = trim( implode( " ", $css ) );


        if ( empty( $css ) ) {
            return;
        }

        // Add a css comment
        $css = sprintf( '/* Start custom CSS for %s, class: %s */', $element->get_name(), 'ex-section-shape-' . $element->get_id() ) . $css . '/* End custom CSS */';

        $post_css->get_stylesheet()->add_raw_css( $css );

    }
}