<?php
include plugin_dir_path(__DIR__) . 'core' . DIRECTORY_SEPARATOR . 'vif_custom_page.php';

/**
 * Class VifPostList
 *
 * Credit by: VIF Team
 */
if (!class_exists('VifPostList')) {
    class VifPostList extends VifCustomPage
    {
        /**
         * VifPostList constructor.
         */
        public function __construct()
        {
            $this->name = __('VIF: Post Listing');
            $this->base = 'vif_post_list';
            $this->title = 'Our Company News';
            parent::__construct();
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
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Title Font Size"),
                    "param_name" => "font_size",
                    "value" => 22,
                    'dependency' => array(
                        'element' => 'showtitle',
                        'value' => array('true'),
                    ),
                ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Text Font Size"),
                    "param_name" => "text_font_size",
                    "value" => 16,
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
                'font_size' => 22,
                'text_font_size' => 16,
                'section_title_color' => '#222222',
                'total_number_post' => 6,
            ), $atts));

            return $this->render('vif_post_list', get_defined_vars());
        }
    }
}

new VifPostList();