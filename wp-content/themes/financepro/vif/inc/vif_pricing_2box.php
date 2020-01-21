<?php
/**
 * Class VifPricing2Box
 *
 * Credit by: VIF Team
 */
if (!class_exists('VifPricing2Box')) {
    class VifPricing2Box extends VifCustomPage
    {
        /**
         * VifPricing2Box constructor.
         */
        public function __construct()
        {
            $this->name = __('VIF: Pricing 2 Box');
            $this->base = 'vif_pricing_2box';
            $this->title = 'VIF: Pricing 2 Box';
            parent::__construct();
        }

        /**
         * @return array
         */
        public function fields()
        {
            $fields = array(
                // pricing box 1
                array(
                    "type" => "colorpicker",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Background Color"),
                    "param_name" => "bgcolor",
                    'value' => "#f8f8f8",
                    'group' => __('Pricing Box 1'),
                ),
                array(
                    "type" => "colorpicker",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Background Hover Color", 'academics-core'),
                    "param_name" => "bghover",
                    'value' => "#cb011b",
                    'group' => __('Pricing Box 1'),
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Title"),
                    "param_name" => "title",
                    "value" => $this->translate['title'],
                    'group' => __('Pricing Box 1'),
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Code"),
                    "param_name" => "code",
                    "value" => '',
                    'group' => __('Pricing Box 1'),
                ),
                array(
                    "type" => "colorpicker",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Code Color"),
                    "param_name" => "code_color",
                    'value' => "#002e52",
                    'group' => __('Pricing Box 1'),
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("API URL"),
                    "param_name" => "api_url",
                    "value" => '',
                    "description" => __("Api url"),
                    'group' => __('Pricing Box 1'),
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Unit Name"),
                    "param_name" => "unit",
                    "value" => '',
                    "description" => __("eg. VND/CCQ"),
                    'group' => __('Pricing Box 1'),
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("URL"),
                    "param_name" => "url",
                    "value" => "",
                    'group' => __('Pricing Box 1'),
                ),
                // pricing box 2
                array(
                    "type" => "colorpicker",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Background Color"),
                    "param_name" => "bgcolor2",
                    'value' => "#f8f8f8",
                    'group' => __('Pricing Box 2'),
                ),
                array(
                    "type" => "colorpicker",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Background Hover Color", 'academics-core'),
                    "param_name" => "bghover2",
                    'value' => "#cb011b",
                    'group' => __('Pricing Box 2'),
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Title"),
                    "param_name" => "title2",
                    "value" => $this->translate['title'],
                    'group' => __('Pricing Box 2'),
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Code"),
                    "param_name" => "code2",
                    "value" => '',
                    'group' => __('Pricing Box 2'),
                ),
                array(
                    "type" => "colorpicker",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Code Color"),
                    "param_name" => "code_color2",
                    'value' => "#002e52",
                    'group' => __('Pricing Box 2'),
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("API URL"),
                    "param_name" => "api_url2",
                    "value" => '',
                    "description" => __("Api url"),
                    'group' => __('Pricing Box 2'),
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Unit Name"),
                    "param_name" => "unit2",
                    "value" => '',
                    "description" => __("eg. VND/CCQ"),
                    'group' => __('Pricing Box 2'),
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("URL"),
                    "param_name" => "url2",
                    "value" => "",
                    'group' => __('Pricing Box 2'),
                ),
                // css options
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
                'bgcolor2' => '#f8f8f8',
                'bghover2' => '#cb011b',
                'title2' => $this->translate['title'],
                'code2' => '',
                'code_color2' => '#002e52',
                'api_url2' => '',
                'unit2' => '',
                'url2' => '',
                'css' => '',
            ), $atts));

            return $this->render('vif_pricing_2box', get_defined_vars());
        }
    }
}

new VifPricing2Box();