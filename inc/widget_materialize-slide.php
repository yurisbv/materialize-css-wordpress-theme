<?php
/**
 * Widget de Sobre o Autor
 *
 * @author Yurisbv <wordpress@yurisbv.com.br>
 * @link /materialize-css/
 */
class MaterializeSlideWidget extends WP_Widget {
	/**
	 * Sets up the widgets name etc
	*/
	public function __construct()
	{
		$widget_ops = array( 
			'classname' => 'materialize-slide',
			'description' => 'Materialize Responsive Slide',
		);
		parent::__construct('materialize-slide','Materialize Slide',$widget_ops);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	*/
	public function widget($args, $instance)
	{
		// outputs the content of the widget
	}
	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	*/
	public function form($instance)
	{
		// outputs the options form on admin
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
	}
}

add_action( 'widgets_init', function(){
	register_widget( 'materialize-slide' );
});