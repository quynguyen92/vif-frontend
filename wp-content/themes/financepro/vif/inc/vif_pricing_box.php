<?php
/**
 * Class VifPricingBox
 *
 * Credit by: VIF Team
 */
if (!class_exists('VifPricingBox')) {
    class VifPricingBox extends VifCustomPage
    {
        /**
         * VifPricingBox constructor.
         */
        public function __construct()
        {
            $this->name = __('VIF: Pricing Box');
            $this->base = 'vif_pricing_box';
            $this->title = 'VIF: Pricing Box';
            parent::__construct();
        }

        /**
         * @return array
         */
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
    }
}

new VifPricingBox();