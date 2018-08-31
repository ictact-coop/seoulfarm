<?php
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    // wp_enqueue_style( 'child-style', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'parent-style' ) );
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
    $count_key = 'post_headline';
    $headlined = get_post_meta($postID, $count_key, true);
    if($headlined == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $headlined;
}

function posts_column_headline($defaults) {
  $defaults['post_headline'] = '헤드라인';
  return $defaults;
}

function posts_custom_column_headline($column_name, $id) {
  if($column_name === 'post_headline'){
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

function print_content($content = '', $cut = 0) {
  global $post;
  if($content == '') $content = $post->post_content;
  if($cut > 0) $content = mb_strcut($content, 0, $cut);
  echo nl2br(strip_tags($content));
}
