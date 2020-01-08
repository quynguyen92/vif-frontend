<?php

/**
 * Class VifCustomPage
 */
class VifCustomPage extends WPBakeryShortCode
{
    protected $name = '';
    protected $base = '';
    protected $title = '';

    /**
     * VifCustomPage constructor.
     */
    public function __construct()
    {
        $this->translate = array(
            'title' => __($this->title),
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
     * @return array
     */
    public function fields()
    {
        return [];
    }

    /**
     * @param $atts
     * @param string $content
     */
    public function shortcode($atts, $content = '')
    {
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