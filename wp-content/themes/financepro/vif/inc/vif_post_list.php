<?php
/**
 * Class VifPostList
 *
 * Credit by: VIF Team
 */
if (!class_exists('VifPostList')) {
    class VifPostList extends WPBakeryShortCode
    {
        /**
         * VifPostList constructor.
         */
        public function __construct()
        {
            $this->name = __('VIF: Post Listing');
            $this->base = 'vif_post_list';
            $this->translate = array(
                'title' => __("Our Company News"),
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
            $categories = get_categories();
            $category_dropdown = array('All Categories' => '0');

            foreach ($categories as $category) {
                $category_dropdown[$category->name] = $category->term_id;
            }

            $fields = array(
                array(
                    "type" => "dropdown",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Categories"),
                    "param_name" => "cat",
                    'value' => $category_dropdown,
                ),
                array(
                    "type" => "dropdown",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Post Display Order"),
                    "param_name" => "order",
                    'value' => array(
                        __("Descending") => 'DESC',
                        __("Ascending") => 'ASC',
                    ),
                ),
                array(
                    "type" => "dropdown",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Order By"),
                    "param_name" => "orderby",
                    'value' => array(
                        __("None") => '',
                        __("Name") => 'title',
                        __("ID") => 'ID',
                        __("Date") => 'date',
                        __("Menu Order") => 'menu_order',
                    ),
                ),
                array(
                    "type" => "dropdown",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Section Title Display"),
                    "param_name" => "showtitle",
                    "value" => array(
                        __("Enabled", "financepro-core") => 'true',
                        __("Disabled", "financepro-core") => 'false',
                    ),
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Section Title"),
                    "param_name" => "title",
                    "value" => $this->translate['title'],
                    'dependency' => array(
                        'element' => 'showtitle',
                        'value' => array('true'),
                    ),
                ),
                array(
                    "type" => "colorpicker",
                    "class" => "",
                    "heading" => __("Section Title Color", "financepro-core"),
                    "param_name" => "section_title_color",
                    "value" => '#222222',
                    'dependency' => array(
                        'element' => 'showtitle',
                        'value' => array('true'),
                    ),
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Total number of post"),
                    "param_name" => "total_number_post",
                    "value" => 6,
                    'description' => __('Write -1 to show all'),
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
                'cat' => '',
                'order' => 'DESC',
                'orderby' => '',
                'showtitle' => 'true',
                'title' => $this->translate['title'],
                'section_title_color' => '#222222',
                'total_number_post' => 6,
            ), $atts));

            return $this->render('vif_post_list', get_defined_vars());

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

new VifPostList();