<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package materialize_css
 */

if ( ! function_exists( 'materialize_css_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function materialize_css_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	// if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
	// 	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	// }

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'materialize-css' ),
		'<a class="body-link" href="' . esc_url( get_permalink() ) . '" rel="bookmark"> <i class="material-icons body-link">date_range</i> '. $time_string .  '</a>'
	);

	$byline = sprintf(
		esc_html_x('%s', 'post author', 'materialize-css'),
		'<div class="author chip">'.
			'<img class="circle responsive-img" src="'.
				esc_html(get_avatar_url(get_the_author_meta('ID'))).
			'">'.
			'<a class="body-link" href="'.
				esc_url(get_author_posts_url(get_the_author_meta('ID'))).
			'">'.			
			esc_html(get_the_author()).
		'</a></div>'
	);

	echo '<div class="autor-chip"> ' . $byline . $posted_on . '</div>';

}
endif;

if ( ! function_exists( 'materialize_css_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function materialize_css_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'materialize-css' ) );
		if ( $categories_list && materialize_css_categorized_blog() ) {
			printf( '<div class="cat-links body-link">' . esc_html__( 'Categorias: %1$s', 'materialize-css' ) . '</div>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'materialize-css' ) );
		if ( $tags_list ) {
			printf( '<div class="tags-links body-link">' . esc_html__( 'Tags: %1$s', 'materialize-css' ) . '</div>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link body-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Comentar: <span class="screen-reader-text"> on %s</span>', 'materialize-css' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'materialize-css' ),
			the_title( '<span class="screen-reader-text ">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function materialize_css_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'materialize_css_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'materialize_css_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so materialize_css_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so materialize_css_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in materialize_css_categorized_blog.
 */
function materialize_css_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'materialize_css_categories' );
}
add_action( 'edit_category', 'materialize_css_category_transient_flusher' );
add_action( 'save_post',     'materialize_css_category_transient_flusher' );
