<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package materialize_css
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_single() ) :
			the_title( '<h3 class="entry-title hvr-underline-from-center">', '</h3>' );
		else :
			the_title( '<h3 class="entry-title hvr-underline-from-center"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php materialize_css_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="flow-text">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post.   %s <span class="meta-nav">&rarr;</span>*/
				wp_kses( __( '<br>Continue lendo...', 'materialize-css' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'materialize-css' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php materialize_css_entry_footer(); ?>
	</footer><!-- .entry-footer -->
<div class="divider"></div>
</article><!-- #post-## -->
