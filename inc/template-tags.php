<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Future_Imperfect
 */

if ( ! function_exists( 'future_imperfect_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function future_imperfect_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);
	
	$posted_on = "";
	
	$extra_labels = "";
	
	if ( get_post_status ( $ID ) == 'private' ) {
		$extra_labels .= '<i class="fa fa-lock"></i>';
	}
	
	if ( is_sticky ( $ID )) {
		$extra_labels .= '<i class="fa fa-sticky-note"></i>';
	}
	
	
	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'future-imperfect' ),
		'<i class="fa fa-clock-o"></i> <a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a> <span style="float:right;">' . $extra_labels .'</span> '	
	);
	
	

	/*$byline = sprintf(
		esc_html_x( '%s', 'post author', 'future-imperfect' ),
		'<span class="author vcard entry-meta-link"><i class="fa fa-user"></i> <a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span> '
	);*/
	$byline = "";
	
	$categories_line = "";
	$tags_line = "";
	
	// Hide category and tag text for pages.
	if ( get_post_type() === 'post' && get_post_format() != "aside" && get_post_format() != "status" ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'future-imperfect' ) );
		if ( $categories_list && future_imperfect_categorized_blog() ) {
			$categories_line = sprintf( '<span class="cat-links entry-meta-link"><i class="fa fa-folder-o"></i> ' . esc_html__( '%1$s', 'future-imperfect' ) . '</span> ', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'future-imperfect' ) );
		if ( $tags_list ) {
			$tags_line = sprintf( '<span class="tags-links entry-meta-link"><i class="fa fa-tag"></i> ' . esc_html__( '%1$s', 'future-imperfect' ) . '</span> ', $tags_list ); // WPCS: XSS OK.
		}
	}
	
	echo '<div class="posted-on ">' . $posted_on . $byline . $categories_line . $tags_line . '</div>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'future_imperfect_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function future_imperfect_entry_footer() {
	

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'future-imperfect' ), esc_html__( '1 Comment', 'future-imperfect' ), esc_html__( '% Comments', 'future-imperfect' ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'future-imperfect' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
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
function future_imperfect_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'future_imperfect_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'future_imperfect_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so future_imperfect_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so future_imperfect_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in future_imperfect_categorized_blog.
 */
function future_imperfect_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'future_imperfect_categories' );
}
add_action( 'edit_category', 'future_imperfect_category_transient_flusher' );
add_action( 'save_post',     'future_imperfect_category_transient_flusher' );
