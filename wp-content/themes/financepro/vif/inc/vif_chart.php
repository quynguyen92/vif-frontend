<?php
/**
 * Class VifChart
 *
 * Credit by: VIF Team
 */
if (!class_exists('VifChart')) {
    class VifChart extends WPBakeryShortCode
    {
        /**
         * VifChart constructor.
         */
        public function __construct()
        {
            $this->name = __('VIF: Chart');
            $this->base = 'vif_chart';
            $this->translate = array(
                'title' => __("STANDARD"),
                'cols' => array(
                    __('1 col') => '12',
                    __('2 col') => '6',
                    __('3 col') => '4',
                    __('4 col') => '3',
                    __('6 col') => '2',
                ),
            );
            add_action('init', array($this, 'vc_map'));
            add_shortcode($this->base, array($this, 'shortcode'));
            wp_register_script('vif_chart_script', get_template_directory_uri() . '/vif/assets/js/chart.min.js', array('jquery'), WPB_VC_VERSION, true);
        }

        /**
         * @throws Exception
         */
        public function vc_map()
        {
            $fields = $this->fields();
            vc_map(
                array(
                    "name" => $this->name,
                    "base" => $this->base,
                    "class" => "",
                    "icon" => get_template_directory_uri() . '/vif/icon/vif-icon.jpg',
                    "controls" => "full",
                    "category" => __('Content'),
                    "params" => $fields,
                )
            );
        }

        /**
         * @return array
         */
        public function fields()
        {
            $fields = array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title'),
                    'param_name' => 'title',
                    'description' => '',
                    'admin_label' => true,
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Font Size"),
                    "param_name" => "font_size",
                    "value" => '',
                ),
                array(
                    "type" => "colorpicker",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Title Chart Color"),
                    "param_name" => "title_color",
                    'value' => "#002e52",
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Themes'),
                    'param_name' => 'theme',
                    'value' => array(
                        esc_html__('Light 1') => 'light1',
                        esc_html__('Light 2') => 'light2',
                        esc_html__('Dark 1') => 'dark1',
                        esc_html__('Dark 2') => 'dark2',
                    ),
                    'description' => esc_html__('Select theme of chart.'),
                    'admin_label' => true,
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Chart Type'),
                    'param_name' => 'type',
                    'value' => array(
                        esc_html__('Bar') => 'bar',
                        esc_html__('Radar') => 'radar',
                        esc_html__('Doughnut') => 'doughnut',
                        esc_html__('PolarArea') => 'polarArea',
                        esc_html__('Bubble') => 'bubble',
                        esc_html__('Line') => 'line',
                    ),
                    'description' => esc_html__('Select theme of chart.'),
                    'admin_label' => true,
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Title Axis X"),
                    "param_name" => "axis_x_title",
                    "value" => 'Title Axis X',
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Unit Axis X"),
                    "param_name" => "axis_x_unit",
                    "value" => 'Unit Axis X',
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Title Axis Y"),
                    "param_name" => "axis_y_title",
                    "value" => 'Title Axis Y',
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Unit Axis Y"),
                    "param_name" => "axis_y_unit",
                    "value" => 'Unit Axis Y',
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("API URL"),
                    "param_name" => "api_url",
                    "value" => '',
                    "description" => __("Api url"),
                ),
                array(
                    'type' => 'css_editor',
                    'heading' => esc_html__('CSS box'),
                    'param_name' => 'css',
                    'group' => esc_html__('Design Options'),
                ),
            );

            return $fields;
        }

        /**
         * @param $atts
         * @param string $content
         * @return false|string|void
         */
        public function shortcode($atts, $content = '')
        {
            extract(shortcode_atts(array(
                'title' => $this->translate['title'],
                'font_size' => '20',
                'title_color' => '#002e52',
                'theme' => 'light1',
                'type' => 'bar',
                'axis_x_title' => '',
                'axis_x_unit' => '',
                'axis_y_title' => '',
                'axis_y_unit' => '',
                'api_url' => '',
                'css' => '',
            ), $atts));

            return $this->render('vif_chart', get_defined_vars());

        }

        /**
         * @param $template
         * @param $vars
         * @return false|string
         */
        public function render($template, $vars)
        {
            extract($vars);

            $template_name = DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $template . '.php';
            if (file_exists(STYLESHEETPATH . $template_name)) {
                $file = STYLESHEETPATH . $template_name;
            } elseif (file_exists(TEMPLATEPATH . $template_name)) {
                $file = TEMPLATEPATH . $template_name;
            } else {
                $file = plugin_dir_path(__DIR__) . 'views' . DIRECTORY_SEPARATOR . $template . '.php';
            }

            ob_start();
            include $file;
            return ob_get_clean();
        }
    }
}

new VifChart();