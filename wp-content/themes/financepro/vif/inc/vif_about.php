<?php
include plugin_dir_path(__DIR__) . 'core' . DIRECTORY_SEPARATOR . 'vif_custom_page.php';

/**
 * Class VifAbout
 *
 * Credit by: VIF Team
 */
if (!class_exists('VifAbout')) {
    class VifAbout extends VifCustomPage
    {
        /**
         * VifAbout constructor.
         */
        public function __construct()
        {
            $this->name = __('VIF: About');
            $this->base = 'vif_about';
            $this->title = 'About Us';
            parent::__construct();
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
    }
}

new VifAbout();