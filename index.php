<?php 
/*
Plugin Name: WPBatch Facebook Like Box
Plugin URI: http://dreamwebit.com/like-box
Description: The Easiest Facebook LikeBox Widget.. just add anywhere as widget, Add Widget Title, Page URL, Height, Width and you are done..
Author: MTM Sujan
Version: 1.0
Author URI: http://dreamwebit.com/like-box
*/

// Additing Action hook widgets_init
add_action( 'widgets_init', 'wpbatch_likebox_widget'); 

function wpbatch_likebox_widget() {
register_widget( 'wpbatch_likebox_info' );
}

class wpbatch_likebox_info extends WP_Widget {



function wpbatch_likebox_info () {
	$this->WP_Widget('wpbatch_likebox_info', 'WPBatch Like Box', $widget_ops );        
}


public function form( $instance ) {

if ( isset( $instance[ 'title' ]) && isset ($instance[ 'pagelink' ]) && isset($instance[ 'height' ]) && isset($instance[ 'width' ]) ) {
$title = $instance[ 'title' ];
$pagelink = $instance[ 'pagelink' ];
$height = $instance[ 'height' ];
$width = $instance[ 'width' ];
}
else {
$title = __( '', 'wpbatch_widget_title' );
$pagelink = __( '', 'wpbatch_widget_page_link' );
$height = __( '', 'wpbatch_widget_height' );
$width = __( '', 'wpbatch_widget_width' );
} ?>

<p>Title: <input class="widefat" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title );?>" /></p>

<p>Facebook Page URL: <input class="widefat" name="<?php echo $this->get_field_name( 'pagelink' ); ?>" type="text" value="<?php echo esc_attr( $pagelink ); ?>" /></p>

<p>Height: <input class="widefat" name="<?php echo $this->get_field_name( 'height' ); ?>" type="text" value="<?php echo esc_attr( $height ); ?>" /></p>
<p>Width: <input class="widefat" name="<?php echo $this->get_field_name( 'width' ); ?>" type="text" value="<?php echo esc_attr( $width ); ?>" /></p>

<?php

}

function update($new_instance, $old_instance) {

$instance = $old_instance;

$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

$instance['pagelink'] = ( ! empty( $new_instance['pagelink'] ) ) ? strip_tags( $new_instance['pagelink'] ) : '';

$instance['height'] = ( ! empty( $new_instance['height'] ) ) ? strip_tags( $new_instance['height'] ) : '';

$instance['width'] = ( ! empty( $new_instance['width'] ) ) ? strip_tags( $new_instance['width'] ) : '';

return $instance;

}


function widget($args, $instance) {

extract($args);

echo $before_widget; 

$title = apply_filters( 'widget_title', $instance['title'] );

$pagelink = empty( $instance['pagelink'] ) ? '&nbsp;' : $instance['pagelink'];

$height = empty( $instance['height'] ) ? '&nbsp;' : $instance['height'];

$width = empty( $instance['width'] ) ? '&nbsp;' : $instance['width'];

if ( !empty( $title ) ) { echo $before_title . $title . $after_title; };
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&appId=549966225039884&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-like-box" data-href="<?php echo $pagelink; ?>" data-width="<?php echo $width; ?>" data-height="<?php echo $height; ?>" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="true"></div>
<?php 
} }



?>