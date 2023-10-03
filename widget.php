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

    public function get_custom_help_url()
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

    public function get_script_depends()
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
            'size',
            [
                'type' => \Elementor\Controls_Manager::NUMBER,
                'label' => esc_html__('Size', 'transtyle'),
                'placeholder' => '0',
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => 50,
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
        $this -> end_controls_section();
    }

    /**
     * Written as a PHP template that generates the frontend output.
     *
     * @return void
     */
    protected function render()
    {
        $path = TRANSSTYLE_ROOT_PATH . '/render.php';
        include($path);
    }

    /**
     * Written as a JS template that generates the preview output in the editor.
     * //Does not do anything...
     *
     * @return void
     */
    protected function content_template()
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
