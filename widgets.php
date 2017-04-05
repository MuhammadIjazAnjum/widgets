<?php
/*
Plugin Name: Widget
Plugin URI:http://www.bitwali.com
Description:Learning and training of wordpress ..
Author:Muhammad Ijaz Anjum
*/
 
class custom_widget extends WP_Widget{
	
	function __construct(){
		$params=array(
			'name'=>'custom widget name',
			'description'=> 'shows the description of the widget'
			);
		parent::__construct('id_custom_widget','',$params);
	}
	//form displays the taxt , label etc on the widget pate
	public function form($instance)
	{
		extract($instance);
		//$this->get_field_id Constructs id attributes for use in WP_Widget::form() fields.
		?>
		<p>
			<label>Title</label>
			<input 
			id="<?php echo $this->get_field_id('title')?>" 
			class="widefat"
			type="" 
			name="<?php echo $this->get_field_name('title')?>"
			value="<?php if (isset($title)) echo esc_attr($title); ?>"
			/>
		</p>
		<p>
			<label>Description</label>
			<textarea id="<?php echo $this->get_field_id('description')?>" 
				class="widefat" name="<?php echo $this->get_field_name('description')?>"
			><?php if (isset($description)) echo esc_attr($description); ?></textarea>
		</p>
		<?php
	}
	//widget function is used to display widget content on the webpage
	public function widget($args, $instance){
		//$args are the attributes
		//$instance are the values
		extract($args);
		extract($instance);
		$title=apply_filters('widget-title',$title);
		$description=apply_filters('widget_description',$description);
		if(empty($title)) $title="My Custom Widget";
		echo $before_widget;
		echo $before_title.$title.$after_title;
		echo "<p>".$description."</p>";
		echo $after_widget;

	}
}// end of class custom_widget extends widget
add_action('widgets_init','register_custom_widget');
function register_custom_widget(){
	register_widget('custom_widget');

}