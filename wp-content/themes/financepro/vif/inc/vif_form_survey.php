<?php
include plugin_dir_path(__DIR__) . 'core' . DIRECTORY_SEPARATOR . 'vif_custom_page.php';

/**
 * Class VifFormSurvey
 *
 * Credit by: VIF Team
 */
if (!class_exists('VifFormSurvey')) {
    class VifFormSurvey extends VifCustomPage
    {
        /**
         * VifPricingBox constructor.
         */
        public function __construct()
        {
            $this->name = __('VIF: Form Survey');
            $this->base = 'vif_form_survey';
            $this->title = 'Form Survey';
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
                    "type" => "colorpicker",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Title Color"),
                    "param_name" => "title_color",
                    'value' => "#002e52",
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Title Font"),
                    "param_name" => "title_font",
                    'value' => "20",
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Google Form URL"),
                    "param_name" => "form_url",
                    "value" => '',
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
                'title_color' => '#002e52',
                'title_font' => '20',
                'form_url' => '',
                'css' => '',
            ), $atts));

            return $this->render('vif_form_survey', get_defined_vars());

        }
    }
}

new VifFormSurvey();