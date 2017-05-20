<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package materialize_css
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" role="complementary">
	<div id="sidebar-right" class="col s12 m2 l2">
		<?php dynamic_sidebar('sidebar-1'); ?>
	</div>
</aside><!-- #secondary -->