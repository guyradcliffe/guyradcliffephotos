<?php
function loadHead() { ?>

    <link rel="stylesheet" href="https://photos.guyradcliffe.com/wp-content/themes/guyradcliffetheme/style.css">
    <link rel="icon" href="https://photos.guyradcliffe.com/wp-content/themes/guyradcliffetheme/favicon.png" type="image/png">
    <meta name="yandex-verification" content="e4829e78b7bf55fd" />
    <!-- alexa needed -->
    <!-- bing needed -->
<?php }
add_action( 'after_setup_theme', 'blankslate_setup' );
function blankslate_setup() {
//load_theme_textdomain( 'blankslate', get_template_directory() . '/languages' );
add_theme_support( 'title-tag' );
//add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'html5', array( 'search-form' ) );
global $content_width;
//remove_filter ('the_excerpt', 'wpautop');
remove_filter ('the_content', 'wpautop');
remove_filter('term_description','wpautop');
if ( ! isset( $content_width ) ) { $content_width = 1920; }
register_nav_menus( array( 'main-menu' => esc_html__( 'Main Menu', 'blankslate' ) ) );
}

//stuff to load into footer.php
function loadFooter() {
    if ( !(is_front_page()) || !(is_home()) || !(is_front_page()) && !(is_home()) ) {
        // if not home page, show getElementById and innerHTML;
        // imgPath and altTag defined in each blog post to change header image for each post except home page ?>
        <script>
            document.getElementById("header").innerHTML = "<img src='" + imgPath + "' alt='" + altTag + "' id='imagestyle'><span id='menuBtn' onclick='openNav()'>&#9776;</span>";
        </script>
    <?php } ?>
    <script src="https://photos.guyradcliffe.com/wp-content/themes/guyradcliffetheme/app.js" async defer></script>
<?php } // closes loadFooter()

add_filter( 'document_title_separator', 'blankslate_document_title_separator' );
function blankslate_document_title_separator( $sep ) {
$sep = '|';
return $sep;
}
add_filter( 'the_title', 'blankslate_title' );
function blankslate_title( $title ) {
if ( $title == '' ) {
return '...';
} else {
return $title;
}
}
add_filter( 'the_content_more_link', 'blankslate_read_more_link' );
function blankslate_read_more_link() {
if ( ! is_admin() ) {
return ' <a href="' . esc_url( get_permalink() ) . '" class="more-link">...</a>';
}
}
add_filter( 'excerpt_more', 'blankslate_excerpt_read_more_link' );
function blankslate_excerpt_read_more_link( $more ) {
if ( ! is_admin() ) {
global $post;
return ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '" class="more-link">...</a>';
}
}
add_filter( 'intermediate_image_sizes_advanced', 'blankslate_image_insert_override' );
function blankslate_image_insert_override( $sizes ) {
unset( $sizes['medium_large'] );
return $sizes;
}
add_action( 'widgets_init', 'blankslate_widgets_init' );
function blankslate_widgets_init() {
register_sidebar( array(
'name' => esc_html__( 'Sidebar Widget Area', 'blankslate' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => '</li>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
//add_action( 'wp_head', 'blankslate_pingback_header' );
add_action( '', 'blankslate_pingback_header' );
function blankslate_pingback_header() {
if ( is_singular() && pings_open() ) {
printf( '<link rel="pingback" href="%s" />' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
}
}
add_action( 'comment_form_before', 'blankslate_enqueue_comment_reply_script' );
function blankslate_enqueue_comment_reply_script() {
if ( get_option( 'thread_comments' ) ) {
wp_enqueue_script( 'comment-reply' );
}
}
function blankslate_custom_pings( $comment ) {
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php
}
// remove bloat from wp_head
remove_action('wp_print_styles', 'print_emoji_styles');//removes printed emoji css
remove_action('wp_head', 'print_emoji_detection_script', 7); //removes printed emoji js
remove_action('admin_print_scripts', 'print_emoji_detection_script'); //removes printed emoji js
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link');
remove_action('wp_head', 'https://api.w.org/');
remove_action('wp_head', 'rest_output_link_wp_head');// removes json
remove_action('wp_head', 'wp_oembed_add_discovery_links');// removes json

add_action( 'wp_enqueue_scripts', 'remove_stylesheets', 20 );
function remove_stylesheets() {
    wp_dequeue_style( 'wp-block-library' );// removes default wp stylesheet
    wp_deregister_style( 'wp-block-library' );// removes default wp stylesheet
    wp_dequeue_style( 'contact-form-7' );// removes contact form 7 stylesheet
    wp_deregister_style( 'contact-form-7' );// removes contact form 7 stylesheet
}
// end remove bloat from wp_head
add_filter( 'get_comments_number', 'blankslate_comment_count', 0 );
function blankslate_comment_count( $count ) {
if ( ! is_admin() ) {
global $id;
$get_comments = get_comments( 'status=approve&post_id=' . $id );
$comments_by_type = separate_comments( $get_comments );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}