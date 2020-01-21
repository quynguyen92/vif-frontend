<?php
/**
 * Class VifFinancialPlanning
 *
 * Credit by: VIF Team
 */
if (!class_exists('VifFinancialPlanning')) {
    class VifFinancialPlanning extends VifCustomPage
    {
        /**
         * VifFinancialPlanning constructor.
         */
        public function __construct()
        {
            $this->name = __('VIF: Financial Planning');
            $this->base = 'vif_financial_planning';
            $this->title = 'Financial Planning';
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
                    "heading" => __("Title Color"),
                    "param_name" => "title_color",
                    'value' => "#002e52",
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
                'css' => '',
            ), $atts));

            return $this->render('vif_financial_planning', get_defined_vars());
        }
    }
}

new VifFinancialPlanning();