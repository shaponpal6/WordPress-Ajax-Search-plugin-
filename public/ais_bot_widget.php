<?php

class AI_search_Widget extends WP_Widget
{
    function __construct()
    {

        parent::__construct(
            'ai_search_widget',  // Base ID
            'AI Search'   // Name
        );

        add_action('widgets_init', function () {
            register_widget('AI_search_Widget');
        });

    }


    public $args = array(
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
        'before_widget' => '<div class="widget-wrap">',
        'after_widget' => '</div></div>'
    );

    public function widget($args, $instance)
    {

        echo $args['before_widget'];

        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
            echo '<input type="text" id="ai_search_widget" style="width: 100%;"/>';
            echo '<div id="ai_search_display_widget" >Display</div>';
        }

        echo '<div class="textwidget">';

        echo esc_html__($instance['text'], 'text_domain');

        echo do_shortcode('[wpartificial-search id="9"]');

        echo $args['after_widget'];

    }

    public function form($instance)
    {

        $title = !empty($instance['title']) ? $instance['title'] : esc_html__('', 'text_domain');
        $text = !empty($instance['text']) ? $instance['text'] : esc_html__('', 'text_domain');
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo esc_html__('Title:', 'text_domain'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('Text')); ?>"><?php echo esc_html__('Text:', 'text_domain'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('text')); ?>"
                      name="<?php echo esc_attr($this->get_field_name('text')); ?>" type="text" cols="30"
                      rows="10"><?php echo esc_attr($text); ?></textarea>
        </p>

        <?php

    }

    public function update($new_instance, $old_instance)
    {

        $instance = array();

        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['text'] = (!empty($new_instance['text'])) ? $new_instance['text'] : '';

        return $instance;
    }

}

$ai_search_widget = new AI_search_Widget();
?>