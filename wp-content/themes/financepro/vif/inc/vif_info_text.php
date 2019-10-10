<?php
if (!class_exists('Vif_Info_Text')) {
    /**
     * Class Vif_Info_Text
     */
    class Vif_Info_Text extends WPBakeryShortCode
    {

        /**
         * Vif_Info_Text constructor.
         */
        public function __construct()
        {
            $this->name = __('VIF: Info Text');
            $this->base = 'vif_info_text';
            $this->translate = array(
                'title' => __("Info Text"),
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
                    "type" => "dropdown",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Icon Type"),
                    "param_name" => "icontype",
                    'value' => array(
                        __('FlatIcon') => 'flaticon',
                        __('FontAwesome') => 'fontawesome',
                        __('Custom Image') => 'image',
                    ),
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => __('Flaticon'),
                    'param_name' => 'icon_flat',
                    "value" => 'flaticon-custom-target',
                    'settings' => array(
                        'emptyIcon' => false,
                        'type' => 'flaticon',
                        'iconsPerPage' => 160,
                    ),
                    'dependency' => array(
                        'element' => 'icontype',
                        'value' => array('flaticon'),
                    ),
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => __('FontAwesome Icon'),
                    'param_name' => 'icon_fa',
                    "value" => 'fa fa-bar-chart',
                    'settings' => array(
                        'emptyIcon' => false,
                        'iconsPerPage' => 160,
                    ),
                    'dependency' => array(
                        'element' => 'icontype',
                        'value' => array('fontawesome'),
                    ),
                ),
                array(
                    "type" => "attach_image",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Upload icon image"),
                    "param_name" => "image",
                    'dependency' => array(
                        'element' => 'icontype',
                        'value' => array('image'),
                    ),
                ),
                array(
                    "type" => "dropdown",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Icon style"),
                    "param_name" => "icon_style",
                    'value' => array(
                        __('Rounded') => 'rounded',
                        __('Squire') => 'squire',
                    ),
                ),
                array(
                    "type" => "dropdown",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Icon border"),
                    "param_name" => "icon_border",
                    "value" => array(
                        __("Disabled") => 'false',
                        __("Enabled") => 'true',
                    ),
                ),
                array(
                    "type" => "colorpicker",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Icon color"),
                    "param_name" => "color",
                    "value" => "#cb011b",
                    'dependency' => array(
                        'element' => 'icontype',
                        'value' => array('flaticon', 'fontawesome'),
                    ),
                ),
                array(
                    "type" => "colorpicker",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Icon Background color"),
                    "param_name" => "icon_bgcolor",
                    "value" => "",
                    'dependency' => array(
                        'element' => 'icontype',
                        'value' => array('flaticon', 'fontawesome'),
                    ),
                ),
                array(
                    "type" => "colorpicker",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Icon Background color"),
                    "param_name" => "icon_bgcolor_6",
                    "value" => "",
                ),
                array(
                    "type" => "colorpicker",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Mouseover color"),
                    "param_name" => "hovercolor",
                    "value" => "",
                ),
                array(
                    "type" => "colorpicker",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Background color"),
                    "param_name" => "bgcolor",
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Icon size"),
                    "param_name" => "size",
                    'description' => __('Icon size in px eg. 30'),
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Icon padding"),
                    "param_name" => "icon_padding",
                    'description' => __("Icon padding in px eg. 15. Doesn't work on custom image"),
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
                    "heading" => __("Title color"),
                    "param_name" => "title_color",
                    "value" => "#222222",
                ),
                array(
                    "type" => "colorpicker",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Title Hover Color"),
                    "param_name" => "title_hover_color",
                    "value" => "",
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("URL"),
                    "param_name" => "url",
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Title Font Size"),
                    "param_name" => "title_size",
                    'description' => __('Title font size in px. eg 20. If not defined, default h3 font size will be used'),
                ),
                array(
                    "type" => "textarea_html",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Content"),
                    "param_name" => "content",
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Content Font Size"),
                    "param_name" => "content_size",
                    'description' => __('Content font size in px eg. 15. If not defined, default body font size will be used'),
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Content Width"),
                    "param_name" => "width",
                    'description' => __("Content maximum width in px eg 360. Keep this field empty if you want full width"),
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Spacing Before Title"),
                    "param_name" => "spacing_top",
                    "description" => __("Spacing between icon and title in px eg. 25"),
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Spacing After Title"),
                    "param_name" => "spacing_bottom",
                    "description" => __("Spacing between title and content in px eg. 12"),
                ),
                array(
                    "type" => "dropdown",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Display Button"),
                    "param_name" => "display_button",
                    "value" => array(
                        __("Enabled") => 'true',
                        __("Disabled") => 'false',
                    ),
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Button Text"),
                    "param_name" => "button_text",
                    "value" => "Button Text",
                    'dependency' => array(
                        'element' => 'display_button',
                        'value' => array('true'),
                    ),
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Button URL"),
                    "param_name" => "button_url",
                    'dependency' => array(
                        'element' => 'display_button',
                        'value' => array('true'),
                    ),
                ),
                array(
                    'type' => 'css_editor',
                    'heading' => __('Css'),
                    'param_name' => 'css',
                    'group' => __('Design options'),
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
                'layout' => 'layout1',
                'icontype' => 'flaticon',
                'icon_flat' => 'flaticon-custom-target',
                'icon_fa' => 'fa fa-bar-chart',
                'color' => '',
                'icon_bgcolor' => '',
                'icon_bgcolor_6' => '#f4f4f4',
                'hovercolor' => '',
                'bgcolor' => '',
                'image' => '',
                'icon_style' => 'rounded',
                'icon_border' => 'false',
                'size' => '',
                'icon_padding' => '',
                'title' => $this->translate['title'],
                'title_color' => '#222222',
                'title_hover_color' => '',
                'url' => '',
                'title_size' => '',
                'content_size' => '',
                'width' => '',
                'spacing_top' => '',
                'spacing_bottom' => '',
                'display_button' => 'true',
                'button_text' => $this->translate['button_text'],
                'button_url' => '',
                'css' => '',
                "icon" => get_template_directory_uri() . '/vif/icon/vif-icon.jpg',
            ), $atts));

            return $this->render('vif_info_text', get_defined_vars());

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

new Vif_Info_Text();