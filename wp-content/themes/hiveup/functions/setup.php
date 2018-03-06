<?php

function hiveup_setup() {
	add_editor_style('theme/css/editor-style.css');
	add_theme_support('post-thumbnails');
	update_option('thumbnail_size_w', 170);
	update_option('medium_size_w', 470);
	update_option('large_size_w', 970);
}
add_action('init', 'hiveup_setup');

if (! isset($content_width))
	$content_width = 600;

function hiveup_excerpt_readmore() {
	return '&nbsp; <a href="'. get_permalink() . '">' . '&hellip; ' . __('Read more', 'hiveup') . ' <i class="fa fa-arrow-right"></i>' . '</a></p>';
}
add_filter('excerpt_more', 'hiveup_excerpt_readmore');

// Add post formats support. See http://codex.wordpress.org/Post_Formats
add_theme_support('post-formats', array(
	'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
));

function remove_p_on_pages() {
    if ( is_page() ) {
        remove_filter( 'the_content', 'wpautop' );
        remove_filter( 'the_excerpt', 'wpautop' );
    }
}
add_action( 'wp_head', 'remove_p_on_pages' );

//Page Slug Body Class
function add_slug_body_class( $classes ) {
global $post;
if ( isset( $post ) ) {
$classes[] = $post->post_type . '-' . $post->post_name;
}
return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );



function rename_post_formats( $safe_text ) {
    if ( $safe_text == 'Image' )
        return 'Infographic';
		if ( $safe_text == 'Standard' )
				return 'Article';

    return $safe_text;
}
add_filter( 'esc_html', 'rename_post_formats' );

//rename Aside in posts list table
function live_rename_formats() {
    global $current_screen;

    if ( $current_screen->id == 'edit-post' ) { ?>
        <script type="text/javascript">
        jQuery('document').ready(function() {

            jQuery("span.post-state-format").each(function() {
                if ( jQuery(this).text() == "Image" )
                    jQuery(this).text("Infographic");
								if ( jQuery(this).text() == "Standard" )
                    jQuery(this).text("Article");
            });

        });
        </script>
<?php }
}
add_action('admin_head', 'live_rename_formats');


add_action( 'init', 'create_type_taxonomy' );

function create_type_taxonomy() {
	register_taxonomy(
		'post-type',
		'post',
		array(
			'label' => 'Post Type',
			'hierarchical' => true,
		)
	);
}

if (!is_admin()) {
function wpb_search_filter($query) {
if ($query->is_search) {
$query->set('post_type', 'post');
}
return $query;
}
add_filter('pre_get_posts','wpb_search_filter');
}
