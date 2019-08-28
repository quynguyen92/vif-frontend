<?php
/**
 * Class VifAbout
 *
 * Credit by: VIF Team
 */
if (!class_exists('VifAbout')) {
    class VifAbout extends WPBakeryShortCode
    {
        /**
         * VifAbout constructor.
         */
        public function __construct()
        {
            $this->name = __('VIF: About');
            $this->base = 'vif_about';
            $this->translate = array(
                'title' => __("About Us"),
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
                    "type" => "textarea_html",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Content"),
                    "param_name" => "content",
                    "value" => '',
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Map address"),
                    "param_name" => "map_address",
                    "value" => '',
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
                'content' => '',
                'map_address' => '',
                'css' => '',
            ), $atts));

            return $this->render('vif_about', get_defined_vars());

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

new VifAbout();