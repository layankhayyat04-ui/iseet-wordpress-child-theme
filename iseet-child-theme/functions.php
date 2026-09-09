<?php
/**
 * ISEET Child Theme functions.
 *
 * Loads the parent (Twenty Twenty-Four) stylesheet plus this child theme's
 * assets, registers accessibility and performance helpers, and adds a
 * REST API powered "Latest Posts" block for the front end.
 *
 * @package ISEET_Child_Theme
 */

defined( 'ABSPATH' ) || exit;

/**
 * Enqueue parent + child styles and the front-end script.
 * Scripts are enqueued with a version tied to file modification time so
 * browsers pick up changes immediately without a manual cache bust —
 * and with `defer` so they never block first paint (Core Web Vitals: LCP/TBT).
 */
function iseet_enqueue_assets() {
	$parent_style = 'twentytwentyfour-style';

	wp_enqueue_style(
		$parent_style,
		get_template_directory_uri() . '/style.css',
		array(),
		wp_get_theme( 'twentytwentyfour' )->get( 'Version' )
	);

	wp_enqueue_style(
		'iseet-child-style',
		get_stylesheet_uri(),
		array( $parent_style ),
		wp_get_theme()->get( 'Version' )
	);

	wp_enqueue_script(
		'iseet-latest-posts',
		get_stylesheet_directory_uri() . '/assets/js/latest-posts.js',
		array(),
		filemtime( get_stylesheet_directory() . '/assets/js/latest-posts.js' ),
		true // Load in the footer, deferred — never blocks rendering.
	);

	wp_localize_script(
		'iseet-latest-posts',
		'iseetSettings',
		array(
			'restUrl'  => esc_url_raw( rest_url( 'wp/v2/posts' ) ),
			'postsToShow' => 6,
		)
	);
}
add_action( 'wp_enqueue_scripts', 'iseet_enqueue_assets' );

/**
 * Add a skip-to-content link right after <body> opens, for keyboard and
 * screen-reader users (WCAG 2.4.1 — Bypass Blocks).
 */
function iseet_skip_link() {
	echo '<a class="skip-link screen-reader-text" href="#wp--skip-link--target">'
		. esc_html__( 'Skip to content', 'iseet-child-theme' )
		. '</a>';
}
add_action( 'wp_body_open', 'iseet_skip_link' );

/**
 * Add width/height attributes to post thumbnails automatically so the
 * browser can reserve layout space before the image loads, preventing
 * Cumulative Layout Shift (Core Web Vitals: CLS).
 */
function iseet_add_image_dimensions( $html, $post_id, $post_thumbnail_id ) {
	$image = wp_get_attachment_image_src( $post_thumbnail_id, 'large' );

	if ( ! $image ) {
		return $html;
	}

	list( , $width, $height ) = $image;

	if ( strpos( $html, 'width=' ) === false ) {
		$html = str_replace( '<img', '<img width="' . esc_attr( $width ) . '" height="' . esc_attr( $height ) . '"', $html );
	}

	return $html;
}
add_filter( 'post_thumbnail_html', 'iseet_add_image_dimensions', 10, 3 );

/**
 * Lazy-load every content image except the first one on the page
 * (the first image is usually above the fold / the LCP element, and
 * lazy-loading it would hurt Largest Contentful Paint instead of helping it).
 */
function iseet_smart_lazy_load( $attr, $attachment, $size ) {
	static $image_count = 0;
	$image_count++;

	if ( 1 === $image_count ) {
		$attr['loading'] = 'eager';
		$attr['fetchpriority'] = 'high';
	} else {
		$attr['loading'] = 'lazy';
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'iseet_smart_lazy_load', 10, 3 );

/**
 * Register a REST API field so the "Latest Posts" front-end component
 * can fetch a ready-to-use excerpt and featured image URL in a single
 * request, instead of the browser making N additional calls per post.
 */
function iseet_register_rest_fields() {
	register_rest_field(
		'post',
		'iseet_featured_image_url',
		array(
			'get_callback' => function ( $post_arr ) {
				$thumbnail_id = get_post_thumbnail_id( $post_arr['id'] );
				if ( ! $thumbnail_id ) {
					return null;
				}
				$src = wp_get_attachment_image_src( $thumbnail_id, 'medium_large' );
				return $src ? $src[0] : null;
			},
		)
	);
}
add_action( 'rest_api_init', 'iseet_register_rest_fields' );

/**
 * Register the "Latest Posts" shortcode. Usage: [iseet_latest_posts]
 * Renders an empty, accessible container; content is filled client-side
 * from the WordPress REST API (see assets/js/latest-posts.js), so the
 * initial HTML response stays small and fast.
 */
function iseet_latest_posts_shortcode() {
	return '<div class="iseet-latest-posts" role="list" aria-label="' . esc_attr__( 'Latest posts', 'iseet-child-theme' ) . '"></div>';
}
add_shortcode( 'iseet_latest_posts', 'iseet_latest_posts_shortcode' );
