<?php 

require_once(get_theme_file_path("/inc/tgm.php"));
require_once(get_theme_file_path("/inc/attachments.php"));

if(site_url() == 'http://localhost/wp_philosophy/'){
    define("VERSION", time());
}else{
    define("VERSION", wp_get_theme()->get("Version"));
}

function philosophy_setup_theme()
{
    load_theme_textdomain('philosophy');
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('html5',array('search-form','comment-list'));
    add_theme_support('post-formats',array('image','gallery','quote','audio','video','link'));
    add_editor_style('/assets/css/editor-style.css');

    register_nav_menu("topmenu",__("Top Menu","philosophy"));
    add_image_size("philosophy-home-square",400,400,true);

}
add_action('after_setup_theme', 'philosophy_setup_theme');

function philosophy_assets()
{
    wp_enqueue_style('fontawesome-css', get_theme_file_uri("/assets/css/font-awesome/font-awesome.css"),null, "1.0");
    wp_enqueue_style('fonts-css', get_theme_file_uri("/assets/css/fonts.css"),null, "1.0");
    wp_enqueue_style('base-css', get_theme_file_uri("/assets/css/base.css"),null, "1.0");
    wp_enqueue_style('vendor-css', get_theme_file_uri("/assets/css/vendor.css"),null, "1.0");
    wp_enqueue_style('main-css', get_theme_file_uri("/assets/css/main.css"),null, "1.0");
    wp_enqueue_style('philosophy-css', get_stylesheet_uri(),null, VERSION);

    wp_enqueue_script('modernizr-js', get_theme_file_uri("/assets/js/modernizr.js"),null,"1.0");
    wp_enqueue_script('pace-js', get_theme_file_uri("/assets/js/pace.min.js"),null,"1.0");
    wp_enqueue_script('plugins-js', get_theme_file_uri("/assets/js/plugins.js"),array('jquery'),"1.0",true);
    wp_enqueue_script('main-js', get_theme_file_uri("/assets/js/main.js"),array('jquery'),"1.0",true);

}
add_action('wp_enqueue_scripts', 'philosophy_assets');

function philosophy_pagination()
{
    global $wp_query;
   $links =  paginate_links(array(
        'current'=>max(1,get_query_var('paged')),
        'total'=>$wp_query->max_num_pages,
        'type'=>'list',
        'mid_size'=>4
    ));

    // Check if $links is not null before applying str_replace
    if ($links) {
        $links = str_replace('page-numbers', 'pgn__num', $links);
        $links = str_replace("<ul class='pgn__num'>", "<ul>", $links);
        $links = str_replace('next pgn__num', 'pgn__next', $links);
        $links = str_replace('prev pgn__num', 'pgn__prev', $links);
        echo $links;
    }
}

remove_action("term_description","wpautop");


/**
 * About us page  widgets register.
 */
function philosophy_widgets() {
	register_sidebar( array(
		'name'          => __( 'About Us Page', 'philosophy' ),
		'id'            => 'about-us',
		'description'   => __( 'Widgets in this area will be shown on about us page.', 'philosophy' ),
		'before_widget' => '<div id="%1$s" class="col-block %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="quarter-top-margin">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'philosophy_widgets' );
