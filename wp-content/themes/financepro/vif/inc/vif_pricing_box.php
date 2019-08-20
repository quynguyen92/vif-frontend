<?php
/**
 * Class VifPricingBox
 *
 * Credit by: VIF Team
 */
if (!class_exists('VifPricingBox')) {
    class VifPricingBox extends WPBakeryShortCode
    {
        /**
         * VifPricingBox constructor.
         */
        public function __construct()
        {
            $this->name = __('VIF: Pricing Box');
            $this->base = 'vif_pricing_box';
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
        }

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

        public function fields()
        {

            $fields = array(
                array(
                    "type" => "colorpicker",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Background Color"),
                    "param_name" => "bgcolor",
                    'value' => "#f8f8f8",
                ),
                array(
                    "type" => "colorpicker",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Background Hover Color", 'academics-core'),
                    "param_name" => "bghover",
                    'value' => "#cb011b",
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Title"),
                    "param_name" => "title",
                    "value" => $this->translate['title'],
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Code"),
                    "param_name" => "code",
                    "value" => '',
                ),
                array(
                    "type" => "colorpicker",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Code Color"),
                    "param_name" => "code_color",
                    'value' => "#002e52",
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
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Unit Name"),
                    "param_name" => "unit",
                    "value" => '',
                    "description" => __("eg. VND/CCQ"),
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("URL"),
                    "param_name" => "url",
                    "value" => "",
                ),
                array(
                    'type' => 'css_editor',
                    'heading' => __('Css'),
                    'param_name' => 'css',
                    'group' => __('Design options'),
                    'edit_field_class' => 'vc-no-bg vc-no-border',
                ),
                array(
                    'type' => 'box_column',
                    'heading' => __('Box Columns'),
                    'param_name' => 'css',
                    'group' => __('Box Columns'),
                    'edit_field_class' => 'vc-no-bg vc-no-border vc_row_layouts',
                ),
            );

            return $fields;
        }

        public function shortcode($atts, $content = '')
        {
            extract(shortcode_atts(array(
                'bgcolor' => '#f8f8f8',
                'bghover' => '#cb011b',
                'title' => $this->translate['title'],
                'code' => '',
                'code_color' => '#002e52',
                'api_url' => '',
                'unit' => '',
                'url' => '',
                'css' => '',
            ), $atts));

            return $this->render('vif_pricing_box', get_defined_vars());

        }

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

new VifPricingBox();