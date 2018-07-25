<?php
/**
 * Created by PhpStorm.
 * User: jholloman
 * Date: 2/26/2016
 * Time: 12:36 PM
 */
/*
Plugin Name: Insurance Links
Plugin URI:
Description: sends customers to insurance partners
Author: John Holloman
Version: 1.0
Author URI:
*/

class Insurance_Button_Widget extends WP_Widget{

    public function Insurance_Button_Widget(){
        $widget_ops = array('classname' => 'Insurance_Button_Widget', 'description' => 'redirects customers to insurance partners');
        $this->__construct('Insurance_Button_Widget', 'Insurance Button Widget', $widget_ops);
    }
    function form($instance){
        $instance = wp_parse_args((array)$instance, array('link' => '', 'message' => '', 'css' => ''));
        ?>
        <p>
            <span><strong>Message</strong></span>
            <input type="text" name="<?php echo $this->get_field_name('message'); ?>" value="<?php echo $instance['message'];?>" />
        </p>
        <p>
            <span><strong>Link</strong></span>
            <input type="text" name="<?php echo $this->get_field_name('link'); ?>" value="<?php echo $instance['link'];?> "/>
        </p>
        <p>
            <span><strong>Custom CSS:</strong></span>
            <textarea name="<?php echo $this->get_field_name('css');?>" rows="4" cols="50"><?php echo $instance['css'];?></textarea>
        </p>
        <?php
    }

    function update($new_instance, $old_instance){
        $instance = $old_instance;
        $instance['css'] = $new_instance['css'];
        $instance['message'] = $new_instance['message'];
        $instance['link'] = $new_instance['link'];
        return $instance;
    }

    function widget($args, $instance){
        $link = empty($instance['link']) ? '' : $instance['link'];
        $message = empty($instance['message']) ? '' : $instance['message'];
        $css = empty($instance['css']) ? '' : $instance['css'];
        ?>
        <style>
            <?php echo $css;?>
        </style>
        <div class="zip-container insurance-button">
            <div class="line-message"><?php echo $message;?></div>
            <a href="<?php echo $link;?>" class="zip-btn">Get a Quote</a>
        </div>
        <?php
    }
}
// Add class for Insurance Button Widget
add_action('widgets_init', create_function('', 'return register_widget("Insurance_Button_Widget");'));