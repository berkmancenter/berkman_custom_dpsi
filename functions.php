<?php

// Register style sheet.
#add_action( 'wp_enqueue_scripts', 'register_theme_styles' );
add_action( 'after_setup_theme', 'berkman_custom_dpsi_setup' );
add_action( 'after_setup_theme', 'berkman_custom_dpsi_formats', 11 );
function berkman_custom_dpsi_formats(){
  //remove_theme_support('post-formats');
  add_theme_support( 'post-formats', array( 'video', 'gallery' ) );
}

/**
 * Register style sheet.
 */
function berkman_custom_dpsi_setup() {
	register_nav_menu( 'footer', 'Footer menu' );
  /* Looks like 2013 uses genericons
	wp_register_style( 'fontawesome', get_stylesheet_directory_uri() . 'font-awesome-4.1.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'fontawesome' );
   */
}

function twentythirteen_entry_meta() {
	if ( is_sticky() && is_home() && ! is_paged() )
		echo '<span class="featured-post">' . __( 'Sticky', 'twentythirteen' ) . '</span>';

	if ( ! has_post_format( 'link' ) && 'post' == get_post_type() )
		twentythirteen_entry_date();

	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'twentythirteen' ) );
	if ( $categories_list ) {
		//echo '<span class="categories-links">' . $categories_list . '</span>';
	}

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'twentythirteen' ) );
	if ( $tag_list ) {
		echo '<span class="tags-links">' . $tag_list . '</span>';
	}

	// Post author
	if ( 'post' == get_post_type() ) {
		printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'twentythirteen' ), get_the_author() ) ),
			get_the_author()
		);
	}
}

function add_secure_video_options($html) {
  if (is_ssl() && strpos($html, "<iframe" ) !== false) {
    $search = array('src="http://www.youtu','src="http://youtu');
    $replace = array('src="https://www.youtu','src="https://youtu');
    $html = str_replace($search, $replace, $html);

    return $html;
  } else {
    return $html;
  }
}
function enqueue_scripts() {
	wp_enqueue_script(
		'stickup',
		get_stylesheet_directory_uri() . '/stickUp.min.js',
		array( 'jquery' )
	);
}

add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );
add_filter('the_content', 'add_secure_video_options', 10);
