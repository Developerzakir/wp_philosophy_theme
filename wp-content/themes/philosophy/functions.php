<?php 


function philosophy_setup_theme()
{
    load_theme_textdomain('philosophy');
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('html5',array('search-form','comment-list'));
    add_theme_support('post-formats',array('image','gallery','quote','audio','video','link'));
    add_editor_style('/assets/css/editor-style.css');

}
add_action('after_setup_theme', 'philosophy_setup_theme');


