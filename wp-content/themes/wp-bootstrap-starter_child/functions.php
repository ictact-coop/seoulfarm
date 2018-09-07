<?php
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    // wp_enqueue_style( 'child-style', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css' );
    // wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'parent-style' ) );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/mystyle.css', array( 'wp-bootstrap-starter-bootstrap-css' ), '4.9.9' );
    // wp_enqueue_script( 'child-style','https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js', array(), null, true );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

//this goes in functions.php near the top
function my_scripts_method() {
// register your script location, dependencies and version
   wp_register_script('custom_script',
   get_template_directory_uri() . '/custom_js/jquery_test.js',
   array('jquery'),
   '1.0' );
 // enqueue the script
  wp_enqueue_script('custom_script');
  }
add_action('wp_enqueue_scripts', 'my_scripts_method');

// function to display number of posts.
function getPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

// function to count views.
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

// Add it to a column in WP-Admin
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
function posts_column_views($defaults) {
    $defaults['post_views'] = __('Views');
    return $defaults;
}

function posts_custom_column_views($column_name, $id) {
	if($column_name === 'post_views'){
        echo getPostViews(get_the_ID());
    }
}

// 헤드라인 노출 여부 표시 위한 함수
function getHeadline($postID) {
    $count_key = 'headline';
    $headlined = get_post_meta($postID, $count_key, true);
    if($headlined == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    } else if (is_array($headlined)) {
        return $headlined[0];
    }
    return $headlined;
}

function posts_column_headline($defaults) {
  $defaults['headline'] = '헤드라인';
  return $defaults;
}

function posts_custom_column_headline($column_name, $id) {
  if($column_name === 'headline'){
    echo getHeadline(get_the_ID());
  }
}
// Add it to a column in WP-Admin
add_filter('manage_posts_columns', 'posts_column_headline');
add_action('manage_posts_custom_column', 'posts_custom_column_headline',5,2);

function modify_comment_form_fields($fields) {
    /*$fields['author'] = '<p class="comment-form-author"><div class="comment_form_user">
      <p>작성자</p>' . '<input id="author" name="author" type="text" value="' .
                esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />'.
                ( $req ? '<span class="required">*</span>' : '' )  .
                '</p></div>';*/
    $fields['author'] = '';
    /*$fields['email'] = '<p class="comment-form-email">' . '<input id="email" placeholder="your-real-email@example.com" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                '" size="30"' . $aria_req . ' />'  .
                '<label for="email">' . __( 'Your Email' ) . '</label> ' .
                ( $req ? '<span class="required">*</span>' : '' )
                 .
                '</p>';*/
    $fields['email'] = '';
    /*$fields['url'] = '<p class="comment-form-url">' .
             '<input id="url" name="url" placeholder="http://your-site-name.com" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /> ' .
            '<label for="url">' . __( 'Website', 'domainreference' ) . '</label>' .
               '</p>';*/
    $fields['url'] = '';

    return $fields;
}
add_filter('comment_form_default_fields','modify_comment_form_fields');

function get_featured_image($post_id) {
  if(has_post_thumbnail($post_id)) {
    $image_id = get_post_thumbnail_id($post_id);
    $image_url = wp_get_attachment_image_src($image_id, $size);
    $post_banner_img = $image_url[0];
  } else {
    $post_banner_img = 'http://yori.hansalim.or.kr/data/ing/20140702_506_4.jpg';
  }
  return $post_banner_img;
}

// 첫 페이지와 사이드바 등에서 콘텐츠 일부 표시
function print_content($content = '', $option = array()) {
  global $post;
  if(is_array($option) && !empty($option)) extract($option);

  if($content == '') $content = $post->post_content;
  $content = do_shortcode($content);

  if(!is_single()) $content = strip_tags($content);
  else $content = nl2br($content);
  if(isset($cut) && $cut > 0) $content = mb_strcut($content, 0, $cut).'...';

  echo $content;
}

function print_string($string, $cut = 0) {
  // echo strlen($string);
  if($cut > 0 && strlen($string) > $cut) {
    $string = mb_strcut($string, 0, $cut).'...';
  }
  echo $string;
}

function get_writer_name() {
  global $post;
  $author_name = get_post_meta($post->ID, 'writer_name', true);
  if(!isset($author_name) || $author_name == '') $author_name = get_the_author_meta('display_name', $post->post_author);
  return $author_name;
}

function my_format_TinyMCE( $in ) {
	$in['remove_linebreaks'] = false;
	$in['gecko_spellcheck'] = false;
	$in['keep_styles'] = true;
	$in['accessibility_focus'] = true;
	$in['tabfocus_elements'] = 'major-publishing-actions';
	$in['media_strict'] = false;
	$in['paste_remove_styles'] = false;
	$in['paste_remove_spans'] = false;
	$in['paste_strip_class_attributes'] = 'none';
	$in['paste_text_use_dialog'] = true;
	$in['wpeditimage_disable_captions'] = true;
	$in['plugins'] = 'tabfocus,paste,media,fullscreen,textcolor,wordpress,wpeditimage,wpgallery,wplink,wpdialogs'; // textcolor 추가, wpfullpages?? 삭제
	$in['content_css'] = get_template_directory_uri() . "/editor-style.css";
	$in['wpautop'] = true;
	$in['apply_source_formatting'] = false;
        $in['block_formats'] = "Paragraph=p; Heading 3=h3; Heading 4=h4";
	$in['toolbar1'] = 'bold,italic,fontselect,fontsizeselect,forecolor,strikethrough,bullist,numlist,blockquote,hr,alignleft,aligncenter,alignright,link,unlink,wp_more,spellchecker,wp_fullscreen,wp_adv ';
	$in['toolbar2'] = 'formatselect,underline,alignjustify,backcolor,pastetext,removeformat,charmap,outdent,indent,undo,redo,wp_help ';
	$in['toolbar3'] = '';
	$in['toolbar4'] = '';
	return $in;
}
add_filter( 'tiny_mce_before_init', 'my_format_TinyMCE' );

function get_short_title($title = '') {
  global $post;
  $short_title = get_post_meta($post->ID, 'short_title', true);
  if(strlen($short_title) > 0) $title = $short_title;
  else $title = $post->post_title;
  return $title;
}
