<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
class Transstyle_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'transtyle_widget';
    }

    public function get_title()
    {
        return __('Translatepress', 'transtyle');
    }

    public function get_icon()
    {
        return 'eicon-page-transition';
    }

    public function __get_custom_help_url()
    {
    }

    public function get_categories()
    {
        return ['general'];
    }

    public function get_keywords()
    {
        return ['translation', 'translate', 'Translatepress', 'language', 'flag'];
    }

    public function __get_script_depends()
    {
    }

    public function get_style_depends()
    {
        return ['style-transtyle'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'link_style_section',
            [
                'label' => esc_html__('Translatepress Button', 'transtyle'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->start_controls_tabs(
            'link_tabs'
        );

        $this->start_controls_tab(
            'style_normal_tab',
            [
                'label' => esc_html__('Normal', 'textdomain'),
            ]
        );
        $this->add_control(
            'color',
            [
                'label' => esc_html__('Text Color', 'transtyle'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#f00',
                'selectors' => [
                    '{{WRAPPER}} a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'link_typography',
                'selector' => '{{WRAPPER}} a',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => esc_html__('Hover', 'textdomain'),
            ]
        );
        $this->add_control(
            'color_hover',
            [
                'label' => esc_html__('Text Color', 'transtyle'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#f00',
                'selectors' => [
                    '{{WRAPPER}} a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'link_typography_hover',
                'selector' => '{{WRAPPER}} a',
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_control(
            'hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        $this->add_control(
            'show_as',
            [
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'label' => esc_html__('Alignment', 'transtyle'),
                'options' => [
                    'list' => [
                        'title' => esc_html__('List', 'transtyle'),
                        'icon' => 'eicon-editor-list-ul',
                    ],
                    'dropdown' => [
                        'title' => esc_html__('Dropdown', 'transtyle'),
                        'icon' => 'eicon-nav-menu',
                    ]
                ],
                'default' => 'dropdown',
            ]
        );

        $this->add_control(
            'list_direction',
            [
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'label' => esc_html__('List direction', 'transtyle'),
                'condition' => [
                    'show_as' => 'list',
                ],
                'options' => [
                    'column' => [
                        'title' => esc_html__('Column', 'transtyle'),
                        'icon' => 'eicon-arrow-down',
                    ],
                    'row' => [
                        'title' => esc_html__('Row', 'transtyle'),
                        'icon' => 'eicon-arrow-right',
                    ]
                ],
                'default' => 'row',
            ]
        );

        $this->add_responsive_control(
            'list_distance',
            [
                'label' => esc_html__('List elements distance', 'transtyle'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 20,
                        'step' => 1,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => 0.5,
                    ],
                    'rem' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => 0.5,
                    ]
                ],
                'default' => [
                    'unit' => 'em',
                    'size' => 1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .list-direction-column .ts-trp-ls-shortcode-language' => 'gap: {{SIZE}}{{UNIT}}',
                    '{{WRAPPER}} .list-direction-row .ts-trp-ls-shortcode-language' => 'gap: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'show_as' => 'list',
                ],
            ]
        );

        $this->add_control(
            'border_color',
            [
                'label' => esc_html__('Border Color', 'transtyle'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#f00',
                'selectors' => [
                    '{{WRAPPER}} .trp-ls-shortcode-current-language' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .trp-ls-shortcode-language' => 'border-color: {{VALUE}}',
                ],
                'condition' => [
                    'show_as' => 'dropdown',
                ],
            ]
        );
        $this->add_control(
            'border_width',
            [
                'label' => esc_html__('Border width', 'transtyle'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => 0.5,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 5,
                        'step' => 0.1,
                    ],
                    'rem' => [
                        'min' => 0,
                        'max' => 5,
                        'step' => 0.1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 1.5,
                ],
                'selectors' => [
                    '{{WRAPPER}} .trp-ls-shortcode-current-language' => 'border-width: {{SIZE}}{{UNIT}}',
                    '{{WRAPPER}} .trp-ls-shortcode-language' => 'border-width: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'show_as' => 'dropdown',
                ],
            ]
        );

        $this->add_control(
            'dropdown_expands',
            [
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'label' => esc_html__('Dropdown expands', 'transtyle'),
                'condition' => [
                    'show_as' => 'dropdown',
                ],
                'options' => [
                    'up' => [
                        'title' => esc_html__('Up', 'transtyle'),
                        'icon' => 'eicon-arrow-up',
                    ],
                    'down' => [
                        'title' => esc_html__('Down', 'transtyle'),
                        'icon' => 'eicon-arrow-down',
                    ]
                ],
                'default' => 'down',
            ]
        );
        $this->add_control(
            'hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_responsive_control(
            'dropdown_width',
            [
                'label' => esc_html__('Dropdown width', 'transtyle'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%', 'vw', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 20,
                        'step' => 1,
                    ],
                    'rem' => [
                        'min' => 0,
                        'max' => 20,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    'vw' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 216,
                ],
                'selectors' => [
                    '{{WRAPPER}} .trp-ls-shortcode-current-language' => 'width: {{SIZE}}{{UNIT}} !important',
                    '{{WRAPPER}} .trp-ls-shortcode-language' => 'width: {{SIZE}}{{UNIT}} !important',
                    '{{WRAPPER}} .trp-language-switcher' => 'width: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'show_as' => 'dropdown',
                ],
            ]
        );

        $this->add_control(
            'dropdown_alignment',
            [
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'label' => esc_html__('Alignment', 'transtyle'),
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'transtyle'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'transtyle'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'transtyle'),
                        'icon' => 'eicon-text-align-right',
                    ]
                ],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .trp-ls-shortcode-current-language' => 'text-align: {{VALUE}}',
                    '{{WRAPPER}} .trp-ls-shortcode-language' => 'text-align: {{VALUE}}',
                ],
                'condition' => [
                    'show_as' => 'dropdown',
                ],
            ],
        );

        $this->add_control(
            'hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'show_current',
            [
                'label' => esc_html__('Show the current language', 'transtyle'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'transtyle'),
                'label_off' => esc_html__('No', 'transtyle'),
                'return_value' => true,
                'default' => true,
                'condition' => [
                    'show_as' => 'list',
                ],
            ]
        );
        $this->add_control(
            'short_names',
            [
                'label' => esc_html__('Short Names', 'transtyle'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'transtyle'),
                'label_off' => esc_html__('No', 'transtyle'),
                'return_value' => true,
                'default' => false,
            ]
        );
        $this->add_control(
            'full_names',
            [
                'label' => esc_html__('Display full names', 'transtyle'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'transtyle'),
                'label_off' => esc_html__('No', 'transtyle'),
                'return_value' => true,
                'default' => true,
            ]
        );
        $this->add_control(
            'no_html',
            [
                'label' => esc_html__('No HTML', 'transtyle'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'transtyle'),
                'label_off' => esc_html__('No', 'transtyle'),
                'return_value' => true,
                'default' => false,
            ]
        );
        $this->add_control(
            'flags',
            [
                'label' => esc_html__('Show Flags', 'transtyle'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'transtyle'),
                'label_off' => esc_html__('Hide', 'transtyle'),
                'return_value' => true,
                'default' => true,
            ]
        );
        $this->end_controls_section();
    }

    /**
     * Written as a PHP template that generates the frontend output.
     *
     * @return void
     */
    protected function render()
    {
        $path = TRANSSTYLE_ROOT_PATH . '/includes/render.php';
        include($path);
    }

    /**
     * Written as a JS template that generates the preview output in the editor.
     * //Does not do anything...
     *
     * @return void
     */
    protected function __content_template()
    {
    }

    /**
     * Gets the classnames from the settings
     *
     * @return array
     */
    protected function get_classes_from_settings()
    {
        $settings = $this->get_settings_for_display();
        $settings_to_return = [];
        foreach ($settings as $key => $value) {
            switch ($key) {
                case 'show_as':
                    $settings_to_return[] = 'show-as-' . $value;
                    break;

                case 'list_direction':
                    $settings_to_return[] = 'list-direction-' . $value;
                    break;

                case 'dropdown_expands':
                    $settings_to_return[] = 'control-expands-' . $value;
                    break;

                default:
                    # code...
                    break;
            }
        }
        return $settings_to_return;
    }
}
